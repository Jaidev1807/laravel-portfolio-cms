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

        <h1 class="w3-text-red">Dashboard</h1>

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

                <h2>Add Experience</h2>

                    <form method="post" action="/experiences/add" novalidate class="w3-margin-bottom">

                    <?= csrf_field() ?>

                    <div class="w3-margin-bottom">
                        <label for="position">Position:</label>
                        <input type="text" name="position" id="position" value="<?= old('position') ?>" required>
                        <label for="company">company:</label>
                        <input type="text" name="company" id="company" value="<?= old('company') ?>" required>
                        <label for="description">Description:</label>
                        <input type="text" name="description" id="description" value="<?= old('description') ?>" required>
                        <label for="start_date">Start Date:</label>
                        <input type="date" name="start_date" id="start_date" value="<?= old('start_date') ?>" required>
                        <label for="end_date">End Date:</label>
                        <input type="date" name="end_date" id="end_date" value="<?= old('end_date') ?>" required>
                        <?php if($errors->first('position')): ?>
                            <br>
                            <span class="w3-text-red"><?= $errors->first('position'); ?></span>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="w3-button w3-green">Add Experience</button>

                    </form>

                <a href="/experiences/list" class="w3-button w3-green">Back to Experience List</a>

        </section>
</body>
</html>