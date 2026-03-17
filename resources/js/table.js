import { store } from './redux/store';
import { updateForm, updateTable } from './redux/crud-slice';

const tableContainer = document.querySelector('.table');

store.subscribe(() => {
  const currentState = store.getState();

  if (currentState.crud.table && tableContainer) {
    tableContainer.innerHTML = currentState.crud.table;
  }

});

if (tableContainer) {
  tableContainer.addEventListener('click', async event => {

    if (event.target.closest('.table-element')) {
      event.preventDefault();
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

    // Filter button
    if (event.target.closest('.filter-button')) {
      event.preventDefault();
      const filterModal = document.querySelector('.modal.filter-modal');
      filterModal.classList.add('active');
      filterModal.querySelector('form').reset();

    }
    if (event.target.closest('.filter-modal .modal-close') || event.target.closest('.filter-modal .modal-cancel')) {
      event.preventDefault();
      const filterModal = document.querySelector('.modal.filter-modal');
      filterModal.classList.remove('active');
    }

    if (event.target.closest('.filter-modal .modal-confirm')) {
      event.preventDefault();

      const filterModal = document.querySelector('.modal.filter-modal');

      filterModal.classList.remove('active');
      const form = document.querySelector('.filter-modal form');

      const formData = new FormData(form);
      const params = new URLSearchParams(formData).toString();

      const url = `${form.dataset.endpoint}?${params}`;

      try {
        const response = await fetch(url, {
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
          },
          method: 'GET',
        });

        if (!response.ok) {
          throw response;
        }

        const data = await response.json();


        document.dispatchEvent(new CustomEvent('reset-crud', {
          detail: {
            data: data
          }
        }));

      } catch (error) {
        console.error(error);
      }
    }

    // Pagination buttons
    if (event.target.closest('.pagination-button')) {
      event.preventDefault();

      const paginationButton = event.target.closest('.pagination-button')

      if (paginationButton.classList.contains('disabled')) {
        return
      }

      try {

        let endpoint = paginationButton.dataset.pagination;

        const response = await fetch(endpoint, {
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
          },
          method: 'GET',
        })

        if (response.status === 500) {
          throw response
        }

        const json = await response.json()
        store.dispatch(updateTable(json.table))

      } catch (error) {
        console.error(error);
      }
    }

  });

};
