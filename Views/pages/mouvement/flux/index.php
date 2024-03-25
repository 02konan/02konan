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
                            <div class="table-responsive m-t-40">
                                <table id="example23"
                                    class="display nowrap table table-hover table-striped table-bordered"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID_Propriété</th>
                                            <th>Nom</th>
                                            <th>Type</th>
                                            <th>Date</th>
                                            <th>Montant</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($Read as $item): ?>
                                            <tr>
                                                <th>
                                                    <?= $item['ID_Propriété'] ?>
                                                </th>
                                                <th>
                                                    <?= $item['Nom'] ?>
                                                </th>
                                                <th>
                                                    <?= $item['Type'] ?>
                                                </th>
                                                <th>
                                                    <?= $item['Date'] ?>
                                                </th>
                                                <th>
                                                    <?= $item['Montant'] ?>
                                                </th>
                                                <th>
                                                    <a href="/formulaire_flux?modifier=<?= $item['ID'] ?>"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                    <a href="">-</a>
                                                    <a href="?suprimer=<?= $item['ID'] ?>"><i
                                                            class="bi bi-trash-fill"></i></a>
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