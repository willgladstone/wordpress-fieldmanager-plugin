<?php

/**
 * @package Fieldmanager
 */

/**
 * Plugin Psuedo field
 * The only class function required below is form-element but other usefull functions have been added
 * You can overwrite this class entirely with your plugin class.
 * @package Fieldmanager
 */
class Fieldmanager_Plugin extends Fieldmanager_Field {

	/**
	 * @var string
	 * Override field_class
	 */
	public $field_class = 'plugin';

	/**
	 * Override constructor to add chosen.js maybe
	 * @param array $options
	 */
	public function __construct( $options = array() ) {
		$this->attributes = array(
			'size' => '1'
		);
		// Add a Fieldmanager Plugin javascript library
		fm_add_script( 'fm_plugin_js', 'js/fieldmanager-plugin.js' );

		parent::__construct( $options );
	}

	/**
	 * Pseudo form element
	 * @param mixed $value
	 * @return string HTML
	 */
	public function form_element( $value = '' ) {
		//Add any form element here.  This is a hidden field for example
		return sprintf(
			'<input class="fm-element" type="hidden" name="%s" id="%s" value="%s" data-value=\'%s\' %s />',
			$this->get_form_name(),
			$this->get_element_id(),
			htmlspecialchars( $value ),
			( $value == null ) ? "" : json_encode( $value ), // For applications where options may be dynamically provided. This way we can still provide the previously stored value to a Javascript.
			$this->get_element_attributes()
		);
	}

	/**
	 * Manipulate the data before it is saved to post meta
	 * @param array $values new post values
	 * @param array $current_values existing post values
	 */
	public function presave_alter_values( $values, $current_values = array() ) {
		return $values;
	}

	/**
	 * Override presave function
	 * @param mixed $value
	 * @return mixed proper value
	 */
	public function presave( $value = NULL, $current_value = array() ) {
			return $value;
	}

}