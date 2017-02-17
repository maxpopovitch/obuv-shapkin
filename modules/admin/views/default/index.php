<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<?php if (Yii::$app->user->isGuest) { ?>
    <div class="site-login">
        <?php
        $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
                        'labelOptions' => ['class' => 'col-lg-2 control-label'],
                    ],
        ]);
        ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]); ?>

        <?= $form->field($model, 'password')->passwordInput(); ?>

        <?=
        $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-2 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-7\">{error}</div>",
        ]);
        ?>

        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

        <div class="col-lg-offset-2" style="color:#999;">
            You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
            To modify the username/password, please check out the code <code>app\models\User::$users</code>.
        </div>
    </div>
<?php } else { ?>
    <div class="admin-default-index">
        <!--<h1><?= $this->context->action->uniqueId ?></h1>-->
        <div class="list-group">
            <a href="index.php?r=admin/ware" class="list-group-item">
                <strong>Товары</strong><br /><small class="text-muted">Управление товарами</small>
            </a>
            <a href="index.php?r=admin/brand" class="list-group-item">
                <strong>Торговые марки</strong><br /><small class="text-muted">Управление торговыми марками: Barker, Janita, Mephisto</small>
            </a>
            <a href="index.php?r=admin/category" class="list-group-item">
                <strong>Категории</strong><br /><small class="text-muted">Управление категориями: новинка, распродажа, хит продаж</small>
            </a>
            <a href="index.php?r=admin/color" class="list-group-item">
                <strong>Цвета</strong><br /><small class="text-muted">Управление цветами: черный (#000000), красный (#FF0000)</small>
            </a>
            <a href="index.php?r=admin/size" class="list-group-item">
                <strong>Размеры</strong><br /><small class="text-muted">Управление размерами: 4&frac12; (37), 5 (37&frac12;), 5&frac12; (38)</small>
            </a>
            <a href="index.php?r=admin/wideness" class="list-group-item">
                <strong>Полноты</strong><br /><small class="text-muted">Управление полнотами: F, F&frac12;, G, H</small>
            </a>
            <a href="index.php?r=admin/shoes-type" class="list-group-item">
                <strong>Типы обуви</strong><br /><small class="text-muted">Управление типами обуви: ботинки, сапоги, туфли</small>
            </a>
            <a href="index.php?r=admin/heel-height" class="list-group-item">
                <strong>Высоты каблуков</strong><br /><small class="text-muted">Управление высотами каблуков: низкая, средняя, высокая</small>
            </a>
            <a href="index.php?r=admin/upper-material" class="list-group-item">
                <strong>Материалы верха</strong><br /><small class="text-muted">Управление материалами верха: гладкая кожа, замша, нубук</small>
            </a>
            <a href="index.php?r=admin/lining-material" class="list-group-item">
                <strong>Материалы подкладки</strong><br /><small class="text-muted">Управление материалами подкладки: натуральный мех, текстиль</small>
            </a>
            <a href="index.php?r=admin/sole-material" class="list-group-item">
                <strong>Материалы подошвы</strong><br /><small class="text-muted">Управление материалами подошвы: каучук, синтетика</small>
            </a>
        </div>
    <!--        <p>
            This is the view content for action "<?= $this->context->action->id ?>".
            The action belongs to the controller "<?= get_class($this->context) ?>"
            in the "<?= $this->context->module->id ?>" module.
        </p>
        <p>
            You may customize this page by editing the following file:<br>
            <code><?= __FILE__ ?></code>
        </p>-->
    </div>
<?php } ?>