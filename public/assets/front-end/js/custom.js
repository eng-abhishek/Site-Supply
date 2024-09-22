var swiper = new Swiper(".swiper-container", {
   slidesPerView: 1.5,
   spaceBetween: 10,
   centeredSlides: true,
   freeMode: true,
   grabCursor: true,
   loop: true,
   pagination: {
     el: ".swiper-pagination",
     clickable: true
   },
   autoplay: {
     delay: 4000,
     disableOnInteraction: false
   },
   navigation: {
     nextEl: ".swiper-button-next",
     prevEl: ".swiper-button-prev"
   },
   breakpoints: {
     500: {
       slidesPerView: 1
     },
     700: {
       slidesPerView: 7.5
     }
   }
 });
 
 $(document).ready(function() {
    $('.minus').click(function () {
      var $input = $(this).parent().find('input');
      var count = parseInt($input.val()) - 1;
      count = count < 1 ? 1 : count;
      $input.val(count);
      $input.change();
      return false;
    });
    $('.plus').click(function () {
      var $input = $(this).parent().find('input');
      $input.val(parseInt($input.val()) + 1);
      $input.change();
      return false;
    });
  });


  function openreview(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }