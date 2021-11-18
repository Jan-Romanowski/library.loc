<?php include(ROOT . '/views/headers/header.php');?>

<div class="container-fluid w-50" style="min-height: 100vh;">
    <h2 class="text-center mb-3 mt-2">Wnioski o rejestrację</h2>


    <?php

    if(Queries::getCountQueries()==0){
        ?>
            <h3 class="text-center mb-3">Nie ma wniosków</h3>
        <?php
    }
        foreach ($queriesList as $queriesListItem):
    ?>
            <div class="card mb-3">
                <h5 class="card-header bg-dark" style="color: white">Wniosek</h5>
                <div class="card-body bg-light">
                    <h5 class="card-title"><?php echo $queriesListItem["name"].' '.$queriesListItem["surname"]; ?></h5>
                    <h6 class="card-text ">Email: <?php echo $queriesListItem["email"]; ?></h6>
                    <h6 class="card-text ">Data: <?php echo $queriesListItem["regist_date"]; ?></h6>
                    <div class="container text-center mt-4">
                        <button type="button" class="btn btn-outline-success w-25" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Akceptować
                        </button>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="/queries/transferQuery/<?php echo $queriesListItem["id_query"]; ?>" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Wniosek o rejestracje - <?php echo $queriesListItem["name"].' '.$queriesListItem["surname"]; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Zaznacz typ konta
                                            <div class="text-center mt-3">
                                                <select class="form-select mb-3" name="ac_type" aria-label=".form-select-lg example">
                                                    <option selected value="user">Użytkownik</option>
                                                    <?php if(User::checkRoot("admin")){ ?> <option value="moder">Moderator</option><option value="admin">Administrator</option> <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-outline-success w-25">Udostępnić</button>
                                            <button type="button" class="btn btn-outline-secondary w-25" data-bs-dismiss="modal">Confij</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-danger w-25" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Usunąć
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill"
                                 viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Napewno chcesz usunąć ten wniosek ?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger w-25" onclick=document.location="/queries/deleteQuery/<?php echo $queriesListItem["id_query"]; ?>">
                                            Tak
                                        </button>
                                        <button type="button" class="btn btn-outline-success w-25" data-bs-dismiss="modal">Nie</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    <?php
            endforeach;
    ?>
</div>
<?php include(ROOT . '/views/headers/footer.php');
