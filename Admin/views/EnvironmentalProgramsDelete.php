<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$EnvironmentalProgramsDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { environmental_programs: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fenvironmental_programsdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fenvironmental_programsdelete")
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
<form name="fenvironmental_programsdelete" id="fenvironmental_programsdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="environmental_programs">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_environmental_programs_id" class="environmental_programs_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->program_name->Visible) { // program_name ?>
        <th class="<?= $Page->program_name->headerCellClass() ?>"><span id="elh_environmental_programs_program_name" class="environmental_programs_program_name"><?= $Page->program_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->program_type->Visible) { // program_type ?>
        <th class="<?= $Page->program_type->headerCellClass() ?>"><span id="elh_environmental_programs_program_type" class="environmental_programs_program_type"><?= $Page->program_type->caption() ?></span></th>
<?php } ?>
<?php if ($Page->coverage_area->Visible) { // coverage_area ?>
        <th class="<?= $Page->coverage_area->headerCellClass() ?>"><span id="elh_environmental_programs_coverage_area" class="environmental_programs_coverage_area"><?= $Page->coverage_area->caption() ?></span></th>
<?php } ?>
<?php if ($Page->implementation_date->Visible) { // implementation_date ?>
        <th class="<?= $Page->implementation_date->headerCellClass() ?>"><span id="elh_environmental_programs_implementation_date" class="environmental_programs_implementation_date"><?= $Page->implementation_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_environmental_programs_status" class="environmental_programs_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
        <th class="<?= $Page->featured_image->headerCellClass() ?>"><span id="elh_environmental_programs_featured_image" class="environmental_programs_featured_image"><?= $Page->featured_image->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
        <th class="<?= $Page->created_at->headerCellClass() ?>"><span id="elh_environmental_programs_created_at" class="environmental_programs_created_at"><?= $Page->created_at->caption() ?></span></th>
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
<?php if ($Page->program_name->Visible) { // program_name ?>
        <td<?= $Page->program_name->cellAttributes() ?>>
<span id="">
<span<?= $Page->program_name->viewAttributes() ?>>
<?= $Page->program_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->program_type->Visible) { // program_type ?>
        <td<?= $Page->program_type->cellAttributes() ?>>
<span id="">
<span<?= $Page->program_type->viewAttributes() ?>>
<?= $Page->program_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->coverage_area->Visible) { // coverage_area ?>
        <td<?= $Page->coverage_area->cellAttributes() ?>>
<span id="">
<span<?= $Page->coverage_area->viewAttributes() ?>>
<?= $Page->coverage_area->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->implementation_date->Visible) { // implementation_date ?>
        <td<?= $Page->implementation_date->cellAttributes() ?>>
<span id="">
<span<?= $Page->implementation_date->viewAttributes() ?>>
<?= $Page->implementation_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td<?= $Page->status->cellAttributes() ?>>
<span id="">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
        <td<?= $Page->featured_image->cellAttributes() ?>>
<span id="">
<span<?= $Page->featured_image->viewAttributes() ?>>
<?= $Page->featured_image->getViewValue() ?></span>
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
