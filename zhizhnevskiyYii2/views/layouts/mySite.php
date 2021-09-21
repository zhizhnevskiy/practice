<?php
use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
<meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <!-- <title>Zhizhnevskiy Yuriy</title> -->
    <!-- <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleLogo.css">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Oswald'> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Responsive Image Gallery with jQuery" />
    <meta name="keywords"
        content="jquery, carousel, image gallery, slider, responsive, flexible, fluid, resize, css3" />
    <meta name="author" content="Codrops" />
    <!-- <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/demo02.css" />
    <link rel="stylesheet" type="text/css" href="css/style02.css" />
    <link rel="stylesheet" type="text/css" href="css/elastislide02.css" />
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css' /> -->
    <?php $this->head() ?>
</head>

<body id="main">
    <?php $this->beginBody() ?>
    <?= $content ?>
    <!-- <img src="images/foto.jpg" alt="foto">
    <div class="text">Zhizhnevskiy Yuriy</div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src="js/index.js"></script>

    <div class="box">
        <div id="first"><a href="01_I.html" style="color:white;">I</a></div>
        <div id="second"><a href="02_HAVE.html" style="color:black;">HAVE</a></div>
        <div id="first"><a href="03_DREAM.html" style="color:white;">DREAM</a></div>
    </div> -->

    <footer>
        <section>email:zhizhnevskiy@yandex.ru, tel:+37529 715 27 21</section>

        <section>
            <a href="https://github.com/zhizhnevskiy/site.git">GITHUB</a>
            <a href="https://www.linkedin.com/in/zhizhnevskiy/">LINKEDIN</a>
            <a href="https://www.instagram.com/zhizhnevskiy_yuriy/">INSTAGRAM</a>
            <a href="https://www.facebook.com/profile.php?id=100014018685413">FACEBOOK</a>
            <a href="https://vk.com/zhizhnevskiy">VK</a>
            <a href="https://vimeo.com/user52923231">VIMEO</a>

        </section>

        <section>
            &copy; Zhizhnevskiy Yuriy 2020
        </section>
    </footer>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>