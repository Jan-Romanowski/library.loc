<?php

class NewsController{

    public function actionIndex(){

        $newsList = array();
        $newsList = News::getNewsList();

        require_once(ROOT . '/views/news/newsList.php');

        return true;
    }

    public function actionNewItem(){

        $header = '';
        $text = '';
        $author = '';

        if(isset($_POST['submit']) && !empty($_POST['submit'])) {

            $header = $_POST['header'];
            $text = $_POST['text'];
            $author = $_SESSION['surname']." ".$_SESSION['name'];

            $errors = false;

            if(News::checkHeader($header))
                $errors[] = 'Zadługi nagłówek (Ma byc do 30 symboli)';

            if(News::checkText($text))
                $errors[] = 'Zadługi tekst (Ma być do 300 symboli)';

            if($errors==false){
                $result = News::setNewsItem($header, $text, $author);
            }
        }

        require_once(ROOT . '/views/news/newsNewItem.php');

        return true;

    }

    public function actionDelete($id){
        if($id)
            $result = News::deleteNews($id);

        header("Location: /news");

        return true;

    }

}
