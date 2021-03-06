<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Aro */

$this->title = $model->idAro;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="aro-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idAro], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idAro], [
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
            'idAro',
            'Color',
            'Existencia',
            'Material',
            'Precio_Compra',
            'Precio_Venta',
            'Codigo',
            'Marca',
        ],
    ]) ?>
    <p>
        <?= Html::a(Yii::t('app', 'Cancelar'), ['index'], ['class' => 'btn btn-danger']) ?>
    </p>
</div>
