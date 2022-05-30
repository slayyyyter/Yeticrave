<nav class="nav">
    <ul class="nav__list container">
        <?
        foreach ($cat as $catd)
        {
            ?>
            <li class="nav__item">
                <a href="../pages/all-lots.html"><?=$catd['catg_name']?></a>
            </li>
            <?
        }
        ?>
    </ul>
</nav>
<form class="form container <?=$form_class?>" action="../auth.php" method="post"> <!-- form--invalid -->
    <h2>Вход</h2>
    <div class="form__item <?=$div_class[1]?>"> <!-- form__item--invalid -->
        <label for="email">E-mail <sup>*</sup></label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?=$form_items?>">
        <span class="form__error"><?=$email_error?></span>
    </div>
    <div class="form__item form__item--last <?=$div_class[2]?>">
        <label for="password">Пароль <sup>*</sup></label>
        <input id="password" type="password" name="password" placeholder="Введите пароль">
        <span class="form__error"><?=$password_error?></span>
    </div>
    <button type="submit" class="button">Войти</button>
</form>
