<?php
namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class LoginBackendCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('site/login');
    }

    public function LoginWorks(FunctionalTester $I)
    {
        $I->see('Please fill out the following fields to login:');
        $I->fillField('Username','Monteiro');
        $I->fillField('Password','admin123');
        $I->click('Login');
        $I->see('MenuAdmin!');

        $I->see('Logout (Monteiro)', 'form button[type=submit]');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');
    }

    public function LoginFails(FunctionalTester $I)
    {
        $I->see('Please fill out the following fields to login:');
        $I->fillField('Username','MonteiroAdmin');
        $I->fillField('Password','admin123');
        $I->click('Login');
        $I->see('Incorrect username or password.');
    }
}
