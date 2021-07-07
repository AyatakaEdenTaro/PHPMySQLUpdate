<?php

$dsn = "mysql:dbname=list_db;host=localhost";
$user = "root";
$password = "root";

try {
    $dbh = new PDO($dsn, $user, $password);
    $sql = 'UPDATE task_list SET '
        . 'to_do_task_2 = :task, '
        . 'insert_date_2 = :day '
        . 'WHERE '
        . 'user_name = :user';
    $prepare = $dbh->prepare($sql);
    $prepare->bindValue(':task', $_POST["TASK"], PDO::PARAM_STR);
    $prepare->bindValue(':day', $_POST["DAY"], PDO::PARAM_STR);
    $prepare->bindValue(':user', $_POST["USER"], PDO::PARAM_STR);
    $prepare->execute();

    $sql = 'SELECT * FROM task_list';
    $prepare = $dbh->prepare($sql);

    $prepare->execute();
    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    var_dump($result);
} catch (PDOException $e) {
    echo "接続に失敗しました" . "\n";
    echo $e->getMessage() . "\n";
}

//$sth->bindValue(":task", $_POST["TASK"]);
//$sth->bindValue(":day", $_POST["DAY"]);
//$sth->bindValue(":user", $_POST["USER"]);
//echo $query;
//$sth->execute();
