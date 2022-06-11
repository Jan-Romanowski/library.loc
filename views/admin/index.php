<?php include(ROOT . '/views/fragments/libraryHeader.php'); ?>

<style>
    .anim{
        cursor: pointer;
    }
    .anim:hover{
        transform: scale(1.1);
        transition: all 0.8s;
    }
</style>

    <div class='container-fluid mt-xs-5 mt-md-3 mx-auto px-1' style='min-height: 100vh'>
        <div class="container-fluid mt-5 pt-5 pt-sm-0 mt-sm-0 mx-auto row justify-content-center">
            <div class="container-fluid col-12 col-md-10 col-lg-8 col-xl-8">
                <h1 class="text-center mb-5">Zarządzanie stroną</h1>
                <div class="row justify-content-center">

                    <div class="container col-sm-12 col-md-6 col-lg-4 p-3">
                        <div class="card anim shadow rounded" style="height: 8rem;" onclick=document.location="/users/view/">
                            <div class="card-body text-center">
                                <br>
                                Użytkownicy
                            </div>
                        </div>
                    </div>


                    <div class="container col-sm-12 col-md-6 col-lg-4 p-3">
                        <div class="card anim shadow rounded" style="height: 8rem;" onclick=document.location="/queries/">
                            <div class="card-body text-center">
                                <br>
                                Wnioski <span
                                  class="badge mx-1 bg-danger"><?php if (Queries::getCountQueries()) echo Queries::getCountQueries(); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="container col-sm-12 col-md-6 col-lg-4 p-3">
                        <div class="card anim shadow rounded" style="height: 8rem;" onclick=document.location="/gallery/index/">
                            <div class="card-body text-center">
                                <br>
                                Galeria
                            </div>
                        </div>
                    </div>

                    <div class="container col-sm-12 col-md-6 col-lg-4 p-3">
                        <div class="card anim shadow rounded" style="height: 8rem;" onclick=document.location="/news/index/">
                            <div class="card-body">
                                <div class="text-center">
                                    <br>
                                    Aktualności
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container col-sm-12 col-md-6 col-lg-4 p-3">
                        <div class="card anim shadow rounded" style="height: 8rem;" onclick=document.location="/achievement/index/">
                            <div class="card-body text-center">
                                <br>
                                Osiągnięcia
                            </div>
                        </div>
                    </div>

                    <div class="container col-sm-12 col-md-6 col-lg-4 p-3">
                        <div class="card anim shadow rounded" style="height: 8rem;" onclick=document.location="/email/index/">
                            <div class="card-body text-center">
                                <br>
                                Email System
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


<?php include(ROOT . '/views/fragments/footer.php');
