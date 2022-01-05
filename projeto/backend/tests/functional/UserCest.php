<?php
namespace backend\tests\functional;
use backend\tests\FunctionalTester;
class UserCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amLoggedInAs(3);
        $I->amOnPage('/');
    }

    // tests
    public function CriarUtilizador(FunctionalTester $I)
    {
      $I->click('Gerir Utilizadores');
      $I->see('Painel de Utilizadores');
      $I->click('Adicionar um Utilizador');
      $I->see('Dados Utilizador');
      $I->fillField('Username','MonteiroTeste');
      $I->fillField('Password','admin123');
      $I->fillField('Email','Monteiro@email.com');
      $I->click('Save');
    }

    public function CriarVazio(FunctionalTester $I)
    {
        $I->click('Gerir Utilizadores');
        $I->see('Painel de Utilizadores');
        $I->click('Adicionar um Utilizador');
        $I->see('Dados Utilizador');
        $I->click('Save');
        $I->see('Username cannot be blank.');
        $I->see('Password Hash cannot be blank.');
        $I->see('Email cannot be blank.');
    }
}
