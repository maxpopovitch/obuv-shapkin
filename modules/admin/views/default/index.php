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
        <a class="btn btn-primary" href="index.php?r=admin/brand">Торговые марки</a>
        <p>
            This is the view content for action "<?= $this->context->action->id ?>".
            The action belongs to the controller "<?= get_class($this->context) ?>"
            in the "<?= $this->context->module->id ?>" module.
        </p>
        <p>
            You may customize this page by editing the following file:<br>
            <code><?= __FILE__ ?></code>
        </p>
    </div>
<?php } ?>