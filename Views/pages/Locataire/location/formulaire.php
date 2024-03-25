<?php require 'Views/layout/head.php' ?>
<?php require 'Views/layout/header.php' ?>
<?php require 'Views/layout/sidebar.php' ?>
<div class="page-wrapper">
<?php require 'Views/layout/breadcrumb.php' ?>
<div class="container-fluid m-t-15 m-l-140">
    <div class="col-lg-10 ">
        <div class="card card-outline-primary">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Enregistrement d'un locataire</h4>
            </div>
            <div class="card-body">
                <form action="#" method="post">
                    <div class="form-body">
                        <h3 class="card-title m-t-15">Person Info</h3>
                        <hr>
                        <div class="row p-t-20">
                            <input type="hidden" value="<?= isset($_GET['modifier'])? $_GET['modifier']:"" ?>">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nom</label>
                                    <input type="text" value="<?= isset($details['Nom'])? $details['Nom']:"" ?>" name="Nom" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-danger">
                                    <label class="control-label">prenom</label>
                                    <input type="text" value="<?= isset($details['Prenom'])? $details['Prenom']:"" ?>" name="Prenom" class="form-control form-control-danger">
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label class="control-label">Adresse</label>
                                    <input type="text" value="<?= isset($details['Adresse'])? $details['Adresse']:"" ?>" name="adresse" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-danger">
                                    <label class="control-label">Numero</label>
                                    <input type="text" value="<?= isset($details['Coordonnées'])? $details['Coordonnées']:"" ?>" name="Numero" class="form-control form-control-danger">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                        <button type="reset" class="btn btn-inverse">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php require 'Views/layout/footer.php' ?>