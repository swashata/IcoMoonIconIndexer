<?php
/**
 * This file has some sample functions written to generate
 *  - SELECT html (for class|attribute)
 *  - JavaScript JSON files (for class|attribute) for fontIconPicker
 * etc...
 *
 * Modify them according to your need
 */

function imii_generate_select_options( $icomoon_icons, $by = 'class' ) {
	$return = '';
	$by = strtolower( $by );
	foreach ( $icomoon_icons as $icons ) {
		$return .= '<optgroup label="' . htmlspecialchars( $icons['label'] ) . '">';
		if ( isset( $icons['elements'] ) ) {
			foreach ( $icons['elements'] as $ic_key => $ic_name ) {
				$val = $ic_key;
				if ( $by == 'class' ) {
					$val = htmlspecialchars( $icons['element_classes'][$ic_key] );
				} else if ( $by == 'unicode' ) {
					$val = '&#x' . dechex( $ic_key ) . ';';
				} else if ( $by == 'hex' ) {
					$val = dechex( $ic_key );
				}
				$return .= '<option value="' . $val . '">' . $ic_name . '</option>';
			}
		}
		$return .= '</optgroup>';
	}
	return $return;
}

function imii_generate_fip_source_json( $icomoon_icons, $by = 'class' ) {

}

function imii_generate_fip_search_json( $icomoon_icons ) {

}
