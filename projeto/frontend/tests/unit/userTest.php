<?php
namespace frontend\tests;

use common\models\User;

class userTest extends \Codeception\Test\Unit
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

    public function testCreateUser()
    {
        $user =  new \app\models\User();
        $user->setAttributes(array(
            'username' => 'MonteiroAdmin',
            'auth_key' => \Yii::$app->security->generateRandomString(),
            'password_hash' => 'admin123',
            'email' => 'Monteiroteste@Teste.pt',
            'status' => 10,
        ),false);
        $this->assertTrue($user->save(false));

        $this->assertEquals('MonteiroAdmin', $user->getAttribute('username'));
    }

    public function testUsername()
    {
        $user =  new \app\models\User();

        $user->setAttributes(array(
            'username' => 'Monteiro',
        ),false);
        $this->assertFalse($user->validate(['username']));

        $user->setAttributes(array(
            'username' => null,
        ),false);
        $this->assertFalse($user->validate(['username']));
    }

    public function testPassword()
    {
        $user =  new \app\models\User();
        $user->setAttributes(['password_hash' => 'admin123']);
        $this->assertTrue($user->validate(['password_hash']));

        $user->setAttributes(['password_hash' => null]);
        $this->assertFalse($user->validate(['password_hash']));
    }

    public function testEmail()
    {
        $user =  new \app\models\User();
        $user->setAttributes(['email' => 'admin123@teste.pt']);
        $this->assertTrue($user->validate(['email']));

        $user->setAttributes(['email' => null]);
        $this->assertFalse($user->validate(['email']));
    }

    function testUsernameCanBeChanged()
        {
            $id = $this->tester->seeRecord(\app\models\User::class,['username'=>'Monteiro']);
            $user = User::findByUsername('Monteiro');
            $user->setAttributes(array(
                'username' => 'MonteiroAdmin'
            ),false);
            $user->save();
            $this->assertEquals('MonteiroAdmin', $user->getAttribute('username'));
            $this->tester->seeRecord(User::class,['username'=> 'MonteiroAdmin']);
        }

    function testPasswordCanBeChanged()
    {
        $id = $this->tester->seeRecord(User::class,['username'=>'Monteiro']);
        $user = User::findByUsername('Monteiro');
        $user->setAttributes(array(
            'password_hash' => 'admin123'
        ),false);
        $user->save();
        $this->assertEquals('admin123', $user->getAttribute('password_hash'));
        $this->tester->seeRecord(User::class,['password_hash'=> 'admin123']);
    }

    function testEmailCanBeChanged()
    {
        $this->tester->seeRecord(User::class,['username'=>'Monteiro']);
        $user = User::findByUsername('Monteiro');
        $user->setAttributes(array(
            'email' => 'admin123@outlook.pt'
        ),false);
        $user->save();
        $this->assertEquals('admin123@outlook.pt', $user->getAttribute('email'));
        $this->tester->seeRecord(User::class,['email'=> 'admin123@outlook.pt']);
    }

    function testUserDelete()
    {
        $this->tester->seeRecord(User::class,['username'=>'Monteiro']);
        $user = User::findByUsername('Monteiro');
        $user->delete();
        $this->tester->dontSeeRecord(User::class,['username'=> 'Monteiro']);
        $user->save();
    }

}
