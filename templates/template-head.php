<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="SR">
    <link rel="stylesheet" href="<?= CSS_STYLE ?>"/>
    <?php if ($page == ''): ?>
        <link rel="stylesheet" href="<?= CSS_HOME ?>"/>
    <?php endif ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link rel="icon" href="<?= IMG_ICON ?>" type="image/icon" sizes="16x16">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <script defer src="<?= JS_NAV ?>"></script>
    <?php if ($page == "administration"): ?>
        <script defer src="<?= JS_IS ?>"></script>
    <?php endif ?>
    <title>Picerija Miško</title>
</head>
<body>