<?php

class BasketM
{
public static function addToBasket($object_post)
    {     
//echo '<pre>BasketM - $object_post:';
//print_r($object_post);
//echo '</pre>';
        $where = "`user_id`=" . $_SESSION['user_id'] . " AND `item_id`=" . $object_post['item_id'] . " AND `option_id`=" . $object_post['option_id'];
        $res_query = PdoM::Instance()->Select(BASKETS, $where, true);
        PdoM::Instance()->Delete(BASKETS, $where);
//echo '<pre>BasketM - $res_query:';
//print_r($res_query);
//echo '</pre>';
        unset($_SESSION['basket'][$res_query['basket_id']]);

        $basket_object[$object_post['item_id']] = [
            'item_id' => $object_post['item_id'],
            'count'     => $object_post['count'],
            'option_id' => $object_post['option_id'],
            'user_id'   => $_SESSION['user_id']
        ];
//echo '<pre>BasketM - Объект идущий в бд и в сессию:';
//print_r($basket_object[$object_post['item_id']]);
//echo '</pre>';

        PdoM::Instance()->Insert(BASKETS, $basket_object[$object_post['item_id']]);
//echo '<pre>';
//var_dump($res_add_db);
//echo '</pre>';

        $query = "SELECT * FROM `".BASKETS."` LEFT JOIN `".ITEMS."` ON `".BASKETS."`.`item_id` = `ITEMS`.`item_id` WHERE "."`".BASKETS."`.`item_id`=".$object_post['item_id'];
        $basket_db = PdoM::Instance()->MyQuery($query, true);

        foreach ($basket_db as $ind=>$array) {
//echo '<pre>BasketM - $basket_db:';
//print_r($basket_db);
//echo '</pre>';

            $_SESSION['basket'][$basket_db[$ind]['basket_id']] = [
                'item_id'   => $array['item_id'],
                'item_name' => $array['name'],
                'count'     => $array['count'],
                'option_id' => $array['option_id'],
                'price'     => $array['price']
            ];
        }

    }

    public static function getContentForBasket($basket_session)
    {        
//echo '<pre>BasketM - СЕССИЯ ДО:';
//print_r($basket_session);
//echo '</pre>'; 

        $name_options_by_id = PdoM::Instance()->Select(OPTIONS, true);
//echo '<pre>$name_options_by_id:';
//print_r($name_options_by_id);
//echo '</pre>';

        foreach ($basket_session as $basket_id=>$basket_value) {
            for ($i=0; $i<count($name_options_by_id); $i++) {
                if ($basket_session[$basket_id]['option_id'] == $name_options_by_id[$i]['option_id']) {
                    $basket_session[$basket_id]['option_name'] = $name_options_by_id[$i]['option_name'];
                }
            }
        }
//echo '<pre>КОРЗИНА НА ВЫХОДЕ:';
//print_r($basket_session);
//echo '</pre>'; 
        
        return $basket_session;
    }


    
}