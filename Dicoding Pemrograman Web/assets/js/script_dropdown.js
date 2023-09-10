function navbarDropdown() {
    var navItems = document.querySelector(".nav-mobile");
    if (window.innerWidth <= 675) {
        if (navItems.style.display === "flex") {
            navItems.style.display = "none";
        } else {
            navItems.style.display = "flex";
        }
    }
}

window.addEventListener('resize', function () {
    if (window.innerWidth > 675) {
        var navItems = document.querySelector(".nav-mobile");
        navItems.style.display = "none";
    }
});

navbarDropdown();
