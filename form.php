<?php

header('Content-Type: text/html; charset= utf-8');
// Переменные с формы
$lstName = $_POST['last_name'];
$fstName = $_POST['first_name'];
$mdlName = $_POST['middle_name'];
$code_inn = $_POST['code_inn'];
//Только для физических лиц
$birthday = $_POST['birthday'];
$numPasport = $_POST['number_pasport'];
$datePasport = $_POST['date_pasport'];
//Только для юридических лиц
$orgName = $_POST['company_name'];
$orgAddress = $_POST['company_address'];
$code_ogrn = $_POST['OGRN'];
$code_innOrg = $_POST['code_innOrg'];
$code_kpp = $_POST['Tax_accounting'];
//Данные продукта
$prdBank = $_POST['bank_product'];
$prdDateOpen = $_POST['opening_date'];
$monthCount = $_POST['month_count'];
//Только кредит
$paymentSchedule = $_POST['payment_schedule'];
$amountService = $_POST['amount_service'];
//Только вклад
$сapitalization = $_POST['сapitalization'];


// Параметры для подключения
$servername = "localhost";
$username = "root"; // Логин БД
$password = ""; // Пароль БД
$dbname = 'f95083ga_bank'; // Имя БД


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if ($_POST['radio'] == 'individual') {
  $sql = "INSERT INTO clients (`Фамилия`, `Имя`, `Отчество`, `ИНН персональный`, `Дата рождения`, `Серия и номер паспорта`, `Дата выдачи паспорта`)
                VALUES ('$lstName', '$fstName', '$mdlName', '$code_inn', '$birthday', '$numPasport', '$datePasport')";
} else if ($_POST['radio'] == 'entity') {
  $sql = "INSERT INTO clients (`Фамилия`, `Имя`, `Отчество`, `ИНН персональный`, `Имя организации`, `Адрес организации`, `ОГРН`, `ИНН организации`, `КПП организации`)
                VALUES ('$lstName', '$fstName', '$mdlName', '$code_inn', '$orgName', '$orgAddress', '$code_ogrn', '$code_innOrg', '$code_kpp')";
}

if ($conn->query($sql) === TRUE) {
  $client_id = $conn->insert_id;
  //echo "New record created successfully. Last inserted ID is: " . $client_id;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$dateAt = strtotime("+{$monthCount} MONTH", strtotime($prdDateOpen));
$prdDateClose = date('Y-m-d', $dateAt);

if ($_POST['bank_product'] == '1') {
  $sql = "INSERT INTO request_services (`№ клиента`, `№ услуги`, `Дата открытия`, `Дата закрытия`, `Срок (месяц)`, `Сумма`, `График платежей`)
                VALUES ('$client_id', '$prdBank', '$prdDateOpen', '$prdDateClose', '$monthCount', '$amountService', '$paymentSchedule')";
} else if ($_POST['bank_product'] == '2') {
  $sql = "INSERT INTO request_services (`№ клиента`, `№ услуги`, `Дата открытия`, `Дата закрытия`, `Срок (месяц)`, `Периодичность капитализации`)
                VALUES ('$client_id', '$prdBank', '$prdDateOpen', '$prdDateClose', '$monthCount', '$capitalization')";
}

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  //echo "<div class='finish-popup'><div class='finish-popup__window'><h3>Готово!</h3><p>Теперь вам нужно обратится в ближайший отдел банка</p> </div></div>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script src="js/script.js"></script>
</head>

<body>
	<header>
		<div class="container">
			<div class="menu-bar">
				<div class="menu-bar__logo">
					<a href="/index.html"><img class="menu-bar__logo-img" src="img/logo.png" alt="logotype"></a>
				</div>
				<nav>
					<ul class="menu-bar__items">
						<li><a class="menu-bar__item" href="">Главная</a></li>
						<li><a class="menu-bar__item mi-active" href="">Услуги</a></li>
						<li><a class="menu-bar__item" href="">Безопасность</a></li>
						<li><a class="menu-bar__item" href="">Контакты</a></li>
					</ul>
				</nav>
			</div>
			<div class="strpage">
				<div class="strpage__box">
					<img class="strpage__box-img" src="img/7230630_3588982.png">

					<div class="strpage__box-text">
						<h2>Наши услуги</h2>
						<p>Оформьте кредит или вклад через удобный онлайн-сервис в пару кликов.</p>
						<button type="button" class="button" onclick="toggleClassOfRequest()">Приступить</button>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="mdlpage">
		<section>
			<h2>Всё о привилегиях наших услуг</h2>
			<h3>Кредит</h3>
			<p>Кредит – это ссуда, предоставленная кредитором (в данном случае банком) заемщику под определенные проценты за пользование деньгами. Кредиты выдаются физическим и юридическим лицам. </p>
			<p>Кредиты гражданам делятся на нецелевые, когда банк выдает определенную сумму на нужды заемщика, и на целевые – на покупку жилья, автомобиля, на ремонт.</p>
			<p>Условно ссуды можно разделить на залоговые и беззалоговые. Например, достаточно распространена схема выделения кредита под залог квартиры и любой другой недвижимости, который принято называть ипотекой.</p>
			<p>Как правило, ставки по необеспеченным кредитам выше, чем по залоговым. В среднем ставки по таким займам составляют 11-20%, в то время как по кредитам, залогом по которым является автомобиль или недвижимость, они ниже.</p>
			<p>Существуют льготные предложения по кредитованию; например, у ряда банков есть специальные программы приобретения жилья, которыми может воспользоваться молодая семья.</p>
			<h3>Вклад</h3>
			<p>Банковский вклад —  сумма денег, переданная лицом кредитному учреждению с целью получить доход в виде процентов, образующихся в ходе финансовых операций с вкладом.</p>
			<p>Начисление процентов происходит на условиях, описанных в договоре по вкладу или в общих условиях по размещению денежных средств во вклады конкретного банка. Как правило, это ежемесячное, ежеквартальное начисления или начисление процентов в конце срока вклада. Обычно в договорах по вкладам указываются годовые проценты, а не проценты на срок хранения. Если в договоре по вкладу указан доход 10 % годовых, то это значит, что доход 10 % от суммы начислялся бы только в случае размещения денежных средств на срок один год. На самом деле проценты начисляются пропорционально сроку вклада. При этом срок 1 месяц равен 30 дням, а 1 год равен 365 дням.</p>
		</section>
	</div>
	<footer>
		<p>Тестовое задание на php-разработчика</p>
	</footer>

	<div class="popup">
		<div class="popup__window" role="dialog" aria-modal="true">
			<a href="index.php"> <button class="popup__close">x</button></a>
			<h2>Запрос на оформление</h2>
      <p><?php echo $lstName . " " . $fstName?>, тепрь вы можете обратится в наш отдел для завершения заявки по ставке !</p>
		</div>
	</div>
</body>

</html>