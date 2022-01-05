<?php
namespace frontend\tests\functional;
use common\models\Venda;
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
        $I->see('carro');
        $I->click('Ver mais...');
        $I->see('carro');
        $I->click('📞 Contactar o Vendedor');
    }

    public function CriarVenda(FunctionalTester $I)
    {
        $I->click('Minhas Vendas');
        $I->see('Adicionar uma Venda');
        $I->click('Adicionar uma Venda');
        $I->see('Create Venda');
        $I->fillField('Titulo','Titulo1');
        $I->fillField('Descrição','descricao1');
        $I->fillField('Preço',430);
        $I->attachFile('Imagem','overlay.png');
        $I->click('Criar');
        $I->see('Titulo1','h1');
        $I->see('Alterar');
        $I->see('Apagar');
    }

    public function AlterarVenda(FunctionalTester $I)
    {
        $I->click('Minhas Vendas');
        $I->click('Mais Informações');
        $I->see('Mota');
        $I->click('Alterar');
        $I->fillField('Titulo','Mota');
        $I->fillField('Descrição','Mota eletrica');
        $I->fillField('Preço',15000);
        $I->attachFile('Imagem','overlay.png');
        $I->click('Criar');
        $I->see('Mota','h1');
        $I->see('Alterar');
        $I->see('Apagar');
    }

    public function ApagarVenda(FunctionalTester $I)
    {
        $I->click('Minhas Vendas');
        $I->click('Mais Informações');
        $I->see('Mota');
        $I->click('Apagar');
    }


}
