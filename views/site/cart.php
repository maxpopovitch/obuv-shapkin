<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Ware;

$this->title = 'Omega Shoes | Корзина | Интернет-магазин обуви.';
?>

<section class="oc-content">
  <div class="container-fluid oc-margin">
    <div class="row row-offcanvas row-offcanvas-right">
      <div class="col-xs-12 <?php if (Yii::$app->user->isGuest || strpos(Url::current(), 'admin') === false) echo 'col-sm-8' ?>">

	<?php if (Yii::$app->user->isGuest || strpos(Url::current(), 'admin') === false) { ?>
  	<div class="row">
  	  <div class="pull-right visible-xs">
  	    <div class="oc-hint">
  	      <div>Подбор обуви по параметрам</div>
  	    </div>
  	    <button type="button" class="btn btn-success oc-details" data-toggle="offcanvas">
  	      <i class="glyphicon glyphicon-cog"></i>
  	    </button>
  	  </div>
  	</div>
	<?php } ?>

	<div class="row">
	  <div class="col-xs-12">
	    <div class="oc-ware-div">

	      <?php if (Ware::getCartWaresCount() > 0) { ?>
		<?php if (!Yii::$app->session->hasFlash('orderFormSubmitted')): ?>
    	      <h3>Оформление заказа</h3>
		<?php endif; ?>

		<?php if (Yii::$app->session->hasFlash('orderFormSubmitted')): ?>

    	      <div class="container-fluid">
    		<div class="row">
    		  <div class="col-xs-2 col-sm-1 col-sm-offset-1 text-right">
                        <div class="glyphicon glyphicon-ok oc-order-status-icon text-success"></div>
    		  </div>
    		  <div class="col-xs-9 col-sm-8 col-md-9">
                        <h4 class="oc-order-status text-success">Ваш заказ отправлен. Спасибо за покупку!</h4>
                        <h5 class="oc-order-status">Наши менеджеры свяжутся с вами в ближайшее время.</h5>
                        <h5 class="oc-order-status">Узнайте, как ухаживать за обувью: <a href="<?= Url::to(['site/tips']) ?>">советы покупателю</a>.</h5>
    		  </div>
    		</div>
    	      </div>
    	      <div class="container-fluid">
    		<div class="row">
    		  <div class="hidden-xs col-sm-1 col-sm-offset-1"></div>
    		  <div class="col-sm-8 col-md-8 text-center">
                        <div class="oc-receipt">
    		      <div class="oc-logo-receipt">
    			<img src="imgs/logo.gif" alt="Omega Shoes">
    		      </div>
    		      <div class="oc-goods-wrapper">
			    <?php foreach ($cartWares as $index => $cartWare) { ?>
      			<div class="clearfix oc-goods-list">
      			  <div class="text-left"><?php echo ($index + 1) ?></div>
      			  <div class="text-left">
      			    <span><?php echo $cartWare->_brand->name . ' ' . $cartWare->code ?></span>
      			  </div>
      			  <div class="text-right">
				  <?php echo $cartWare->sizes ?><br/>
      			    ---------<br/>
				  <?php echo $cartWare->new_price ?> руб.
      			  </div>
      			</div>
			    <?php } ?>
    		      </div>
    		      <div class="oc-total">
    			Итого: <?php echo Ware::getCartWaresCost() ?> руб.<br/>***** Спасибо! *****
    		      </div>
                        </div>
    		  </div>
    		</div>
    	      </div>

		<?php else: ?>
		  <?php $form = ActiveForm::begin(['id' => 'order-form']); ?>

    	      <div class="container-fluid oc-order-preview">
    		<div class="row oc-titlebar">
    		  <div>Артикул</div>
    		  <div>Размер</div>
    		  <div>Цена</div>
    		  <div></div>
    		</div>
		    <?php foreach ($cartWares as $cartWare) { ?>
                      <div class="row oc-preview">
      		  <div>
      		    <div class="oc-thumbnail">
      		      <img src="<?php echo ($cartWare->fileExists() ? $cartWare->getFileUrl('thumbnail') : '') ?>" alt="<?php
			    if (Yii::$app->language === 'ru' || Yii::$app->language === 'ua') {
			      echo ($cartWare->sex === 1) ? 'Мужские' . ' ' : 'Женские' . ' ';
			      if ($cartWare->saison === 1) {
				echo 'демисезонные' . ' ';
			      } else if ($cartWare->saison === 2) {
				echo 'летние' . ' ';
			      } else if ($cartWare->saison === 3) {
				echo 'зимние' . ' ';
			      }
			      echo $cartWare->_type->name . ' ';
			      echo $cartWare->_brand->name . ' ';
			      echo $cartWare->code;
			    }
			    ?>"/>
      		    </div>
      		    <div class="oc-explanation">
			    <?php echo $cartWare->_brand->name . ' ' . $cartWare->code ?>
      		    </div>
      		  </div>
      		  <div>
			  <?php echo $cartWare->sizes ?>
      		  </div>
      		  <div><?php echo $cartWare->new_price ?> руб.</div>
      		  <div>
      		    <button type="button" data-toggle="modal" data-target="#oc-confirmation" data-id="<?php echo $cartWare->id ?>"><span title="Удалить">&times;</span></button>
      		  </div>
                      </div>
		    <?php } ?>
    		<div class="row oc-titlebar">
    		  <div class="oc-total">Итого: <?php echo Ware::getCartWaresCost() ?> руб.</div>
    		</div>
    	      </div>

		  <?=
			  $form->field($cartModel, 'name', ['inputOptions' => ['placeholder' => 'Представьтесь, пожалуйста']])
			  ->label('Фамилия, имя, отчество<span class="oc-required">*</span>')
			  ->textInput(['autofocus' => true])
		  ?>

		  <?=
			  $form->field($cartModel, 'address', ['inputOptions' => ['placeholder' => 'Куда доставить заказ?']])
			  ->label('Адрес доставки<span class="oc-required">*</span>')
			  ->textInput()
		  ?>

		  <?=
			  $form->field($cartModel, 'phone', ['inputOptions' => ['placeholder' => 'Например, +79001234567']])
			  ->label('Телефон<span class="oc-required">*</span>')
		  ?>

		  <?=
			  $form->field($cartModel, 'email', ['inputOptions' => ['placeholder' => 'Укажите ваш email']])
			  ->label('Email')
		  ?>

		  <?=
			  $form->field($cartModel, 'message', ['inputOptions' => ['placeholder' => 'Будьте лаконичны']])
			  ->label('Дополнительная информация')
			  ->textarea(['rows' => 6])
		  ?>

    	      <div class="form-group">
		    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-lg']) ?>
    	      </div>

		  <?php ActiveForm::end(); ?>

		<?php endif; ?>

  	      <div class="modal fade" id="oc-confirmation" tabindex="-1" role="dialog">
  		<div class="modal-dialog modal-sm" role="document">
  		  <div class="modal-content">
  		    <div class="modal-header">
  		      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  		      <h4 class="modal-title" id="oc-confirmation-label">Удалить эту модель?</h4>
  		    </div>
  		    <div class="modal-body">
  		      <div class="container-fluid">
                          <div class="row">
  			  <div class="col-xs-4 col-sm-6">
  			    <img class="img-responsive" src="imgs/logo.png" alt="Omega Shoes" />
  			  </div>
  			  <div class="col-xs-8 col-sm-6">
  			    <span class="oc-article"></span>
  			  </div>
                          </div>
  		      </div>

  		    </div>
  		    <div class="modal-footer">
			<?php
			$form = ActiveForm::begin([
				    'action' => 'index.php?r=site%2Fremove-from-cart',
				    'method' => 'GET'
			]);
			?>
  		      <input type="hidden" id="oc-destroy-id" name="id" value="">
  		      <button type="button" class="btn btn-primary" data-dismiss="modal">Нет</button>
			<?= Html::submitButton('Да', ['id' => 'oc-destroy', 'class' => 'btn btn-danger']) ?>
			<?php ActiveForm::end(); ?>
  		    </div>
  		  </div>
  		</div>
  	      </div>
	      <?php } else { ?>
		<?php Yii::$app->response->redirect(['site']); ?>
	      <?php } ?>
	    </div>
	  </div>
	</div>

      </div>
      <?php if (Yii::$app->user->isGuest || strpos(Url::current(), 'admin') === false) { ?>
	<?=
	$this->render('_filterForm', [
	    'model' => $model,
	    'prices' => $prices,
	])
	?>
      <?php } ?>
    </div>
  </div>
</section>
