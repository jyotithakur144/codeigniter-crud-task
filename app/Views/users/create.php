<!DOCTYPE html>
<html>

<head>
    <title>Add User</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <h2>Add New User</h2>

    <form method="post" action="<?= base_url('user/store'); ?>">
        <?= csrf_field() ?>

        Name: <input type="text" name="name" value="<?= set_value('name'); ?>">
        <?= isset($validation) ? '<span class="error">' . $validation->showError('name') . '</span>' : '' ?><br>

        Email: <input type="email" name="email" value="<?= set_value('email'); ?>">
        <?= isset($validation) ? '<span class="error">' . $validation->showError('email') . '</span>' : '' ?><br>

        Mobile: <input type="text" name="mobile" value="<?= set_value('mobile'); ?>">
        <?= isset($validation) ? '<span class="error">' . $validation->showError('mobile') . '</span>' : '' ?><br>

        Gender:
        <input type="radio" name="gender" value="Male" <?= set_value('gender') == 'Male' ? 'checked' : '' ?>> Male
        <input type="radio" name="gender" value="Female" <?= set_value('gender') == 'Female' ? 'checked' : '' ?>> Female
        <input type="radio" name="gender" value="Other" <?= set_value('gender') == 'Other' ? 'checked' : '' ?>> Other
        <?= isset($validation) ? '<span class="error">' . $validation->showError('gender') . '</span>' : '' ?><br>

        State:
        <select name="state">
            <option value="">Select State</option>
            <option value="Gujarat" <?= set_value('state') == 'Gujarat' ? 'selected' : '' ?>>Gujarat</option>
            <option value="Punjab" <?= set_value('state') == 'Punjab' ? 'selected' : '' ?>>Punjab</option>
            <option value="Rajasthan" <?= set_value('state') == 'Rajasthan' ? 'selected' : '' ?>>Rajasthan</option>
            <option value="Delhi" <?= set_value('state') == 'Delhi' ? 'selected' : '' ?>>Delhi</option>
        </select>
        <?= isset($validation) ? '<span class="error">' . $validation->showError('state') . '</span>' : '' ?><br><br>

        <button type="submit">Save</button>
    </form>

</body>

</html>