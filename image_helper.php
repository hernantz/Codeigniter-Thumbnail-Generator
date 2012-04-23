<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Thumb()
 * A TimThumb-style function to generate image thumbnails on the fly.
 * 
 * @author Darren Craig
 * @param string $image_path
 * @param int $width
 * @param int $height
 * @return String
 * 
 */

function thumb($image_path, $width, $height) {
	
	// Get the CodeIgniter super object
	$CI = &get_instance();

	// get file extension
	$file = explode(".", $image_path);
	$ext = array_pop($file);
	$file_name = array_shift($file);
	$file_name = str_replace(dirname($image_path) . "/", "", $file_name);

	// Path to image thumbnail
	$image_thumb = dirname($image_path) . '/' . $file_name . "_" . $height . '_' . $width . "." . $ext;

	if (!file_exists($image_thumb)) {
		
		// LOAD LIBRARY
		$CI->load->library('image_lib');

		// CONFIGURE IMAGE LIBRARY
		$config['image_library'] = 'gd2';
		$config['source_image'] = $image_path;
		$config['new_image'] = $image_thumb;
		$config['maintain_ratio'] = true;
		$config['master_dim'] = "width";
		
		if ($height > $width) {
			$config['master_dim'] = "height";
		}

		$config['width'] = $width;
		$config['height'] = $height;

		$CI->image_lib->initialize($config);
		$CI->image_lib->resize();
		$CI->image_lib->clear();

		// get our image attributes
		list($original_width, $original_height, $file_type, $attr) = getimagesize($image_thumb);

		// set our cropping limits.
		$crop_x = ($original_width / 2) - ($width / 2);
		$crop_y = ($original_height / 2) - ($height / 2);
		
		// initialize our configuration for cropping
		$config['source_image'] = $image_thumb;
		$config['new_image'] = $image_thumb;
		$config['x_axis'] = $crop_x;
		$config['y_axis'] = $crop_y;
		$config['maintain_ratio'] = false;

		$CI->image_lib->initialize($config);
		$CI->image_lib->crop();
		$CI->image_lib->clear();
		
	}

	return $image_thumb;

}

/* End of file image_helper.php */
/* Location: ./application/helpers/image_helper.php */
