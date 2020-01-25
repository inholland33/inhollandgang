<section class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <article class="bg-light border-right" id="sidebar-wrapper">
        <section class="sidebar-heading"></section>
        <section class="list-group list-group-flush">
            <a href="<?php echo URL; ?>dashboard" class="list-group-item list-group-item-action bg-light">Dashboard</a>
            <article><p class="list-group-item list-group-item-action bg-light toggleSubmenu">View site<span
                            style="text-align: right">&#9662;</span></p>
                <section class="submenu toggleSubmenu">
                    <p><a href="<?php echo URL; ?>" class="list-group-item list-group-item-action">Home</a></p>
                    <p><a href="<?php echo URL; ?>jazz" class="list-group-item list-group-item-action">Jazz</a></p>
                    <p><a href="<?php echo URL; ?>historic" class="list-group-item list-group-item-action">Historic</a>
                    </p>
                    <p><a href="<?php echo URL; ?>dance" class="list-group-item list-group-item-action">Dance</a></p>
                    <p><a href="<?php echo URL; ?>food" class="list-group-item list-group-item-action">Food</a></p>
                    <p><a href="<?php echo URL; ?>contact" class="list-group-item list-group-item-action">Contact</a>
                    </p>
                    <p><a href="<?php echo URL; ?>shop" class="list-group-item list-group-item-action">Shop</a></p>
                    <p><a href="<?php echo URL; ?>profile" class="list-group-item list-group-item-action">Profile</a>
                    </p>

                </section>
            </article>

            <a href="<?php echo URL; ?>content" class="list-group-item list-group-item-action bg-light">Content
                Management</a>
            <a href="<?php echo URL; ?>event" class="list-group-item list-group-item-action bg-light">Event
                Management</a>
            <a href="<?php echo URL; ?>user" class="list-group-item list-group-item-action bg-light">User Management</a>
            <a href="<?php echo URL; ?>admin" class="list-group-item list-group-item-action bg-light">Admin</a>
            <a href="<?php echo URL; ?>owner" class="list-group-item list-group-item-action bg-light">Superadmin</a>
        </section>
    </article>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->

    <article id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <h3><?= (isset($this->title)) ? $this->title : 'CMS'; ?></h3>

            <section class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

                    <li class="nav-item active">
                        <a class="nav-link getProfile" href="#"><?= (isset($this->user)) ? $this->user : 'CMS'; ?>
                            <img class="" src="<?php echo URL; ?>public/img/ico/profile.png" alt="icon" width="32px"
                                 height="32px">
                            <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </section>
        </nav>

        <main class="main container-fluid">

