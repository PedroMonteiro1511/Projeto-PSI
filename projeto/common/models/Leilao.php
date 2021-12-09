<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "leilao".
 *
 * @property int $id
 * @property int $idUser
 * @property string $titulo
 * @property string $descricao
 * @property string $datalimite
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

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->idUser = \Yii::$app->getUser()->id;
            } else {
              /*  if (!empty($this->password_hash)) {
                    $this->setPassword($this->password_hash);
                } else {
                    $this->password_hash = (string) $this->getOldAttribute('password_hash');
                }*/
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
            [['titulo', 'descricao', 'datalimite', 'precobase'], 'required'],
            [['idUser'], 'integer'],
            [['descricao', 'aprovado'], 'string'],
            [['datalimite'], 'safe'],
            [['precobase'], 'number'],
            [['titulo'], 'string', 'max' => 50],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    protected function getLeilao()
    {
        if ($this->_leilao === null) {
            $this->_leilao = (new Leilao())->getId($this->id);
        }

        return $this->_leilao;
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
