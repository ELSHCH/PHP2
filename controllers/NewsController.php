<?php
class NewsController
{
    public function actionAll()
    {
        $items = News::getAll();
        $view =new View;
        $view->display('all.php',$items);
    }

    public function actionOne()
    {
        $view = new View;
        $error = new Error;
        $id = $_GET['id'];
        if (false == News::getOne($id)) {
            $error->set_error('Ошибка в передаче из базы данных.');
        } else {
            $item = News::getOne($id);
            $view->display('one.php',$item);

        }
    }
}