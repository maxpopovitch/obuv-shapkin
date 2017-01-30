<?php
/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'obuv.co | Как сделать заказ | Интернет-магазин обуви. Доставка по Украине.';
?>

<h3 class="oc-empty">Оформление заказа</h3>
<h3 class="oc-empty">Купить обувь с доставкой &mdash; проще простого. <a href="http://www.obuv.co/">Приятных покупок :)</a></h3>

<form name="order-form" action="<?= Url::to(['site/cart']) ?>" method="post" data-toggle="validator">
    <div class="container-fluid oc-order-preview">
        <div class="row oc-titlebar">
            <div>Артикул</div>
            <div>Размер</div>
            <div>Цена</div>
            <div></div>
        </div>
        <div class="row oc-preview">
            <div>
                <div class="oc-thumbnail">
                    <img class="img-responsive" src="imgs/photos/rieker/small/rieker-40085-14-1758.jpg" alt="Женские летние туфли Rieker 40085-14" />
                </div>
                <div class="oc-explanation">
                    Rieker 40085-14
                </div>
            </div>
            <div>
                <select class="form-control" name="oc-size-rieker-40085-14">
                    <option value="4.5">4&frac12; (37)</option>
                    <option value="13.5">13&frac12; (48&frac12;)</option>
                </select>
            </div>
            <div>1400 грн.</div>
            <div>
                <button type="button" data-toggle="modal" data-target="#oc-confirmation"><span title="Удалить">&times;</span></button>
            </div>
        </div>
        <div class="row oc-preview">
            <div>
                <div class="oc-thumbnail">
                    <img class="img-responsive" src="imgs/photos/rieker/small/rieker-z7363-00-1044.jpg" alt="Женские осенние сапоги Rieker Z7363-00" />
                </div>
                <div class="oc-explanation">
                    Rieker Z7363-00
                </div>
            </div>
            <div>
                <select class="form-control" name="oc-size-rieker-40085-14">
                    <option value="4.5">4&frac12; (37)</option>
                    <option value="13.5">13&frac12; (48&frac12;)</option>
                </select>
            </div>
            <div>1400 грн.</div>
            <div>
                <button type="button" data-toggle="modal" data-target="#oc-confirmation"><span title="Удалить">&times;</span></button>
            </div>
        </div>
        <div class="row oc-titlebar">
            <div class="oc-total">Итого: 1400 грн.</div>
        </div>
    </div>
    <div class="form-group">
        <label for="sendername">Фамилия, имя, отчество</label><span class="oc-required">*</span>
        <input type="text" class="form-control" name="sendername" id="sendername" placeholder="Представьтесь, пожалуйста" data-error="Как вас зовут?" required/>
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group">
        <label for="senderaddress">Город (или полный почтовый адрес)</label>
        <input type="text" class="form-control" name="senderaddress" id="senderaddress" placeholder="Куда доставить заказ?" />
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group">
        <label for="senderphone">Телефон</label><span class="oc-required">*</span>
        <input type="tel" class="form-control" name="senderphone" id="senderphone" placeholder="Например, +380991234567" data-error="Как с вами связаться?" required/>
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group">
        <label for="senderemail">E-mail</label>
        <input type="email" class="form-control" name="senderemail" id="senderemail" placeholder="Укажите ваш E-mail" />
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group">
        <label for="sendermessage">Дополнительная информация</label>
        <textarea class="form-control" rows="8" name="sendermessage" id="sendermessage" placeholder="Будьте лаконичны"></textarea>
        <div class="help-block with-errors"></div>
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Отправить заказ</button>
</form>
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
                            <img class="img-responsive" src="imgs/obuv_co.png" alt="obuv.co" />
                        </div>
                        <div class="col-xs-8 col-sm-6">
                            <span class="oc-article"></span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Нет</button>
                <button type="button" class="btn btn-danger" id="oc-destroy">Да</button>
            </div>
        </div>
    </div>
</div>