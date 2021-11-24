<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "venda".
 *
 * @property int $id
 * @property int $idUser
 * @property string $titulo
 * @property string $descricao
 * @property float $preco
 *
 * @property User $idUser0
 */
class Venda extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUser', 'titulo', 'descricao', 'preco'], 'required'],
            [['idUser'], 'integer'],
            [['descricao'], 'string'],
            [['preco'], 'number'],
            [['titulo'], 'string', 'max' => 50],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idUser' => 'Id User',
            'titulo' => 'Titulo',
            'descricao' => 'Descricao',
            'preco' => 'Preco',
        ];
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }
}
