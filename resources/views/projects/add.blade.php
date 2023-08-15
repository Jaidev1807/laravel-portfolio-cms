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
                You are logged in as <?= auth()->user()->first ?> <?= auth()->user()->last ?> | 
                <a href="/logout">Log Out</a> | 
                <a href="/dashboard">Dashboard</a> | 
                <a href="/">Website Home Page</a>
            <?php else: ?>
                <a href="/">Return to My Portfolio</a>
            <?php endif; ?>

        </header>

        <hr>

        <section class="w3-padding">

            <h2>Add Project</h2>

            <form method="post" action="/projects/add" novalidate class="w3-margin-bottom">

            <?= csrf_field() ?>

            <div class="w3-margin-bottom">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" value="<?= old('title') ?>" required>
                <label for="link">Description:</label>
                <input type="text" name="description" id="description" value="<?= old('description') ?>" required>
                <label for="link">Link:</label>
                <input type="text" name="link" id="link" value="<?= old('link') ?>" required>
                
                <?php if($errors->first('title')): ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('title'); ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" class="w3-button w3-green">Add Project</button>

            </form>

            <a href="/ptojrcts/list" class="w3-button w3-green">Back to Project List</a>

        </section>
</body>
</html>