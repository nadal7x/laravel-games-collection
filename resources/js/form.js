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

document.querySelector('.form').addEventListener('click', async event => {
  event.preventDefault();

  const formContainer = document.querySelector('.form');

  if (event.target.closest('.clear-button')) {
    resetForm();
  }

  if (event.target.closest('.delete-button')) {
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
    const saveButton = event.target.closest('.save-button');
    const form = formContainer.querySelector('form');
    const formData = new FormData(form);
    const endpoint = saveButton.dataset.endpoint;

    console.log(endpoint)

    try {
      const response = await fetch(endpoint, {
        method: 'POST',
        body: formData,
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
      })

      console.log(response)

      // const data = await response.json();

      // if (!data.success) {
      //   throw new Error(data.message);
      // }

      resetForm();

    } catch (err) {
      console.error(err);
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


