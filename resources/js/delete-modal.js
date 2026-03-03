import { store } from './redux/store';

document.addEventListener('show-delete-modal', function (event) {
  const endpoint = event.detail.endpoint;
  const formData = event.detail.formData;

  const deleteModal = document.querySelector('.modal');
  const modalClose = deleteModal.querySelector('.modal-close');
  const modalCancel = deleteModal.querySelector('.modal-cancel');
  const modalConfirm = deleteModal.querySelector('.modal-confirm');

  modalClose.addEventListener('click', function () {
    deleteModal.classList.remove('active');
  });

  modalCancel.addEventListener('click', function () {
    deleteModal.classList.remove('active');
  });

  modalConfirm.addEventListener('click', async function () {
    deleteModal.classList.remove('active');
    try {
      const response = await fetch(endpoint, {
        method: 'DELETE',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
      })
      if (!response.ok) {
        throw response;
      }

      const data = await response.json();

      document.dispatchEvent(new CustomEvent('reset-crud', {
        detail: {
          data: data
        }
      }));


    } catch (err) {
      console.error(err);
    }
  });

});


