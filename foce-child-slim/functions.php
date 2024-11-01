<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
// Cette ligne ajoute une action à WordPress lorsqu’ il enfile les scripts et les styles (CSS) sur la page
// Cette fonction est définie pour enregistrer et charger les styles CSS du thème.
// Elle utilise wp_enqueue_style() pour ajouter deux styles :
//   Le style principal du thème parent (défini dans le fichier style.css).
//   Le style spécifique du thème enfant (dans le dossier assets/css/theme.css)
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/assets/css/theme.css');
}

// Le code suivant vérifie si le thème actif est différent du thème parent
if (get_stylesheet() !== get_template()) {
    add_filter('pre_update_option_theme_mods_' . get_stylesheet(), function ($value, $old_value) {
        update_option('theme_mods_' . get_template(), $value);
        return $old_value;
    }, 10, 2);
    // Si c’est le cas, il ajoute des filtres pour synchroniser les options de personnalisation du thème parent avec le thème enfant.
    add_filter('pre_option_theme_mods_' . get_stylesheet(), function ($default) {
        return get_option('theme_mods_' . get_template(), $default);
    });
}


// Cette fonction est utilisée pour ajouter des animations AOS (Animate On Scroll) et swiper
// Elle enregistre et charge les fichiers CSS et JavaScript nécessaires pour AOS et swiper
add_action('wp_enqueue_scripts', 'add_aos_animation');
function add_aos_animation()
{
    wp_enqueue_style('AOS_animate', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css', false, null);
    wp_enqueue_script('AOS', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js', false, null, true);
    wp_enqueue_script('theme-js', get_stylesheet_directory_uri() . '/assets/js/aos_init.js', array('AOS'), null, true);
    wp_enqueue_script('Menu', get_stylesheet_directory_uri() . '/assets/js/menu.js', false, null, true);
    wp_enqueue_script('swiper_script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', false, null, true);
    wp_enqueue_script('swiper_init', get_stylesheet_directory_uri() . '/assets/js/swiper_init.js', false, null, true);
}
