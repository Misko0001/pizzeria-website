<?php
include TEMPLATE_HEAD;
include TEMPLATE_NAV;
?>

<div class="is">
    <div class="container1">
        <canvas id="is1"></canvas>
        <form class="is1-form" method="post">
            Prikaži zadnja <input class="is1-input" name="filter" type="number" value=<?= $filter ?> step="1"> dana 
            <button class="is1-btn">Filtriraj podatke</button>
        </form>
    </div>
    <div class="container2">
        <canvas id="is2"></canvas>
    </div>
</div>