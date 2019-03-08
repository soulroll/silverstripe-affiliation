<?php

namespace Affiliation\Affiliation\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextAreaField;
use Affiliation\Affiliation\Element\SliderElement;

class SliderElementItem extends DataObject
{
	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'SliderElementItem';

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
		'Title' => 'Varchar(255)',
		'Caption' => 'Varchar(255)'
	);

	/**
	 * @var array
	 * @config
	 */
	private static $has_one = array(
		'SliderElement' => SliderElement::class,
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
		$fields->removeFieldFromTab('Root.Main', 'SortOrder');
		$fields->removeFieldFromTab('Root.Main', 'SliderElementID');
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
