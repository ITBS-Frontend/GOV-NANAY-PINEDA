<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$BusinessSectorsView = &$Page;
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
<form name="fbusiness_sectorsview" id="fbusiness_sectorsview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { business_sectors: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var fbusiness_sectorsview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fbusiness_sectorsview")
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
<input type="hidden" name="t" value="business_sectors">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id"<?= $Page->id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_business_sectors_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id"<?= $Page->id->cellAttributes() ?>>
<span id="el_business_sectors_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->sector_name->Visible) { // sector_name ?>
    <tr id="r_sector_name"<?= $Page->sector_name->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_business_sectors_sector_name"><?= $Page->sector_name->caption() ?></span></td>
        <td data-name="sector_name"<?= $Page->sector_name->cellAttributes() ?>>
<span id="el_business_sectors_sector_name">
<span<?= $Page->sector_name->viewAttributes() ?>>
<?= $Page->sector_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <tr id="r_description"<?= $Page->description->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_business_sectors_description"><?= $Page->description->caption() ?></span></td>
        <td data-name="description"<?= $Page->description->cellAttributes() ?>>
<span id="el_business_sectors_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->number_of_establishments->Visible) { // number_of_establishments ?>
    <tr id="r_number_of_establishments"<?= $Page->number_of_establishments->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_business_sectors_number_of_establishments"><?= $Page->number_of_establishments->caption() ?></span></td>
        <td data-name="number_of_establishments"<?= $Page->number_of_establishments->cellAttributes() ?>>
<span id="el_business_sectors_number_of_establishments">
<span<?= $Page->number_of_establishments->viewAttributes() ?>>
<?= $Page->number_of_establishments->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employment_generated->Visible) { // employment_generated ?>
    <tr id="r_employment_generated"<?= $Page->employment_generated->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_business_sectors_employment_generated"><?= $Page->employment_generated->caption() ?></span></td>
        <td data-name="employment_generated"<?= $Page->employment_generated->cellAttributes() ?>>
<span id="el_business_sectors_employment_generated">
<span<?= $Page->employment_generated->viewAttributes() ?>>
<?= $Page->employment_generated->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->contribution_to_gdp->Visible) { // contribution_to_gdp ?>
    <tr id="r_contribution_to_gdp"<?= $Page->contribution_to_gdp->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_business_sectors_contribution_to_gdp"><?= $Page->contribution_to_gdp->caption() ?></span></td>
        <td data-name="contribution_to_gdp"<?= $Page->contribution_to_gdp->cellAttributes() ?>>
<span id="el_business_sectors_contribution_to_gdp">
<span<?= $Page->contribution_to_gdp->viewAttributes() ?>>
<?= $Page->contribution_to_gdp->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->icon_class->Visible) { // icon_class ?>
    <tr id="r_icon_class"<?= $Page->icon_class->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_business_sectors_icon_class"><?= $Page->icon_class->caption() ?></span></td>
        <td data-name="icon_class"<?= $Page->icon_class->cellAttributes() ?>>
<span id="el_business_sectors_icon_class">
<span<?= $Page->icon_class->viewAttributes() ?>>
<?= $Page->icon_class->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <tr id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_business_sectors_created_at"><?= $Page->created_at->caption() ?></span></td>
        <td data-name="created_at"<?= $Page->created_at->cellAttributes() ?>>
<span id="el_business_sectors_created_at">
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
