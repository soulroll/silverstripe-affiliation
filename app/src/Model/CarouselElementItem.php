<?php

namespace Affiliation\Affiliation\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ArrayList;
use SilverStripe\Versioned\Versioned;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\OptionsetField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextAreaField;
use UncleCheese\DisplayLogic\Forms\Wrapper;
use Affiliation\Affiliation\Element\CarouselElement;

class CarouselElementItem extends DataObject
{
	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'CarouselElementItem';

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
	 * Config variable for slider source default field mappings
	 *
	 * @var array
	 * @config
	 */
	private static $slide_source_map = [
		[
			'label' => 'Image',
			'field' => 'ImageID'
		],
		[
			'label' => 'YouTube',
			'field' => 'YouTubeID'
		],
		[
			'label' => 'Vimeo',
			'field' => 'VimeoID'
		]
	];

	/**
	 * @var array
	 * @config
	 */
	private static $db = array(
		'SortOrder' => 'Int',
		'Title' => 'Text',
		'Caption' => 'Varchar(255)',
		'YouTubeID' => 'Varchar(255)',
		'VimeoID' => 'Varchar(255)'
	);

	/**
	 * @var array
	 * @config
	 */
	private static $has_one = array(
		'CarouselElement' => CarouselElement::class,
		'Image' => Image::class,
		'YouTubeImage' => Image::class,
		'VimeoImage' => Image::class
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
		$fields->removeFieldFromTab('Root.Main', 'CarouselElementID');
		$fields->removeFieldFromTab('Root.Main', 'SortOrder');
		$fields->removeFieldFromTab('Root.Main', 'Title');
		$fields->removeFieldFromTab('Root.Main', 'Caption');
		$fields->removeFieldFromTab('Root.Main', 'Heading');
		$fields->removeFieldFromTab('Root.Main', 'Image');
		$fields->removeFieldFromTab('Root.Main', 'YouTubeID');
		$fields->removeFieldFromTab('Root.Main', 'VimeoID');
		$fields->removeFieldFromTab('Root.Main', 'YouTubeImage');
		$fields->removeFieldFromTab('Root.Main', 'VimeoImage');
		$fields->addFieldsToTab(
			'Root.Main',
			[
				OptionsetField::create('Type', 'Type', $this->getSourceTypes('label'))
					->setValue($this->getSourceDefault()),

				Wrapper::create(
					UploadField::create('Image', 'Image')
						->setDescription('Sizes: &nbsp;&nbsp; Full (2560 x 560) &nbsp;&nbsp;&nbsp; Boxed (1100 x 500) &nbsp;&nbsp;&nbsp; Half (634 x 300)')
						->setAllowedFileCategories('image')
						->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'))
						->setFolderName('Carousel Images')
				)->hideUnless('Type')->isEqualTo('ImageID')->end(),

				Wrapper::create(
					TextField::create('YouTubeID', 'YouTube')
						->setDescription('Please type the YouTube ID (e.g. tdKMEfvkrFw)'),
					UploadField::create('YouTubeImage', 'YouTube Thumbnail Image')
						->setAllowedFileCategories('image')
						->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'))
						->setFolderName('Carousel YouTube Images')
				)->hideUnless('Type')->isEqualTo('YouTubeID')->end(),

				Wrapper::create(
					TextField::create('VimeoID', 'Vimeo')
						->setDescription('Please type the Vimeo ID (e.g. 191882529)'),
					UploadField::create('VimeoImage', 'Vimeo Thumbnail Image')
						->setAllowedFileCategories('image')
						->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'))
						->setFolderName('Carousel Vimeo Images')
				)->hideUnless('Type')->isEqualTo('VimeoID')->end(),

				TextField::create('Title','Title'),
				TextAreaField::create('Caption','Caption')
			]
		);

		return $fields;
	}

	/**
	 * @return SS_Map
	 */
	private function getSourceTypes()
	{
		$map = $this->config()->get('slide_source_map');

		return ArrayList::create($map)->map('field', 'label');
	}

	/**
	 * Returns the correct radio-button default for the "Type" field.
	 *
	 * @return string
	 */
	public function getSourceDefault()
	{
		$types = $this->getSourceTypes();

		foreach ($types as $field => $label) {
			if (!empty($this->getField($field))) {
				return $field;
			}
		}

		return 'ImageID';
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
