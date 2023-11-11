<?php include TEMPLATE_HEAD ?>
<?php include TEMPLATE_NAV ?>
<div class="info">
    <h1>Bitne Informacije</h1>
    <p class="info-phone"><b>Telefon:</b> 060 0754107</p>
    <p class="info-email"><b>Email:</b> <a href="mailto:stankovicmilos100@yahoo.com">stankovicmilos100@yahoo.com</p></a>
    <p class="info-time"><b>Radno vreme:</b> Ponedeljak - Subota (08:00 - 20:00)</p>
</div>
<div class="contact">
    <form class="contact-form" method="post">
        <h1>Pišite nam</h1>
        <input type="text" name="name" placeholder="Ime"> 
        <input type="email" name="email" placeholder="Email*">
        <?php if ($email_empty): ?>
            <p class="is-empty">Unesite email</p>
        <?php endif ?>
        <input type="text" name="phone" placeholder="Telefon">
        <textarea name="message" placeholder="Poruka*"></textarea>
        <?php if ($message_empty): ?>
            <p class="is-empty is-empty-msg">Unesite poruku</p><br>
        <?php endif ?>
        <button>Pošalji</button>
        <?php if (isset($_SESSION["admin_id"])): ?>
            <a class="contact-messages-btn" href="<?= URL_MESSAGES ?>">Poruke</a>
        <?php endif ?>
    </form>
    <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11610.989161464431!2d21.88516513847551!3d43.319549316144595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b0b3ec7cb9a7%3A0xf513b5a4e0503ea7!2z0KbQtdC90YLQsNGALCDQndC40Yg!5e0!3m2!1ssr!2srs!4v1650125184828!5m2!1ssr!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
<?php include TEMPLATE_FOOTER ?>