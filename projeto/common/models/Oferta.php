<?php

namespace common\models;

use Cassandra\Time;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "leilaooferta".
 *
 * @property int $id
 * @property int $idleilao
 * @property int $iduser
 * @property string $dataoferta
 * @property float $montante
 *
 * @property Leilao $idleilao0
 * @property User $iduser0
 */
class Oferta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leilaooferta';
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->iduser = \Yii::$app->getUser()->id;
                $this->idleilao = $_GET['id'];
            }
            return true;
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['montante'], 'required'],
            [['idleilao', 'iduser'], 'integer'],
            [['dataoferta'], 'safe'],
            [['montante'], 'number'],
            [['idleilao'], 'exist', 'skipOnError' => true, 'targetClass' => Leilao::className(), 'targetAttribute' => ['idleilao' => 'id']],
            [['iduser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['iduser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idleilao' => 'Idleilao',
            'iduser' => 'Iduser',
            'dataoferta' => 'Dataoferta',
            'montante' => 'Montante',
        ];
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }


    /**
     * Gets query for [[Idleilao0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdleilao0()
    {
        return $this->hasOne(Leilao::className(), ['id' => 'idleilao']);
    }

    /**
     * Gets query for [[Iduser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIduser0()
    {
        return $this->hasOne(User::className(), ['id' => 'iduser']);
    }
}
