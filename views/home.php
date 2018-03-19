<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Главная страница
    </title>
    <link rel="stylesheet" href="./css/vendors.min.css">
    <link rel="stylesheet" href="../css/main.min.css">
</head>
<?php
echo "It's home!";
?>
<body style="background: #cccccc">
<div class="container">
    <div class="section__title">Закажите доставку</div>
    <div class="order__form">
        <form class="order__form-tag" id="order-form">
            <div class="order__form-col">
                <div class="order__form-row order__form-row_double">
                    <label class="order__form-block">
                        <div class="order__form-label">Имя</div>
                        <input class="order__form-input" name="name" type="text" placeholder="">
                    </label>
                    <label class="order__form-block">
                        <div class="order__form-label">Телефон</div>
                        <input class="order__form-input phone-mask" name="phone" type="text" placeholder="">
                    </label>
                </div>
                <div class="order__form-row order__form-row_double">
                    <label class="order__form-block">
                        <div class="order__form-label">email</div>
                        <input class="order__form-input" name="email" type="email" placeholder="">
                    </label>
                    <label class="order__form-block">
                        <div class="order__form-label">Улица</div>
                        <input class="order__form-input" name="street" type="text" placeholder="">
                    </label>
                </div>
                <div class="order__form-row order__form-row_quatro">
                    <label class="order__form-block">
                        <div class="order__form-label">Дом</div>
                        <input class="order__form-input" name="home" type="text" placeholder="">
                    </label>
                    <label class="order__form-block">
                        <div class="order__form-label">Корпус</div>
                        <input class="order__form-input" name="part" type="text" placeholder="">
                    </label>
                    <label class="order__form-block">
                        <div class="order__form-label">Квартира</div>
                        <input class="order__form-input" name="appt" type="text" placeholder="">
                    </label>
                    <label class="order__form-block">
                        <div class="order__form-label">Этаж</div>
                        <input class="order__form-input" name="floor" type="text" placeholder="">
                    </label>
                </div>
            </div>
            <div class="order__form-col">
                <div class="order__form-row">
                    <label class="order__form-block">
                        <div class="order__form-label">Комментарий</div>
                        <textarea class="order__form-input order__form-input_textarea" name="comment"></textarea>
                    </label>
                </div>
                <div class="order__form-buttons">
                    <div class="order__form-row">
                        <label class="order__radio">
                            <input class="order__radio-elem" name="payment" type="radio">
                            <div class="order__radio-fake"></div>
                            <div class="order__radio-title">Потребуется сдача</div>
                        </label>
                        <label class="order__radio">
                            <input class="order__radio-elem" name="payment" type="radio">
                            <div class="order__radio-fake"></div>
                            <div class="order__radio-title">Оплата по карте</div>
                        </label>
                    </div>
                    <div class="order__form-row">
                        <label class="order__radio order__radio_checkbox">
                            <input class="order__radio-elem" name="callback" type="checkbox">
                            <div class="order__radio-fake"></div>
                            <div class="order__radio-title">Не перезванивать</div>
                        </label>
                    </div>
                    <div class="order__form-row">
                        <input class="order__form-button" name="" type="submit" value="Заказать">
                        <input class="order__form-button order__form-button_reset" name="" type="reset" value="Очистить">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="status-popup popup" id="success">
    <div class="status-popup__inner">
        <div class="status-popup__message">Сообщение отправлено</div><a class="status-popup__close btn" href="#">Закрыть</a>
    </div>
</div>
<div class="status-popup popup" id="error">
    <div class="status-popup__inner">
        <div class="status-popup__message error-message">Произошла ошибка</div><a class="status-popup__close btn" href="#">Закрыть</a>
    </div>
</div>
<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="./js/forma.js"></script>
</body>