<?php

namespace Affiliation\Affiliation\PageType;

use PageController;
use SilverStripe\ORM\DataObject;
use SilverStripe\Blog\Model\BlogPost;

class HomePageController extends PageController
{
	public function BlogPosts() {
		$posts = BlogPost::get()
			->limit(3);
		return $posts;
	}
}
