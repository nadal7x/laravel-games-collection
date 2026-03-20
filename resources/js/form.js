import { store } from './redux/store';
import { updateForm, updateTable, showDeleteModal } from './redux/crud-slice';

const formContainer = document.querySelector('.form');

store.subscribe(() => {
  const currentState = store.getState();

  if (currentState.crud.form && formContainer) {
    formContainer.innerHTML = currentState.crud.form;
  }
});

document.addEventListener('show-element', function (event) {
  const element = event.detail.element;
  const form = document.querySelector('form');

  Object.keys(element).forEach(key => {
    const input = form.querySelector(`[name="${key}"]`);
    if (input) {
      input.value = element[key] ?? '';
    }
  });
});

document.addEventListener('reset-crud', function (event) {
  const data = event.detail.data;
  if (data.form) {
    store.dispatch(updateForm(data.form));
  }
  if (data.table) {
    store.dispatch(updateTable(data.table));
  }
});

if (formContainer) {
  formContainer.addEventListener('click', async event => {

    if (event.target.closest('.clear-button')) {
      event.preventDefault();
      const clearButton = event.target.closest('.clear-button');
      const endpoint = clearButton.dataset.endpoint;
      try {
        const response = await fetch(endpoint, {
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
          }
        });

        if (!response.ok) throw new Error('HTTP ' + response.status);

        const data = await response.json();

        if (data.form) {
          store.dispatch(updateForm(data.form));
        }
      } catch (error) {
        console.error(error);
      }
    }

    if (event.target.closest('.delete-button')) {
      event.preventDefault();
      const deleteButton = event.target.closest('.delete-button');
      const endpointTemplate = deleteButton.dataset.endpoint;
      const form = formContainer.querySelector('form');
      const formData = new FormData(form);
      const elementId = formData.get('id');
      const endpoint = endpointTemplate.replace(':id', elementId);

      store.dispatch(showDeleteModal({
        endpoint,
        formData: formData,
        show: true
      }));
    }

    if (event.target.closest('.save-button')) {
      event.preventDefault();
      const saveButton = event.target.closest('.save-button');
      const form = formContainer.querySelector('form');
      const formData = new FormData(form);
      const endpoint = saveButton.dataset.endpoint;

      const imagesBoxes = form.querySelectorAll('.images-gallery-box');
      const imagesData = {};
      imagesBoxes.forEach(imageBox => {
        const imagesConfig = imageBox.dataset.config;
        const imageContainers = imageBox.querySelectorAll('.open-gallery');
        imageContainers.forEach(imageContainer => {
          const name = imageContainer.dataset.name;
          const lang = imageContainer.dataset.lang;
          const image = imageContainer.querySelector('img');
          if (image?.src) {
            console.log(image.src);
            imagesData[lang] ??= {};
            imagesData[lang][name] ??= { files: [] };
            imagesData[lang][name].files.push({
              filename: image.src.split('/').pop(),
              title: image.title,
              alt: image.alt,
              config: imagesConfig
            });
          }
        });
      });

      formData.append('images', JSON.stringify(imagesData));

      try {
        const response = await fetch(endpoint, {
          method: 'POST',
          body: formData,
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
          }
        })

        if (!response.ok) {
          throw response;
        }


        const data = await response.json();
        if (data.form) {
          store.dispatch(updateForm(data.form));
        }
        if (data.table) {
          store.dispatch(updateTable(data.table));
        }

      } catch (err) {
        if (err.status === 422) {
          const errors = await err.json();

          Object.entries(errors.errors).forEach(([key, value]) => {
            const input = form.querySelector(`[name="${key}"]`)
            console.log(key)
            const label = input.parentElement.querySelector('label');

            if (label) {
              const error = document.createElement('span');
              error.classList.add('error');
              error.textContent = value;
              label.appendChild(error);
            }
          });

          console.log(errors);
        } else {
          console.error('Otro error', err);
        }
      }
    }

    if (event.target.closest('.tab-button')) {
      const tabButton = event.target.closest('.tab-button');

      const tabGroup = tabButton.dataset.tabGroup;
      const tab = tabButton.dataset.tab;

      const tabButtons = document.querySelectorAll(`.tab-button[data-tab-group="${tabGroup}"]`);
      const tabContents = document.querySelectorAll(`.tab-content[data-tab-group="${tabGroup}"]`);

      tabButtons.forEach(btn => btn.classList.remove('active'));
      tabButton.classList.add('active');

      tabContents.forEach(content => content.classList.remove('active'));
      const tabContent = document.querySelector(`.tab-content[data-tab-group="${tabGroup}"][data-tab-content="${tab}"]`);
      if (tabContent) tabContent.classList.add('active');
    }

    if (event.target.closest('.image-remove')) {
      event.stopPropagation();
      event.preventDefault();
      let galleryElement = event.target.closest('.open-gallery');
      galleryElement.querySelector('img').src = '';
      galleryElement.querySelector('img').alt = '';
      galleryElement.querySelector('img').title = '';
      galleryElement.classList.remove('active');
      return;
    }

    if (event.target.closest('.open-gallery')) {
      document.dispatchEvent(new CustomEvent('open-gallery-modal', {
        detail: {
          element: event.target.closest('.open-gallery')
        }
      }));
    }

    if (event.target.closest('.images-modal .modal-close') || event.target.closest('.images-modal .modal-cancel')) {
      event.preventDefault();
      const modal = document.querySelector('.modal.images-modal');
      modal.classList.remove('active');
    }

    if (event.target.closest('.tag .remove-tag')) {
      event.preventDefault();
      const removeTag = event.target.closest('.remove-tag');
      const tag = event.target.closest('.tag');
      const hiddenTag = document.querySelector(`input[name="tags[]"][value="${removeTag.dataset.tagName}"]`);
      tag.remove();
      hiddenTag.remove();
    }

  });

  formContainer.addEventListener('keydown', async event => {
    if (!event.target.closest('.tag-input')) return;

    if (event.key !== 'Enter') return;
    event.preventDefault();

    const tagInput = event.target.closest('.tag-input');
    const tagsContainer = document.querySelector('.tags-container');
    const hiddenTags = document.querySelector('.hidden-tags');

    const option = [...document.querySelectorAll(".tags-list option")]
      .find(o => o.value === tagInput.value);
    if (!option) return;

    const id = option.dataset.id;
    const name = option.value;

    const hidden = document.createElement("input");
    hidden.type = "hidden";
    hidden.name = "tags[]";
    hidden.value = name;
    hiddenTags.appendChild(hidden);

    const tag = document.createElement("span");
    tag.className = "tag";
    tag.textContent = name;

    const remove = document.createElement("button");
    remove.textContent = "×";
    remove.onclick = () => {
      tag.remove();
      hidden.remove();
    };

    tag.appendChild(remove);
    tagsContainer.appendChild(tag);

    tagInput.value = "";
  });
}




