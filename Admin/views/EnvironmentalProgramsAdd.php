<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$EnvironmentalProgramsAdd = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { environmental_programs: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fenvironmental_programsadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fenvironmental_programsadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["program_name", [fields.program_name.visible && fields.program_name.required ? ew.Validators.required(fields.program_name.caption) : null], fields.program_name.isInvalid],
            ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
            ["objectives", [fields.objectives.visible && fields.objectives.required ? ew.Validators.required(fields.objectives.caption) : null], fields.objectives.isInvalid],
            ["coverage_area", [fields.coverage_area.visible && fields.coverage_area.required ? ew.Validators.required(fields.coverage_area.caption) : null], fields.coverage_area.isInvalid],
            ["implementation_date", [fields.implementation_date.visible && fields.implementation_date.required ? ew.Validators.required(fields.implementation_date.caption) : null, ew.Validators.datetime(fields.implementation_date.clientFormatPattern)], fields.implementation_date.isInvalid],
            ["featured_image", [fields.featured_image.visible && fields.featured_image.required ? ew.Validators.fileRequired(fields.featured_image.caption) : null], fields.featured_image.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null], fields.created_at.isInvalid],
            ["program_type_id", [fields.program_type_id.visible && fields.program_type_id.required ? ew.Validators.required(fields.program_type_id.caption) : null], fields.program_type_id.isInvalid],
            ["status_id", [fields.status_id.visible && fields.status_id.required ? ew.Validators.required(fields.status_id.caption) : null], fields.status_id.isInvalid]
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
            "status_id": <?= $Page->status_id->toClientList($Page) ?>,
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
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fenvironmental_programsadd" id="fenvironmental_programsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="environmental_programs">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->program_name->Visible) { // program_name ?>
    <div id="r_program_name"<?= $Page->program_name->rowAttributes() ?>>
        <label id="elh_environmental_programs_program_name" for="x_program_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->program_name->caption() ?><?= $Page->program_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->program_name->cellAttributes() ?>>
<span id="el_environmental_programs_program_name">
<input type="<?= $Page->program_name->getInputTextType() ?>" name="x_program_name" id="x_program_name" data-table="environmental_programs" data-field="x_program_name" value="<?= $Page->program_name->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->program_name->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->program_name->formatPattern()) ?>"<?= $Page->program_name->editAttributes() ?> aria-describedby="x_program_name_help">
<?= $Page->program_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->program_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description"<?= $Page->description->rowAttributes() ?>>
        <label id="elh_environmental_programs_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->description->cellAttributes() ?>>
<span id="el_environmental_programs_description">
<textarea data-table="environmental_programs" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->objectives->Visible) { // objectives ?>
    <div id="r_objectives"<?= $Page->objectives->rowAttributes() ?>>
        <label id="elh_environmental_programs_objectives" for="x_objectives" class="<?= $Page->LeftColumnClass ?>"><?= $Page->objectives->caption() ?><?= $Page->objectives->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->objectives->cellAttributes() ?>>
<span id="el_environmental_programs_objectives">
<textarea data-table="environmental_programs" data-field="x_objectives" name="x_objectives" id="x_objectives" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->objectives->getPlaceHolder()) ?>"<?= $Page->objectives->editAttributes() ?> aria-describedby="x_objectives_help"><?= $Page->objectives->EditValue ?></textarea>
<?= $Page->objectives->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->objectives->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->coverage_area->Visible) { // coverage_area ?>
    <div id="r_coverage_area"<?= $Page->coverage_area->rowAttributes() ?>>
        <label id="elh_environmental_programs_coverage_area" for="x_coverage_area" class="<?= $Page->LeftColumnClass ?>"><?= $Page->coverage_area->caption() ?><?= $Page->coverage_area->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->coverage_area->cellAttributes() ?>>
<span id="el_environmental_programs_coverage_area">
<input type="<?= $Page->coverage_area->getInputTextType() ?>" name="x_coverage_area" id="x_coverage_area" data-table="environmental_programs" data-field="x_coverage_area" value="<?= $Page->coverage_area->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->coverage_area->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->coverage_area->formatPattern()) ?>"<?= $Page->coverage_area->editAttributes() ?> aria-describedby="x_coverage_area_help">
<?= $Page->coverage_area->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->coverage_area->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->implementation_date->Visible) { // implementation_date ?>
    <div id="r_implementation_date"<?= $Page->implementation_date->rowAttributes() ?>>
        <label id="elh_environmental_programs_implementation_date" for="x_implementation_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->implementation_date->caption() ?><?= $Page->implementation_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->implementation_date->cellAttributes() ?>>
<span id="el_environmental_programs_implementation_date">
<input type="<?= $Page->implementation_date->getInputTextType() ?>" name="x_implementation_date" id="x_implementation_date" data-table="environmental_programs" data-field="x_implementation_date" value="<?= $Page->implementation_date->EditValue ?>" placeholder="<?= HtmlEncode($Page->implementation_date->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->implementation_date->formatPattern()) ?>"<?= $Page->implementation_date->editAttributes() ?> aria-describedby="x_implementation_date_help">
<?= $Page->implementation_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->implementation_date->getErrorMessage() ?></div>
<?php if (!$Page->implementation_date->ReadOnly && !$Page->implementation_date->Disabled && !isset($Page->implementation_date->EditAttrs["readonly"]) && !isset($Page->implementation_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fenvironmental_programsadd", "datetimepicker"], function () {
    let format = "<?= DateFormat(0) ?>",
        options = {
            localization: {
                locale: ew.LANGUAGE_ID + "-u-nu-" + ew.getNumberingSystem(),
                hourCycle: format.match(/H/) ? "h24" : "h12",
                format,
                ...ew.language.phrase("datetimepicker")
            },
            display: {
                icons: {
                    previous: ew.IS_RTL ? "fa-solid fa-chevron-right" : "fa-solid fa-chevron-left",
                    next: ew.IS_RTL ? "fa-solid fa-chevron-left" : "fa-solid fa-chevron-right"
                },
                components: {
                    clock: !!format.match(/h/i) || !!format.match(/m/) || !!format.match(/s/i),
                    hours: !!format.match(/h/i),
                    minutes: !!format.match(/m/),
                    seconds: !!format.match(/s/i)
                },
                theme: ew.getPreferredTheme()
            }
        };
    ew.createDateTimePicker("fenvironmental_programsadd", "x_implementation_date", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
    <div id="r_featured_image"<?= $Page->featured_image->rowAttributes() ?>>
        <label id="elh_environmental_programs_featured_image" class="<?= $Page->LeftColumnClass ?>"><?= $Page->featured_image->caption() ?><?= $Page->featured_image->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->featured_image->cellAttributes() ?>>
<span id="el_environmental_programs_featured_image">
<div id="fd_x_featured_image" class="fileinput-button ew-file-drop-zone">
    <input
        type="file"
        id="x_featured_image"
        name="x_featured_image"
        class="form-control ew-file-input"
        title="<?= $Page->featured_image->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="environmental_programs"
        data-field="x_featured_image"
        data-size="500"
        data-accept-file-types="<?= $Page->featured_image->acceptFileTypes() ?>"
        data-max-file-size="<?= $Page->featured_image->UploadMaxFileSize ?>"
        data-max-number-of-files="null"
        data-disable-image-crop="<?= $Page->featured_image->ImageCropper ? 0 : 1 ?>"
        aria-describedby="x_featured_image_help"
        <?= ($Page->featured_image->ReadOnly || $Page->featured_image->Disabled) ? " disabled" : "" ?>
        <?= $Page->featured_image->editAttributes() ?>
    >
    <div class="text-body-secondary ew-file-text"><?= $Language->phrase("ChooseFile") ?></div>
    <?= $Page->featured_image->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->featured_image->getErrorMessage() ?></div>
</div>
<input type="hidden" name="fn_x_featured_image" id= "fn_x_featured_image" value="<?= $Page->featured_image->Upload->FileName ?>">
<input type="hidden" name="fa_x_featured_image" id= "fa_x_featured_image" value="0">
<table id="ft_x_featured_image" class="table table-sm float-start ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->program_type_id->Visible) { // program_type_id ?>
    <div id="r_program_type_id"<?= $Page->program_type_id->rowAttributes() ?>>
        <label id="elh_environmental_programs_program_type_id" for="x_program_type_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->program_type_id->caption() ?><?= $Page->program_type_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->program_type_id->cellAttributes() ?>>
<span id="el_environmental_programs_program_type_id">
    <select
        id="x_program_type_id"
        name="x_program_type_id"
        class="form-select ew-select<?= $Page->program_type_id->isInvalidClass() ?>"
        <?php if (!$Page->program_type_id->IsNativeSelect) { ?>
        data-select2-id="fenvironmental_programsadd_x_program_type_id"
        <?php } ?>
        data-table="environmental_programs"
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
loadjs.ready("fenvironmental_programsadd", function() {
    var options = { name: "x_program_type_id", selectId: "fenvironmental_programsadd_x_program_type_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fenvironmental_programsadd.lists.program_type_id?.lookupOptions.length) {
        options.data = { id: "x_program_type_id", form: "fenvironmental_programsadd" };
    } else {
        options.ajax = { id: "x_program_type_id", form: "fenvironmental_programsadd", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.environmental_programs.fields.program_type_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status_id->Visible) { // status_id ?>
    <div id="r_status_id"<?= $Page->status_id->rowAttributes() ?>>
        <label id="elh_environmental_programs_status_id" for="x_status_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status_id->caption() ?><?= $Page->status_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->status_id->cellAttributes() ?>>
<span id="el_environmental_programs_status_id">
    <select
        id="x_status_id"
        name="x_status_id"
        class="form-select ew-select<?= $Page->status_id->isInvalidClass() ?>"
        <?php if (!$Page->status_id->IsNativeSelect) { ?>
        data-select2-id="fenvironmental_programsadd_x_status_id"
        <?php } ?>
        data-table="environmental_programs"
        data-field="x_status_id"
        data-value-separator="<?= $Page->status_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status_id->getPlaceHolder()) ?>"
        <?= $Page->status_id->editAttributes() ?>>
        <?= $Page->status_id->selectOptionListHtml("x_status_id") ?>
    </select>
    <?= $Page->status_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->status_id->getErrorMessage() ?></div>
<?= $Page->status_id->Lookup->getParamTag($Page, "p_x_status_id") ?>
<?php if (!$Page->status_id->IsNativeSelect) { ?>
<script>
loadjs.ready("fenvironmental_programsadd", function() {
    var options = { name: "x_status_id", selectId: "fenvironmental_programsadd_x_status_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fenvironmental_programsadd.lists.status_id?.lookupOptions.length) {
        options.data = { id: "x_status_id", form: "fenvironmental_programsadd" };
    } else {
        options.ajax = { id: "x_status_id", form: "fenvironmental_programsadd", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.environmental_programs.fields.status_id.selectOptions);
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fenvironmental_programsadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fenvironmental_programsadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
<?php } ?>
    </div><!-- /buttons offset -->
<?= $Page->IsModal ? "</template>" : "</div>" ?><!-- /buttons .row -->
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("environmental_programs");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
