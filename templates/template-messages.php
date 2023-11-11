<?php 

include TEMPLATE_NAV;

$sql = "SELECT * 
        FROM `contact` 
        ORDER BY `contact_sent_at` DESC
        LIMIT 10";
$result = mysqli_query($connection, $sql);

?>
<?php if (mysqli_num_rows($result) > 0): ?>

    <div class="received-messages">  
        <h1>Poruke</h1>
    <?php while ($contact = mysqli_fetch_assoc($result)): ?>

        <?php

        $name_empty = true;
        $phone_empty = true;

        if ($contact["contact_name"] != '') 
            $name_empty = false;
        if ($contact["contact_phone"] != '')
            $phone_empty = false;
        
        ?>
        <div>
            <a href="<?= URL_MESSAGES ?>&action=delete&id=<?= $contact["contact_id"] ?>" class="msg-delete"><i class="fa-solid fa-trash-can"></i> Izbriši</a>
            <p class="message-info"><b>Poslato:</b> <?= $contact["contact_sent_at"]; ?></p>
            <?php if (!$name_empty): ?>
                <p class="message-info"><b>Ime:</b> <?= $contact["contact_name"]; ?></p>
            <?php endif ?>
            <p class="message-info"><b>Email:</b> <?= $contact["contact_email"]; ?></p>
            <?php if (!$phone_empty): ?>
                <p class="message-info"><b>Telefon:</b> <?= $contact["contact_phone"]; ?></p> 
            <?php endif ?>
            <p class="message"><?= $contact["contact_message"]; ?></p>
        </div>
    <?php endwhile ?>
    </div>
<?php else : ?>
    <div class="no-messages">
        <h1>Trenutno nema nijedna poruka</h1>
    </div>
<?php endif ?>
<?php if ($display == "delete"): ?>
    <div class="confirm">
        <form class="confirm-menu" method="post">
            <h3 class="confirm-title">Izbriši Poruku</h3>
            <p>Da li želite da izbrišete ovu poruku?</p>
            <div class="confirm-btn">
                <button class="confirm-btn-yes" name="delete-msg" value="1">Potvrdi</button>
                <button class="confirm-btn-no" name="delete-msg" value="0">Otkaži</button>
            </div>
        </form>
    </div>
<?php endif ?>