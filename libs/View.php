<?php

class View
{

    function __construct()
    {
    }


    public function render($name, $cms = false, $menus = true)
    {
        require 'views/header.php'; ?>
        <?php
        if ($cms == true) {
            if ($menus == true) {
                require 'views/cms_menu.php';
                require 'views/' . $name . '.php';
                require 'views/footer.php';
            } else {
                require 'views/' . $name . '.php';
            }
        } else {
            if ($menus == true) {
                require 'views/NavBalk.php';
                require 'views/' . $name . '.php';
                require 'views/footer.php';
            } else {
                require 'views/' . $name . '.php';
            }
        }
    }

}