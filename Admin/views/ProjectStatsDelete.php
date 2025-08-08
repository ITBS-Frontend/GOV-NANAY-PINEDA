<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$ProjectStatsDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { project_stats: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fproject_statsdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fproject_statsdelete")
        .setPageId("delete")
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
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fproject_statsdelete" id="fproject_statsdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="project_stats">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid <?= $Page->TableGridClass ?>">
<div class="card-body ew-grid-middle-panel <?= $Page->TableContainerClass ?>" style="<?= $Page->TableContainerStyle ?>">
<table class="<?= $Page->TableClass ?>">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_project_stats_id" class="project_stats_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->project_id->Visible) { // project_id ?>
        <th class="<?= $Page->project_id->headerCellClass() ?>"><span id="elh_project_stats_project_id" class="project_stats_project_id"><?= $Page->project_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->stat_label->Visible) { // stat_label ?>
        <th class="<?= $Page->stat_label->headerCellClass() ?>"><span id="elh_project_stats_stat_label" class="project_stats_stat_label"><?= $Page->stat_label->caption() ?></span></th>
<?php } ?>
<?php if ($Page->stat_value->Visible) { // stat_value ?>
        <th class="<?= $Page->stat_value->headerCellClass() ?>"><span id="elh_project_stats_stat_value" class="project_stats_stat_value"><?= $Page->stat_value->caption() ?></span></th>
<?php } ?>
<?php if ($Page->stat_description->Visible) { // stat_description ?>
        <th class="<?= $Page->stat_description->headerCellClass() ?>"><span id="elh_project_stats_stat_description" class="project_stats_stat_description"><?= $Page->stat_description->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
        <th class="<?= $Page->created_at->headerCellClass() ?>"><span id="elh_project_stats_created_at" class="project_stats_created_at"><?= $Page->created_at->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while ($Page->fetch()) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = RowType::VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->CurrentRow);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id->Visible) { // id ?>
        <td<?= $Page->id->cellAttributes() ?>>
<span id="">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->project_id->Visible) { // project_id ?>
        <td<?= $Page->project_id->cellAttributes() ?>>
<span id="">
<span<?= $Page->project_id->viewAttributes() ?>>
<?= $Page->project_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->stat_label->Visible) { // stat_label ?>
        <td<?= $Page->stat_label->cellAttributes() ?>>
<span id="">
<span<?= $Page->stat_label->viewAttributes() ?>>
<?= $Page->stat_label->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->stat_value->Visible) { // stat_value ?>
        <td<?= $Page->stat_value->cellAttributes() ?>>
<span id="">
<span<?= $Page->stat_value->viewAttributes() ?>>
<?= $Page->stat_value->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->stat_description->Visible) { // stat_description ?>
        <td<?= $Page->stat_description->cellAttributes() ?>>
<span id="">
<span<?= $Page->stat_description->viewAttributes() ?>>
<?= $Page->stat_description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
        <td<?= $Page->created_at->cellAttributes() ?>>
<span id="">
<span<?= $Page->created_at->viewAttributes() ?>>
<?= $Page->created_at->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
}
$Page->Recordset?->free();
?>
</tbody>
</table>
</div>
</div>
<div class="ew-buttons ew-desktop-buttons">
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
