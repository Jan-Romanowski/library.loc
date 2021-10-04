<?php include (ROOT.'/views/layouts/header.php'); ?>

<div class="container p-3 gx-5 w-25">
    <table class='table table-hover'>
        <tr class="bg-light"><td>Nazwa teczki</td>
        </tr>
        <?php
        foreach ($foldersList as $foldersListItem): ?>
            <tr>
                <td><?php echo $foldersListItem['name_folder'] ?></td>
            </tr>
        <?php endforeach;  ?>
    </table>
</div>
<?php