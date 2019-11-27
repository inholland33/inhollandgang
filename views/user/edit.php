<h1>User: Edit</h1>

<?php
//print_r($this->user);

?>

<form method="post" action="<?php echo URL; ?>user/editSave/<?php echo $this->user['user_id']; ?>">
    <label for="username">Username</label><input type="text" id="username" name="username"
                                                 value="<?php echo $this->user['name']; ?>"/><br/>
    <label for="password">Password</label><input type="text" id="password" name="password"/><br/>
    <label for="rank">Rank</label>
    <select id="rank" name="rank">
        <option value="customer" <?php if ($this->user['rank'] == 'customer') echo 'selected'; ?>>Customer</option>
        <option value="volunteer" <?php if ($this->user['rank'] == 'volunteer') echo 'selected'; ?>>Volunteer</option>
        <option value="admin" <?php if ($this->user['rank'] == 'admin') echo 'selected'; ?>>Admin</option>
        <option value="owner" <?php if ($this->user['rank'] == 'owner') echo 'selected'; ?>>Owner</option>
    </select><br/>
    <label>&nbsp;</label><input type="submit"/>
</form>