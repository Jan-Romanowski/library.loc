<?php include (ROOT.'/views/layouts/header.php'); ?>

<div class='container gx-3 mt-5' style='min-height: 100vh';>
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
                <td><?php echo $userListItem['ac_type'] ?></td>
                <td><?php echo $userListItem['regist_date'] ?></td>
            </tr>
        <?php endforeach;  ?>
    </table>
</div>

<?php