<?php
$dsn = 'mysql:host=localhost;dbname=burger;charset=utf8';
$pdo = new PDO($dsn, 'root', '');

//$userView = $pdo->prepare('SELECT * FROM users');
//$userView->execute();
//$data = $userView->fetchAll(PDO::FETCH_ASSOC);
$usersView = $pdo->query('SELECT * FROM users');
$data = $usersView->fetchAll(PDO::FETCH_ASSOC);
//echo json_encode($data, JSON_UNESCAPED_UNICODE);
$ordersView = $pdo->query('SELECT * FROM orders');
$data2 = $ordersView->fetchAll(PDO::FETCH_ASSOC);

?>
<h2>Пользователи</h2>
<table border="1">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Number</th>
        <th>Email</th>
        <th>Edit</th>
        <th>View</th>
    </tr>

    <?php
    foreach ($data as $val) {
        echo '<tr>';
        foreach ($val as $value) {
            echo '<td>' . $value . '</td>';
        }
        echo '<td><a href="edit.php?edit=' .$val['id']. '">edit</a></td>';
        echo '<td><a href="view.php?id=' .$val['id']. '">view</a></td>';
        echo '</tr>';
    }

    ?>
</table>
<h2>Заказы</h2>
<table border="1">
    <tr>
        <th>Order_id</th>
        <th>User_id</th>
        <th>Adress</th>
        <th>Detail</th>
        <th>Comment</th>
        <th>Edit</th>
        <th>View</th>

    </tr>

    <?php
    foreach ($data2 as $val) {
        echo '<tr>';
        foreach ($val as $value) {
            echo '<td>' . $value . '</td>';
        }
        echo '<td><a href="edit_order.php?edit=' .$val['id_order']. '">edit</a></td>';
        echo '<td><a href="view_orders.php?id=' .$val['id_order']. '">view</a></td>';
        echo '</tr>';
    }

    ?>
</table>