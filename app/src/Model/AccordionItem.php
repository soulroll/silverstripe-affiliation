<?php

namespace Affiliation\Affiliation\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextAreaField;
use Affiliation\Affiliation\PageType\ComponentsPage;

class AccordionItem extends DataObject
{
	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'AccordionItem';

	/**
	 * @var string
	 * @config
	 */
	private static $default_sort = 'SortOrder';

	/**
	 * @var array
	 * @config
	 */
	private static $db = array(
		'SortOrder' => 'Int',
		'Title' => 'Varchar(255)',
		'Content' => 'Varchar(255)'
	);

	/**
	 * @var array
	 * @config
	 */
	private static $has_one = array(
		'ComponentsPage' => ComponentsPage::class
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

		$fields->removeFieldFromTab('Root.Main', 'ComponentsPageID');
		$fields->removeFieldFromTab('Root.Main', 'SortOrder');
		$fields->removeFieldFromTab('Root.Main', 'Title');
		$fields->removeFieldFromTab('Root.Main', 'Content');

		$fields->addFieldsToTab(
			'Root.Main',
			[
				TextField::create('Title','Title'),
				TextAreaField::create('Content','Content')
			]
		);

		return $fields;
	}

}
