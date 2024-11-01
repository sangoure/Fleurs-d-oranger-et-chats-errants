<?php

get_header();
?>

    <main id="primary" class="site-main">
        <!--Section “Banner” : Cette section contient plusieurs éléments :
        Image de fond (<img class="banner__background">) :
        L’image est chargée à partir du fichier banner.png 
        situé dans le répertoire des ressources (assets/images).
        (<video class="banner__video">) : La vidéo est chargée à partir du fichier Studio.mp4 situé dans le même répertoire.
        L’attribut autoplay indique que la vidéo doit démarrer automatiquement.
        L’attribut muted désactive le son de la vidéo.
        L’attribut loop permet à la vidéo de se répéter en boucle -->
        <section class="banner">
        <img class="banner__background" src="<?php echo get_theme_file_uri() . '/assets/images/banner.png'; ?>" alt="">

        <video class="banner__video" width="1440" autoplay="autoplay" muted=""
                    loop="infinite">
                    <source src="<?php echo get_theme_file_uri() . '/assets/video/Studio.mp4'; ?>" type="video/mp4">
            </video>
            <img class="banner__logo" data-aos="fade-up"  data-aos-duration="3000"  src="<?php echo get_template_directory_uri() . '/assets/images/logo.png'; ?> " alt="logo Fleurs d'oranger & chats errants">
        </section>
        <!-- Le contenu de cette section est masqué (classe “hidden”) et apparaîtra avec une animation de fondu vers le haut (data-aos="fade-up"). -->
       
            <section id="#story" class="story hidden"  data-aos="fade-up"  data-aos-duration="3000">
            <h2 ><span data-aos="fade-up"  data-aos-duration="3000">L'histoire</span></h2>


            <article id="" class="story__article">
                <!-- À l’intérieur de l’article, il y a un paragraphe (<p>) qui affiche le contenu stocké dans la variable story -->

                <p><?php echo get_theme_mod('story'); ?></p>
            </article>
            <?php

$args = array(
    'post_type' => 'characters',
    'posts_per_page' => -1,
    'meta_key'  => '_main_char_field',
    'orderby'   => 'meta_value_num',
    
);
/* script affiche le contenu de la variable story 
et récupère des informations sur les personnages pour les afficher dans une galerie.
Dans ce conteneur, une galerie d’images de personnages 
est affichée à l’aide d’une bibliothèque appelée “Swiper”.
*/
            $characters_query = new WP_Query($args);
            ?>


  <article id="characters"   data-aos="fade-up"  data-aos-duration="3000"
     data-aos-duration="3000">
  <h3 class="moi"><span  data-aos="fade-up"  data-aos-duration="3000">Les personnages</span></h3>

  <div class="main-character">
    
            
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php
                        //  Cette boucle parcourt toutes les publications récupérées par la requête $characters_query.
                        while ( $characters_query->have_posts() ) {
                            // Prépare les données de la publication actuelle pour être utilisées dans la boucle.
                            $characters_query->the_post();
                            /* Crée un élément figure avec la classe swiper-slide pour chaque publication.
                             Chaque figure représente une diapositive dans le carrousel.*/
                            echo '<figure class="swiper-slide">';
                            // Affiche l’image en vedette de la publication actuelle. La taille de l’image est définie sur ‘full’.
                            echo get_the_post_thumbnail( get_the_ID(), 'full' );
                            echo '<figcaption>';
                            the_title();
                            echo'</figcaption>';
                            echo '</figure>';
                        
                        }
                        ?>
                    </div>
                </div>
                
                    </div>
                   
            </article>
            
            
            <!-- data-aos :
            Cet attribut est utilisé pour ajouter des animations lors du défilement (scroll) de la page.
            La valeur de data-aos spécifie le type d’animation à appliquer.
            la valeur est "fade-up", ce qui signifie que la section “Studio Koukaki” 
            apparaîtra en fondu vers le haut lorsque l’utilisateur fera défiler la page. -->
            <article id="place" data-aos="fade-up" data-aos-duration="3000">
              
            <div class="imagenuage" >
               
                <img class="nuage-1" id="cloud"   src="<?php echo get_theme_file_uri() . '/assets/images/big_cloud.png'; ?>" alt="Gros nuage qui passe">
  
                <img class="nuage-2 " src="<?php echo get_theme_file_uri() . '/assets/images/little_cloud.png'; ?>" alt="Petit nuage qui passe">
                </div>
                
                <div>
                    <h3><span data-aos="fade-up"  data-aos-duration="3000">Le Lieu</span></h3>
                    <p><?php echo get_theme_mod('place'); ?></p>
                    
                </div>
               
                        
            </article>
                </section>
            <!-- L’attribut data-aos est utilisé pour ajouter des animations lors du défilement 
                (scroll) de la page. Dans ce cas, l’animation “fade-up” 
                est appliquée avec une durée de 3000 millisecondes. 
                l’animation “fade-up” fait en sorte que la section “Studio Koukaki”
                apparaisse progressivement lorsque l’utilisateur fait défiler la page vers le haut-->
                <section id="studio" data-aos="fade-up" data-aos-duration="3000">
                <section id="studio" data-aos="fade-up" data-aos-duration="3000"> 
            <h2> <span data-aos="fade-up"  data-aos-duration="3000">Studio Koukaki</span></h2>
           
            <div>
                <p>Acteur majeur de l’animation, Koukaki est un studio intégré fondé en 2012 qui créé, produit et distribue des programmes originaux dans plus de 190 pays pour les enfants et les adultes. Nous avons deux sections en activité : le long métrage et le court métrage. Nous développons des films fantastiques, principalement autour de la culture de notre pays natal, le Japon.</p>
                <p>Avec une créativité et une capacité d’innovation mondialement reconnues, une expertise éditoriale et commerciale à la pointe de son industrie, le Studio Koukaki se positionne comme un acteur incontournable dans un marché en forte croissance. Koukaki construit chaque année de véritables succès et capitalise sur de puissantes marques historiques. Cette année, il vous présente “Fleurs d’oranger et chats errants”.</p>
            </div>
            </section>
        
            <section  class="nom-osca" id="nom-osca"  >
            <div class="oscr-nomination" >
            <img  src="<?php echo get_theme_file_uri() . '/assets/images/orange_characters_bg.png'; ?>" alt="fond du titre des nominations">
            <h3>Fleurs d’oranger & chats errants est nominé aux Oscars Short Film Animated de 2022 !</h3>
            </div>
            
            <img  src="<?php echo get_theme_file_uri() . '/assets/images/oscars-2021.png'; ?>" alt="Nomination aux Oscars 2022" >
            
        </section>
       
    </main><!-- #main -->
  
 
<?php
        

        
get_footer();