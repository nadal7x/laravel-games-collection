document.addEventListener('show-delete-modal', function (event) {
  const endpoint = event.detail.endpoint;
  const elementId = event.detail.elementId;

  console.log(endpoint);
  console.log(elementId);

  const deleteModal = document.createElement('div');
  deleteModal.classList.add('delete-modal');
  deleteModal.innerHTML = `
    <div class="delete-modal-content">
      <div class="delete-modal-header">
        <h2>Eliminar</h2>
        <button class="delete-modal-close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>window-close</title><path d="M13.46,12L19,17.54V19H17.54L12,13.46L6.46,19H5V17.54L10.54,12L5,6.46V5H6.46L12,10.54L17.54,5H19V6.46L13.46,12Z" /></svg></button>
      </div>
      <div class="delete-modal-body">
        <p>¿Estás seguro de que quieres eliminar este elemento?</p>
      </div>
      <div class="delete-modal-footer">
        <button class="delete-modal-confirm">Eliminar</button>
        <button class="delete-modal-cancel">Cancelar</button>
      </div>
    </div>
  `;
  document.body.appendChild(deleteModal);

  const deleteModalClose = deleteModal.querySelector('.delete-modal-close');
  const deleteModalCancel = deleteModal.querySelector('.delete-modal-cancel');
  const deleteModalConfirm = deleteModal.querySelector('.delete-modal-confirm');

  deleteModalClose.addEventListener('click', function () {
    deleteModal.remove();
  });

  deleteModalCancel.addEventListener('click', function () {
    deleteModal.remove();
  });

  deleteModalConfirm.addEventListener('click', function () {
    deleteModal.remove();
  });

});
