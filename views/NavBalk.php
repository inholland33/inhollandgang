<header id="header">

    <?php //if (Session::get('loggedIn') == false):?>
    <ae href="<?php echo URL; ?>index">HAARLEM FESTIVAL</ae>
    <div class="dropdown">
        <button class="dropbtn">Events</button>
        <div class="dropdown-content">
            <a href="<?php echo URL; ?>/jazz">Jazz</a>
            <a href="<?php echo URL; ?>/dance">Dance</a>
            <a href="<?php echo URL; ?>/historic">Historic</a>
            <a href="<?php echo URL; ?>/food">Food</a>
        </div>
    </div>
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
<main id="content">