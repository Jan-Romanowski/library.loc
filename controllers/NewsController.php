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

			$header = GET::post('header', '');
			$text = GET::post('text', '');

            $author = $_SESSION['name']." ".$_SESSION['surname'];

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
    public function actionView($id){

        User::isModerator();

        if($id){

            $newsItem = array();
            $newsItem = News::getNewsItemById($id);

            require_once(ROOT . '/views/news/newsItem.php');

        }

        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionDelete($id){

        User::isModerator();

        if($id)
            News::deleteNews($id);

        header("Location: /news");

        return true;

    }

    public function actionEditNews($id){

        User::isModerator();

        if($id){

            $newsItem = array();
            $newsItem = News::getNewsItemById($id);

            $header = $newsItem['header'];
            $text = $newsItem['text'];
            $author = $newsItem['autor'];
            $resulf = false;

            if(isset($_POST['submit']) && !empty($_POST['submit'])){

				$header = GET::post('header', '');
				$text = GET::post('text', '');
				$author = GET::post('autor', '');

                $errors = false;

                if(News::checkHeader($header))
                    $errors[] = 'Zadługi nagłówek (Ma byc do 30 symboli)';

                if(News::checkText($text))
                    $errors[] = 'Zadługi tekst (Ma być do 300 symboli)';

                if($errors==false){
                    $result = News::updateNews($id, $header, $text);
                }

            }

        }


        return true;
    }

}
