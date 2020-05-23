<html>
    <head >
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/font.css">
</head>
    <body>
        <div class="header__top">
            <div class =header-inner__top>
                <div class="header-inner__top__navigation">
                    <ul class="nav navbar-nav mr-auto"> 
                        <li class="nav-item"> 
                            <a>Выбрать город</a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="links/Address.php" data-href="Address" class="nav-link">Адреса сервисных центров</a> 
                        </li>
                            <a href="links/Contact.php" data-href="Contact" class="nav-link">Контакты</a>
                        </li>
                            <?php if( isset($_SESSION['logged_user']) ) : ?>  
                                <li><a href="#"  class="nav-link" style="text-decoration: underline;"><?php echo $_SESSION['logged_user']->name;?> <?php echo $_SESSION['logged_user']->surname;?></a></li> ;
                                
                                <li><a href="SignOut.php"  class="nav-link" style="text-decoration: underline;">Выход</a>;</li> 
                            <?php else : ?>
                                <li>
                                <a class="cd-signin" href="SignIn.php" style="text-decoration: underline;" >Вход/Регистрация</a>
                                </li>                    
                            <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>

</html>