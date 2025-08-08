<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$Main = &$Page;
?>
<?php
$Page->showMessage();
?>
<?php
include(dirname(__DIR__, 1) . "/app/pages/main.php");
?>
<?= GetDebugMessage() ?>
