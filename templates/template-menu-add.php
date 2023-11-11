<?php 
if (!isset($_SESSION["admin_id"])) {
    redirect(URL_E404);
}
?>
<form class="confirm-menu" method="post">
    <h3 class="confirm-title">Dodaj Proizvod</h3>
    <p>Dodajte ime, cenu i sliku novog proizvoda!</p>
    <input type="text" placeholder="Hrana" name="name">
    <input type="text" placeholder="Cena" name="price">
    <input type="text" placeholder="Slika" name="img">
    <div class="confirm-btn">
        <button class="confirm-btn-yes" name="add" value="1">Dodaj</button>
        <button class="confirm-btn-no" name="add" value="0">Otkaži</button>
    </div>
</form>