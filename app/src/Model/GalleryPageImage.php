<?php

namespace Affiliation\Affiliation\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use Affiliation\Affiliation\PageType\GalleryPage;

class GalleryPageImage extends DataObject
{
	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'GalleryPageImage';

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
		'Title' => 'Text',
		'Caption' => 'Text'
	);

	/**
	 * @var array
	 * @config
	 */
	private static $has_one = array(
		'GalleryPage' => GalleryPage::class,
		'Image' => Image::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $owns = array(
		'Image',
	);

	/**
	 * @var array
	 */
	private static $summary_fields = array(
		'Image.CMSThumbnail' => 'Image',
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
		$fields->removeFieldFromTab('Root.Main', 'GalleryPageID');
		$fields->addFieldsToTab(
			'Root.Main',
			[
				// The fields for the upload
				UploadField::create('Image', 'Image')
					->setDescription('Image size: 800 x 600')
					->setAllowedFileCategories('image')
					->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'))
					->setFolderName('Gallery')
			]
		);
		$fields->addFieldToTab('Root.Main', new TextField('Title'));
		$fields->addFieldToTab('Root.Main', new TextField('Caption'));
		return $fields;
	}

}
