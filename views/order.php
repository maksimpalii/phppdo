<?php
//var_dump($request_uri);
if ($request_uri[2] === ''){
    $userView = $pdo->prepare('SELECT * FROM orders');
    $userView->execute();
    $data = $userView->fetchAll(PDO::FETCH_ASSOC);
?>
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
        foreach ($data as $val) {
            echo '<tr>';
            foreach ($val as $value) {
                echo '<td>' . $value . '</td>';
            }
            echo '<td><a href="edit_order.php?edit=' .$val['id_order']. '">edit</a></td>';
            echo '<td><a href="' .$val['id_order']. '">view</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
<?php
}

else{
$prepare = $pdo->prepare('SELECT * FROM orders where id_order =:id');
$prepare->execute(['id' => $request_uri[2]]);
$data = $prepare->fetch(PDO::FETCH_ASSOC);
if ($data !== false) {
    foreach ($data as $key => $val) {
        if ($key !== 'id_order') {
            echo '<p>' . $val . '</p>';
        }
    }
} else {
    header("HTTP/1.0 404 Not Found");
    require('404.php');
}
die();
}