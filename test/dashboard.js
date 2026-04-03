// DATE
document.addEventListener("DOMContentLoaded", function () {
    let today = new Date();

    let options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };

    document.getElementById("todayDate").innerText =
        today.toLocaleDateString('en-IN', options);
});

// SIDEBAR ACTIVE
const navItems = document.querySelectorAll('.sidebar-item');

navItems.forEach(item => {
    item.addEventListener('click', function () {
        navItems.forEach(i => i.classList.remove('active-link'));
        this.classList.add('active-link');
    });
});