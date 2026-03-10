

const filterModal = document.querySelector('.modal.filter-modal');

const modalClose = filterModal.querySelector('.modal-close');
const modalCancel = filterModal.querySelector('.modal-cancel');
const modalConfirm = filterModal.querySelector('.modal-confirm');


modalClose.addEventListener('click', function () {
  filterModal.classList.remove('active');
});

modalCancel.addEventListener('click', function () {
  filterModal.classList.remove('active');
});

modalConfirm.addEventListener('click', async function (e) {
  e.preventDefault();

  filterModal.classList.remove('active');
  const form = document.querySelector('.filter-modal form');

  const formData = new FormData(form);
  const params = new URLSearchParams(formData).toString();

  const url = `${form.dataset.endpoint}?${params}`;

  try {
    const response = await fetch(url, {
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json'
      }
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

});


