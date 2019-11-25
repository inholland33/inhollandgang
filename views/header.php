<!doctype html>
<html>
<head>
    <title><?= (isset($this->title)) ? $this->title : 'JREAM MVC'; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo URL ?>favicon.ico"/>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css"/>
    <script type="text/javascript" src="<?php //echo URL; ?>public/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>

    <?php
    if (isset($this->js)) {
        foreach ($this->js as $js)
            echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
    }
    ?>
</head>
<body>

<?php Session::init(); ?>



	
	