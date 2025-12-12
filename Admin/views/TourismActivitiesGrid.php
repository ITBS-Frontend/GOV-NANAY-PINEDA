<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Set up and run Grid object
$Grid = Container("TourismActivitiesGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var ftourism_activitiesgrid;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let currentTable = <?= JsonEncode($Grid->toClientVar()) ?>;
    ew.deepAssign(ew.vars, { tables: { tourism_activities: currentTable } });
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("ftourism_activitiesgrid")
        .setPageId("grid")
        .setFormKeyCountName("<?= $Grid->FormKeyCountName ?>")

        // Add fields
        .setFields([
            ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
            ["destination_id", [fields.destination_id.visible && fields.destination_id.required ? ew.Validators.required(fields.destination_id.caption) : null, ew.Validators.integer], fields.destination_id.isInvalid],
            ["activity_name", [fields.activity_name.visible && fields.activity_name.required ? ew.Validators.required(fields.activity_name.caption) : null], fields.activity_name.isInvalid],
            ["duration", [fields.duration.visible && fields.duration.required ? ew.Validators.required(fields.duration.caption) : null], fields.duration.isInvalid],
            ["display_order", [fields.display_order.visible && fields.display_order.required ? ew.Validators.required(fields.display_order.caption) : null, ew.Validators.integer], fields.display_order.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null], fields.created_at.isInvalid],
            ["difficulty_level_id", [fields.difficulty_level_id.visible && fields.difficulty_level_id.required ? ew.Validators.required(fields.difficulty_level_id.caption) : null], fields.difficulty_level_id.isInvalid]
        ])

        // Check empty row
        .setEmptyRow(
            function (rowIndex) {
                let fobj = this.getForm(),
                    fields = [["destination_id",false],["activity_name",false],["duration",false],["display_order",false],["difficulty_level_id",false]];
                if (fields.some(field => ew.valueChanged(fobj, rowIndex, ...field)))
                    return false;
                return true;
            }
        )

        // Form_CustomValidate
        .setCustomValidate(
            function (fobj) { // DO NOT CHANGE THIS LINE! (except for adding "async" keyword)!
                    // Your custom validation code in JAVASCRIPT here, return false if invalid.
                    return true;
                }
        )

        // Use JavaScript validation or not
        .setValidateRequired(ew.CLIENT_VALIDATE)

        // Dynamic selection lists
        .setLists({
            "difficulty_level_id": <?= $Grid->difficulty_level_id->toClientList($Grid) ?>,
        })
        .build();
    window[form.id] = form;
    loadjs.done(form.id);
});
</script>
<?php } ?>
<main class="list">
<div id="ew-header-options">
<?php $Grid->HeaderOptions?->render("body") ?>
</div>
<div id="ew-list">
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?= $Grid->isAddOrEdit() ? " ew-grid-add-edit" : "" ?> <?= $Grid->TableGridClass ?>">
<div id="ftourism_activitiesgrid" class="ew-form ew-list-form">
<div id="gmp_tourism_activities" class="card-body ew-grid-middle-panel <?= $Grid->TableContainerClass ?>" style="<?= $Grid->TableContainerStyle ?>">
<table id="tbl_tourism_activitiesgrid" class="<?= $Grid->TableClass ?>"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Grid->RowType = RowType::HEADER;

// Render list options
$Grid->renderListOptions();

