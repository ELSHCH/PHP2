<?php

namespace Application\Controllers;

    use Application\Models\News as NewsModel;

    class AdminController
    {
        public function actionColumn()
        {
            $column = $_GET['column'];
            $value = $_GET['value'];
            $article = new NewsModel();
            $article->findByColumn($column, $value);
        }

        public function actionUpdate()
        {
            $article = new NewsModel();
            $article->title = 'Привет!';
            $article->text = 'Привет мир!';
            $id = $_GET['id'];
            $col = $_GET['col'];
            $newname = $_GET['newname'];
            $article->update($col, $id, $newname);
        }
        public function actionDelete()
        {
            $id = $_GET['id'];
            $article = new NewsModel();
            $article->delete($id);
        }
        public function actionAdd()
        {
            $article = new NewsModel();
            if (!empty($_POST)) {
                if (empty($_POST['title']) || empty($_POST['text'])) {
                    echo "Ошибка: Поля новости пустые.";
                } else {
                    $res = $article->insert();
                    if ($res) {
                        header('Location:/index.php');
                    } else {
                        echo "Ошибка при добавлении новости";
                    }
                }
            }
        }
}