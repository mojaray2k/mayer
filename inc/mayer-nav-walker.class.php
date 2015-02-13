<?php
/**
 * Creates an HTML list of nav menu items that introduces multi-levels into Bootstrap 2.0 menus.
 *
 * @package		Mayer
 * @since		1.0.0
 * @uses 		Walker
 */
class Mayer_Nav_Walker extends Walker_Nav_Menu {

	/**
	 * Each time an element is the child of the prior element, this is called.
	 *
	 * @param	string   $output	The opening unordered list for the menu.
	 * @param	int      $depth	    The level of depth at which the menu is being called.
	 * @param	array    $args	    The arguments passed to be added to the menu item
     * @since   1.0.0
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {

		if ( 1 <= $depth ) {
			$output .= apply_filters( 'walker_nav_menu_start_lvl', '<ul class="dropdown-menu submenu-hide">', $depth, $args );
		} else {
			$output .= apply_filters( 'walker_nav_menu_start_lvl', '<ul class="dropdown-menu">', $depth, $args );
		}

	}

	/**
	 * Each time an individual element is processed, start_el is called.
	 *
	 * @param	string   $output     The actual menu item to output.
	 * @param	string   $item	     The menu item that's being processed.
	 * @param	int      $depth	     The level of depth at which this item is being written.
	 * @param	array    $args	     The arguments passed to be added to the menu item
     * @since   1.0.0
	 */
	function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {

		$css_classes = implode( ' ', $object->classes );

		// If the target is specified, then let's add it to the anchor
		$target = isset( $object->target ) && '' != $object->target ? ' target="_blank" ' : '';

		// If a title was specified, let's add it to the anchor
		$title = '' == $object->attr_title ? 'title="' . $object->title . '"' : 'title="' . $object->attr_title . '"';

		// If the XFN was specified, add it to the anchor
		$xfn = '' == $object->xfn ? '' : 'rel="' . $object->xfn . '"';

		// If the current menu item has children, we need to set the proper class names on the list items
		// and the anchors. Parent menu items can't have blank targets.
		if( $args->has_children ) {

			if( $object->menu_item_parent == 0 ) {

				$menu_item = get_permalink() == $object->url ? '<li class="dropdown ' . $css_classes . '">' : '<li class="dropdown ' . $css_classes . '">';
					$menu_item .= '<a href="' . $object->url . '" class="dropdown-toggle" data-toggle="dropdown"' . ' ' . $title . ' ' . $xfn . ' ' . $target . '>';

			} else {

				$menu_item = '<li class="dropdown submenu ' . $css_classes . '">';
					$menu_item .= '<a href="' . $object->url . '" class="dropdown-toggle" data-toggle="dropdown"' . ' ' . $title . ' ' . $xfn . ' ' . $target . '>';

			}

		// Otherwise, it's business as usual.
		} else {

			$menu_item = get_permalink() == $object->url ? '<li class="active ' . $css_classes . '">' : '<li class="' . $css_classes . '">';
				$menu_item .= '<a href="' . $object->url . '"' . ' ' . $title . ' ' . $xfn . ' ' . $target . '>';

		}

		// Render the actual menu title
		$menu_item .= $object->title;

		// If the item has children, display the dropdown image
		if ( $args->has_children ) {
			$menu_item .= '<b class="caret"></b>';
		}

		// Close the anchor
		$menu_item .= '</a>';

		$output .= apply_filters ( 'nav_walker_start_el', $menu_item, $object, $depth, $args );

	}

	/**
	 * Set a value in the element's arguments that allow us to determine if the current menu item has children.
	 *
	 * @param	array    $element			The element that's being evaluated.
	 * @param	array    $children_elements	The child elements of the incoming element.
	 * @param	int      $max_depth			The level of depth at which this item is being written.
	 * @param	int      $depth				Optional. The depth at which we can evaluate the children.
	 * @param	array    $args				The arguments applied to this elemenet.
	 * @param	string   $output			The current rendering of this element.
	 * @link 	                            http://wordpress.stackexchange.com/a/16821/1014
	 * @since   1.0.0
	 */
	function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {

		$id_field = $this->db_fields['id'];
		if( is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
		}

		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );

	}

	/**
	 * Each time an element is processed, end_el is called after start_el
	 *
	 * @param	string   $output     The actual menu item to terminate.
	 * @param	int      $item	     The menu item that's being processed.
	 * @param	int      $depth	     The level of depth at which this item is being written.
	 * @param	array    $args	     The arguments passed to be added to the menu item
	 * @since	1.0.0
	 */
	function end_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
		$output .= apply_filters( 'nav_walker_end_el', '</li>', $object, $depth, $args );
	}

	/**
	 * Each time an element is no longer below on of the current parents, this is called.
	 *
	 * @param	string   $output	The actual menu item to terminate.
	 * @param	int      $depth	    The level of depth at which this item is being written.
	 * @param	array    $args	    The arguments passed to be added to the menu item
	 * @since	1.0.0
	 */
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= apply_filters( 'nav_walker_end_lvl', '</ul>', $depth, $args );
	}

}