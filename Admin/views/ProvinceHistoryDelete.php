<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$ProvinceHistoryDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { province_history: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fprovince_historydelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fprovince_historydelete")
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
<form name="fprovince_historydelete" id="fprovince_historydelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="province_history">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_province_history_id" class="province_history_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_title->Visible) { // title ?>
        <th class="<?= $Page->_title->headerCellClass() ?>"><span id="elh_province_history__title" class="province_history__title"><?= $Page->_title->caption() ?></span></th>
<?php } ?>
<?php if ($Page->period->Visible) { // period ?>
        <th class="<?= $Page->period->headerCellClass() ?>"><span id="elh_province_history_period" class="province_history_period"><?= $Page->period->caption() ?></span></th>
<?php } ?>
<?php if ($Page->timeline_year->Visible) { // timeline_year ?>
        <th class="<?= $Page->timeline_year->headerCellClass() ?>"><span id="elh_province_history_timeline_year" class="province_history_timeline_year"><?= $Page->timeline_year->caption() ?></span></th>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
        <th class="<?= $Page->featured_image->headerCellClass() ?>"><span id="elh_province_history_featured_image" class="province_history_featured_image"><?= $Page->featured_image->caption() ?></span></th>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
        <th class="<?= $Page->display_order->headerCellClass() ?>"><span id="elh_province_history_display_order" class="province_history_display_order"><?= $Page->display_order->caption() ?></span></th>
<?php } ?>
<?php if ($Page->is_active->Visible) { // is_active ?>
        <th class="<?= $Page->is_active->headerCellClass() ?>"><span id="elh_province_history_is_active" class="province_history_is_active"><?= $Page->is_active->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
        <th class="<?= $Page->created_at->headerCellClass() ?>"><span id="elh_province_history_created_at" class="province_history_created_at"><?= $Page->created_at->caption() ?></span></th>
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
<?php if ($Page->_title->Visible) { // title ?>
        <td<?= $Page->_title->cellAttributes() ?>>
<span id="">
<span<?= $Page->_title->viewAttributes() ?>>
<?= $Page->_title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->period->Visible) { // period ?>
        <td<?= $Page->period->cellAttributes() ?>>
<span id="">
<span<?= $Page->period->viewAttributes() ?>>
<?= $Page->period->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->timeline_year->Visible) { // timeline_year ?>
        <td<?= $Page->timeline_year->cellAttributes() ?>>
<span id="">
<span<?= $Page->timeline_year->viewAttributes() ?>>
<?= $Page->timeline_year->getViewValue() ?></span>
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
<?php if ($Page->display_order->Visible) { // display_order ?>
        <td<?= $Page->display_order->cellAttributes() ?>>
<span id="">
<span<?= $Page->display_order->viewAttributes() ?>>
<?= $Page->display_order->getViewValue() ?></span>
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
