<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/register');

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
$I->fillField("password_confirmation", $password);

$I->dontSeeInDatabase("users", ["name" => $name, "email" => $email]);
$I->click('//*[@id="app"]/main/div/div/div/div/div[2]/form/div[5]/div/button');
$I->seeInDatabase("users", ["name" => $name, "email" => $email]);
$I->seeCurrentUrlEquals('/home');
