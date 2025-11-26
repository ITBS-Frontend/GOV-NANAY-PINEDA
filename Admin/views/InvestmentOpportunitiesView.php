<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$InvestmentOpportunitiesView = &$Page;
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
<form name="finvestment_opportunitiesview" id="finvestment_opportunitiesview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { investment_opportunities: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var finvestment_opportunitiesview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("finvestment_opportunitiesview")
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
<input type="hidden" name="t" value="investment_opportunities">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id"<?= $Page->id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_investment_opportunities_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id"<?= $Page->id->cellAttributes() ?>>
<span id="el_investment_opportunities_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->opportunity_title->Visible) { // opportunity_title ?>
    <tr id="r_opportunity_title"<?= $Page->opportunity_title->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_investment_opportunities_opportunity_title"><?= $Page->opportunity_title->caption() ?></span></td>
        <td data-name="opportunity_title"<?= $Page->opportunity_title->cellAttributes() ?>>
<span id="el_investment_opportunities_opportunity_title">
<span<?= $Page->opportunity_title->viewAttributes() ?>>
<?= $Page->opportunity_title->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->sector->Visible) { // sector ?>
    <tr id="r_sector"<?= $Page->sector->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_investment_opportunities_sector"><?= $Page->sector->caption() ?></span></td>
        <td data-name="sector"<?= $Page->sector->cellAttributes() ?>>
<span id="el_investment_opportunities_sector">
<span<?= $Page->sector->viewAttributes() ?>>
<?= $Page->sector->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <tr id="r_description"<?= $Page->description->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_investment_opportunities_description"><?= $Page->description->caption() ?></span></td>
        <td data-name="description"<?= $Page->description->cellAttributes() ?>>
<span id="el_investment_opportunities_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->location->Visible) { // location ?>
    <tr id="r_location"<?= $Page->location->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_investment_opportunities_location"><?= $Page->location->caption() ?></span></td>
        <td data-name="location"<?= $Page->location->cellAttributes() ?>>
<span id="el_investment_opportunities_location">
<span<?= $Page->location->viewAttributes() ?>>
<?= $Page->location->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->estimated_investment->Visible) { // estimated_investment ?>
    <tr id="r_estimated_investment"<?= $Page->estimated_investment->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_investment_opportunities_estimated_investment"><?= $Page->estimated_investment->caption() ?></span></td>
        <td data-name="estimated_investment"<?= $Page->estimated_investment->cellAttributes() ?>>
<span id="el_investment_opportunities_estimated_investment">
<span<?= $Page->estimated_investment->viewAttributes() ?>>
<?= $Page->estimated_investment->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->potential_returns->Visible) { // potential_returns ?>
    <tr id="r_potential_returns"<?= $Page->potential_returns->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_investment_opportunities_potential_returns"><?= $Page->potential_returns->caption() ?></span></td>
        <td data-name="potential_returns"<?= $Page->potential_returns->cellAttributes() ?>>
<span id="el_investment_opportunities_potential_returns">
<span<?= $Page->potential_returns->viewAttributes() ?>>
<?= $Page->potential_returns->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->incentives->Visible) { // incentives ?>
    <tr id="r_incentives"<?= $Page->incentives->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_investment_opportunities_incentives"><?= $Page->incentives->caption() ?></span></td>
        <td data-name="incentives"<?= $Page->incentives->cellAttributes() ?>>
<span id="el_investment_opportunities_incentives">
<span<?= $Page->incentives->viewAttributes() ?>>
<?= $Page->incentives->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->contact_info->Visible) { // contact_info ?>
    <tr id="r_contact_info"<?= $Page->contact_info->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_investment_opportunities_contact_info"><?= $Page->contact_info->caption() ?></span></td>
        <td data-name="contact_info"<?= $Page->contact_info->cellAttributes() ?>>
<span id="el_investment_opportunities_contact_info">
<span<?= $Page->contact_info->viewAttributes() ?>>
<?= $Page->contact_info->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
    <tr id="r_featured_image"<?= $Page->featured_image->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_investment_opportunities_featured_image"><?= $Page->featured_image->caption() ?></span></td>
        <td data-name="featured_image"<?= $Page->featured_image->cellAttributes() ?>>
<span id="el_investment_opportunities_featured_image">
<span<?= $Page->featured_image->viewAttributes() ?>>
<?= $Page->featured_image->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->is_active->Visible) { // is_active ?>
    <tr id="r_is_active"<?= $Page->is_active->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_investment_opportunities_is_active"><?= $Page->is_active->caption() ?></span></td>
        <td data-name="is_active"<?= $Page->is_active->cellAttributes() ?>>
<span id="el_investment_opportunities_is_active">
<span<?= $Page->is_active->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($Page->is_active->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <tr id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_investment_opportunities_created_at"><?= $Page->created_at->caption() ?></span></td>
        <td data-name="created_at"<?= $Page->created_at->cellAttributes() ?>>
<span id="el_investment_opportunities_created_at">
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
