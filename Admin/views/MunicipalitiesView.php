<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$MunicipalitiesView = &$Page;
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
<form name="fmunicipalitiesview" id="fmunicipalitiesview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { municipalities: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var fmunicipalitiesview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fmunicipalitiesview")
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
<input type="hidden" name="t" value="municipalities">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id"<?= $Page->id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_municipalities_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id"<?= $Page->id->cellAttributes() ?>>
<span id="el_municipalities_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <tr id="r_name"<?= $Page->name->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_municipalities_name"><?= $Page->name->caption() ?></span></td>
        <td data-name="name"<?= $Page->name->cellAttributes() ?>>
<span id="el_municipalities_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->population->Visible) { // population ?>
    <tr id="r_population"<?= $Page->population->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_municipalities_population"><?= $Page->population->caption() ?></span></td>
        <td data-name="population"<?= $Page->population->cellAttributes() ?>>
<span id="el_municipalities_population">
<span<?= $Page->population->viewAttributes() ?>>
<?= $Page->population->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->area_sqkm->Visible) { // area_sqkm ?>
    <tr id="r_area_sqkm"<?= $Page->area_sqkm->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_municipalities_area_sqkm"><?= $Page->area_sqkm->caption() ?></span></td>
        <td data-name="area_sqkm"<?= $Page->area_sqkm->cellAttributes() ?>>
<span id="el_municipalities_area_sqkm">
<span<?= $Page->area_sqkm->viewAttributes() ?>>
<?= $Page->area_sqkm->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->coordinates->Visible) { // coordinates ?>
    <tr id="r_coordinates"<?= $Page->coordinates->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_municipalities_coordinates"><?= $Page->coordinates->caption() ?></span></td>
        <td data-name="coordinates"<?= $Page->coordinates->cellAttributes() ?>>
<span id="el_municipalities_coordinates">
<span<?= $Page->coordinates->viewAttributes() ?>>
<?= $Page->coordinates->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mayor_name->Visible) { // mayor_name ?>
    <tr id="r_mayor_name"<?= $Page->mayor_name->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_municipalities_mayor_name"><?= $Page->mayor_name->caption() ?></span></td>
        <td data-name="mayor_name"<?= $Page->mayor_name->cellAttributes() ?>>
<span id="el_municipalities_mayor_name">
<span<?= $Page->mayor_name->viewAttributes() ?>>
<?= $Page->mayor_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->contact_number->Visible) { // contact_number ?>
    <tr id="r_contact_number"<?= $Page->contact_number->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_municipalities_contact_number"><?= $Page->contact_number->caption() ?></span></td>
        <td data-name="contact_number"<?= $Page->contact_number->cellAttributes() ?>>
<span id="el_municipalities_contact_number">
<span<?= $Page->contact_number->viewAttributes() ?>>
<?= $Page->contact_number->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
    <tr id="r__email"<?= $Page->_email->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_municipalities__email"><?= $Page->_email->caption() ?></span></td>
        <td data-name="_email"<?= $Page->_email->cellAttributes() ?>>
<span id="el_municipalities__email">
<span<?= $Page->_email->viewAttributes() ?>>
<?= $Page->_email->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
    <tr id="r_display_order"<?= $Page->display_order->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_municipalities_display_order"><?= $Page->display_order->caption() ?></span></td>
        <td data-name="display_order"<?= $Page->display_order->cellAttributes() ?>>
<span id="el_municipalities_display_order">
<span<?= $Page->display_order->viewAttributes() ?>>
<?= $Page->display_order->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <tr id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_municipalities_created_at"><?= $Page->created_at->caption() ?></span></td>
        <td data-name="created_at"<?= $Page->created_at->cellAttributes() ?>>
<span id="el_municipalities_created_at">
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
