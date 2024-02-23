// Navbar Fixed
window.onscroll = function () {
    const header = document.querySelector("header");
    const fixedNav = header.offsetTop;
    const toTop = document.querySelector("#to-top");

    if (window.pageYOffset > fixedNav) {
        header.classList.add("navbar-fixed");
        toTop.classList.remove("hidden");
        toTop.classList.add("flex");
    } else {
        header.classList.remove("navbar-fixed");
        toTop.classList.remove("flex");
        toTop.classList.add("hidden");
    }
};
// Hamburger
const hamburger = document.querySelector("#hamburger");
const navMenu = document.querySelector("#nav-menu");

hamburger.addEventListener("click", function () {
    hamburger.classList.toggle("hamburger-active");
    navMenu.classList.toggle("hidden");
});

// Klik di luar hamburger
window.addEventListener("click", function (e) {
    if (e.target != hamburger && e.target != navMenu) {
        hamburger.classList.remove("hamburger-active");
        navMenu.classList.add("hidden");
    }
});

// slider card
document.addEventListener("DOMContentLoaded", function () {
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const sliderWrapper = document.querySelector(".slider-wrapper");

    let slidePosition = 0;

    function updateSlidePosition() {
        sliderWrapper.style.transition = "transform 1s ease";
        sliderWrapper.style.transform = `translateX(-${slidePosition}px)`;
    }

    nextBtn.addEventListener("click", () => {
        const productCards = document.querySelectorAll(".product-card");
        const slideWidth = productCards[0].offsetWidth;

        if (slidePosition < slideWidth * (productCards.length - 1)) {
            slidePosition += slideWidth;
        } else {
            slidePosition = 0;
        }

        updateSlidePosition();
    });

    prevBtn.addEventListener("click", () => {
        const productCards = document.querySelectorAll(".product-card");
        const slideWidth = productCards[0].offsetWidth;

        if (slidePosition > 0) {
            slidePosition -= slideWidth;
        } else {
            slidePosition = slideWidth * (productCards.length - 1);
        }

        updateSlidePosition();
    });
});
