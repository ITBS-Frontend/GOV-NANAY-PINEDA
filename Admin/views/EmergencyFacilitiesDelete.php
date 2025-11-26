<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$EmergencyFacilitiesDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { emergency_facilities: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var femergency_facilitiesdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("femergency_facilitiesdelete")
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
<form name="femergency_facilitiesdelete" id="femergency_facilitiesdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="emergency_facilities">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_emergency_facilities_id" class="emergency_facilities_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->facility_type->Visible) { // facility_type ?>
        <th class="<?= $Page->facility_type->headerCellClass() ?>"><span id="elh_emergency_facilities_facility_type" class="emergency_facilities_facility_type"><?= $Page->facility_type->caption() ?></span></th>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <th class="<?= $Page->name->headerCellClass() ?>"><span id="elh_emergency_facilities_name" class="emergency_facilities_name"><?= $Page->name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->municipality->Visible) { // municipality ?>
        <th class="<?= $Page->municipality->headerCellClass() ?>"><span id="elh_emergency_facilities_municipality" class="emergency_facilities_municipality"><?= $Page->municipality->caption() ?></span></th>
<?php } ?>
<?php if ($Page->capacity->Visible) { // capacity ?>
        <th class="<?= $Page->capacity->headerCellClass() ?>"><span id="elh_emergency_facilities_capacity" class="emergency_facilities_capacity"><?= $Page->capacity->caption() ?></span></th>
<?php } ?>
<?php if ($Page->contact_number->Visible) { // contact_number ?>
        <th class="<?= $Page->contact_number->headerCellClass() ?>"><span id="elh_emergency_facilities_contact_number" class="emergency_facilities_contact_number"><?= $Page->contact_number->caption() ?></span></th>
<?php } ?>
<?php if ($Page->coordinates->Visible) { // coordinates ?>
        <th class="<?= $Page->coordinates->headerCellClass() ?>"><span id="elh_emergency_facilities_coordinates" class="emergency_facilities_coordinates"><?= $Page->coordinates->caption() ?></span></th>
<?php } ?>
<?php if ($Page->is_active->Visible) { // is_active ?>
        <th class="<?= $Page->is_active->headerCellClass() ?>"><span id="elh_emergency_facilities_is_active" class="emergency_facilities_is_active"><?= $Page->is_active->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
        <th class="<?= $Page->created_at->headerCellClass() ?>"><span id="elh_emergency_facilities_created_at" class="emergency_facilities_created_at"><?= $Page->created_at->caption() ?></span></th>
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
<?php if ($Page->facility_type->Visible) { // facility_type ?>
        <td<?= $Page->facility_type->cellAttributes() ?>>
<span id="">
<span<?= $Page->facility_type->viewAttributes() ?>>
<?= $Page->facility_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <td<?= $Page->name->cellAttributes() ?>>
<span id="">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->municipality->Visible) { // municipality ?>
        <td<?= $Page->municipality->cellAttributes() ?>>
<span id="">
<span<?= $Page->municipality->viewAttributes() ?>>
<?= $Page->municipality->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->capacity->Visible) { // capacity ?>
        <td<?= $Page->capacity->cellAttributes() ?>>
<span id="">
<span<?= $Page->capacity->viewAttributes() ?>>
<?= $Page->capacity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->contact_number->Visible) { // contact_number ?>
        <td<?= $Page->contact_number->cellAttributes() ?>>
<span id="">
<span<?= $Page->contact_number->viewAttributes() ?>>
<?= $Page->contact_number->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->coordinates->Visible) { // coordinates ?>
        <td<?= $Page->coordinates->cellAttributes() ?>>
<span id="">
<span<?= $Page->coordinates->viewAttributes() ?>>
<?= $Page->coordinates->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->is_active->Visible) { // is_active ?>
        <td<?= $Page->is_active->cellAttributes() ?>>
<span id="">
<span<?= $Page->is_active->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($Page->is_active->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
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
