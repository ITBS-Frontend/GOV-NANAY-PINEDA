<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$DisasterIncidentsDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { disaster_incidents: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fdisaster_incidentsdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fdisaster_incidentsdelete")
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
<form name="fdisaster_incidentsdelete" id="fdisaster_incidentsdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="disaster_incidents">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_disaster_incidents_id" class="disaster_incidents_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->incident_type->Visible) { // incident_type ?>
        <th class="<?= $Page->incident_type->headerCellClass() ?>"><span id="elh_disaster_incidents_incident_type" class="disaster_incidents_incident_type"><?= $Page->incident_type->caption() ?></span></th>
<?php } ?>
<?php if ($Page->incident_name->Visible) { // incident_name ?>
        <th class="<?= $Page->incident_name->headerCellClass() ?>"><span id="elh_disaster_incidents_incident_name" class="disaster_incidents_incident_name"><?= $Page->incident_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->occurrence_date->Visible) { // occurrence_date ?>
        <th class="<?= $Page->occurrence_date->headerCellClass() ?>"><span id="elh_disaster_incidents_occurrence_date" class="disaster_incidents_occurrence_date"><?= $Page->occurrence_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->casualties->Visible) { // casualties ?>
        <th class="<?= $Page->casualties->headerCellClass() ?>"><span id="elh_disaster_incidents_casualties" class="disaster_incidents_casualties"><?= $Page->casualties->caption() ?></span></th>
<?php } ?>
<?php if ($Page->damages_estimated->Visible) { // damages_estimated ?>
        <th class="<?= $Page->damages_estimated->headerCellClass() ?>"><span id="elh_disaster_incidents_damages_estimated" class="disaster_incidents_damages_estimated"><?= $Page->damages_estimated->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
        <th class="<?= $Page->created_at->headerCellClass() ?>"><span id="elh_disaster_incidents_created_at" class="disaster_incidents_created_at"><?= $Page->created_at->caption() ?></span></th>
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
<?php if ($Page->incident_type->Visible) { // incident_type ?>
        <td<?= $Page->incident_type->cellAttributes() ?>>
<span id="">
<span<?= $Page->incident_type->viewAttributes() ?>>
<?= $Page->incident_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->incident_name->Visible) { // incident_name ?>
        <td<?= $Page->incident_name->cellAttributes() ?>>
<span id="">
<span<?= $Page->incident_name->viewAttributes() ?>>
<?= $Page->incident_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->occurrence_date->Visible) { // occurrence_date ?>
        <td<?= $Page->occurrence_date->cellAttributes() ?>>
<span id="">
<span<?= $Page->occurrence_date->viewAttributes() ?>>
<?= $Page->occurrence_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->casualties->Visible) { // casualties ?>
        <td<?= $Page->casualties->cellAttributes() ?>>
<span id="">
<span<?= $Page->casualties->viewAttributes() ?>>
<?= $Page->casualties->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->damages_estimated->Visible) { // damages_estimated ?>
        <td<?= $Page->damages_estimated->cellAttributes() ?>>
<span id="">
<span<?= $Page->damages_estimated->viewAttributes() ?>>
<?= $Page->damages_estimated->getViewValue() ?></span>
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
