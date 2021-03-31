<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Omega Shoes | Гарантийные обязательства | Интернет-магазин обуви. Доставка по Украине.';
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
	      <h3>Гарантийные обязательства</h3>
          <h4>Нормативная база</h4>
	      <p class="default-p">Если в течение гарантийного срока выявлен заводской брак обуви, то можно вернуть некачественный товар и потребовать замену или <a href="https://zakonguru.com/zpp/tovary/vozvrat-sroki.html" target="_blank">возврат</a> денежных средств. Для отстаивания своих прав покупатель может ссылаться на такие нормативные акты:</p>
          <ul style="padding-left: 35px;">
            <li>Закон о защите прав потребителей (ст. 18 <q>Права потребителя при обнаружении в товаре недостатков</q> и ст. 19 <q>Сроки предъявления потребителем <a href="https://zakonguru.com/zpp/tovary/texnicheski-slozhnye.html" target="_blank">требований</a> в отношении недостатков товара</q>);</li>
            <li>Гражданский кодекс РФ (статьи 469 <q>Качество товара</q>, 470 <q>Гарантия качества товара</q>, 471 <q>Исчисление гарантийного срока</q>);</li>
            <li>ГОСТ 26167-2005 Обувь повседневная. Общие технические условия.</li>
          </ul>
          <h4>Сроки возврата в магазин</h4>
          <p class="default-p">Если гарантийный срок не установлен производителем, то продавец имеет право сам выставить период возврата некачественной обуви, но не менее 30 дней со дня покупки.</p>
          <h4>Гарантийный срок на обувь по закону</h4>
          <p class="default-p">В соответствии с частью 5 ст. 19 Закона РФ <q>О защите прав потребителей</q> покупатель имеет право подать <a href="https://zakonguru.com/zpp/tovary/zajvlenie-na-vozvrat.html" target="_blank">претензию</a> на некачественный товар в течение 2 лет, если:</p>
          <ul style="padding-left: 35px;">
            <li>гарантийный срок не установлен ни продавцом, ни производителем;</li>
            <li>со дня покупки не прошло двух лет, а обувь пришла в негодность.</li>
          </ul>
          <p class="default-p">В таком случае потребителю придется самостоятельно доказывать наличие заводского брака и оплачивать экспертизу.</p>
          <p class="default-p">Если дефекты получены не по вине покупателя, то все убытки ему <a href="https://zakonguru.com/zpp/uslugi/turisticheskaj-putevka.html" target="_blank">возмещаются</a>.</p>
          <h4>Сроки возврата в магазин</h4>
          <p class="default-p">Различаются два вида товаров: внесезонные и сезонные. К внесезонной обуви относятся домашние, спортивные или офисные модели.</p>
          <p class="default-p">В гражданском кодексе РФ сказано, что гарантия на внесезонный товар начинается с момента покупки, а в Законе о <a href="https://zakonguru.com/zpp/organizacii.html" target="_blank">защите прав</a> потребителей, что на следующий день. В данном случае приоритетней руководствоваться именно ЗоЗПП, ссылаясь на приказ МАП РФ от 20.05.1998 № 160 <q>О некоторых вопросах, связанных с применением Закона РФ О защите прав потребителей</q>.</p>
	      <p class="default-p">Временные рамки устанавливаются по календарным числам. Если последний день гарантии выпадает на выходной или праздник, и конкретный магазин не работает, то <a href="https://zakonguru.com/zpp/tovary/net-cheka.html" target="_blank">товар</a> нужно принести на следующий рабочий день.</p>
          <p class="default-p">Гарантийный срок на сезонную обувь &mdash; зимнюю, летнюю, демисезонную &mdash; начинается со дня наступления этого сезона. В зависимости от климатических условий на разных территориях РФ время наступления сезона может меняться.</p>
          <p class="default-p">Например, для Московской области:</p>
          <ul style="padding-left: 35px;">
            <li>с 1 ноября начинается зимний сезон;</li>
            <li>с 1 марта &mdash; весенний;</li>
            <li>с 1 мая &mdash; летний;</li>
            <li>с 1 сентября &mdash; осенний.</li>
          </ul>
          <p class="default-p">В Алтайском крае зимний сезон начинается 15 октября и заканчивается 15 марта, в Амурской области &mdash; с 4 октября по 19 апреля.</p>
          <h4>Как вернуть обувь по гарантии</h4>
          <p class="default-p">Если в течение гарантийного срока появилась необходимость обменять или вернуть товар, то покупателю необходимо обратиться в магазин, где совершалась покупка или отправить заявление в интернет-магазин на возврат товара, чтобы курьер мог приехать в указанное Вами место и время. При себе нужно иметь:</p>
          <ul style="padding-left: 35px;">
            <li>обувь, которую предполагается вернуть;</li>
            <li>сопутствующие принадлежности: коробка (обязательно), дополнительная пара набоек, запасная фурнитура (при наличии);</li>
            <li>чек (при наличии);</li>
            <li>гарантийный талон (при наличии);</li>
            <li>паспорт;</li>
            <li>карта, с которой оплачивалась покупка, если запланирован возврат денежных средств.</li>
          </ul>
          <p class="default-p">Далее пишется заявление, или составляется претензия в двух экземплярах.</p>
          <p class="default-p">Иногда продавец принимает товар, не обращаясь к независимой экспертизе, но если этого не происходит, то обувь отправляется в соответствующую организацию, а покупателю выдается документ, подтверждающий, что товар у него забрали.</p>
          <p class="default-p">Если экспертиза подтверждает наличие заводского брака, то деньги за покупку возвращаются или предлагается <a href="https://zakonguru.com/zpp/uslugi/elektronnyj-bilet.html" target="_blank">обменять</a> товар на аналогичный. В случаях когда обувь повреждена по вине покупателя, то все расходы возлагаются на него.</p>
          <h4>Виды гарантии</h4>
          <p class="default-p">Различают два типа гарантии:</p>
          <ul style="padding-left: 35px;">
            <li>Гарантия возврата. В течение 14 дней покупатель вправе обменять качественную новую обувь, если она ему не подходит. Главное, чтобы на модели не было следов носки и она сохраняла товарный вид. При отсутствии аналогичного товара для замены покупателю возвращается уплаченная сумма.</li>
            <li>Гарантия качества. Если в установленный гарантийный срок обувь пришла в негодность, то покупатель имеет право вернуть некачественный товар и получить назад свои <a href="https://zakonguru.com/zpp/uslugi/bilet-na-samolet.html" target="_blank">деньги</a>.</li>
          </ul>
          <h4>Гарантийные случаи</h4>
          <p class="default-p">Возврат обуви можно осуществлять, только если были соблюдены все рекомендации по эксплуатации и сезонные ограничения. Гарантийные обязательства делятся на общие показатели для возврата обуви и на причины, по которым нельзя использовать обувь по ее прямому назначению.</p>
          <p class="default-p">Общие:</p>
          <ul style="padding-left: 35px;">
            <li>повреждение или разрыв материала;</li>
            <li>отрыв каблука или подошвы;</li>
            <li>неровные швы;</li>
            <li>потрескивание лакированного покрытия;</li>
            <li>сход красителя.</li>
          </ul>
          <p class="default-p">Дополнительные причины:</p>
          <ul style="padding-left: 35px;">
            <li>резиновые сапоги, созданные, чтобы защищать от влаги, промокают;</li>
            <li>зимняя обувь очень сильно скользит. Если экспертиза покажет, что скольжение &mdash; результат неправильного производства, то это гарантийный случай;</li>
            <li>натирание обуви при учете правильно выбранного размера. Также требуется проведение экспертизы;</li>
            <li>если продавец или производитель уверяет, что вы приобретаете кожаную обувь, а после покупки выясняется, что это не так, то при наличии доказательств можно вернуть деньги.</li>
          </ul>
          <p class="default-p">На продолжительность гарантийного срока не влияет сезонность обуви. Это отражается только на дате, с которой исчисляется время гарантии.</p>
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
