<?php 
if (!isset($_SESSION["admin_id"])) {
    redirect(URL_E404);
}

$sql = "SELECT *
        FROM `food`
        WHERE `food_id` = $id";
$result = mysqli_query($connection, $sql);
$food = mysqli_fetch_assoc($result);
$food_img = str_replace(DIR_MENU_IMG, "", $food["food_img_path"])
?>
<form class="confirm-menu" method="post">
    <h3 class="confirm-title">Uredi Proizvod</h3>
    <p>Promenite ime, cenu i sliku proizvoda!</p>
    <input type="text" placeholder="<?= $food["food_name"] ?>" value="<?= $food["food_name"] ?>" name="name">
    <input type="text" placeholder="<?= $food["food_price"] ?>" value="<?= $food["food_price"] ?>" name="price">
    <input type="text" placeholder="<?= $food_img ?>" value="<?= $food_img ?>" name="img">
    <div class="confirm-btn">
        <button class="confirm-btn-yes" name="edit" value="1">Promeni</button>
        <button class="confirm-btn-no" name="edit" value="0">Otkaži</button>
    </div>
</form>