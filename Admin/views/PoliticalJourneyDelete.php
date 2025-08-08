<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$PoliticalJourneyDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { political_journey: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fpolitical_journeydelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fpolitical_journeydelete")
        .setPageId("delete")
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
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpolitical_journeydelete" id="fpolitical_journeydelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="political_journey">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid <?= $Page->TableGridClass ?>">
<div class="card-body ew-grid-middle-panel <?= $Page->TableContainerClass ?>" style="<?= $Page->TableContainerStyle ?>">
<table class="<?= $Page->TableClass ?>">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_political_journey_id" class="political_journey_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->position_title->Visible) { // position_title ?>
        <th class="<?= $Page->position_title->headerCellClass() ?>"><span id="elh_political_journey_position_title" class="political_journey_position_title"><?= $Page->position_title->caption() ?></span></th>
<?php } ?>
<?php if ($Page->start_year->Visible) { // start_year ?>
        <th class="<?= $Page->start_year->headerCellClass() ?>"><span id="elh_political_journey_start_year" class="political_journey_start_year"><?= $Page->start_year->caption() ?></span></th>
<?php } ?>
<?php if ($Page->end_year->Visible) { // end_year ?>
        <th class="<?= $Page->end_year->headerCellClass() ?>"><span id="elh_political_journey_end_year" class="political_journey_end_year"><?= $Page->end_year->caption() ?></span></th>
<?php } ?>
<?php if ($Page->duration_display->Visible) { // duration_display ?>
        <th class="<?= $Page->duration_display->headerCellClass() ?>"><span id="elh_political_journey_duration_display" class="political_journey_duration_display"><?= $Page->duration_display->caption() ?></span></th>
<?php } ?>
<?php if ($Page->is_current->Visible) { // is_current ?>
        <th class="<?= $Page->is_current->headerCellClass() ?>"><span id="elh_political_journey_is_current" class="political_journey_is_current"><?= $Page->is_current->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
        <th class="<?= $Page->created_at->headerCellClass() ?>"><span id="elh_political_journey_created_at" class="political_journey_created_at"><?= $Page->created_at->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while ($Page->fetch()) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = RowType::VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->CurrentRow);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id->Visible) { // id ?>
        <td<?= $Page->id->cellAttributes() ?>>
<span id="">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->position_title->Visible) { // position_title ?>
        <td<?= $Page->position_title->cellAttributes() ?>>
<span id="">
<span<?= $Page->position_title->viewAttributes() ?>>
<?= $Page->position_title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->start_year->Visible) { // start_year ?>
        <td<?= $Page->start_year->cellAttributes() ?>>
<span id="">
<span<?= $Page->start_year->viewAttributes() ?>>
<?= $Page->start_year->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->end_year->Visible) { // end_year ?>
        <td<?= $Page->end_year->cellAttributes() ?>>
<span id="">
<span<?= $Page->end_year->viewAttributes() ?>>
<?= $Page->end_year->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->duration_display->Visible) { // duration_display ?>
        <td<?= $Page->duration_display->cellAttributes() ?>>
<span id="">
<span<?= $Page->duration_display->viewAttributes() ?>>
<?= $Page->duration_display->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->is_current->Visible) { // is_current ?>
        <td<?= $Page->is_current->cellAttributes() ?>>
<span id="">
<span<?= $Page->is_current->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($Page->is_current->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
</span>
</td>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
        <td<?= $Page->created_at->cellAttributes() ?>>
<span id="">
<span<?= $Page->created_at->viewAttributes() ?>>
<?= $Page->created_at->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
}
$Page->Recordset?->free();
?>
</tbody>
</table>
</div>
</div>
<div class="ew-buttons ew-desktop-buttons">
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
