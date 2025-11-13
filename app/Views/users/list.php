<!DOCTYPE html>
<html>

<head>
    <title>User List</title>
</head>

<body>
    <h2>User List</h2>

    <a href="<?= base_url('user/create'); ?>">Add New User</a>
    <br><br>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color:green;"><?= session()->getFlashdata('success'); ?></p>
    <?php endif; ?>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Gender</th>
            <th>State</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= esc($user['id']); ?></td>
                <td><?= esc($user['name']); ?></td>
                <td><?= esc($user['email']); ?></td>
                <td><?= esc($user['mobile']); ?></td>
                <td><?= esc($user['gender']); ?></td>
                <td><?= esc($user['state']); ?></td>
                <td>
                    <a href="<?= base_url('user/edit/' . $user['id']); ?>">Edit</a> |
                    <a href="<?= base_url('user/delete/' . $user['id']); ?>" onclick="return confirm('Delete this user?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>