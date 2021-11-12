<?php include(ROOT . '/views/headers/header.php'); ?>

<div class='container gx-3' style='min-height: 100vh';>
    <div class="container-fluid p-3">
        <a class="btn btn-outline-primary" href="newItem">Nowa wiadomość</a>
        <div class="row align-items-start mb-3">

            <?php
                foreach ($newsList as $newsListItem):?>

                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $newsListItem['header']; ?></h5>
                        <p class="card-text"><?php echo $newsListItem['text']; ?></p>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $newsListItem['date_news']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $newsListItem['autor']; ?></h6>
                        <a href="#" class="btn btn-primary">Szczegóły</a>
                        <a href="deleteNews/<?php echo $newsListItem['id_news']; ?>" class="btn btn-primary">Usunąć</a>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>
