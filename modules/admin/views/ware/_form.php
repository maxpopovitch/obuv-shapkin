<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Ware;
use app\models\Brand;
use app\models\Wideness;
use app\models\ShoesType;
use app\models\UpperMaterial;
use app\models\LiningMaterial;
use app\models\SoleMaterial;
use app\models\HeelHeight;
use app\models\Color;
use app\models\Category;
use app\models\Size;

/* @var $this yii\web\View */
/* @var $model app\models\Ware */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ware-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand')->dropDownList(ArrayHelper::map(Brand::find()->orderBy(['position' => SORT_ASC])->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'sex')->dropDownList(Ware::getSex()) ?>

    <?= $form->field($model, 'saison')->dropDownList(Ware::getSaison()) ?>

    <?= $form->field($model, 'type')->dropDownList(ArrayHelper::map(ShoesType::find()->orderBy(['position' => SORT_ASC])->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'wideness')->dropDownList(ArrayHelper::map(Wideness::find()->orderBy(['position' => SORT_ASC])->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'upper')->dropDownList(ArrayHelper::map(UpperMaterial::find()->orderBy(['position' => SORT_ASC])->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'lining')->dropDownList(ArrayHelper::map(LiningMaterial::find()->orderBy(['position' => SORT_ASC])->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'sole')->dropDownList(ArrayHelper::map(SoleMaterial::find()->orderBy(['position' => SORT_ASC])->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'heel_height')->dropDownList(ArrayHelper::map(HeelHeight::find()->orderBy(['position' => SORT_ASC])->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'color')->dropDownList(ArrayHelper::map(Color::find()->orderBy(['position' => SORT_ASC])->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'category')->dropDownList(Ware::getCategory()) ?>

    <?= $form->field($model, 'init_price')->textInput() ?>

    <?= $form->field($model, 'new_price')->textInput() ?>

    <?= $form->field($model, 'waterproofness')->dropDownList(Ware::getWaterproofness()) ?>

    <?= $form->field($model, 'status')->dropDownList(Ware::getStatus()) ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <?= $form->field($model, 'sizes')->checkboxList(ArrayHelper::map(Size::find()->orderBy(['position' => SORT_ASC])->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
