 <!DOCTYPE >
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Список дел</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Список дел</h1>
        <form action="/add.php" method="post">
            <input type="text" name="task" id="task" placeholder="Нужно сделать..." class="form-control">
            <button type="submit" name="sendTask" class="btn btn-success">Отправить</button>

        </form>
        <?php
        $dsn = 'mysql:host=localhost;dbname=to-do';
        $pdo = new PDO($dsn,'root','');
        echo '<ul>';
        $query = $pdo->prepare('SELECT * FROM `tasks` ORDER BY `id` DESC ');
        $query->execute();
        while($row=$query->fetch(PDO::FETCH_OBJ)){
            echo '<li><b>'.$row->task.'</b><a href="/delete.php?id='.$row->id.'"<button>Удалить</button></a></li>';

        }
        echo '</ul>';
        ?>
    </div>

</body>
</html>