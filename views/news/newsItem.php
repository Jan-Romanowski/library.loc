<?php include(ROOT . '/views/headers/header.php'); ?>

    <div class='container gx-3' style='min-height: 100vh';>
        <div class="container-fluid p-3">
            <div class="row align-items-start mb-3">

                    <div class="card m-2" >
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $newsItem['header']; ?></h5>
                            <p class="card-text"><?php echo $newsItem['text']; ?></p>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $newsItem['date_news']; ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $newsItem['autor']; ?></h6>
                            <a href="deleteNews/<?php echo $newsItem['id_news']; ?>" class="btn btn-primary">Usunąć</a>
                        </div>
                    </div>

            </div>
        </div>
    </div>
<?php
