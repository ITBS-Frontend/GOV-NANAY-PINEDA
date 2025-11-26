<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$EconomicIndicatorsView = &$Page;
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
<form name="feconomic_indicatorsview" id="feconomic_indicatorsview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { economic_indicators: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var feconomic_indicatorsview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("feconomic_indicatorsview")
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
<input type="hidden" name="t" value="economic_indicators">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id"<?= $Page->id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_economic_indicators_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id"<?= $Page->id->cellAttributes() ?>>
<span id="el_economic_indicators_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->indicator_name->Visible) { // indicator_name ?>
    <tr id="r_indicator_name"<?= $Page->indicator_name->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_economic_indicators_indicator_name"><?= $Page->indicator_name->caption() ?></span></td>
        <td data-name="indicator_name"<?= $Page->indicator_name->cellAttributes() ?>>
<span id="el_economic_indicators_indicator_name">
<span<?= $Page->indicator_name->viewAttributes() ?>>
<?= $Page->indicator_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->value->Visible) { // value ?>
    <tr id="r_value"<?= $Page->value->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_economic_indicators_value"><?= $Page->value->caption() ?></span></td>
        <td data-name="value"<?= $Page->value->cellAttributes() ?>>
<span id="el_economic_indicators_value">
<span<?= $Page->value->viewAttributes() ?>>
<?= $Page->value->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->unit->Visible) { // unit ?>
    <tr id="r_unit"<?= $Page->unit->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_economic_indicators_unit"><?= $Page->unit->caption() ?></span></td>
        <td data-name="unit"<?= $Page->unit->cellAttributes() ?>>
<span id="el_economic_indicators_unit">
<span<?= $Page->unit->viewAttributes() ?>>
<?= $Page->unit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->year->Visible) { // year ?>
    <tr id="r_year"<?= $Page->year->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_economic_indicators_year"><?= $Page->year->caption() ?></span></td>
        <td data-name="year"<?= $Page->year->cellAttributes() ?>>
<span id="el_economic_indicators_year">
<span<?= $Page->year->viewAttributes() ?>>
<?= $Page->year->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->quarter->Visible) { // quarter ?>
    <tr id="r_quarter"<?= $Page->quarter->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_economic_indicators_quarter"><?= $Page->quarter->caption() ?></span></td>
        <td data-name="quarter"<?= $Page->quarter->cellAttributes() ?>>
<span id="el_economic_indicators_quarter">
<span<?= $Page->quarter->viewAttributes() ?>>
<?= $Page->quarter->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->source->Visible) { // source ?>
    <tr id="r_source"<?= $Page->source->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_economic_indicators_source"><?= $Page->source->caption() ?></span></td>
        <td data-name="source"<?= $Page->source->cellAttributes() ?>>
<span id="el_economic_indicators_source">
<span<?= $Page->source->viewAttributes() ?>>
<?= $Page->source->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
    <tr id="r_display_order"<?= $Page->display_order->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_economic_indicators_display_order"><?= $Page->display_order->caption() ?></span></td>
        <td data-name="display_order"<?= $Page->display_order->cellAttributes() ?>>
<span id="el_economic_indicators_display_order">
<span<?= $Page->display_order->viewAttributes() ?>>
<?= $Page->display_order->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <tr id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_economic_indicators_created_at"><?= $Page->created_at->caption() ?></span></td>
        <td data-name="created_at"<?= $Page->created_at->cellAttributes() ?>>
<span id="el_economic_indicators_created_at">
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
