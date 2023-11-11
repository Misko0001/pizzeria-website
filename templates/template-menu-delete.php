<?php 
if (!isset($_SESSION["admin_id"])) {
    redirect(URL_E404);
} 
?>
<form class="confirm-menu" method="post">
    <h3 class="confirm-title">Izbriši Proizvod</h3>
    <p>Da li želite da izbrišete ovaj proizvod?</p>
    <div class="confirm-btn">
        <button class="confirm-btn-yes" name="delete" value="1">Potvrdi</button>
        <button class="confirm-btn-no" name="delete" value="0">Otkaži</button>
    </div>
</form>