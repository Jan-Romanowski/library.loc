<?php

global $oUser;

echo '      
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="script.js"></script>
            <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="style1.css">
            <title>Biblioteka Chóru</title>
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Biblioteka Chóru Katedralnego</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav">                
                    ';
if($oUser->isLogin()){
    echo '
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">'.$_SESSION["online_login"].'</a>
                        </li>';

    if($oUser->isGuest()){
        $count = $oUser->getCountDownloads($_SESSION["online_login"]);
        echo '
            <li>
                <a class="nav-link" href="#">Pobrania <span class="badge bg-secondary">'.$count.'</span></a>      
            </li>
            ';
    }

    echo'           <li class="nav-item">
                            <a class="nav-link" href="?section=main">Utwory</a>
                        </li>';
    if($oUser->isAdmin()) {

        echo '<li class="nav-item">
                                     <a class="nav-link" href="?section=folders">Teczki</a>
                                  </li>
                                  <li class="nav-item">
                                     <a class="nav-link" href="?section=users">Użytkowniki</a>
                                  </li>

                                   <li class="nav-item">
                                     <a class="nav-link" href="?section=news">Aktualności</a>
                                   </li>';
        $num = $oUser->countQueries();
        if($num==0){
            $num="";
        }
        echo '
                                   <li>
                                      <a class="nav-link" href="?section=queries">Wnioski <span class="badge bg-secondary">'.$num.'</span></a>      
                                   </li>
                            ';

    }
    echo ' 
                        <li class="nav-item">
                            <a class="nav-link" href="?section=users&action=logout">Wyloguj</a>
                        </li>
                    ';
}
echo '<li class="nav-item">
                                <a class="nav-link" href="?section=info&action=mainpage">Strona Chóru</a>
                              </li>
                           </ul></div></nav>';