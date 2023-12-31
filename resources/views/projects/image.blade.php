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

        <h2>Project Image</h2>

        <div class="w3-margin-bottom">
            <?php if($project->image): ?>
                <img src="<?= asset('storage/'.$project->image) ?>" width="200">
            <?php endif; ?>
        </div>

        <form method="post" action="/projects/image/<?= $project->id ?>" novalidate class="w3-margin-bottom" enctype="multipart/form-data">

            <?= csrf_field() ?>

            <div class="w3-margin-bottom">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" value="<?= old('image') ?>" required>
                
                <?php if($errors->first('image')): ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('image'); ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" class="w3-button w3-green">Add Image</button>

        </form>

        <a href="/projects/list">Back to Project List</a>

    </section>

</body>
</html>