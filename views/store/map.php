<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = Yii::t('app', 'Stores');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('https://maps.googleapis.com/maps/api/js?v=3.exp');
$this->registerJsFile('/js/map/common.js');
$this->registerJsFile('/js/map/map.js');

?>

<div class="store-map">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a(Yii::t('app', 'Create Store'), ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<div id="map-canvas"></div>
</div>