// Render list options (header, left)
$Grid->ListOptions->render("header", "left");
?>
<?php if ($Grid->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_tourism_activities_id" class="tourism_activities_id"><?= $Grid->renderFieldHeader($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->destination_id->Visible) { // destination_id ?>
        <th data-name="destination_id" class="<?= $Grid->destination_id->headerCellClass() ?>"><div id="elh_tourism_activities_destination_id" class="tourism_activities_destination_id"><?= $Grid->renderFieldHeader($Grid->destination_id) ?></div></th>
<?php } ?>
<?php if ($Grid->activity_name->Visible) { // activity_name ?>
        <th data-name="activity_name" class="<?= $Grid->activity_name->headerCellClass() ?>"><div id="elh_tourism_activities_activity_name" class="tourism_activities_activity_name"><?= $Grid->renderFieldHeader($Grid->activity_name) ?></div></th>
<?php } ?>
<?php if ($Grid->duration->Visible) { // duration ?>
        <th data-name="duration" class="<?= $Grid->duration->headerCellClass() ?>"><div id="elh_tourism_activities_duration" class="tourism_activities_duration"><?= $Grid->renderFieldHeader($Grid->duration) ?></div></th>
<?php } ?>
<?php if ($Grid->display_order->Visible) { // display_order ?>
        <th data-name="display_order" class="<?= $Grid->display_order->headerCellClass() ?>"><div id="elh_tourism_activities_display_order" class="tourism_activities_display_order"><?= $Grid->renderFieldHeader($Grid->display_order) ?></div></th>
<?php } ?>
<?php if ($Grid->created_at->Visible) { // created_at ?>
        <th data-name="created_at" class="<?= $Grid->created_at->headerCellClass() ?>"><div id="elh_tourism_activities_created_at" class="tourism_activities_created_at"><?= $Grid->renderFieldHeader($Grid->created_at) ?></div></th>
<?php } ?>
<?php if ($Grid->difficulty_level_id->Visible) { // difficulty_level_id ?>
        <th data-name="difficulty_level_id" class="<?= $Grid->difficulty_level_id->headerCellClass() ?>"><div id="elh_tourism_activities_difficulty_level_id" class="tourism_activities_difficulty_level_id"><?= $Grid->renderFieldHeader($Grid->difficulty_level_id) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Grid->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody data-page="<?= $Grid->getPageNumber() ?>">
<?php
$Grid->setupGrid();
while ($Grid->RecordCount < $Grid->StopRecord || $Grid->RowIndex === '$rowindex$') {
    if (
        $Grid->CurrentRow !== false &&
        $Grid->RowIndex !== '$rowindex$' &&
        (!$Grid->isGridAdd() || $Grid->CurrentMode == "copy") &&
        (!(($Grid->isCopy() || $Grid->isAdd()) && $Grid->RowIndex == 0))
    ) {
        $Grid->fetch();
    }
    $Grid->RecordCount++;
    if ($Grid->RecordCount >= $Grid->StartRecord) {
        $Grid->setupRow();

        // Skip 1) delete row / empty row for confirm page, 2) hidden row
        if (
            $Grid->RowAction != "delete" &&
            $Grid->RowAction != "insertdelete" &&
            !($Grid->RowAction == "insert" && $Grid->isConfirm() && $Grid->emptyRow()) &&
            $Grid->RowAction != "hide"
        ) {
?>
    <tr <?= $Grid->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Grid->ListOptions->render("body", "left", $Grid->RowCount);
?>
    <?php if ($Grid->id->Visible) { // id ?>
        <td data-name="id"<?= $Grid->id->cellAttributes() ?>>
<?php if ($Grid->RowType == RowType::ADD) { // Add record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_tourism_activities_id" class="el_tourism_activities_id"></span>
<input type="hidden" data-table="tourism_activities" data-field="x_id" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == RowType::EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_tourism_activities_id" class="el_tourism_activities_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
<input type="hidden" data-table="tourism_activities" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
</span>
<?php } ?>
<?php if ($Grid->RowType == RowType::VIEW) { // View record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_tourism_activities_id" class="el_tourism_activities_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="tourism_activities" data-field="x_id" data-hidden="1" name="ftourism_activitiesgrid$x<?= $Grid->RowIndex ?>_id" id="ftourism_activitiesgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="tourism_activities" data-field="x_id" data-hidden="1" data-old name="ftourism_activitiesgrid$o<?= $Grid->RowIndex ?>_id" id="ftourism_activitiesgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="tourism_activities" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->destination_id->Visible) { // destination_id ?>
        <td data-name="destination_id"<?= $Grid->destination_id->cellAttributes() ?>>
<?php if ($Grid->RowType == RowType::ADD) { // Add record ?>
<?php if ($Grid->destination_id->getSessionValue() != "") { ?>
<span<?= $Grid->destination_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->destination_id->getDisplayValue($Grid->destination_id->ViewValue))) ?>"></span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_destination_id" name="x<?= $Grid->RowIndex ?>_destination_id" value="<?= HtmlEncode($Grid->destination_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_tourism_activities_destination_id" class="el_tourism_activities_destination_id">
<input type="<?= $Grid->destination_id->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_destination_id" id="x<?= $Grid->RowIndex ?>_destination_id" data-table="tourism_activities" data-field="x_destination_id" value="<?= $Grid->destination_id->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Grid->destination_id->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->destination_id->formatPattern()) ?>"<?= $Grid->destination_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->destination_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="tourism_activities" data-field="x_destination_id" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_destination_id" id="o<?= $Grid->RowIndex ?>_destination_id" value="<?= HtmlEncode($Grid->destination_id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == RowType::EDIT) { // Edit record ?>
<?php if ($Grid->destination_id->getSessionValue() != "") { ?>
<span<?= $Grid->destination_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->destination_id->getDisplayValue($Grid->destination_id->ViewValue))) ?>"></span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_destination_id" name="x<?= $Grid->RowIndex ?>_destination_id" value="<?= HtmlEncode($Grid->destination_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_tourism_activities_destination_id" class="el_tourism_activities_destination_id">
<input type="<?= $Grid->destination_id->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_destination_id" id="x<?= $Grid->RowIndex ?>_destination_id" data-table="tourism_activities" data-field="x_destination_id" value="<?= $Grid->destination_id->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Grid->destination_id->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->destination_id->formatPattern()) ?>"<?= $Grid->destination_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->destination_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == RowType::VIEW) { // View record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_tourism_activities_destination_id" class="el_tourism_activities_destination_id">
<span<?= $Grid->destination_id->viewAttributes() ?>>
<?= $Grid->destination_id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="tourism_activities" data-field="x_destination_id" data-hidden="1" name="ftourism_activitiesgrid$x<?= $Grid->RowIndex ?>_destination_id" id="ftourism_activitiesgrid$x<?= $Grid->RowIndex ?>_destination_id" value="<?= HtmlEncode($Grid->destination_id->FormValue) ?>">
<input type="hidden" data-table="tourism_activities" data-field="x_destination_id" data-hidden="1" data-old name="ftourism_activitiesgrid$o<?= $Grid->RowIndex ?>_destination_id" id="ftourism_activitiesgrid$o<?= $Grid->RowIndex ?>_destination_id" value="<?= HtmlEncode($Grid->destination_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->activity_name->Visible) { // activity_name ?>
        <td data-name="activity_name"<?= $Grid->activity_name->cellAttributes() ?>>
<?php if ($Grid->RowType == RowType::ADD) { // Add record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_tourism_activities_activity_name" class="el_tourism_activities_activity_name">
<input type="<?= $Grid->activity_name->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_activity_name" id="x<?= $Grid->RowIndex ?>_activity_name" data-table="tourism_activities" data-field="x_activity_name" value="<?= $Grid->activity_name->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Grid->activity_name->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->activity_name->formatPattern()) ?>"<?= $Grid->activity_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->activity_name->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="tourism_activities" data-field="x_activity_name" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_activity_name" id="o<?= $Grid->RowIndex ?>_activity_name" value="<?= HtmlEncode($Grid->activity_name->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == RowType::EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_tourism_activities_activity_name" class="el_tourism_activities_activity_name">
<input type="<?= $Grid->activity_name->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_activity_name" id="x<?= $Grid->RowIndex ?>_activity_name" data-table="tourism_activities" data-field="x_activity_name" value="<?= $Grid->activity_name->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Grid->activity_name->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->activity_name->formatPattern()) ?>"<?= $Grid->activity_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->activity_name->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == RowType::VIEW) { // View record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_tourism_activities_activity_name" class="el_tourism_activities_activity_name">
<span<?= $Grid->activity_name->viewAttributes() ?>>
<?= $Grid->activity_name->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="tourism_activities" data-field="x_activity_name" data-hidden="1" name="ftourism_activitiesgrid$x<?= $Grid->RowIndex ?>_activity_name" id="ftourism_activitiesgrid$x<?= $Grid->RowIndex ?>_activity_name" value="<?= HtmlEncode($Grid->activity_name->FormValue) ?>">
<input type="hidden" data-table="tourism_activities" data-field="x_activity_name" data-hidden="1" data-old name="ftourism_activitiesgrid$o<?= $Grid->RowIndex ?>_activity_name" id="ftourism_activitiesgrid$o<?= $Grid->RowIndex ?>_activity_name" value="<?= HtmlEncode($Grid->activity_name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->duration->Visible) { // duration ?>
        <td data-name="duration"<?= $Grid->duration->cellAttributes() ?>>
<?php if ($Grid->RowType == RowType::ADD) { // Add record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_tourism_activities_duration" class="el_tourism_activities_duration">
<input type="<?= $Grid->duration->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_duration" id="x<?= $Grid->RowIndex ?>_duration" data-table="tourism_activities" data-field="x_duration" value="<?= $Grid->duration->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->duration->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->duration->formatPattern()) ?>"<?= $Grid->duration->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->duration->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="tourism_activities" data-field="x_duration" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_duration" id="o<?= $Grid->RowIndex ?>_duration" value="<?= HtmlEncode($Grid->duration->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == RowType::EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_tourism_activities_duration" class="el_tourism_activities_duration">
<input type="<?= $Grid->duration->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_duration" id="x<?= $Grid->RowIndex ?>_duration" data-table="tourism_activities" data-field="x_duration" value="<?= $Grid->duration->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->duration->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->duration->formatPattern()) ?>"<?= $Grid->duration->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->duration->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == RowType::VIEW) { // View record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_tourism_activities_duration" class="el_tourism_activities_duration">
<span<?= $Grid->duration->viewAttributes() ?>>
<?= $Grid->duration->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="tourism_activities" data-field="x_duration" data-hidden="1" name="ftourism_activitiesgrid$x<?= $Grid->RowIndex ?>_duration" id="ftourism_activitiesgrid$x<?= $Grid->RowIndex ?>_duration" value="<?= HtmlEncode($Grid->duration->FormValue) ?>">
<input type="hidden" data-table="tourism_activities" data-field="x_duration" data-hidden="1" data-old name="ftourism_activitiesgrid$o<?= $Grid->RowIndex ?>_duration" id="ftourism_activitiesgrid$o<?= $Grid->RowIndex ?>_duration" value="<?= HtmlEncode($Grid->duration->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->display_order->Visible) { // display_order ?>
        <td data-name="display_order"<?= $Grid->display_order->cellAttributes() ?>>
<?php if ($Grid->RowType == RowType::ADD) { // Add record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_tourism_activities_display_order" class="el_tourism_activities_display_order">
<input type="<?= $Grid->display_order->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_display_order" id="x<?= $Grid->RowIndex ?>_display_order" data-table="tourism_activities" data-field="x_display_order" value="<?= $Grid->display_order->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Grid->display_order->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->display_order->formatPattern()) ?>"<?= $Grid->display_order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->display_order->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="tourism_activities" data-field="x_display_order" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_display_order" id="o<?= $Grid->RowIndex ?>_display_order" value="<?= HtmlEncode($Grid->display_order->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == RowType::EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_tourism_activities_display_order" class="el_tourism_activities_display_order">
<input type="<?= $Grid->display_order->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_display_order" id="x<?= $Grid->RowIndex ?>_display_order" data-table="tourism_activities" data-field="x_display_order" value="<?= $Grid->display_order->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Grid->display_order->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->display_order->formatPattern()) ?>"<?= $Grid->display_order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->display_order->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == RowType::VIEW) { // View record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_tourism_activities_display_order" class="el_tourism_activities_display_order">
<span<?= $Grid->display_order->viewAttributes() ?>>
<?= $Grid->display_order->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="tourism_activities" data-field="x_display_order" data-hidden="1" name="ftourism_activitiesgrid$x<?= $Grid->RowIndex ?>_display_order" id="ftourism_activitiesgrid$x<?= $Grid->RowIndex ?>_display_order" value="<?= HtmlEncode($Grid->display_order->FormValue) ?>">
<input type="hidden" data-table="tourism_activities" data-field="x_display_order" data-hidden="1" data-old name="ftourism_activitiesgrid$o<?= $Grid->RowIndex ?>_display_order" id="ftourism_activitiesgrid$o<?= $Grid->RowIndex ?>_display_order" value="<?= HtmlEncode($Grid->display_order->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->created_at->Visible) { // created_at ?>
        <td data-name="created_at"<?= $Grid->created_at->cellAttributes() ?>>
<?php if ($Grid->RowType == RowType::ADD) { // Add record ?>
<input type="hidden" data-table="tourism_activities" data-field="x_created_at" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_created_at" id="o<?= $Grid->RowIndex ?>_created_at" value="<?= HtmlEncode($Grid->created_at->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == RowType::EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == RowType::VIEW) { // View record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_tourism_activities_created_at" class="el_tourism_activities_created_at">
<span<?= $Grid->created_at->viewAttributes() ?>>
<?= $Grid->created_at->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="tourism_activities" data-field="x_created_at" data-hidden="1" name="ftourism_activitiesgrid$x<?= $Grid->RowIndex ?>_created_at" id="ftourism_activitiesgrid$x<?= $Grid->RowIndex ?>_created_at" value="<?= HtmlEncode($Grid->created_at->FormValue) ?>">
<input type="hidden" data-table="tourism_activities" data-field="x_created_at" data-hidden="1" data-old name="ftourism_activitiesgrid$o<?= $Grid->RowIndex ?>_created_at" id="ftourism_activitiesgrid$o<?= $Grid->RowIndex ?>_created_at" value="<?= HtmlEncode($Grid->created_at->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->difficulty_level_id->Visible) { // difficulty_level_id ?>
        <td data-name="difficulty_level_id"<?= $Grid->difficulty_level_id->cellAttributes() ?>>
<?php if ($Grid->RowType == RowType::ADD) { // Add record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_tourism_activities_difficulty_level_id" class="el_tourism_activities_difficulty_level_id">
    <select
        id="x<?= $Grid->RowIndex ?>_difficulty_level_id"
        name="x<?= $Grid->RowIndex ?>_difficulty_level_id"
        class="form-select ew-select<?= $Grid->difficulty_level_id->isInvalidClass() ?>"
        <?php if (!$Grid->difficulty_level_id->IsNativeSelect) { ?>
        data-select2-id="ftourism_activitiesgrid_x<?= $Grid->RowIndex ?>_difficulty_level_id"
        <?php } ?>
        data-table="tourism_activities"
        data-field="x_difficulty_level_id"
        data-value-separator="<?= $Grid->difficulty_level_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->difficulty_level_id->getPlaceHolder()) ?>"
        <?= $Grid->difficulty_level_id->editAttributes() ?>>
        <?= $Grid->difficulty_level_id->selectOptionListHtml("x{$Grid->RowIndex}_difficulty_level_id") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->difficulty_level_id->getErrorMessage() ?></div>
<?= $Grid->difficulty_level_id->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_difficulty_level_id") ?>
<?php if (!$Grid->difficulty_level_id->IsNativeSelect) { ?>
<script>
loadjs.ready("ftourism_activitiesgrid", function() {
    var options = { name: "x<?= $Grid->RowIndex ?>_difficulty_level_id", selectId: "ftourism_activitiesgrid_x<?= $Grid->RowIndex ?>_difficulty_level_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (ftourism_activitiesgrid.lists.difficulty_level_id?.lookupOptions.length) {
        options.data = { id: "x<?= $Grid->RowIndex ?>_difficulty_level_id", form: "ftourism_activitiesgrid" };
    } else {
        options.ajax = { id: "x<?= $Grid->RowIndex ?>_difficulty_level_id", form: "ftourism_activitiesgrid", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.tourism_activities.fields.difficulty_level_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="tourism_activities" data-field="x_difficulty_level_id" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_difficulty_level_id" id="o<?= $Grid->RowIndex ?>_difficulty_level_id" value="<?= HtmlEncode($Grid->difficulty_level_id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == RowType::EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_tourism_activities_difficulty_level_id" class="el_tourism_activities_difficulty_level_id">
    <select
        id="x<?= $Grid->RowIndex ?>_difficulty_level_id"
        name="x<?= $Grid->RowIndex ?>_difficulty_level_id"
        class="form-select ew-select<?= $Grid->difficulty_level_id->isInvalidClass() ?>"
        <?php if (!$Grid->difficulty_level_id->IsNativeSelect) { ?>
        data-select2-id="ftourism_activitiesgrid_x<?= $Grid->RowIndex ?>_difficulty_level_id"
        <?php } ?>
        data-table="tourism_activities"
        data-field="x_difficulty_level_id"
        data-value-separator="<?= $Grid->difficulty_level_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->difficulty_level_id->getPlaceHolder()) ?>"
        <?= $Grid->difficulty_level_id->editAttributes() ?>>
        <?= $Grid->difficulty_level_id->selectOptionListHtml("x{$Grid->RowIndex}_difficulty_level_id") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->difficulty_level_id->getErrorMessage() ?></div>
<?= $Grid->difficulty_level_id->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_difficulty_level_id") ?>
<?php if (!$Grid->difficulty_level_id->IsNativeSelect) { ?>
<script>
loadjs.ready("ftourism_activitiesgrid", function() {
    var options = { name: "x<?= $Grid->RowIndex ?>_difficulty_level_id", selectId: "ftourism_activitiesgrid_x<?= $Grid->RowIndex ?>_difficulty_level_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (ftourism_activitiesgrid.lists.difficulty_level_id?.lookupOptions.length) {
        options.data = { id: "x<?= $Grid->RowIndex ?>_difficulty_level_id", form: "ftourism_activitiesgrid" };
    } else {
        options.ajax = { id: "x<?= $Grid->RowIndex ?>_difficulty_level_id", form: "ftourism_activitiesgrid", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.tourism_activities.fields.difficulty_level_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == RowType::VIEW) { // View record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_tourism_activities_difficulty_level_id" class="el_tourism_activities_difficulty_level_id">
<span<?= $Grid->difficulty_level_id->viewAttributes() ?>>
<?= $Grid->difficulty_level_id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="tourism_activities" data-field="x_difficulty_level_id" data-hidden="1" name="ftourism_activitiesgrid$x<?= $Grid->RowIndex ?>_difficulty_level_id" id="ftourism_activitiesgrid$x<?= $Grid->RowIndex ?>_difficulty_level_id" value="<?= HtmlEncode($Grid->difficulty_level_id->FormValue) ?>">
<input type="hidden" data-table="tourism_activities" data-field="x_difficulty_level_id" data-hidden="1" data-old name="ftourism_activitiesgrid$o<?= $Grid->RowIndex ?>_difficulty_level_id" id="ftourism_activitiesgrid$o<?= $Grid->RowIndex ?>_difficulty_level_id" value="<?= HtmlEncode($Grid->difficulty_level_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowCount);
?>
    </tr>
<?php if ($Grid->RowType == RowType::ADD || $Grid->RowType == RowType::EDIT) { ?>
<script data-rowindex="<?= $Grid->RowIndex ?>">
loadjs.ready(["ftourism_activitiesgrid","load"], () => ftourism_activitiesgrid.updateLists(<?= $Grid->RowIndex ?><?= $Grid->isAdd() || $Grid->isEdit() || $Grid->isCopy() || $Grid->RowIndex === '$rowindex$' ? ", true" : "" ?>));
</script>
<?php } ?>
<?php
    }
    } // End delete row checking

    // Reset for template row
    if ($Grid->RowIndex === '$rowindex$') {
        $Grid->RowIndex = 0;
    }
    // Reset inline add/copy row
    if (($Grid->isCopy() || $Grid->isAdd()) && $Grid->RowIndex == 0) {
        $Grid->RowIndex = 1;
    }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($Grid->CurrentMode == "add" || $Grid->CurrentMode == "copy") { ?>
<input type="hidden" name="<?= $Grid->FormKeyCountName ?>" id="<?= $Grid->FormKeyCountName ?>" value="<?= $Grid->KeyCount ?>">
<?= $Grid->MultiSelectKey ?>
<?php } ?>
<?php if ($Grid->CurrentMode == "edit") { ?>
<input type="hidden" name="<?= $Grid->FormKeyCountName ?>" id="<?= $Grid->FormKeyCountName ?>" value="<?= $Grid->KeyCount ?>">
<?= $Grid->MultiSelectKey ?>
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($Grid->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="ftourism_activitiesgrid">
</div><!-- /.ew-list-form -->
<?php
// Close result set
$Grid->Recordset?->free();
?>
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $Grid->OtherOptions->render("body", "bottom") ?>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } else { ?>
<div class="ew-list-other-options">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<?php } ?>
</div>
<div id="ew-footer-options">
<?php $Grid->FooterOptions?->render("body") ?>
</div>
</main>
<?php if (!$Grid->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("tourism_activities");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
