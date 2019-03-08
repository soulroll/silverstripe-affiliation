<?php

namespace Affiliation\Affiliation\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\UserForms\Model\UserDefinedForm;

class UserformContactDetail extends DataObject
{

	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'UserformContactDetail';

	/**
	 * @var string
	 * @config
	 */
	private static $default_sort = "SortOrder";

	/**
	 * @var string
	 * @config
	 */
	private static $versioned_gridfield_extensions = true;

	/**
	 * @var array
	 * @config
	 */
	private static $extensions = array(
		Versioned::class . '.versioned'
	);

	/**
	 * @var array
	 * @config
	 */
	private static $db = array(
		'Type' => 'Varchar(255)',
		'SortOrder'=>'Int',
		'Label' => 'Text',
		'Number' => 'Text',
		'Email' => 'Text'
	);

	/**
	 * @var array
	 * @config
	 */

	private static $has_one = array (
		'UserDefinedForm' => UserDefinedForm::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $summary_fields = array (
		'Label' => 'Label',
		'Number' => 'Number',
		'Email' => 'Email'
	);

	/**
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = new FieldList(
			DropdownField::create(
				'Type',
				'Type',
				[
					'Number' => 'Number',
					'Email' => 'Email'
				],
				'Number'
			),
			TextField::create('Label', 'Label'),
			TextField::create('Number', 'Number'),
			TextField::create('Email', 'Email')
		);
		return $fields;
	}

}
