<?php include(ROOT . '/views/fragments/header.php'); ?>

<div class='container-fluid mt-xs-5 mt-md-3 mx-auto px-1' style='min-height: 100vh'>
    <div class="container-fluid mt-5 pt-5 pt-sm-0 mt-sm-0 mx-auto row justify-content-center">
        <div class="container-fluid col-12 col-md-10 col-lg-8 col-xl-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/">Zarządzanie</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Aktualnośći</li>
                </ol>
            </nav>
            <h1 class="text-center mb-5"><strong>Aktualności</strong></h1>
        <a class="btn btn-outline-dark mb-3" href="/news/newItem/">Nowa wiadomość</a>
        <div class="row row-cols-1 row-cols-md-3 g---4">

            <?php
                foreach ($newsList as $newsListItem):?>

                    <div class="col">
                        <div class="card h-100">
<!--                            <img src="..." class="card-img-top" alt="...">-->
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $newsListItem['header']; ?></h5>
                                <p class="card-text text-truncate" style="max-height: 100px;"><?php echo $newsListItem['text']; ?></p>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $newsListItem['date_news']; ?></h6>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $newsListItem['autor']; ?></h6>
                                <a href="/news/view/<?php echo $newsListItem['id_news']; ?>" class="btn btn-outline-info">Szczegóły</a>

                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $newsListItem['id_news']; ?>">
                                    Usunąć
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill"
                                         viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </button>
                                <div class="modal fade" id="staticBackdrop<?php echo $newsListItem['id_news']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Napewno chcesz usunąć ten post ?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger w-25"
                                                        onclick=document.location="/news/delete/<?php echo $newsListItem['id_news']; ?>">Tak
                                                </button>
                                                <button type="button" class="btn btn-outline-success w-25" data-bs-dismiss="modal">Nie</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<!--                                <a href="/news/deleteNews/--><?php //echo $newsListItem['id_news']; ?><!--" class="btn btn-primary">Usunąć</a>-->
                            </div>
                        </div>
                    </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>
    </div>
<?php include(ROOT . '/views/fragments/footer.php');
