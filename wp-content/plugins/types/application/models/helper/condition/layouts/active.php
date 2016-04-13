<?php


class Types_Helper_Condition_Layouts_Active extends Types_Helper_Condition {

	public function valid() {
		if( defined( 'WPDDL_DEVELOPMENT' ) )
			return true;

		return false;
	}

}