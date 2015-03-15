<?php
function createThumbnail($uploaded) {
   if (!$uploaded['name']) {
      //no image supplied, use default
      $tmpName = "../images/noimage.jpg";
      $tmpFile = fopen($tmpName, "r");
      $thumbnail = fread($tmpFile, fileSize($tmpName));
   } 
   else {
      //get image
      $image =  file_get_contents($uploaded['tmp_name']);
      //create image
      $origImage = imagecreatefromstring($image);
      if (!$origImage) {
         //not a valid image
        echo "Not a valid image\n";
        $tmpName = "images/noimage.jpg";
        $tmpFile = fopen($tmpName, "r");
        $thumbnail = fread($tmpFile, fileSize($tmpName));
      } 
      else {
         //create thumbnail
         $width = imageSX($origImage);
         $height = imageSY($origImage);
         $newThumb = imagecreatetruecolor(80, 60);

         //resize image to 80 x 60
         $result = imagecopyresampled($newThumb, $origImage, 
                                      0, 0, 0, 0,
                                      80, 60, $width, $height);

         //move image to variable
         ob_start();
         imageJPEG($newThumb);
         $thumbnail = ob_get_contents();
         ob_end_clean();
      }
   }
   return $thumbnail;
}
?>