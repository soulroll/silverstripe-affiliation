<?php

namespace Affiliation\Affiliation\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use Affiliation\Affiliation\Element\AccordionElement;

class AccordionElementItem extends DataObject
{
	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'AccordionElementItem';

	/**
	 * @var string
	 * @config
	 */
	private static $default_sort = 'SortOrder';

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
		Versioned::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $db = array(
		'SortOrder' => 'Int',
		'Title' => 'Text',
		'Content' => 'HTMLText'
	);

	/**
	 * @var array
	 * @config
	 */
	private static $has_one = array(
		'AccordionElement' => AccordionElement::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $summary_fields = array(
		'Title' => 'Title',
		'Content' => 'Content'
	);

	/**
	 * @return FieldList
	 */
	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->removeFieldFromTab('Root.Main', 'SortOrder');
		$fields->removeFieldFromTab('Root.Main', 'AccordionElementID');
		$fields->addFieldToTab('Root.Main', new TextField('Title'));
		$fields->addFieldToTab('Root.Main', new HtmlEditorField('Content'));
		return $fields;
	}

}
