<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

if (!class_exists('EbStyleHandler')) {
	final class EbStyleHandler
	{
		private static $instance;

		private $media_desktop = [
			'name' => 'desktop',
			'screen_size' => ''
		];
		private $media_tab = [
			'name' => 'tab',
			'screen_size' => 1024
		];
		private $media_mobile = [
			'name' => 'mobile',
			'screen_size' => 767
		];


		public static function init()
		{
			if (null === self::$instance) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		public function __construct()
		{
			add_action('admin_enqueue_scripts', [$this, 'essential_blocks_edit_post']);
			add_action('wp_ajax_eb_write_block_css', [$this, 'write_block_css']);
			add_action('wp_enqueue_scripts', [$this, 'enqueue_frontend_css']);
		}

		/**
		 * Enqueue a script in the WordPress admin on edit.php.
		 * @param int $hook Hook suffix for the current admin page.
		 */
		public function essential_blocks_edit_post($hook)
		{
			$dir = dirname(__FILE__);
			$frontend_js = "dist/index.js";
			$styleHandler_dependencies = include_once $dir . '/dist/index.asset.php';

			$all_dependencies = array(
				'lodash',
				'wp-i18n',
				'wp-element',
				'wp-hooks',
				'wp-util',
				'wp-components',
				'wp-blocks',
				'wp-editor',
				'wp-block-editor'
			);

			if (is_array($styleHandler_dependencies) && array_key_exists('dependencies', $styleHandler_dependencies)) {
				$all_dependencies = array_merge($all_dependencies, $styleHandler_dependencies['dependencies']);
			}
			$editor_type = 'edit-post';

			if ($hook == 'post-new.php' || $hook == 'post.php') {
				$all_dependencies[] = "wp-edit-post";
			}

			if ($hook == 'site-editor.php' || $hook == 'appearance_page_gutenberg-edit-site') {
				$all_dependencies[] = "wp-edit-site";
				$editor_type = 'edit-site';
			}

			wp_enqueue_script(
				'essential-blocks-edit-post',
				plugins_url($frontend_js, __FILE__),
				$all_dependencies,
				$styleHandler_dependencies['version'],
				true
			);
			wp_localize_script('essential-blocks-edit-post', 'eb_style_handler', [
				'sth_nonce' => wp_create_nonce('eb_style_handler_nonce'),
				'editor_type' => $editor_type
			]);
		}

		/**
		 * Ajax callback to write css in upload directory
		 * @retun void
		 * @since 1.0.2
		 */
		public function write_block_css()
		{
			if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'eb_style_handler_nonce') || !current_user_can('manage_options')) {
				echo 'Invalid request';
				wp_die();
			}

			$block_styles = (array)json_decode(stripslashes($_POST['data']));

			if (isset($_POST['editorType']) && $_POST['editorType'] === "edit-site") {
				$upload_dir = wp_upload_dir()['basedir'] . '/eb-style/';
				$editSiteCssPath = $upload_dir . 'eb-style-' . $_POST['editorType'] . '.min.css';
				if (file_exists($editSiteCssPath)) {
					$existingCss = file_get_contents($editSiteCssPath);
					$pattern = "~\/\*(.*?)\*\/~";
					preg_match_all($pattern, $existingCss, $result, PREG_PATTERN_ORDER);
					$allComments = $result[0];
					$seperatedIds = array();
					foreach ($allComments as $comment) {
						$id = preg_replace('/[^A-Za-z0-9\-]|Ends|Starts/', '', $comment);

						if (strpos($comment, "Starts")) {
							$seperatedIds[$id]['start'] = $comment;
						} else if (strpos($comment, "Ends")) {
							$seperatedIds[$id]['end'] = $comment;
						}
					}

					$seperateStyles = array();
					foreach ($seperatedIds as $key => $ids) {
						$data = $this->get_between_data($existingCss, $ids['start'], $ids['end']);
						$seperateStyles[$key] = $data;
					}

					$finalCSSArray = array_merge($seperateStyles, $block_styles);

					if (!empty($css = $this->build_css($finalCSSArray))) {
						$upload_dir = wp_upload_dir()['basedir'] . '/eb-style/';
						if (!file_exists($upload_dir)) {
							mkdir($upload_dir);
						}

						file_put_contents($editSiteCssPath, $css);
					}
				} else {
					if (!empty($css = $this->build_css($block_styles))) {
						$upload_dir = wp_upload_dir()['basedir'] . '/eb-style/';
						if (!file_exists($upload_dir)) {
							mkdir($upload_dir);
						}

						file_put_contents($editSiteCssPath, $css);
					}
				}
			} else {
				if (!empty($css = $this->build_css($block_styles))) {
					$upload_dir = wp_upload_dir()['basedir'] . '/eb-style/';
					if (!file_exists($upload_dir)) {
						mkdir($upload_dir);
					}
					file_put_contents($upload_dir . 'eb-style-' . abs($_POST['id']) . '.min.css', $css);
				}
			}

			wp_die();
		}

		/**
		 * Enqueue frontend css for post if have one
		 * @return void
		 * @since 1.0.2
		 */
		public function enqueue_frontend_css()
		{
			global $post;

			if (!empty($post) && !empty($post->ID)) {
				$upload_dir = wp_upload_dir();

				if (file_exists($upload_dir['basedir'] . '/eb-style/eb-style-' . $post->ID . '.min.css')) {
					wp_enqueue_style('eb-block-style-' . $post->ID, $upload_dir['baseurl'] . '/eb-style/eb-style-' . $post->ID . '.min.css', [], substr(md5(microtime(true)), 0, 10));
				}
				if (function_exists('wp_is_block_theme') && wp_is_block_theme() && file_exists($upload_dir['basedir'] . '/eb-style/eb-style-edit-site.min.css')) {
					wp_enqueue_style('eb-fullsite-style', $upload_dir['baseurl'] . '/eb-style/eb-style-edit-site.min.css', [], substr(md5(microtime(true)), 0, 10));
				}
			}
		}

		/**
		 * Enqueue frontend css for post if have one
		 * @param string
		 * @return string
		 * @since 1.0.2
		 */
		private function build_css($style_object)
		{
			// $block_styles = (array)json_decode(stripslashes($style_object));
			$block_styles = $style_object;

			$css = '';
			foreach ($block_styles as $block_style_key => $block_style) {
				if (!empty($block_css = (array) $block_style)) {
					$css .= sprintf(
						'/* %1$s Starts */',
						$block_style_key
					);
					foreach ($block_css as $media => $style) {
						switch ($media) {
							case $this->media_desktop['name']:
								$css .= preg_replace('/\s+/', ' ', $style);
								break;
							case $this->media_tab['name']:
								$css .= ' @media(max-width: 1024px){';
								$css .= preg_replace('/\s+/', ' ', $style);
								$css .= '}';
								break;
							case $this->media_mobile['name']:
								$css .= ' @media(max-width: 767px){';
								$css .= preg_replace('/\s+/', ' ', $style);
								$css .= '}';
								break;
							case "custom_css":
								$css .= preg_replace('/\s+/', ' ', $style);
								break;
						}
					}
					$css .= sprintf(
						'/* =%1$s= Ends */',
						$block_style_key
					);
				}
			}
			return trim($css);
		}

		/**
		 * Helper function to get string between 2 string
		 * @since 3.3.0
		 */
		private function get_between_data($string, $start, $end)
		{
			$pos_string = stripos($string, $start);
			$substr_data = substr($string, $pos_string);
			$string_two = substr($substr_data, strlen($start));
			$second_pos = stripos($string_two, $end);
			$string_three = substr($string_two, 0, $second_pos);

			// remove whitespaces from result
			$result_unit = trim($string_three);

			// return result_unit
			return $result_unit;
		}
	}
	EbStyleHandler::init();
}
