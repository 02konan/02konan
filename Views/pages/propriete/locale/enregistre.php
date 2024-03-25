<?php require 'Views/layout/head.php' ?>
<?php require 'Views/layout/header.php' ?>
<?php require 'Views/layout/sidebar.php' ?>
<div class="page-wrapper">
<?php require 'Views/layout/breadcrumb.php' ?>

<div class="container-fluid m-t-15 m-l-140">
<div class="col-lg-10 ">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Enregistrement d'une propriete</h4>
        </div>
        <div class="card-body">
            <form action="#" method="post">
                <div class="form-body">
                    <h3 class="card-title m-t-15">Propriete Info</h3>
                    <input type="hidden" value="<?=isset($_GET["modifier"])?$_GET["modifier"]:""?>" name="" id="">
                    <hr>
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nom</label>
                                <input value="<?=isset($details['Nom'])?$details['Nom']:""?>" type="text" name="Nom" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-danger">
                                <label class="control-label">Emplacement</label>
                                <input value="<?=isset($details['Adresse'])?$details['Adresse']:""?>" type="text" name="adresse" class="form-control form-control-danger"
                                >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nombres de chambres</label>
                                <input value="<?=isset($details['Chambres'])?$details['Chambres']:""?>" type="text" name="chambres" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-danger">
                                <label class="control-label">Statut</label>
                                <input value="<?=isset($details['Statut'])?$details['Statut']:""?>" type="text" name="statut" class="form-control form-control-danger"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Genre</label>
                                <select name="genre" class="form-control custom-select">
                                    <option value="<?=isset($details['Statut'])?$details['Statut']:"appartement"?>">Appartement</option>
                                    <option value="<?=isset($details['Statut'])?$details['Statut']:"Magasin"?>">Magasin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Type de Propriete</label>
                                <input value="<?=isset($details['Type_insert'])?$details['Type_insert']:""?>" type="text" name="type_insert" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Date d'ajout</label>
                                <input value="<?=isset($details['date_insert'])?$details['date_insert']:""?>"  type="date" name="date_insert" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <button name="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                    <button type="reset" class="btn btn-inverse">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


</div>
</div>
<?php require 'Views/layout/footer.php' ?>