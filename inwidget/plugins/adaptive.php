<?php
	function setImageSize($inLine){
		// echo '
		// 	.widget .data a.image:link, .widget .data a.image:visited {
		// 		width: -webkit-calc((100% - (5px + (9px * '.$inLine.'))) / '.$inLine.');
		// 		width: -moz-calc((100% - (5px + (9px * '.$inLine.'))) / '.$inLine.');
		// 		width: -ms-calc((100% - (5px + (9px * '.$inLine.'))) / '.$inLine.');
		// 		width: calc((100% - (5px + (9px * '.$inLine.'))) / '.$inLine.');
		// 	}
		// ';

		// It's my hard code special for Ustore maket. And yes, I could not stylize it via native CSS in my general 
		// CSS-file. Please understand and forgive. Becouse I'm just an intern.
		echo '
			.widget .data a.image:link, .widget .data a.image:visited {
				width: -webkit-calc(100% / '.$inLine.');
				width: -moz-calc(100% / '.$inLine.');
				width: -ms-calc(100% / '.$inLine.');
				width: calc(100% / '.$inLine.');
			}
		';
	}
	if(!isset($_GET['inline']) AND !isset($_GET['view'])) {
		$inWidget->inline = 6;
		$inWidget->view = 12;
	}
?>
<script type="text/javascript" src="<?= $inWidget->skinPath ?>js/jquery-3.2.1.min.js"></script>
<style type='text/css'>
	<?= setImageSize($inWidget->inline) ?>
	.widget .data .image span {
		width: 100%;
		height: 100%;
	}
	.copyright {
		width: 100%;
	}
	.widget .profile {
		display:none;
	}

	<?php if($inWidget->inline > 4): ?>
		@media (max-width: 767.98px) {
			<?= setImageSize(3) ?>
		}	
	<?php endif;?>	
	@media (max-width: 480px) {
		<?= setImageSize(2) ?>
	}
	@media (max-width: 400px) {
		<?= setImageSize(1) ?>
	}
</style>
<script type="text/javascript">
	function setImagesDimensions(){
		var images = $('.widget .data .image');
		images.each(function(val){
			$(this).css('height',$(this).width());
		});
	}
	function setParentDimensions(){
		if(window.parent.document){
			var parents = $('iframe[data-inwidget]', window.parent.document);
			parents.each(function(val){
				if(window.frameElement){
					if($(this).attr('src') !== $(window.frameElement).attr('src')){
						return;
					}
				}
				$(this).css({
					'width':'100%',
					'height': $('#widget').outerHeight(true)
				});
			});
		}
	}
	$(document).ready(function(){
		setImagesDimensions();
		setParentDimensions();
		$(window).resize(function(){
			setImagesDimensions();
			setParentDimensions();
		});
	});
</script>