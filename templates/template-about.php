<?php

include TEMPLATE_HEAD;
include TEMPLATE_NAV;
$sql = "SELECT *
        FROM `about`
        WHERE `about_id` = 1";
$result = mysqli_query($connection, $sql);
$about = mysqli_fetch_assoc($result);

?>
<div class="about">
    <img src="<?= IMG_ABOUT ?>" alt="pizza about" class="img-about">
    <div class="about-info">
        <div class="about-top">
            <h1>O nama</h1>
            <?php if (isset($_SESSION["admin_id"])): ?>
                <a href="<?= URL_ABOUT ?>&action=edit">Izmeni</a>
            <?php endif ?>
        </div>
        <p><?= $about["about_main_p"] ?></p><br>
        <p><?= $about["about_second_p"] ?></p><br>
    </div>
</div>
<?php if ($display == "edit"): ?>
    <div class="confirm">
        <?php

        if (!isset($_SESSION["admin_id"])) {
            redirect(URL_E404);
        }
        $sql = "SELECT *
                FROM `about`
                WHERE `about_id` = 1";
        $result = mysqli_query($connection, $sql);
        $about = mysqli_fetch_assoc($result);
        
        ?>
        <form class="confirm-menu confirm-menu-about" method="post">
            <h3 class="confirm-title confirm-title-about">O Nama</h3>
            <textarea name="main-p" placeholder="Glavni paragraf"><?= $about["about_main_p"] ?></textarea>
            <textarea name="second-p" placeholder="Drugi paragraf"><?= $about["about_second_p"] ?></textarea>
            <div class="confirm-btn">
                <button class="confirm-btn-yes" name="edit" value="1">Promeni</button>
                <button class="confirm-btn-no" name="edit" value="0">Otkaži</button>
            </div>
        </form>
    </div>
<?php endif ?>
<?php include TEMPLATE_FOOTER ?>