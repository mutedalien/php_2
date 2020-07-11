<?php

class AdminM
{
    public function __construct(){}

    public static function basketsUsers()
    {
        $res_query = PdoM::Instance()->MyQuery('SELECT * FROM `'.BASKETS.'` LEFT JOIN `'.USERS.'` ON `'.BASKETS.'`.`user_id`=`'.USERS.'`.`user_id`');
//echo '<pre>AdminM->basketsUsers()=$res_query:';
//print_r($res_query);
//echo '</pre>';
        foreach ($res_query as $id => $array_user_order) {
            $item_name = PdoM::Instance()->MyQuery('SELECT `name` FROM `'.ITEMS.'` WHERE `item_id`='.$array_user_order['item_id']);
            $option_name = PdoM::Instance()->MyQuery('SELECT `option_name` FROM `'.OPTIONS.'` WHERE `option_id`='.$array_user_order['option_id']);
            $price = PdoM::Instance()->MyQuery('SELECT `price` FROM `'.ITEMS.'` WHERE `item_id`='.$array_user_order['item_id']);
//print_r($price[0]['price']);
            if (is_numeric($price[0]['price'])) {
                $price = $price[0]['price'] * $array_user_order['count'];
            } else {
                $price = $price[0]['price'];
            }
            if (true) {
                $basktets_users[] = [
                    'user_id'     => $array_user_order['user_id'],
                    'name'        => $array_user_order['name'],
                    'item_name'   => $item_name[0]['name'],
                    'option_name' => $option_name[0]['option_name'],
                    'count'       => $array_user_order['count'],
                    'price'       => $price,
                    'basket_id'   => $array_user_order['basket_id']
                ];
            }
        }
//echo '<pre>AdminM->basketsUsers()=$item_name:';
//print_r($item_name);
//echo '</pre>';
        return $basktets_users;
    }
    public static function changeStatus($change_value)
    {
//echo '<pre>AdminM->changeStatus()=$change_value:';
//print_r($change_value);
//echo '</pre>';
        $change_var = $change_value['change'];

        $change_var_arr = explode('_', $change_var);
//echo '<pre>AdminM->changeStatus()=$change_var:<br>';
//var_dump($change_var_arr);
//echo '</pre>';
        $user_name = 'Юзернейм';
        $stat = 'Заказ принят';
        MailM::sendMimeMail('Гостиничный комплекс «Муромская усадьба» ',
                            'https://vk.com/murom_usadba',
                            'Получатель',
                            'mutedalien@yandex.ru',
                            'UTF-8',
                            'UTF-8',
                            'Тема письма',
                            'Текст письма...'
        );
        return $change_var_arr;
    }
    public function loadItem($item_image, $item_image_dir, $item_min_image_dir, $item_name, $item_category, $item_description, $item_price)
    {
        $res = PdoM::Instance() -> Select(GOODS, ITEM_NAME, $item_name, false);
// echo "<pre>";        
// var_dump($res['name']);
// echo "</pre>";
        if ($res[ITEM_NAME] !== $item_name) {
            $object = [
                'image_dir' => $item_image_dir,
                'image_min_dir' => $item_min_image_dir,
                'name' => $item_name,
                'description' => $item_description,
                'price' => $item_price
            ];
// var_dump($object);
            PdoM::Instance() -> Insert(GOODS, $object); 
            if ($this -> uploadImageToServer($item_image, $item_image_dir)) {
                if ($this -> imageZoomOut($item_image_dir, 400, $item_min_image_dir)) {
                    return "Изображение загружено и создана уменьшенная копия.";
                } else {
// var_dump($this -> imageZoomOut($item_image_dir, 400, $item_min_image_dir));
                    return 'Изображение было загружено, но небыла создана уменьшенная копия.';   
                }               
            } else {
                return 'Изображение небыло загружено.';
            }
        } else {
            return "Такое имя позиции уже есть в бд.";
        }
    }
    
    public static function imageZoomOut($original_image_dir, $new_width, $target_image_dir)
    {
        $info = getimagesize($original_image_dir);
        $mime = $info['mime'];
        
        switch ($mime) {
            case 'image/jpeg':
                $image_create_func = 'imagecreatefromjpeg';
                $image_save_func = 'imagejpeg';
                break;
                
            case 'image/png':
                $image_create_func = 'imagecreatefrompng';
                $image_save_func = 'imagepng';
                break;
                
            case 'image/gif':
                $image_create_func = 'imagecreatefromgif';
                $image_save_func = 'imagegif';
                break;
                
            default:
                throw new Exception('Unknown image type.');
        }
        
        $img = $image_create_func($original_image_dir);
        list($width, $height) = getimagesize($original_image_dir);
        
        $new_height = ($height / $width) * $new_width;
        $tmp = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($tmp, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        
        if (file_exists($target_image_dir)) {
            unlink($target_image_dir);
        }
        if ($image_save_func($tmp, "$target_image_dir")) {
            return true;
        }
    }

    public static function uploadImageToServer($uploaded_image, $path_to_dir) 
    {
        if(!is_uploaded_file($uploaded_image['name'])) {
            if ($uploaded_image['size'] < 5000000) { 
                if (move_uploaded_file($uploaded_image['tmp_name'], $path_to_dir)) { 
                    return "Файл корректен и был успешно загружен.\n";
                } else if ($uploaded_image['size'] > 5000000) { 
                    return "Файл небыл загружен, потому что больше 5Мб или уже существует.\n";
                }
            }
        }
    }
}