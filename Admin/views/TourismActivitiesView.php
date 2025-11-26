<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$TourismActivitiesView = &$Page;
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
<form name="ftourism_activitiesview" id="ftourism_activitiesview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { tourism_activities: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var ftourism_activitiesview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("ftourism_activitiesview")
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
<input type="hidden" name="t" value="tourism_activities">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id"<?= $Page->id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_activities_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id"<?= $Page->id->cellAttributes() ?>>
<span id="el_tourism_activities_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->destination_id->Visible) { // destination_id ?>
    <tr id="r_destination_id"<?= $Page->destination_id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_activities_destination_id"><?= $Page->destination_id->caption() ?></span></td>
        <td data-name="destination_id"<?= $Page->destination_id->cellAttributes() ?>>
<span id="el_tourism_activities_destination_id">
<span<?= $Page->destination_id->viewAttributes() ?>>
<?= $Page->destination_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->activity_name->Visible) { // activity_name ?>
    <tr id="r_activity_name"<?= $Page->activity_name->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_activities_activity_name"><?= $Page->activity_name->caption() ?></span></td>
        <td data-name="activity_name"<?= $Page->activity_name->cellAttributes() ?>>
<span id="el_tourism_activities_activity_name">
<span<?= $Page->activity_name->viewAttributes() ?>>
<?= $Page->activity_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <tr id="r_description"<?= $Page->description->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_activities_description"><?= $Page->description->caption() ?></span></td>
        <td data-name="description"<?= $Page->description->cellAttributes() ?>>
<span id="el_tourism_activities_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->duration->Visible) { // duration ?>
    <tr id="r_duration"<?= $Page->duration->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_activities_duration"><?= $Page->duration->caption() ?></span></td>
        <td data-name="duration"<?= $Page->duration->cellAttributes() ?>>
<span id="el_tourism_activities_duration">
<span<?= $Page->duration->viewAttributes() ?>>
<?= $Page->duration->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->difficulty_level->Visible) { // difficulty_level ?>
    <tr id="r_difficulty_level"<?= $Page->difficulty_level->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_activities_difficulty_level"><?= $Page->difficulty_level->caption() ?></span></td>
        <td data-name="difficulty_level"<?= $Page->difficulty_level->cellAttributes() ?>>
<span id="el_tourism_activities_difficulty_level">
<span<?= $Page->difficulty_level->viewAttributes() ?>>
<?= $Page->difficulty_level->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
    <tr id="r_display_order"<?= $Page->display_order->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_activities_display_order"><?= $Page->display_order->caption() ?></span></td>
        <td data-name="display_order"<?= $Page->display_order->cellAttributes() ?>>
<span id="el_tourism_activities_display_order">
<span<?= $Page->display_order->viewAttributes() ?>>
<?= $Page->display_order->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <tr id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tourism_activities_created_at"><?= $Page->created_at->caption() ?></span></td>
        <td data-name="created_at"<?= $Page->created_at->cellAttributes() ?>>
<span id="el_tourism_activities_created_at">
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
