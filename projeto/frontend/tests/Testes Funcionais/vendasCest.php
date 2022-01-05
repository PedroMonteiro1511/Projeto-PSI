<?php
namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;
class vendasCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amLoggedInAs(2);
        $I->amOnPage('/');
        $I->see('Bem-vindo!','h1');
    }

    // tests
    public function Vendas(FunctionalTester $I)
    {
        $I->click('Vendas');
        $I->see('Vendas','h1');
        $I->click('Ver mais...');
        $I->see('Venda1','h1');
        $I->click('📞 Contactar o Vendedor');
        $I->dontSee('Venda1','h1');
        $I->amOnPage('/index-test.php?r=user%2Fdetails&id=26');
    }
}
