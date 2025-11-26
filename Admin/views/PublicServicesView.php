<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$PublicServicesView = &$Page;
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
<form name="fpublic_servicesview" id="fpublic_servicesview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { public_services: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var fpublic_servicesview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fpublic_servicesview")
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
<input type="hidden" name="t" value="public_services">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id"<?= $Page->id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_public_services_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id"<?= $Page->id->cellAttributes() ?>>
<span id="el_public_services_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->category_id->Visible) { // category_id ?>
    <tr id="r_category_id"<?= $Page->category_id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_public_services_category_id"><?= $Page->category_id->caption() ?></span></td>
        <td data-name="category_id"<?= $Page->category_id->cellAttributes() ?>>
<span id="el_public_services_category_id">
<span<?= $Page->category_id->viewAttributes() ?>>
<?= $Page->category_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->service_name->Visible) { // service_name ?>
    <tr id="r_service_name"<?= $Page->service_name->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_public_services_service_name"><?= $Page->service_name->caption() ?></span></td>
        <td data-name="service_name"<?= $Page->service_name->cellAttributes() ?>>
<span id="el_public_services_service_name">
<span<?= $Page->service_name->viewAttributes() ?>>
<?= $Page->service_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <tr id="r_description"<?= $Page->description->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_public_services_description"><?= $Page->description->caption() ?></span></td>
        <td data-name="description"<?= $Page->description->cellAttributes() ?>>
<span id="el_public_services_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->requirements->Visible) { // requirements ?>
    <tr id="r_requirements"<?= $Page->requirements->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_public_services_requirements"><?= $Page->requirements->caption() ?></span></td>
        <td data-name="requirements"<?= $Page->requirements->cellAttributes() ?>>
<span id="el_public_services_requirements">
<span<?= $Page->requirements->viewAttributes() ?>>
<?= $Page->requirements->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->process_steps->Visible) { // process_steps ?>
    <tr id="r_process_steps"<?= $Page->process_steps->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_public_services_process_steps"><?= $Page->process_steps->caption() ?></span></td>
        <td data-name="process_steps"<?= $Page->process_steps->cellAttributes() ?>>
<span id="el_public_services_process_steps">
<span<?= $Page->process_steps->viewAttributes() ?>>
<?= $Page->process_steps->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->processing_time->Visible) { // processing_time ?>
    <tr id="r_processing_time"<?= $Page->processing_time->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_public_services_processing_time"><?= $Page->processing_time->caption() ?></span></td>
        <td data-name="processing_time"<?= $Page->processing_time->cellAttributes() ?>>
<span id="el_public_services_processing_time">
<span<?= $Page->processing_time->viewAttributes() ?>>
<?= $Page->processing_time->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->fees->Visible) { // fees ?>
    <tr id="r_fees"<?= $Page->fees->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_public_services_fees"><?= $Page->fees->caption() ?></span></td>
        <td data-name="fees"<?= $Page->fees->cellAttributes() ?>>
<span id="el_public_services_fees">
<span<?= $Page->fees->viewAttributes() ?>>
<?= $Page->fees->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->contact_info->Visible) { // contact_info ?>
    <tr id="r_contact_info"<?= $Page->contact_info->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_public_services_contact_info"><?= $Page->contact_info->caption() ?></span></td>
        <td data-name="contact_info"<?= $Page->contact_info->cellAttributes() ?>>
<span id="el_public_services_contact_info">
<span<?= $Page->contact_info->viewAttributes() ?>>
<?= $Page->contact_info->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->online_link->Visible) { // online_link ?>
    <tr id="r_online_link"<?= $Page->online_link->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_public_services_online_link"><?= $Page->online_link->caption() ?></span></td>
        <td data-name="online_link"<?= $Page->online_link->cellAttributes() ?>>
<span id="el_public_services_online_link">
<span<?= $Page->online_link->viewAttributes() ?>>
<?= $Page->online_link->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
    <tr id="r_display_order"<?= $Page->display_order->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_public_services_display_order"><?= $Page->display_order->caption() ?></span></td>
        <td data-name="display_order"<?= $Page->display_order->cellAttributes() ?>>
<span id="el_public_services_display_order">
<span<?= $Page->display_order->viewAttributes() ?>>
<?= $Page->display_order->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->is_active->Visible) { // is_active ?>
    <tr id="r_is_active"<?= $Page->is_active->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_public_services_is_active"><?= $Page->is_active->caption() ?></span></td>
        <td data-name="is_active"<?= $Page->is_active->cellAttributes() ?>>
<span id="el_public_services_is_active">
<span<?= $Page->is_active->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($Page->is_active->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <tr id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_public_services_created_at"><?= $Page->created_at->caption() ?></span></td>
        <td data-name="created_at"<?= $Page->created_at->cellAttributes() ?>>
<span id="el_public_services_created_at">
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
