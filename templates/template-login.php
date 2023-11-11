<?php include TEMPLATE_HEAD ?>
<?php include TEMPLATE_NAV ?>
<div class="login">
    <h2>Prijavite se</h2>
    <div class="login-form">
        <form method="post">
            <input type="text" name="name" placeholder="Korisničko ime"><br>
            <input type="password" name="password" placeholder="Lozinka"><br>
            <?php if ($error): ?>
                <p>Pogrešno korisničko ime ili lozinka!</p>
            <?php endif ?>
            <div class="login-submit">
                <a href="<?= URL_REGISTER ?>">Otvorite nalog</a>
                <button name="submit">PRIJAVITE SE</button>
            </div>
        </form>
    </div>
</div>
<?php include TEMPLATE_FOOTER ?>