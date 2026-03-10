import { store } from './redux/store';
import { updateForm } from './redux/crud-slice';

const tableContainer = document.querySelector('.table');

store.subscribe(() => {
  const currentState = store.getState();

  if (currentState.crud.table && tableContainer) {
    tableContainer.innerHTML = currentState.crud.table;
  }

});

if (tableContainer) {
  tableContainer.addEventListener('click', function (event) {
    event.preventDefault();

    if (event.target.closest('.table-element')) {
      const tableElement = event.target.closest('.table-element');
      const endpoint = tableElement.dataset.endpoint;
      console.log(endpoint);

      fetch(endpoint)
        .then(response => response.json())
        .then(data => {
          store.dispatch(updateForm(data.form));
        })
        .catch(error => console.error(error));
    }

    if (event.target.closest('.filter-button')) {
      const filterModal = document.querySelector('.modal.filter-modal');
      filterModal.classList.add('active');
      filterModal.querySelector('form').reset();
    }

  });
};
