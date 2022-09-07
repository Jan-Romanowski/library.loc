<?php include(ROOT . '/views/fragments/libraryHeader.php'); ?>

<style>
    .item{
        cursor: pointer;
    }
</style>

    <div class='container-fluid mt-xs-5 mt-md-3' style='min-height: 100vh'>
        <div class="container-fluid mt-5 mt-sm-2 row justify-content-center">
            <div class="container-fluid col-sm-12 col-md-10 col-lg-8 mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/">Zarządzanie</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lista użytkowników</li>
                    </ol>
                </nav>
                <h1 class="text-center m-5"><strong>Lista użytkowników</strong></h1>

                <form class="row mb-3 mx-auto p-1" action="/users/view/" method="post">
                        <div class="col-sm-10 col-10">

                            <input type="text" id="srch" list="datalistOptions" name="word" class="form-control" placeholder="Szukaj*"
                                   value="<?php if (isset($word)) echo $word; ?>">
                            <!--                        <datalist id="datalistOptions" style="max-height: 100px;">-->
                            <!--                            <option value="Kek"></option>-->
                        </div>
                        <div class="col-sm-2 col-2">
                            <input type="submit" name="submit" class="btn btn-outline-dark" value="Szukaj">
                        </div>
                </form>

                <div class="table-responsive">
                    <table class='table table-hover mx-auto p-3'>
                    <tr class="bg-light">
                        <td>Imię</td>
                        <td>Nazwisko</td>
                        <td>Uprawnienia</td>
                        <td>Ostatni online</td>
                        <td></td>
                    </tr>
                            <?php
                            foreach ($userList as $userListItem): ?>
                      <tr class="item">
                          <td data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $userListItem['id_account'];?>"><?php echo $userListItem['name'] ?></td>
                          <td data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $userListItem['id_account'];?>"><?php echo $userListItem['surname'] ?></td>
                          <td style="color: <?php echo ComFun::rootColor($userListItem['ac_type']); ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $userListItem['id_account'];?>">
                              <?php echo ComFun::translateRights($userListItem['ac_type']); ?>
                          </td>
                            <?php

                            $now = date("Y-m-d H:i:s");

                            $last_online = $userListItem['last_online'];

                            $diff= round((strtotime($now)-strtotime($last_online)));

                            $online = false;

                            if($diff>600){
                                $diff = ComFun::secToStr($diff)." temu";
                                $online = false;
                            }
                            else{
                                $diff = 'Online';
                                $online = true;
                            }
                            ?>
                          <td style="color: <?php if($online){ echo '#3fd12c';}?> " data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $userListItem['id_account'];?>">
                            <?php echo $diff; ?>
                          </td>
                          <td>
                              <button type="button"
                                      class="btn btn-outline-danger <?php if (User::checkRoot('moder')) echo 'disabled'; ?>"
                                      data-bs-toggle="modal"
                                      data-bs-target="#delete<?php echo $userListItem['id_account']; ?>">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                       class="bi bi-trash-fill"
                                       viewBox="0 0 16 16">
                                      <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                  </svg>
                              </button>
                              <div class="modal fade" id="delete<?php echo $userListItem['id_account']; ?>"
                                   data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                   aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="staticBackdropLabel">Uwaga</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                      aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                              <p>
                                                  Napewno chcesz usunąć konto <?php echo $userListItem['name'] . " " . $userListItem['surname']; ?> ?
                                              </p>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn btn-outline-danger w-25"
                                                      onclick=document.location="/users/deleteUser/<?php echo $userListItem['id_account']; ?>">
                                                  Tak
                                              </button>
                                              <button type="button" class="btn btn-outline-success w-25"
                                                      data-bs-dismiss="modal">Nie
                                              </button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </td>
                      </tr>
                        <div class="modal fade" id="staticBackdrop<?php echo $userListItem['id_account'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                             aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Profil - <?php echo $userListItem['name']. " ". $userListItem['surname'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><b class="mx-3">Imie:</b> <?php echo $userListItem['name']; ?></p>
                                        <p><b class="mx-3">Nazwisko:</b> <?php echo $userListItem['surname']; ?></p>
                                        <p><b class="mx-3">Email:</b> <?php echo $userListItem['email']; ?></p>
                                        <p>
                                            <div class="dropdown">
                                            <b class="mx-3">Uprawnienia:</b>
                                                <a style="color: <?php echo ComFun::rootColor($userListItem['ac_type']); ?>" class="btn btn-outline-dark dropdown-toggle <?php if (!User::checkRoot('admin')) echo 'disabled'; ?>"
                                                   href="#"
                                                   role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                   aria-expanded="false">
                                                   <?php echo ComFun::translateRights($userListItem['ac_type']); ?>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <li><a class="dropdown-item" style="color: <?php echo ComFun::rootColor('admin'); ?>"
                                                           href="/users/changeRights/<?php echo $userListItem['id_account']; ?>/admin">Administrator</a>
                                                    </li>
                                                    <li><a class="dropdown-item" style="color: <?php echo ComFun::rootColor('moder'); ?>"
                                                           href="/users/changeRights/<?php echo $userListItem['id_account']; ?>/moder">Moderator</a>
                                                    </li>
                                                    <li><a class="dropdown-item" style="color: <?php echo ComFun::rootColor('user'); ?>"
                                                           href="/users/changeRights/<?php echo $userListItem['id_account']; ?>/user">Użytkownik</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </p>
                                        <p>
                                            <b class="mx-3">Data rejestracji:</b> <?php echo $userListItem['regist_date']; ?><br>
                                        </p>
                                        <p>
                                            <b class="mx-3">Ostatni Online:</b> <label style="color: <?php if($online){ echo '#3fd12c';}?> "><?php echo $diff; ?></label>
                                        </p>
                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        </div>

									<?php endforeach; ?>
                </table>
                </div>
            </div>
        </div>
    </div>

<?php include(ROOT . '/views/fragments/footer.php');