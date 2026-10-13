
<!DOCTYPE html>
<html>
<head>
    <title>Add New Task</title>
</head>
<body>
    <h1>Add New Task</h1>

    <?php if (session()->getFlashdata('errors')): ?>
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <p style="color: red;"><?= esc($error) ?></p>
        <?php endforeach; ?>
    <?php endif; ?>

    <form action="<?= base_url('tasks/create') ?>" method="post">
        <?= csrf_field() ?>

        <label>Task Title:</label><br>
        <input type="text" name="title" value="<?= old('title') ?>" required>
        <br><br>

        <label>Status:</label><br>
        <select name="status">
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
        </select>
        <br><br>

        <label>Task Date:</label><br>
        <input type="date" name="task_date" value="<?= old('task_date') ?>" required>
        <br><br>

        <button type="submit">Save Task</button>
    </form>

    <br>
    <a href="<?= base_url('tasks') ?>">Back to Task List</a>
</body>
</html>
