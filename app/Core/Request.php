<?php

namespace App\Core;
class Request
{
    private array $get;
    private array $post;
    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
    }

    public function getPage(): int
    {
        $page = (int) ($_GET['page'] ?? 1);
        return $page;
    }

    public function getId(): int
    {
        $id = (int) $_GET['id'];
        return $id;
    }
}