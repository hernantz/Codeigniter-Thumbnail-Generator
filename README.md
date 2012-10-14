Codeigniter-Thumbnail-Generator
==============================

A Codeigniter helper to generate &#39;On-The-Fly&#39; image thumbnails.

Installation & Usage
--------------------

1. Download the thumb_helper.php file to your /application/helpers directory
2. In your /config/autoload.php file, add 'thumb_helper' to your helpers array
3. The function expects the original file path (the filesystem one), a width and height for the thumbnail.

	```php
	<?php thumb($src, $width, $height, $image_thumb = ''); ?>
	```

	The fourth parameter is optional and contains the full path to save the thumbnail. Eg:


	```php
	<?php 
	$src_img = '/full/path/to/image.jpg';
	$thumb = '/full/path/to/thumbs/dir/image_thumb.jpg';
	echo thumb($src_img, 200, 100, $thumb); // outputs image_thumb.jpg 
	?>
	```

	Where 200 is the thumbnail width and 100 is the height.

	If the fourth param is not provided, a default filename is generated based on the original filename and it's dimensions. 
	Eg: ````my_image.png```` will become ````my_image_200_100.png````, and will be stored in the same directory as the original source image.

4. To output a thumbnail, include the function as part of the source of your image. Eg:


	```php
	<img src="<?php echo base_url('/images/'.thumb('/home/user/www/images/picture.jpg','200','100')); ?>">
	```

	Where 200 is the thumbnail's width and 100 is the height. thumb() will return the thumb's filename.


Philosophy
----------

Thumbs should be generated as needed by your current site layout and without modifing the original image. If the layout changes there won't be 
the need to upload every image again, which is very conveniently.

**Where should I place those thumbs?** Well, a thumb should be localizable by two ways: it's origin and it's applied manipulation (resize, crop, border-radius, polaroid-effect, etc)

By it's origin, becouse if the original image gets removed, it's thumbs should be removed as well.
By it's applied manipulation, becouse, as different types of thumbs may exist for the same image, if design changes and older thumbs ain't needed anymore they are all easyly removable.

> A hierarchical folder organization is cheap, fast and for your thumbs should be enough, 
> no need for an extra database table

**But I need feature X implemented** Great! Instead forcing this helper to fit in every possibly use case, I tried to make it easyly extensible/adaptable for your custom needs. Take this as a boilerplate codebase and please share your adaptation so is useful for everybody :)


Credits
-------

This script is an adaptation of one by JR Tashjian. The original blog post can be found here: 
http://jrtashjian.com/2009/02/image-thumbnail-creation-caching-with-codeigniter/

