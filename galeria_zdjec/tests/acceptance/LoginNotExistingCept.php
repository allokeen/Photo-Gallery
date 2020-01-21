<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('see error when user does not exists');

$I->amOnPage("/login");

$I->seeInTitle("PseudoInstagram");
$I->see("E-Mail Address");
$I->see("Password");
$I->see("Remember me");
$I->see("Login");
$I->see("Forgot");

$name = "John";
$email = "john.doe@example.com";
$password = "john123";

$I->dontSeeInDatabase("users", [
    "name" => $name,
    "email" => $email,
]);

$I->fillField("email", $email);
$I->fillField("password", "john123");

$I->click("//*[@id=\"app\"]/main/div/div/div/div/div[2]/form/div[4]/div/button");

$I->seeCurrentUrlEquals("/login");
$I->see("These credentials do not match our records.");
$I->seeInField("email", $email);
