const tableContainer = document.querySelector('.table');
const formContainer = document.querySelector('.form');

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
          formContainer.innerHTML = data.form;
        })
        .catch(error => console.error(error));
    }
  });
};
