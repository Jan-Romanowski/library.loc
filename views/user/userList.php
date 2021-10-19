<?php include(ROOT . '/views/headers/header.php'); ?>

<div class='container gx-3 mt-5' style='min-height: 100vh'>

    <table class='table table-hover p-3'>
        <tr class="bg-light"><td>Email</td>
            <td>Imię</td>
            <td>Nazwisko</td>
            <td>Typ Konta</td>
            <td>Data rejestracji</td>
        </tr>
        <?php
        foreach ($userList as $userListItem): ?>
            <tr>
                <td><?php echo $userListItem['email'] ?></td>
                <td><?php echo $userListItem['name'] ?></td>
                <td><?php echo $userListItem['surname'] ?></td>

                <td>
                    <div class="dropdown">
                        <a class="btn btn-outline-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo translateRights($userListItem['ac_type']); ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="/user/changeRights/<?php echo $userListItem['id_account']; ?>/admin">Administrator</a></li>
                            <li><a class="dropdown-item" href="/user/changeRights/<?php echo $userListItem['id_account']; ?>/moder">Moderator</a></li>
                            <li><a class="dropdown-item" href="/user/changeRights/<?php echo $userListItem['id_account']; ?>/user">Użytkownik</a></li>
                        </ul>
                    </div>
                </td>
                <td><?php echo $userListItem['regist_date'] ?></td>
            </tr>
        <?php endforeach;  ?>
    </table>


</div>

<?php