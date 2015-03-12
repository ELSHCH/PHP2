<?php
/**
 * Created by PhpStorm.
 * User: shcheki
 * Date: 05.03.2015
 * Time: 18:32
 */
namespace Application\Controllers {

    use Application\Models\News as NewsModel;
    use Application\Classes\E404Exception as E404Exception;

    class News
    {
        public function actionAll()

        {
            $news = NewsModel::findAll();
            $emessages[] = new E404Exception();
            try {
                $art=NewsModel::findOneByColumn('title','Привет');
            } catch (ModelException $e){
                $emessages[]=$e;
                //print message and exit from code
            }

            $mailer =new \PHPMailer();
            $mailer->send();
            //    $art = NewsModel::findOneByColumn('title','Привет');
            //    $art->title ='Новый заголовок';
            //    $art->update();
            //    $art->display('news/all.php');
            //  $art->save();  method save testing
        }
    }
}