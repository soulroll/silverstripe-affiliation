<?php

namespace Affiliation\Affiliation\PageType;

use Page;
use Affiliation\Affiliation\PageType\LandingPage;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextAreaField;

class BlocksPage extends Page
{
	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'BlocksPage';

	/**
	 * @var array
	 * @config
	 */
	private static $db = array(
		'MegamenuDescription' => 'Varchar(255)'
	);

	/**
	 * @var string
	 * @config
	 */
	private static $description = 'A modular page composed of content blocks.';

	/**
	 * @var array
	 * @config
	 */
	private static $has_one = array(
		'LandingPageSummaryImage' => Image::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $owns = array(
		'LandingPageSummaryImage'
	);

	/**
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		if ($this->Parent() instanceof LandingPage) {
			$fields->addFieldsToTab('Root.Main', array(
				TextAreaField::create('LandingPageSummary', 'Landing Page Summary'),
				UploadField::create('LandingPageSummaryImage', 'Landing Page Summary Image')
					->setDescription('Image size: 150 x 150')
					->setAllowedFileCategories('image')
					->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'))
					->setFolderName('Landing Page Images')
			));
		}
		return $fields;
	}

}
