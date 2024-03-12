const toggleButton = document.querySelector('[data-collapse-toggle="navbar-solid-bg"]');
const mobileMenu = document.getElementById('navbar-solid-bg');

toggleButton.addEventListener('click', () => {
  mobileMenu.classList.toggle('hidden');
  mobileMenu.classList.toggle('block');
});


const carousel = document.querySelector('[data-carousel="static"]');
const carouselItems = Array.from(document.querySelectorAll('[data-carousel-item]'));
const prevButton = document.querySelector('[data-carousel-prev]');
const nextButton = document.querySelector('[data-carousel-next]');

let currentIndex = 0;

function showItem(index) {
    carouselItems.forEach((item, i) => {
        if (i === index) {
            item.classList.remove('hidden');
            item.classList.add('block');
        } else {
            item.classList.remove('block');
            item.classList.add('hidden');
        }
    });
}

prevButton.addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + carouselItems.length) % carouselItems.length;
    showItem(currentIndex);
});

nextButton.addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % carouselItems.length;
    showItem(currentIndex);
});

// Show the initial item
showItem(currentIndex);

document.addEventListener("DOMContentLoaded", function () {
    var prevScrollPos = window.pageYOffset;
    var navbar = document.querySelector(".sticky");

    window.onscroll = function () {
      var currentScrollPos = window.pageYOffset;

      if (prevScrollPos > currentScrollPos) {
        // Scroll ke atas, munculkan navbar
        navbar.style.transform = "translateY(0)";
      } else {
        // Scroll ke bawah, sembunyikan navbar
        navbar.style.transform = `translateY(-${navbar.offsetHeight}px)`;
      }

      prevScrollPos = currentScrollPos;
    };
  });

  document.addEventListener("DOMContentLoaded", function () {
    var backToTopButton = document.getElementById("backToTopBtn");
    var isScrollingDown = false;
  
    window.addEventListener("scroll", function () {
      var scrollPosition = window.scrollY || document.documentElement.scrollTop;
  
      if (scrollPosition > 20 && !isScrollingDown) {
        backToTopButton.style.opacity = "1";
        backToTopButton.style.fontSize = "14px"; // Adjust the font size as needed
        isScrollingDown = true;
      } else if (scrollPosition <= 20 && isScrollingDown) {
        backToTopButton.style.opacity = "0";
        backToTopButton.style.fontSize = "0px";
        isScrollingDown = false;
      }
    });
  
    backToTopButton.addEventListener("click", function () {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    });
  });
  