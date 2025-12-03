<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$Dashboard2 = &$Page;
?>
<?php
$Page->showMessage();
?>
<?php
include(dirname(__DIR__, 1) . "/app/pages/dashboard.php");
?>
<?= GetDebugMessage() ?>
