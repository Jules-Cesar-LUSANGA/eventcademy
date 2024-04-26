import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    // Obtenez une référence au bouton du menu utilisateur
    const userMenuButton = document.getElementById('user-menu-button');

    // Obtenez une référence au menu déroulant
    const dropdownMenu = document.getElementById('links');

    // Ajoutez un écouteur d'événements au bouton du menu utilisateur
    userMenuButton.addEventListener('click', function () {
        // Basculer la visibilité du menu déroulant
        dropdownMenu.classList.toggle('hidden');
    });
});


document.addEventListener('DOMContentLoaded', function () {
    // Obtenez une référence au bouton du menu hamburger
    const hamburgerButton = document.querySelector('.sm\\:hidden button');

    // Obtenez une référence au menu mobile
    const mobileMenu = document.getElementById('mobile-menu');

    // Ajoutez un écouteur d'événements au bouton du menu hamburger
    hamburgerButton.addEventListener('click', function () {
        // Basculer la visibilité du menu mobile
        mobileMenu.classList.toggle('hidden');
    });
});
