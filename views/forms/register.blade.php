<?php
	include_once Application::$ROOT_DIR . "/core/form/form.php";
?>
<h1>You almost there just fill those fields and welcome onboard</h1>
<?php
 	$form = Form::begin('registration', "POST", "login-form"); 
		echo $form->field($user, 'name', 'Full Name', 'John Dracula')->required();
		echo $form->field($user, 'email', 'Email')
					->default('default@email.com')
					->disabled()
					->emailField();
		echo $form->field($user, 'username')->required();
		echo $form->field($user, 'password')->passwordField()->required();
		echo $form->submite('Sign up');

	Form::end();

    // var_dump($user);
	/*
 <form method="POST" action="/registration" class="login-form">
    <div class="row">
        <div class="col-25">
            <label for="email">Email</label>
        </div>
        <div class="col-75">
            <input type="email" disabled="disabled" id="email" name="email" value="<?=$email?>">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label for="password">Password</label>
        </div>
        <div class="col-75">
            <input type="password" id="password" name="password" placeholder="Your Secure Password">
        </div>
    </div>
    <div class="row">
        <input type="submit" value="Sign up">
    </div>
</form> --}}
*/
