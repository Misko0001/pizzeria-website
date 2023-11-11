<?php 

$order = $_POST;
$error = true;
foreach ($order as $id => $amount) {
    if ($amount > 0) {
        $error = false;
    }
}
if (!$error) {
    foreach ($order as $id => $amount) {
        if ($amount < 0) {
            $error = true;
        }
    }
}
if ($error) {
    redirect(URL_MENU);
}
include TEMPLATE_NAV;

?>
<form class="order-menu" method="post">
    <?php $total_price = 0; ?>
    <?php foreach ($order as $id => $amount): ?>
        <?php if ($amount != 0): ?>
            <?php

            $sql = "SELECT *
                    FROM `food`
                    WHERE `food_id` = $id";
            $result = mysqli_query($connection, $sql);
            $food = mysqli_fetch_assoc($result);
            $food_price = $food["food_price"] * $amount;
            $food_price = sprintf("%.2f", $food_price);
            $total_price += $food_price;
            $total_price = sprintf("%.2f", $total_price);

            ?>
            <div class="order-food">
                <p><?= $food["food_name"] . " (x$amount)"; ?></p>
                <p><?= $food_price; ?> RSD</p>
            </div>
        <?php endif ?>
    <?php endforeach ?>
    <p class="total-price">Ukupno - <?= $total_price ?> RSD</p>
    <?php 

    $order_str = implode('|', array_map(
        function ($v, $k) { return sprintf("%s=%s", $k, $v); },
        $order,
        array_keys($order)
    ));
    
    ?>
    <div class="order-info">
        <?php if (!isset($_SESSION["user_id"])): ?>
            <input type="text" name="name" placeholder="Vaše ime i prezime">
            <input type="text" name="address" placeholder="Vaša adresa">
            <input type="text" name="phone" placeholder="Vaš broj telefona"><br>
        <?php else : ?>
            <div class="order-info-user">
                <div class="order-user">
                    <p><b>Korisničko ime:</b></p>
                    <p><?= $_SESSION["user_name"] ?></p>
                </div>
                <div class="order-user">
                    <p><b>Adresa:</b></p>
                    <p><?= $_SESSION["user_address"] ?></p>
                </div>
                <div class="order-user">
                    <p><b>Telefon:</b></p>
                    <p><?= $_SESSION["user_phone"] ?></p>
                </div>
            </div>
        <?php endif ?>
        <div class="ord-btns">
            <button class="confirm-ord-btn" name="confirm" value="<?= $order_str ?>">Potvrdi</button>
            <button class="back-ord-btn" name="confirm" value="0">Otkaži</button>
        </div>
    </div>
</form>