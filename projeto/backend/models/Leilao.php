<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "leilao".
 *
 * @property int $id
 * @property int $idUser
 * @property string $titulo
 * @property string $descricao
 * @property string $datalimite
 * @property string $imagem
 * @property float $precobase
 * @property string $aprovado
 *
 * @property User $idUser0
 */
class Leilao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leilao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUser', 'titulo', 'descricao', 'datalimite', 'precobase'], 'required'],
            [['idUser'], 'integer'],
            [['descricao', 'aprovado'], 'string'],
            [['datalimite'], 'safe'],
            [['precobase'], 'number'],
            [['titulo'], 'string', 'max' => 50],
            [['imagem'], 'file','extensions' => 'png, jpg'],
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
            'datalimite' => 'Datalimite',
            'precobase' => 'Precobase',
            'imagem' => 'Imagem',
            'aprovado' => 'Aprovado',
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
