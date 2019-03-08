<?php

namespace Affiliation\Affiliation\PageType;

use Page;
use SilverStripe\Forms\TextAreaField;
use SilverStripe\Forms\DropdownField;

class LandingPage extends Page
{
	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'LandingPage';

	/**
	 * @var array
	 * @config
	 */
	private static $db = array(
		'MegamenuDescription' => 'Varchar(255)'
	);

	/**
	 * @var string
	 * @config
	 */
	private static $description = 'Generic landing page. Allows visibility of children pages.';

	/**
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldsToTab('Root.Main', array(
			TextAreaField::create('MegamenuDescription', 'Megamenu Description')
		));
		return $fields;
	}
}
