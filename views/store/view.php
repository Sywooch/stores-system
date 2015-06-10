<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $store app\models\Store */

$this->title = $store->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('https://maps.googleapis.com/maps/api/js?v=3.exp');
$this->registerJsFile('/js/map/common.js');
$this->registerJsFile('/js/map/view.js');

?>

<div class="store-view">

    <h1><?= Html::encode($this->title) ?></h1>

	<?php $form = ActiveForm::begin(); ?>

			<?= $form->field($coordinate, 'lat')->hiddenInput()->label(false) ?>

			<?= $form->field($coordinate, 'lng')->hiddenInput()->label(false) ?>

	<?php ActiveForm::end(); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $store->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $store->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

	<div class="row">
		<div class="col-lg-8">
			<div id="map-canvas"></div>
		</div>
		<div class="col-lg-4">

			<?php echo DetailView::widget([
				'model' => $store,
				'attributes' => [
//					'id',
//					'coordinate_id',
					'name',
					'description:ntext',
				],
			]) ?>

		</div>
	</div>

</div>
