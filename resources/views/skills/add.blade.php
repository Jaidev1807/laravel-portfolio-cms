<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <header class="w3-padding">

            <h1 class="w3-text-red">Portfolio Console</h1>

            <?php if(Auth::check()): ?>
                You are logged in as <?= auth()->user()->name ?> | 
                <a href="/logout">Log Out</a> | 
                <a href="/dashboard">Dashboard</a> | 
                <a href="/">Website Home Page</a>
            <?php else: ?>
                <a href="/">Return to My Portfolio</a>
            <?php endif; ?>

        </header>

        <hr>

        <section class="w3-padding">

        <h2>Add Skills</h2>

        <form method="post" action="/skills/add" novalidate class="w3-margin-bottom">

            <?= csrf_field() ?>

            <div class="w3-margin-bottom">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?= old('name') ?>" required>
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" value="<?= old('description') ?>" required>
                
                <?php if($errors->first('name')): ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('name'); ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" class="w3-button w3-green">Add Type</button>

        </form>

        <a href="/skills/list" class="w3-button w3-green">Back to Type List</a>

        </section>

</body>
</html>