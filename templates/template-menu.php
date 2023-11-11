<?php include TEMPLATE_NAV ?> 
<form class="menu" action="<?= URL_MENU ?>&action=order" method="post">

    <?php 
    $sql = "SELECT * 
            FROM `category` 
            ORDER BY `category_id`";
    $category_result = mysqli_query($connection, $sql);
    ?>

    <?php while ($category = mysqli_fetch_assoc($category_result)): ?>
        
        <h1><?= $category["category_name"]; ?></h1>
        <?php if (isset($_SESSION["admin_id"])): ?>
            <a href="<?= URL_MENU ?>&action=add&id=<?= $category["category_id"] ?>" class="menu-edit-category"><i class="fa-solid fa-plus"></i></a>
            <a href="<?= URL_MENU ?>&action=edit-c&id=<?= $category["category_id"] ?>" class="menu-edit-category"><i class="fas fa-edit"></i></a>
            <a href="<?= URL_MENU ?>&action=delete-c&id=<?= $category["category_id"] ?>" class="menu-edit-category"><i class="fa-solid fa-trash-can"></i></a>
        <?php endif ?>
        
        <?php
        $category_id = $category["category_id"];
        $sql = "SELECT *
                FROM `food`
                WHERE `category_id` = $category_id";
        $food_result = mysqli_query($connection, $sql);   
        ?> 
        
        <div class="menu-category"> 
            
        <?php $counter = 0; ?>
        <?php while ($food = mysqli_fetch_assoc($food_result)): ?>
            <?php if ($counter % 2 == 0): ?> 
                <div> 
            <?php endif ?>

            <?php if (file_exists($food["food_img_path"])): ?>
                <img src="<?= $food["food_img_path"] ?>">
            <?php else : ?>
                <img src="<?= IMG_MENU_PLACEHOLDER ?>">
            <?php endif ?>

            <div class="menu-col">
                <p class="menu-food"><?= $food["food_name"] ?></p>
                <p class="menu-price"><?= $food["food_price"] ?> RSD</p>
                
                <?php if (!isset($_SESSION["admin_id"])): ?>
                    <?php $food_id = $food["food_id"]; ?>
                    <input class="menu-amount" type="number" name="<?= $food_id ?>" value="0" step="1">
                <?php endif ?>

                <?php if (isset($_SESSION["admin_id"])): ?>
                    <div class="menu-edit-div">
                        <a href="<?= URL_MENU ?>&action=edit&id=<?= $food["food_id"] ?>" class="menu-edit-options"><i class="fas fa-edit"></i></a>
                        <a href="<?= URL_MENU ?>&action=delete&id=<?= $food["food_id"] ?>" class="menu-edit-options"><i class="fa-solid fa-trash-can"></i></a>
                    </div>
                <?php endif ?>
            </div>

            <?php if ($counter % 2 == 1): ?>
                </div> 
            <?php endif ?>

            <?php $counter++; ?>
        <?php endwhile ?>

        <?php if ($counter % 2 == 1): ?>
            <div class="menu-col-one"></div></div>
        <?php endif ?>

        </div>
    <?php endwhile ?>

    <?php if (isset($_SESSION["admin_id"])): ?>
        <h1>Dodaj Kategoriju</h1>
        <a href="<?= URL_MENU ?>&action=add-c" class="menu-edit-category"><i class="fa-solid fa-plus"></i></a>
    <?php else : ?>
        <button class="order-btn" type="submit" value="">Naruči</button>
    <?php endif ?>

</form>
<?php if ($display != "list"): ?>
    <div class="confirm">
        <?php 
            switch ($display) {
            case "add": include TEMPLATE_MENU_ADD; break;
            case "edit": include TAMPLETE_MENU_EDIT; break;
            case "delete": include TEMPLATE_MENU_DELETE; break;
            case "add-c": include TEMPLATE_MENU_ADD_C; break;
            case "edit-c": include TAMPLETE_MENU_EDIT_C; break;
            case "delete-c": include TEMPLATE_MENU_DELETE_C; break;
            }
        ?>
    </div>
<?php endif ?>
<?php if (isset($_GET["sent"])): ?>
    <?php if ($_GET["sent"] == 1): ?>
        <div class="confirm">
            <form class="confirm-menu" method="get">
                <h3 class="confirm-title">Narudžbina</h3>
                <p>Vaša narudžbina je poslata!</p>
                <div class="confirm-btn">
                    <a class="confirm-btn-no confirm-btn-a" href="<?= URL_MENU ?>">Zatvori</a>
                </div>
            </form>
        </div>
    <?php endif ?>
<?php endif ?>
<?php include TEMPLATE_FOOTER ?>