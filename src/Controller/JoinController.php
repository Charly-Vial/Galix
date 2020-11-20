<?php

namespace App\Controller;

use App\Model\JoinManager;

class JoinController extends AbstractController
{
    private $joinManager;

    public function __construct()
    {
        parent::__construct();
        $this->joinManager = new JoinManager();
    }
    /**
     * Display item listing
     *
     * @return string
     * @throws \Twig\Error\LoaderErtimeError
     * @throws \Twig\Error\Syror
     * @throws \Twig\Error\RunntaxError
     */
    public function index()
    {
        $joinManager = new JoinManager();
        $soldiers = $joinManager->selectAll();

        return $this->twig->render('Join/index.html.twig', ['soldiers' => $soldiers]);
    }

    public function add()
    {
        $errors = [];
        $name = $password = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $password = trim($_POST['password']);
            if (empty($name)) {
                $errors['name'] = "name required";
            }
            if (empty($password)) {
                $errors['password'] = "password required";
            }
            if (empty($errors)) {
                $joinManager = new JoinManager();
                $soldier = [
                    'name' => $name,
                    'password' => $password,
                ];
                $id = $joinManager->insert($soldier);
                header('Location: /Join/index/' . $id);
            }
        }

        return $this->twig->render('Join/index.html.twig', [
            'errors' => $errors,
            'formData' => [
                'name' => $name,
                'password' => $password,
            ]
        ]);
    }
}
