<header id="header">
    <h3 id="title">Haarlem Festival</h3>
</br>
    <?php //if (Session::get('loggedIn') == false):?>
    <a href="<?php echo URL; ?>index">Home</a>
    <a href="<?php echo URL; ?>about-us">Events</a>
    <a href="<?php echo URL; ?>help">Program</a>
    <a href="<?php echo URL; ?>help">Tickets</a>
    <a href="<?php echo URL; ?>help">Contact</a>
    <?php //endif; ?>
    <?php if (Session::get('loggedIn') == true): ?>
        <a href="<?php echo URL; ?>dashboard">Dashboard</a>
        <a href="<?php echo URL; ?>note">Notes</a>
        <?php if (Session::get('role') == 'owner'): ?>
            <a href="<?php echo URL; ?>user">User</a>
        <?php endif; ?>
        <a href="<?php echo URL; ?>content">Content</a>
        <a href="<?php echo URL; ?>dashboard/logout">Logout</a>
    <?php else: ?>
        <a href="<?php echo URL; ?>login">Login</a>
    <?php endif; ?>
</header>
<section id="content">