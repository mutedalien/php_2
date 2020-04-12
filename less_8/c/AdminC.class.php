<?php

class AdminC extends BaseC
{
    public function admin()
    {
        $vars = [];
        MyTwigM::myTwigTemplate('admin.twig', $vars);
    }
    public function loadItem()
    {
        $admin = new AdminM();
        $vars = [];
        if ($this -> isPost()) {
            $item_image = $_FILES['item_image'];
            $item_image_dir = IMAGE_DIR . $_FILES['item_image']['name'];
            $item_min_image_dir = MIN_IMAGE_DIR . $_FILES['item_image']['name'];
            $item_name = $_POST['item_name'];
            $item_category = $_POST['item_category'];
            $item_description = $_POST['item_description'];
            $item_price = $_POST['item_price'];
// var_dump($item_name);
            if (!$item_name == "") {
                $vars['return_msg'] = $admin -> loadItem($item_image, $item_image_dir, $item_min_image_dir, $item_name, $item_category, $item_description, $item_price);
// echo '<pre>';
// var_dump($vars);
// echo '</pre>';
            } else {
                $vars['return_msg'] = 'Введите имя загружаемой позиции.';
                unset($item_name); 
// var_dump($item_name);
            }
// var_dump($vars);
        }

        MyTwigM::myTwigTemplate('load_item.twig', $vars);
    }
    public function basketsUsers()
    {
        $basktets_users = AdminM::basketsUsers();
        if ($this->isPost()) {
            $status = AdminM::changeStatus($_POST);
        }
        $vars = [
            'basktets_users' => $basktets_users
        ];
        MyTwigM::myTwigTemplate('baskets_users.twig', $vars);
    }
}