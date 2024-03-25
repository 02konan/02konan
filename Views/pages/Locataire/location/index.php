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
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Adresse</th>
                                            <th>Coordonnées</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php foreach ($Read as $item): ?>
                                            <tr>
                                                <th>
                                                    <?= $item['ID'] ?>
                                                </th>
                                                <th>
                                                    <?= $item['Nom'] ?>
                                                </th>
                                                <th>
                                                    <?= $item['Prenom'] ?>
                                                </th>
                                                <th>
                                                    <?= $item['Adresse'] ?>
                                                </th>
                                                <th>
                                                    <?= $item['Coordonnées'] ?>
                                                </th>
                                                <th>
                                                <a href="/formulaire_locataire?modifier=<?= $item['ID'] ?>"><i class="bi bi-pencil-square"></i></a>
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