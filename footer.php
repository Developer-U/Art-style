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
$socials =  get_field('social_icons', 'options');
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
					<div class="footer__top footer-top white-underline white-icons d-flex justify-content-between align-items-md-center">
						<a href="/" class="footer__logo">
							<img src="<?php echo $logo_monocolor['url']; ?>" alt="<?php echo $logo_monocolor['alt']; ?>">
						</a>

						<!-- Fast zakaz -->
						<?php
						if( $socials['whatsapp'] || $socials['telegram'] || $socials['vk']) { ?>

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

					<div class="footer__medium white-underline d-flex flex-column-reverse flex-md-row justify-content-between align-items-md-center mb-3 mb-md-4">
						<?php estore_footer_menu(); ?>

						<?php
							if( $tel && $phone_num ): ?>			
							<a class="header__tel header__tel_footer col-auto" href="tel:+7<?php echo $tel; ?>" >
								<?php echo $phone_num; ?>
							</a>		
						<?php endif; 
						?>
					</div>

					<div class="footer__bottom footer-bottom d-grid gap-3">						
						<p class="footer-bottom__item">
							<?php if( $copyright ) { ?>
								©&nbsp;<?php echo date("Y");?>&nbsp; <?php echo $copyright; ?>
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
