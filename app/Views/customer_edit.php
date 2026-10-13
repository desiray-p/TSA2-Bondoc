<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
</head>
<body>

<h1>Edit Customer</h1>

<form action="<?= base_url('customers/update/' . $customer['id']) ?>" method="post">

    <label>Full Name:</label><br>
    <input type="text" name="full_name" value="<?= esc($customer['full_name']) ?>"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= esc($customer['email']) ?>"><br><br>

    <label>Phone:</label><br>
    <input type="text" name="phone" value="<?= esc($customer['phone']) ?>"><br><br>

    <button type="submit">Update Customer</button>

</form>

</body>
</html>