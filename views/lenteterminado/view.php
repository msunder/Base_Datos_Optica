<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LenteTerminado */

$this->title = $model->idLente_Terminado;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lente Terminados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lente-terminado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idLente_Terminado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idLente_Terminado], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idLente_Terminado',
            'Graduacion_Excedente',
            'Material',
            'Graduacion',
            'Tipo_segun_material',
            'Precio_Compra',
            'Existencia',
            'Precio_Venta',
        ],
    ]) ?>

</div>
