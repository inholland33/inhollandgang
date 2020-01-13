<?php

class View
{

    function __construct()
    {
    }


    public function render($name, $cms = false)
    {
        require 'views/header.php'; ?>
        <?php
        if ($cms == true) {

            require 'views/cms_menu.php';
            require 'views/' . $name . '.php';
            require 'views/footer.php';
        } else {
            require 'views/NavBalk.php';
            require 'views/' . $name . '.php';
            require 'views/footer.php';
        }
    }

}