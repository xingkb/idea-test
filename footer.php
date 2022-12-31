<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<footer class="footer">
	<?php if ($this->options->notice): ?>
	<p class="related">一言：<span id="hitokoto">:D 加载中...</span><?php /* $this->options->notice() */?></p>
	<?php endif; ?>
	<p class="related"><a href="<?php $this->options->siteUrl(); ?>"  target="_blank"><?php $this->options->title() ?></a> &copy; <?php echo date('Y'); ?></p>
	<p class="related">POWERED BY <a href="http://typecho.org/" target="_blank">TYPECHO</a> / THEME BY <a href="https://photo.siitake.cn/photograph.html" target="_blank">SIITAKE</a></p>
	<?php if ($this->options->icp): ?>
	<p class="related"><a href="http://www.miitbeian.gov.cn/" target="_blank"><?php $this->options->icp() ?></a></p>
	<?php endif; ?>
	<?php if ($this->options->statistics): echo '<div style="display:none;">'; $this->options->statistics(); echo '</div>'; endif; ?>
</footer><!-- end #footer -->
<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/masonry-docs.min.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('lightgallery/js/lightgallery.min.js'); ?>"></script>
<?php if (!empty($this->options->lightGalleryOpt) && in_array('lg_pager', $this->options->lightGalleryOpt)): ?>
<script type="text/javascript" src="<?php $this->options->themeUrl('lightgallery/js/lg-pager.min.js'); ?>"></script>
<?php endif; ?>
<?php if (!empty($this->options->lightGalleryOpt) && in_array('lg_autoplay', $this->options->lightGalleryOpt)): ?>
<script type="text/javascript" src="<?php $this->options->themeUrl('lightgallery/js/lg-autoplay.min.js'); ?>"></script>
<?php endif; ?>
<?php if (!empty($this->options->lightGalleryOpt) && in_array('lg_fullscreen', $this->options->lightGalleryOpt)): ?>
<script type="text/javascript" src="<?php $this->options->themeUrl('lightgallery/js/lg-fullscreen.min.js'); ?>"></script>
<?php endif; ?>
<?php if (!empty($this->options->lightGalleryOpt) && in_array('lg_zoom', $this->options->lightGalleryOpt)): ?>
<script type="text/javascript" src="<?php $this->options->themeUrl('lightgallery/js/lg-zoom.min.js'); ?>"></script>
<?php endif; ?>
<?php if (!empty($this->options->lightGalleryOpt) && in_array('lg_thumbnail', $this->options->lightGalleryOpt)): ?>
<script type="text/javascript" src="<?php $this->options->themeUrl('lightgallery/js/lg-thumbnail.min.js'); ?>"></script>
<?php endif; ?>
<script type="text/javascript">if(history.length < 2){$('.header-post-back').css('opacity', 0);}</script>
<script type="text/javascript">
<?php if ($this->is('post')) : ?>
		$(function() {
			$("img.post-item-img").lazyload({
				placeholder : "<?php $this->options->themeUrl('src/lazy.svg'); ?>",
				effect: "fadeIn",
				load: function(ele){
				//masonry
				var $container = $('#masonry');
				$container.imagesLoaded(function() {
					$container.masonry({
						itemSelector: '.post-item',
						gutter: 0,
						isAnimated: false,
					});
				});
            },		});
	});
		
	$(function() {

		//灯箱
		var lg = document.getElementById('masonry');
		lightGallery(lg, {
			selector: '.post-item',
			download: false,
			enableTouch: true,
			pager: true,
		});
  });
<?php endif; ?>
</script>
<?php $this->footer(); ?>
</body>
</html>
