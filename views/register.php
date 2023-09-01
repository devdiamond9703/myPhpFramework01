<?php 
    use app\core\form\Form;
?>
<h2>Register Form</h2>
<?php $form = Form::begin('/register', 'post'); ?>
    <div class="mb-3">
        <?php echo $form->field($model, 'firstname'); ?>
    </div>
    <div class="mb-3">
        <?php echo $form->field($model, 'lastname'); ?>
    </div>
    <div class="mb-3">
        <?php echo $form->field($model, 'email')->emailField(); ?>
    </div>
    <div class="mb-3">
        <?php echo $form->field($model, 'password')->passwordField(); ?>
    </div>
    <div class="mb-3">
        <?php echo $form->field($model, 'passwordConfirm')->passwordField(); ?>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end(); ?>