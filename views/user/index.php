<h1>User</h1>

<form method="post" action="<?php echo URL; ?>user/create">
    <label for="username">Username</label><input type="text" id="username" name="username"/><br/>
    <label for="password">Password</label><input type="text" id="password" name="password"/><br/>
    <label for="rank">Rank</label>
    <select id="rank" name="rank">
        <option value="customer">customer</option>
        <option value="volunteer">volunteer</option>
        <option value="admin">Admin</option>
        <option value="owner">owner</option>
    </select><br/>
    <label>&nbsp;</label><input type="submit"/>
</form>
<br>

<table>
    <?php
    //print_r($this);
    foreach ($this->userList as $key => $value) {
        echo '<tr>';
        echo '<td>' . $value['user_id'] . '</td>';
        echo '<td>' . $value['name'] . '</td>';
        echo '<td>' . $value['rank'] . '</td>';
        echo '<td>
				<a href="' . URL . 'user/edit/' . $value['user_id'] . '">Edit</a>
				<a href="' . URL . 'user/delete/' . $value['user_id'] . '">Delete</a>
			</td>';
        echo '</tr>';
    }
    ?>
</table>