<?php
session_start();
class AdminController {
    public function actionAdd()
    {
        $error=new Error();
        if (!empty($_POST)) {
            if (empty($_POST['title']) || empty($_POST['text'])) {
                $error->set_error('Ошибка: Поля новости пустые.');
            } else {
                $res=News::addNew($_POST['id'], $_POST['title'], $_POST['text']);
                if ($res) {
                    header('Location:/index.php');
                } else {
                    $error->set_error('Ошибка при добавлении новости.');
                }
            }
        }
    }
}