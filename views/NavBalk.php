<header id="header">

    <?php //if (Session::get('loggedIn') == false):?>
    <a href="https://www.instagram.com"><img src="/inhollandgang/temp/uploads/insta.png"></a>
    <a href="https://www.facebook.com"><img src="/inhollandgang/temp/uploads/facebook.png"></a>
    <a href="https://www.twitter.com"><img src="/inhollandgang/temp/uploads/twitter.png"></a>
    <a href="<?php echo URL; ?>index">HAARLEM FESTIVAL</a>
    <a href="<?php echo URL; ?>/index">Home</a>
    <div class="dropdown">
        <button class="dropbtn">Events</button>
        <div class="dropdown-content">
            <a href="<?php echo URL; ?>/3lagen/interface/jazzindex.php">Jazz</a>
            <a href="<?php echo URL; ?>/3lagen/interface/danceindex.php">Dance</a>
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
        <img src="/inhollandgang/temp/uploads/mandje.png"></a>
        <img src="/inhollandgang/temp/uploads/inlog.png"></a>

    <?php endif; ?>
</header>