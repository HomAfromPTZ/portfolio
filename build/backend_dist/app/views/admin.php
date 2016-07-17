<?php require_once 'parts/header-admin.php'; ?>

	<body>

		<?php require_once "parts/preloader.php"; ?>

		<div class="admin-page">
			<div class="header">
				<div class="header__title-wrapper">
					<h1 class="header__title">Панель администрирования</h1>
				</div>
				<div class="header__link-wrapper">
					<a href="/" title="Вернуться на сайт" class="header__link preload-link">Вернуться на сайт</a>
					<a href="/logout" title="Тестовый логаут" class="header__link preload-link">Тестовый логаут</a>
				</div>
			</div>
			<ul class="tabs-control">
				<li class="tabs-control__item active">Работы</li>
				<li class="tabs-control__item">Навыки</li>
				<li class="tabs-control__item">Блог</li>
			</ul>
			<ul class="tabs-content">
				<li class="tabs-content__item active">
					<form enctype="multipart/form-data">
						<div class="form">
							<h2 class="form__heading">Мои работы</h2>
							<h3 class="form__subtitle">Добавить работу</h3>
							<input type="text" placeholder="Название проекта" name="project-title" class="form__field">
							<input type="text" placeholder="Технологии" name="project-tech" class="form__field">
							<input type="text" placeholder="Ссылка" name="project-link" class="form__field">
							<label class="file-label">Загрузить картинку
								<input type="file" class="form__field form__field_file">
							</label>
							<div class="form__field form__field_image-preview">
								<div class="fa fa-file-image-o"></div>
							</div>
							<button disabled class="form__button">Добавить</button>
						</div>
					</form>
				</li>
				<li class="tabs-content__item">
					<form>
						<div class="form">
							<h2 class="form__heading">Обо мне</h2>
							<div class="skills">
								<div class="skills__block">
									<div class="skills__remove fa fa-close"></div>
									<input type="text" value="Frontend" placeholder="Категория" class="skills__heading"/>
									<ul class="skills__list">
										<li class="skill">
											<input type="text" value="Html 5 &amp; CSS 3" placeholder="Технология" class="skill__name"/>
											<input type="number" min="0" max="100" step="0.5" value="99" class="skill__percentage"/><span class="skill__misc"><span class="skill__percent-sign">%</span><span class="skill__remove fa fa-close"></span></span>
										</li>
										<li class="skill">
											<input type="text" value="Js &amp; Jquery" placeholder="Технология" class="skill__name"/>
											<input type="number" min="0" max="100" step="0.5" value="70" class="skill__percentage"/><span class="skill__misc"><span class="skill__percent-sign">%</span><span class="skill__remove fa fa-close"></span></span>
										</li>
										<li class="skill">
											<input type="text" value="Less &amp; Sass" placeholder="Технология" class="skill__name"/>
											<input type="number" min="0" max="100" step="0.5" value="70" class="skill__percentage"/><span class="skill__misc"><span class="skill__percent-sign">%</span><span class="skill__remove fa fa-close"></span></span>
										</li>
										<li class="skill">
											<input type="text" value="Jade" placeholder="Технология" class="skill__name"/>
											<input type="number" min="0" max="100" step="0.5" value="55" class="skill__percentage"/><span class="skill__misc"><span class="skill__percent-sign">%</span><span class="skill__remove fa fa-close"></span></span>
										</li>
										<li class="fa fa-plus skill skill__new"></li>
									</ul>
								</div>
								<div class="skills__block">
									<div class="skills__remove fa fa-close"></div>
									<input type="text" value="Backend" placeholder="Категория" class="skills__heading"/>
									<ul class="skills__list">
										<li class="skill">
											<input type="text" value="Php" placeholder="Технология" class="skill__name"/>
											<input type="number" min="0" max="100" step="0.5" value="60" class="skill__percentage"/><span class="skill__misc"><span class="skill__percent-sign">%</span><span class="skill__remove fa fa-close"></span></span>
										</li>
										<li class="skill">
											<input type="text" value="MySql" placeholder="Технология" class="skill__name"/>
											<input type="number" min="0" max="100" step="0.5" value="70" class="skill__percentage"/><span class="skill__misc"><span class="skill__percent-sign">%</span><span class="skill__remove fa fa-close"></span></span>
										</li>
										<li class="skill">
											<input type="text" value="Node.js &amp; npm" placeholder="Технология" class="skill__name"/>
											<input type="number" min="0" max="100" step="0.5" value="10" class="skill__percentage"/><span class="skill__misc"><span class="skill__percent-sign">%</span><span class="skill__remove fa fa-close"></span></span>
										</li>
										<li class="skill">
											<input type="text" value="Mongo.db" placeholder="Технология" class="skill__name"/>
											<input type="number" min="0" max="100" step="0.5" value="0" class="skill__percentage"/><span class="skill__misc"><span class="skill__percent-sign">%</span><span class="skill__remove fa fa-close"></span></span>
										</li>
										<li class="skill skill__new fa fa-plus"></li>
									</ul>
								</div>
								<div class="skills__block">
									<div class="skills__remove fa fa-close"></div>
									<input type="text" value="Workflow" placeholder="Категория" class="skills__heading"/>
									<ul class="skills__list">
										<li class="skill">
											<input type="text" value="Git" placeholder="Технология" class="skill__name"/>
											<input type="number" min="0" max="100" step="0.5" value="70" class="skill__percentage"/><span class="skill__misc"><span class="skill__percent-sign">%</span><span class="skill__remove fa fa-close"></span></span>
										</li>
										<li class="skill">
											<input type="text" value="Gulp" placeholder="Технология" class="skill__name"/>
											<input type="number" min="0" max="100" step="0.5" value="80" class="skill__percentage"/><span class="skill__misc"><span class="skill__percent-sign">%</span><span class="skill__remove fa fa-close"></span></span>
										</li>
										<li class="skill">
											<input type="text" value="Bower" placeholder="Технология" class="skill__name"/>
											<input type="number" min="0" max="100" step="0.5" value="90" class="skill__percentage"/><span class="skill__misc"><span class="skill__percent-sign">%</span><span class="skill__remove fa fa-close"></span></span>
										</li>
										<li class="skill">
											<input type="text" value="Ssh" placeholder="Технология" class="skill__name"/>
											<input type="number" min="0" max="100" step="0.5" value="20" class="skill__percentage"/><span class="skill__misc"><span class="skill__percent-sign">%</span><span class="skill__remove fa fa-close"></span></span>
										</li>
										<li class="skill skill__new fa fa-plus"></li>
									</ul>
								</div>
								<div class="skills__block">
									<div class="skills__remove fa fa-close"></div>
									<input type="text" value="CMS" placeholder="Категория" class="skills__heading"/>
									<ul class="skills__list">
										<li class="skill">
											<input type="text" value="Wordpress" placeholder="Технология" class="skill__name"/>
											<input type="number" min="0" max="100" step="0.5" value="90" class="skill__percentage"/><span class="skill__misc"><span class="skill__percent-sign">%</span><span class="skill__remove fa fa-close"></span></span>
										</li>
										<li class="skill">
											<input type="text" value="Joomla" placeholder="Технология" class="skill__name"/>
											<input type="number" min="0" max="100" step="0.5" value="30" class="skill__percentage"/><span class="skill__misc"><span class="skill__percent-sign">%</span><span class="skill__remove fa fa-close"></span></span>
										</li>
										<li class="skill">
											<input type="text" value="Борода и усы" placeholder="Технология" class="skill__name"/>
											<input type="number" min="0" max="100" step="0.5" value="5" class="skill__percentage"/><span class="skill__misc"><span class="skill__percent-sign">%</span><span class="skill__remove fa fa-close"></span></span>
										</li>
										<li class="skill skill__new fa fa-plus"></li>
									</ul>
								</div>
								<div class="skills__block skills__block_new">
									<div class="fa fa-plus"></div>
								</div>
							</div>
							<button disabled class="form__button">Сохранить</button>
						</div>
					</form>
				</li>
				<li class="tabs-content__item">
					<form>
						<div class="form">
							<h2 class="form__heading">Блог</h2>
							<h3 class="form__subtitle">Добавить запись</h3>
							<input type="text" placeholder="Название" name="article-title" class="form__field">
							<input type="text" placeholder="Дата" name="article-date" class="form__field form__field_date">
							<textarea placeholder="Содержание" name="article-text" class="form__field form__field_textarea tinymce-field"></textarea>
							<button disabled class="form__button">Добавить</button>
						</div>
					</form>
				</li>
			</ul>
		</div>
		<script src="//cdn.tinymce.com/4/tinymce.min.js" defer></script>
		<script src="/assets/js/libs.js" defer></script>
		<script src="/assets/js/admin.js" defer></script>
	</body>
</html>