<?php
namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;
class loginCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/');
    }

    // tests
    public function LoginNotFilled(FunctionalTester $I)
    {
        $I->click('Login');
        $I->see('Please fill out the following fields to login:');
        $I->click('Enter');
        $I->seeValidationError('Username cannot be blank.');
        $I->seeValidationError('Password cannot be blank.');
    }

    public function LoginUsernameNotFilled(FunctionalTester $I)
    {
        $I->click('Login');
        $I->see('Please fill out the following fields to login:');
        $I->fillField('Password','admin123');
        $I->click('Enter');
        $I->seeValidationError('Username cannot be blank.');
        $I->dontSeeValidationError('Password cannot be blank.');
    }

    public function LoginPasswordNotFilled(FunctionalTester $I)
    {
        $I->click('Login');
        $I->see('Please fill out the following fields to login:');
        $I->fillField('Username','MonteiroAdmin');
        $I->click('Enter');
        $I->dontSeeValidationError('Username cannot be blank.');
        $I->seeValidationError('Password cannot be blank.');
    }

    public function LoginValid(FunctionalTester $I)
    {
        $I->click('Login');
        $I->see('Please fill out the following fields to login:');
        $I->fillField('Username','MonteiroAdmin');
        $I->fillField('Password','admin123');
        $I->click('Enter');
    }
}
