<?php

namespace Affiliation\Affiliation\PageType;

use Page;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextAreaField;

class ProductCategoryHolderPage extends Page
{
	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'ProductCategoryHolderPage';

	/**
	 * @var array
	 * @config
	 */
	private static $allowed_children = array(
		ProductCategoryPage::class
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
