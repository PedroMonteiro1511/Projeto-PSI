<?php
namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;
class leiloesCest
{


    public function _before(FunctionalTester $I)
    {
        $I->amLoggedInAs(3);
        $I->amOnPage('/');
        $I->see('Bem-vindo!','h1');
    }

    // tests
    public function Oferta(FunctionalTester $I)
    {
        $I->click('Leilões');
        $I->see('Leilões','h1');
        $I->click('Ver mais...');
        $I->see('Oferta');
        $I->click('Oferta');
        $I->see('Create Oferta');
        $I->fillField('Montante','2350');
        $I->click('Save');
        $I->see('Update');
        $I->see('Delete');
        $I->amOnPage('index-test.php?r=oferta%2Fview&id=10');
    }


}
