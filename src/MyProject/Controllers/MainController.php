<?php
/**
 * Created by PhpStorm.
 * User: sparky
 * Date: 01.09.18
 * Time: 10:15
 */

namespace MyProject\Controllers;

use MyProject\Models\Comments\Comment;
use MyProject\Models\Articles\Article;
use MyProject\Models\Categories\Category;
use MyProject\Models\Pagination\Pagination;
use MyProject\Models\Tags\Tag;
use MyProject\Services\UsersAuthService;
use MyProject\View\View;

class MainController extends AbstractController
{
    public function main()
    {
        // Main page data
        $articles = Article::getAll();
        $featuredArticles = Article::getLastArticles(3);
        $featuredArticleBig = array_shift($featuredArticles);

        $this->view->renderHtml('main/main.php', [
            'title' => 'Kiev underground!',
            'articles' => $articles,
            'featuredArticles' => $featuredArticles,
            'featuredArticleBig' => $featuredArticleBig,
        ]);
    }
}