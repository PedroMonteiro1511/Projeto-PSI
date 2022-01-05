<?php
namespace frontend\tests;

use app\models\User;
use common\models\Leilao;
use common\models\Oferta;

class ofertaTest extends \Codeception\Test\Unit
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

    public function testMudarMontante()
    {
        $oferta = Oferta::findOne(2);

        $oferta->setAttributes(array(
            'montante' => 350,
        ),false);

        $this->assertEquals(350,$oferta->getAttribute('montante'));
    }

    public function testCriarOferta()
    {
        $user = \common\models\User::findByUsername('Monteiro');

        $leilao = Leilao::findOne(4);

        $oferta = Oferta::findOne(2);

        $oferta->setAttributes(array(
            'idleilao' => $leilao->id,
            'iduser' => $user->id,
            'dataoferta' => date('now'),
            'montante' => 4500,
        ),false);

        $this->assertEquals(4500,$oferta->getAttribute('montante'));
    }

}
