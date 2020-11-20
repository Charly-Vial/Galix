<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace App\Controller;

use App\Model\StoreManager;

/**
 * Class ItemController
 *
 */
class StoreController extends AbstractController {

    public function index() {
        return $this->twig->render('store/store.html.twig');
    }


    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $itemManager = new StoreManager();
            $item = [
                'title' => $_POST['title'],
            ];
            $id = $itemManager->insert($item);
            //header('Location:/item/show/' . $id);
        }

        return $this->twig->render('Item/add.html.twig');
    }


}
