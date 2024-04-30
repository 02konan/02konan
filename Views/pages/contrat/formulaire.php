<?php require 'Views/layout/head.php' ?>
<?php require 'Views/layout/header.php' ?>
<?php require 'Views/layout/sidebar.php' ?>
<div class="page-wrapper">
    <?php require 'Views/layout/breadcrumb.php' ?>
    <div class="container-fluid m-t-15 m-l-140">
        <div class="col-lg-10 ">
            <div class="card card-outline-primary">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Enregistrement d'un contrat</h4>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-body">
                            <h3 class="card-title m-t-15">contrat Info</h3>
                            <input type="hidden" value="<?= isset($_GET['modifier'])? $_GET['modifier']:"" ?>">
                            <hr>
                            <div class="row p-t-20">    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nom de la Propriete</label>
                                        <select name="Nompropriete" class="form-control" id="">
                                            <?php foreach ($InsertIdprop as $item): ?>
                                                <option value="<?=$item["ID"] ?>">
                                                <?=$item["Nom"] ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Durée</label>
                                        <input  value="<?= isset($Details['Durée'])?$Details['Durée']:"" ?>" type="text"  name="duree" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Date de debut</label>
                                        <input value="<?= isset($Details['Date_de_début'])?$Details['Date_de_début']:"" ?>" type="date"  name="date_d" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nom du Locataire</label>

                                        <select name="Nomlocataire" class="form-control" id="">
                                            <?php foreach ($InsertIdloc as $item): ?>
                                                <option value="<?= !empty($Details) && $Details['ID_Locataire']==$item["ID"]?$Details['ID']:$item["ID"] ?>">
                                                <?= !empty($Details) && $Details['Locataire_Nom']==$item["Nom"]?$Details['Locataire_Nom']:$item["Nom"] ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Montant</label>
                                        <input value="<?= isset($Details['Montant'])?$Details['Montant']:"" ?>" type="text" name="Montant" class="form-control form-control-danger">

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Date de fin</label>
                                        <input value="<?= isset($Details['Date_de_fin'])?$Details['Date_de_fin']:"" ?>" type="date"  name="date_f" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Type de contrat</label>
                                        <select name="type" class="form-control">
                                            <option value="<?= isset($Details['Type'])?$Details['Type']:"" ?>">
                                            <?= isset($Details['Type'])?$Details['Type']:"" ?></option>
                                        </select>
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