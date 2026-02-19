const menuButton = document.querySelector('.menu-button');
const menuContent = document.querySelector('.menu-content');
const formContainer = document.querySelector('.form');
const tableContainer = document.querySelector('.table');

menuButton.addEventListener('click', () => {
  menuContent.classList.toggle('active');
  menuButton.classList.toggle('active');
});

document.querySelectorAll('.nav a').forEach(link => {
  link.addEventListener('click', () => {
    menuContent.classList.remove('active');
    menuButton.classList.remove('active');
  });
});


menuContent.addEventListener('click', async (event) => {
  const link = event.target.closest('.fetch-link');
  if (link) {

    event.preventDefault();
    const endpoint = link.href;

    try {
      const response = await fetch(endpoint, {
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'Accept': 'application/json'
        }
      });

      if (!response.ok) throw new Error(`HTTP ${response.status}`);

      const data = await response.json();

      if (data.form && formContainer) {
        formContainer.innerHTML = data.form;
      }
      if (data.table && tableContainer) {
        tableContainer.innerHTML = data.table;
      }


    } catch (error) {
      console.error('Error al hacer fetch del enlace:', error);
    }
  }
});