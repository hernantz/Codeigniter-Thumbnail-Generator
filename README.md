Codeigniter-Thumbnail-Generator
==============================

A Codeigniter helper to generate &#39;On-The-Fly&#39; image thumbnails.

Installation & Usage
--------------------

1. Download the thumb_helper.php file to your /application/helpers directory
2. In your /config/autoload.php file, add 'thumb_helper' to your helpers array
3. To output a thumbnail, include the function as the source of your image, eg:
````
	<img src="<?php echo thumb('/path/to/your/full/image.jpg','200','100'); ?>">
````
Where 200 is the thumbnail width and 100 is the height.


Social
------

Follow me on twitter: <a href="http://www.twitter.com/@helloiamdarren">@helloiamdarren</a>


Credits
-------

This script is an adaptation of one by JR Tashjian. The original blog post can be found here: 
http://jrtashjian.com/2009/02/image-thumbnail-creation-caching-with-codeigniter/

