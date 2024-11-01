(function () {
    "use strict";
  
    // Constantes de durée des transitions
    const transitionTimeMenu = 500;
    const transitionTimeImages = 700;
    const transitionTimeFast = 200;
  
    // Etat de base du menu (masqué)
    var openedMenu = document.querySelector(".opened-menu");
    openedMenu.style.display = "none";
    var affichagePage = true;
  
    // Clic sur l'icône du menu
    var boutonBurger = document.querySelector(".bouton-burger");
    var barsIcon = boutonBurger.querySelector(".bars");
    boutonBurger.addEventListener("click", function () {
      deroulementMenu();
    });
  
    // Clic sur un lien dans le menu
    openedMenu.addEventListener("click", function () {
      deroulementMenu();
    });
  
    // Animation du menu
    function deroulementMenu() {
      toggleElementDisplay(openedMenu, transitionTimeMenu); // Animation d'ouverture/fermeture du menu
      barsIcon.classList.toggle("change"); // Ajout/suppression de la classe "change" pour animer l'icône du menu
  
      // Menu fermé
      if (affichagePage) {
        fadeElement(document.getElementById("primary"), 0, transitionTimeMenu);
        delay(function () {
          fadeElement(document.querySelector(".images-menu img"), 1, transitionTimeImages);
        }, transitionTimeMenu);
        affichagePage = false;
      }
      // Menu ouvert
      else {
        delay(function () {
          fadeElement(document.getElementById("primary"), 1, transitionTimeFast);
        }, transitionTimeMenu);
        fadeElement(document.querySelector(".images-menu img"), 0, transitionTimeFast);
        affichagePage = true;
      }
    }
  
    // Fonction pour afficher ou masquer un élément avec une transition
    function toggleElementDisplay(element, transitionTime) {
      if (getComputedStyle(element).display === "none") {
        element.style.display = "block";
        element.style.transitionDuration = transitionTime + "ms";
      } else {
        element.style.display = "none";
      }
    }
  
    // Fonction pour animer la transparence d'un élément
    function fadeElement(element, opacity, transitionTime) {
      element.style.opacity = opacity;
      element.style.transitionDuration = transitionTime + "ms";
    }
  
    // Fonction pour retarder l'exécution d'une fonction
    function delay(func, delayTime) {
      setTimeout(func, delayTime);
    }
  
  })();

 // les nuages bougent en fonction du scroll
 
  window.addEventListener('scroll', function() {
    var cloud = document.getElementById('cloud');
    var articlePlace = document.getElementById('place');
    
    // Hauteur de l'article "place"
    var articleHeight = articlePlace.offsetHeight;
    
    // Point de départ de l'animation Cette propriété renvoie la distance entre le bord supérieur de l’élément articlePlace 
    // et le bord supérieur de son conteneur parent.
    var startAnimation = articlePlace.offsetTop - window.innerHeight + 300;
    
    // Point d'arrêt de l'animation
    var stopAnimation = articlePlace.offsetTop + articleHeight;
    
    // Position actuelle du scroll
    var scrollPosition = window.scrollY;
  
    // Si on est dans la plage de déclenchement
    if (scrollPosition > startAnimation && scrollPosition < stopAnimation) {
        // Calcul de la progression de l'animation (entre 0 et 1)
        var progress = (scrollPosition - startAnimation) / (stopAnimation - startAnimation);
  
        // Déplacement progressif de la div #cloud
        var displacement = 300 - 600 * progress;
        cloud.style.transform = 'translateX(' + displacement + 'px)';
      }

  });
   
 



 // accélération la rotation des fleures en scrollant

  const observertitlesOptions = {
    root: null,
  };
  
  const root = document.querySelector("body");
  window.addEventListener("scroll", () => {
    root.style.setProperty("--vitesseFleurs", "2s");
  });
  
  window.addEventListener("scrollend", () => {
    root.style.setProperty("--vitesseFleurs", "15s");
  });