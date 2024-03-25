<?php require 'Views/layout/head.php' ?>
<?php require 'Views/layout/header.php' ?>
<?php require 'Views/layout/sidebar.php' ?>
<div class="page-wrapper">
    <?php require 'Views/layout/breadcrumb.php' ?>
    <div class="container-fluid m-t-15 m-l-140">
        <div class="col-lg-10 ">
            <div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card card-outline-primary">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Enregistrement d'une Depense </h4>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-body">
                            <h3 class="card-title m-t-15">Depense Info</h3>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nom</label>
                                        <select class="form-control" name="nom_p" id="">
                                            <?php foreach ($InsertIdprop as $item): ?>
                                                <option value="<?= !empty($Detail)&&$Detail['ID']==$item['ID']?$Detail['ID']:$item['ID']?>">
                                                    <?= !empty($Detail)&&$Detail['Nom']==$item['Nom']?$Detail['Nom']:$item['Nom'] ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                        <label class="control-label">Type</label>
                                        <select class="form-control" name="type">
                                            <option value="<?= !empty($Detail)?$Detail['Type']:"Entrée" ?>" >Entrée</option>
                                            <option value="<?= !empty($Detail)?$Detail['Type']:"Sortie" ?>">Sortie</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Date</label>
                                        <input value="<?= !empty($Detail)?$Detail['Date']:"" ?>" type="Date" name="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                        <label class="control-label">Montant</label>
                                        <input value="<?= !empty($Detail)?$Detail['Montant']:""?>" type="text" name="montant" class="form-control form-control-danger">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" name="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                Save</button>
                            <button type="button" class="btn btn-inverse">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
<?php require 'Views/layout/footer.php' ?>