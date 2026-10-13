<!DOCTYPE html>
<html>
<head>
    <title>New User</title>
</head>
<body>

<h1>New User</h1>

<form action="<?= base_url('users/create') ?>" method="post">

    <label>Username:</label><br>
    <input type="text" name="username"><br><br>

    <label>Full Name:</label><br>
    <input type="text" name="full_name"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <button type="submit">Save User</button>

</form>

</body>
</html>