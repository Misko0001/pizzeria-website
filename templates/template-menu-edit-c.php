<?php 
if (!isset($_SESSION["admin_id"])) {
    redirect(URL_E404);
}

$sql = "SELECT `category_name` 
        FROM `category`
        WHERE `category_id` = $id";
$result = mysqli_query($connection, $sql);
$category = mysqli_fetch_assoc($result);
?>
<form class="confirm-menu" method="post">
    <h3 class="confirm-title">Uredi Kategoriju</h3>
    <p>Promenite ime kategorije!</p>
    <input type="text" placeholder="<?= $category["category_name"] ?>" value="<?= $category["category_name"] ?>" name="name"><br>
    <div class="confirm-btn">
        <button class="confirm-btn-yes" name="edit-c" value="1">Promeni</button>
        <button class="confirm-btn-no" name="edit-c" value="0">Otkaži</button>
    </div>
</form>