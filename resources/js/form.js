document.addEventListener('show-element', function (event) {
  const element = event.detail.element;
  const form = document.querySelector('form');
  const deleteButton = document.querySelector('.form .delete-button');
  deleteButton.style.display = 'inline-block';

  Object.keys(element).forEach(key => {
    const input = form.querySelector(`[name="${key}"]`);
    if (input) {
      input.value = element[key] ?? '';
    }
  });
});

const formContainer = document.querySelector('.form');
if (formContainer) {
  formContainer.addEventListener('click', async event => {

    if (event.target.closest('.clear-button')) {
      event.preventDefault();
      resetForm();
    }

    if (event.target.closest('.delete-button')) {
      event.preventDefault();
      const deleteButton = event.target.closest('.delete-button');
      const endpointTemplate = deleteButton.dataset.endpoint;
      const form = formContainer.querySelector('form');
      const formData = new FormData(form);
      const elementId = formData.get('id');
      const endpoint = endpointTemplate.replace(':id', elementId);

      document.dispatchEvent(new CustomEvent('show-delete-modal', {
        detail: {
          endpoint: endpoint,
          formData: formData
        }
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

        console.log(data)


      } catch (err) {
        if (err.status === 422) {
          const errors = await err.json();

          Object.entries(errors.errors).forEach(([key, value]) => {
            const input = form.querySelector(`[name="${key}"]`)
            console.log(key)
            const label = input.parentElement.querySelector('label');

            if (label) {
              console.log(label)
              const error = document.createElement('span');
              error.classList.add('error');
              error.textContent = value;
              console.log(value)
              label.appendChild(error);
            }
          });

          console.log(errors);
        } else {
          console.error('Otro error', err);
        }
      }
    }
  });

  function resetForm() {
    const form = document.querySelector('form');
    let elementId = form.querySelector('input[name="id"]');
    const deleteButton = document.querySelector('.form .delete-button');
    deleteButton.style.display = 'none';
    form.reset();
    if (elementId) {
      elementId.value = '';
    }
  }
}


