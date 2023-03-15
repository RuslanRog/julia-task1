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
        $this->model = $this->createMock(Page::class);
        $this->controller = new PageController($this->model);
    }

    public function testIndex()
    {
        $this->model->expects($this->once())
            ->method('getAll')
            ->willReturn([
                ['id' => 1, 'friendly' => 'about', 'title' => 'About Us', 'description' => 'Learn more about our company'],
                ['id' => 2, 'friendly' => 'contact', 'title' => 'Contact Us', 'description' => 'Get in touch with us'],
            ]);

        ob_start();
        $this->controller->index();
        $output = ob_get_clean();

        $this->assertStringContainsString('<h1>Pages</h1>', $output);
        $this->assertStringContainsString('<li><a href="/pages/about">About Us</a></li>', $output);
        $this->assertStringContainsString('<li><a href="/pages/contact">Contact Us</a></li>', $output);
    }

    public function testShow()
    {
        $this->model->expects($this->once())
            ->method('getByFriendly')
            ->with($this->equalTo('about'))
            ->willReturn(['id' => 1, 'friendly' => 'about', 'title' => 'About Us', 'description' => 'Learn more about our company']);

        ob_start();
        $this->controller->show('about');
        $output = ob_get_clean();

        $this->assertStringContainsString('<h1>About Us</h1>', $output);
        $this->assertStringContainsString('<p>Learn more about our company</p>', $output);
    }

    public function testShowNotFound()
    {
        $this->model->expects($this->once())
            ->method('getByFriendly')
            ->with($this->equalTo('notfound'))
            ->willReturn(null);

        $this->expectOutputString('404 Page Not Found');

        $this->controller->show('notfound');
    }
}
