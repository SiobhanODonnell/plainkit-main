document.addEventListener('DOMContentLoaded', () => {
    const elements = document.querySelectorAll('.fade-in');
    elements.forEach(element => {
        element.classList.add('visible');
    });
});
