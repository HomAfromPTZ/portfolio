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
						<li class="links-list__item"><a href="#article-0" class="links-list__link">Никаких распродаж! В Госдуме приняли закон о «налоге на Google»</a></li>
						<li class="links-list__item"><a href="#article-1" class="links-list__link">«Актер, которого никто не знал» — умер Альф</a></li>
						<li class="links-list__item"><a href="#article-2" class="links-list__link">«Мы уже киборги», — заявил Илон Маск на конференции Code Conference 2016</a></li>
					</ul>
				</nav>
			</aside>
			<section class="blog-content">
				<div id="article-0" class="article">
					<h3 class="article__title">Никаких распродаж! В Госдуме приняли закон о «налоге на Google»</h3>
					<p class="article__date">15 июня 2016</p>
					<div class="article__content">
						<p>15 июня депутаты Государственной думы России приняли закон о «налоге на Google», который вводит 18% взыскания для западных IT-компаний. Таким образом, дополнительной стоимостью будут облагаться иностранные конторы, продающие цифровой контент.</p>
						
						
						<p>1 января 2017 года начнет действовать закон, облагающий добавленной стоимостью электронные товары, продающиеся на территории России. Он был принят 15 июня в окончательном чтении Госдумы. Теперь иностранным компаниям нужно зарегистрироваться в налоговой службе — сделать это можно уже сейчас подав заявление.</p>
						
						<p>НДС коснется цифровых прав на использование игр, программ, приложений, услуг провайдера, регистрации доменов и прочего. Больше никаких скидок и распродаж от Steam и Origin.</p>
						
						<img src="/assets/img/articles/fpalm.gif" alt="Facepalm">
						
						<p>Документ внесли на рассмотрение в декабре депутаты из «Справедливой России» и ЛДПР. Вначале была идея облагать налогом еще и российских продавцов, но позже решили оставить 18% налог только для западных представителей. Тогда говорилось о том, что «налог на Google» принесет государству дополнительные 10 миллиардов рублей. В планах запустить такую же добавочную стоимость к зарубежным интернет-магазинам.</p>
						
					</div>
				</div>
				<div id="article-1" class="article">
					<h3 class="article__title">«Актер, которого никто не знал» — умер Альф</h3>
					<p class="article__date">14 июня 2016</p>
					<div class="article__content">
						<p>В киноиндустрии работает огромное количество людей, чьи имена теряются в конце длинных титров. Вы едва ли знаете имена большинства каскадеров (с одним из них мы уже знакомили), дублеров, звукорежиссеров и прочих важных людей. Случается, что публика не знает даже актера, исполнившего главную роль в популярном телешоу. Что же, сегодня мы попытаемся это исправить.</p>
						
						<img src="/assets/img/articles/alph.gif" alt="Alph">
						
						<p>Как сообщает TMZ, 13 июня в возрасте 76 лет скончался сыгравший Альфа американский актер-карлик Михай Месарош. Неделю назад актер был случайно найден у себя дома без сознания. В госпиталь его доставили в состоянии комы, из которой он так и не вышел.</p>
						
						<p>Михай родился 20 сентября 1939 года в Венгрии, в маленькой деревне Пели, недалеко от Будапешта. После окончания государственной школы циркового искусства, освоив несколько специальностей, в возрасте 14 лет начал выступать в Национальном цирке Венгрии. В 1973 году на одном из выступлений его заметили представители Ringling Bros. and Barnum & Bailey Circus — одного из крупнейших американских цирков.</p>
						
						<p>В его составе Михай выступал на цирковых аренах США и Канады. Шоу посетили многие известные личности, включая двух президентов США Джимми Картера и Рональда Рейгана.</p>
						
						
						<p>Чаще всего артист выступал в качестве дрессировщика пуделей, которые, кстати, нередко оказывались выше него ростом. Самого Михая вполне устраивала такая цирковая жизнь, но впереди его ждала карьера киноактера.</p>
						
						<p>В 1986 году Михая Месароша пригласили на съемки ситкома «Альф» от телеканала NBC. Актер-карлик исполнил роль смешного инопланетянина во всех моментах, где персонаж появлялся во весь рост. Казалось бы, столь популярное телешоу должно было принести Михаю настоящую славу, но во время съемок чаще всего использовалась лишь верхняя часть Альфа, которой управляли создатель шоу Пол Фаско и несколько ассистентов. В результате, в титрах имя Михая Месероша стоит в списке тех самых ассистентов-кукольников.</p>
						
						<p>На «Альфе» его работа в киноиндустрии не закончилась. Вы могли видеть его в таких фильмах как «Музей восковых фигур» (1988), «Чернокнижкик 2: Армагеддон» (1993) и «Уроды» (1993). Последней его ролью был Лепрекон в короткометражном фильме «Death to Cupid» (2015).</p>
						
						<img src="/assets/img/articles/alph2.jpg" alt="Alph and Michael">
						
						
						<p>В то же время Михай Месерош продолжал выступать в цирке и даже подружился с Майклом Джексоном,. Михая часто видели в обществе короля поп-музыки и его детей в поместье Майкла Джексона Neverland Ranch. Несмотря на то, что этот артист так и не получил ни одной кинонаграды, его именем названа самая короткая улица города Хоторн, что недалеко от Лос-Анджелеса.</p>
						
						<p>Менеджер Михая Деннис Варгас запустил сбор средств для оплаты больничных услуг и похорон артиста на портале GoFundMe, так что у вас есть возможность отдать дань уважения этому маленькому актеру, которого вы не знали.</p>
					</div>
				</div>
				<div id="article-2" class="article">
					<h3 class="article__title">«Мы уже киборги», — заявил Илон Маск на конференции Code Conference 2016</h3>
					<p class="article__date">03 июня 2016</p>
					<div class="article__content">
						<p>Инженер, миллиардер и просто харизматичный парень Илон Маск заявил, что люди уже сейчас отчасти являются киборгами. И в будущем мы должны быть готовы стать домашними питомцами роботов-повелителей. Крамольное заявление прозвучало со сцены конференции Code Conference 2016, которая с 31 мая по 2 июня прошла Калифорнии.</p>
						
						
						<p>«Мы уже киборги. У нас есть виртуальная копия себя, электронная личность, которая частично хранится в почте или личной переписке, а также во всем, что мы делаем в интернете. У нас больше власти, чем у президента 20 лет назад. Найти ответ на любой вопрос, начать моментальную конференцию или связаться разом с миллионами людей. Это просто невероятные вещи»</p>
						
						<img src="/assets/img/articles/tesla.jpg" alt="Elon Musk">
						
						<p>Также американско-канадский прорицатель заявил, что людям необходимо создать комьютеры, связанные с корой головного мозга:</p>
						
						<p>«Такая связь с виртуальностью представляется мне инъекциями, через которые электроника будет соединяться с живыми нейронами. Так компьютер сможет взаимодействовать с деятельностью человеческого мозга. В противном случае, мы будем настолько ниже роботов в интеллектуальном плане, что станем их домашними питомцами. Они будут относиться к нам, как сейчас люди относятся к домашней кошке»</p>
						
						<p>Помимо этого создатель космической компании SpaceX и электромобилей Tesla высказался на счет видеоигр:</p>
						
						<p>«Все точно идет к тому, что игры перестанут отличаться от реальности. Доступ к ним будет открыт в любое время. Мы либо самостоятельно создадим виртуальную реальность, либо уже сейчас являемся частью чьей-то симуляции. И это неизбежно. Развитие цивилизации подразумевает данный шаг и остановить этот процесс может только глобальный катаклизм, гибель»</p>
						
						<p>Полное выступление Илона Маска состоялось на Code Conference 2016 — ежегодной конференции о влиянии технологий на жизнь людей. Посмотреть его можно например <a href="https://youtu.be/tV8EOQNYC-8?list=PLKof9YSAshgyPqlK-UUYrHfIQaOzFPSL4">здесь</a>.</p>
						
					</div>
				</div>
			</section>
		</div>
<?php require_once 'parts/footer.php'; ?>
<?php require_once 'parts/footer-end.php'; ?>