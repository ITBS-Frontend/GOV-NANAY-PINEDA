<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$PoliticalJourneyView = &$Page;
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
<form name="fpolitical_journeyview" id="fpolitical_journeyview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { political_journey: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var fpolitical_journeyview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fpolitical_journeyview")
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
<input type="hidden" name="t" value="political_journey">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id"<?= $Page->id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_political_journey_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id"<?= $Page->id->cellAttributes() ?>>
<span id="el_political_journey_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->position_title->Visible) { // position_title ?>
    <tr id="r_position_title"<?= $Page->position_title->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_political_journey_position_title"><?= $Page->position_title->caption() ?></span></td>
        <td data-name="position_title"<?= $Page->position_title->cellAttributes() ?>>
<span id="el_political_journey_position_title">
<span<?= $Page->position_title->viewAttributes() ?>>
<?= $Page->position_title->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->start_year->Visible) { // start_year ?>
    <tr id="r_start_year"<?= $Page->start_year->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_political_journey_start_year"><?= $Page->start_year->caption() ?></span></td>
        <td data-name="start_year"<?= $Page->start_year->cellAttributes() ?>>
<span id="el_political_journey_start_year">
<span<?= $Page->start_year->viewAttributes() ?>>
<?= $Page->start_year->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->end_year->Visible) { // end_year ?>
    <tr id="r_end_year"<?= $Page->end_year->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_political_journey_end_year"><?= $Page->end_year->caption() ?></span></td>
        <td data-name="end_year"<?= $Page->end_year->cellAttributes() ?>>
<span id="el_political_journey_end_year">
<span<?= $Page->end_year->viewAttributes() ?>>
<?= $Page->end_year->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->duration_display->Visible) { // duration_display ?>
    <tr id="r_duration_display"<?= $Page->duration_display->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_political_journey_duration_display"><?= $Page->duration_display->caption() ?></span></td>
        <td data-name="duration_display"<?= $Page->duration_display->cellAttributes() ?>>
<span id="el_political_journey_duration_display">
<span<?= $Page->duration_display->viewAttributes() ?>>
<?= $Page->duration_display->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <tr id="r_description"<?= $Page->description->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_political_journey_description"><?= $Page->description->caption() ?></span></td>
        <td data-name="description"<?= $Page->description->cellAttributes() ?>>
<span id="el_political_journey_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->is_current->Visible) { // is_current ?>
    <tr id="r_is_current"<?= $Page->is_current->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_political_journey_is_current"><?= $Page->is_current->caption() ?></span></td>
        <td data-name="is_current"<?= $Page->is_current->cellAttributes() ?>>
<span id="el_political_journey_is_current">
<span<?= $Page->is_current->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($Page->is_current->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <tr id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_political_journey_created_at"><?= $Page->created_at->caption() ?></span></td>
        <td data-name="created_at"<?= $Page->created_at->cellAttributes() ?>>
<span id="el_political_journey_created_at">
<span<?= $Page->created_at->viewAttributes() ?>>
<?= $Page->created_at->getViewValue() ?></span>
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
