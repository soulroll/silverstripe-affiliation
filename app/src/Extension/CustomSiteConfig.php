<?php

namespace Affiliation\Affiliation\Extension;

use SilverStripe\ORM\DataExtension;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
use Affiliation\Affiliation\Model\HeaderContactDetail;
use Affiliation\Affiliation\Model\FooterLink;
use SilverStripe\Forms\ToggleCompositeField;
use Heyday\ColorPalette\Fields\ColorPaletteField;
use SilverStripe\Assets\File;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;

class CustomSiteConfig extends DataExtension
{
	/**
	 * @var array
	 */
	private static $db = array(
		'GACode' => 'Varchar(16)',
		'AlertTitle' => 'Varchar(32)',
		'AlertType' => 'Varchar(255)',
		'AlertBody' => 'HTMLText',
		'AlertToggle' => 'Boolean',
		'SiteFacebook' => 'Text',
		'SiteTwitter' => 'Text',
		'SiteLinkedin' => 'Text',
		'SiteInstagram' => 'Text',
		'SiteYoutube' => 'Text',
		'SiteVimeo' => 'Text',
		'SiteNavigation' => 'Varchar(255)',
		'SiteCopyright' => 'Text',
		'SiteColor' => 'Text',
		'SiteFont' => 'Text',
		'ShowDemoTogglePanel' => 'Boolean'
	);

