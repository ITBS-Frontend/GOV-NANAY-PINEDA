<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$TourismFacilitiesView = &$Page;
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
<form name="ftourism_facilitiesview" id="ftourism_facilitiesview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { tourism_facilities: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var ftourism_facilitiesview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("ftourism_facilitiesview")
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
<input type="hidden" name="t" value="tourism_facilities">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id"<?= $Page->id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_facilities_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id"<?= $Page->id->cellAttributes() ?>>
<span id="el_tourism_facilities_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <tr id="r_name"<?= $Page->name->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_facilities_name"><?= $Page->name->caption() ?></span></td>
        <td data-name="name"<?= $Page->name->cellAttributes() ?>>
<span id="el_tourism_facilities_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <tr id="r_description"<?= $Page->description->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_facilities_description"><?= $Page->description->caption() ?></span></td>
        <td data-name="description"<?= $Page->description->cellAttributes() ?>>
<span id="el_tourism_facilities_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->municipality->Visible) { // municipality ?>
    <tr id="r_municipality"<?= $Page->municipality->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_facilities_municipality"><?= $Page->municipality->caption() ?></span></td>
        <td data-name="municipality"<?= $Page->municipality->cellAttributes() ?>>
<span id="el_tourism_facilities_municipality">
<span<?= $Page->municipality->viewAttributes() ?>>
<?= $Page->municipality->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->address->Visible) { // address ?>
    <tr id="r_address"<?= $Page->address->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_facilities_address"><?= $Page->address->caption() ?></span></td>
        <td data-name="address"<?= $Page->address->cellAttributes() ?>>
<span id="el_tourism_facilities_address">
<span<?= $Page->address->viewAttributes() ?>>
<?= $Page->address->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->contact_number->Visible) { // contact_number ?>
    <tr id="r_contact_number"<?= $Page->contact_number->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_facilities_contact_number"><?= $Page->contact_number->caption() ?></span></td>
        <td data-name="contact_number"<?= $Page->contact_number->cellAttributes() ?>>
<span id="el_tourism_facilities_contact_number">
<span<?= $Page->contact_number->viewAttributes() ?>>
<?= $Page->contact_number->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
    <tr id="r__email"<?= $Page->_email->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_facilities__email"><?= $Page->_email->caption() ?></span></td>
        <td data-name="_email"<?= $Page->_email->cellAttributes() ?>>
<span id="el_tourism_facilities__email">
<span<?= $Page->_email->viewAttributes() ?>>
<?= $Page->_email->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->website->Visible) { // website ?>
    <tr id="r_website"<?= $Page->website->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_facilities_website"><?= $Page->website->caption() ?></span></td>
        <td data-name="website"<?= $Page->website->cellAttributes() ?>>
<span id="el_tourism_facilities_website">
<span<?= $Page->website->viewAttributes() ?>>
<?= $Page->website->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->price_range->Visible) { // price_range ?>
    <tr id="r_price_range"<?= $Page->price_range->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_facilities_price_range"><?= $Page->price_range->caption() ?></span></td>
        <td data-name="price_range"<?= $Page->price_range->cellAttributes() ?>>
<span id="el_tourism_facilities_price_range">
<span<?= $Page->price_range->viewAttributes() ?>>
<?= $Page->price_range->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->amenities->Visible) { // amenities ?>
    <tr id="r_amenities"<?= $Page->amenities->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_facilities_amenities"><?= $Page->amenities->caption() ?></span></td>
        <td data-name="amenities"<?= $Page->amenities->cellAttributes() ?>>
<span id="el_tourism_facilities_amenities">
<span<?= $Page->amenities->viewAttributes() ?>>
<?= $Page->amenities->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->coordinates->Visible) { // coordinates ?>
    <tr id="r_coordinates"<?= $Page->coordinates->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_facilities_coordinates"><?= $Page->coordinates->caption() ?></span></td>
        <td data-name="coordinates"<?= $Page->coordinates->cellAttributes() ?>>
<span id="el_tourism_facilities_coordinates">
<span<?= $Page->coordinates->viewAttributes() ?>>
<?= $Page->coordinates->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
    <tr id="r_featured_image"<?= $Page->featured_image->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_facilities_featured_image"><?= $Page->featured_image->caption() ?></span></td>
        <td data-name="featured_image"<?= $Page->featured_image->cellAttributes() ?>>
<span id="el_tourism_facilities_featured_image">
<span>
<?= GetFileViewTag($Page->featured_image, $Page->featured_image->getViewValue(), false) ?>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->rating->Visible) { // rating ?>
    <tr id="r_rating"<?= $Page->rating->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_facilities_rating"><?= $Page->rating->caption() ?></span></td>
        <td data-name="rating"<?= $Page->rating->cellAttributes() ?>>
<span id="el_tourism_facilities_rating">
<span<?= $Page->rating->viewAttributes() ?>>
<?= $Page->rating->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->is_verified->Visible) { // is_verified ?>
    <tr id="r_is_verified"<?= $Page->is_verified->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_facilities_is_verified"><?= $Page->is_verified->caption() ?></span></td>
        <td data-name="is_verified"<?= $Page->is_verified->cellAttributes() ?>>
<span id="el_tourism_facilities_is_verified">
<span<?= $Page->is_verified->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($Page->is_verified->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->is_active->Visible) { // is_active ?>
    <tr id="r_is_active"<?= $Page->is_active->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_facilities_is_active"><?= $Page->is_active->caption() ?></span></td>
        <td data-name="is_active"<?= $Page->is_active->cellAttributes() ?>>
<span id="el_tourism_facilities_is_active">
<span<?= $Page->is_active->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($Page->is_active->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <tr id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_facilities_created_at"><?= $Page->created_at->caption() ?></span></td>
        <td data-name="created_at"<?= $Page->created_at->cellAttributes() ?>>
<span id="el_tourism_facilities_created_at">
<span<?= $Page->created_at->viewAttributes() ?>>
<?= $Page->created_at->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->facility_type_id->Visible) { // facility_type_id ?>
    <tr id="r_facility_type_id"<?= $Page->facility_type_id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_facilities_facility_type_id"><?= $Page->facility_type_id->caption() ?></span></td>
        <td data-name="facility_type_id"<?= $Page->facility_type_id->cellAttributes() ?>>
<span id="el_tourism_facilities_facility_type_id">
<span<?= $Page->facility_type_id->viewAttributes() ?>>
<?= $Page->facility_type_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ownership_type_id->Visible) { // ownership_type_id ?>
    <tr id="r_ownership_type_id"<?= $Page->ownership_type_id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_facilities_ownership_type_id"><?= $Page->ownership_type_id->caption() ?></span></td>
        <td data-name="ownership_type_id"<?= $Page->ownership_type_id->cellAttributes() ?>>
<span id="el_tourism_facilities_ownership_type_id">
<span<?= $Page->ownership_type_id->viewAttributes() ?>>
<?= $Page->ownership_type_id->getViewValue() ?></span>
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
