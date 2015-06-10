<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $store app\models\Store */
/* @var $coordinate app\models\Coordinate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="store-form">

	<?php $form = ActiveForm::begin(); ?>

	<div class="row">
		<div class="col-lg-8">
			<div class="form-group">
				<div id="map-canvas"></div>
			</div>
		</div>
		<div class="col-lg-4">

			<?= $form->field($coordinate, 'lat')->hiddenInput()->label(false) ?>

			<?= $form->field($coordinate, 'lng')->hiddenInput()->label(false) ?>

			<?= $form->field($store, 'name')->textInput(['maxlength' => true]) ?>

			<?= $form->field($store, 'description')->textarea(['rows' => 6]) ?>

		</div>
	</div>

	<div class="form-group">
		<?= Html::submitButton($store->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $store->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
