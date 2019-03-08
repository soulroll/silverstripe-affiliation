<?php

namespace Affiliation\Affiliation\Extension;

use SilverStripe\ORM\DataExtension;
use Affiliation\Affiliation\PageType\ProductPage;

class TaxonomyTermExtension extends DataExtension
{
	private static $belongs_many_many = array(
		'ProductPages' => ProductPage::class
	);
}
