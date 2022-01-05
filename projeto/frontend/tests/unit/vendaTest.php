<?php
namespace frontend\tests;

use common\models\Venda;

class vendaTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {

    }

    protected function _after()
    {
    }

    // tests
    public function testCriarVenda()
    {
        $venda = new Venda();

        $user = \common\models\User::findByUsername('Monteiro');

        $venda->setAttributes(array(
            'idUser' => $user->id,
            'titulo' => 'Carro Velho',
            'descricao' => 'Carro velho de 1990',
            'preco' => 3000,
        ),false);

        $this->assertTrue($venda->save(false));
        $this->assertEquals('Carro Velho', $venda->getAttribute('titulo'));
    }

    public function testAlterarTitulo()
    {
        $venda = new Venda();

        $user = \common\models\User::findByUsername('Monteiro');

        $venda->setAttributes(array(
            'idUser' => $user->id,
            'titulo' => 'Carro Velho',
            'descricao' => 'Carro velho de 1990',
            'preco' => 3000,
        ),false);

        $this->assertTrue($venda->save(false));
        $this->assertEquals('Carro Velho', $venda->getAttribute('titulo'));

        $venda->setAttributes(array(
            'titulo' => 'Carro Novo',
        ),false);

        $this->assertTrue($venda->save(false));
        $this->assertEquals('Carro Novo',$venda->getAttribute('titulo'));
        $this->tester->dontSeeRecord(Venda::class,['titulo' => 'Carro Velho']);
    }

    public function testAlterarDescricao()
    {
        $venda = new Venda();

        $user = \common\models\User::findByUsername('Monteiro');

        $venda->setAttributes(array(
            'idUser' => $user->id,
            'titulo' => 'Carro Velho',
            'descricao' => 'Carro velho de 1990',
            'preco' => 3000,
        ),false);

        $this->assertTrue($venda->save(false));
        $this->assertEquals('Carro velho de 1990', $venda->getAttribute('descricao'));

        $venda->setAttributes(array(
            'descricao' => 'Carro Novo de 2000',
        ),false);

        $this->assertTrue($venda->save(false));
        $this->assertEquals('Carro Novo de 2000',$venda->getAttribute('descricao'));
        $this->tester->dontSeeRecord(Venda::class,['descricao' => 'Carro velho de 1990']);
    }

    public function testValidarPreco()
    {
        $leilao =  new \common\models\Venda();
        $leilao->setAttributes(['preco' => 430]);
        $this->assertTrue($leilao->validate(['preco']));

        $leilao->setAttributes(['preco' => null]);
        $this->assertFalse($leilao->validate(['preco']));
    }

}
