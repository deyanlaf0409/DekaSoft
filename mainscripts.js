document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        
        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);

        
        const offsetTop = targetElement.offsetTop;
        const headerHeight = document.querySelector('header').offsetHeight;
        const offset = offsetTop - headerHeight;

        
        window.scrollTo({
            top: offset,
            behavior: 'smooth'
        });
    });
});



function closeDropdown() {
    document.querySelector('.dropdown-btn').classList.remove('active');
}

document.querySelector('.dropdown-btn').addEventListener('click', function () {
    this.classList.toggle('active');
});


document.querySelectorAll('.dropdown-content a').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        closeDropdown();
    });
});