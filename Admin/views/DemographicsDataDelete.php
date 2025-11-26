<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$DemographicsDataDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { demographics_data: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fdemographics_datadelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fdemographics_datadelete")
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
<form name="fdemographics_datadelete" id="fdemographics_datadelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="demographics_data">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_demographics_data_id" class="demographics_data_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->data_type->Visible) { // data_type ?>
        <th class="<?= $Page->data_type->headerCellClass() ?>"><span id="elh_demographics_data_data_type" class="demographics_data_data_type"><?= $Page->data_type->caption() ?></span></th>
<?php } ?>
<?php if ($Page->label->Visible) { // label ?>
        <th class="<?= $Page->label->headerCellClass() ?>"><span id="elh_demographics_data_label" class="demographics_data_label"><?= $Page->label->caption() ?></span></th>
<?php } ?>
<?php if ($Page->value->Visible) { // value ?>
        <th class="<?= $Page->value->headerCellClass() ?>"><span id="elh_demographics_data_value" class="demographics_data_value"><?= $Page->value->caption() ?></span></th>
<?php } ?>
<?php if ($Page->year->Visible) { // year ?>
        <th class="<?= $Page->year->headerCellClass() ?>"><span id="elh_demographics_data_year" class="demographics_data_year"><?= $Page->year->caption() ?></span></th>
<?php } ?>
<?php if ($Page->source->Visible) { // source ?>
        <th class="<?= $Page->source->headerCellClass() ?>"><span id="elh_demographics_data_source" class="demographics_data_source"><?= $Page->source->caption() ?></span></th>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
        <th class="<?= $Page->display_order->headerCellClass() ?>"><span id="elh_demographics_data_display_order" class="demographics_data_display_order"><?= $Page->display_order->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
        <th class="<?= $Page->created_at->headerCellClass() ?>"><span id="elh_demographics_data_created_at" class="demographics_data_created_at"><?= $Page->created_at->caption() ?></span></th>
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
<?php if ($Page->data_type->Visible) { // data_type ?>
        <td<?= $Page->data_type->cellAttributes() ?>>
<span id="">
<span<?= $Page->data_type->viewAttributes() ?>>
<?= $Page->data_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->label->Visible) { // label ?>
        <td<?= $Page->label->cellAttributes() ?>>
<span id="">
<span<?= $Page->label->viewAttributes() ?>>
<?= $Page->label->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->value->Visible) { // value ?>
        <td<?= $Page->value->cellAttributes() ?>>
<span id="">
<span<?= $Page->value->viewAttributes() ?>>
<?= $Page->value->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->year->Visible) { // year ?>
        <td<?= $Page->year->cellAttributes() ?>>
<span id="">
<span<?= $Page->year->viewAttributes() ?>>
<?= $Page->year->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->source->Visible) { // source ?>
        <td<?= $Page->source->cellAttributes() ?>>
<span id="">
<span<?= $Page->source->viewAttributes() ?>>
<?= $Page->source->getViewValue() ?></span>
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
