<?php
	/** @var $user User */
use core\Form\Form;
?>
<h1>You almost there just fill those fields and welcome onboard</h1>
<?php
	$form = Form::begin('registration', "POST", "login-form");
		echo $form->field($user, 'name', 'Full Name')->setHolder('John Dracula')->required();
		echo $form->field($user, 'email', 'Email')
					->default($email) /** @var $email */
					->disabled()
					->emailField();
		echo $form->field($user, 'username')->required();
		echo $form->field($user, 'password')->passwordField()->required();
		echo $form->submit('Sign up');

	Form::end();

