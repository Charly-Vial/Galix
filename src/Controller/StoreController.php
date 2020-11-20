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
class StoreController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Store/index.html.twig');
    }
}
