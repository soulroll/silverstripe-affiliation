<?php

namespace Affiliation\Affiliation\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\SiteConfig\SiteConfig;

class FooterLink extends DataObject
{
	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'FooterLink';

	/**
	 * @var string
	 * @config
	 */
	private static $default_sort = "SortOrder";

	/**
	 * @var array
	 * @config
	 */
	private static $db = array(
		'Title' => 'Varchar(100)',
		'SortOrder'=>'Int'
	);

	/**
	 * @var array
	 * @config
	 */
	private static $has_one = array (
		'SiteConfig' => SiteConfig::class,
		'PageLink'  => SiteTree::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $summary_fields = array (
		'Title' => 'Title',
		'PageLink.Title' => 'Link'
	);

	/**
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = new FieldList(
			TextField::create('Title', 'Title'),
			TreeDropdownField::create(
				'PageLinkID',
				'What page does this link to?',
				SiteTree::class
			)
		);
		return $fields;
	}

}
