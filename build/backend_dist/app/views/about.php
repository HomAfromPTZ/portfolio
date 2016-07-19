<?php require_once 'parts/header.php'; ?>
	<body>

		<?php
			require_once "parts/preloader.php";
			require_once "parts/popup.php";
			require_once "parts/browserhappy.php";
			require_once "parts/sprites-container.php";
		?>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzrDdBMuMhmaqxCghc-FwHklt7wubgLOY"> </script>

		<div class="parallax-wrapper">
			<ul id="scene" class="vertical">
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

		<?php require_once 'parts/navmenu.php'; ?>

		<header class="header table-box">
			<div class="table-box__row">
				<div class="header__top-row">
					<ul class="social-links">
						<li class="social-links__item"><a href="http://vk.com/homafromptz" target="_blank" class="social-links__link fa fa-vk"></a></li>
						<li class="social-links__item"><a href="https://github.com/HomAfromPTZ" target="_blank" class="social-links__link fa fa-github-alt"></a></li>
						<li class="social-links__item"><a href="http://stackoverflow.com/cv/homawebdev" target="_blank" class="social-links__link fa fa-stack-overflow"></a></li>
						<li class="social-links__item"><a href="https://www.instagram.com/homafromptz/" target="_blank" class="social-links__link fa fa-instagram"></a></li>
						<li class="social-links__item"><a href="https://ru.linkedin.com/in/homafromptz" target="_blank" class="social-links__link fa fa-linkedin"></a></li>
					</ul>
					<button id="menu-toggle" class="menu-button"><span class="menu-button__line"></span></button>
				</div>
			</div>
			<div class="table-box__row table-box__row_fullheight">
				<div class="table-box__vertical-aligned">
					<div class="site-author">
						<div class="avatar"><img src="/assets/img/avatars/avatar_sq.jpg" title="Frontend. Wordpress. Разработка сайтов под ключ." alt="Лембинен Николай"/></div>
						<p class="site-author__name">Лембинен Николай</p>
						<p class="site-author__description">Личный сайт веб разработчика</p>
					</div>
					<svg class="header__svg-bg">
						<use xlink:href="#icon-portfolio_header"></use>
					</svg>
					<button data-link=".about-me" class="go-down fa fa-chevron-down"></button>
					<svg preserveAspectRatio="none" viewBox="0 0 1000 400" class="header__svg-corner header__svg-corner_left">
						<use xlink:href="#icon-about_bg_left"></use>
					</svg>
					<svg preserveAspectRatio="none" viewBox="0 0 1000 400" class="header__svg-corner header__svg-corner_right">
						<use xlink:href="#icon-about_bg_right"></use>
					</svg>
				</div>
			</div>
		</header>
		<section class="about-me">
			<div class="about-me__stretcher about-me__stretcher_dark">
				<div class="about-me__stretcher about-me__stretcher_light">
					<div class="about-me__bio bio">
						<div class="svg-heading">
							<h1 class="svg-heading__text sidestripes">Обо мне</h1>
							<svg class="svg-heading__img">
								<use xlink:href="#icon-about_header"></use>
							</svg>
						</div>
						<div class="bio__main-image"><img src="/assets/img/avatar_main.jpg" alt="Лембинен Николай" title="Разработка сайтов под ключ. Frontend. Wordpress."></div>
						<h3 class="bio__heading sidestripes">Кто я?</h3>
						<div class="bio__about">
							<p>
								26 лет - ума нет. Родился и вырос в городе Петрозаводске.
								Программист, верстальщик, барабанщик, "в машине подвеску перебери" - человек оркестр.
							</p>
							<p>С 2007 года на добровольных основах принимал участие в военных баталиях с ie6, MySpace 1.0, табличной версткой, круглыми уголками и тем в какой последовательности писать css хаки. Профессионально стал web-разработчиком 4 года назад. На данный момент занимаюсь созданием и поддержкой сайтов на Wordpress CMS, а также небольших лендингов.</p>
							<p>Увлекаюсь музыкой, играю на ударных. Возвращал 2007й с Dies Alliensis, улетал в космос к астронавтам с Escape The Void, поднимал indie сцену с колен вместе с Deadly Vipers и Ilya Ravendark (нынe Prince Champagne), сейчас несу в массы любовь, тепло и ламповость вместе с Calmpole - интересующимся путь заказан <a href="https://www.youtube.com/user/HomAfromPTZ/videos">сюда</a></p>
						</div>
						<div class="bio__vids"><iframe width="100%" height="400" src="https://www.youtube.com/embed/-uuDE29bUdw" frameborder="0" allowfullscreen></iframe></div>
					</div>
					<div class="about-me__skills skills">
						<h3 class="skills__heading sidestripes">Чем я могу быть вам полезен</h3>
						<div class="skills__descr">
							<p>Двумя руками и двумя ногами, если речь идет о музыке. А если нужно что-то попроще, то могу сверстать сайт на коленке. Клиент вправе выбрать - на левой или на правой... На правой обычно лучше получается.</p>
							<p>Предпочитаю frontend. Верстка, дизайн (на сколько хватит фантазии), анимация, адаптивность и прочее.</p>
							<p>
								Backend не жалую, исключение - Wordpress CMS. Если нужна поддержка MVC фреймворков, то это не ко мне. Однако, если нужна простенькая админка для сайта или небольшая логика, то можем обсудить.
								
							</p>
						</div>
						<div class="skills__group">
							<div class="group__title">Frontend</div>
							<div class="group__item">
								<div class="item-title">Html 5 &amp; CSS 3</div>
								<svg viewBox="0 0 120 120" class="piechart">
									<circle fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__bg"></circle>
									<circle data-percentage='99' fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__fill"></circle>
								</svg>
							</div>
							<div class="group__item">
								<div class="item-title">Js &amp; Jquery</div>
								<svg viewBox="0 0 120 120" class="piechart">
									<circle fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__bg"></circle>
									<circle data-percentage='60' fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__fill"></circle>
								</svg>
							</div>
							<div class="group__item">
								<div class="item-title">Less &amp; Sass</div>
								<svg viewBox="0 0 120 120" class="piechart">
									<circle fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__bg"></circle>
									<circle data-percentage='70' fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__fill"></circle>
								</svg>
							</div>
							<div class="group__item">
								<div class="item-title">Jade</div>
								<svg viewBox="0 0 120 120" class="piechart">
									<circle fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__bg"></circle>
									<circle data-percentage='80' fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__fill"></circle>
								</svg>
							</div>
						</div>
						<div class="skills__group">
							<div class="group__title">Backend</div>
							<div class="group__item">
								<div class="item-title">Php</div>
								<svg viewBox="0 0 120 120" class="piechart">
									<circle fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__bg"></circle>
									<circle data-percentage='66' fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__fill"></circle>
								</svg>
							</div>
							<div class="group__item">
								<div class="item-title">MySql</div>
								<svg viewBox="0 0 120 120" class="piechart">
									<circle fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__bg"></circle>
									<circle data-percentage='60' fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__fill"></circle>
								</svg>
							</div>
							<div class="group__item">
								<div class="item-title">Node.js &amp; npm</div>
								<svg viewBox="0 0 120 120" class="piechart">
									<circle fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__bg"></circle>
									<circle data-percentage='10' fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__fill"></circle>
								</svg>
							</div>
							<div class="group__item">
								<div class="item-title">Mongo.db</div>
								<svg viewBox="0 0 120 120" class="piechart">
									<circle fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__bg"></circle>
									<circle data-percentage='0' fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__fill"></circle>
								</svg>
							</div>
						</div>
						<div class="skills__group">
							<div class="group__title">Workflow</div>
							<div class="group__item">
								<div class="item-title">Git</div>
								<svg viewBox="0 0 120 120" class="piechart">
									<circle fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__bg"></circle>
									<circle data-percentage='68' fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__fill"></circle>
								</svg>
							</div>
							<div class="group__item">
								<div class="item-title">Gulp</div>
								<svg viewBox="0 0 120 120" class="piechart">
									<circle fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__bg"></circle>
									<circle data-percentage='80' fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__fill"></circle>
								</svg>
							</div>
							<div class="group__item">
								<div class="item-title">Bower</div>
								<svg viewBox="0 0 120 120" class="piechart">
									<circle fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__bg"></circle>
									<circle data-percentage='90' fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__fill"></circle>
								</svg>
							</div>
							<div class="group__item">
								<div class="item-title">Ssh</div>
								<svg viewBox="0 0 120 120" class="piechart">
									<circle fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__bg"></circle>
									<circle data-percentage='20' fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__fill"></circle>
								</svg>
							</div>
						</div>
						<div class="skills__group">
							<div class="group__title">CMS</div>
							<div class="group__item">
								<div class="item-title">Wordpress</div>
								<svg viewBox="0 0 120 120" class="piechart">
									<circle fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__bg"></circle>
									<circle data-percentage='90' fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__fill"></circle>
								</svg>
							</div>
							<div class="group__item">
								<div class="item-title">Joomla</div>
								<svg viewBox="0 0 120 120" class="piechart">
									<circle fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__bg"></circle>
									<circle data-percentage='30' fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__fill"></circle>
								</svg>
							</div>
							<div class="group__item">
								<div class="item-title">Борода и усы</div>
								<svg viewBox="0 0 120 120" class="piechart">
									<circle fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__bg"></circle>
									<circle data-percentage='10' fill="none" stroke-width="20" stroke-dasharray="314.159265" stroke-dashoffset="314.159265" cx="60" cy="60" r="50" transform="rotate(-90, 60, 60)" class="piechart__fill"></circle>
								</svg>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="contacts last-section">
			<div class="contacts__map">
				<div id="map_wrapper"></div>
			</div>
			<div class="contacts__info">
				<div class="contacts__heading">
					<h3 class="sidestripes">Контакты</h3>
				</div>
				<ul class="contacts__links">
					<li class="link-wrapper"><a href="skype:homa_from_ptz?call" class="link"><i class="fa fa-skype"></i>homa_from_ptz</a></li>
					<li class="link-wrapper"><a href="mailto:homawebdev@gmail.com" class="link"><i class="fa fa-envelope"></i>homawebdev@gmail.com</a></li>
					<li class="link-wrapper"><a href="skype:+79114108115?call" class="link"><i class="fa fa-phone"></i>+7 (911) 410-81-15</a></li>
					<li class="link-wrapper"><a href="https://goo.gl/maps/9igxQvGhox72" target="_blank" class="link"><i class="fa fa-map-marker"></i>г. Петрозаводск, Республика Карелия</a></li>
				</ul>
			</div>
		</section>
<?php require_once 'parts/footer.php'; ?>
<?php require_once 'parts/footer-end.php'; ?>