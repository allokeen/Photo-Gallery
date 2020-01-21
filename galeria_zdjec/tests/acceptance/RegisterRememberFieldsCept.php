<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('remember data entered during registration when validation error is present');
$I->amOnPage('/register');

$name = "John";
$email = "john.doe@example.com";
$password = "john123";
$password_confirmation = "john123";

$I->fillField("name", $name);
$I->fillField("email", $email);
$I->fillField("password", $password);
$I->fillField("password_confirmation", "wahgg");

$I->click('//*[@id="app"]/main/div/div/div/div/div[2]/form/div[5]/div/button');

$I->see("The password confirmation does not match.", "strong");
$I->seeInField("name", $name);
$I->seeInField("email", $email);

$I->amGoingTo("refresh page and see that old values have disappeared");
$I->amOnPage('/register');
$I->seeInField("name", "");
$I->seeInField("email", "");
$I->seeInField("password", "");
$I->seeInField("password_confirmation", "");
