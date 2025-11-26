<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$MunicipalitiesDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { municipalities: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fmunicipalitiesdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fmunicipalitiesdelete")
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
<form name="fmunicipalitiesdelete" id="fmunicipalitiesdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="municipalities">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_municipalities_id" class="municipalities_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <th class="<?= $Page->name->headerCellClass() ?>"><span id="elh_municipalities_name" class="municipalities_name"><?= $Page->name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->population->Visible) { // population ?>
        <th class="<?= $Page->population->headerCellClass() ?>"><span id="elh_municipalities_population" class="municipalities_population"><?= $Page->population->caption() ?></span></th>
<?php } ?>
<?php if ($Page->area_sqkm->Visible) { // area_sqkm ?>
        <th class="<?= $Page->area_sqkm->headerCellClass() ?>"><span id="elh_municipalities_area_sqkm" class="municipalities_area_sqkm"><?= $Page->area_sqkm->caption() ?></span></th>
<?php } ?>
<?php if ($Page->coordinates->Visible) { // coordinates ?>
        <th class="<?= $Page->coordinates->headerCellClass() ?>"><span id="elh_municipalities_coordinates" class="municipalities_coordinates"><?= $Page->coordinates->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mayor_name->Visible) { // mayor_name ?>
        <th class="<?= $Page->mayor_name->headerCellClass() ?>"><span id="elh_municipalities_mayor_name" class="municipalities_mayor_name"><?= $Page->mayor_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->contact_number->Visible) { // contact_number ?>
        <th class="<?= $Page->contact_number->headerCellClass() ?>"><span id="elh_municipalities_contact_number" class="municipalities_contact_number"><?= $Page->contact_number->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
        <th class="<?= $Page->_email->headerCellClass() ?>"><span id="elh_municipalities__email" class="municipalities__email"><?= $Page->_email->caption() ?></span></th>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
        <th class="<?= $Page->display_order->headerCellClass() ?>"><span id="elh_municipalities_display_order" class="municipalities_display_order"><?= $Page->display_order->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
        <th class="<?= $Page->created_at->headerCellClass() ?>"><span id="elh_municipalities_created_at" class="municipalities_created_at"><?= $Page->created_at->caption() ?></span></th>
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
<?php if ($Page->name->Visible) { // name ?>
        <td<?= $Page->name->cellAttributes() ?>>
<span id="">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->population->Visible) { // population ?>
        <td<?= $Page->population->cellAttributes() ?>>
<span id="">
<span<?= $Page->population->viewAttributes() ?>>
<?= $Page->population->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->area_sqkm->Visible) { // area_sqkm ?>
        <td<?= $Page->area_sqkm->cellAttributes() ?>>
<span id="">
<span<?= $Page->area_sqkm->viewAttributes() ?>>
<?= $Page->area_sqkm->getViewValue() ?></span>
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
<?php if ($Page->mayor_name->Visible) { // mayor_name ?>
        <td<?= $Page->mayor_name->cellAttributes() ?>>
<span id="">
<span<?= $Page->mayor_name->viewAttributes() ?>>
<?= $Page->mayor_name->getViewValue() ?></span>
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
<?php if ($Page->_email->Visible) { // email ?>
        <td<?= $Page->_email->cellAttributes() ?>>
<span id="">
<span<?= $Page->_email->viewAttributes() ?>>
<?= $Page->_email->getViewValue() ?></span>
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
