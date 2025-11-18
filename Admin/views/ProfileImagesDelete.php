<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$ProfileImagesDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { profile_images: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fprofile_imagesdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fprofile_imagesdelete")
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
<form name="fprofile_imagesdelete" id="fprofile_imagesdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="profile_images">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_profile_images_id" class="profile_images_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->image_path->Visible) { // image_path ?>
        <th class="<?= $Page->image_path->headerCellClass() ?>"><span id="elh_profile_images_image_path" class="profile_images_image_path"><?= $Page->image_path->caption() ?></span></th>
<?php } ?>
<?php if ($Page->image_type->Visible) { // image_type ?>
        <th class="<?= $Page->image_type->headerCellClass() ?>"><span id="elh_profile_images_image_type" class="profile_images_image_type"><?= $Page->image_type->caption() ?></span></th>
<?php } ?>
<?php if ($Page->is_primary->Visible) { // is_primary ?>
        <th class="<?= $Page->is_primary->headerCellClass() ?>"><span id="elh_profile_images_is_primary" class="profile_images_is_primary"><?= $Page->is_primary->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
        <th class="<?= $Page->created_at->headerCellClass() ?>"><span id="elh_profile_images_created_at" class="profile_images_created_at"><?= $Page->created_at->caption() ?></span></th>
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
<?php if ($Page->image_path->Visible) { // image_path ?>
        <td<?= $Page->image_path->cellAttributes() ?>>
<span id="">
<span<?= $Page->image_path->viewAttributes() ?>>
<?= GetFileViewTag($Page->image_path, $Page->image_path->getViewValue(), false) ?>
</span>
</span>
</td>
<?php } ?>
<?php if ($Page->image_type->Visible) { // image_type ?>
        <td<?= $Page->image_type->cellAttributes() ?>>
<span id="">
<span<?= $Page->image_type->viewAttributes() ?>>
<?= $Page->image_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->is_primary->Visible) { // is_primary ?>
        <td<?= $Page->is_primary->cellAttributes() ?>>
<span id="">
<span<?= $Page->is_primary->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($Page->is_primary->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
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
