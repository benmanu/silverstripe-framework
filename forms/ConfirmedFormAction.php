<?php

/**
 * @package forms
 * @subpackage actions
 */

/**
 * Action button with confirmation text.
 * These button are useful for things like delete buttons.
 * @package forms
 * @subpackage actions
 */
class ConfirmedFormAction extends FormAction {
	protected $confirmation;
	
	/**
	 * Create a new action button.
	 * @param action The method to call when the button is clicked
	 * @param title The label on the button
	 * @param confirmation The message to display in the confirmation box?
	 * @param form The parent form, auto-set when the field is placed inside a form 
	 */
	function __construct($action, $title = "", $confirmation = "Are you sure?", $form = null) {
		$this->confirmation = $confirmation;
		parent::__construct($action, $title, $form);
	}
	function Field() {
		$attributes = array(
			'type' => 'submit',
			'class' => $this->extraClass(),
			'id' => $this->id(),
			'name' => $this->Name(),
			'value' => $this->attrTitle(),
			'tabindex' => $this->getTabIndexHTML(),
			'onclick' => "return confirm('$this->confirmation');"
		);
		
		return $this->createTag('input', $attributes);
	}
}


?>