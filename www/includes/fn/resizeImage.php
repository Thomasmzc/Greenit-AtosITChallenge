/**
 * Resize image - preserve ratio of width and height.
 * @param string $sourceImage path to source JPEG or png image
 * @param string $targetImage path to final JPEG or pngimage file
 * @param int $maxWidth maximum width of final image (value 0 - width is optional)
 * @param int $maxHeight maximum height of final image (value 0 - height is optional)
 * @param int $quality quality of final image (0-100)
 * @return bool
 */
function resizeImage($sourceImage, $targetImage, $maxWidth, $maxHeight, $quality = 80)
{
	echo "started";      		
	$image_info = getimagesize($sourceImage); 

	if($image_info['mime']=='image/png') { 
	$image = imagecreatefrompng($sourceImage);
	}
	if($image_info['mime']=='image/jpg' || $image_info['mime']=='image/jpeg' || $image_info['mime']=='image/pjpeg') {
	$image = imagecreatefromjpeg($sourceImage);
	}  


	// Get dimensions of source image.
	list($origWidth, $origHeight) = getimagesize($sourceImage);

	if ($maxWidth == 0)
	{
	$maxWidth  = $origWidth;
	}

	if ($maxHeight == 0)
	{
	$maxHeight = $origHeight;
	}
	// Calculate ratio of desired maximum sizes and original sizes.
	$widthRatio = $maxWidth / $origWidth;
	$heightRatio = $maxHeight / $origHeight;
	// Ratio used for calculating new image dimensions.
	$ratio = min($widthRatio, $heightRatio);
	// Calculate new image dimensions.
	$newWidth  = (int)$origWidth  * $ratio;
	$newHeight = (int)$origHeight * $ratio;

	// Create final image with new dimensions.
	$newImage = imagecreatetruecolor($newWidth, $newHeight);
	imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
	imagejpeg($newImage, $targetImage, $quality);

	// Free up the memory.
	imagedestroy($image);
	imagedestroy($newImage);

	return true;
}

/**
 * Example
 * resizeImage('image.jpg', 'resized.jpg', 200, 200);
 */