<?php 
include TEMPLATE_HEAD;
include TEMPLATE_NAV;
$sql = "SELECT user_order_is_delivered
        FROM user_order";
$h1_result = mysqli_query($connection, $sql);
$h1_order = '';
while ($h1 = mysqli_fetch_assoc($h1_result)) {
    if ($h1["user_order_is_delivered"] == 0) {
        $h1_order = "Narudžbine";
    }
}
?>
<div class="orders">
    <h1><?= $h1_order ?></h1>
    <?php

    $sql = "SELECT *
            FROM `user_order`
            ORDER BY `user_order_sent_at`";
    $info_result = mysqli_query($connection, $sql);
    $no_orders = true;

    ?>
    <?php while ($info = mysqli_fetch_assoc($info_result)): ?>
        <?php if ($info["user_order_is_delivered"] == 0): ?>
            <?php $no_orders = false ?>
            <div class="order-list">
                <div class="order-list-info">
                    <p><b>Naručeno:</b> <?= $info["user_order_sent_at"] ?></p>
                    <p><b>Ime:</b> <?= $info["user_order_name"] ?></p>
                    <p><b>Adresa:</b> <?= $info["user_order_address"] ?></p>
                    <p><b>Telefon:</b> <?= $info["user_order_phone"] ?></p>
                    <p class="order-complete"><a href="<?= URL_ORDERS ?>&action=finish&id=<?= $info["user_order_id"] ?>">Gotovo</a></p>
                </div>
                <div class="order-list-food"> 
                    <?php    

                    $user_order_id = $info["user_order_id"];
                    $sql = "SELECT *
                            FROM `food_user_order`
                            INNER JOIN `food`
                                ON `food_user_order`.`food_id` = `food`.`food_id`
                            WHERE `food_user_order`.`user_order_id` = $user_order_id";
                    $order_result = mysqli_query($connection, $sql);
                    $total_price = 0;

                    ?>
                    <?php while ($order = mysqli_fetch_assoc($order_result)): ?>
                        <?php 

                            $amount = $order["food_user_order_amount"];
                            $food_price = $order["food_price"] * $amount;
                            $food_price = sprintf("%.2f", $food_price);
                            $total_price += $food_price;
                            $total_price = sprintf("%.2f", $total_price);
                        ?>
                        <div>
                            <p class="order-list-name"><?= $order["food_name"] .  " (x$amount)" ?></p>
                            <p class="order-list-price"><?= $food_price ?> RSD</p>
                        </div>                     
                    <?php endwhile ?>
                    <p class="final-price">Ukupno - <?= $total_price ?> RSD</p>
                </div>
            </div>
        <?php endif ?>
    <?php endwhile ?>
    <?php if($no_orders == true): ?>
        <div class="no-orders">
            <h1>Trenutno nema narudžbina</h1>
        </div>
    <?php endif ?>
</div>
<?php if ($display == "finish"): ?>
    <div class="confirm">
        <form class="confirm-menu" method="post">
            <h3 class="confirm-title">Gotova Naružbina</h3>
            <p>Da li želite da potvrdite naružbinu?</p>
            <div class="confirm-btn">
                <button class="confirm-btn-yes" name="finish" value="1">Potvrdi</button>
                <button class="confirm-btn-no" name="finish" value="0">Otkaži</button>
            </div>
        </form>
    </div>
<?php endif ?>