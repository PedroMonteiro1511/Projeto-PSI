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

    // tests
    public function testMudarMontante()
    {
        $user = \common\models\User::findByUsername('Monteiro');

        $leilao = Leilao::findOne(4);
        $leilao->getAttribute('id');

        $oferta = Oferta::findOne(2);

        $oferta->setAttributes(array(
            'montante' => 350,
        ),false);

        $this->assertEquals('350',$oferta->getAttribute('montante'));
    }

}
