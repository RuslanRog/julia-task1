<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\PageController;
use App\Models\Page;

class PagesControllerTest extends TestCase
{
    protected $controller;
    protected $model;

    protected function setUp(): void
    {
        $pdo = new PDO('mysql:host=localhost;dbname=julia_task_one', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->model = new Page($pdo);

        $this->controller = new PageController($this->model);
    }

    public function testIndex()
    {
        $response = $this->controller->index();
        $this->assertStringContainsString('<h1>Pages</h1>', $response);
    }

    public function testShow()
    {
        $response = $this->controller->show('about');
        $this->assertStringContainsString('<h1>About Us</h1>', $response);
    }
}
