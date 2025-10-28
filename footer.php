<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blocksy
 */

blocksy_after_current_template();
do_action('blocksy:content:bottom');

$logo_monocolor = get_field('logo_monocolor', 'options');
$socials = get_field('social_icons', 'options');
$tel = get_field('tel-link', 'options');
$phone_num = get_field('tel', 'options');
$copyright = get_field('copyright', 'options');
?>
</main>

<?php
do_action('blocksy:content:after');
do_action('blocksy:footer:before');
?>

<footer class="footer">
	<div class="container">
		<div
			class="footer__top footer-top white-underline white-icons d-flex justify-content-between align-items-md-center">
			<a href="/" class="footer__logo">
				<img src="<?php echo $logo_monocolor['url']; ?>" alt="<?php echo $logo_monocolor['alt']; ?>">
			</a>

			<iframe src="https://yandex.ru/sprav/widget/rating-badge/192721165090?type=rating" width="150" height="50" frameborder="0"></iframe>

			<!-- Fast zakaz -->
			<?php
			if ($socials['whatsapp'] || $socials['telegram'] || $socials['vk']) { ?>

				<div class="footer__zakaz footer-zakaz">
					<p class="fast-zakaz__text col-auto">
						Быстрый заказ
					</p>

					<?php
					// Social icons block
					get_template_part('template-parts/social'); ?>
					<!-- Social icons block end-->
				</div>

			<?php } ?>
		</div>

		<div
			class="footer__medium white-underline d-flex flex-column-reverse flex-md-row justify-content-between align-items-md-center mb-3 mb-md-4">
			<?php estore_footer_menu(); ?>

			<?php
			if ($tel && $phone_num): ?>
				<a class="header__tel header__tel_footer col-auto" href="tel:+7<?php echo $tel; ?>">
					<?php echo $phone_num; ?>
				</a>
			<?php endif;
			?>
		</div>

		<div class="footer__bottom footer-bottom d-grid gap-3">
			<p class="footer-bottom__item">
				<?php if ($copyright) { ?>
					©&nbsp;<?php echo date("Y"); ?>&nbsp; <?php echo $copyright; ?>
				<?php } ?>
			</p>

			<a class="footer-bottom__item" href="/privacy">
				Политка конфиденциальности
			</a>

			<p class="footer-bottom__item">
				Разработка сайта:&nbsp;<a href="https://sim-style.ru">Веб-студия «Символ стиля»</a>
			</p>
		</div>
	</div>
</footer>

