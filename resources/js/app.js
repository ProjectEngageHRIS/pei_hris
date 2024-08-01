// import './bootstrap';
import 'flowbite';
import { initFlowbite } from 'flowbite';
// import { Livewire } from "../../vendor/livewire/livewire/dist/livewire.esm";



window.addEventListener('app:scroll-to', (ev) => {
    ev.stopPropagation();
  
    const selector = ev?.detail?.query;
  
    if (!selector) {
      return;
    }
  
    const el = window.document.querySelector(selector);
  
    if (!el) {
      return;
    }
  
    try {
      el.scrollIntoView({
        behavior: 'smooth',
      });
    } catch {}
  
  }, false);


// Import necessary modules and styles
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

// Initialize Swiper
document.addEventListener('DOMContentLoaded', function () {
  const swiper = new Swiper('.swiper', {
    slidesPerView: 3,
    spaceBetween: 10,
    loop: true,
    modules: [Navigation, Pagination],
    height: 100,
    pagination: {
      el: '.swiper-pagination',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  });

  // Dropdown menu functionality
  document.querySelectorAll('.dropdown').forEach(function (dropdown) {
    dropdown.addEventListener('mouseenter', function () {
      let dropdownContent = this.querySelector('.dropdown-content');
      dropdownContent.style.display = 'block';
      setTimeout(function () {
        dropdownContent.style.opacity = '1';
      }, 0); // Adding a slight delay to ensure display block is set
    });

    dropdown.addEventListener('mouseleave', function () {
      let dropdownContent = this.querySelector('.dropdown-content');
      dropdownContent.style.opacity = '0';
      setTimeout(function () {
        dropdownContent.style.display = 'none';
      }, 500); // Delay to match the transition duration
    });
  });

  document.querySelectorAll('.dropdown-content').forEach(function (dropdownContent) {
    dropdownContent.addEventListener('mouseenter', function () {
      let parentDropdown = this.parentElement;
      parentDropdown.classList.add('hover');
      this.style.display = 'block';
      this.style.opacity = '1';
    });

    dropdownContent.addEventListener('mouseleave', function () {
      let parentDropdown = this.parentElement;
      parentDropdown.classList.remove('hover');
      this.style.opacity = '0';
      setTimeout(() => {
        this.style.display = 'none';
      }, 300); // Delay to match the transition duration
    });
  });

  // Scroll to functionality
  window.addEventListener('app:scroll-to', (ev) => {
    ev.stopPropagation();

    const selector = ev?.detail?.query;

    if (!selector) {
      return;
    }

    const el = window.document.querySelector(selector);

    if (!el) {
      return;
    }

    try {
      el.scrollIntoView({
        behavior: 'smooth',
      });
    } catch {}

  }, false);


Livewire.hook('commit', ({ component, commit, respond, succeed, fail }) => {
    succeed(({ snapshot, effect }) => {
        queueMicrotask(() => {
            initFlowbite();
        })
    })
})

document.addEventListener('livewire:navigated', () => {
    // console.log("Navigated");
    // Livewire.();

    initFlowbite();

})

// document.addEventListener("livewire:navigated", () => {
//   console.log("Navigated");
// });

  // // Cursor wait button functionality
  // document.getElementById('navButton').addEventListener('click', function() {
  //   this.classList.add('cursor-wait');
  //   this.disabled = true;

  //   setTimeout(() => {
  //       this.classList.remove('cursor-wait');
  //       this.disabled = false;
  //   }, 10000);
  // });

});