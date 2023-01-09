'use strict';


// notification toast variables
const notificationToast = document.querySelector('[data-toast]');




// mobile menu variables
const mobileMenuOpenBtn = document.querySelectorAll('[data-mobile-menu-open-btn]');
const mobileMenu = document.querySelectorAll('[data-mobile-menu]');
const mobileMenuCloseBtn = document.querySelectorAll('[data-mobile-menu-close-btn]');
const overlay = document.querySelector('[data-overlay]');

for (let i = 0; i < mobileMenuOpenBtn.length; i++) {

  // mobile menu function
  const mobileMenuCloseFunc = function () {
    mobileMenu[i].classList.remove('active');
    overlay.classList.remove('active');
  }

  mobileMenuOpenBtn[i].addEventListener('click', function () {
    mobileMenu[i].classList.add('active');
    overlay.classList.add('active');
  });

  mobileMenuCloseBtn[i].addEventListener('click', mobileMenuCloseFunc);
  overlay.addEventListener('click', mobileMenuCloseFunc);

}





// accordion variables
const accordionBtn = document.querySelectorAll('[data-accordion-btn]');
const accordion = document.querySelectorAll('[data-accordion]');

for (let i = 0; i < accordionBtn.length; i++) {

  accordionBtn[i].addEventListener('click', function () {

    const clickedBtn = this.nextElementSibling.classList.contains('active');

    for (let i = 0; i < accordion.length; i++) {

      if (clickedBtn) break;

      if (accordion[i].classList.contains('active')) {

        accordion[i].classList.remove('active');
        accordionBtn[i].classList.remove('active');

      }

    }

    this.nextElementSibling.classList.toggle('active');
    this.classList.toggle('active');

  });

}

function modulo(number, mod) {
  let result = number % mod;
  if (result < 0) {
    result += mod;
  }
  return result;
}

function setUpCarousel(carousel) {
  var i;
  var k = 0;      
  function handleNext() {
    currentSlide = modulo(currentSlide + 1, numSlides);
    changeSlide(currentSlide);
  }

  function handlePrevious() {
    currentSlide = modulo(currentSlide - 1, numSlides);
    changeSlide(currentSlide);
  }

  function changeSlide(slideNumber) {
    carousel.style.setProperty('--current-slide', slideNumber);
    for (i = 0; i < indicator.length; i++) {
      indicator[i].className = indicator[i].className.replace(" active", "");
    }
    indicator[slideNumber].className += " active";
  }

  // get elements
  const buttonPrevious = carousel.querySelector('[data-carousel-button-previous]');
  const buttonNext = carousel.querySelector('[data-carousel-button-next]');
  const slidesContainer = carousel.querySelector('[data-carousel-slides-container]');
  const indicator = carousel.querySelectorAll('[data-carousel-indicator]');
  for (i = 0; i < indicator.length; i++) {
    indicator[i].className = indicator[i].className.replace(" active", "");
  }

  // carousel state we need to remember
  let currentSlide = 0;
  const numSlides = slidesContainer.children.length;
  indicator[currentSlide].className += " active";
  
  indicator.forEach((item, index) => {
    item.addEventListener('click', arrow => {
      changeSlide(index);
    })
  })

  // set up events 
  function myLoop() {
    setTimeout(function() {
      handleNext(1);
      k++;
      if (k >= indicator.length) {
        k = 0;
      }
      myLoop();
    }, 5000)
  }
  myLoop();
  buttonPrevious.addEventListener('click', handlePrevious);
  buttonNext.addEventListener('click', handleNext);
}

const carousels = document.querySelectorAll('[data-carousel]');
carousels.forEach(setUpCarousel);


function setUpCarouselDetail(carousel) {
  var i;
  var k = 0;      
  function handleNext() {
    currentSlide = modulo(currentSlide + 1, numSlides);
    changeSlide(currentSlide);
  }

  function handlePrevious() {
    currentSlide = modulo(currentSlide - 1, numSlides);
    changeSlide(currentSlide);
  }

  function changeSlide(slideNumber) {
    carousel.style.setProperty('--current-slide', slideNumber);
    for (i = 0; i < indicator.length; i++) {
      indicator[i].className = indicator[i].className.replace(" active", "");
    }
    indicator[slideNumber].className += " active";
  }

  // get elements
  const buttonPrevious = carousel.querySelector('[data-carousel-button-previous]');
  const buttonNext = carousel.querySelector('[data-carousel-button-next]');
  const slidesContainer = carousel.querySelector('[data-carousel-slides-container]');
  const indicator = carousel.querySelectorAll('[data-carousel-indicator]');
  for (i = 0; i < indicator.length; i++) {
    indicator[i].className = indicator[i].className.replace(" active", "");
  }

  // carousel state we need to remember
  let currentSlide = 0;
  const numSlides = slidesContainer.children.length;
  indicator[currentSlide].className += " active";

  indicator.forEach((item, index) => {
    item.addEventListener('mouseover', arrow => {
      changeSlide(index);
    })
  })

  buttonPrevious.addEventListener('click', handlePrevious);
  buttonNext.addEventListener('click', handleNext);
}

const detailcarousels = document.querySelectorAll('[data-carousel-detail]');
detailcarousels.forEach(setUpCarouselDetail);
