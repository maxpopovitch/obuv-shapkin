<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$form = ActiveForm::begin([
	    'id' => 'subscribe-form',
	    'action' => 'index.php?r=site/subscribe',
	]);
echo $form->field($model, 'email', ['inputOptions' => ['placeholder' => 'Ваш email']])
	->label('Подписка на новости:');
echo Html::submitButton('OK', ['class' => 'btn btn-primary']);
ActiveForm::end();
?>
<script>
  document.addEventListener('DOMContentLoaded', function (event) {
    $('#subscribe-form').off().on('submit', function (event) {
      event.preventDefault();
      event.stopImmediatePropagation();
      var data = $('#subscribe-form').serialize();
      $.ajax({
	url: '<?= Url::to('?r=site/subscribe') ?>',
	type: 'post',
	data: data,
	dataType: 'json',
	success: function (response) {
	  if (response) {
	    $('#subscribe-form .field-subscribeform-email').removeClass('has-error').removeClass('has-warning').removeClass('has-success').addClass('has-' + response.status);
	    $('#subscribe-form p.help-block').html(response.message);
	    setTimeout(function () {
	      $('#subscribe-form .field-subscribeform-email').removeClass('has-error').removeClass('has-warning').removeClass('has-success');
	      $('#subscribe-form p.help-block').html('');
	    }, 3000);
	  }
	}
      });
    });
  });
</script>