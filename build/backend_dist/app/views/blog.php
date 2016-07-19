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
					<div class="site-author site-author_blog">
						<div class="avatar"><img src="/assets/img/avatars/avatar_sq.jpg" title="Frontend. Wordpress. Разработка сайтов под ключ." alt="Лембинен Николай"/></div>
						<div class="svg-heading">
							<h1 class="svg-heading__text sidestripes">Блог</h1>
							<svg class="svg-heading__img">
								<use xlink:href="#icon-blog_header"></use>
							</svg>
						</div>
						<p class="site-author__description">Статьи</p>
					</div>
					<button data-link=".blog" class="go-down fa fa-chevron-down"></button>
					<svg preserveAspectRatio="none" viewBox="0 0 2000 400" class="header__svg-corner header__svg-corner_blog">
						<use xlink:href="#icon-bg"></use>
					</svg>
				</div>
			</div>
		</header>
		<div class="blog last-section">
			<aside class="blog-navigation">
				<button class="blog-navigation__toggle"><span class="fa fa-chevron-right"></span></button>
				<nav class="blog-navigation__wrapper">
					<ul class="blog-navigation__links-list">
					<?php
					if(count($posts)>0):
						$id = 0;
						foreach ($posts as $post): ?>
							<li class="links-list__item">
								<a href="#article-<?=$id++?>" class="links-list__link"><?=$post['title']?></a>
							</li>
						<?php
						endforeach;
					else: ?>
						<li class="links-list__item">Записей нет</li>
					<?php
					endif;
					?>
					</ul>
				</nav>
			</aside>
			<section class="blog-content">

				<?php
				if(count($posts)>0):
					$id = 0;
					foreach ($posts as $post): ?>
						<div id="article-<?=$id++?>" class="article">
							<h3 class="article__title"><?=$post['title']?></h3>
							<p class="article__date"><?=$post['date']?></p>
							<div class="article__content"><?=$post['content']?></div>
						</div>
					<?php
					endforeach;
				else: ?>
					В блоге пока нет записей.
				<?php
				endif;
				?>

			</section>
		</div>
<?php require_once 'parts/footer.php'; ?>
<?php require_once 'parts/footer-end.php'; ?>