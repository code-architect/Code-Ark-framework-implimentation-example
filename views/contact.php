<?php
/** @var $this View */
/** @var $model ContactForm */

use \app\core\form\TextareaField;
use app\core\View;
use app\models\ContactForm;

$this->title = 'Contact';
?>

<h1>Contact</h1>

<?php $form = \app\core\form\Form::begin('', 'post');
      echo $form->field($model, 'subject');
      echo $form->field($model, 'email');
      echo new TextareaField($model, 'body') ?>
<br>
<button type="submit" class="btn btn-primary">Submit</button>
<?php \app\core\form\Form::end(); ?>


