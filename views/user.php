<?php
if ($request_uri[2] === '') {
    $userView = $pdo->prepare('SELECT * FROM users');
    $userView->execute();
    $data = $userView->fetchAll(PDO::FETCH_ASSOC);
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
            echo '<td><a href="edit.php?edit=' . $val['id'] . '">edit</a></td>';
            echo '<td><a href="' . $val['id'] . '">view</a></td>';
            echo '</tr>';
        }

        ?>
    </table>
    <?php
} else {
    $prepare = $pdo->prepare('SELECT * FROM users where id =:id');
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
        require 'views/404.php';
    }
    die();
}