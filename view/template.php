<!DOCTYPE html>
<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <link rel="icon" href="<?php if (isset($url_param)) {echo '../';} ?>public/img/favicons/favicon_night.ico">
    <link rel="stylesheet" href="<?php if (isset($url_param)) {echo '../';} ?>public/dist/app.css">
    <meta name="viewport" content="width=device-width" />

    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
        
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->
</head>

<body>
    <?php include 'header.php'; ?>
    <?= $content ?>

    <footer>
        <script src="<?php if (isset($url_param)) {echo '../';} ?>public/js/add_dream.js"></script>
        <script src="<?php if (isset($url_param)) {echo '../';} ?>public/js/guide_ajax.js"></script>   
        <script src="https://cdnjs.cloudflare.com/ajax/libs/instantclick/3.0.1/instantclick.min.js" data-no-instant></script>
        <script data-no-instant>InstantClick.init();</script>
    </footer>

</body>
</html>
