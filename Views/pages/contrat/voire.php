<?php require 'Views/layout/head.php' ?>
<?php require 'Views/layout/header.php' ?>
<?php require 'Views/layout/sidebar.php' ?>
<div class="page-wrapper">
    <?php require 'Views/layout/breadcrumb.php' ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div id="invoice" class="effect2">
                    <div id="invoice-top">
                        <div class="invoice-logo"></div>
                        <div class="invoice-info">
                            <h2>john doe</h2>
                            <p> hello@Zebramin.com <br> +8801629599859
                            </p>
                        </div>
                        <!--End Info-->
                        <div class="title">
                            <h4>Contrat #
                                <?= isset ($_GET['vue']) ? $_GET['vue'] : "" ?>
                            </h4>
                            <p>
                                <?= !empty ($vues) ? $vues['Date_de_début'] : "" ?><br>
                                <?= !empty ($vues) ? $vues['Date_de_fin'] : "" ?>
                            </p>
                        </div>
                        <!--End Title-->
                    </div>
                    <!--End InvoiceTop-->



                    <div id="invoice-mid">

                        <div class="clientlogo"></div>
                        <div class="invoice-info">
                            <h2>
                                <?= !empty ($vues) ? $vues['Locataire_Nom'] : "" ?>
                            </h2>
                            <p>
                                <?= !empty ($vues) ? $vues['Adresse'] : "" ?><br>
                                <?= !empty ($vues) ? $vues['Coordonnées'] : "" ?><br>

                        </div>
                    </div>
                    <!--End Invoice Mid-->

                    <div id="invoice-bot">
                        <div id="invoice-table">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr class="tabletitle">
                                        <td class="table-item">
                                            <h2>Propriétés</h2>
                                        </td>
                                        <td class="Hours">
                                            <h2>Nom</h2>
                                        </td>
                                        <td class="Rate">
                                            <h2>Durée</h2>
                                        </td>
                                        <td class="subtotal">
                                            <h2>Total a payer</h2>
                                        </td>
                                    </tr>
                                    <?php if($vues&&$stat):?>
                                    <tr class="service">
                                        <td class="tableitem">
                                            <p class="itemtext">
                                                <?=$vues['Propriété_Nom']?>
                                            </p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">
                                                <?=$vues['Locataire_Nom']  ?>
                                                </p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">
                                                <?=$vues['Durée']?>
                                                mois
                                                </p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">
                                                <?=$vues['Montant']?>
                                                </p>
                                        </td>
                                    </tr>
                                    <tr class="tabletitle">
                                        <td></td>
                                        <td></td>
                                        <td class="Rate">Montant total du contrat</td>
                                        <td class="payment">
                                            <h2><?=$stat['totaux']?></h2>
                                        </td>
                                    </tr>
                                    <?php endif?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'Views/layout/footer.php' ?>
    <?php
