<?php

namespace Affiliation\Affiliation\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\CMS\Model\SiteTree;
use Affiliation\Affiliation\PageType\HomePage;

class PopularLink extends DataObject
{
	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'PopularLink';

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
		'Title' => 'Varchar(255)'
	);

	/**
	 * @var array
	 * @config
	 */
	private static $has_one = array(
		'HomePage' => HomePage::class,
		'InternalURL' => SiteTree::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $summary_fields = array(
		'Title' => 'Title'
	);

	/**
	 * @return FieldList
	 */
	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->removeFieldFromTab('Root.Main', 'HomePageID');
		$fields->removeFieldFromTab('Root.Main', 'SortOrder');
		$fields->removeFieldFromTab('Root.Main', 'Title');
		$fields->removeFieldFromTab('Root.Main', 'InternalURLID');

		$fields->addFieldsToTab(
			'Root.Main',
			[
				TextField::create('Title','Title')
			]
		);

		$fields->addFieldsToTab('Root.Main', TreeDropdownField::create(
			'InternalURLID',
			'Page link',
			SiteTree::class
		));

		return $fields;
	}

	/**
	 * @return string
	 */
	public function Link()
	{
		if (!$this->InternalURL()->exists()) {
			return '';
		}

		return $this->InternalURL()->Link();
	}

}
