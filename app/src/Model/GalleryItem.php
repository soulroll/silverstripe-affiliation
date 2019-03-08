<?php

namespace Affiliation\Affiliation\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextAreaField;
use Affiliation\Affiliation\PageType\ComponentsPage;

class GalleryItem extends DataObject
{
	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'GalleryItem';

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
		$fields->removeFieldFromTab('Root.Main', 'SortOrder');
		$fields->removeFieldFromTab('Root.Main', 'Title');
		$fields->removeFieldFromTab('Root.Main', 'Caption');
		$fields->removeFieldFromTab('Root.Main', 'Heading');

		$fields->addFieldsToTab(
			'Root.Main',
			[
				UploadField::create('Image', 'Gallery Image')
					->setDescription('Image size: 800 x 600')
					->setAllowedFileCategories('image')
					->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'))
					->setFolderName('Gallery Images'),
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
