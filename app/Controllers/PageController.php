<?php

namespace App\Controllers;
use App\Models\Page;

class PageController
{
    protected $page;

    public function __construct( Page $page)
    {
        $this->page = $page;
    }

    public function index()
    {
        $pages = $this->page->getAll();

        $pageTitle = 'Pages';
        $pageDescription = 'List of all pages';

        ob_start();
        include __DIR__ . '/../Views/Pages/index.php';
        $content = ob_get_clean();

        include __DIR__ . '/../Views/templates/layout.php';
    }

    public function show($friendly)
    {
        $page = $this->page->getByFriendly($friendly);
//        echo '<pre>'; print_r($page['title']); echo '</pre>';

        if (!$page) {
            http_response_code(404);
            include __DIR__ . '/../Views/templates/error.php';
            exit;
        }

        $pageId = $page['id'];
        $pageFriendly = $page['friendly'];
        $pageTitle = $page['title'];
        $pageDescription = $page['description'];

        ob_start();
        include __DIR__ . '/../Views/Pages/show.php';
        $content = ob_get_clean();

        include __DIR__ . '/../Views/templates/layout.php';
    }
}
