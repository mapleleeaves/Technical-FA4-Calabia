<!DOCTYPE html>
<html>
<head>
    <title>POS Login</title>
</head>
<body>

    <h1>POS Login</h1>

    <?php if (session('error')): ?>
        <p><?= esc(session('error')) ?></p>
    <?php endif; ?>

    <?php if (session('errors')): ?>
        <ul>
            <?php foreach (session('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= site_url('login') ?>" method="post">
        <?= csrf_field() ?>

        <p>
            <label>Username</label><br>
            <input
                type="text"
                name="username"
                value="<?= old('username') ?>"
            >
        </p>

        <p>
            <label>Password</label><br>
            <input
                type="password"
                name="password"
            >
        </p>

        <button type="submit">Login</button>
    </form>

</body>
</html>