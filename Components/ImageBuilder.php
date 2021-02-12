<?php
    /**     
     methods:        
        can_upload - Возможно ли загрузить фото(return true or false)
        make_upload - uploads a photo to the file system (and returning full path of photo)
        delete - deleting photo (will return true if result is success)        
        wAndB - makes photo black and white
        flip - mirror reflection
        rotate - Rotates the photo
        negative - Applying a negative filter
        resize - change size of photo
        openPhoto - open the file in php from the system file using the desired method     
	 */

    namespace Components;
    class ImageBuilder
    {

        public static function can_upload($file)
        {
            // если имя пустое, значит файл не выбран
            if($file['name'] == '')
                return 'Вы не выбрали файл.';
            
            /* если размер файла 0, значит его не пропустили настройки 
            сервера из-за того, что он слишком большой */
            if($file['size'] == 0)
                return 'Файл слишком большой.';

            // объявим массив допустимых расширений                        	
            $types = array('image/gif', 'image/png', 'image/jpeg');
            
            // если расширение не входит в список допустимых - return
            if(in_array($file['type'], $types))
            {
                return true;
            }
            else
            {
                return 'Недопустимый тип файла. Выберите фотографию для загрузки.';               
            }
        }
          
        public static function make_upload($file){	
            // формируем уникальное имя картинки: случайное число и name
            $name = mt_rand(0, 10000) . $file['name'];
            move_uploaded_file($file['tmp_name'],'Template/images/'.$name);
            return $name;
        }
        
        public static function delete($img)
        {
            if(file_exists('Template/images/'.$img)) 
            {
                unlink('Template/images/'.$img); 
            }
            if(file_exists('Template/images/'.$img) == FALSE)
            {
                return True;
            }             
        }
        
        private static function openPhoto($photo)
        {
            $info = getimagesize($photo);
            
            $type = $info[2];
            switch ($type) 
            { 
                case 1: 
                    $source = imageCreateFromGif($photo);
                    imageSaveAlpha($img, true);
                    break;					
                case 2: 
                    $source = imageCreateFromJpeg($photo);
                    break;
                case 3: 
                    $source = imageCreateFromPng($photo); 
                    imageSaveAlpha($img, true);
                    break;
            }
            return $source;
        }

        //ЧерноБелое
        public static function wAndB($nameOfPhoto)
        {
            $photo = 'Template/images/'.$nameOfPhoto;
            if(file_exists($photo) === FALSE)
            {
                return "Нет такой фотографии";
            }            
            $img = self::openPhoto($photo);
            imagefilter($img, IMG_FILTER_GRAYSCALE);
            imagejpeg($img, $photo, 75);
            return true; 
        }
        //Зеркальное отражение
        public static function flip($nameOfPhoto)
        {
            $photo = 'Template/images/'.$nameOfPhoto;
            if(file_exists($photo) === FALSE)
            {
                return "Нет такой фотографии";
            }            
            $source = self::openPhoto($photo);
            imageflip($source, IMG_FLIP_HORIZONTAL);
            imagejpeg($source, $photo, 75);
            return true; 
        }
        //Поворот изображения
        public static function rotate($nameOfPhoto)
        {
            $photo = 'Template/images/'.$nameOfPhoto;
            if(file_exists($photo) === FALSE)
            {
                return "Нет такой фотографии";
            }            
            $source = self::openPhoto($photo);
            $old = imagerotate($source, 90, 000);
            imagejpeg($old, $photo, 75);
            return true; 
        }
        //Наложение негативного фильтра        
        public static function negative($nameOfPhoto)
        {
            $photo = 'Template/images/'.$nameOfPhoto;
            if(file_exists($photo) === FALSE)
            {
                return "Нет такой фотографии";
            }            
            $img = self::openPhoto($photo);
            imagefilter($img, IMG_FILTER_NEGATE);
            imagejpeg($img, $photo, 75);
            return true; 
        }
        public static function resize($nameOfPhoto)
        {
            $photo = 'Template/images/'.$nameOfPhoto;
            if(file_exists($photo) === FALSE)
            {
                return "Нет такой фотографии";
            }            
            $old =  self::openPhoto($photo);
            $info = getimagesize($photo);
            $old_w = $info[0];
            $old_h = $info[1];
            
            //Параметры обрезки фото
            $new_w = 400;
            $new_h = 0;
            //Получение правильных пропорций
            if (empty($new_w)) {
                $new_w = ceil($new_h / ($old_h / $old_w));
            }
            if (empty($new_h)) {
                $new_h = ceil($new_w / ($old_w / $old_h));
            }
            //imagefilter($old, IMG_FILTER_NEGATE);
            $new = imageCreateTrueColor($new_w, $new_h);
            imagecopyresampled($new, $old, 0, 0, 0, 0, $new_w, $new_h, $old_w, $old_h);
            
            imagejpeg($new, $photo, 75);
            imagedestroy($new);
            return TRUE;
        }
    }

?>
