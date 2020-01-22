<?php

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Contracts\Filesystem;

$I = new AcceptanceTester($scenario);
$I->wantTo('check if photo is added correctly');

$I->amGoingTo("log in");
$I->amOnPage("/login");

$name = "John";
$email = "john.doe@example.com";
$password = "john123";

$I->haveInDatabase("users", [
    "name" => $name,
    "email" => $email,
    "password" => password_hash($password, PASSWORD_DEFAULT)
]);

$I->haveInDatabase("photos", [
    "filename" => "randomPhoto",
    "description" => "randomDesc",
    "user_id" => $I->grabFromDatabase("users", "id", ["name" => $name, "email" => $email])
]);

$I->fillField("email", $email);
$I->fillField("password", $password);

$I->click("//*[@id=\"app\"]/main/div/div/div/div/div[2]/form/div[4]/div/button");

$I->wantTo("add photo");

$I->click("//*[@id=\"app\"]/main/div/a[1]");
//$I->fillField("//*[@id=\"filename\"]", "/home/student/Obrazy/test.jpg");
$photo = \Illuminate\Http\UploadedFile::fake()->image('avatar.jpg', 100, 100);
$I->fillField("//*[@id=\"filename\"]", $photo); // CZEMU TO DZIAŁA?!!!
//$disk = \Illuminate\Support\Facades\Storage::put();
//$path = \Illuminate\Http\UploadedFile::fake()->image('avatar.jpg', 100, 100)->storePublicly('/', []);
//Storage::put('file.jpg', $contents);
//$I->fillField("//*[@id=\"filename\"]", $fakePhoto);
//$I->fillField("//*[@id=\"filename\"]", \Illuminate\Http\UploadedFile::fake()->image('avatar.jpg', 100, 100)->path());
//$I->fillField("//*[@id=\"filename\"]", $path);
$I->fillField("//*[@id=\"description\"]", "randomDesc");
$I->click("//*[@id=\"app\"]/main/div/form/div/div/div/div[3]/div/button");
$I->see("File uploaded successfully");
$I->grabFromDatabase("photos", "filename", ["description" => "randomDesc"]);
$I->seeInDatabase("photos", ["filename" => $photo, "description" => "randomDesc"]);
$I->click("//*[@id=\"app\"]/main/div/a");

