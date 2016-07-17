<?php require_once 'parts/header.php'; ?>
	<body>
		<?php
			require_once "parts/preloader.php";
			require_once "parts/popup.php";
			require_once "parts/browserhappy.php";
			require_once "parts/sprites-container.php";
		?>

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

		<?php require_once 'parts/navmenu.php';?>;

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
						<p class="site-author__description">Еще одна страничка</p>
					</div>
					<svg class="header__svg-bg">
						<use xlink:href="#icon-portfolio_header"></use>
					</svg>
					<button data-link=".portfolio-slider" class="go-down fa fa-chevron-down"></button>
					<svg preserveAspectRatio="none" viewBox="0 0 2000 400" class="header__svg-corner">
						<use xlink:href="#icon-bg"></use>
					</svg>
				</div>
			</div>
			<div class="table-box__row">
				<div class="header__title">
					<div class="svg-heading">
						<h1 class="svg-heading__text sidestripes">Мои работы</h1>
						<svg class="svg-heading__img">
							<use xlink:href="#icon-works_header"></use>
						</svg>
					</div>
				</div>
			</div>
		</header>

		<?php if(count($works)>0): ?>
			<section class="portfolio-slider">
				<div class="portfolio-slider__module portfolio-slider__preview-container">
				<?php
					$last = count($works)-1;
					$i = 0;
					foreach ($works as $work): ?>
						<img src="<?=$work['img_src'];?>" alt="<?=$work['title'];?>" class="portfolio-preview<?=($i==0) ? ' active':''?>">
						<?php
						$i++;
					endforeach;
				?>
				</div>

				<div class="portfolio-slider__module portfolio-slider__projects-container">
					<div class="portfolio-projects">
					<?php
					$i = 0;
					foreach ($works as $work): ?>
						<div class="project<?=($i==0) ? ' active':''?>">
							<div class="project__inner">
								<h3 class="sidestripes project__title"><?=$work['title'];?></h3>
								<p class="project__tech"><?=$work['tech'];?></p><a href="<?=$work['link'];?>" target="_blank" class="project__link">Посмотреть сайт</a>
							</div>
						</div>
						<?php
						$i++;
					endforeach;
					?>
					</div>
				</div>

				<div class="portfolio-slider__module portfolio-slider__navigation-container">

					<div class="navigation-box navigation-box_prev">
						<button class="portfolio-button portfolio-button_prev"><span class="fa fa-chevron-down"></span></button>
						<div class="portfolio-thumbnails">
							<?php
							$i = 0;
							foreach ($works as $work): ?>
								<div class="portfolio-thumbnails__thumbnail <?=($i==$last) ? ' active':''?>"><img src="<?=$work['img_src'];?>" alt="<?=$work['title'];?>"></div>
								<?php
								$i++;
							endforeach;
							?>
						</div>
					</div>

					<div class="navigation-box navigation-box_next">
						<button class="portfolio-button portfolio-button_next"><span class="fa fa-chevron-up"></span></button>
						<div class="portfolio-thumbnails">
							<?php
							$i = 0;
							foreach ($works as $work): ?>
								<div class="portfolio-thumbnails__thumbnail <?=($i==1) ? ' active':''?>"><img src="<?=$work['img_src'];?>" alt="<?=$work['title'];?>"></div>
								<?php
								$i++;
							endforeach;
							?>
						</div>
					</div>

				</div>

			</section>
		<?php endif; ?>



		<section class="talks last-section">
			<div class="svg-heading">
				<h1 class="svg-heading__text sidestripes">Что обо мне говорят</h1>
				<svg class="svg-heading__img">
					<use xlink:href="#icon-about_header"></use>
				</svg>
			</div>
			<div class="talks__wrapper">
				<div class="testimonial">
					<blockquote class="testimonial__text">Этот парень был одним из тех, кто просто хочет спать</blockquote>
					<div class="testimonial__author author">
						<div class="avatar"><img src="/assets/img/avatars/dima.png" title="Сооснователь школы LoftSchool" alt="Ковальчук Дмитрий"/></div>
						<div class="author">
							<p class="author__name">Ковальчук Дмитрий</p>
							<p class="author__description">сооснователь LoftSchool</p>
						</div>
					</div>
				</div>
				<div class="testimonial">
					<blockquote class="testimonial__text">Этот парень был одним из тех, кто просто хочет спать</blockquote>
					<div class="testimonial__author">
						<div class="avatar"><img src="/assets/img/avatars/zar.png" title="Сооснователь школы LoftSchool" alt="Зар Захаров"/></div>
						<div class="author">
							<p class="author__name">Зар Захаров</p>
							<p class="author__description">сооснователь LoftSchool</p>
						</div>
					</div>
				</div>
			</div>
			<div class="contact-form">
				<form id="contact" novalidate>
					<div class="contact-form__bg"></div>
					<div class="contact-form__content">
						<h3 class="contact-form__heading sidestripes">Связаться со мной</h3>
						<input type="text" name="name" placeholder="Имя" required data-check="username" class="contact-form__field">
						<input type="email" name="email" placeholder="Email" required data-check="email" class="contact-form__field">
						<textarea name="message" placeholder="Ваше сообщение (10 и более символов)" required data-check="text" class="contact-form__field contact-form__field_textarea"></textarea>
					</div>
					<ul class="form-buttons">
						<li class="form-buttons__button form-buttons__button_even">
							<button id="form-submit" class="form-buttons__button-content">Отправить</button>
						</li>
						<li class="form-buttons__button form-buttons__button_even">
							<button id="form-clear" class="form-buttons__button-content">Очистить</button>
						</li>
					</ul>
				</form>
			</div>
		</section>
<?php require_once 'parts/footer.php'; ?>
<?php require_once 'parts/footer-end.php'; ?>