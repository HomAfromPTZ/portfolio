<?php require_once 'parts/header.php'; ?>
	<body class="table-box">

		<?php
			require_once "parts/preloader.php";
			require_once "parts/popup.php";
			require_once "parts/browserhappy.php";
		?>

		<div class="parallax-wrapper">
			<ul id="scene" class="axis">
				<li data-depth='0' class="layer">
					<div class="layer-bg layer-bg_0"></div>
				</li>
				<li data-depth='0.1' class="layer">
					<div class="layer-bg layer-bg_1"></div>
				</li>
				<li data-depth='0.2' class="layer">
					<div class="layer-bg layer-bg_2"></div>
				</li>
				<li data-depth='0.30000000000000004' class="layer">
					<div class="layer-bg layer-bg_3"></div>
				</li>
				<li data-depth='0.4' class="layer">
					<div class="layer-bg layer-bg_4"></div>
				</li>
				<li data-depth='0.5' class="layer">
					<div class="layer-bg layer-bg_5"></div>
				</li>
				<li data-depth='0.6000000000000001' class="layer">
					<div class="layer-bg layer-bg_6"></div>
				</li>
				<li data-depth='0.7000000000000001' class="layer">
					<div class="layer-bg layer-bg_7"></div>
				</li>
				<li data-depth='0.8' class="layer">
					<div class="layer-bg layer-bg_8"></div>
				</li>
				<li data-depth='0.9' class="layer">
					<div class="layer-bg layer-bg_9"></div>
				</li>
			</ul>
		</div>

		<header class="welcome-header table-box__row">
			<div class="container container_padded">
				<button id="flip-card" class="welcome-header__button">Авторизоваться</button>
			</div>
		</header>

		<div class="table-box__row table-box__row_fullheight">
			<div class="table-box__vertical-aligned">
				<h1 class="hero-heading">За голову ок</h1>
				<div class="flip-card">
					<div class="flip-card__front-side">
						<div class="author-bio">
							<div class="avatar"><img src="/assets/img/avatars/avatar_sq.jpg" title="Frontend. Wordpress. Разработка сайтов под ключ." alt="Лембинен Николай"/></div>
							<p class="author-bio__name">Лембинен Николай</p>
							<p class="author-bio__description">Ба-дум тссс! - портфолио</p>
							<ul class="social-links">
								<li class="social-links__item social-links__item_welcome"><a href="http://vk.com/homafromptz" target="_blank" class="social-links__link fa fa-vk"></a></li>
								<li class="social-links__item social-links__item_welcome"><a href="https://github.com/HomAfromPTZ" target="_blank" class="social-links__link fa fa-github-alt"></a></li>
								<li class="social-links__item social-links__item_welcome"><a href="http://stackoverflow.com/cv/homawebdev" target="_blank" class="social-links__link fa fa-stack-overflow"></a></li>
								<li class="social-links__item social-links__item_welcome"><a href="https://www.instagram.com/homafromptz/" target="_blank" class="social-links__link fa fa-instagram"></a></li>
								<li class="social-links__item social-links__item_welcome"><a href="https://ru.linkedin.com/in/homafromptz" target="_blank" class="social-links__link fa fa-linkedin"></a></li>
							</ul>
						</div>
						<ul class="form-buttons">
							<li class="form-buttons__button"><a href="/works" class="preload-link form-buttons__button-content">Мои работы</a></li>
							<li class="form-buttons__button"><a href="/about" class="preload-link form-buttons__button-content">Обо мне</a></li>
							<li class="form-buttons__button"><a href="/blog" class="preload-link form-buttons__button-content">Блог</a></li>
						</ul>
					</div>
					<div class="flip-card__back-side">
						<form id="login">
							<div class="login-form">
								<h3 class="sidestripes">Авторизуйтесь</h3>
								<label class="login-form__label login-form__label_text">
									<input placeholder="Логин" type="text" data-check="username" name="username" class="input input_text"/><span class="fa fa-user"></span>
								</label>
								<label class="login-form__label login-form__label_text">
									<input placeholder="Пароль" type="password" data-check="password" name="password" class="input input_text"/><span class="fa fa-key"></span>
								</label>
								<label class="login-form__label login-form__label_checkbox">
									<input type="checkbox" name="robot_check" value="not a robot" class="input input_checkbox"/><span>Я человек</span>
								</label>
								<p class="login-form__plain-text">Вы точно не робот?</p>
								<label class="login-form__label login-form__label_radio">
									<input type="radio" name="robot_radio" value="shure" class="input input_radio"/><span>Да</span>
								</label>
								<label class="login-form__label login-form__label_radio">
									<input type="radio" name="robot_radio" value="who knows" class="input input_radio"/><span>Не уверен</span>
								</label>
							</div>
							<ul class="form-buttons">
								<li class="form-buttons__button form-buttons__button_even">
									<button id="unflip-card" class="form-buttons__button-content">На главную</button>
								</li>
								<li class="form-buttons__button form-buttons__button_even">
									<button id="log-me" class="form-buttons__button-content">Войти</button>
								</li>
							</ul>
						</form>
					</div>
				</div>
			</div>
		</div>

		<footer class="welcome-footer table-box__row">
			<div class="container container_padded"><span class="copyright">&copy; Лембинен Николай</span><span class="copyright copyright_slogan">To boldly go where no man has gone before</span><span class="copyright">2016</span></div>
		</footer>

<?php require_once 'parts/footer-end.php'; ?>