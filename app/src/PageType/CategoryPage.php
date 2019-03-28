<?php

namespace Affiliation\Affiliation\PageType;

use Page;

class CategoryPage extends Page
{
	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'CategoryPage';

	/**
	 * @var array
	 * @config
	 */
	private static $allowed_children = array(
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
