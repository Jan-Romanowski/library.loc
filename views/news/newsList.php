<?php include(ROOT . '/views/headers/header.php'); ?>

<div class='container gx-3' style='min-height: 100vh';>
    <div class="container-fluid p-3">
        <a class="btn btn-outline-dark mb-3" href="newItem">Nowa wiadomość</a>
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <?php
                foreach ($newsList as $newsListItem):?>

                    <div class="col">
                        <div class="card h-100">
<!--                            <img src="..." class="card-img-top" alt="...">-->
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $newsListItem['header']; ?></h5>
                                <p class="card-text"><?php echo $newsListItem['text']; ?></p>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $newsListItem['date_news']; ?></h6>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $newsListItem['autor']; ?></h6>
                                <a href="view/<?php echo $newsListItem['id_news']; ?>" class="btn btn-primary">Szczegóły</a>
                                <a href="deleteNews/<?php echo $newsListItem['id_news']; ?>" class="btn btn-primary">Usunąć</a>
                            </div>
                        </div>
                    </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>
