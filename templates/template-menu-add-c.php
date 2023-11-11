<?php 
if (!isset($_SESSION["admin_id"])) {
    redirect(URL_E404);
}
?>
<form class="confirm-menu" method="post">
    <h3 class="confirm-title">Dodaj Kategoriju</h3>
    <p>Dodajte novu kategoriju!</p>
    <input type="text" placeholder="Kategorija" name="name">
    <div class="confirm-btn">
        <button class="confirm-btn-yes" name="add-c" value="1">Dodaj</button>
        <button class="confirm-btn-no" name="add-c" value="0">Otkaži</button>
    </div>
</form>