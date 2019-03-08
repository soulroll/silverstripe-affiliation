<?php

namespace Affiliation\Affiliation\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\OptionsetField;
use SilverStripe\ORM\ArrayList;
use UncleCheese\DisplayLogic\Forms\Wrapper;
use SilverStripe\SiteConfig\SiteConfig;

class HeaderContactDetail extends DataObject
{

	/**
	 * Config variable for slider source default field mappings
	 *
	 * @var array
	 * @config
	 */
	private static $slide_source_map = [
		[
			'label' => 'Email',
			'field' => 'EmailID'
		],
		[
			'label' => 'Number',
			'field' => 'NumberID'
		]
	];

	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'HeaderContactDetail';

	/**
	 * @var string
	 * @config
	 */
	private static $default_sort = "SortOrder";

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
		Versioned::class . '.versioned'
	);

	/**
	 * @var array
	 * @config
	 */
	private static $db = array(
		'SortOrder'=>'Int',
		'Type' => 'Text',
		'Number' => 'Text',
		'Email' => 'Text'
	);

	/**
	 * @var array
	 * @config
	 */
	private static $has_one = array (
		'SiteConfig' => SiteConfig::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $summary_fields = array (
		'Type' => 'Type',
		'Number' => 'Number',
		'Email' => 'Email',
	);

	/**
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = new FieldList(

			OptionsetField::create('Type', 'Type', $this->getSourceTypes('label'))
				->setValue($this->getSourceDefault()),

			Wrapper::create(
				TextField::create('Email', 'Email')
					->setDescription('Email goes here')
			)->hideUnless('Type')->isEqualTo('EmailID')->end(),

			Wrapper::create(
				TextField::create('Number', 'Number')
					->setDescription('Number goes here')
			)->hideUnless('Type')->isEqualTo('NumberID')->end()

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

		return 'NumberID';
	}


}
