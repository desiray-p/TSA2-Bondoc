
<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
</head>
<body>

<nav>
    <a href="<?= base_url('/') ?>">Welcome</a> |
    <a href="<?= base_url('tasks') ?>">Task List</a> |
    <a href="<?= base_url('profile') ?>">Profile</a> |
    <a href="<?= base_url('about') ?>">About</a> |
    <a href="<?= base_url('login') ?>">Login</a> |
    <a href="<?= base_url('logout') ?>">Logout</a>
</nav>

<h1>Task List</h1>

<?php if (session()->getFlashdata('success')): ?>
    <p style="color: green;"><?= esc(session()->getFlashdata('success')) ?></p>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <p style="color: red;"><?= esc(session()->getFlashdata('error')) ?></p>
<?php endif; ?>

<?php if (session()->get('isLoggedIn')): ?>
    <p>
        <a href="<?= base_url('tasks/new') ?>">Add New Task</a>
    </p>
<?php endif; ?>

<?php if (empty($tasks)): ?>
    <p>No tasks available.</p>
<?php else: ?>

    <?php foreach ($tasks as $task): ?>
        <div>
            <h3><?= esc($task['title']) ?></h3>
            <p>Status: <?= esc($task['status']) ?></p>
            <p>Date: <?= esc($task['task_date']) ?></p>

            <?php if (session()->get('isLoggedIn')): ?>
                <a href="<?= base_url('tasks/edit/' . $task['id']) ?>">Edit</a>

                <form action="<?= base_url('tasks/delete/' . $task['id']) ?>" method="post" style="display: inline;">
                    <?= csrf_field() ?>
                    <button type="submit" onclick="return confirm('Archive this task?')">
                        Archive
                    </button>
                </form>
            <?php endif; ?>
        </div>

        <hr>
    <?php endforeach; ?>

<?php endif; ?>

</body>
</html>
