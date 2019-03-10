<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Lente_Terminado".
 *
 * @property int $idLente_Terminado
 * @property string $Graduacion_Excedente
 * @property string $Material
 * @property string $Graduacion
 * @property string $Tipo_segun_material
 * @property double $Precio_Compra
 * @property int $Existencia
 *
 * @property DetalleCompra[] $detalleCompras
 * @property DetalleOrden[] $detalleOrdens
 */
class Lentetermi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Lente_Terminado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Precio_Compra'], 'number'],
            [['Existencia'], 'integer'],
            [['Graduacion_Excedente'], 'string', 'max' => 10],
            [['Material', 'Graduacion', 'Tipo_segun_material'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLente_Terminado' => 'Id Lente Terminado',
            'Graduacion_Excedente' => 'Graduacion Excedente',
            'Material' => 'Material',
            'Graduacion' => 'Graduacion',
            'Tipo_segun_material' => 'Tipo Segun Material',
            'Precio_Compra' => 'Precio Compra',
            'Existencia' => 'Existencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleCompras()
    {
        return $this->hasMany(DetalleCompra::className(), ['ID_L_Terminado' => 'idLente_Terminado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleOrdens()
    {
        return $this->hasMany(DetalleOrden::className(), ['ID_Terminado' => 'idLente_Terminado']);
    }
}