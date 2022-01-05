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
    }

    public function CriarLeilao(FunctionalTester $I)
    {
        $I->click('Meus Leilões');
        $I->see('Adicionar um leilão');
        $I->click('Adicionar um leilão');
        $I->see('Create Leilao');
        $I->fillField('Titulo','Leilao1');
        $I->fillField('Descrição','DescricaoLeilao1');
        $I->fillField('Preço',4350);
        $I->fillField('Data',date('now'));
        $I->attachFile('Imagem','overlay.png');
        $I->click('Save');
        $I->see('Leilao1','h1');
    }

    public function AlterarLeilao(FunctionalTester $I)
    {
        $I->click('Meus Leilões');
        $I->click('Mais Informações');
        $I->see('Update');
        $I->click('Update');
        $I->fillField('Titulo','LeilaoTeste');
        $I->fillField('Descrição','LeilaoTeste');
        $I->fillField('Data',date('now'));
        $I->fillField('Preço',3500);
        $I->attachFile('Imagem','overlay.png');
        $I->click('Save');
    }

    public function ApagarLeilao(FunctionalTester $I)
    {
        $I->click('Meus Leilões');
        $I->click('Mais Informações');
        $I->see('Delete');
        $I->click('Delete');
        $I->amOnPage('leilao/index');
    }


}
