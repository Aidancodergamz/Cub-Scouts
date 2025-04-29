const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('navLinks');

hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    navLinks.classList.add('mobile'); // Ensure it has the mobile class
    hamburger.classList.toggle('open');
});