<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>

<nav>
    <a href="<?= base_url('/') ?>">Welcome</a> |
    <a href="<?= base_url('tasks') ?>">Task List</a> |
    <a href="<?= base_url('profile') ?>">Profile</a> |
    <a href="<?= base_url('about') ?>">About</a>
</nav>

<h1>Profile</h1>

<h3><?= $user['full_name'] ?></h3>
<p>Username: <?= $user['username'] ?></p>
<p>Email: <?= $user['email'] ?></p>

</body>
</html>