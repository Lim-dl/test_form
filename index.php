<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
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

	<div class="popup hide">
		<div class="popup__window" role="dialog" aria-modal="true">
			<button onclick="toggleClassOfRequest()" data-hystclose class="popup__close">x</button>
			<h2>Запрос на оформление</h2>
			<div class="post-form">
				<form action="form.php" method="POST">
					<h3 class="step-request">1. Заполните информацию о себе</h3>
					<!--Физическое или юридическое лицо-->
					<label for="">Представляете лицо:
						<div class="radio-group">
							<div class="radio-group__item">
								<input id="radio-1" type="radio" name="radio" value="individual" checked onchange="radioChecked(this)">
								<label for="radio-1">Физическое</label>
							</div>
							<div class="radio-group__item">
								<input id="radio-2" type="radio" name="radio" value="entity" onchange="radioChecked(this)">
								<label for="radio-2">Юридическое</label>
							</div>
						</div>
					</label>

					<label for="">Фамилия:
						<input type="text" name="last_name" placeholder="Фамилия" pattern="[A-Za-z]{3}[A-Za-zА-Яа-яЁё-0-9]+$" required="" />
					</label>
					
					<label for="">Имя:
						<input type="text" name="first_name" placeholder="Имя" pattern="[A-Za-z]{3}[A-Za-zА-Яа-яЁё-0-9]+$" required />
					</label>
					
					<label for="">Отчество:
						<input type="text" name="middle_name" placeholder="Отчество" pattern="[A-Za-z]{3}[A-Za-zА-Яа-яЁё-0-9]+$" required />
					</label>
					
					<label for="">ИНН:
						<input type="text" name="code_inn" placeholder="12-значный код" pattern="[0-9]{12}" required />
					</label>
               <!--Данные для физического лица-->
					<label class="form-individual" for="">Дата рождения:
						<input class="form-individual-clear" type="date" name="birthday" placeholder="Дата рождения" required />
					</label>
					
					<label class="form-individual" for="">Серия и номер паспорта:
						<input class="form-individual-clear" type="text" name="number_pasport" placeholder="ХХ ХХ ХХХХХХ" required />
					</label>
					<label class="form-individual" for="">Дата выдачи паспорта:
						<input class="form-individual-clear" type="date" name="date_pasport" placeholder="" required />
					</label>
               <!--Данные для юридического лица-->
					<label class="form-entity" style="display:none;" for="">Наименование организации:
						<input class="form-entity-clear" type="text" name="company_name" placeholder="" pattern="[A-Za-z]{3}[A-Za-zА-Яа-яЁё-0-9]+$" />
					</label>

					<label class="form-entity" style="display:none;" for="">Адрес организации:
						<input class="form-entity-clear" type="text" name="company_address" placeholder="" pattern="[A-Za-z]{3}[A-Za-zА-Яа-яЁё-0-9]+$" />
					</label>

					<label class="form-entity" style="display:none;" for="">ОГРН организации:
						<input class="form-entity-clear" type="text" name="OGRN" placeholder="13-значный код" pattern="[0-9]{13}" />
					</label>

					<label class="form-entity" style="display:none;" for="">ИНН организации:
						<input class="form-entity-clear" type="text" name="code_innOrg" placeholder="10-значный код" pattern="[0-9]{10}" />
					</label>

					<label class="form-entity" style="display:none;" for="">КПП организации:
						<input class="form-entity-clear" type="text" name="Tax_accounting" placeholder="9-значный код" pattern="[0-9]{9}" />
					</label>

               <!--Продукт-->
					<h3 class="step-request">2. Выберите продукт</h3>
					<label for="">Продукт:
						<select name="bank_product" id="bank_product" onchange="serviceChecked(this)">
							<option value="1" selected>Кредит</option>
							<option value="2">Вклад</option>
						</select>
					</label>

					<label for="">Дата открытия:
						<input type="date" name="opening_date" placeholder="Дата открытия" required />
					</label>

					<label for="">Срок (месяц):
						<div class="range-count__month">
							<input id="month_count" type="number" min="1" max="15" name="month_count" placeholder="" onkeypress="updateTextInput1(this.value)" onchange="updateTextInput1(this.value)" required />
							<input id="month_range" type="range" id="volume" name="volume" min="1" max="15" oninput="updateTextInput1(this.value)" onchange="updateTextInput1(this.value)" />
						</div>
					</label>
					<!--Для кредита-->
					<label class="credit-form" for="">График платежей: <span class="helper" title="Аннуитетный платеж — общая сумма ежемесячных выплат, которая остается неизменной до конца срока кредитования.&#xA;Дифференцированный платёж — это способ внесения ежемесячных платежей, которая предполагает внесение значительно больших сумм в первые годы ипотеки.">?</span>
						<select class="credit-form-clear" name="payment_schedule" id="payment_schedule" >
							<option hidden value></option>
							<option value="Aннуитетный">Aннуитетный</option>
							<option value="Дифференцированный">Дифференцированный</option>
						</select>
					</label>

					<label class="credit-form" for="">Сумма:
						<div class="range-count__amount">
							<input class="credit-form-clear" id="amount_service" type="number" min="10000" max="250000" name="amount_service" step="1000" placeholder="Сумма" onkeypress="updateTextInput2(this.value)" onchange="updateTextInput2(this.value)" required />
							<input id="amount_range" type="range" id="volume" name="volume" min="0" max="250000" step="1000" oninput="updateTextInput2(this.value)" onchange="updateTextInput2(this.value)">
						</div>
					</label>
					<!--Для вклада-->

					<label class="depozit-form" style="display:none;" for="">Периодичность капитализации: <span class="helper" title="Капитализация вклада – это суммирование начисленных за предыдущий период процентов с основной суммой сбережений.">?</span>
						<select class="depozit-form-clear" name="сapitalization" id="payment_schedule">
							<option hidden value></option>
							<option value="В конце срока">В конце срока</option>
							<option value="Ежемесячно">Ежемесячно</option>
						</select>
					</label>
					<!--Кнпоки-->
					<div style="display: flex; align-content: center; justify-content: space-between;">
						<button class="button" type="reset">Сбросить информацию</button> <br>
						<button class="button" type="submit">Подтвердить запрос</button>
					</div>
				</form>
				<!--Конец формы-->
			</div>
		</div>
	</div>
</body>

</html>
<!-- <div class='finish-request'><div class='popup__window-request'><button onclick='closePopUp()' data-hystclose class='popup__close'>x</button><h3>Готово!</h3><p>Теперь вам нужно обратится в ближайший отдел банка</p> </div></div> -->