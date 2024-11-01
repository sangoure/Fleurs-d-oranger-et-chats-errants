
<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    /*Définit l’effet de transition entre les diapositives.
     Ici, l’effet “coverflow” est utilisé, 
     ce qui donne un effet 3D aux diapositives.*/
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto", /*Définit le nombre de diapositives visibles.
     “auto” ajuste automatiquement le nombre de diapositives visibles en fonction de la taille de l’écran.*/
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
    pagination: {
      el: ".swiper-pagination",
    },
  });
</script>
/*
Ce script configure un carrousel d’images avec un effet coverflow, une lecture automatique,
 et une pagination. Les diapositives sont centrées et peuvent être glissées avec un curseur de saisie.*/
