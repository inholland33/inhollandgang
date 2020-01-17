<!doctype html>
<html lang="en">
<head>
    <title><?= (isset($this->title)) ? $this->title : 'Haarlem Festival'; ?></title>
    <!--    <base href="--><?php //echo URL; ?><!--">-->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo URL ?>favicon.ico"/>
    <!--    <link rel="stylesheet" href="--><?php //echo URL; ?><!--public/css/default.css"/>-->
    <script type="text/javascript" src="<?php //echo URL; ?>public/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <?php
    if (isset($this->css)) {
        foreach ($this->css as $css)
            echo '<link rel="stylesheet" href="' . URL . $css . '"/>';
    } ?>

    <?php
    if (isset($this->js)) {
        foreach ($this->js as $js)
            echo '<script type="text/javascript" src="' . URL . $js . '"></script>';
    } ?>
</head>
<body>

<?php Session::init(); ?>

	