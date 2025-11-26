<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$TourismActivitiesDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { tourism_activities: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var ftourism_activitiesdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("ftourism_activitiesdelete")
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
<form name="ftourism_activitiesdelete" id="ftourism_activitiesdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="tourism_activities">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_tourism_activities_id" class="tourism_activities_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->destination_id->Visible) { // destination_id ?>
        <th class="<?= $Page->destination_id->headerCellClass() ?>"><span id="elh_tourism_activities_destination_id" class="tourism_activities_destination_id"><?= $Page->destination_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->activity_name->Visible) { // activity_name ?>
        <th class="<?= $Page->activity_name->headerCellClass() ?>"><span id="elh_tourism_activities_activity_name" class="tourism_activities_activity_name"><?= $Page->activity_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->duration->Visible) { // duration ?>
        <th class="<?= $Page->duration->headerCellClass() ?>"><span id="elh_tourism_activities_duration" class="tourism_activities_duration"><?= $Page->duration->caption() ?></span></th>
<?php } ?>
<?php if ($Page->difficulty_level->Visible) { // difficulty_level ?>
        <th class="<?= $Page->difficulty_level->headerCellClass() ?>"><span id="elh_tourism_activities_difficulty_level" class="tourism_activities_difficulty_level"><?= $Page->difficulty_level->caption() ?></span></th>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
        <th class="<?= $Page->display_order->headerCellClass() ?>"><span id="elh_tourism_activities_display_order" class="tourism_activities_display_order"><?= $Page->display_order->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
        <th class="<?= $Page->created_at->headerCellClass() ?>"><span id="elh_tourism_activities_created_at" class="tourism_activities_created_at"><?= $Page->created_at->caption() ?></span></th>
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
<?php if ($Page->destination_id->Visible) { // destination_id ?>
        <td<?= $Page->destination_id->cellAttributes() ?>>
<span id="">
<span<?= $Page->destination_id->viewAttributes() ?>>
<?= $Page->destination_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->activity_name->Visible) { // activity_name ?>
        <td<?= $Page->activity_name->cellAttributes() ?>>
<span id="">
<span<?= $Page->activity_name->viewAttributes() ?>>
<?= $Page->activity_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->duration->Visible) { // duration ?>
        <td<?= $Page->duration->cellAttributes() ?>>
<span id="">
<span<?= $Page->duration->viewAttributes() ?>>
<?= $Page->duration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->difficulty_level->Visible) { // difficulty_level ?>
        <td<?= $Page->difficulty_level->cellAttributes() ?>>
<span id="">
<span<?= $Page->difficulty_level->viewAttributes() ?>>
<?= $Page->difficulty_level->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
        <td<?= $Page->display_order->cellAttributes() ?>>
<span id="">
<span<?= $Page->display_order->viewAttributes() ?>>
<?= $Page->display_order->getViewValue() ?></span>
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
