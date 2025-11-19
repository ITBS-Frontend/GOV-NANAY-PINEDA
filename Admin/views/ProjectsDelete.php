<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$ProjectsDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { projects: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fprojectsdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fprojectsdelete")
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
<form name="fprojectsdelete" id="fprojectsdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="projects">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_projects_id" class="projects_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_title->Visible) { // title ?>
        <th class="<?= $Page->_title->headerCellClass() ?>"><span id="elh_projects__title" class="projects__title"><?= $Page->_title->caption() ?></span></th>
<?php } ?>
<?php if ($Page->category_id->Visible) { // category_id ?>
        <th class="<?= $Page->category_id->headerCellClass() ?>"><span id="elh_projects_category_id" class="projects_category_id"><?= $Page->category_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->project_number->Visible) { // project_number ?>
        <th class="<?= $Page->project_number->headerCellClass() ?>"><span id="elh_projects_project_number" class="projects_project_number"><?= $Page->project_number->caption() ?></span></th>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
        <th class="<?= $Page->featured_image->headerCellClass() ?>"><span id="elh_projects_featured_image" class="projects_featured_image"><?= $Page->featured_image->caption() ?></span></th>
<?php } ?>
<?php if ($Page->is_featured->Visible) { // is_featured ?>
        <th class="<?= $Page->is_featured->headerCellClass() ?>"><span id="elh_projects_is_featured" class="projects_is_featured"><?= $Page->is_featured->caption() ?></span></th>
<?php } ?>
<?php if ($Page->project_date->Visible) { // project_date ?>
        <th class="<?= $Page->project_date->headerCellClass() ?>"><span id="elh_projects_project_date" class="projects_project_date"><?= $Page->project_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
        <th class="<?= $Page->created_at->headerCellClass() ?>"><span id="elh_projects_created_at" class="projects_created_at"><?= $Page->created_at->caption() ?></span></th>
<?php } ?>
<?php if ($Page->location->Visible) { // location ?>
        <th class="<?= $Page->location->headerCellClass() ?>"><span id="elh_projects_location" class="projects_location"><?= $Page->location->caption() ?></span></th>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
        <th class="<?= $Page->start_date->headerCellClass() ?>"><span id="elh_projects_start_date" class="projects_start_date"><?= $Page->start_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
        <th class="<?= $Page->end_date->headerCellClass() ?>"><span id="elh_projects_end_date" class="projects_end_date"><?= $Page->end_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_projects_status" class="projects_status"><?= $Page->status->caption() ?></span></th>
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
<?php if ($Page->category_id->Visible) { // category_id ?>
        <td<?= $Page->category_id->cellAttributes() ?>>
<span id="">
<span<?= $Page->category_id->viewAttributes() ?>>
<?= $Page->category_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->project_number->Visible) { // project_number ?>
        <td<?= $Page->project_number->cellAttributes() ?>>
<span id="">
<span<?= $Page->project_number->viewAttributes() ?>>
<?= $Page->project_number->getViewValue() ?></span>
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
<?php if ($Page->is_featured->Visible) { // is_featured ?>
        <td<?= $Page->is_featured->cellAttributes() ?>>
<span id="">
<span<?= $Page->is_featured->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($Page->is_featured->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
</span>
</td>
<?php } ?>
<?php if ($Page->project_date->Visible) { // project_date ?>
        <td<?= $Page->project_date->cellAttributes() ?>>
<span id="">
<span<?= $Page->project_date->viewAttributes() ?>>
<?= $Page->project_date->getViewValue() ?></span>
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
<?php if ($Page->location->Visible) { // location ?>
        <td<?= $Page->location->cellAttributes() ?>>
<span id="">
<span<?= $Page->location->viewAttributes() ?>>
<?= $Page->location->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
        <td<?= $Page->start_date->cellAttributes() ?>>
<span id="">
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
        <td<?= $Page->end_date->cellAttributes() ?>>
<span id="">
<span<?= $Page->end_date->viewAttributes() ?>>
<?= $Page->end_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td<?= $Page->status->cellAttributes() ?>>
<span id="">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
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
