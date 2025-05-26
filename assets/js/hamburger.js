const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('navLinks');

hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    navLinks.classList.add('mobile'); 
    hamburger.classList.toggle('open');
});