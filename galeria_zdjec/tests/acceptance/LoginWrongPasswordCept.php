<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('see error when wrong password is entered');

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

$I->haveInDatabase("users", [
    "name" => $name,
    "email" => $email,
    "password" => $password
]);

$I->fillField("email", $email);
$I->fillField("password", "wrong");

$I->click("//*[@id=\"app\"]/main/div/div/div/div/div[2]/form/div[4]/div/button");

$I->seeCurrentUrlEquals("/login");
$I->see("These credentials do not match our records.");
$I->seeInField("email", $email);
