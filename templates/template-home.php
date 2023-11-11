<?php include TEMPLATE_HEAD ?>
<div class="background">
    <?php include TEMPLATE_NAV ?>
    <div class="home">
        <h1>PICERIJA MIŠKO</h1>
        <h2>RADNO VREME</h2>
        <p>PONEDELJAK - SUBOTA (08:00 - 20:00)</p>
    </div>
    <div class="btn-menu">
        <a href="<?= URL_MENU ?>">NAŠ MENI</a>
    </div>
</div>
<div class="home-about">
    <h1>O nama</h1>
    <p><?= $about["about_main_p"] ?></p>
</div>
<div class="btn-about">
    <a href="<?= URL_ABOUT ?>">SAZNAJTE VIŠE</a>
</div>
<?php include TEMPLATE_FOOTER ?>