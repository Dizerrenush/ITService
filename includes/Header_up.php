<?php
require "db.php";
?>


<html>
    <head >
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/style.css">
    

</head>
    <body>
        <div class="header__top">
            <div class =header-inner__top>
                <div class="header-inner__top__navigation">
                    <nav class="nav"> 
                        <ul>
                        <li> 
                            <a>Выбрать город</a> 
                        </li>
                        <li> 
                            <a href="Address.php" data-href="Address" class="nav-link">Адреса сервисных центров</a> 
                        </li>
                            <a href="Contact.php" data-href="Contact" class="nav-link">Контакты</a>
                        </li>
                            <?php if( isset($_SESSION['logged_user']) ) : ?>  
                                <li><a href="#"  class="nav-link" style="text-decoration: underline;"><?php echo $_SESSION['logged_user']->name;?> <?php echo $_SESSION['logged_user']->surname;?></a></li> ;
                                
                                <li><a href="SignOut.php"  class="nav-link" style="text-decoration: underline;">Выход</a>;</li> 
                            <?php else : ?>
                                <li><a class="cd-signin" href="#0">Войти</a></li>                                </li>                    
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
		<div class="cd-user-modal-container"> <!-- this is the container wrapper -->
			<ul class="cd-switcher">
				<li><a href="#0">Вход</a></li>
				<li><a href="#0">Регистрация</a></li>
			</ul>

			<div id="cd-login"> <!-- log in form -->
				<form class="cd-form"method="post" action="Sign.php">
					<p class="fieldset">
                        <label class="image-replace cd-username" for="signin-username">Логин</label>
                        <input class="full-width has-padding has-border" name="username" id="signin-username" type="text" placeholder="Логин*" required>
                        
					</p>

					<p class="fieldset">
						<label class="image-replace cd-password" for="signin-password">Пароль</label>
						<input class="full-width has-padding has-border" name="password" id="signin-password" type="text"  placeholder="Пароль*" required>
						<a href="#0" class="hide-password">Hide</a>
					</p>

					<p class="fieldset">
						<input type="checkbox" id="remember-me" checked>
						<label for="remember-me">Запомнить меня</label>
					</p>

					<p class="fieldset">
						<input class="full-width" type="submit" name="do_signin" value="Login">
					</p>
				</form>
				
				<p class="cd-form-bottom-message"><a href="#0">Забыли пароль??</a></p>
				<!-- <a href="#0" class="cd-close-form">Close</a> -->
			</div> <!-- cd-login -->

			<div id="cd-signup"> <!-- sign up form -->
				<form class="cd-form" method="post" action="Sign.php">
					<p class="fieldset">
						<label class="image-replace cd-username" for="signup-username">Логин</label>
						<input class="full-width has-padding has-border" name="username" id="signup-username" type="text" placeholder="Логин*" required>
					</p>

					<p class="fieldset">
						<label class="image-replace cd-email" for="signup-email">E-mail</label>
						<input class="full-width has-padding has-border" name="email" id="signup-email" type="email" placeholder="E-mail">
					</p>
                    <p class="fieldset">
						<label class="image-replace cd-username" for="signup-username">Имя</label>
						<input class="full-width has-padding has-border" name="name" id="signup-username" type="text" placeholder="Имя*" required>
                    </p>
                    <p class="fieldset">
						<label class="image-replace cd-username" for="signup-username">Фамилия</label>
						<input class="full-width has-padding has-border" name="surname" id="signup-username" type="text" placeholder="Фамилия*" required>
                    </p>
                    <p class="fieldset">
						<label class="image-replace cd-username" for="signup-username">Номер телефона</label>
						<input class="full-width has-padding has-border" name="surname" id="signup-username" type="text" placeholder="Номер телефона" required>
					</p>
					<p class="fieldset">
						<label class="image-replace cd-password" for="signup-password">Пароль</label>
						<input class="full-width has-padding has-border" name="password" id="signup-password" type="text"  placeholder="Пароль*" required>
						<a href="#0" class="hide-password">Hide</a>
                    </p>
                    
                    <p class="fieldset">
						<label class="image-replace cd-password" for="signup-password">Повторите пароль</label>
						<input class="full-width has-padding has-border" name="password_2" id="signup-password" type="text"  placeholder="Повторите пароль*" required>
						<a href="#0" class="hide-password">Hide</a>
					</p>

					<p class="fieldset">
						<input type="checkbox" id="accept-terms">
						<label for="accept-terms">Я согласен с <a href="#0">правилами</a></label>
					</p>

					<p class="fieldset">
						<input class="full-width has-padding" type="submit" name="do_signup" value="Create account">
					</p>
				</form>

				<!-- <a href="#0" class="cd-close-form">Close</a> -->
			</div> <!-- cd-signup -->

			<div id="cd-reset-password"> <!-- reset password form -->
				<p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

				<form class="cd-form">
					<p class="fieldset">
						<label class="image-replace cd-email" for="reset-email">E-mail</label>
						<input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<input class="full-width has-padding" type="submit" value="Reset password">
					</p>
				</form>

				<p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
			</div> <!-- cd-reset-password -->
			<a href="#0" class="cd-close-form">Close</a>
		</div> <!-- cd-user-modal-container -->
	</div> <!-- cd-user-modal -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/modal.js"></script>
</html>