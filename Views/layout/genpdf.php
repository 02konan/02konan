<?php
use Dompdf\Dompdf;
require_once 'public/assets/dompdf/vendor/autoload.php';
$dompdf= new Dompdf();
$dompdf->loadHtml('samuel');
$dompdf->render();