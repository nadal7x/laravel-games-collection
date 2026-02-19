document.addEventListener('show-delete-modal', function (event) {
  const endpoint = event.detail.endpoint;
  const formData = event.detail.formData;
  const elementId = formData.get('id');
  const formContainer = document.querySelector('.form');
  const tableContainer = document.querySelector('.table');

  const deleteModal = document.createElement('div');
  deleteModal.classList.add('modal');
  deleteModal.innerHTML = `
    <div class="modal-content">
      <div class="modal-header">
        <h2>Eliminar</h2>
        <button class="modal-close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>window-close</title><path d="M13.46,12L19,17.54V19H17.54L12,13.46L6.46,19H5V17.54L10.54,12L5,6.46V5H6.46L12,10.54L17.54,5H19V6.46L13.46,12Z" /></svg></button>
      </div>
      <div class="modal-body">
        <p>¿Estás seguro de que quieres eliminar este elemento?</p>
      </div>
      <div class="modal-footer">
        <button class="modal-confirm">Eliminar</button>
        <button class="modal-cancel">Cancelar</button>
      </div>
    </div>
  `;
  document.body.appendChild(deleteModal);

  const modalClose = deleteModal.querySelector('.modal-close');
  const modalCancel = deleteModal.querySelector('.modal-cancel');
  const modalConfirm = deleteModal.querySelector('.modal-confirm');

  modalClose.addEventListener('click', function () {
    deleteModal.remove();
  });

  modalCancel.addEventListener('click', function () {
    deleteModal.remove();
  });

  modalConfirm.addEventListener('click', async function () {
    deleteModal.remove();
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


