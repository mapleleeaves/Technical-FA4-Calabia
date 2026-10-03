<!DOCTYPE html>
<html>
<head>
    <title>Customer Accounts</title>
</head>
<body>

    <h1>Customer Accounts</h1>
    <p>
    Logged in as: <?= esc(session('username')) ?> |
    <a href="<?= site_url('logout') ?>">Logout</a>
    </p>

    <?php if (session('message')): ?>
        <p><?= session('message') ?></p>
    <?php endif; ?>

    <p>
        <a href="<?= site_url('customers/new') ?>">Add New Customer</a>
    </p>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= esc($customer['id']) ?></td>
                <td><?= esc($customer['full_name']) ?></td>
                <td><?= esc($customer['email']) ?></td>
                <td>
                    <a href="<?= site_url('customers/edit/' . $customer['id']) ?>">
                        Edit
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>