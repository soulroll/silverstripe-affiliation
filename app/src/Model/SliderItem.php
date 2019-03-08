<?php

namespace Affiliation\Affiliation\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextAreaField;
use Affiliation\Affiliation\PageType\ComponentsPage;
use Affiliation\Affiliation\PageType\HomePage;

class SliderItem extends DataObject
{
	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'SliderItem';

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
		'Caption' => 'Varchar(255)'
	);

	/**
	 * @var array
	 * @config
	 */
	private static $has_one = array(
		'ComponentsPage' => ComponentsPage::class,
		'HomePage' => HomePage::class,
		'Image' => Image::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $summary_fields = array(
		'ImageThumb' => 'Image',
		'Title' => 'Title',
		'Caption' => 'Caption'
	);

	/**
	 * @return FieldList
	 */
	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->removeFieldFromTab('Root.Main', 'ComponentsPageID');
		$fields->removeFieldFromTab('Root.Main', 'HomePageID');
		$fields->removeFieldFromTab('Root.Main', 'SortOrder');
		$fields->removeFieldFromTab('Root.Main', 'Title');
		$fields->removeFieldFromTab('Root.Main', 'Caption');
		$fields->removeFieldFromTab('Root.Main', 'Heading');
		$fields->addFieldsToTab(
			'Root.Main',
			[
				UploadField::create('Image', 'Slider Image')
					->setDescription('Sizes: &nbsp;&nbsp; Full (2560 x 560) &nbsp;&nbsp;&nbsp; Boxed (1100 x 500) &nbsp;&nbsp;&nbsp; Half (634 x 300)')
					->setAllowedFileCategories('image')
					->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'))
					->setFolderName('Slider Images'),
				TextField::create('Title','Title'),
				TextAreaField::create('Caption','Caption')
			]
		);
		return $fields;
	}

	/**
	 * @return image
	 */
	public function getImageThumb()
	{
		if($this->Image()->exists()) {
			return $this->Image()->ScaleWidth(100);
		}

		return "(No image)";
	}

	/**
	 * @return string
	 */
	public function onAfterWrite()
	{
		$this->Image()->publishSingle();
	}

}
