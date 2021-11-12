<?php

class NewsController{

    /**
     * @return bool
     */
    public function actionIndex(){

        User::isModerator();

        $newsList = array();
        $newsList = News::getNewsList();

        require_once(ROOT . '/views/news/newsList.php');


        return true;
    }

    /**
     * @return bool
     */
    public function actionNewItem(){

        User::isModerator();

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

    /**
     * @param $id
     * @return bool
     */
    public function actionDelete($id){

        User::isModerator();

        if($id)
            $result = News::deleteNews($id);

        header("Location: /news");

        return true;

    }

}
