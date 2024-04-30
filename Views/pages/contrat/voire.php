<?php
require_once 'vendor/autoload.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$html = '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrat de Location</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .section {
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 10px;
        }
        .signature p {
            margin: 0;
        }
    </style>
</head>
<body>
    <h1>Contrat de Location de Propriété Immobilière</h1>
    <div class="section">
        <h2>Entre :</h2>
        <p>Le propriétaire :<br>
            [Nom du propriétaire]<br>
            [Adresse du propriétaire]<br>
            [Numéro de téléphone du propriétaire]<br>
            [Adresse e-mail du propriétaire]</p>
        <p>Et le locataire :<br>
            [Nom du locataire]<br>
            [Adresse du locataire]<br>
            [Numéro de téléphone du locataire]<br>
            [Adresse e-mail du locataire]</p>
    </div>
    <div class="section">
        <h2>Objet :</h2>
        <p>Le présent contrat a pour objet de définir les conditions de location d\'un bien immobilier situé à [Adresse de la propriété], ci-après dénommé le « Bien ».</p>
    </div>
    <div class="section">
        <h2>Désignation du Bien :</h2>
        <p>Le Bien loué est un(e) [type de bien] comprenant [nombre de pièces], situé à l\'adresse suivante : [Adresse complète du Bien].</p>
    </div>
    <div class="section">
        <h2>Durée de la location :</h2>
        <p>La durée de la présente location est de [durée de la location] à compter du [date de début] jusqu\'au [date de fin].</p>
    </div>
    <div class="section">
        <h2>Montant du loyer :</h2>
        <p>Le montant du loyer mensuel est fixé à [montant du loyer en chiffres] (X.XXX,XX €) payable chaque mois, le [numéro du jour] jour du mois suivant.</p>
    </div>
    <div class="section">
        <h2>Dépôt de garantie :</h2>
        <p>Un dépôt de garantie d\'un montant de [montant du dépôt de garantie en chiffres] (X.XXX,XX €) est versé par le locataire au propriétaire à titre de garantie pour l\'exécution des obligations du locataire. Ce dépôt sera restitué au locataire dans un délai de [nombre de jours] jours après la fin du contrat, déduction faite des éventuelles dettes ou dégradations constatées.</p>
    </div>
    <div class="section">
        <h2>Charges locatives :</h2>
        <p>Les charges locatives telles que [énumération des charges], sont à la charge du locataire et s\'ajouteront au montant du loyer mensuel.</p>
    </div>
    <div class="section">
        <h2>Usage du Bien :</h2>
        <p>Le Bien est destiné à un usage exclusivement [usage résidentiel ou commercial], conformément aux lois et règlements en vigueur.</p>
    </div>
    <div class="section">
        <h2>État des lieux :</h2>
        <p>Un état des lieux contradictoire sera établi à l\'entrée et à la sortie du locataire. Tout manquement ou dégradation constaté lors de l\'état des lieux de sortie sera imputé au locataire et pourra donner lieu à une retenue sur le dépôt de garantie.</p>
    </div>
    <div class="section">
        <h2>Résiliation du contrat :</h2>
        <p>En cas de résiliation anticipée du contrat par le locataire, celui-ci devra notifier sa décision au propriétaire par lettre recommandée avec accusé de réception, conformément à la législation en vigueur.</p>
    </div>
    <div class="section">
        <h2>Loi applicable et litiges :</h2>
        <p>Le présent contrat est régi par la loi du pays où se situe le Bien loué. En cas de litige, les parties s\'engagent à rechercher une solution amiable. À défaut, tout différend relatif à l\'interprétation ou à l\'exécution du présent contrat sera soumis à la compétence exclusive des tribunaux du lieu de situation du Bien loué.</p>
    </div>
    <p>Fait en deux exemplaires, à [lieu], le [date].</p>
    <div class="signature">
        <p>Le propriétaire</p>
        <p>[Nom du propriétaire et signature]</p>
    </div>
    <div class="signature">
        <p>Le locataire</p>
        <p>[Nom du locataire et signature]</p>
    </div>
</body>
</html>
';
$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream('contratdeloction.pdf');


