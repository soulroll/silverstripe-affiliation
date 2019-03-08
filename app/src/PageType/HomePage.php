<?php

namespace Affiliation\Affiliation\PageType;

use Page;
use Affiliation\Affiliation\PageType\ProductPage;
use SilverStripe\Taxonomy\TaxonomyTerm;

class HomePage extends Page
{

	/**
	 * @var string
	 * @config
	 */
	private static $icon = 'app/icons/home.png';

	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'HomePage';

	/**
	 * @var string
	 * @config
	 */
	private static $description = 'Entry to the site.';

	/**
	 * @var string
	 * @config
	 */
	private static $singular_name = 'Home Page';

	/**
	 * @var string
	 * @config
	 */
	private static $plural_name = 'Home Pages';

	/**
	 * @var array
	 * @config
	 */
	private static $many_many = array(
		'Terms' => TaxonomyTerm::class
	);

	public function FeaturedProducts() {
		//these do the same thing, pick on
		//
		//get the terms, then the pages
		$term = TaxonomyTerm::get()
			->filter(['Name' => 'Featured'])
			->first();
		//or get the pages, with the terms
		// $pages = $term->ProductPages();
		$pages = ProductPage::get()->filter([
			'Terms.Name' => ['Featured']
		]);
		return $pages;
	}

	public function LatestDeals() {
		//these do the same thing, pick on
		//
		//get the terms, then the pages
		$term = TaxonomyTerm::get()
			->filter(['Name' => 'Latest deals'])
			->first();
		//or get the pages, with the terms
		// $pages = $term->ProductPages();
		$pages = ProductPage::get()->filter([
			'Terms.Name' => ['Latest deals']
		]);
		return $pages;
	}

	public function ClothingDeals() {
		//these do the same thing, pick on
		//
		//get the terms, then the pages
		$term = TaxonomyTerm::get()
			->filter(['Name' => 'Clothing deals'])
			->first();
		//or get the pages, with the terms
		// $pages = $term->ProductPages();
		$pages = ProductPage::get()->filter([
			'Terms.Name' => ['Clothing deals']
		]);
		return $pages;
	}

	/**
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		return $fields;
	}
}
