<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Set up and run Grid object
$Grid = Container("NewsPostTagsGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var fnews_post_tagsgrid;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let currentTable = <?= JsonEncode($Grid->toClientVar()) ?>;
    ew.deepAssign(ew.vars, { tables: { news_post_tags: currentTable } });
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fnews_post_tagsgrid")
        .setPageId("grid")
        .setFormKeyCountName("<?= $Grid->FormKeyCountName ?>")

        // Add fields
        .setFields([
            ["post_id", [fields.post_id.visible && fields.post_id.required ? ew.Validators.required(fields.post_id.caption) : null], fields.post_id.isInvalid],
            ["tag_id", [fields.tag_id.visible && fields.tag_id.required ? ew.Validators.required(fields.tag_id.caption) : null], fields.tag_id.isInvalid]
        ])

        // Check empty row
        .setEmptyRow(
            function (rowIndex) {
                let fobj = this.getForm(),
                    fields = [["post_id",false],["tag_id",false]];
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
            "post_id": <?= $Grid->post_id->toClientList($Grid) ?>,
            "tag_id": <?= $Grid->tag_id->toClientList($Grid) ?>,
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
<div id="fnews_post_tagsgrid" class="ew-form ew-list-form">
<div id="gmp_news_post_tags" class="card-body ew-grid-middle-panel <?= $Grid->TableContainerClass ?>" style="<?= $Grid->TableContainerStyle ?>">
<table id="tbl_news_post_tagsgrid" class="<?= $Grid->TableClass ?>"><!-- .ew-table -->
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
<?php if ($Grid->post_id->Visible) { // post_id ?>
        <th data-name="post_id" class="<?= $Grid->post_id->headerCellClass() ?>"><div id="elh_news_post_tags_post_id" class="news_post_tags_post_id"><?= $Grid->renderFieldHeader($Grid->post_id) ?></div></th>
<?php } ?>
<?php if ($Grid->tag_id->Visible) { // tag_id ?>
        <th data-name="tag_id" class="<?= $Grid->tag_id->headerCellClass() ?>"><div id="elh_news_post_tags_tag_id" class="news_post_tags_tag_id"><?= $Grid->renderFieldHeader($Grid->tag_id) ?></div></th>
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
    <?php if ($Grid->post_id->Visible) { // post_id ?>
        <td data-name="post_id"<?= $Grid->post_id->cellAttributes() ?>>
<?php if ($Grid->RowType == RowType::ADD) { // Add record ?>
<?php if ($Grid->post_id->getSessionValue() != "") { ?>
<span<?= $Grid->post_id->viewAttributes() ?>>
<span class="form-control-plaintext"><?= $Grid->post_id->getDisplayValue($Grid->post_id->ViewValue) ?></span></span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_post_id" name="x<?= $Grid->RowIndex ?>_post_id" value="<?= HtmlEncode($Grid->post_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_news_post_tags_post_id" class="el_news_post_tags_post_id">
    <select
        id="x<?= $Grid->RowIndex ?>_post_id"
        name="x<?= $Grid->RowIndex ?>_post_id"
        class="form-select ew-select<?= $Grid->post_id->isInvalidClass() ?>"
        <?php if (!$Grid->post_id->IsNativeSelect) { ?>
        data-select2-id="fnews_post_tagsgrid_x<?= $Grid->RowIndex ?>_post_id"
        <?php } ?>
        data-table="news_post_tags"
        data-field="x_post_id"
        data-value-separator="<?= $Grid->post_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->post_id->getPlaceHolder()) ?>"
        <?= $Grid->post_id->editAttributes() ?>>
        <?= $Grid->post_id->selectOptionListHtml("x{$Grid->RowIndex}_post_id") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->post_id->getErrorMessage() ?></div>
<?= $Grid->post_id->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_post_id") ?>
<?php if (!$Grid->post_id->IsNativeSelect) { ?>
<script>
loadjs.ready("fnews_post_tagsgrid", function() {
    var options = { name: "x<?= $Grid->RowIndex ?>_post_id", selectId: "fnews_post_tagsgrid_x<?= $Grid->RowIndex ?>_post_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fnews_post_tagsgrid.lists.post_id?.lookupOptions.length) {
        options.data = { id: "x<?= $Grid->RowIndex ?>_post_id", form: "fnews_post_tagsgrid" };
    } else {
        options.ajax = { id: "x<?= $Grid->RowIndex ?>_post_id", form: "fnews_post_tagsgrid", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.news_post_tags.fields.post_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
<?php } ?>
<input type="hidden" data-table="news_post_tags" data-field="x_post_id" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_post_id" id="o<?= $Grid->RowIndex ?>_post_id" value="<?= HtmlEncode($Grid->post_id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == RowType::EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_news_post_tags_post_id" class="el_news_post_tags_post_id">
<?php if ($Grid->post_id->getSessionValue() != "") { ?>
<span<?= $Grid->post_id->viewAttributes() ?>>
<span class="form-control-plaintext"><?= $Grid->post_id->getDisplayValue($Grid->post_id->EditValue) ?></span></span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_post_id" name="x<?= $Grid->RowIndex ?>_post_id" value="<?= HtmlEncode($Grid->post_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
    <select
        id="x<?= $Grid->RowIndex ?>_post_id"
        name="x<?= $Grid->RowIndex ?>_post_id"
        class="form-select ew-select<?= $Grid->post_id->isInvalidClass() ?>"
        <?php if (!$Grid->post_id->IsNativeSelect) { ?>
        data-select2-id="fnews_post_tagsgrid_x<?= $Grid->RowIndex ?>_post_id"
        <?php } ?>
        data-table="news_post_tags"
        data-field="x_post_id"
        data-value-separator="<?= $Grid->post_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->post_id->getPlaceHolder()) ?>"
        <?= $Grid->post_id->editAttributes() ?>>
        <?= $Grid->post_id->selectOptionListHtml("x{$Grid->RowIndex}_post_id") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->post_id->getErrorMessage() ?></div>
<?= $Grid->post_id->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_post_id") ?>
<?php if (!$Grid->post_id->IsNativeSelect) { ?>
<script>
loadjs.ready("fnews_post_tagsgrid", function() {
    var options = { name: "x<?= $Grid->RowIndex ?>_post_id", selectId: "fnews_post_tagsgrid_x<?= $Grid->RowIndex ?>_post_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fnews_post_tagsgrid.lists.post_id?.lookupOptions.length) {
        options.data = { id: "x<?= $Grid->RowIndex ?>_post_id", form: "fnews_post_tagsgrid" };
    } else {
        options.ajax = { id: "x<?= $Grid->RowIndex ?>_post_id", form: "fnews_post_tagsgrid", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.news_post_tags.fields.post_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
<?php } ?>
<input type="hidden" data-table="news_post_tags" data-field="x_post_id" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_post_id" id="o<?= $Grid->RowIndex ?>_post_id" value="<?= HtmlEncode($Grid->post_id->OldValue ?? $Grid->post_id->CurrentValue) ?>">
</span>
<?php } ?>
<?php if ($Grid->RowType == RowType::VIEW) { // View record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_news_post_tags_post_id" class="el_news_post_tags_post_id">
<span<?= $Grid->post_id->viewAttributes() ?>>
<?= $Grid->post_id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="news_post_tags" data-field="x_post_id" data-hidden="1" name="fnews_post_tagsgrid$x<?= $Grid->RowIndex ?>_post_id" id="fnews_post_tagsgrid$x<?= $Grid->RowIndex ?>_post_id" value="<?= HtmlEncode($Grid->post_id->FormValue) ?>">
<input type="hidden" data-table="news_post_tags" data-field="x_post_id" data-hidden="1" data-old name="fnews_post_tagsgrid$o<?= $Grid->RowIndex ?>_post_id" id="fnews_post_tagsgrid$o<?= $Grid->RowIndex ?>_post_id" value="<?= HtmlEncode($Grid->post_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="news_post_tags" data-field="x_post_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_post_id" id="x<?= $Grid->RowIndex ?>_post_id" value="<?= HtmlEncode($Grid->post_id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->tag_id->Visible) { // tag_id ?>
        <td data-name="tag_id"<?= $Grid->tag_id->cellAttributes() ?>>
<?php if ($Grid->RowType == RowType::ADD) { // Add record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_news_post_tags_tag_id" class="el_news_post_tags_tag_id">
    <select
        id="x<?= $Grid->RowIndex ?>_tag_id"
        name="x<?= $Grid->RowIndex ?>_tag_id"
        class="form-select ew-select<?= $Grid->tag_id->isInvalidClass() ?>"
        <?php if (!$Grid->tag_id->IsNativeSelect) { ?>
        data-select2-id="fnews_post_tagsgrid_x<?= $Grid->RowIndex ?>_tag_id"
        <?php } ?>
        data-table="news_post_tags"
        data-field="x_tag_id"
        data-value-separator="<?= $Grid->tag_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->tag_id->getPlaceHolder()) ?>"
        <?= $Grid->tag_id->editAttributes() ?>>
        <?= $Grid->tag_id->selectOptionListHtml("x{$Grid->RowIndex}_tag_id") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->tag_id->getErrorMessage() ?></div>
<?= $Grid->tag_id->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_tag_id") ?>
<?php if (!$Grid->tag_id->IsNativeSelect) { ?>
<script>
loadjs.ready("fnews_post_tagsgrid", function() {
    var options = { name: "x<?= $Grid->RowIndex ?>_tag_id", selectId: "fnews_post_tagsgrid_x<?= $Grid->RowIndex ?>_tag_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fnews_post_tagsgrid.lists.tag_id?.lookupOptions.length) {
        options.data = { id: "x<?= $Grid->RowIndex ?>_tag_id", form: "fnews_post_tagsgrid" };
    } else {
        options.ajax = { id: "x<?= $Grid->RowIndex ?>_tag_id", form: "fnews_post_tagsgrid", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.news_post_tags.fields.tag_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="news_post_tags" data-field="x_tag_id" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_tag_id" id="o<?= $Grid->RowIndex ?>_tag_id" value="<?= HtmlEncode($Grid->tag_id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == RowType::EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_news_post_tags_tag_id" class="el_news_post_tags_tag_id">
    <select
        id="x<?= $Grid->RowIndex ?>_tag_id"
        name="x<?= $Grid->RowIndex ?>_tag_id"
        class="form-select ew-select<?= $Grid->tag_id->isInvalidClass() ?>"
        <?php if (!$Grid->tag_id->IsNativeSelect) { ?>
        data-select2-id="fnews_post_tagsgrid_x<?= $Grid->RowIndex ?>_tag_id"
        <?php } ?>
        data-table="news_post_tags"
        data-field="x_tag_id"
        data-value-separator="<?= $Grid->tag_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->tag_id->getPlaceHolder()) ?>"
        <?= $Grid->tag_id->editAttributes() ?>>
        <?= $Grid->tag_id->selectOptionListHtml("x{$Grid->RowIndex}_tag_id") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->tag_id->getErrorMessage() ?></div>
<?= $Grid->tag_id->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_tag_id") ?>
<?php if (!$Grid->tag_id->IsNativeSelect) { ?>
<script>
loadjs.ready("fnews_post_tagsgrid", function() {
    var options = { name: "x<?= $Grid->RowIndex ?>_tag_id", selectId: "fnews_post_tagsgrid_x<?= $Grid->RowIndex ?>_tag_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fnews_post_tagsgrid.lists.tag_id?.lookupOptions.length) {
        options.data = { id: "x<?= $Grid->RowIndex ?>_tag_id", form: "fnews_post_tagsgrid" };
    } else {
        options.ajax = { id: "x<?= $Grid->RowIndex ?>_tag_id", form: "fnews_post_tagsgrid", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.news_post_tags.fields.tag_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
<input type="hidden" data-table="news_post_tags" data-field="x_tag_id" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_tag_id" id="o<?= $Grid->RowIndex ?>_tag_id" value="<?= HtmlEncode($Grid->tag_id->OldValue ?? $Grid->tag_id->CurrentValue) ?>">
</span>
<?php } ?>
<?php if ($Grid->RowType == RowType::VIEW) { // View record ?>
<span id="el<?= $Grid->RowIndex == '$rowindex$' ? '$rowindex$' : $Grid->RowCount ?>_news_post_tags_tag_id" class="el_news_post_tags_tag_id">
<span<?= $Grid->tag_id->viewAttributes() ?>>
<?= $Grid->tag_id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="news_post_tags" data-field="x_tag_id" data-hidden="1" name="fnews_post_tagsgrid$x<?= $Grid->RowIndex ?>_tag_id" id="fnews_post_tagsgrid$x<?= $Grid->RowIndex ?>_tag_id" value="<?= HtmlEncode($Grid->tag_id->FormValue) ?>">
<input type="hidden" data-table="news_post_tags" data-field="x_tag_id" data-hidden="1" data-old name="fnews_post_tagsgrid$o<?= $Grid->RowIndex ?>_tag_id" id="fnews_post_tagsgrid$o<?= $Grid->RowIndex ?>_tag_id" value="<?= HtmlEncode($Grid->tag_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="news_post_tags" data-field="x_tag_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_tag_id" id="x<?= $Grid->RowIndex ?>_tag_id" value="<?= HtmlEncode($Grid->tag_id->CurrentValue) ?>">
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowCount);
?>
    </tr>
<?php if ($Grid->RowType == RowType::ADD || $Grid->RowType == RowType::EDIT) { ?>
<script data-rowindex="<?= $Grid->RowIndex ?>">
loadjs.ready(["fnews_post_tagsgrid","load"], () => fnews_post_tagsgrid.updateLists(<?= $Grid->RowIndex ?><?= $Grid->isAdd() || $Grid->isEdit() || $Grid->isCopy() || $Grid->RowIndex === '$rowindex$' ? ", true" : "" ?>));
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
<input type="hidden" name="detailpage" value="fnews_post_tagsgrid">
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
    ew.addEventHandlers("news_post_tags");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
