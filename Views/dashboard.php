<?php require_once 'layout/head.php'; ?>
<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/sidebar.php'; ?>
<div class="page-wrapper">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach ($propriete as $item): ?>
                <div class="col-md-3">
                    <a href="locale" class="container">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-home f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>
                                        <?= $item['nbr_p'] ?>
                                    </h2>
                                    <p class="m-b-0">Propriété</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
            <div class="col-md-3">
                <a href="location" class="container">
                    <?php foreach ($locataire as $item): ?>
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>
                                        <?= $item['nbr_l'] ?>
                                    </h2>
                                    <p class="m-b-0">Locataire</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </a>
            </div>
            <?php foreach ($contrat as $item): ?>
                <div class="col-md-3">
                    <a href="contrat" class="container">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-wpforms f-s-40 color-warning"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>
                                        <?= $item['nbr_c'] ?>
                                    </h2>
                                    <p class="m-b-0">Contrat</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
            <?php foreach ($mouvement as $item): ?>
                <div class="col-md-3">
                    <a href="register_mvmnt" class="container">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-area-chart f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>
                                        <?= $item['nbr_m'] ?>
                                    </h2>
                                    <p class="m-b-0">Flux</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <h4>Paiement de loyer</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>payer</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($stat_paiement as $item): ?>
                                        <tr>
                                            <td>
                                                <?= $item['Nom'] ?>
                                            </td>
                                            <td><span class="<?= $item['couleur_etat'] ?>">
                                                    <?= $item['loyer'] ?>
                                                </span></td>
                                            <td><span>
                                                    <?= $item['date'] ?>
                                                </span></td>
                                            <td><span class="badge <?= $item['couleur_statut'] ?>">
                                                    <?= $item['calcule'] ?>
                                                </span></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
            <div class="card">
                <div class="card-title">
                    <h4>Table de Flux</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Genre</th>
                                    <th>Status</th>
                                    <th>Montant</th>
                                </tr>
                            </thead>
                            <?php foreach ($stat_mouvement as $item): ?>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <?= $item['Nom'] ?>
                                        </th>
                                        <td>
                                            <?= $item['genre'] ?>
                                        </td>
                                        <td id="status"><span class="badge <?= $item['badge_statut'] ?>">
                                                <?= $item['statut'] ?>
                                            </span></td>
                                        <td class="<?= $item['couleur_type'] ?>">
                                            <?= $item['Montant'] ?>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<?php require_once 'layout/footer.php'; ?>