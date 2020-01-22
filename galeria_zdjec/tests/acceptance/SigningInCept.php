<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/');
$I->seeInTitle("PseudoInstagram");

$email = "john.doe@example.com";
$password = "john123";

$I->amOnPage('/login');
$I->seeInTitle("PseudoInstagram");
$I->see("Login");
$I->see("Password");
$I->see("e-mail");
$I->fillField("email", $email);
$I->fillField("password", $password);
