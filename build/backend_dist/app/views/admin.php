<?php require_once 'parts/header-admin.php'; ?>

	<body>

		<?php
			require_once "parts/preloader.php";
			require_once "parts/popup.php";
		?>

		<div class="admin-page">
			<div class="header">
				<div class="header__title-wrapper">
					<h1 class="header__title">Панель администрирования</h1>
				</div>
				<div class="header__link-wrapper">
					<a href="/" title="Вернуться на сайт" class="header__link preload-link">На сайт</a>
					<a href="/logout" title="Тестовый логаут" class="header__link preload-link">Выход</a>
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
							<input type="hidden" name="action" value="saveWork">
							<input type="text" placeholder="Название проекта" name="project-title" class="form__field">
							<input type="text" placeholder="Технологии" name="project-tech" class="form__field">
							<input type="text" placeholder="Ссылка" name="project-link" class="form__field">
							<input type="text" placeholder="Текст ссылки" name="project-anchor" class="form__field">
							<label class="file-label">Загрузить картинку
								<input type="file" name="project-file" class="form__field form__field_file">
							</label>
							<div class="form__field form__field_image-preview">
								<div class="fa fa-file-image-o"></div>
							</div>
							<button class="form__button">Добавить</button>
						</div>
					</form>
				</li>
				<li class="tabs-content__item">
					<form>
						<div class="form">
							<h2 class="form__heading">Обо мне</h2>
							<input type="hidden" name="action" value="saveSkills">

							<div class="skills">

								<?php
								$i=0;
								foreach($skills as $skill_block): ?>
									<div class="skills__block">
										<div class="skills__remove fa fa-close"></div>
										<input class="skills__heading" type="text" value="<?=$skill_block['category']?>" placeholder="Категория" name="skills[<?=$i?>][name]"/>
										<ul class="skills__list">
											<?php
											$j=0;
											foreach ($skill_block['skills'] as $skill_name => $skill_percentage): ?>

												<li class="skill">
													<input class="skill__name" type="text" value="<?=$skill_name?>" placeholder="Технология" name="skills[<?=$i?>][skills][<?=$j?>][name]"/>
													<input class="skill__percentage" type="number" min="0" max="100" step="0.5" value="<?=$skill_percentage?>" name="skills[<?=$i?>][skills][<?=$j?>][percentage]"/>
													<span class="skill__misc">
														<span class="skill__percent-sign">%</span>
														<span class="skill__remove fa fa-close"></span>
													</span>
												</li>
												<?php
											$j++;
											endforeach; ?>
											<li class="fa fa-plus skill skill__new" data-blockcount="<?=$i?>" data-lastcount="<?=$j?>"></li>
										</ul>
									</div>
									<?php
								$i++;
								endforeach; ?>

								<div class="skills__block skills__block_new" data-lastblockcount="<?=$i?>">
									<div class="fa fa-plus"></div>
								</div>

							</div>
							<button class="form__button">Сохранить</button>
						</div>
					</form>
				</li>
				<li class="tabs-content__item">
					<form>
						<div class="form">
							<h2 class="form__heading">Блог</h2>
							<h3 class="form__subtitle">Добавить запись</h3>
							<input type="hidden" name="action" value="savePost">
							<input type="text" placeholder="Название" name="post-title" class="form__field">
							<input type="text" placeholder="Дата" name="post-date" class="form__field form__field_date">
							<textarea placeholder="Содержание" name="post-content" class="form__field form__field_textarea tinymce-field"></textarea>
							<button class="form__button">Добавить</button>
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