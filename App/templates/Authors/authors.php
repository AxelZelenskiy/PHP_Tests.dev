<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<h1>View Authors</h1>

<table class="table table-hover">
    <thead>
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Books</th>
    </tr>
    </thead>
<tbody>
<?php /** @var \App\Views\Author $users */
foreach ($users as $user) : ?>
<tr>
    <td><?php echo $user->Name; ?></td>
    <td><?php echo $user->Surname; ?></td>
    <td><?php echo $user->email; ?></td>
    <td><?php if (!empty($user->books)) : ?>
        <?php foreach ($user->books as $book) :?>
                <?php echo $book->book_name . "</br>";?>
        <?php endforeach;?>
            <?php else: echo "-=Nothing was written=-";?>
        <?php endif;?>
        </td>

</tr>
<?php endforeach;?>
</tbody>
</table>







<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>