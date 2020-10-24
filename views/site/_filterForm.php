<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Ware;
use app\models\Color;
use app\models\Wideness;
use app\models\ShoesType;
use app\models\Size;
use app\models\UpperMaterial;
use app\models\LiningMaterial;
use app\models\SoleMaterial;
use app\models\HeelHeight;
use app\models\Brand;

/* @var $this yii\web\View */
/* @var $model app\models\Brand */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$form = ActiveForm::begin([
	    'enableClientValidation' => false,
	    'action' => '/'
	]);
if (isset($submittedForm)) {
  $this->params['submittedForm'] = $submittedForm;
}
?>
<div class="col-xs-12 col-sm-4 sidebar-offcanvas" id="sidebar">
  <div class="row">
    <h2 class="oc-details">Подбор обуви по параметрам:</h2>
  </div>
  <div class="row">
    <div class="oc-details-grid">
      <div class="oc-cat-div">
	<div class="oc-title">Цена</div>
	<?php
	if ((is_array($prices) && count($prices) == 0) || (!is_array($prices))) {
	  $prices = [0];
	}
	?>
	<?=
	Html::input('range', 'Ware[maxprice]', (isset($submittedForm)) ? $submittedForm['maxprice'] : max($prices), [
	    'id' => 'oc-max-price',
	    'min' => min($prices),
	    'max' => max($prices),
	    'step' => 10,
//                    'onchange' => 'this.form.submit()'
	])
	?>
	<span>от&nbsp;</span><b><span><?= min($prices) ?></span></b>&nbsp;до&nbsp;<b><span id="oc-max-price-val"><?= (isset($submittedForm['maxprice'])) ? $submittedForm['maxprice'] : max($prices) ?></span><span>&nbsp;грн.</span></b>
      </div>

      <div class="oc-cat-div">
	<div class="oc-title">Пол</div>
	<?=
	$form->field($model, 'sex', ['template' => '{input}'])->checkBoxList(Ware::getSex(), ['item' => function ($index, $label, $name, $checked, $value) {
	      if (isset($this->params['submittedForm'])) {
		if (is_array($this->params['submittedForm']['sex'])) {
		  $checked = in_array($value, $this->params['submittedForm']['sex']);
		}
	      }
	      return Html::checkbox($name, $checked, [
			  'value' => $value,
			  'id' => 'oc-sex-' . $value,
			  'label' => '<label for="oc-sex-' . $value . '"></label><label for="oc-sex-' . $value . '" class="oc-details-label">' . $label . '</label>'
	      ]);
	    }]);
		?>
	      </div>

	      <div class="oc-cat-div oc-color-wrapper">
		<div class="oc-title">Цвет</div>
		<?=
		$form->field($model, 'color', ['template' => '{input}'])->checkBoxList(ArrayHelper::map(Color::find()->orderBy(['position' => SORT_ASC])->all(), 'id', 'name'), [
		    'item' => function ($index, $label, $name, $checked, $value) {
		      if (isset($this->params['submittedForm'])) {
			if (is_array($this->params['submittedForm']['color'])) {
			  $checked = in_array($value, $this->params['submittedForm']['color']);
			}
		      }
		      return Html::checkbox($name, $checked, [
				  'value' => $value,
				  'id' => 'oc-color-' . $value,
				  'label' => '<label for="oc-color-' . $value . '" title="' . $label . '" style="background-color: ' . Color::findOne(['id' => $value])->hex_value . '"></label>'
		      ]);
		    }]);
			?>
		      </div>

		      <div class="oc-cat-div oc-size-wrapper">
			<div class="oc-title">Размер (<a href="<?= Url::to(['site/sizes']) ?>">таблица</a>)</div>
			<?=
			$form->field($model, 'sizes', ['template' => '{input}'])->checkBoxList(ArrayHelper::map(Size::find()->orderBy(['position' => SORT_ASC])->all(), 'id', 'name'), [
			    'item' => function ($index, $label, $name, $checked, $value) {
			      if (isset($this->params['submittedForm'])) {
				if (is_array($this->params['submittedForm']['sizes'])) {
				  $checked = in_array($value, $this->params['submittedForm']['sizes']);
				}
			      }
			      return Html::checkbox($name, $checked, [
					  'value' => $value,
					  'id' => 'oc-size-' . $value,
					  'label' => '<label for="oc-size-' . $value . '">' . $label . '</label>'
			      ]);
			    }]);
				?>
			      </div>

			      <div class="oc-cat-div">
				<div class="oc-title">Полнота</div>
				<?=
				$form->field($model, 'wideness', ['template' => '{input}'])->checkBoxList(ArrayHelper::map(Wideness::find()->orderBy(['position' => SORT_ASC])->all(), 'id', 'name'), ['item' => function ($index, $label, $name, $checked, $value) {
				      if (isset($this->params['submittedForm'])) {
					if (is_array($this->params['submittedForm']['wideness'])) {
					  $checked = in_array($value, $this->params['submittedForm']['wideness']);
					}
				      }
				      return Html::checkbox($name, $checked, [
						  'value' => $value,
						  'id' => 'oc-wideness-' . $value,
						  'label' => '<label for="oc-wideness-' . $value . '"></label><label for="oc-wideness-' . $value . '" class="oc-details-label">' . $label . '</label>'
				      ]);
				    }]);
					?>
				      </div>

				      <div class="oc-cat-div">
					<div class="oc-title">Тип</div>
					<?=
					$form->field($model, 'type', ['template' => '{input}'])->checkBoxList(ArrayHelper::map(ShoesType::find()->orderBy(['position' => SORT_ASC])->all(), 'id', 'name'), ['item' => function ($index, $label, $name, $checked, $value) {
					      if (isset($this->params['submittedForm'])) {
						if (is_array($this->params['submittedForm']['type'])) {
						  $checked = in_array($value, $this->params['submittedForm']['type']);
						}
					      }
					      return Html::checkbox($name, $checked, [
							  'value' => $value,
							  'id' => 'oc-type-' . $value,
							  'label' => '<label for="oc-type-' . $value . '"></label><label for="oc-type-' . $value . '" class="oc-details-label">' . $label . '</label>'
					      ]);
					    }]);
						?>
					      </div>

					      <div class="oc-cat-div">
						<div class="oc-title">Сезон</div>
						<?=
						$form->field($model, 'saison', ['template' => '{input}'])->checkBoxList(Ware::getSaison(), ['item' => function ($index, $label, $name, $checked, $value) {
						      if (isset($this->params['submittedForm'])) {
							if (is_array($this->params['submittedForm']['saison'])) {
							  $checked = in_array($value, $this->params['submittedForm']['saison']);
							}
						      }
						      return Html::checkbox($name, $checked, [
								  'value' => $value,
								  'id' => 'oc-saison-' . $value,
								  'label' => '<label for="oc-saison-' . $value . '"></label><label for="oc-saison-' . $value . '" class="oc-details-label">' . $label . '</label>'
						      ]);
						    }]);
							?>
						      </div>

						      <div class="oc-cat-div">
							<div class="oc-title">Категория</div>
							<?php
							$categories = Ware::getCategory();
							ArrayHelper::remove($categories, 0)
							?>
							<?=
							$form->field($model, 'category', ['template' => '{input}'])->checkBoxList($categories, ['item' => function ($index, $label, $name, $checked, $value) {
							      if (isset($this->params['submittedForm'])) {
								if (is_array($this->params['submittedForm']['category'])) {
								  $checked = in_array($value, $this->params['submittedForm']['category']);
								}
							      }
							      return Html::checkbox($name, $checked, [
									  'value' => $value,
									  'id' => 'oc-category-' . $value,
									  'label' => '<label for="oc-category-' . $value . '"></label><label for="oc-category-' . $value . '" class="oc-details-label">' . $label . '</label>'
							      ]);
							    }]);
								?>
							      </div>
							    </div>
							    <div class="oc-details-grid">
							      <div class="oc-cat-div">
								<div class="oc-title">Материал верха</div>
								<?=
								$form->field($model, 'upper', ['template' => '{input}'])->checkBoxList(ArrayHelper::map(UpperMaterial::find()->orderBy(['position' => SORT_ASC])->all(), 'id', 'name'), ['item' => function ($index, $label, $name, $checked, $value) {
								      if (isset($this->params['submittedForm'])) {
									if (is_array($this->params['submittedForm']['upper'])) {
									  $checked = in_array($value, $this->params['submittedForm']['upper']);
									}
								      }
								      return Html::checkbox($name, $checked, [
										  'value' => $value,
										  'id' => 'oc-upper-' . $value,
										  'label' => '<label for="oc-upper-' . $value . '"></label><label for="oc-upper-' . $value . '" class="oc-details-label">' . $label . '</label>'
								      ]);
								    }]);
									?>
								      </div>

								      <div class="oc-cat-div">
									<div class="oc-title">Материал подкладки</div>
									<?=
									$form->field($model, 'lining', ['template' => '{input}'])->checkBoxList(ArrayHelper::map(LiningMaterial::find()->orderBy(['position' => SORT_ASC])->all(), 'id', 'name'), ['item' => function ($index, $label, $name, $checked, $value) {
									      if (isset($this->params['submittedForm'])) {
										if (is_array($this->params['submittedForm']['lining'])) {
										  $checked = in_array($value, $this->params['submittedForm']['lining']);
										}
									      }
									      return Html::checkbox($name, $checked, [
											  'value' => $value,
											  'id' => 'oc-lining-' . $value,
											  'label' => '<label for="oc-lining-' . $value . '"></label><label for="oc-lining-' . $value . '" class="oc-details-label">' . $label . '</label>'
									      ]);
									    }]);
										?>
									      </div>

									      <div class="oc-cat-div">
										<div class="oc-title">Материал подошвы</div>
										<?=
										$form->field($model, 'sole', ['template' => '{input}'])->checkBoxList(ArrayHelper::map(SoleMaterial::find()->orderBy(['position' => SORT_ASC])->all(), 'id', 'name'), ['item' => function ($index, $label, $name, $checked, $value) {
										      if (isset($this->params['submittedForm'])) {
											if (is_array($this->params['submittedForm']['sole'])) {
											  $checked = in_array($value, $this->params['submittedForm']['sole']);
											}
										      }
										      return Html::checkbox($name, $checked, [
												  'value' => $value,
												  'id' => 'oc-sole-' . $value,
												  'label' => '<label for="oc-sole-' . $value . '"></label><label for="oc-sole-' . $value . '" class="oc-details-label">' . $label . '</label>'
										      ]);
										    }]);
											?>
										      </div>

										      <div class="oc-cat-div">
											<div class="oc-title">Высота каблука или танкетки</div>
											<?=
											$form->field($model, 'heel_height', ['template' => '{input}'])->checkBoxList(ArrayHelper::map(HeelHeight::find()->orderBy(['position' => SORT_ASC])->all(), 'id', 'name'), ['item' => function ($index, $label, $name, $checked, $value) {
											      if (isset($this->params['submittedForm'])) {
												if (is_array($this->params['submittedForm']['heel_height'])) {
												  $checked = in_array($value, $this->params['submittedForm']['heel_height']);
												}
											      }
											      return Html::checkbox($name, $checked, [
													  'value' => $value,
													  'id' => 'oc-heel_height-' . $value,
													  'label' => '<label for="oc-heel_height-' . $value . '"></label><label for="oc-heel_height-' . $value . '" class="oc-details-label">' . $label . '</label>'
											      ]);
											    }]);
												?>
											      </div>

											      <div class="oc-cat-div">
												<div class="oc-title">Защита от промокания</div>
												<?php
												$waterproofnesses = Ware::getWaterproofness();
												ArrayHelper::remove($waterproofnesses, 1)
												?>
												<?=
												$form->field($model, 'waterproofness', ['template' => '{input}'])->checkBoxList($waterproofnesses, ['item' => function ($index, $label, $name, $checked, $value) {
												      if (isset($this->params['submittedForm'])) {
													if (is_array($this->params['submittedForm']['waterproofness'])) {
													  $checked = in_array($value, $this->params['submittedForm']['waterproofness']);
													}
												      }
												      return Html::checkbox($name, $checked, [
														  'value' => $value,
														  'id' => 'oc-waterproofness-' . $value,
														  'label' => '<label for="oc-waterproofness-' . $value . '"></label><label for="oc-waterproofness-' . $value . '" class="oc-details-label">' . $label . '</label>'
												      ]);
												    }]);
													?>
												      </div>

												      <div class="oc-cat-div">
													<div class="oc-title">Производители</div>
													<?=
													$form->field($model, 'brand', ['template' => '{input}'])->checkBoxList(ArrayHelper::map(Brand::find()->orderBy(['position' => SORT_ASC])->all(), 'id', 'name'), ['item' => function ($index, $label, $name, $checked, $value) {
													      if (isset($this->params['submittedForm'])) {
														if (is_array($this->params['submittedForm']['brand'])) {
														  $checked = in_array($value, $this->params['submittedForm']['brand']);
														}
													      }
													      return Html::checkbox($name, $checked, [
															  'value' => $value,
															  'id' => 'oc-brand-' . $value,
															  'label' => '<label for="oc-brand-' . $value . '"></label><label for="oc-brand-' . $value . '" class="oc-details-label oc-flag oc-' . Brand::findOne($value)->country_code . '" title="' . Brand::findOne($value)->name . ' (' . Brand::findOne($value)->country_name . ')">' . $label . '</label>'
													      ]);
													    }]);
														?>
													      </div>
													    </div>
													  </div>
													  <div class="row">
													    <div class="oc-details-grid">
													      <div class="oc-cat-div text-center">
														<button type="submit" class="btn btn-success btn-lg">Показать</button>
													      </div>
													    </div>
													    <div class="oc-details-grid">
													      <div class="oc-cat-div text-center">
														<button type="reset" class="btn btn-danger btn-lg">Сбросить</button>
													      </div>
													    </div>
													  </div>
													</div>

													<?php ActiveForm::end(); ?>

