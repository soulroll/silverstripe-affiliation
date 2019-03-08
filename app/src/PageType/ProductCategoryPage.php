<?php

namespace Affiliation\Affiliation\PageType;

use Page;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextAreaField;

class ProductCategoryPage extends Page
{
	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'ProductCategoryPage';

	/**
	 * @var array
	 * @config
	 */
	private static $has_one = array(
		'Image' => Image::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $allowed_children = array(
		ProductPage::class,
		ProductCategoryPage::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $owns = array(
		'Image'
	);

	/**
	 * @return FieldList
	 */
	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->addFieldsToTab(
			'Root.Main',
			[
				UploadField::create('Image', 'Product Image')
					->setDescription('Image size: 640 x 480')
					->setAllowedFileCategories('image')
					->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'))
					->setFolderName('Card Images'),
				TextAreaField::create('Description','Description')
			],
			'Content'
		);

		$fields->removeFieldFromTab('Root.Main', 'Content');

		return $fields;
	}
}
