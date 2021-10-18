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
                        <button type="button" class="btn btn-success w-25" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
                                                    <option selected hidden value="guest">Typ konta</option>
                                                    <option value="user">Chórzysta</option>
                                                    <option value="guest">Gość</option>
                                                    <option value="moderator">Moderator</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary w-25">Udostępnić</button>
                                            <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">Confij</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger w-25" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Usunąć
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
                                        <button type="button" class="btn btn-primary w-25" onclick=document.location="/queries/deleteQuery/<?php echo $queriesListItem["id_query"]; ?>">Tak</button>
                                        <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">Nie</button>
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
<?php
