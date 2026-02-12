const tableContainer = document.querySelector('.table-content');

tableContainer.addEventListener('click', function (event) {
  event.preventDefault();

  if (event.target.closest('.table-element')) {
    const tableElement = event.target.closest('.table-element');
    const endpoint = tableElement.dataset.endpoint;

    fetch(endpoint)
      .then(response => response.json())
      .then(data => {

        document.dispatchEvent(new CustomEvent('show-element', {
          detail: {
            element: data.element
          }
        }));
      })
      .catch(error => console.error(error));
  }
});
