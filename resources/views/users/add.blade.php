<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/app.css">

    <script src="/app.js"></script>
</head>
<body>
        <header class="w3-padding">

        <h1 class="w3-text-red">Portfolio Console</h1>

        <?php if(Auth::check()): ?>
            You are logged in as <?= auth()->user()->name ?>  | 
            <a href="/logout">Log Out</a> | 
            <a href="/dashboard">Dashboard</a> | 
            <a href="/">Website Home Page</a>
        <?php else: ?>
            <a href="/">Return to My Portfolio</a>
        <?php endif; ?>

        </header>

        <hr>

        <section class="w3-padding">

        <h2>Add User</h2>

        <form method="post" action="/users/add" novalidate class="w3-margin-bottom">

            <?= csrf_field() ?>

            <div class="w3-margin-bottom">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?= old('name') ?>" required>

            </div>


            <div class="w3-margin-bottom">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?= old('email') ?>" required>

                <?php if($errors->first('email')): ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('email'); ?></span>
                <?php endif; ?>
            </div>

            <div class="w3-margin-bottom">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">

                <?php if($errors->first('password')): ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('password'); ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" class="w3-button w3-green">Add User</button>

        </form>

        <a href="/users/list">Back to User List</a>

        </section>

</body>
</html>