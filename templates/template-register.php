<?php include TEMPLATE_HEAD ?>
<?php include TEMPLATE_NAV ?>
<div class="login">
    <h2>Registrujte se</h2>
    <form class="login-form register-form" method="post">
        <input type="text" name="name" placeholder="Korisničko ime">
        <?php if ($name_error): ?>
            <p>Unesite ime</p>
        <?php endif ?>
        <input type="email" name="email" placeholder="Email">
        <?php if ($email_error): ?>
            <p>Unesite email</p>
        <?php endif ?>
        <input type="text" name="phone" placeholder="Telefon">
        <?php if ($phone_error): ?>
            <p>Unesite telefon</p>
        <?php endif ?>
        <input type="text" name="address" placeholder="Adresa">
        <?php if ($address_error): ?>
            <p>Unesite adresu</p>
        <?php endif ?>
        <div class="passwords">
            <input type="password" name="password" placeholder="Lozinka">
            <input type="password" name="confirm" placeholder="Potvrda">
        </div>
        <?php if ($password_error): ?>
            <p>Unesite lozinku</p>
        <?php endif ?>
        <div class="login-submit register-submit">
            <button name="submit">REGISTRUJTE SE</button>
        </div>
    </form>
</div>
<?php include TEMPLATE_FOOTER ?>