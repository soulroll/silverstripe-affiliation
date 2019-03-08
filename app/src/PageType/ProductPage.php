<?php

namespace Affiliation\Affiliation\PageType;

use Page;
use SilverStripe\Taxonomy\TaxonomyTerm;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\ListboxField;
use SilverStripe\Forms\TextAreaField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
use Affiliation\Affiliation\Model\ProductImage;

class ProductPage extends Page
{
	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'ProductPage';

	/**
	 * @var string
	 * @config
	 */
	private static $description = 'Product page.';

	/**
	 * @var array
	 * @config
	 */
	private static $db = array(
		'ShortDescription' => 'Varchar(255)',
		'ProductLink' => 'Varchar(255)'
	);

	/**
	 * @var array
	 * @config
	 */
	private static $has_one = array(
		'MainProductImage' => Image::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $has_many = array(
		'ProductImages' => ProductImage::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $many_many = array(
		'Terms' => TaxonomyTerm::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $owns = array(
		'ProductImages',
		'MainProductImage'
	);

	/**
	 * @return FieldList
	 */
	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$taxonomyMap = TaxonomyTerm::get()->map("ID", "Name")->toArray();

		asort($taxonomyMap);

		$tags = ListboxField::create("Terms", "Tags", $taxonomyMap);

		$fields->addFieldToTab('Root.Main', $tags, 'Content');

		$fields->addFieldsToTab(
			'Root.Main',
			[
				UploadField::create('MainProductImage', 'Main product image')
					->setDescription('Image size: 700 x 600')
					->setAllowedFileCategories('image')
					->setAllowedExtensions(array('jpg', 'jpeg', 'png'))
					->setFolderName('Products'),
				TextField::create('ProductLink','Product link')
			],'Content'
		);

		$fields->addFieldsToTab(
			'Root.Images',
			[
				GridField::create(
					'ProductImages',
					'Product Images',
					$this->ProductImages(),
					GridFieldConfig_RecordEditor::create()
						->addComponent(new GridFieldSortableRows('SortOrder'))
				)
			]
		);

		return $fields;
	}

}
