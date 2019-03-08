<?php

namespace Affiliation\Affiliation\Extension;

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use	SilverStripe\Forms\CheckboxField;
use	SilverStripe\Forms\GridField\GridField;
use	SilverStripe\Forms\GridField\GridFieldConfig;
use	SilverStripe\Forms\GridField\GridFieldToolbarHeader;
use	SilverStripe\Forms\GridField\GridFieldAddNewButton;
use	SilverStripe\Forms\GridField\GridFieldSortableHeader;
use	SilverStripe\Forms\GridField\GridFieldDataColumns;
use	SilverStripe\Forms\GridField\GridFieldPaginator;
use	SilverStripe\Forms\GridField\GridFieldEditButton;
use	SilverStripe\Forms\GridField\GridFieldDeleteAction;
use	SilverStripe\Forms\GridField\GridFieldDetailForm;
use	SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use	UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
use	Affiliation\Affiliation\Model\UserformContactDetail;

class UserDefinedFormSidebar extends DataExtension
{
	/**
	 * @var array
	 */
	private static $db = array(
		'Icons' => 'Boolean',
		'Address' => 'Text',
		'Email' => 'Text',
		'Phone' => 'Text',
		'Mobile' => 'Text',
		'GoogleMapsLink' => 'Text',
		'Monday' => 'Text',
		'Tuesday' => 'Text',
		'Wednesday' => 'Text',
		'Thursday' => 'Text',
		'Friday' => 'Text',
		'Saturday' => 'Text',
		'Sunday' => 'Text'
	);

	/**
	 * @var array
	 * @config
	 */
	private static $has_many = array(
		'UserformContactDetail' => UserformContactDetail::class
	);

	/**
	 * @return FieldList
	 */
	public function updateCMSFields(FieldList $fields)
	{

		$fields->addFieldsToTab('Root.Sidebar', array(
			TextField::create('Address', 'Address')
		));

		$fields->addFieldsToTab('Root.OpeningHours', array(
			TextField::create('Monday', 'Monday'),
			TextField::create('Tuesday', 'Tuesday'),
			TextField::create('Wednesday', 'Wednesday'),
			TextField::create('Thursday', 'Thursday'),
			TextField::create('Friday', 'Friday'),
			TextField::create('Saturday', 'Saturday'),
			TextField::create('Sunday', 'Sunday')
		));

		$fields->addFieldsToTab('Root.GoogleMap', array(
			TextAreaField::create('GoogleMapsLink', 'Google maps link')
				->setDescription('The src link from the google iframe embed code')
		));

		$fields->addFieldsToTab('Root.Sidebar', array(
			CheckboxField::create('Icons', 'Show contact detail icons'),
			GridField::create(
				'UserformContactDetail',
				'Contact detail',
				$this->owner->UserformContactDetail(),
				GridFieldConfig_RecordEditor::create()
				->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		));

		return $fields;
	}
}
