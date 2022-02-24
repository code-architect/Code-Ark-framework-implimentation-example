<?php
/**
 * @var $model \app\models\User
 */
/** @var $this \app\core\View */
$this->title = 'Login';

?>
<h1>Login</h1>

<?php $form = \app\core\form\Form::begin('', 'post');

echo $form->field($model, 'email')->emailField();
echo $form->field($model, 'password')->passwordField(); ?>
<br>
<button type="submit" class="btn btn-primary">register</button>
<?php \app\core\form\Form::end(); ?>
