<!DOCTYPE html>
<html>
<head>
    <title>New Customer</title>
</head>
<body>

<h1>New Customer</h1>

<form action="<?= base_url('customers/create') ?>" method="post">

    <label>Full Name:</label><br>
    <input type="text" name="full_name"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Phone:</label><br>
    <input type="text" name="phone"><br><br>

    <button type="submit">Save Customer</button>

</form>

</body>
</html>