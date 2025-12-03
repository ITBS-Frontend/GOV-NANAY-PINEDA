<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$ProgramStatisticsEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="fprogram_statisticsedit" id="fprogram_statisticsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { program_statistics: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var fprogram_statisticsedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fprogram_statisticsedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
            ["program_id", [fields.program_id.visible && fields.program_id.required ? ew.Validators.required(fields.program_id.caption) : null, ew.Validators.integer], fields.program_id.isInvalid],
            ["stat_label", [fields.stat_label.visible && fields.stat_label.required ? ew.Validators.required(fields.stat_label.caption) : null], fields.stat_label.isInvalid],
            ["stat_value", [fields.stat_value.visible && fields.stat_value.required ? ew.Validators.required(fields.stat_value.caption) : null], fields.stat_value.isInvalid],
            ["year", [fields.year.visible && fields.year.required ? ew.Validators.required(fields.year.caption) : null, ew.Validators.integer], fields.year.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null], fields.created_at.isInvalid],
            ["program_type_id", [fields.program_type_id.visible && fields.program_type_id.required ? ew.Validators.required(fields.program_type_id.caption) : null], fields.program_type_id.isInvalid]
        ])

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
            "program_type_id": <?= $Page->program_type_id->toClientList($Page) ?>,
        })
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
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="program_statistics">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id"<?= $Page->id->rowAttributes() ?>>
        <label id="elh_program_statistics_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id->cellAttributes() ?>>
<span id="el_program_statistics_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
<input type="hidden" data-table="program_statistics" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->program_id->Visible) { // program_id ?>
    <div id="r_program_id"<?= $Page->program_id->rowAttributes() ?>>
        <label id="elh_program_statistics_program_id" for="x_program_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->program_id->caption() ?><?= $Page->program_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->program_id->cellAttributes() ?>>
<span id="el_program_statistics_program_id">
<input type="<?= $Page->program_id->getInputTextType() ?>" name="x_program_id" id="x_program_id" data-table="program_statistics" data-field="x_program_id" value="<?= $Page->program_id->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->program_id->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->program_id->formatPattern()) ?>"<?= $Page->program_id->editAttributes() ?> aria-describedby="x_program_id_help">
<?= $Page->program_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->program_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->stat_label->Visible) { // stat_label ?>
    <div id="r_stat_label"<?= $Page->stat_label->rowAttributes() ?>>
        <label id="elh_program_statistics_stat_label" for="x_stat_label" class="<?= $Page->LeftColumnClass ?>"><?= $Page->stat_label->caption() ?><?= $Page->stat_label->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->stat_label->cellAttributes() ?>>
<span id="el_program_statistics_stat_label">
<input type="<?= $Page->stat_label->getInputTextType() ?>" name="x_stat_label" id="x_stat_label" data-table="program_statistics" data-field="x_stat_label" value="<?= $Page->stat_label->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->stat_label->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->stat_label->formatPattern()) ?>"<?= $Page->stat_label->editAttributes() ?> aria-describedby="x_stat_label_help">
<?= $Page->stat_label->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->stat_label->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->stat_value->Visible) { // stat_value ?>
    <div id="r_stat_value"<?= $Page->stat_value->rowAttributes() ?>>
        <label id="elh_program_statistics_stat_value" for="x_stat_value" class="<?= $Page->LeftColumnClass ?>"><?= $Page->stat_value->caption() ?><?= $Page->stat_value->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->stat_value->cellAttributes() ?>>
<span id="el_program_statistics_stat_value">
<input type="<?= $Page->stat_value->getInputTextType() ?>" name="x_stat_value" id="x_stat_value" data-table="program_statistics" data-field="x_stat_value" value="<?= $Page->stat_value->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->stat_value->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->stat_value->formatPattern()) ?>"<?= $Page->stat_value->editAttributes() ?> aria-describedby="x_stat_value_help">
<?= $Page->stat_value->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->stat_value->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->year->Visible) { // year ?>
    <div id="r_year"<?= $Page->year->rowAttributes() ?>>
        <label id="elh_program_statistics_year" for="x_year" class="<?= $Page->LeftColumnClass ?>"><?= $Page->year->caption() ?><?= $Page->year->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->year->cellAttributes() ?>>
<span id="el_program_statistics_year">
<input type="<?= $Page->year->getInputTextType() ?>" name="x_year" id="x_year" data-table="program_statistics" data-field="x_year" value="<?= $Page->year->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->year->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->year->formatPattern()) ?>"<?= $Page->year->editAttributes() ?> aria-describedby="x_year_help">
<?= $Page->year->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->year->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->program_type_id->Visible) { // program_type_id ?>
    <div id="r_program_type_id"<?= $Page->program_type_id->rowAttributes() ?>>
        <label id="elh_program_statistics_program_type_id" for="x_program_type_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->program_type_id->caption() ?><?= $Page->program_type_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->program_type_id->cellAttributes() ?>>
<span id="el_program_statistics_program_type_id">
    <select
        id="x_program_type_id"
        name="x_program_type_id"
        class="form-select ew-select<?= $Page->program_type_id->isInvalidClass() ?>"
        <?php if (!$Page->program_type_id->IsNativeSelect) { ?>
        data-select2-id="fprogram_statisticsedit_x_program_type_id"
        <?php } ?>
        data-table="program_statistics"
        data-field="x_program_type_id"
        data-value-separator="<?= $Page->program_type_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->program_type_id->getPlaceHolder()) ?>"
        <?= $Page->program_type_id->editAttributes() ?>>
        <?= $Page->program_type_id->selectOptionListHtml("x_program_type_id") ?>
    </select>
    <?= $Page->program_type_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->program_type_id->getErrorMessage() ?></div>
<?= $Page->program_type_id->Lookup->getParamTag($Page, "p_x_program_type_id") ?>
<?php if (!$Page->program_type_id->IsNativeSelect) { ?>
<script>
loadjs.ready("fprogram_statisticsedit", function() {
    var options = { name: "x_program_type_id", selectId: "fprogram_statisticsedit_x_program_type_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fprogram_statisticsedit.lists.program_type_id?.lookupOptions.length) {
        options.data = { id: "x_program_type_id", form: "fprogram_statisticsedit" };
    } else {
        options.ajax = { id: "x_program_type_id", form: "fprogram_statisticsedit", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.program_statistics.fields.program_type_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fprogram_statisticsedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fprogram_statisticsedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
<?php } ?>
    </div><!-- /buttons offset -->
<?= $Page->IsModal ? "</template>" : "</div>" ?><!-- /buttons .row -->
</form>
</main>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("program_statistics");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
