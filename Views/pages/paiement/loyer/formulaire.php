<?php require 'Views/layout/head.php' ?>
<?php require 'Views/layout/header.php' ?>
<?php require 'Views/layout/sidebar.php' ?>
<div class="page-wrapper">
    <?php require 'Views/layout/breadcrumb.php' ?>
    <div class="container-fluid m-t-15 m-l-140">
        <div class="col-lg-10 ">
            <div class="card card-outline-primary">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Paiement</h4> 
                </div>
                <div class="card-body">
                    <form   action="#"  method="post">
                        <input type="hidden" name="modifier" value="<?= isset($_GET['modifier'])? $_GET['modifier'] : ''?>"/>
                        <div class="form-body">
                            <h3 class="card-title m-t-15">Paiement Info</h3>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nom</label>
                                        <select  name="nom" class="form-control">
                                            <?php foreach ($paiement as $paiementItem): ?>
                                                <option  value="<?=isset($Details['id'])&&$Details['id']==$paiementItem['ID']?$Details['id']:$paiementItem['ID'] ?>">
                                                <?=isset($Details['Nom'])&&$Details['Nom']==$paiementItem['Nom']?$Details['Nom']:$paiementItem['Nom'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Montant</label>
                                        <input  value="<?=isset($Details['Montant'])? $Details['Montant']:"" ?>" type="text" name="montant" class="form-control">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Date d'ajout</label>
                                        <input  value="<?= isset($Details['Date_paiement'])? $Details['Date_paiement']:"" ?>" type="date" name="date" class="form-control">
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