<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
    <div class="col-md-6">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username', ['options' => ['class' => 'form-group']])->textInput() ?>

        <?= $form->field($model, 'password', ['options' => ['class' => 'form-group']])->passwordInput() ?>

        <?= $form->field($model, 'email', ['options' => ['class' => 'form-group']])->textInput([]) ?>

        <?php if ($model->id != 1):
            echo $form->field($model, 'status', ['options' => ['class' => 'form-group']])->dropDownList([
                '10' => 'Активен',
                '0' => 'Не активен',
            ]);
        endif; ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
