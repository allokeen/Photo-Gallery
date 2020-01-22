<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('see hidden content after login, dont see anyone\'s photos');

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
    "password" => password_hash($password, PASSWORD_DEFAULT)
]);

$I->haveInDatabase("users", [
    "name" => $name,
    "email" => "mail@com.com",
    "password" => password_hash($password, PASSWORD_DEFAULT)
]);

$I->haveInDatabase("photos", [
    "filename" => "randomPhoto",
    "description" => "randomDesc",
    "user_id" => $I->grabFromDatabase("users", "id", ["name" => $name, "email" => $email])
]);

$I->haveInDatabase("photos", [
    "filename" => "randomPhoto2",
    "description" => "randomDesc2",
    "user_id" => $I->grabFromDatabase("users", "id", ["email" => "mail@com.com"])
]);

$I->fillField("email", $email);
$I->fillField("password", $password);

$I->click("//*[@id=\"app\"]/main/div/div/div/div/div[2]/form/div[4]/div/button");
$I->seeCurrentUrlEquals("/photos");
$I->see($name);

$I->wait(0);
$photoId = $I->grabFromDatabase("photos", "filename", ["user_id" => $I->grabFromDatabase("users", "id", ["name" => $name, "email" => $email])]);
$I->seeInSource($photoId);
$photoId2 = $I->grabFromDatabase("photos", "filename", ["user_id" => $I->grabFromDatabase("users", "id", ["email" => "mail@com.com"])]);
$I->dontSeeInSource($photoId2);
$I->click("//*[@id=\"navbarDropdown\"]");
$I->click("//*[@id=\"navbarSupportedContent\"]/ul[2]/li/div/a");
$I->see("Login");
$I->see("Register");
