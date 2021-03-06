<?php
/*
*	WeightBasedShipping_Variation extends Variation
*/
class WeightBasedShipping_Variation extends DataExtension {
	public static $db = array(
		'Weight' => 'Decimal(8,4)'
	);

	public static $has_one = array(
	);

	public static $has_many = array(
	);

	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldsToTab('Root.Variation', array(
			TextField::create('Weight', 'Weight (kgs)')
		), 'Status');

		return $fields;
	}

	public function FullWeight(){
		$weight = $this->owner->Weight;

		$this->owner->extend('updateFullWeight', $weight);

		return $weight;
	}
}
