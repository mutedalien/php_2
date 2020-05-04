<?php

class CatalogC extends BaseC
{
	public function getCatalog()
        {
		$catalog      = new CatalogM();
		$items_arrays = $catalog->getCatalog();

		$this->title .= " | Каталог";

//echo '<pre>CatalogC - $items_arrays:';
//print_r($items_arrays);
//echo '</pre>';
		if ($this->isPost()) {
            $res_add = BasketM::addToBasket($_POST);
		}
            foreach ($items_arrays as $option_array) {
                $vars = array(
                    'array_items'    => $option_array,
                    'title_options'  => TITLE_OPTIONS,
                    'value_option_a' => VALUE_OPTION_A, 
                    'value_option_b' => VALUE_OPTION_B, 
                    'name_option_a'  => NAME_OPTION_A,
                    'name_option_b'  => NAME_OPTION_B,
                    'buy'            => BUY
                );
                MyTwigM::myTwigTemplate('catalog.twig', $vars);
            }
//echo "<pre>CatalogC - Сессия:";
//print_r($_SESSION);
//echo "</pre>";
//echo "<pre>CatalogC - Пост:";
//print_r($_POST);
//echo "</pre>";
//echo '<pre>CatalogC - $vars:';	
//print_r($vars);
//echo '</pre>';
//// print_r($_SERVER);
//unset($_SESSION['basket']);
	}
}