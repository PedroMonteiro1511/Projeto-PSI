<?php
namespace frontend\tests;

use common\models\Leilao;
use common\models\User;

class leilaoTest extends \Codeception\Test\Unit
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
    public function testCriarLeilao()
    {
        $leilao = new Leilao();

        $user = \common\models\User::findByUsername('Monteiro');

        $leilao->setAttributes(array(
           'idUser' => $user->id,
            'titulo' => 'Carro Velho',
            'descricao' => 'Carro velho de 1990',
            'datalimite' => date('now'),
            'precobase' => 3000
        ),false);

        $this->assertTrue($leilao->save(false));
        $this->assertEquals('Carro Velho', $leilao->getAttribute('titulo'));
    }

    public function testAlterarTitulo()
    {
        $leilao = new Leilao();

        $user = \common\models\User::findByUsername('Monteiro');

        $leilao->setAttributes(array(
            'idUser' => $user->id,
            'titulo' => 'Carro Velho',
            'descricao' => 'Carro velho de 1990',
            'datalimite' => date('now'),
            'precobase' => 3000
        ),false);

        $this->assertTrue($leilao->save(false));
        $this->assertEquals('Carro Velho', $leilao->getAttribute('titulo'));

        $leilao->setAttributes(array(
            'titulo' => 'Carro Novo',
        ),false);

        $this->assertTrue($leilao->save(false));
        $this->assertEquals('Carro Novo',$leilao->getAttribute('titulo'));
        $this->tester->dontSeeRecord(Leilao::class,['titulo' => 'Carro Velho']);
    }

    public function testAlterarDescricao()
    {
        $leilao = new Leilao();

        $user = \common\models\User::findByUsername('Monteiro');

        $leilao->setAttributes(array(
            'idUser' => $user->id,
            'titulo' => 'Carro Velho',
            'descricao' => 'Carro velho de 1990',
            'datalimite' => date('now'),
            'precobase' => 3000
        ),false);

        $this->assertTrue($leilao->save(false));
        $this->assertEquals('Carro velho de 1990', $leilao->getAttribute('descricao'));

        $leilao->setAttributes(array(
            'descricao' => 'Carro Novo de 2000',
        ),false);

        $this->assertTrue($leilao->save(false));
        $this->assertEquals('Carro Novo de 2000',$leilao->getAttribute('descricao'));
        $this->tester->dontSeeRecord(Leilao::class,['descricao' => 'Carro velho de 1990']);
    }

    public function testValidarPrecoBase()
    {
        $leilao =  new \common\models\Leilao();
        $leilao->setAttributes(['precobase' => 430]);
        $this->assertTrue($leilao->validate(['precobase']));

        $leilao->setAttributes(['precobase' => null]);
        $this->assertFalse($leilao->validate(['precobase']));
    }
}
