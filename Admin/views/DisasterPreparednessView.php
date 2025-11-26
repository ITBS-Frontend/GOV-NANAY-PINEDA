<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$DisasterPreparednessView = &$Page;
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
<form name="fdisaster_preparednessview" id="fdisaster_preparednessview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { disaster_preparedness: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var fdisaster_preparednessview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fdisaster_preparednessview")
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
<input type="hidden" name="t" value="disaster_preparedness">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id"<?= $Page->id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_disaster_preparedness_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id"<?= $Page->id->cellAttributes() ?>>
<span id="el_disaster_preparedness_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->disaster_type->Visible) { // disaster_type ?>
    <tr id="r_disaster_type"<?= $Page->disaster_type->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_disaster_preparedness_disaster_type"><?= $Page->disaster_type->caption() ?></span></td>
        <td data-name="disaster_type"<?= $Page->disaster_type->cellAttributes() ?>>
<span id="el_disaster_preparedness_disaster_type">
<span<?= $Page->disaster_type->viewAttributes() ?>>
<?= $Page->disaster_type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->preparedness_guide->Visible) { // preparedness_guide ?>
    <tr id="r_preparedness_guide"<?= $Page->preparedness_guide->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_disaster_preparedness_preparedness_guide"><?= $Page->preparedness_guide->caption() ?></span></td>
        <td data-name="preparedness_guide"<?= $Page->preparedness_guide->cellAttributes() ?>>
<span id="el_disaster_preparedness_preparedness_guide">
<span<?= $Page->preparedness_guide->viewAttributes() ?>>
<?= $Page->preparedness_guide->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->emergency_hotlines->Visible) { // emergency_hotlines ?>
    <tr id="r_emergency_hotlines"<?= $Page->emergency_hotlines->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_disaster_preparedness_emergency_hotlines"><?= $Page->emergency_hotlines->caption() ?></span></td>
        <td data-name="emergency_hotlines"<?= $Page->emergency_hotlines->cellAttributes() ?>>
<span id="el_disaster_preparedness_emergency_hotlines">
<span<?= $Page->emergency_hotlines->viewAttributes() ?>>
<?= $Page->emergency_hotlines->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->evacuation_centers->Visible) { // evacuation_centers ?>
    <tr id="r_evacuation_centers"<?= $Page->evacuation_centers->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_disaster_preparedness_evacuation_centers"><?= $Page->evacuation_centers->caption() ?></span></td>
        <td data-name="evacuation_centers"<?= $Page->evacuation_centers->cellAttributes() ?>>
<span id="el_disaster_preparedness_evacuation_centers">
<span<?= $Page->evacuation_centers->viewAttributes() ?>>
<?= $Page->evacuation_centers->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->relief_procedures->Visible) { // relief_procedures ?>
    <tr id="r_relief_procedures"<?= $Page->relief_procedures->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_disaster_preparedness_relief_procedures"><?= $Page->relief_procedures->caption() ?></span></td>
        <td data-name="relief_procedures"<?= $Page->relief_procedures->cellAttributes() ?>>
<span id="el_disaster_preparedness_relief_procedures">
<span<?= $Page->relief_procedures->viewAttributes() ?>>
<?= $Page->relief_procedures->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
    <tr id="r_featured_image"<?= $Page->featured_image->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_disaster_preparedness_featured_image"><?= $Page->featured_image->caption() ?></span></td>
        <td data-name="featured_image"<?= $Page->featured_image->cellAttributes() ?>>
<span id="el_disaster_preparedness_featured_image">
<span<?= $Page->featured_image->viewAttributes() ?>>
<?= $Page->featured_image->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
    <tr id="r_display_order"<?= $Page->display_order->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_disaster_preparedness_display_order"><?= $Page->display_order->caption() ?></span></td>
        <td data-name="display_order"<?= $Page->display_order->cellAttributes() ?>>
<span id="el_disaster_preparedness_display_order">
<span<?= $Page->display_order->viewAttributes() ?>>
<?= $Page->display_order->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <tr id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_disaster_preparedness_created_at"><?= $Page->created_at->caption() ?></span></td>
        <td data-name="created_at"<?= $Page->created_at->cellAttributes() ?>>
<span id="el_disaster_preparedness_created_at">
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
