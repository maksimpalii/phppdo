<?php
$dsn = 'mysql:host=localhost;dbname=burger;charset=utf8';
$pdo = new PDO($dsn, 'root', '');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $usersView = $pdo->query('SELECT * FROM users WHERE id = ' . $id);
    $data = $usersView->fetch(PDO::FETCH_ASSOC);
//var_dump($data);
    foreach ($data as $key => $val){
        if($key !== 'id_order') {
            echo '<p>' . $val . '</p>';
        }
    }
}