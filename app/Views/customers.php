
<!DOCTYPE html>
<html>
<head>
    <title>Customer Accounts</title>
</head>
<body>

<nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('about') ?>">About</a> |
    <a href="<?= base_url('customers') ?>">Customers</a> |
    <a href="<?= base_url('users') ?>">Users</a> |
    <a href="<?= base_url('logout') ?>">Logout</a>
</nav>

<h1>Customer Accounts</h1>

<?php foreach ($customers as $customer): ?>

    <div>
        <h3><?= esc($customer['full_name']) ?></h3>
        <p>Email: <?= esc($customer['email']) ?></p>
        <p>Phone: <?= esc($customer['phone']) ?></p>

        <a href="<?= base_url('customers/edit/' . $customer['id']) ?>">
            Edit
        </a>
    </div>

    <hr>

<?php endforeach; ?>

</body>
</html>