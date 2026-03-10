import { store } from './redux/store';
import { hideDeleteModal } from './redux/crud-slice';
let endpoint;
let formData;

const deleteModal = document.querySelector('.modal.delete-modal');


const modalClose = deleteModal.querySelector('.modal-close');
const modalCancel = deleteModal.querySelector('.modal-cancel');
const modalConfirm = deleteModal.querySelector('.modal-confirm');

store.subscribe(() => {
  const currentState = store.getState();

  if (currentState.crud.deleteModal && deleteModal) {
    if (currentState.crud.deleteModal.show) {
      deleteModal.classList.add('active');
      endpoint = currentState.crud.deleteModal.endpoint;
      formData = currentState.crud.deleteModal.formData;
    } else {
      deleteModal.classList.remove('active');
    }
  }
});

modalClose.addEventListener('click', function () {
  store.dispatch(hideDeleteModal());
});

modalCancel.addEventListener('click', function () {
  store.dispatch(hideDeleteModal());
});

modalConfirm.addEventListener('click', async function () {
  store.dispatch(hideDeleteModal());
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


