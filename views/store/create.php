<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $coordinate app\models\Coordinate */
/* @var $store app\models\Store */

$this->title = Yii::t('app', 'Create Store');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('https://maps.googleapis.com/maps/api/js?v=3.exp');
$this->registerJsFile('/js/map/common.js');
$this->registerJsFile('/js/map/form.js');

?>

<div class="store-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'coordinate' => $coordinate,
        'store' => $store,
    ]) ?>

</div>
