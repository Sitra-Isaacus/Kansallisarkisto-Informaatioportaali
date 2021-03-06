<?php
class UN_Shortcodes{
	function __construct(){
		add_shortcode('usernoise', array($this, '_usernoise_form'));
		add_shortcode('feedbacks', array($this, '_feedbacks'));
		add_shortcode('usernoise_link', array($this, '_usernoise_link'));
		add_shortcode('usernoise_button', array($this, '_usernoise_button'));
		add_shortcode('show_usernoise_button', array($this, '_show_usernoise_button'));
		add_shortcode('hide_usernoise_button', array($this, '_hide_usernoise_button'));
	}

	function _usernoise_form($attrs){
		ob_start();
		?><script type="text/javascript">usernoise.window.show() ?></script><?php
		return ob_get_clean();
	}

	function _feedbacks($attrs){
		if (!is_string($attrs)) {
			$notabsIndex = array_search('notabs', $attrs);
		} else {
			$notabsIndex = null;
		}
		if (is_int($notabsIndex) && $notabsIndex !== NULL) {
			unset($attrs[$notabsIndex]);
			$attrs['notabs'] = true;
		}
		$attrs = wp_parse_args($attrs, array(
			'type' => null,
			'notabs' => false
		));
		if ($attrs['notabs'] === 'false' || $attrs['notabs'] === 'no') {
			$attrs['notabs'] = false;
		}

		ob_start();
		?>
		<div class="un-discussion"
			<?php echo $attrs['notabs'] ? ' notabs ' : '' ?>
			<?php echo $attrs['type'] !== null ?
			'current-type="' . esc_attr($attrs['type']) . '"' : ''?> >
			<style>
			    @keyframes un-loader {
			      0% {transform: rotate(0); }
			      100% {transform: rotate(360deg);}
			    }
			    body div.un-loader {
			        position: relative;
			        width: 35px;
			        height: 35px;
			        animation: un-loader infinite .75s linear;
			        border: 5px solid #EAEAEA;
			        border-left-color: #999;
			        border-radius: 100%;
			        display: block;
			        margin: 25px auto !important;
			    }
			</style>
      <div class="un-loader"></div>
		</div><?php
		return ob_get_clean();
	}

	public function _usernoise_link($attributes = null, $content){
		global $un_h;
		if (!$attributes) $attributes = array();
		$attributes['rel'] = 'usernoise';
		return $un_h->_link_to($content, '#',  $attributes);
	}

	function _usernoise_button($attrs, $content){
		return '<button rel="usernoise" class="usernoise">' . esc_html($content) . "</button>";
	}

	function _show_usernoise_button(){
		return "<script>showUsernoiseButton = true; </script>";
	}

	function _hide_usernoise_button(){
		return "<script>showUsernoiseButton = false;</script>";
	}
}

new UN_Shortcodes;
