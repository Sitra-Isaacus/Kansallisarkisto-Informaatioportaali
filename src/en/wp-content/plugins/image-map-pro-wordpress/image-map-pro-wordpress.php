<?php
include('includes/wcp-mega-save.php');
/*
Plugin Name: Image Map Pro
Plugin URI: http://www.webcraftplugins.com/
Version: 3.0.24
Author: Webcraft Plugins Ltd.
Description: The most advanced image map builder for WordPress
*/

if (!class_exists('ImageMapPro')) {
	class ImageMapPro {
		function __construct() {
			$this->admin_options_name = 'image-map-pro-wordpress-admin-options';
			$this->default_settings = array(
				"saves" => array(),
				"last_save" => "",
				"migrated_saves_from_3_0_22" => false
			);
			$this->pagename = 'image-map-pro-wordpress';
			$this->new_pagename = 'new_image-map-pro-wordpress';
		}
		function get_admin_options() {
			$admin_options = array(
				"saves" => array(),
				"last_save" => ""
			);

			$loaded_options = get_option($this->admin_options_name);

			if (!empty($loaded_options)) {
				foreach ($loaded_options as $key => $option) {
					$admin_options[$key] = $option;
				}
			} else {
				$loaded_options = $this->default_settings;
			}

			update_option($this->admin_options_name, $admin_options);
			return $admin_options;
		}
		function init_pages() {
			add_menu_page("Image Map Pro", "Image Map Pro", "manage_options", $this->pagename, array($this, "print_options_page"));
		}

		function register_admin_includes() {
			wp_register_style('image-map-pro-wcp-tour-css', plugins_url('/css/wcp-tour.css', __FILE__), false, '3.0.24', false);
			wp_register_script('image-map-pro-wcp-tour-js', plugins_url('/js/wcp-tour.js', __FILE__), false, '3.0.24', true);

			wp_register_style('image-map-pro-wcp-editor-css', plugins_url('/css/wcp-editor.css', __FILE__), false, '3.0.24', false);
			wp_register_script('image-map-pro-wcp-editor-js', plugins_url('/js/wcp-editor.js', __FILE__), false, '3.0.24', true);
			wp_register_script('image-map-pro-wcp-compress-js', plugins_url('/js/wcp-compress.js', __FILE__), false, '3.0.24', true);
			wp_register_style('image-map-pro-wcp-editor-controls-css', plugins_url('/css/wcp-editor-controls.css', __FILE__), false, '3.0.24', false);
			wp_register_script('image-map-pro-wcp-editor-controls-js', plugins_url('/js/wcp-editor-controls.js', __FILE__), false, '3.0.24', true);
			wp_register_script('image-map-pro-wcp-wp-media-js', plugins_url('/js/wcp-wp-media.js', __FILE__), false, '3.0.24', true);

			wp_register_script('image-map-pro-squares-js', plugins_url('/js/squares.js', __FILE__), false, '3.0.24', true);
			wp_register_script('image-map-pro-squares-elements-js', plugins_url('/js/squares-elements-wp.js', __FILE__), false, '3.0.24', true);
			wp_register_script('image-map-pro-squares-controls-js', plugins_url('/js/squares-controls.js', __FILE__), false, '3.0.24', true);
			wp_register_script('image-map-pro-frontend-squares-js-renderer', plugins_url('/js/squares-renderer.js', __FILE__), array('jquery'), '3.0.24', true);
			wp_register_style('image-map-pro-squares-css', plugins_url('/css/squares.css', __FILE__), false, '3.0.24', false);
			wp_register_style('image-map-pro-squares-editor-css', plugins_url('/css/squares-editor.css', __FILE__), false, '3.0.24', false);
			wp_register_style('image-map-pro-squares-controls-css', plugins_url('/css/squares-controls.css', __FILE__), false, '3.0.24', false);

			wp_register_style('image-map-pro-wordpress-css', plugins_url('/css/image-map-pro.css', __FILE__), false, '3.0.24', false);
			wp_register_script('image-map-pro-wordpress-js', plugins_url('/js/image-map-pro.js', __FILE__), false, '3.0.24', true);

			wp_register_style('image-map-pro-wordpress-editor-css', plugins_url('/css/image-map-pro-editor.css', __FILE__), false, '3.0.24', false);
			wp_register_script('image-map-pro-wordpress-editor-js', plugins_url('/js/image-map-pro-editor.js', __FILE__), false, '3.0.24', true);
			wp_register_script('image-map-pro-wordpress-editor-init-js', plugins_url('/js/image-map-pro-editor-init-wp.js', __FILE__), false, '3.0.24', true);

			wp_register_script('image-map-pro-wordpress-editor-content-js', plugins_url('/js/image-map-pro-editor-content.js', __FILE__), false, '3.0.24', true);
			wp_register_script('image-map-pro-wordpress-editor-wp-storage-js', plugins_url('/js/image-map-pro-editor-wp-storage.js', __FILE__), false, '3.0.24', true);
			wp_register_script('image-map-pro-webcraft-icons-js', plugins_url('/js/webcraft-icons.js', __FILE__), false, '3.0.24', true);

			wp_register_style('image-map-pro-wordpress-admin-css', plugins_url('/css/admin.css', __FILE__), false, '3.0.24', false);
			wp_register_script('image-map-pro-wordpress-admin-js', plugins_url('/js/admin.js', __FILE__), false, '3.0.24', true);
		}
		function register_client_includes() {
			wp_register_style('image-map-pro-frontend-squares-css', plugins_url('/css/squares.css', __FILE__), false, '3.0.24', false);
			wp_register_style('image-map-pro-frontend-wordpress-css', plugins_url('/css/image-map-pro.css', __FILE__), false, '3.0.24', false);
			wp_register_script('image-map-pro-frontend-wordpress-js', plugins_url('/js/image-map-pro.js', __FILE__), array('jquery'), '3.0.24', true);
			wp_register_script('image-map-pro-frontend-squares-js-renderer', plugins_url('/js/squares-renderer.js', __FILE__), array('jquery'), '3.0.24', true);
			wp_register_script('image-map-pro-squares-elements-js', plugins_url('/js/squares-elements-wp.js', __FILE__), false, '3.0.24', true);
		}
		function enqueue_admin_includes() {
			wp_enqueue_script('jquery');
			wp_enqueue_media();

			wp_enqueue_style('image-map-pro-wcp-tour-css');
			wp_enqueue_script('image-map-pro-wcp-tour-js');

			wp_enqueue_style('image-map-pro-wcp-editor-css');
			wp_enqueue_script('image-map-pro-wcp-editor-js');
			wp_enqueue_script('image-map-pro-wcp-compress-js');
			wp_enqueue_style('image-map-pro-wcp-editor-controls-css');
			wp_enqueue_script('image-map-pro-wcp-editor-controls-js');
			wp_enqueue_script('image-map-pro-wcp-wp-media-js');

			wp_enqueue_script('image-map-pro-squares-js');
			wp_enqueue_script('image-map-pro-squares-controls-js');
			wp_enqueue_script('image-map-pro-frontend-squares-js-renderer');
			wp_enqueue_script('image-map-pro-squares-elements-js');
			wp_enqueue_style('image-map-pro-squares-css');
			wp_enqueue_style('image-map-pro-squares-editor-css');
			wp_enqueue_style('image-map-pro-squares-controls-css');

			wp_enqueue_style('image-map-pro-wordpress-css');
			wp_enqueue_script('image-map-pro-wordpress-js');

			wp_enqueue_style('image-map-pro-wordpress-editor-css');
			wp_enqueue_script('image-map-pro-wordpress-editor-js');
			wp_enqueue_script('image-map-pro-wordpress-editor-init-js');

			wp_enqueue_script('image-map-pro-wordpress-editor-content-js');
			wp_enqueue_script('image-map-pro-wordpress-editor-wp-storage-js');
			wp_enqueue_script('image-map-pro-webcraft-icons-js');

			wp_enqueue_style('image-map-pro-wordpress-admin-css');
			wp_enqueue_script('image-map-pro-wordpress-admin-js');
		}
		function enqueue_client_includes() {
			wp_enqueue_script('jquery');
			wp_enqueue_style('image-map-pro-frontend-squares-css');
			wp_enqueue_style('image-map-pro-frontend-wordpress-css');
			wp_enqueue_script('image-map-pro-frontend-wordpress-js');
			wp_enqueue_script('image-map-pro-frontend-squares-js-renderer');
			wp_enqueue_script('image-map-pro-squares-elements-js');
		}
		function shortcodes() {
			$options = $this->get_admin_options();
			$saves = $options['saves'];

			foreach ($saves as $save) {
				if (isset($save['meta']['shortcode']) && strlen($save['meta']['shortcode']) > 0) {
					add_shortcode($save['meta']['shortcode'], array($this, 'print_shortcode'));
				}
			}
		}
		function print_shortcode($a, $b, $shortcode) {
			$options = $this->get_admin_options();
			$saves = $options['saves'];
			$result = false;

			foreach ($saves as $id => $save) {
				if (isset($save['meta']['shortcode']) && $save['meta']['shortcode'] == $shortcode) {
					$result = '<div id="image-map-pro-'. $id .'"></div>';
				}
			}

			if ($result) {
				add_action('wp_footer', array($this, 'call_plugin'));
			}

			return $result;
		}
		function call_plugin() {
			$this->enqueue_client_includes();

			$options = $this->get_admin_options();
			$saves = $options['saves'];

			foreach ($saves as $id => $save) {
				?>
				<script>
				;(function ($, window, document, undefined ) {
					$(document).ready(function() {
						<?php

						$json = $save['json'];

						// $save = str_replace("\n", "<br>", ); // Replace new line characters with <br>
						// $save = str_replace('\\"', '"', $save); // top-level JSON
						// $save = str_replace('\\\\"', '\"', $save); // HTML inside top level JSON
						// $save = str_replace('\\\\\\\\\\"', '\\\\\"', $save); // HTML inside second level JSON

						// $save = str_replace("\\n", "<br>", $save); // Replace new line characters with <br>
						// $save = str_replace('\\\\\\\\\\\"', '\\\\"', $save); // Replace \" with "
						// $save = str_replace('\\\\"', '\\"', $save); // Replace \" with "
						// $save = str_replace('\\"', '"', $save); // Replace \" with "
						// $save = str_replace("\\'", "'", $save); // Replace \' with '

						// $save = utf8_decode($save);

						// Shortcode
						$json = do_shortcode($json);
						$json = str_replace("\n", "<br>", $json); // Replace new line characters with <br>

						echo 'var settings = JSON.parse("' . $json . '");' . "\n";
						echo "$('#image-map-pro-". $id . "').imageMapPro(settings);";

						?>
					});
				})(jQuery, window, document);
				</script>
				<?php
			}
		}
		function print_options_page() {
			$options = $this->get_admin_options();
			$this->enqueue_admin_includes();

			?>
			<div id="instance-options-wrap">
				<div id="debug" style="display: none; height: 60px; position: relative; width: 100%; z-index: 999999;"><?php echo ini_get('post_max_size'); ?></div>
				<div id="debug" style="display: none; height: 60px; position: relative; width: 100%; z-index: 999999;"><?php echo ini_get('max_execution_time'); ?></div>
				<div id="wcp-editor"></div>
			</div>
			<?php
		}
		function migrate() {
			// Migrate saves from versions older than 3.0.22
			$options = $this->get_admin_options($this->admin_options_name);

			if ($options['migrated_saves_from_3_0_22'] == false) {
				// Get saves list from wp mega save
				$list = $this->mega_saver->get_saves_list();

				// Migrate each save
				foreach ($list as $save) {
					$id = $save['id'];
					$name = $save['meta']['name'];
					$shortcode = $save['meta']['shortcode'];
					
					$mergedFragments = '';
					for ($i=0; $i<$save['fragments']; $i++) {
						$mergedFragments .= $this->mega_saver->get_save_fragment($id, $i);
					}

					$options['saves'][$id] = array(
						"json" => $mergedFragments,
						"meta" => array(
							"name" => $name,
							"shortcode" => $shortcode
						)
					);
				}

				// Update options
				update_option($this->admin_options_name, $options);

				// Set migration to true
				$options = $this->get_admin_options($this->admin_options_name);
				$options['migrated_saves_from_3_0_22'] = true;
				update_option($this->admin_options_name, $options);
			}
		}

		// AJAX

		function ajax_get_last_save() {
			$options = $this->get_admin_options();

			if (isset($options['last_save_id'])) {
				echo $options['last_save_id'];
			}

			die();
		}
		function ajax_set_last_save() {
			$options = $this->get_admin_options();

			$options['last_save_id'] = $_POST['saveID'];
			update_option($this->admin_options_name, $options);

			die();
		}
		function ajax_store_save() {
			$json = $_POST['json'];
			$id = $_POST['saveID'];
			$name = $_POST['name'];
			$shortcode = $_POST['shortcode'];

			$options = get_option($this->admin_options_name);
			$options['saves'][$id] = array(
				"json" => $json,
				"meta" => array(
					"name" => $name,
					"shortcode" => $shortcode
				)
			);
			update_option($this->admin_options_name, $options);

			// Verify
			$options = get_option($this->admin_options_name);
			$storedJSON = $options['saves'][$id]['json'];
			echo $storedJSON;

			die();
		}
		function ajax_get_save() {
			$id = $_POST['saveID'];

			$options = get_option($this->admin_options_name);
			$save = $options['saves'][$id];
			echo $save['json'];
			die();
		}
		function ajax_delete_save() {
			$id = $_POST['saveID'];

			$options = get_option($this->admin_options_name);
			unset($options['saves'][$id]);

			if ($options['last_save_id'] == $id) {
				unset($options['last_save_id']);
			}

			update_option($this->admin_options_name, $options);
		}
		function ajax_get_saves_list() {
			$options = get_option($this->admin_options_name);
			$list = array();

			foreach ($options['saves'] as $id => $save) {
				$parsedSave = json_decode($save);

				$listItem = array(
					"id" => $id,
					"name" => $save['meta']['name'],
					"shortcode" => $save['meta']['shortcode'],
				);

				array_push($list, $listItem);
			}

			echo json_encode($list);
			die();
		}
	}
}

if (class_exists('WCPMegaSave')) {
	$wcpMegaSave = new WCPMegaSave('image-map-pro-fragmented-saves');
}

if (class_exists('ImageMapPro')) {
	$instance = new ImageMapPro();
	$instance->shortcodes();
	$instance->mega_saver = $wcpMegaSave;
	$instance->migrate();
}



add_action('admin_menu', array($instance, 'init_pages'));

add_action('admin_enqueue_scripts', array($instance, 'register_admin_includes'));
add_action('wp_enqueue_scripts', array($instance, 'register_client_includes'));

// Reworked
add_action('wp_ajax_image_map_pro_get_saves_list', array($instance, 'ajax_get_saves_list'));
add_action('wp_ajax_image_map_pro_store_save', array($instance, 'ajax_store_save'));
add_action('wp_ajax_image_map_pro_get_save', array($instance, 'ajax_get_save'));
add_action('wp_ajax_image_map_pro_delete_save', array($instance, 'ajax_delete_save'));
add_action('wp_ajax_image_map_pro_set_last_save', array($instance, 'ajax_set_last_save'));
add_action('wp_ajax_image_map_pro_get_last_save', array($instance, 'ajax_get_last_save'));
