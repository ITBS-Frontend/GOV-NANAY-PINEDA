<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$TourismDestinationsView = &$Page;
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
<form name="ftourism_destinationsview" id="ftourism_destinationsview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { tourism_destinations: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var ftourism_destinationsview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("ftourism_destinationsview")
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
<input type="hidden" name="t" value="tourism_destinations">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id"<?= $Page->id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_destinations_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id"<?= $Page->id->cellAttributes() ?>>
<span id="el_tourism_destinations_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->category_id->Visible) { // category_id ?>
    <tr id="r_category_id"<?= $Page->category_id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_destinations_category_id"><?= $Page->category_id->caption() ?></span></td>
        <td data-name="category_id"<?= $Page->category_id->cellAttributes() ?>>
<span id="el_tourism_destinations_category_id">
<span<?= $Page->category_id->viewAttributes() ?>>
<?= $Page->category_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <tr id="r_name"<?= $Page->name->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_destinations_name"><?= $Page->name->caption() ?></span></td>
        <td data-name="name"<?= $Page->name->cellAttributes() ?>>
<span id="el_tourism_destinations_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <tr id="r_description"<?= $Page->description->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_destinations_description"><?= $Page->description->caption() ?></span></td>
        <td data-name="description"<?= $Page->description->cellAttributes() ?>>
<span id="el_tourism_destinations_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->full_description->Visible) { // full_description ?>
    <tr id="r_full_description"<?= $Page->full_description->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_destinations_full_description"><?= $Page->full_description->caption() ?></span></td>
        <td data-name="full_description"<?= $Page->full_description->cellAttributes() ?>>
<span id="el_tourism_destinations_full_description">
<span<?= $Page->full_description->viewAttributes() ?>>
<?= $Page->full_description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->municipality->Visible) { // municipality ?>
    <tr id="r_municipality"<?= $Page->municipality->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_destinations_municipality"><?= $Page->municipality->caption() ?></span></td>
        <td data-name="municipality"<?= $Page->municipality->cellAttributes() ?>>
<span id="el_tourism_destinations_municipality">
<span<?= $Page->municipality->viewAttributes() ?>>
<?= $Page->municipality->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->address->Visible) { // address ?>
    <tr id="r_address"<?= $Page->address->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_destinations_address"><?= $Page->address->caption() ?></span></td>
        <td data-name="address"<?= $Page->address->cellAttributes() ?>>
<span id="el_tourism_destinations_address">
<span<?= $Page->address->viewAttributes() ?>>
<?= $Page->address->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->coordinates->Visible) { // coordinates ?>
    <tr id="r_coordinates"<?= $Page->coordinates->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_destinations_coordinates"><?= $Page->coordinates->caption() ?></span></td>
        <td data-name="coordinates"<?= $Page->coordinates->cellAttributes() ?>>
<span id="el_tourism_destinations_coordinates">
<span<?= $Page->coordinates->viewAttributes() ?>>
<?= $Page->coordinates->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->entry_fee->Visible) { // entry_fee ?>
    <tr id="r_entry_fee"<?= $Page->entry_fee->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_destinations_entry_fee"><?= $Page->entry_fee->caption() ?></span></td>
        <td data-name="entry_fee"<?= $Page->entry_fee->cellAttributes() ?>>
<span id="el_tourism_destinations_entry_fee">
<span<?= $Page->entry_fee->viewAttributes() ?>>
<?= $Page->entry_fee->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->operating_hours->Visible) { // operating_hours ?>
    <tr id="r_operating_hours"<?= $Page->operating_hours->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_destinations_operating_hours"><?= $Page->operating_hours->caption() ?></span></td>
        <td data-name="operating_hours"<?= $Page->operating_hours->cellAttributes() ?>>
<span id="el_tourism_destinations_operating_hours">
<span<?= $Page->operating_hours->viewAttributes() ?>>
<?= $Page->operating_hours->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->best_time_to_visit->Visible) { // best_time_to_visit ?>
    <tr id="r_best_time_to_visit"<?= $Page->best_time_to_visit->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_destinations_best_time_to_visit"><?= $Page->best_time_to_visit->caption() ?></span></td>
        <td data-name="best_time_to_visit"<?= $Page->best_time_to_visit->cellAttributes() ?>>
<span id="el_tourism_destinations_best_time_to_visit">
<span<?= $Page->best_time_to_visit->viewAttributes() ?>>
<?= $Page->best_time_to_visit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->how_to_get_there->Visible) { // how_to_get_there ?>
    <tr id="r_how_to_get_there"<?= $Page->how_to_get_there->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_destinations_how_to_get_there"><?= $Page->how_to_get_there->caption() ?></span></td>
        <td data-name="how_to_get_there"<?= $Page->how_to_get_there->cellAttributes() ?>>
<span id="el_tourism_destinations_how_to_get_there">
<span<?= $Page->how_to_get_there->viewAttributes() ?>>
<?= $Page->how_to_get_there->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
    <tr id="r_featured_image"<?= $Page->featured_image->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_destinations_featured_image"><?= $Page->featured_image->caption() ?></span></td>
        <td data-name="featured_image"<?= $Page->featured_image->cellAttributes() ?>>
<span id="el_tourism_destinations_featured_image">
<span>
<?= GetFileViewTag($Page->featured_image, $Page->featured_image->getViewValue(), false) ?>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->is_featured->Visible) { // is_featured ?>
    <tr id="r_is_featured"<?= $Page->is_featured->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_destinations_is_featured"><?= $Page->is_featured->caption() ?></span></td>
        <td data-name="is_featured"<?= $Page->is_featured->cellAttributes() ?>>
<span id="el_tourism_destinations_is_featured">
<span<?= $Page->is_featured->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($Page->is_featured->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->is_active->Visible) { // is_active ?>
    <tr id="r_is_active"<?= $Page->is_active->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_destinations_is_active"><?= $Page->is_active->caption() ?></span></td>
        <td data-name="is_active"<?= $Page->is_active->cellAttributes() ?>>
<span id="el_tourism_destinations_is_active">
<span<?= $Page->is_active->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($Page->is_active->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <tr id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_destinations_created_at"><?= $Page->created_at->caption() ?></span></td>
        <td data-name="created_at"<?= $Page->created_at->cellAttributes() ?>>
<span id="el_tourism_destinations_created_at">
<span<?= $Page->created_at->viewAttributes() ?>>
<?= $Page->created_at->getViewValue() ?></span>
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
