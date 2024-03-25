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
                                    <thead class="text-center">
                                        <tr>
                                            <th>Propriété</th>
                                            <th>Locataire</th>
                                            <th>Type</th>
                                            <th>Durée</th>
                                            <th>Montant</th>
                                            <th>Date_d</th>
                                            <th>Date_f</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php foreach ($Read as $item): ?>
                                            <tr>
                                                <th>
                                                    <?= $item['Propriété_Nom'] ?>
                                                </th>
                                                <th>
                                                    <?= $item['Locataire_Nom'] ?>
                                                </th>
                                                <th>
                                                    <?= $item['Type'] ?>
                                                </th>
                                                <th>
                                                    <?= $item['Durée'] ?>
                                                </th>
                                                <th>
                                                    <?= $item['Montant'] ?>
                                                </th>
                                                <th>
                                                    <?= $item['Date_de_début'] ?>
                                                </th>
                                                <th>
                                                    <?= $item['Date_de_fin'] ?>
                                                </th> 
                                                <th class="mx-5">
                                                    <a href="/formulaire_contrat?modifier=<?= $item['ID'] ?>"><i class="bi bi-pencil-square"></i></a>
                                                    <a href="/voire?vue=<?= $item['ID'] ?>"><i class="bi bi-eye-fill"></i></a>
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