<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Set up and run Grid object
$Grid = Container("ProjectGalleryGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var fproject_gallerygrid;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let currentTable = <?= JsonEncode($Grid->toClientVar()) ?>;
    ew.deepAssign(ew.vars, { tables: { project_gallery: currentTable } });
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fproject_gallerygrid")
        .setPageId("grid")
        .setFormKeyCountName("<?= $Grid->FormKeyCountName ?>")

        // Add fields
        .setFields([
            ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
            ["project_id", [fields.project_id.visible && fields.project_id.required ? ew.Validators.required(fields.project_id.caption) : null], fields.project_id.isInvalid],
            ["image_path", [fields.image_path.visible && fields.image_path.required ? ew.Validators.fileRequired(fields.image_path.caption) : null], fields.image_path.isInvalid],
            ["caption", [fields.caption.visible && fields.caption.required ? ew.Validators.required(fields.caption.caption) : null], fields.caption.isInvalid],
            ["display_order", [fields.display_order.visible && fields.display_order.required ? ew.Validators.required(fields.display_order.caption) : null, ew.Validators.integer], fields.display_order.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null], fields.created_at.isInvalid]
        ])

        // Check empty row
        .setEmptyRow(
            function (rowIndex) {
                let fobj = this.getForm(),
                    fields = [["project_id",false],["image_path",false],["caption",false],["display_order",false]];
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
            "project_id": <?= $Grid->project_id->toClientList($Grid) ?>,
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
<div id="fproject_gallerygrid" class="ew-form ew-list-form">
<div id="gmp_project_gallery" class="card-body ew-grid-middle-panel <?= $Grid->TableContainerClass ?>" style="<?= $Grid->TableContainerStyle ?>">
<table id="tbl_project_gallerygrid" class="<?= $Grid->TableClass ?>"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_project_gallery_id" class="project_gallery_id"><?= $Grid->renderFieldHeader($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->project_id->Visible) { // project_id ?>
        <th data-name="project_id" class="<?= $Grid->project_id->headerCellClass() ?>"><div id="elh_project_gallery_project_id" class="project_gallery_project_id"><?= $Grid->renderFieldHeader($Grid->project_id) ?></div></th>
<?php } ?>
<?php if ($Grid->image_path->Visible) { // image_path ?>
        <th data-name="image_path" class="<?= $Grid->image_path->headerCellClass() ?>"><div id="elh_project_gallery_image_path" class="project_gallery_image_path"><?= $Grid->renderFieldHeader($Grid->image_path) ?></div></th>
<?php } ?>
<?php if ($Grid->caption->Visible) { // caption ?>
        <th data-name="caption" class="<?= $Grid->caption->headerCellClass() ?>"><div id="elh_project_gallery_caption" class="project_gallery_caption"><?= $Grid->renderFieldHeader($Grid->caption) ?></div></th>
<?php } ?>
<?php if ($Grid->display_order->Visible) { // display_order ?>
        <th data-name="display_order" class="<?= $Grid->display_order->headerCellClass() ?>"><div id="elh_project_gallery_display_order" class="project_gallery_display_order"><?= $Grid->renderFieldHeader($Grid->display_order) ?></div></th>
<?php } ?>
<?php if ($Grid->created_at->Visible) { // created_at ?>
        <th data-name="created_at" class="<?= $Grid->created_at->headerCellClass() ?>"><div id="elh_project_gallery_created_at" class="project_gallery_created_at"><?= $Grid->renderFieldHeader($Grid->created_at) ?></div></th>
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
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_project_gallery_id" class="el_project_gallery_id"></span>
<input type="hidden" data-table="project_gallery" data-field="x_id" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == RowType::EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_project_gallery_id" class="el_project_gallery_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
<input type="hidden" data-table="project_gallery" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
</span>
<?php } ?>
<?php if ($Grid->RowType == RowType::VIEW) { // View record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_project_gallery_id" class="el_project_gallery_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="project_gallery" data-field="x_id" data-hidden="1" name="fproject_gallerygrid$x<?= $Grid->RowIndex ?>_id" id="fproject_gallerygrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="project_gallery" data-field="x_id" data-hidden="1" data-old name="fproject_gallerygrid$o<?= $Grid->RowIndex ?>_id" id="fproject_gallerygrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="project_gallery" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->project_id->Visible) { // project_id ?>
        <td data-name="project_id"<?= $Grid->project_id->cellAttributes() ?>>
<?php if ($Grid->RowType == RowType::ADD) { // Add record ?>
<?php if ($Grid->project_id->getSessionValue() != "") { ?>
<span<?= $Grid->project_id->viewAttributes() ?>>
<span class="form-control-plaintext"><?= $Grid->project_id->getDisplayValue($Grid->project_id->ViewValue) ?></span></span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_project_id" name="x<?= $Grid->RowIndex ?>_project_id" value="<?= HtmlEncode($Grid->project_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_project_gallery_project_id" class="el_project_gallery_project_id">
    <select
        id="x<?= $Grid->RowIndex ?>_project_id"
        name="x<?= $Grid->RowIndex ?>_project_id"
        class="form-select ew-select<?= $Grid->project_id->isInvalidClass() ?>"
        <?php if (!$Grid->project_id->IsNativeSelect) { ?>
        data-select2-id="fproject_gallerygrid_x<?= $Grid->RowIndex ?>_project_id"
        <?php } ?>
        data-table="project_gallery"
        data-field="x_project_id"
        data-value-separator="<?= $Grid->project_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->project_id->getPlaceHolder()) ?>"
        <?= $Grid->project_id->editAttributes() ?>>
        <?= $Grid->project_id->selectOptionListHtml("x{$Grid->RowIndex}_project_id") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->project_id->getErrorMessage() ?></div>
<?= $Grid->project_id->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_project_id") ?>
<?php if (!$Grid->project_id->IsNativeSelect) { ?>
<script>
loadjs.ready("fproject_gallerygrid", function() {
    var options = { name: "x<?= $Grid->RowIndex ?>_project_id", selectId: "fproject_gallerygrid_x<?= $Grid->RowIndex ?>_project_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fproject_gallerygrid.lists.project_id?.lookupOptions.length) {
        options.data = { id: "x<?= $Grid->RowIndex ?>_project_id", form: "fproject_gallerygrid" };
    } else {
        options.ajax = { id: "x<?= $Grid->RowIndex ?>_project_id", form: "fproject_gallerygrid", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.project_gallery.fields.project_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
<?php } ?>
<input type="hidden" data-table="project_gallery" data-field="x_project_id" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_project_id" id="o<?= $Grid->RowIndex ?>_project_id" value="<?= HtmlEncode($Grid->project_id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == RowType::EDIT) { // Edit record ?>
<?php if ($Grid->project_id->getSessionValue() != "") { ?>
<span<?= $Grid->project_id->viewAttributes() ?>>
<span class="form-control-plaintext"><?= $Grid->project_id->getDisplayValue($Grid->project_id->ViewValue) ?></span></span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_project_id" name="x<?= $Grid->RowIndex ?>_project_id" value="<?= HtmlEncode($Grid->project_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_project_gallery_project_id" class="el_project_gallery_project_id">
    <select
        id="x<?= $Grid->RowIndex ?>_project_id"
        name="x<?= $Grid->RowIndex ?>_project_id"
        class="form-select ew-select<?= $Grid->project_id->isInvalidClass() ?>"
        <?php if (!$Grid->project_id->IsNativeSelect) { ?>
        data-select2-id="fproject_gallerygrid_x<?= $Grid->RowIndex ?>_project_id"
        <?php } ?>
        data-table="project_gallery"
        data-field="x_project_id"
        data-value-separator="<?= $Grid->project_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->project_id->getPlaceHolder()) ?>"
        <?= $Grid->project_id->editAttributes() ?>>
        <?= $Grid->project_id->selectOptionListHtml("x{$Grid->RowIndex}_project_id") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->project_id->getErrorMessage() ?></div>
<?= $Grid->project_id->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_project_id") ?>
<?php if (!$Grid->project_id->IsNativeSelect) { ?>
<script>
loadjs.ready("fproject_gallerygrid", function() {
    var options = { name: "x<?= $Grid->RowIndex ?>_project_id", selectId: "fproject_gallerygrid_x<?= $Grid->RowIndex ?>_project_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fproject_gallerygrid.lists.project_id?.lookupOptions.length) {
        options.data = { id: "x<?= $Grid->RowIndex ?>_project_id", form: "fproject_gallerygrid" };
    } else {
        options.ajax = { id: "x<?= $Grid->RowIndex ?>_project_id", form: "fproject_gallerygrid", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.project_gallery.fields.project_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == RowType::VIEW) { // View record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_project_gallery_project_id" class="el_project_gallery_project_id">
<span<?= $Grid->project_id->viewAttributes() ?>>
<?= $Grid->project_id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="project_gallery" data-field="x_project_id" data-hidden="1" name="fproject_gallerygrid$x<?= $Grid->RowIndex ?>_project_id" id="fproject_gallerygrid$x<?= $Grid->RowIndex ?>_project_id" value="<?= HtmlEncode($Grid->project_id->FormValue) ?>">
<input type="hidden" data-table="project_gallery" data-field="x_project_id" data-hidden="1" data-old name="fproject_gallerygrid$o<?= $Grid->RowIndex ?>_project_id" id="fproject_gallerygrid$o<?= $Grid->RowIndex ?>_project_id" value="<?= HtmlEncode($Grid->project_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->image_path->Visible) { // image_path ?>
        <td data-name="image_path"<?= $Grid->image_path->cellAttributes() ?>>
<?php if ($Grid->RowAction == "insert") { // Add record ?>
<?php if (!$Grid->isConfirm()) { ?>
<span id="el<?= $Grid->RowIndex ?>_project_gallery_image_path" class="el_project_gallery_image_path">
<div id="fd_x<?= $Grid->RowIndex ?>_image_path" class="fileinput-button ew-file-drop-zone">
    <input
        type="file"
        id="x<?= $Grid->RowIndex ?>_image_path"
        name="x<?= $Grid->RowIndex ?>_image_path"
        class="form-control ew-file-input"
        title="<?= $Grid->image_path->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="project_gallery"
        data-field="x_image_path"
        data-size="500"
        data-accept-file-types="<?= $Grid->image_path->acceptFileTypes() ?>"
        data-max-file-size="<?= $Grid->image_path->UploadMaxFileSize ?>"
        data-max-number-of-files="null"
        data-disable-image-crop="<?= $Grid->image_path->ImageCropper ? 0 : 1 ?>"
        <?= ($Grid->image_path->ReadOnly || $Grid->image_path->Disabled) ? " disabled" : "" ?>
        <?= $Grid->image_path->editAttributes() ?>
    >
    <div class="text-body-secondary ew-file-text"><?= $Language->phrase("ChooseFile") ?></div>
    <div class="invalid-feedback"><?= $Grid->image_path->getErrorMessage() ?></div>
</div>
<input type="hidden" name="fn_x<?= $Grid->RowIndex ?>_image_path" id= "fn_x<?= $Grid->RowIndex ?>_image_path" value="<?= $Grid->image_path->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Grid->RowIndex ?>_image_path" id= "fa_x<?= $Grid->RowIndex ?>_image_path" value="0">
<table id="ft_x<?= $Grid->RowIndex ?>_image_path" class="table table-sm float-start ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } else { ?>
<span id="el<?= $Grid->RowIndex ?>_project_gallery_image_path" class="el_project_gallery_image_path">
<div id="fd_x<?= $Grid->RowIndex ?>_image_path">
    <input
        type="file"
        id="x<?= $Grid->RowIndex ?>_image_path"
        name="x<?= $Grid->RowIndex ?>_image_path"
        class="form-control ew-file-input d-none"
        title="<?= $Grid->image_path->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="project_gallery"
        data-field="x_image_path"
        data-size="500"
        data-accept-file-types="<?= $Grid->image_path->acceptFileTypes() ?>"
        data-max-file-size="<?= $Grid->image_path->UploadMaxFileSize ?>"
        data-max-number-of-files="null"
        data-disable-image-crop="<?= $Grid->image_path->ImageCropper ? 0 : 1 ?>"
        <?= $Grid->image_path->editAttributes() ?>
    >
    <div class="invalid-feedback"><?= $Grid->image_path->getErrorMessage() ?></div>
</div>
<input type="hidden" name="fn_x<?= $Grid->RowIndex ?>_image_path" id= "fn_x<?= $Grid->RowIndex ?>_image_path" value="<?= $Grid->image_path->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Grid->RowIndex ?>_image_path" id= "fa_x<?= $Grid->RowIndex ?>_image_path" value="0">
<table id="ft_x<?= $Grid->RowIndex ?>_image_path" class="table table-sm float-start ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<input type="hidden" data-table="project_gallery" data-field="x_image_path" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_image_path" id="o<?= $Grid->RowIndex ?>_image_path" value="<?= HtmlEncode($Grid->image_path->OldValue) ?>">
<?php } elseif ($Grid->RowType == RowType::VIEW) { // View record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_project_gallery_image_path" class="el_project_gallery_image_path">
<span>
<?= GetFileViewTag($Grid->image_path, $Grid->image_path->getViewValue(), false) ?>
</span>
</span>
<?php } else  { // Edit record ?>
<?php if (!$Grid->isConfirm()) { ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_project_gallery_image_path" class="el_project_gallery_image_path">
<div id="fd_x<?= $Grid->RowIndex ?>_image_path" class="fileinput-button ew-file-drop-zone">
    <input
        type="file"
        id="x<?= $Grid->RowIndex ?>_image_path"
        name="x<?= $Grid->RowIndex ?>_image_path"
        class="form-control ew-file-input"
        title="<?= $Grid->image_path->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="project_gallery"
        data-field="x_image_path"
        data-size="500"
        data-accept-file-types="<?= $Grid->image_path->acceptFileTypes() ?>"
        data-max-file-size="<?= $Grid->image_path->UploadMaxFileSize ?>"
        data-max-number-of-files="null"
        data-disable-image-crop="<?= $Grid->image_path->ImageCropper ? 0 : 1 ?>"
        <?= ($Grid->image_path->ReadOnly || $Grid->image_path->Disabled) ? " disabled" : "" ?>
        <?= $Grid->image_path->editAttributes() ?>
    >
    <div class="text-body-secondary ew-file-text"><?= $Language->phrase("ChooseFile") ?></div>
    <div class="invalid-feedback"><?= $Grid->image_path->getErrorMessage() ?></div>
</div>
<input type="hidden" name="fn_x<?= $Grid->RowIndex ?>_image_path" id= "fn_x<?= $Grid->RowIndex ?>_image_path" value="<?= $Grid->image_path->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Grid->RowIndex ?>_image_path" id= "fa_x<?= $Grid->RowIndex ?>_image_path" value="<?= (Post("fa_x<?= $Grid->RowIndex ?>_image_path") == "0") ? "0" : "1" ?>">
<table id="ft_x<?= $Grid->RowIndex ?>_image_path" class="table table-sm float-start ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } else { ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_project_gallery_image_path" class="el_project_gallery_image_path">
<div id="fd_x<?= $Grid->RowIndex ?>_image_path">
    <input
        type="file"
        id="x<?= $Grid->RowIndex ?>_image_path"
        name="x<?= $Grid->RowIndex ?>_image_path"
        class="form-control ew-file-input d-none"
        title="<?= $Grid->image_path->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="project_gallery"
        data-field="x_image_path"
        data-size="500"
        data-accept-file-types="<?= $Grid->image_path->acceptFileTypes() ?>"
        data-max-file-size="<?= $Grid->image_path->UploadMaxFileSize ?>"
        data-max-number-of-files="null"
        data-disable-image-crop="<?= $Grid->image_path->ImageCropper ? 0 : 1 ?>"
        <?= $Grid->image_path->editAttributes() ?>
    >
    <div class="invalid-feedback"><?= $Grid->image_path->getErrorMessage() ?></div>
</div>
<input type="hidden" name="fn_x<?= $Grid->RowIndex ?>_image_path" id= "fn_x<?= $Grid->RowIndex ?>_image_path" value="<?= $Grid->image_path->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Grid->RowIndex ?>_image_path" id= "fa_x<?= $Grid->RowIndex ?>_image_path" value="<?= (Post("fa_x<?= $Grid->RowIndex ?>_image_path") == "0") ? "0" : "1" ?>">
<table id="ft_x<?= $Grid->RowIndex ?>_image_path" class="table table-sm float-start ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->caption->Visible) { // caption ?>
        <td data-name="caption"<?= $Grid->caption->cellAttributes() ?>>
<?php if ($Grid->RowType == RowType::ADD) { // Add record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_project_gallery_caption" class="el_project_gallery_caption">
<input type="<?= $Grid->caption->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_caption" id="x<?= $Grid->RowIndex ?>_caption" data-table="project_gallery" data-field="x_caption" value="<?= $Grid->caption->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Grid->caption->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->caption->formatPattern()) ?>"<?= $Grid->caption->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->caption->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="project_gallery" data-field="x_caption" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_caption" id="o<?= $Grid->RowIndex ?>_caption" value="<?= HtmlEncode($Grid->caption->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == RowType::EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_project_gallery_caption" class="el_project_gallery_caption">
<input type="<?= $Grid->caption->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_caption" id="x<?= $Grid->RowIndex ?>_caption" data-table="project_gallery" data-field="x_caption" value="<?= $Grid->caption->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Grid->caption->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->caption->formatPattern()) ?>"<?= $Grid->caption->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->caption->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == RowType::VIEW) { // View record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_project_gallery_caption" class="el_project_gallery_caption">
<span<?= $Grid->caption->viewAttributes() ?>>
<?= $Grid->caption->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="project_gallery" data-field="x_caption" data-hidden="1" name="fproject_gallerygrid$x<?= $Grid->RowIndex ?>_caption" id="fproject_gallerygrid$x<?= $Grid->RowIndex ?>_caption" value="<?= HtmlEncode($Grid->caption->FormValue) ?>">
<input type="hidden" data-table="project_gallery" data-field="x_caption" data-hidden="1" data-old name="fproject_gallerygrid$o<?= $Grid->RowIndex ?>_caption" id="fproject_gallerygrid$o<?= $Grid->RowIndex ?>_caption" value="<?= HtmlEncode($Grid->caption->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->display_order->Visible) { // display_order ?>
        <td data-name="display_order"<?= $Grid->display_order->cellAttributes() ?>>
<?php if ($Grid->RowType == RowType::ADD) { // Add record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_project_gallery_display_order" class="el_project_gallery_display_order">
<input type="<?= $Grid->display_order->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_display_order" id="x<?= $Grid->RowIndex ?>_display_order" data-table="project_gallery" data-field="x_display_order" value="<?= $Grid->display_order->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Grid->display_order->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->display_order->formatPattern()) ?>"<?= $Grid->display_order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->display_order->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="project_gallery" data-field="x_display_order" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_display_order" id="o<?= $Grid->RowIndex ?>_display_order" value="<?= HtmlEncode($Grid->display_order->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == RowType::EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_project_gallery_display_order" class="el_project_gallery_display_order">
<input type="<?= $Grid->display_order->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_display_order" id="x<?= $Grid->RowIndex ?>_display_order" data-table="project_gallery" data-field="x_display_order" value="<?= $Grid->display_order->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Grid->display_order->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->display_order->formatPattern()) ?>"<?= $Grid->display_order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->display_order->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == RowType::VIEW) { // View record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_project_gallery_display_order" class="el_project_gallery_display_order">
<span<?= $Grid->display_order->viewAttributes() ?>>
<?= $Grid->display_order->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="project_gallery" data-field="x_display_order" data-hidden="1" name="fproject_gallerygrid$x<?= $Grid->RowIndex ?>_display_order" id="fproject_gallerygrid$x<?= $Grid->RowIndex ?>_display_order" value="<?= HtmlEncode($Grid->display_order->FormValue) ?>">
<input type="hidden" data-table="project_gallery" data-field="x_display_order" data-hidden="1" data-old name="fproject_gallerygrid$o<?= $Grid->RowIndex ?>_display_order" id="fproject_gallerygrid$o<?= $Grid->RowIndex ?>_display_order" value="<?= HtmlEncode($Grid->display_order->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->created_at->Visible) { // created_at ?>
        <td data-name="created_at"<?= $Grid->created_at->cellAttributes() ?>>
<?php if ($Grid->RowType == RowType::ADD) { // Add record ?>
<input type="hidden" data-table="project_gallery" data-field="x_created_at" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_created_at" id="o<?= $Grid->RowIndex ?>_created_at" value="<?= HtmlEncode($Grid->created_at->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == RowType::EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == RowType::VIEW) { // View record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_project_gallery_created_at" class="el_project_gallery_created_at">
<span<?= $Grid->created_at->viewAttributes() ?>>
<?= $Grid->created_at->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="project_gallery" data-field="x_created_at" data-hidden="1" name="fproject_gallerygrid$x<?= $Grid->RowIndex ?>_created_at" id="fproject_gallerygrid$x<?= $Grid->RowIndex ?>_created_at" value="<?= HtmlEncode($Grid->created_at->FormValue) ?>">
<input type="hidden" data-table="project_gallery" data-field="x_created_at" data-hidden="1" data-old name="fproject_gallerygrid$o<?= $Grid->RowIndex ?>_created_at" id="fproject_gallerygrid$o<?= $Grid->RowIndex ?>_created_at" value="<?= HtmlEncode($Grid->created_at->OldValue) ?>">
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
loadjs.ready(["fproject_gallerygrid","load"], () => fproject_gallerygrid.updateLists(<?= $Grid->RowIndex ?><?= $Grid->isAdd() || $Grid->isEdit() || $Grid->isCopy() || $Grid->RowIndex === '$rowindex$' ? ", true" : "" ?>));
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
<input type="hidden" name="detailpage" value="fproject_gallerygrid">
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
    ew.addEventHandlers("project_gallery");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
