<?php
/**
 * @var $model \app\models\User
 */
/** @var $this \app\core\View */
$this->title = 'Register';

?>

<h1>Register</h1>

<?php $form = \app\core\form\Form::begin('', 'post'); ?>
    <div class="row">
        <div class="col">
            <?php echo $form->field($model, 'firstname'); ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'lastname'); ?>
        </div>
    </div>
<?php
    echo $form->field($model, 'email')->emailField();
    echo $form->field($model, 'password')->passwordField();
    echo $form->field($model, 'confirmPassword')->passwordField(); ?>
<br>
<button type="submit" class="btn btn-primary">register</button>
<?php \app\core\form\Form::end(); ?>
