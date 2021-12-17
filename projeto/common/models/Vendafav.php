<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vendafav".
 *
 * @property int $id
 * @property int $iduser
 * @property int $idvenda
 *
 * @property User $iduser0
 * @property Venda $idvenda0
 */
class Vendafav extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vendafav';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iduser', 'idvenda'], 'required'],
            [['iduser', 'idvenda'], 'integer'],
            [['iduser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['iduser' => 'id']],
            [['idvenda'], 'exist', 'skipOnError' => true, 'targetClass' => Venda::className(), 'targetAttribute' => ['idvenda' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iduser' => 'Iduser',
            'idvenda' => 'Idvenda',
        ];
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

    /**
     * Gets query for [[Idvenda0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdvenda0()
    {
        return $this->hasOne(Venda::className(), ['id' => 'idvenda']);
    }
}
