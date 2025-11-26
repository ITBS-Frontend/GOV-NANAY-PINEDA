<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$BusinessSectorsDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { business_sectors: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fbusiness_sectorsdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fbusiness_sectorsdelete")
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
<form name="fbusiness_sectorsdelete" id="fbusiness_sectorsdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="business_sectors">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_business_sectors_id" class="business_sectors_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->sector_name->Visible) { // sector_name ?>
        <th class="<?= $Page->sector_name->headerCellClass() ?>"><span id="elh_business_sectors_sector_name" class="business_sectors_sector_name"><?= $Page->sector_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->number_of_establishments->Visible) { // number_of_establishments ?>
        <th class="<?= $Page->number_of_establishments->headerCellClass() ?>"><span id="elh_business_sectors_number_of_establishments" class="business_sectors_number_of_establishments"><?= $Page->number_of_establishments->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employment_generated->Visible) { // employment_generated ?>
        <th class="<?= $Page->employment_generated->headerCellClass() ?>"><span id="elh_business_sectors_employment_generated" class="business_sectors_employment_generated"><?= $Page->employment_generated->caption() ?></span></th>
<?php } ?>
<?php if ($Page->contribution_to_gdp->Visible) { // contribution_to_gdp ?>
        <th class="<?= $Page->contribution_to_gdp->headerCellClass() ?>"><span id="elh_business_sectors_contribution_to_gdp" class="business_sectors_contribution_to_gdp"><?= $Page->contribution_to_gdp->caption() ?></span></th>
<?php } ?>
<?php if ($Page->icon_class->Visible) { // icon_class ?>
        <th class="<?= $Page->icon_class->headerCellClass() ?>"><span id="elh_business_sectors_icon_class" class="business_sectors_icon_class"><?= $Page->icon_class->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
        <th class="<?= $Page->created_at->headerCellClass() ?>"><span id="elh_business_sectors_created_at" class="business_sectors_created_at"><?= $Page->created_at->caption() ?></span></th>
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
<?php if ($Page->sector_name->Visible) { // sector_name ?>
        <td<?= $Page->sector_name->cellAttributes() ?>>
<span id="">
<span<?= $Page->sector_name->viewAttributes() ?>>
<?= $Page->sector_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->number_of_establishments->Visible) { // number_of_establishments ?>
        <td<?= $Page->number_of_establishments->cellAttributes() ?>>
<span id="">
<span<?= $Page->number_of_establishments->viewAttributes() ?>>
<?= $Page->number_of_establishments->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employment_generated->Visible) { // employment_generated ?>
        <td<?= $Page->employment_generated->cellAttributes() ?>>
<span id="">
<span<?= $Page->employment_generated->viewAttributes() ?>>
<?= $Page->employment_generated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->contribution_to_gdp->Visible) { // contribution_to_gdp ?>
        <td<?= $Page->contribution_to_gdp->cellAttributes() ?>>
<span id="">
<span<?= $Page->contribution_to_gdp->viewAttributes() ?>>
<?= $Page->contribution_to_gdp->getViewValue() ?></span>
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
