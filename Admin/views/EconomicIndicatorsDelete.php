<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$EconomicIndicatorsDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { economic_indicators: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var feconomic_indicatorsdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("feconomic_indicatorsdelete")
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
<form name="feconomic_indicatorsdelete" id="feconomic_indicatorsdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="economic_indicators">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_economic_indicators_id" class="economic_indicators_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->indicator_name->Visible) { // indicator_name ?>
        <th class="<?= $Page->indicator_name->headerCellClass() ?>"><span id="elh_economic_indicators_indicator_name" class="economic_indicators_indicator_name"><?= $Page->indicator_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->value->Visible) { // value ?>
        <th class="<?= $Page->value->headerCellClass() ?>"><span id="elh_economic_indicators_value" class="economic_indicators_value"><?= $Page->value->caption() ?></span></th>
<?php } ?>
<?php if ($Page->unit->Visible) { // unit ?>
        <th class="<?= $Page->unit->headerCellClass() ?>"><span id="elh_economic_indicators_unit" class="economic_indicators_unit"><?= $Page->unit->caption() ?></span></th>
<?php } ?>
<?php if ($Page->year->Visible) { // year ?>
        <th class="<?= $Page->year->headerCellClass() ?>"><span id="elh_economic_indicators_year" class="economic_indicators_year"><?= $Page->year->caption() ?></span></th>
<?php } ?>
<?php if ($Page->quarter->Visible) { // quarter ?>
        <th class="<?= $Page->quarter->headerCellClass() ?>"><span id="elh_economic_indicators_quarter" class="economic_indicators_quarter"><?= $Page->quarter->caption() ?></span></th>
<?php } ?>
<?php if ($Page->source->Visible) { // source ?>
        <th class="<?= $Page->source->headerCellClass() ?>"><span id="elh_economic_indicators_source" class="economic_indicators_source"><?= $Page->source->caption() ?></span></th>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
        <th class="<?= $Page->display_order->headerCellClass() ?>"><span id="elh_economic_indicators_display_order" class="economic_indicators_display_order"><?= $Page->display_order->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
        <th class="<?= $Page->created_at->headerCellClass() ?>"><span id="elh_economic_indicators_created_at" class="economic_indicators_created_at"><?= $Page->created_at->caption() ?></span></th>
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
<?php if ($Page->indicator_name->Visible) { // indicator_name ?>
        <td<?= $Page->indicator_name->cellAttributes() ?>>
<span id="">
<span<?= $Page->indicator_name->viewAttributes() ?>>
<?= $Page->indicator_name->getViewValue() ?></span>
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
<?php if ($Page->unit->Visible) { // unit ?>
        <td<?= $Page->unit->cellAttributes() ?>>
<span id="">
<span<?= $Page->unit->viewAttributes() ?>>
<?= $Page->unit->getViewValue() ?></span>
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
<?php if ($Page->quarter->Visible) { // quarter ?>
        <td<?= $Page->quarter->cellAttributes() ?>>
<span id="">
<span<?= $Page->quarter->viewAttributes() ?>>
<?= $Page->quarter->getViewValue() ?></span>
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