	/**
	 * @var array
	 */
	private static $has_one = array(
		'SiteLogo' => Image::class,
		'SiteRetinaLogo' => Image::class,
		'FavIcon' => File::class,
		'AppleTouchIcon144' => File::class,
		'AppleTouchIcon114' => File::class,
		'AppleTouchIcon72' => File::class,
		'AppleTouchIcon57' => File::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $has_many = array(
		'HeaderContactDetail' => HeaderContactDetail::class,
		'FooterLink' => FooterLink::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $owns = array(
		'SiteLogo',
		'FavIcon',
		'AppleTouchIcon144',
		'AppleTouchIcon114',
		'AppleTouchIcon72',
		'AppleTouchIcon57'
	);

	/**
	 * @return FieldList
	 */
	public function updateCMSFields(FieldList $fields)
	{
		$fields->addFieldsToTab('Root.Main', array(
			TextField::create('GACode', 'Google Analytics account')
				->setDescription('Account number to be used all across the site (in the format <strong>UA-XXXXX-X</strong>)')
		));

		$fields->addFieldsToTab('Root.Main', array(
			UploadField::create('SiteLogo', 'Logo')
				->setDescription('Logo, dimensions of 280x95 to appear in the top left.')
				->setAllowedExtensions(array('jpg','jpeg','png','gif'))
		));

		$fields->addFieldsToTab('Root.Main', array(
			UploadField::create('SiteLogoRetina', 'Logo Retina')
				->setDescription('Recommended to be twice the height and width of the standard logo.')
				->setAllowedExtensions(array('jpg','jpeg','png','gif'))
		));

		$fields->addFieldsToTab('Root.LogosIcons', array(
			UploadField::create('FavIcon', 'Favicon')
				->setDescription('Favicon, in .ico format, dimensions of 16x16, 32x32, or 48x48')
				->setAllowedExtensions(array('ico'))
		));

		$fields->addFieldsToTab('Root.LogosIcons', array(
			UploadField::create('AppleIconField144', 'AppleIconField144')
				->setDescription('Apple Touch Web Clip and Windows 8 Tile Icon (dimensions of 144x144, PNG format)')
				->setAllowedExtensions(array('png'))
		));

		$fields->addFieldsToTab('Root.LogosIcons', array(
			UploadField::create('AppleIconField72', 'AppleIconField72')
				->setDescription('Apple Touch Web Clip Icon (dimensions of 72x72, PNG format)')
				->setAllowedExtensions(array('png'))
		));

		$fields->addFieldsToTab('Root.LogosIcons', array(
			UploadField::create('AppleIconField57', 'AppleIconField57')
				->setDescription('Apple Touch Web Clip Icon (dimensions of 57x57, PNG format)')
				->setAllowedExtensions(array('png'))
		));

		$fields->addFieldsToTab('Root.Alerts', [
			CheckboxField::create('AlertToggle', 'Show Customer Alert?'),
			TextField::create('AlertTitle', 'Title'),
			DropdownField::create(
				'AlertType',
				'Alert type',
				[
					'primary' => 'Primary',
					'secondary' => 'Secondary',
					'success' => 'Success',
					'danger' => 'Danger',
					'warning' => 'Warning',
					'info' => 'Info',
					'light' => 'Light',
					'dark' => 'Dark'
				],
				'primary'
			),
			HTMLEditorField::create('AlertBody', 'Body text')
				->setRows(10)
		]);

		$fields->addFieldsToTab('Root.Main', array(
			DropdownField::create(
				'SiteNavigation',
				'Navigation',
				[
					'Left' => 'Left',
					'Justified' => 'Justified',
					'Right' => 'Right',
					'Megamenu' => 'Megamenu'
				],
				'Left'
			)->setDescription('Style of the main site navigation.')
		));

		$fields->addFieldsToTab('Root.Main', array(
			TextField::create('SiteCopyright', 'Copyright')
		));

		$fields->addFieldsToTab('Root.Header', array(
			GridField::create(
				'HeaderContactDetail',
				'Contact detail',
				$this->owner->HeaderContactDetail(),
				GridFieldConfig_RecordEditor::create()
				->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		));

		$fields->addFieldsToTab('Root.Footer', array(
			GridField::create(
				'FooterLink',
				'Footer link',
				$this->owner->FooterLink(),
				GridFieldConfig_RecordEditor::create()
				->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		));

		$fields->addFieldsToTab('Root.Main', array(
			ColorPaletteField::create('SiteColor','Theme colour',
				array(
					'theme-light-green' => '#558B2F',
					'theme-green' => '#2E7D32',
					'theme-blue' => '#0277BD',
					'theme-navy' => '#002E4C',
					'theme-teal' => '#00796b',
					'theme-cyan' => '#00838f',
					'theme-red' => '#e74c3c',
					'theme-orange' => '#f7941e',
					'theme-purple' => '#6A1B9A',
					'theme-brown' => '#6D4C41'
				)
			)
		));

		$fields->addFieldsToTab('Root.Main', array(
			DropdownField::create(
				'SiteFont',
				'Font family',
				[
					'roboto' => 'Roboto',
					'nunito-sans' => 'Nunito Sans',
					'fira-sans' => 'Fira Sans',
					'merriweather' => 'Merriweather'
				],
				'Roboto'
			)
		));

		$fields->addFieldsToTab('Root.Main', array(
			CheckboxField::create(
				'ShowDemoTogglePanel',
				'Show demo toggle panel'
			)
		));

		$fields->addFieldsToTab('Root.SocialMedia', array(
			TextField::create('SiteFacebook', 'Facebook')
				->setDescription('Facebook link (everything after the "https://facebook.com/", eg https://facebook.com/username or http://facebook.com/pages/108510539573)'),
			TextField::create('SiteTwitter', 'Twitter')
				->setDescription('Twitter username (eg, http://twitter.com/<b>username</b>)'),
			TextField::create('SiteLinkedin', 'Linked In')
				->setDescription('e.g. https://www.linkedin.com/231451 where 231451 is your Linked In page'),
			TextField::create('SiteInstagram', 'Instagram')
				->setDescription('e.g. https://www.instagram.com/423561 where 423561 is your Instagram page'),
			TextField::create('SiteYoutube', 'Youtube')
				->setDescription('e.g. https://www.youtube.com/753213 where 753213 is your Youtube page'),
			TextField::create('SiteVimeo', 'Vimeo')
				->setDescription('e.g. https://www.vimeo.com/876543 where 876543 is your Vimeo page')
		));
	}

	/**
	 * Auto-publish any images attached to the SiteConfig object if it's not versioned. Versioned objects will
	 * handle their related objects via the "owns" API by default.
	 */
	public function onAfterWrite()
	{
		if (!$this->owner->hasExtension(Versioned::class)) {
			$this->owner->publishRecursive();
		}
	}

}
