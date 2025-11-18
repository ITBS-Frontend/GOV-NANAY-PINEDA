<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$ProfileDetailsDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { profile_details: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fprofile_detailsdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fprofile_detailsdelete")
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
<form name="fprofile_detailsdelete" id="fprofile_detailsdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="profile_details">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_profile_details_id" class="profile_details_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->detail_key->Visible) { // detail_key ?>
        <th class="<?= $Page->detail_key->headerCellClass() ?>"><span id="elh_profile_details_detail_key" class="profile_details_detail_key"><?= $Page->detail_key->caption() ?></span></th>
<?php } ?>
<?php if ($Page->detail_label->Visible) { // detail_label ?>
        <th class="<?= $Page->detail_label->headerCellClass() ?>"><span id="elh_profile_details_detail_label" class="profile_details_detail_label"><?= $Page->detail_label->caption() ?></span></th>
<?php } ?>
<?php if ($Page->detail_value->Visible) { // detail_value ?>
        <th class="<?= $Page->detail_value->headerCellClass() ?>"><span id="elh_profile_details_detail_value" class="profile_details_detail_value"><?= $Page->detail_value->caption() ?></span></th>
<?php } ?>
<?php if ($Page->icon_class->Visible) { // icon_class ?>
        <th class="<?= $Page->icon_class->headerCellClass() ?>"><span id="elh_profile_details_icon_class" class="profile_details_icon_class"><?= $Page->icon_class->caption() ?></span></th>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
        <th class="<?= $Page->display_order->headerCellClass() ?>"><span id="elh_profile_details_display_order" class="profile_details_display_order"><?= $Page->display_order->caption() ?></span></th>
<?php } ?>
<?php if ($Page->is_active->Visible) { // is_active ?>
        <th class="<?= $Page->is_active->headerCellClass() ?>"><span id="elh_profile_details_is_active" class="profile_details_is_active"><?= $Page->is_active->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
        <th class="<?= $Page->created_at->headerCellClass() ?>"><span id="elh_profile_details_created_at" class="profile_details_created_at"><?= $Page->created_at->caption() ?></span></th>
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
<?php if ($Page->detail_key->Visible) { // detail_key ?>
        <td<?= $Page->detail_key->cellAttributes() ?>>
<span id="">
<span<?= $Page->detail_key->viewAttributes() ?>>
<?= $Page->detail_key->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->detail_label->Visible) { // detail_label ?>
        <td<?= $Page->detail_label->cellAttributes() ?>>
<span id="">
<span<?= $Page->detail_label->viewAttributes() ?>>
<?= $Page->detail_label->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->detail_value->Visible) { // detail_value ?>
        <td<?= $Page->detail_value->cellAttributes() ?>>
<span id="">
<span<?= $Page->detail_value->viewAttributes() ?>>
<?= $Page->detail_value->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->icon_class->Visible) { // icon_class ?>
        <td<?= $Page->icon_class->cellAttributes() ?>>
<span id="">
<span<?= $Page->icon_class->viewAttributes() ?>>
<?= $Page->icon_class->getViewValue() ?></span>
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
