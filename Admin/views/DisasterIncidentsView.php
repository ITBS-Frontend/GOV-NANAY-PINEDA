<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$DisasterIncidentsView = &$Page;
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
<form name="fdisaster_incidentsview" id="fdisaster_incidentsview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { disaster_incidents: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var fdisaster_incidentsview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fdisaster_incidentsview")
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
<input type="hidden" name="t" value="disaster_incidents">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id"<?= $Page->id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_disaster_incidents_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id"<?= $Page->id->cellAttributes() ?>>
<span id="el_disaster_incidents_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->incident_name->Visible) { // incident_name ?>
    <tr id="r_incident_name"<?= $Page->incident_name->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_disaster_incidents_incident_name"><?= $Page->incident_name->caption() ?></span></td>
        <td data-name="incident_name"<?= $Page->incident_name->cellAttributes() ?>>
<span id="el_disaster_incidents_incident_name">
<span<?= $Page->incident_name->viewAttributes() ?>>
<?= $Page->incident_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->occurrence_date->Visible) { // occurrence_date ?>
    <tr id="r_occurrence_date"<?= $Page->occurrence_date->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_disaster_incidents_occurrence_date"><?= $Page->occurrence_date->caption() ?></span></td>
        <td data-name="occurrence_date"<?= $Page->occurrence_date->cellAttributes() ?>>
<span id="el_disaster_incidents_occurrence_date">
<span<?= $Page->occurrence_date->viewAttributes() ?>>
<?= $Page->occurrence_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->affected_areas->Visible) { // affected_areas ?>
    <tr id="r_affected_areas"<?= $Page->affected_areas->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_disaster_incidents_affected_areas"><?= $Page->affected_areas->caption() ?></span></td>
        <td data-name="affected_areas"<?= $Page->affected_areas->cellAttributes() ?>>
<span id="el_disaster_incidents_affected_areas">
<span<?= $Page->affected_areas->viewAttributes() ?>>
<?= $Page->affected_areas->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->casualties->Visible) { // casualties ?>
    <tr id="r_casualties"<?= $Page->casualties->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_disaster_incidents_casualties"><?= $Page->casualties->caption() ?></span></td>
        <td data-name="casualties"<?= $Page->casualties->cellAttributes() ?>>
<span id="el_disaster_incidents_casualties">
<span<?= $Page->casualties->viewAttributes() ?>>
<?= $Page->casualties->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->damages_estimated->Visible) { // damages_estimated ?>
    <tr id="r_damages_estimated"<?= $Page->damages_estimated->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_disaster_incidents_damages_estimated"><?= $Page->damages_estimated->caption() ?></span></td>
        <td data-name="damages_estimated"<?= $Page->damages_estimated->cellAttributes() ?>>
<span id="el_disaster_incidents_damages_estimated">
<span<?= $Page->damages_estimated->viewAttributes() ?>>
<?= $Page->damages_estimated->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->response_actions->Visible) { // response_actions ?>
    <tr id="r_response_actions"<?= $Page->response_actions->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_disaster_incidents_response_actions"><?= $Page->response_actions->caption() ?></span></td>
        <td data-name="response_actions"<?= $Page->response_actions->cellAttributes() ?>>
<span id="el_disaster_incidents_response_actions">
<span<?= $Page->response_actions->viewAttributes() ?>>
<?= $Page->response_actions->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->lessons_learned->Visible) { // lessons_learned ?>
    <tr id="r_lessons_learned"<?= $Page->lessons_learned->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_disaster_incidents_lessons_learned"><?= $Page->lessons_learned->caption() ?></span></td>
        <td data-name="lessons_learned"<?= $Page->lessons_learned->cellAttributes() ?>>
<span id="el_disaster_incidents_lessons_learned">
<span<?= $Page->lessons_learned->viewAttributes() ?>>
<?= $Page->lessons_learned->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <tr id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_disaster_incidents_created_at"><?= $Page->created_at->caption() ?></span></td>
        <td data-name="created_at"<?= $Page->created_at->cellAttributes() ?>>
<span id="el_disaster_incidents_created_at">
<span<?= $Page->created_at->viewAttributes() ?>>
<?= $Page->created_at->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->incident_type_id->Visible) { // incident_type_id ?>
    <tr id="r_incident_type_id"<?= $Page->incident_type_id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_disaster_incidents_incident_type_id"><?= $Page->incident_type_id->caption() ?></span></td>
        <td data-name="incident_type_id"<?= $Page->incident_type_id->cellAttributes() ?>>
<span id="el_disaster_incidents_incident_type_id">
<span<?= $Page->incident_type_id->viewAttributes() ?>>
<?= $Page->incident_type_id->getViewValue() ?></span>
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
