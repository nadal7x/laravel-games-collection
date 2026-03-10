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

  });
}




