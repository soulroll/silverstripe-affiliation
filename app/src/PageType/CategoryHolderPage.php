<?php

namespace Affiliation\Affiliation\PageType;

use Page;

class CategoryHolderPage extends Page
{
	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'CategoryHolderPage';

	/**
	 * @var array
	 * @config
	 */
	private static $allowed_children = array(
		CategoryPage::class
	);

	/**
	 * @return FieldList
	 */
	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->removeFieldFromTab('Root.Main', 'Content');
		return $fields;
	}
}
