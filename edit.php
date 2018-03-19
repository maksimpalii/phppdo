<?php
$dsn = 'mysql:host=localhost;dbname=burger;charset=utf8';
$pdo = new PDO($dsn, 'root', '');

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $usersView = $pdo->query('SELECT * FROM users WHERE id = ' . $id);
    $data = $usersView->fetch(PDO::FETCH_ASSOC);

}
if (isset($_POST['name']) || isset($_POST['phone']) || isset($_POST['email'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $usersUpdate = $pdo->prepare('UPDATE users SET name=:name, number=:number, email=:email WHERE id = :id');
    $usersUpdate->execute(['name' => $name, 'number' => $phone, 'email' => $email, 'id' => $id]);
    echo "<meta http-equiv='refresh' content='0;url=admin.php'>";
    die();
}
?>
<form action="" method="POST">
    <input class="order__form-input" name="id" type="hidden" value="<?php echo $data['id']; ?>">
    Name: <input class="order__form-input" style="min-width: 358px" name="name" type="text"
                 value="<?php echo $data['name']; ?>"><br><br>
    Phone: <input class="order__form-input phone-mask" style="min-width: 358px" name="phone" type="text"
                  value="<?php echo $data['number']; ?>"><br><br>
    Email: <input class="order__form-input" style="min-width: 358px" name="email" type="email" value="<?php echo $data['email']; ?>"><br><br>
    <input type="submit" value="Update">
</form>