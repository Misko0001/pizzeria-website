<nav>
    <a href="<?= URL_HOME ?>"><img src="<?= IMG_LOGO ?>" alt="pizza logo"></a>
    <div class="nav-menu">
        <ul>
            <li><a href="<?= URL_HOME ?>">POČETAK</a></li>
            <li><a href="<?= URL_MENU ?>">MENI</a></li>
            <li><a href="<?= URL_ABOUT ?>">O NAMA</a></li>
            <?php if (isset($_SESSION["admin_id"])): ?>
                <li><a href="<?= URL_ORDERS ?>">NARUDŽBINE</a></li>
                <li><a href="<?= URL_MESSAGES ?>">PORUKE</a></li>
                <li><a href="<?= URL_ADMINISTRATION ?>">ADMINISTRACIJA</a></li>
            <?php endif ?>
                <li><a href="<?= URL_CONTACT ?>">KONTAKT</a></li>
            <?php if (isset($_SESSION["admin_id"]) || isset($_SESSION["user_id"])): ?>
                <li class="btn-login"><a href="<?= URL_LOGOUT ?>">ODJAVITE SE</a></li>
            <?php else : ?>
                <li class="btn-login"><a href="<?= URL_LOGIN ?>">PRIJAVITE SE</a></li>
            <?php endif ?>
        </ul>
    </div>
</nav>