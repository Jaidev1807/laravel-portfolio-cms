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
    <section>
        <?php if(session()->has('message')): ?>
            <div class="w3-padding w3-margin-top w3-margin-bottom">
                <div class="w3-red w3-center w3-padding"><?= session()->get('message') ?></div>
            </div>
        <?php endif; ?>
        <h1>Manage Educations</h1>
        <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
                <tr class="w3-red">
                    <th>Institution</th>
                    <th>Degree</th>
                    <th>Major</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End date</th>
                    <th>Edit</th>
                    <th>Delete</th>


                </tr>
                <?php foreach($educations as $key => $value): ?>
                    <tr>
                        <td><?= $value->institution ?></td>
                        <td><?= $value->degree ?></td>
                        <td><?= $value->major ?></td>
                        <td><?= $value->description ?></td>
                        <td><?= $value->start_date ?></td>
                        <td><?= $value->end_date ?></td>
                        <td><a href="/educations/edit/<?= $value->id ?>">Edit</a></td>
                        <td><a href="/educations/delete/<?= $value->id ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="/educations/add" class="w3-button w3-green">Add Education</a>
    </section>
</body>
</html>