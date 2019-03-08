<?php

use SilverStripe\Security\PasswordValidator,
    SilverStripe\Security\Member,
    SilverStripe\ORM\Search\FulltextSearchable;

// remove PasswordValidator for SilverStripe 5.0
$validator = PasswordValidator::create();
$validator->setMinLength(8);
$validator->setHistoricCount(6);
Member::set_password_validator($validator);
FulltextSearchable::enable();
