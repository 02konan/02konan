<?php require 'Views/layout/head.php' ?>
<?php require 'Views/layout/header.php' ?>
<?php require 'Views/layout/sidebar.php' ?>
<div id="main-wrapper">
    <div class="page-wrapper">
        <?php require 'Views/layout/breadcrumb.php' ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Export</h4>
                            <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                            <div class="table-responsive m-t-40">
                                <table id="example23"
                                    class="display nowrap table table-hover table-striped table-bordered"
                                    cellspacing="0" width="100%">
                                    <thead class="text-center">
                                            <tr>
                                                <th>Nom d'appart</th>
                                                <th>type d'appart</th>
                                                <th>Adresse</th>
                                                <th>chambre</th>
                                                <th>Satatut</th>
                                                <th>Genre</th>
                                                <th>date</th>
                                                <th>Action</th>
                                            </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php foreach ($locations as $item): ?>
                                            <tr>
                                                <th><?=$item['Nom'] ?></th>
                                                <th><?=$item['Type_insert'] ?></th>
                                                <th><?=$item['Adresse'] ?></th>
                                                <th><?=$item['Chambres'] ?></th>
                                                <th><?=$item['Statut'] ?></th>
                                                <th><?=$item['genre'] ?></th>
                                                <th><?=$item['date_insert'] ?></th>
                                                <th>
                                                <a href="/enregistrement?modifier=<?= $item['ID'] ?>"><i class="bi bi-pencil-square"></i></a>
                                                    <a href="">-</a>
                                                    <a href="?suprimer=<?= $item['ID'] ?>"><i class="bi bi-trash-fill"></i></a>
                                                </th>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'Views/layout/footer.php' ?>