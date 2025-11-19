<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$ProjectsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="view">
<form name="fprojectsview" id="fprojectsview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { projects: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var fprojectsview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fprojectsview")
        .setPageId("view")
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
<?php } ?>
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="projects">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id"<?= $Page->id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_projects_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id"<?= $Page->id->cellAttributes() ?>>
<span id="el_projects_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_title->Visible) { // title ?>
    <tr id="r__title"<?= $Page->_title->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_projects__title"><?= $Page->_title->caption() ?></span></td>
        <td data-name="_title"<?= $Page->_title->cellAttributes() ?>>
<span id="el_projects__title">
<span<?= $Page->_title->viewAttributes() ?>>
<?= $Page->_title->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <tr id="r_description"<?= $Page->description->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_projects_description"><?= $Page->description->caption() ?></span></td>
        <td data-name="description"<?= $Page->description->cellAttributes() ?>>
<span id="el_projects_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->category_id->Visible) { // category_id ?>
    <tr id="r_category_id"<?= $Page->category_id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_projects_category_id"><?= $Page->category_id->caption() ?></span></td>
        <td data-name="category_id"<?= $Page->category_id->cellAttributes() ?>>
<span id="el_projects_category_id">
<span<?= $Page->category_id->viewAttributes() ?>>
<?= $Page->category_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->project_number->Visible) { // project_number ?>
    <tr id="r_project_number"<?= $Page->project_number->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_projects_project_number"><?= $Page->project_number->caption() ?></span></td>
        <td data-name="project_number"<?= $Page->project_number->cellAttributes() ?>>
<span id="el_projects_project_number">
<span<?= $Page->project_number->viewAttributes() ?>>
<?= $Page->project_number->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
    <tr id="r_featured_image"<?= $Page->featured_image->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_projects_featured_image"><?= $Page->featured_image->caption() ?></span></td>
        <td data-name="featured_image"<?= $Page->featured_image->cellAttributes() ?>>
<span id="el_projects_featured_image">
<span>
<?= GetFileViewTag($Page->featured_image, $Page->featured_image->getViewValue(), false) ?>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->is_featured->Visible) { // is_featured ?>
    <tr id="r_is_featured"<?= $Page->is_featured->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_projects_is_featured"><?= $Page->is_featured->caption() ?></span></td>
        <td data-name="is_featured"<?= $Page->is_featured->cellAttributes() ?>>
<span id="el_projects_is_featured">
<span<?= $Page->is_featured->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($Page->is_featured->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->project_date->Visible) { // project_date ?>
    <tr id="r_project_date"<?= $Page->project_date->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_projects_project_date"><?= $Page->project_date->caption() ?></span></td>
        <td data-name="project_date"<?= $Page->project_date->cellAttributes() ?>>
<span id="el_projects_project_date">
<span<?= $Page->project_date->viewAttributes() ?>>
<?= $Page->project_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <tr id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_projects_created_at"><?= $Page->created_at->caption() ?></span></td>
        <td data-name="created_at"<?= $Page->created_at->cellAttributes() ?>>
<span id="el_projects_created_at">
<span<?= $Page->created_at->viewAttributes() ?>>
<?= $Page->created_at->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->full_description->Visible) { // full_description ?>
    <tr id="r_full_description"<?= $Page->full_description->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_projects_full_description"><?= $Page->full_description->caption() ?></span></td>
        <td data-name="full_description"<?= $Page->full_description->cellAttributes() ?>>
<span id="el_projects_full_description">
<span<?= $Page->full_description->viewAttributes() ?>>
<?= $Page->full_description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->objectives->Visible) { // objectives ?>
    <tr id="r_objectives"<?= $Page->objectives->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_projects_objectives"><?= $Page->objectives->caption() ?></span></td>
        <td data-name="objectives"<?= $Page->objectives->cellAttributes() ?>>
<span id="el_projects_objectives">
<span<?= $Page->objectives->viewAttributes() ?>>
<?= $Page->objectives->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->impact->Visible) { // impact ?>
    <tr id="r_impact"<?= $Page->impact->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_projects_impact"><?= $Page->impact->caption() ?></span></td>
        <td data-name="impact"<?= $Page->impact->cellAttributes() ?>>
<span id="el_projects_impact">
<span<?= $Page->impact->viewAttributes() ?>>
<?= $Page->impact->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->location->Visible) { // location ?>
    <tr id="r_location"<?= $Page->location->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_projects_location"><?= $Page->location->caption() ?></span></td>
        <td data-name="location"<?= $Page->location->cellAttributes() ?>>
<span id="el_projects_location">
<span<?= $Page->location->viewAttributes() ?>>
<?= $Page->location->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
    <tr id="r_start_date"<?= $Page->start_date->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_projects_start_date"><?= $Page->start_date->caption() ?></span></td>
        <td data-name="start_date"<?= $Page->start_date->cellAttributes() ?>>
<span id="el_projects_start_date">
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
    <tr id="r_end_date"<?= $Page->end_date->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_projects_end_date"><?= $Page->end_date->caption() ?></span></td>
        <td data-name="end_date"<?= $Page->end_date->cellAttributes() ?>>
<span id="el_projects_end_date">
<span<?= $Page->end_date->viewAttributes() ?>>
<?= $Page->end_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status"<?= $Page->status->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_projects_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status"<?= $Page->status->cellAttributes() ?>>
<span id="el_projects_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
</main>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
