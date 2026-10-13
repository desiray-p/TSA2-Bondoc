<!DOCTYPE html>
<html>
<head>
    <title>User Accounts</title>
</head>
<body>

<nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('about') ?>">About</a> |
    <a href="<?= base_url('customers') ?>">Customers</a> |
    <a href="<?= base_url('users') ?>">Users</a> |
    <a href="<?= base_url('logout') ?>">Logout</a>
</nav>

<h1>User Accounts</h1>

<?php foreach ($users as $user): ?>

    <div>

        <?php if (!empty($user['avatar'])): ?>
            <img src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
                 width="100"
                 height="100"
                 alt="Profile Picture">
        <?php else: ?>
            <p>No profile picture</p>
        <?php endif; ?>

        <h3><?= esc($user['full_name']) ?></h3>

        <p>Username: <?= esc($user['username']) ?></p>

        <a href="<?= base_url('users/edit/' . $user['id']) ?>">
            Edit
        </a>

    </div>

    <hr>

<?php endforeach; ?>

</body>
</html>