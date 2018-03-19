<?php
$dsn = 'mysql:host=localhost;dbname=burger;charset=utf8';
$pdo = new PDO($dsn, 'root', '');

$registr = $pdo->prepare('INSERT INTO users (name, number, email) VALUES (:name, :number, :email)');
$verification = $pdo->prepare('SELECT * FROM users where email =:email');
$order = $pdo->prepare('INSERT INTO orders (user_id, adress_order, detail_order, comment_order) VALUES (:user_id, :adress_order, :detail_order, :comment_order)');
$orderselect = $pdo->prepare('SELECT * FROM orders where user_id =:user_id');

function clearAll($data)
{
    $data = strip_tags($data);
    $data = htmlspecialchars($data, ENT_QUOTES);
    return $data;
}


$name = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];

$contacts = 'Имя: ' . $name . "\n" . 'Телефон:' . $phone . "\n" . 'Email' . $email . "\n\n";

$street = $_REQUEST['street'];
$home = $_REQUEST['home'];
$part = $_REQUEST['part'];
$appt = $_REQUEST['appt'];
$floor = $_REQUEST['floor'];
$adress = 'Улица ' . $street . ', Дом: ' . $home . ', Корпус: ' . $part . ', Квартира: ' . $appt . ', Этаж:' . $floor;
$comment = clearAll($_REQUEST['comment']);

$payment = $_REQUEST['payment'];
$callback = $_REQUEST['callback'];

$detOrd_1 = '';
$detOrd_2 = '';

if ($payment === 'on') {
    $detOrd_1 = 'Потребуется сдача.';
}
if ($callback === 'on') {
    $detOrd_2 = 'Не перезванивать';
}
$detail_order = $detOrd_1 . ' ' . $detOrd_2;

$content = '<h3>DarkBeefBurger за 500 рублей, 1 шт</h3>' . "\n";
$content .= '<p>Ваш заказ будет доставлен по адресу - ' . $adress . '</p>' . "\n";

function getTime()
{
    $time = microtime(true);
    $dFormat = 'Y-m-d_H-i-s';
    $mSecs = $time - floor($time);
    $mSecs = substr($mSecs, 2, 4);
//    echo sprintf('%s%s', date($dFormat), $mSecs );
    $newtime = date($dFormat) . '-' . $mSecs;
    return $newtime;
}

function msgThanks()
{
    $count = func_get_arg(0);
    if ($count === 1) {
        return "\n \n" . '---' . "\n" . 'Спасибо - это ваш первый заказ!';
    } else {
        return "\n \n" . '---' . "\n" . 'Спасибо! Это уже ' . $count . ' заказ!';
    }
}

function logMsg($contentMsg)
{
    if (is_dir('maillog') === true) {
        file_put_contents('maillog/' . getTime() . '.txt', $contentMsg);
    } else {
        mkdir('maillog');
        file_put_contents('maillog/' . getTime() . '.txt', $contentMsg);
    }
}

if (!empty($name) && !empty($phone) && !empty($email) && !empty($street) && !empty($home) && !empty($part) && !empty($appt) && !empty($floor)) {
    $verification->execute(['email' => $email]);
    $data = $verification->fetch(PDO::FETCH_ASSOC);
    if ($data['email'] === $email) {
        echo 'message';
    } else {
        $registr->execute(['name' => $name, 'number' => $phone, 'email' => $email]);
        $verification->execute(['email' => $email]);
        $data = $verification->fetch(PDO::FETCH_ASSOC);
        echo 'message & registration';
    }
    $user_id = $data['id'];
    $order->execute(['user_id' => $user_id, 'adress_order' => $adress, 'comment_order' => $comment, 'detail_order' => $detail_order]);
    $lastOrderId = $pdo->lastInsertId();
    $orderselect->execute(['user_id' => $user_id]);
    $ordersId = $orderselect->fetchAll(PDO::FETCH_ASSOC);
    $orderCount = count($ordersId);
    $subject = 'Заказ № ' . $lastOrderId;
    $content .= "\n" . 'Детали заказа: ' . "\n" . $detail_order . "\n";
    $content .= msgThanks($orderCount);
    $contentMsg = '<h2>' . $subject . '</h2>' . "\n" . $contacts . $content;
    logMsg($contentMsg);
    mail('simple@gmail.com', $subject, $contentMsg);

} elseif (!empty($name) && !empty($phone) && !empty($email)) {
    $verification->execute(['email' => $email]);
    $data = $verification->fetch(PDO::FETCH_ASSOC);
    if ($data['email'] === $email) {
        echo 'autorisation';
    } else {
        $registr->execute(['name' => $name, 'number' => $phone, 'email' => $email]);
        echo 'registration';
    }
} else {
    echo 'not empty';
}

die();