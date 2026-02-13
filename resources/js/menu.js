const menuButton = document.querySelector('.menu-button');
const menuContent = document.querySelector('.menu-content');

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
