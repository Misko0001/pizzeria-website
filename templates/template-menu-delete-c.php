<?php 
if (!isset($_SESSION["admin_id"])) {
    redirect(URL_E404);
} 
?>
<form class="confirm-menu" method="post">
    <h3 class="confirm-title">Izbriši Kategoriju</h3>
    <p>Da li želite da izbrišete ovu kategoriju?<br>
    Proizvodi koj pripadaju ovoj kategoriji će takođe biti izbrisani!</p>
    <div class="confirm-btn">
        <button class="confirm-btn-yes" name="delete-c" value="1">Potvrdi</button>
        <button class="confirm-btn-no" name="delete-c" value="0">Otkaži</button>
    </div>
</form>