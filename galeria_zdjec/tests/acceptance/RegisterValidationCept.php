<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('check what happens when you don\'t fill form');
$I->amOnPage('/register');

$I->click('//*[@id="app"]/main/div/div/div/div/div[2]/form/div[5]/div/button');

$I->see("Register");
$I->see("Name");
$I->see("Address");
$I->see("Password");
$I->see("Confirm Password");

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

$I->fillField("password", "123");
$I->fillField("password_confirmation", "123");
$I->click('//*[@id="app"]/main/div/div/div/div/div[2]/form/div[5]/div/button');
$I->see("The password must be at least 7 characters.", "strong");
