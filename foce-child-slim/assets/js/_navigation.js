/**
 * Fichier navigation.js.
 *
 * Gère le basculement du menu de navigation pour les petits écrans et permet
 * la navigation avec la touche TAB pour les menus déroulants.
 */

( function() {
	const siteNavigation = document.getElementById( 'site-navigation' );

// Retourner immédiatement si la navigation n'existe pas.

	if ( ! siteNavigation ) {
		return;
	}

	const button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];

// Retourner immédiatement si le bouton n'existe pas.

	if ( 'undefined' === typeof button ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

// Masquer le bouton de basculement du menu si le menu est vide et retourner immédiatement.

	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}

	// Basculer la classe .toggled et la valeur aria-expanded à chaque clic sur le bouton.

	button.addEventListener( 'click', function() {
		siteNavigation.classList.toggle( 'toggled' );

		if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
			button.setAttribute( 'aria-expanded', 'false' );
		} else {
			button.setAttribute( 'aria-expanded', 'true' );
		}
	} );

// Supprimer la classe .toggled et définir aria-expanded à false lorsque l'utilisateur clique en dehors de la navigation.

	document.addEventListener( 'click', function( event ) {
		const isClickInside = siteNavigation.contains( event.target );

		if ( ! isClickInside ) {
			siteNavigation.classList.remove( 'toggled' );
			button.setAttribute( 'aria-expanded', 'false' );
		}
	} );
// Obtenir tous les éléments de lien dans le menu.

	const links = menu.getElementsByTagName( 'a' );

// Obtenir tous les éléments de lien avec des enfants dans le menu.

	const linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );
// Basculer le focus chaque fois qu'un lien de menu est focalisé ou défocalisé.

	for ( const link of links ) {
		link.addEventListener( 'focus', toggleFocus, true );
		link.addEventListener( 'blur', toggleFocus, true );
	}

// Basculer le focus chaque fois qu'un lien de menu avec des enfants reçoit un événement tactile.

	for ( const link of linksWithChildren ) {
		link.addEventListener( 'touchstart', toggleFocus, false );
	}

	/**
 * Ajoute ou supprime la classe .focus sur un élément.
 */

	function toggleFocus() {
		if ( event.type === 'focus' || event.type === 'blur' ) {
			let self = this;
		// Remonter à travers les ancêtres du lien actuel jusqu'à atteindre .nav-menu.

			while ( ! self.classList.contains( 'nav-menu' ) ) {
			// Sur les éléments li, basculer la classe .focus.

				if ( 'li' === self.tagName.toLowerCase() ) {
					self.classList.toggle( 'focus' );
				}
				self = self.parentNode;
			}
		}

		if ( event.type === 'touchstart' ) {
			const menuItem = this.parentNode;
			event.preventDefault();
			for ( const link of menuItem.parentNode.children ) {
				if ( menuItem !== link ) {
					link.classList.remove( 'focus' );
				}
			}
			menuItem.classList.toggle( 'focus' );
		}
	}
}() );






