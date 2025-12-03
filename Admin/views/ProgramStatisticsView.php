<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$ProgramStatisticsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="view">
<form name="fprogram_statisticsview" id="fprogram_statisticsview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { program_statistics: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var fprogram_statisticsview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fprogram_statisticsview")
        .setPageId("view")
        .build();
    window[form.id] = form;
    currentForm = form;
    loadjs.done(form.id);
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="program_statistics">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id"<?= $Page->id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_program_statistics_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id"<?= $Page->id->cellAttributes() ?>>
<span id="el_program_statistics_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->program_id->Visible) { // program_id ?>
    <tr id="r_program_id"<?= $Page->program_id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_program_statistics_program_id"><?= $Page->program_id->caption() ?></span></td>
        <td data-name="program_id"<?= $Page->program_id->cellAttributes() ?>>
<span id="el_program_statistics_program_id">
<span<?= $Page->program_id->viewAttributes() ?>>
<?= $Page->program_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->stat_label->Visible) { // stat_label ?>
    <tr id="r_stat_label"<?= $Page->stat_label->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_program_statistics_stat_label"><?= $Page->stat_label->caption() ?></span></td>
        <td data-name="stat_label"<?= $Page->stat_label->cellAttributes() ?>>
<span id="el_program_statistics_stat_label">
<span<?= $Page->stat_label->viewAttributes() ?>>
<?= $Page->stat_label->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->stat_value->Visible) { // stat_value ?>
    <tr id="r_stat_value"<?= $Page->stat_value->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_program_statistics_stat_value"><?= $Page->stat_value->caption() ?></span></td>
        <td data-name="stat_value"<?= $Page->stat_value->cellAttributes() ?>>
<span id="el_program_statistics_stat_value">
<span<?= $Page->stat_value->viewAttributes() ?>>
<?= $Page->stat_value->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->year->Visible) { // year ?>
    <tr id="r_year"<?= $Page->year->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_program_statistics_year"><?= $Page->year->caption() ?></span></td>
        <td data-name="year"<?= $Page->year->cellAttributes() ?>>
<span id="el_program_statistics_year">
<span<?= $Page->year->viewAttributes() ?>>
<?= $Page->year->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <tr id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_program_statistics_created_at"><?= $Page->created_at->caption() ?></span></td>
        <td data-name="created_at"<?= $Page->created_at->cellAttributes() ?>>
<span id="el_program_statistics_created_at">
<span<?= $Page->created_at->viewAttributes() ?>>
<?= $Page->created_at->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->program_type_id->Visible) { // program_type_id ?>
    <tr id="r_program_type_id"<?= $Page->program_type_id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_program_statistics_program_type_id"><?= $Page->program_type_id->caption() ?></span></td>
        <td data-name="program_type_id"<?= $Page->program_type_id->cellAttributes() ?>>
<span id="el_program_statistics_program_type_id">
<span<?= $Page->program_type_id->viewAttributes() ?>>
<?= $Page->program_type_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
</main>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
