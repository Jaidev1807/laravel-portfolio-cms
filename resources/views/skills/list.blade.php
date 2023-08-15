<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/app.css">

    <script src="/app.js"></script>
    <title>Document</title>
</head>
<body>
<header>
    <h1>dashboard<h1>
        <?php if(Auth::check()): ?>
                    You are logged in as <?= auth()->user()->name ?> | 
                    <a href="/login">Log Out</a> | 
                    <a href="/dashboard">Dashboard</a> | 
                    <a href="/">Website Home Page</a>
                <?php else: ?>
                    <a href="/">Return to My Portfolio</a>
                <?php endif; ?>  
    </header> 
    <section>
        <?php if(session()->has('message')): ?>
            <div class="w3-padding w3-margin-top w3-margin-bottom">
                <div class="w3-red w3-center w3-padding"><?= session()->get('message') ?></div>
            </div>
        <?php endif; ?>
        <h1>Manage skills</h1>
        <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
                <tr class="w3-red">
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>edit</th>
                    <th>delete</th>

                </tr>
                <?php foreach($skills as $key => $value): ?>
                    <tr>
                        <td><?= $value->name ?></td>
                        <td><?= $value->description ?></td>
                        <td><?= $value->created_at ?></td>
                        <td><a href="/skills/edit/<?= $value->id ?>">Edit</a></td>
                        <td><a href="/skills/delete/<?= $value->id ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="/skills/add" class="w3-button w3-green">Add Skills</a>
    </section>

   
</body>
</html>