<!-- Попап Заказать звонок -->
<section data-popup="call-popup" class="popup">
	<div class="popup__wrapper">
		<div class="popup__cont short-margin">
			<button data-popup-close="call-popup" class="popup__del">				
				<svg width="26" height="26" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd"
						d="M19.3848 17.9705L2.41431 1L1.00009 2.41421L17.9706 19.3847L1 36.3553L2.41421 37.7696L19.3848 20.7989L36.3554 37.7696L37.7696 36.3553L20.799 19.3847L37.7696 2.41422L36.3553 1.00001L19.3848 17.9705Z"
						fill="none" />
					<path
						d="M2.41431 1L3.12141 0.292893C2.73089 -0.0976311 2.09772 -0.0976311 1.7072 0.292893L2.41431 1ZM19.3848 17.9705L18.6777 18.6776C19.0682 19.0682 19.7014 19.0682 20.0919 18.6776L19.3848 17.9705ZM1.00009 2.41421L0.292986 1.70711C0.10545 1.89464 9.30997e-05 2.149 9.31025e-05 2.41421C9.31052e-05 2.67943 0.10545 2.93378 0.292986 3.12132L1.00009 2.41421ZM17.9706 19.3847L18.6777 20.0918C18.8653 19.9043 18.9706 19.6499 18.9706 19.3847C18.9706 19.1195 18.8653 18.8652 18.6777 18.6776L17.9706 19.3847ZM1 36.3553L0.292893 35.6482C-0.0976309 36.0388 -0.0976311 36.6719 0.292893 37.0625L1 36.3553ZM2.41421 37.7696L1.70711 38.4767C1.89464 38.6642 2.149 38.7696 2.41421 38.7696C2.67943 38.7696 2.93378 38.6642 3.12132 38.4767L2.41421 37.7696ZM19.3848 20.7989L20.0919 20.0918C19.9044 19.9043 19.65 19.7989 19.3848 19.7989C19.1196 19.7989 18.8653 19.9043 18.6777 20.0918L19.3848 20.7989ZM36.3554 37.7696L35.6483 38.4767C36.0388 38.8672 36.672 38.8672 37.0625 38.4767L36.3554 37.7696ZM37.7696 36.3553L38.4768 37.0624C38.6643 36.8749 38.7696 36.6206 38.7696 36.3553C38.7696 36.0901 38.6643 35.8358 38.4768 35.6482L37.7696 36.3553ZM20.799 19.3847L20.0919 18.6776C19.7014 19.0682 19.7014 19.7013 20.0919 20.0918L20.799 19.3847ZM37.7696 2.41422L38.4767 3.12133C38.8672 2.7308 38.8672 2.09764 38.4767 1.70712L37.7696 2.41422ZM36.3553 1.00001L37.0624 0.292902C36.8749 0.105365 36.6206 8.33396e-06 36.3553 8.22544e-06C36.0901 8.11692e-06 35.8358 0.105365 35.6482 0.292901L36.3553 1.00001ZM1.7072 1.70711L18.6777 18.6776L20.0919 17.2634L3.12141 0.292893L1.7072 1.70711ZM1.7072 3.12132L3.12141 1.70711L1.7072 0.292893L0.292986 1.70711L1.7072 3.12132ZM18.6777 18.6776L1.7072 1.70711L0.292986 3.12132L17.2635 20.0918L18.6777 18.6776ZM1.70711 37.0625L18.6777 20.0918L17.2635 18.6776L0.292893 35.6482L1.70711 37.0625ZM3.12132 37.0625L1.70711 35.6482L0.292893 37.0625L1.70711 38.4767L3.12132 37.0625ZM18.6777 20.0918L1.70711 37.0625L3.12132 38.4767L20.0919 21.5061L18.6777 20.0918ZM37.0625 37.0624L20.0919 20.0918L18.6777 21.5061L35.6483 38.4767L37.0625 37.0624ZM37.0625 35.6482L35.6483 37.0624L37.0625 38.4767L38.4768 37.0624L37.0625 35.6482ZM20.0919 20.0918L37.0625 37.0624L38.4768 35.6482L21.5061 18.6776L20.0919 20.0918ZM37.0624 1.70712L20.0919 18.6776L21.5061 20.0918L38.4767 3.12133L37.0624 1.70712ZM35.6482 1.70711L37.0624 3.12133L38.4767 1.70712L37.0624 0.292902L35.6482 1.70711ZM20.0919 18.6776L37.0624 1.70712L35.6482 0.292901L18.6777 17.2634L20.0919 18.6776Z"
						fill="none" />
				</svg>
			</button>

			<h3 class="popup__heading short-margin">
				Заказать звонок
			</h3>

			<?php
			echo do_shortcode('[contact-form-7 id="772e164" title="Заказать звонок"]'); ?>
		</div>
	</div>
</section>

<?php
do_action('blocksy:footer:after');
?>
</div>

<?php wp_footer(); ?>

<script>
	/*
	 * Light YouTube Embeds by @labnol
	 * Credit: https://www.labnol.org/
	 */

	function labnolIframe(div) {
		var iframe = document.createElement('iframe');
		iframe.setAttribute('src', 'https://www.youtube.com/embed/' + div.dataset.id + '?autoplay=1');
		iframe.setAttribute('frameborder', '0');
		iframe.setAttribute('allowfullscreen', '1');
		iframe.setAttribute('allow', 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture');
		div.parentNode.replaceChild(iframe, div);
	}

	function initYouTubeVideos() {
		var playerElements = document.querySelectorAll('.youtube-player');
		for (var n = 0; n < playerElements.length; n++) {
			var videoId = playerElements[n].dataset.id;
			var div = document.createElement('div');
			div.setAttribute('data-id', videoId);
			var thumbNode = document.createElement('img');
			thumbNode.src = '//i.ytimg.com/vi/ID/hqdefault.jpg'.replace('ID', videoId);
			div.appendChild(thumbNode);
			var playButton = document.createElement('div');
			playButton.setAttribute('class', 'play');
			div.appendChild(playButton);
			div.onclick = function () {
				labnolIframe(this);
			};
			playerElements[n].appendChild(div);
		}
	}

	document.addEventListener('DOMContentLoaded', initYouTubeVideos);
</script>

</body>

</html>