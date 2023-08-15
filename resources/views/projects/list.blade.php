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
        You are logged in as <?= auth()->user()->first ?> <?= auth()->user()->last ?> | 
        <a href="/logout">Log Out</a> | 
        <a href="/dashboard">Dashboard</a> | 
        <a href="/">Website Home Page</a>
    <?php else: ?>
        <a href="/">Return to My Portfolio</a>
    <?php endif; ?>

    </header>  
    <section>
        <h1>Manage Projects</h1>
        <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
                <tr class="w3-red">
                    <th></th>
                    <th>Title</th>
                    <th>link</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Edit image</th>
                    <th>edit</th>
                    <th>delete</th>

                </tr>
                <?php foreach($projects as $key => $value): ?>
                    <tr>
                    <td>
                            <?php if($value->image): ?>
                                <img src="<?= asset('storage/'.$value->image) ?>" width="200">
                            <?php endif; ?>
                        </td>
                        <td><?= $value->title ?></td>
                        <td>
                            <a href="/project/<?= $value->link ?>">
                                <?= $value->link ?>
                            </a>
                        </td>
                        <td><?= $value->description ?></td>
                        <td><?= $value->created_at->format('M j, Y') ?></td>
                        <td><a href="/projects/image/<?= $value->id ?>">Image</a></td>
                        <td><a href="/projects/edit/<?= $value->id ?>">Edit</a></td>
                        <td><a href="/projects/delete/<?= $value->id ?>">Delete</a></td>

                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="/projects/add" class="w3-button w3-green">Add Project</a>
    </section>


</body>
</html>