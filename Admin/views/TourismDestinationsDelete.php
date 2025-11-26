<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$TourismDestinationsDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { tourism_destinations: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var ftourism_destinationsdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("ftourism_destinationsdelete")
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
<form name="ftourism_destinationsdelete" id="ftourism_destinationsdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="tourism_destinations">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_tourism_destinations_id" class="tourism_destinations_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->category_id->Visible) { // category_id ?>
        <th class="<?= $Page->category_id->headerCellClass() ?>"><span id="elh_tourism_destinations_category_id" class="tourism_destinations_category_id"><?= $Page->category_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <th class="<?= $Page->name->headerCellClass() ?>"><span id="elh_tourism_destinations_name" class="tourism_destinations_name"><?= $Page->name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->municipality->Visible) { // municipality ?>
        <th class="<?= $Page->municipality->headerCellClass() ?>"><span id="elh_tourism_destinations_municipality" class="tourism_destinations_municipality"><?= $Page->municipality->caption() ?></span></th>
<?php } ?>
<?php if ($Page->coordinates->Visible) { // coordinates ?>
        <th class="<?= $Page->coordinates->headerCellClass() ?>"><span id="elh_tourism_destinations_coordinates" class="tourism_destinations_coordinates"><?= $Page->coordinates->caption() ?></span></th>
<?php } ?>
<?php if ($Page->entry_fee->Visible) { // entry_fee ?>
        <th class="<?= $Page->entry_fee->headerCellClass() ?>"><span id="elh_tourism_destinations_entry_fee" class="tourism_destinations_entry_fee"><?= $Page->entry_fee->caption() ?></span></th>
<?php } ?>
<?php if ($Page->operating_hours->Visible) { // operating_hours ?>
        <th class="<?= $Page->operating_hours->headerCellClass() ?>"><span id="elh_tourism_destinations_operating_hours" class="tourism_destinations_operating_hours"><?= $Page->operating_hours->caption() ?></span></th>
<?php } ?>
<?php if ($Page->best_time_to_visit->Visible) { // best_time_to_visit ?>
        <th class="<?= $Page->best_time_to_visit->headerCellClass() ?>"><span id="elh_tourism_destinations_best_time_to_visit" class="tourism_destinations_best_time_to_visit"><?= $Page->best_time_to_visit->caption() ?></span></th>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
        <th class="<?= $Page->featured_image->headerCellClass() ?>"><span id="elh_tourism_destinations_featured_image" class="tourism_destinations_featured_image"><?= $Page->featured_image->caption() ?></span></th>
<?php } ?>
<?php if ($Page->is_featured->Visible) { // is_featured ?>
        <th class="<?= $Page->is_featured->headerCellClass() ?>"><span id="elh_tourism_destinations_is_featured" class="tourism_destinations_is_featured"><?= $Page->is_featured->caption() ?></span></th>
<?php } ?>
<?php if ($Page->is_active->Visible) { // is_active ?>
        <th class="<?= $Page->is_active->headerCellClass() ?>"><span id="elh_tourism_destinations_is_active" class="tourism_destinations_is_active"><?= $Page->is_active->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
        <th class="<?= $Page->created_at->headerCellClass() ?>"><span id="elh_tourism_destinations_created_at" class="tourism_destinations_created_at"><?= $Page->created_at->caption() ?></span></th>
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
<?php if ($Page->category_id->Visible) { // category_id ?>
        <td<?= $Page->category_id->cellAttributes() ?>>
<span id="">
<span<?= $Page->category_id->viewAttributes() ?>>
<?= $Page->category_id->getViewValue() ?></span>
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
<?php if ($Page->coordinates->Visible) { // coordinates ?>
        <td<?= $Page->coordinates->cellAttributes() ?>>
<span id="">
<span<?= $Page->coordinates->viewAttributes() ?>>
<?= $Page->coordinates->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->entry_fee->Visible) { // entry_fee ?>
        <td<?= $Page->entry_fee->cellAttributes() ?>>
<span id="">
<span<?= $Page->entry_fee->viewAttributes() ?>>
<?= $Page->entry_fee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->operating_hours->Visible) { // operating_hours ?>
        <td<?= $Page->operating_hours->cellAttributes() ?>>
<span id="">
<span<?= $Page->operating_hours->viewAttributes() ?>>
<?= $Page->operating_hours->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->best_time_to_visit->Visible) { // best_time_to_visit ?>
        <td<?= $Page->best_time_to_visit->cellAttributes() ?>>
<span id="">
<span<?= $Page->best_time_to_visit->viewAttributes() ?>>
<?= $Page->best_time_to_visit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
        <td<?= $Page->featured_image->cellAttributes() ?>>
<span id="">
<span>
<?= GetFileViewTag($Page->featured_image, $Page->featured_image->getViewValue(), false) ?>
</span>
</span>
</td>
<?php } ?>
<?php if ($Page->is_featured->Visible) { // is_featured ?>
        <td<?= $Page->is_featured->cellAttributes() ?>>
<span id="">
<span<?= $Page->is_featured->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($Page->is_featured->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
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
