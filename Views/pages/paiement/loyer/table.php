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
                                            <th>Locataire</th>
                                            <th>loyer payer</th>
                                            <th>Montant a payer</th>
                                            <th>rest a payer</th>
                                            <th>Date paiement</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php foreach ($Read as $item): ?>
                                            <tr>
                                                <th>
                                                    <?= $item['Nom'] ?>
                                                </th>
                                                <th>
                                                    <?= $item['loyer_calculer'] ?>
                                                </th>
                                                <th>
                                                    <?= $item['contrat'] ?>
                                                </th>
                                                <th>
                                                    <?= $item['contrat_calculer'] ?>
                                                </th> 
                                                <th>
                                                    <?= $item['Date_paiement'] ?>
                                                </th>
                                                <th class="mx-5">
                                                    <a href="/formulaire_paiement?modifier=<?= $item['ID'] ?>"><i class="bi bi-pencil-square"></i></a>
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