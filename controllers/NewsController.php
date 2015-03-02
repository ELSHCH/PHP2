<?php
class NewsController
{
    public function actionAll()
    {
        $news = News::getAll();
        $view = new View;
        $view->items =$news;
        $view->display('news/all.php');
    }

    public function actionOne()
    {
        $view = new View;
        $id = $_GET['id'];
        $item = News::getOne($id);
        $view->items =$item;
        $view->display('news/one.php');
    }
}