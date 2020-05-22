
<html>
    <head >
<style>
    @import url("css/header.css");
</style>    
</head>
    <body>
        <header class ="header">
            <div class="header-inner">
                <div class="header__top">
                    <div class =header-inner__top>
                        <div class="header-inner__top__navigation">
                            <ul class="nav navbar-nav mr-auto"> 
                                <li class="nav-item"> 
                                    <a>Выбрать город</a> 
                                </li>
                                <li class="nav-item"> 
                                    <a href="Address.php" data-href="Address" class="nav-link">Адреса сервисных центров</a> 
                                </li>
                                    <a href="Contact.php" data-href="Contact" class="nav-link">Контакты</a>
                                </li>
                                </li>
                                    <?php if( isset($_SESSION['logged_user']) ) : ?>  
                                        <a href="#"  class="nav-link" style="text-decoration: underline;"><?php echo $_SESSION['logged_user']->name;?> <?php echo $_SESSION['logged_user']->surname;?></a>;
                                        <a href="SignOut.php"  class="nav-link" style="text-decoration: underline;">Выход</a>;
                                    <?php else : ?>
                                    <a href="SignIn.php" data-href="Contact" class="nav-link" style="text-decoration: underline;">Вход/Регистрация</a>;
                                    <?php endif; ?>
                                
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header__centre">
                    <div class="header-inner__centre">
                        <div class="header-inner__centre__company">
                            <div class="header-inner__centre__company__logo">
                                <img src="images/logo.png" alt="logo">
                            </div>
                            <div class="header-inner__centre__company__name">
                                <p>ITService</p>
                            </div>
                        </div>
                            <div class="header-inner__centre__navigation">
                                <ul class="nav navbar-nav mr-auto"> 
                                    <li class="nav-item"> 
                                        <a href="Index.php" data-href="Index" class="nav-link">Главная</a> 
                                    </li>
                                    <li class="nav-item"> 
                                        <a href="Shop.php" data-href="Shop" class="nav-link">Продажа</a> 
                                    </li>
                                    <li class="nav-item"> 
                                        <a href="Price_list.php" data-href="Price_list" class="nav-link">Прайс</a> 
                                    </li>
                                </ul>
                            </div>
                            
                        <div class="header-inner__centre__info">
                            <div class="header-inner__centre__info__number">
                                <img src="images/phone.png" alt="phone">
                                <p>+7 (909) 090-80-60<p>
                            </div>
                            <div class="header-inner__centre__info__openclose">
                            Ежедневно с 8:30 до 20:30
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header__bottom">
                    <div class="header-inner__bottom">
                            <ul class="nav navbar-nav mr-auto"> 
                                <li class="nav-item"> 
                                    <a href="#" data-href="Index" class="nav-link">Ремонт Apple</a> 
                                </li>
                                <li class="nav-item"> 
                                    <a href="#" data-href="Shop" class="nav-link">Ремонт телефонов</a> 
                                </li>
                                <li class="nav-item"> 
                                    <a href="#" data-href="Price_list" class="nav-link">Ремонт ноутбуков</a> 
                                </li>
                                <li class="nav-item"> 
                                    <a href="#" data-href="Personal" class="nav-link">Ремонт планшетов</a> 
                                </li>
                            </ul>
                    </div>

                </div>
            </div>
        </header>
    </body>
</html>