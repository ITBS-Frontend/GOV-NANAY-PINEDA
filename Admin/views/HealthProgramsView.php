<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$HealthProgramsView = &$Page;
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
<form name="fhealth_programsview" id="fhealth_programsview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { health_programs: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var fhealth_programsview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fhealth_programsview")
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
<input type="hidden" name="t" value="health_programs">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id"<?= $Page->id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_health_programs_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id"<?= $Page->id->cellAttributes() ?>>
<span id="el_health_programs_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->program_name->Visible) { // program_name ?>
    <tr id="r_program_name"<?= $Page->program_name->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_health_programs_program_name"><?= $Page->program_name->caption() ?></span></td>
        <td data-name="program_name"<?= $Page->program_name->cellAttributes() ?>>
<span id="el_health_programs_program_name">
<span<?= $Page->program_name->viewAttributes() ?>>
<?= $Page->program_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <tr id="r_description"<?= $Page->description->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_health_programs_description"><?= $Page->description->caption() ?></span></td>
        <td data-name="description"<?= $Page->description->cellAttributes() ?>>
<span id="el_health_programs_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->objectives->Visible) { // objectives ?>
    <tr id="r_objectives"<?= $Page->objectives->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_health_programs_objectives"><?= $Page->objectives->caption() ?></span></td>
        <td data-name="objectives"<?= $Page->objectives->cellAttributes() ?>>
<span id="el_health_programs_objectives">
<span<?= $Page->objectives->viewAttributes() ?>>
<?= $Page->objectives->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->target_beneficiaries->Visible) { // target_beneficiaries ?>
    <tr id="r_target_beneficiaries"<?= $Page->target_beneficiaries->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_health_programs_target_beneficiaries"><?= $Page->target_beneficiaries->caption() ?></span></td>
        <td data-name="target_beneficiaries"<?= $Page->target_beneficiaries->cellAttributes() ?>>
<span id="el_health_programs_target_beneficiaries">
<span<?= $Page->target_beneficiaries->viewAttributes() ?>>
<?= $Page->target_beneficiaries->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->coverage_area->Visible) { // coverage_area ?>
    <tr id="r_coverage_area"<?= $Page->coverage_area->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_health_programs_coverage_area"><?= $Page->coverage_area->caption() ?></span></td>
        <td data-name="coverage_area"<?= $Page->coverage_area->cellAttributes() ?>>
<span id="el_health_programs_coverage_area">
<span<?= $Page->coverage_area->viewAttributes() ?>>
<?= $Page->coverage_area->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->implementation_date->Visible) { // implementation_date ?>
    <tr id="r_implementation_date"<?= $Page->implementation_date->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_health_programs_implementation_date"><?= $Page->implementation_date->caption() ?></span></td>
        <td data-name="implementation_date"<?= $Page->implementation_date->cellAttributes() ?>>
<span id="el_health_programs_implementation_date">
<span<?= $Page->implementation_date->viewAttributes() ?>>
<?= $Page->implementation_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status"<?= $Page->status->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_health_programs_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status"<?= $Page->status->cellAttributes() ?>>
<span id="el_health_programs_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->contact_info->Visible) { // contact_info ?>
    <tr id="r_contact_info"<?= $Page->contact_info->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_health_programs_contact_info"><?= $Page->contact_info->caption() ?></span></td>
        <td data-name="contact_info"<?= $Page->contact_info->cellAttributes() ?>>
<span id="el_health_programs_contact_info">
<span<?= $Page->contact_info->viewAttributes() ?>>
<?= $Page->contact_info->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
    <tr id="r_featured_image"<?= $Page->featured_image->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_health_programs_featured_image"><?= $Page->featured_image->caption() ?></span></td>
        <td data-name="featured_image"<?= $Page->featured_image->cellAttributes() ?>>
<span id="el_health_programs_featured_image">
<span<?= $Page->featured_image->viewAttributes() ?>>
<?= $Page->featured_image->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->is_active->Visible) { // is_active ?>
    <tr id="r_is_active"<?= $Page->is_active->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_health_programs_is_active"><?= $Page->is_active->caption() ?></span></td>
        <td data-name="is_active"<?= $Page->is_active->cellAttributes() ?>>
<span id="el_health_programs_is_active">
<span<?= $Page->is_active->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($Page->is_active->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <tr id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_health_programs_created_at"><?= $Page->created_at->caption() ?></span></td>
        <td data-name="created_at"<?= $Page->created_at->cellAttributes() ?>>
<span id="el_health_programs_created_at">
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
