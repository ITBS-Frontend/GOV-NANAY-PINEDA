<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$PampangaAboutDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { pampanga_about: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fpampanga_aboutdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fpampanga_aboutdelete")
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
<form name="fpampanga_aboutdelete" id="fpampanga_aboutdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pampanga_about">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pampanga_about_id" class="pampanga_about_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->main_image->Visible) { // main_image ?>
        <th class="<?= $Page->main_image->headerCellClass() ?>"><span id="elh_pampanga_about_main_image" class="pampanga_about_main_image"><?= $Page->main_image->caption() ?></span></th>
<?php } ?>
<?php if ($Page->showcase_image_1->Visible) { // showcase_image_1 ?>
        <th class="<?= $Page->showcase_image_1->headerCellClass() ?>"><span id="elh_pampanga_about_showcase_image_1" class="pampanga_about_showcase_image_1"><?= $Page->showcase_image_1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->showcase_image_2->Visible) { // showcase_image_2 ?>
        <th class="<?= $Page->showcase_image_2->headerCellClass() ?>"><span id="elh_pampanga_about_showcase_image_2" class="pampanga_about_showcase_image_2"><?= $Page->showcase_image_2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
        <th class="<?= $Page->created_at->headerCellClass() ?>"><span id="elh_pampanga_about_created_at" class="pampanga_about_created_at"><?= $Page->created_at->caption() ?></span></th>
<?php } ?>
<?php if ($Page->updated_at->Visible) { // updated_at ?>
        <th class="<?= $Page->updated_at->headerCellClass() ?>"><span id="elh_pampanga_about_updated_at" class="pampanga_about_updated_at"><?= $Page->updated_at->caption() ?></span></th>
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
<?php if ($Page->main_image->Visible) { // main_image ?>
        <td<?= $Page->main_image->cellAttributes() ?>>
<span id="">
<span>
<?= GetFileViewTag($Page->main_image, $Page->main_image->getViewValue(), false) ?>
</span>
</span>
</td>
<?php } ?>
<?php if ($Page->showcase_image_1->Visible) { // showcase_image_1 ?>
        <td<?= $Page->showcase_image_1->cellAttributes() ?>>
<span id="">
<span>
<?= GetFileViewTag($Page->showcase_image_1, $Page->showcase_image_1->getViewValue(), false) ?>
</span>
</span>
</td>
<?php } ?>
<?php if ($Page->showcase_image_2->Visible) { // showcase_image_2 ?>
        <td<?= $Page->showcase_image_2->cellAttributes() ?>>
<span id="">
<span>
<?= GetFileViewTag($Page->showcase_image_2, $Page->showcase_image_2->getViewValue(), false) ?>
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
<?php if ($Page->updated_at->Visible) { // updated_at ?>
        <td<?= $Page->updated_at->cellAttributes() ?>>
<span id="">
<span<?= $Page->updated_at->viewAttributes() ?>>
<?= $Page->updated_at->getViewValue() ?></span>
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
