<?php
$dsn = 'mysql:host=localhost;dbname=burger;charset=utf8';
$pdo = new PDO($dsn, 'root', '');

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $usersView = $pdo->query('SELECT * FROM orders WHERE id_order =' . $id);
    $data = $usersView->fetch(PDO::FETCH_ASSOC);
//var_dump($data);
}
if (isset($_POST['adress_order']) || isset($_POST['detail_order']) || isset($_POST['comment_order'])) {
    $id = $_POST['id'];
    $adress_order = $_POST['adress_order'];
    $detail_order = $_POST['detail_order'];
    $comment_order = $_POST['comment_order'];
    $usersUpdate = $pdo->prepare('UPDATE orders SET adress_order=:adress_order, detail_order=:detail_order, comment_order=:comment_order WHERE id_order = :id');
    $usersUpdate->execute(['adress_order' => $adress_order, 'detail_order'=> $detail_order, 'comment_order' => $comment_order, 'id' => $id]);
    echo "<meta http-equiv='refresh' content='0;url=admin.php'>";
    die();
}
?>
<form action="" method="POST">
    <input class="order__form-input" name="id" type="hidden" value="<?php echo $data['id_order']; ?>">
    Adress: <input class="order__form-input" style="min-width: 358px" name="adress_order" type="text" value="<?php echo $data['adress_order']; ?>"><br><br>
    Detail: <input class="order__form-input phone-mask" style="min-width: 358px" name="detail_order" type="text" value="<?php echo $data['detail_order']; ?>"><br><br>
    Comment: <input class="order__form-input" style="min-width: 358px" name="comment_order" type="text" value="<?php echo $data['comment_order']; ?>"><br><br>
    <input type="submit" value="Update">
</form>