<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h1>Edit User</h1>

<form action="<?= base_url('users/update/' . $user['id']) ?>" method="post" enctype="multipart/form-data">

    <label>Username:</label><br>
    <input type="text" name="username" value="<?= esc($user['username']) ?>"><br><br>

    <label>Full Name:</label><br>
    <input type="text" name="full_name" value="<?= esc($user['full_name']) ?>"><br><br>

    <label>Profile Picture:</label><br>
    <input type="file" name="avatar" accept=".jpg,.jpeg,.png"><br><br>

    <button type="submit">Update User</button>

</form>

</body>
</html>