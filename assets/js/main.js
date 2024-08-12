document.addEventListener("DOMContentLoaded", function() {
    var phone = document.querySelector('.contact-phone');
    if (phone) {
        var phoneText = phone.textContent || phone.innerText;
        phone.innerHTML = phoneText;
    }
});
