<?php
$dsn = 'mysql:host=localhost;dbname=burger;charset=utf8';
$pdo = new PDO($dsn, 'root', '');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $usersView = $pdo->query('SELECT * FROM orders WHERE id_order = ' . $id);
    $data = $usersView->fetch(PDO::FETCH_ASSOC);

//    foreach ($data as $key => $val) {
//        if ($key !== 'id_order') {
//            if ($key === 'user_id') {
//                echo '<p>User_id:' . $val['user_id'] . '</p>';
//            } else {
//                echo '<p>' . $val . '</p>';
//            }
//
//        }
//    }
    echo '<p>User_id: <a href="view.php?id=' . $data['user_id'] . '">'. $data['user_id'] .'</a></p>';
    echo '<p>Adress: ' . $data['adress_order'] . '</p>';
    echo '<p>Detail: ' . $data['detail_order'] . '</p>';
    echo '<p>Comment: ' . $data['comment_order'] . '</p>';
    echo '<p>Url: ' . $data['order_url'] . '</p>';
}