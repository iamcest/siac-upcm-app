<?php

class Article extends Routes
{

    public function initView($args = [])
    {
        if (!empty($args['query'])) {
            require_once "models/Articles.php";
            $this->scripts = [
                ['name' => 'lib/moment.min'],
                ['name' => 'article', 'version' => '1.0.0'],
            ];
            $article = new Articles();
            $vars = $article->get_article($args['query']);
            $this->content = new Template("article", $vars);
        }
        $this->title = $vars['title'];

        $this->render();
    }
}
