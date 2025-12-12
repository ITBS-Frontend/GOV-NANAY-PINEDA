<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$ProjectsAdd = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { projects: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fprojectsadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fprojectsadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["_title", [fields._title.visible && fields._title.required ? ew.Validators.required(fields._title.caption) : null], fields._title.isInvalid],
            ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
            ["category_id", [fields.category_id.visible && fields.category_id.required ? ew.Validators.required(fields.category_id.caption) : null], fields.category_id.isInvalid],
            ["project_number", [fields.project_number.visible && fields.project_number.required ? ew.Validators.required(fields.project_number.caption) : null, ew.Validators.integer], fields.project_number.isInvalid],
            ["featured_image", [fields.featured_image.visible && fields.featured_image.required ? ew.Validators.fileRequired(fields.featured_image.caption) : null], fields.featured_image.isInvalid],
            ["is_featured", [fields.is_featured.visible && fields.is_featured.required ? ew.Validators.required(fields.is_featured.caption) : null], fields.is_featured.isInvalid],
            ["project_date", [fields.project_date.visible && fields.project_date.required ? ew.Validators.required(fields.project_date.caption) : null, ew.Validators.datetime(fields.project_date.clientFormatPattern)], fields.project_date.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null], fields.created_at.isInvalid],
            ["full_description", [fields.full_description.visible && fields.full_description.required ? ew.Validators.required(fields.full_description.caption) : null], fields.full_description.isInvalid],
            ["objectives", [fields.objectives.visible && fields.objectives.required ? ew.Validators.required(fields.objectives.caption) : null], fields.objectives.isInvalid],
            ["impact", [fields.impact.visible && fields.impact.required ? ew.Validators.required(fields.impact.caption) : null], fields.impact.isInvalid],
            ["location", [fields.location.visible && fields.location.required ? ew.Validators.required(fields.location.caption) : null], fields.location.isInvalid],
            ["start_date", [fields.start_date.visible && fields.start_date.required ? ew.Validators.required(fields.start_date.caption) : null, ew.Validators.datetime(fields.start_date.clientFormatPattern)], fields.start_date.isInvalid],
            ["end_date", [fields.end_date.visible && fields.end_date.required ? ew.Validators.required(fields.end_date.caption) : null, ew.Validators.datetime(fields.end_date.clientFormatPattern)], fields.end_date.isInvalid],
            ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
            ["municipality", [fields.municipality.visible && fields.municipality.required ? ew.Validators.required(fields.municipality.caption) : null], fields.municipality.isInvalid],
            ["economic_impact", [fields.economic_impact.visible && fields.economic_impact.required ? ew.Validators.required(fields.economic_impact.caption) : null], fields.economic_impact.isInvalid]
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
            "category_id": <?= $Page->category_id->toClientList($Page) ?>,
            "is_featured": <?= $Page->is_featured->toClientList($Page) ?>,
            "status": <?= $Page->status->toClientList($Page) ?>,
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
<form name="fprojectsadd" id="fprojectsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="projects">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->_title->Visible) { // title ?>
    <div id="r__title"<?= $Page->_title->rowAttributes() ?>>
        <label id="elh_projects__title" for="x__title" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_title->caption() ?><?= $Page->_title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->_title->cellAttributes() ?>>
<span id="el_projects__title">
<input type="<?= $Page->_title->getInputTextType() ?>" name="x__title" id="x__title" data-table="projects" data-field="x__title" value="<?= $Page->_title->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->_title->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->_title->formatPattern()) ?>"<?= $Page->_title->editAttributes() ?> aria-describedby="x__title_help">
<?= $Page->_title->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_title->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description"<?= $Page->description->rowAttributes() ?>>
        <label id="elh_projects_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->description->cellAttributes() ?>>
<span id="el_projects_description">
<textarea data-table="projects" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->category_id->Visible) { // category_id ?>
    <div id="r_category_id"<?= $Page->category_id->rowAttributes() ?>>
        <label id="elh_projects_category_id" for="x_category_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->category_id->caption() ?><?= $Page->category_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->category_id->cellAttributes() ?>>
<span id="el_projects_category_id">
    <select
        id="x_category_id"
        name="x_category_id"
        class="form-select ew-select<?= $Page->category_id->isInvalidClass() ?>"
        <?php if (!$Page->category_id->IsNativeSelect) { ?>
        data-select2-id="fprojectsadd_x_category_id"
        <?php } ?>
        data-table="projects"
        data-field="x_category_id"
        data-value-separator="<?= $Page->category_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->category_id->getPlaceHolder()) ?>"
        <?= $Page->category_id->editAttributes() ?>>
        <?= $Page->category_id->selectOptionListHtml("x_category_id") ?>
    </select>
    <?= $Page->category_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->category_id->getErrorMessage() ?></div>
<?= $Page->category_id->Lookup->getParamTag($Page, "p_x_category_id") ?>
<?php if (!$Page->category_id->IsNativeSelect) { ?>
<script>
loadjs.ready("fprojectsadd", function() {
    var options = { name: "x_category_id", selectId: "fprojectsadd_x_category_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fprojectsadd.lists.category_id?.lookupOptions.length) {
        options.data = { id: "x_category_id", form: "fprojectsadd" };
    } else {
        options.ajax = { id: "x_category_id", form: "fprojectsadd", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.projects.fields.category_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->project_number->Visible) { // project_number ?>
    <div id="r_project_number"<?= $Page->project_number->rowAttributes() ?>>
        <label id="elh_projects_project_number" for="x_project_number" class="<?= $Page->LeftColumnClass ?>"><?= $Page->project_number->caption() ?><?= $Page->project_number->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->project_number->cellAttributes() ?>>
<span id="el_projects_project_number">
<input type="<?= $Page->project_number->getInputTextType() ?>" name="x_project_number" id="x_project_number" data-table="projects" data-field="x_project_number" value="<?= $Page->project_number->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->project_number->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->project_number->formatPattern()) ?>"<?= $Page->project_number->editAttributes() ?> aria-describedby="x_project_number_help">
<?= $Page->project_number->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->project_number->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
    <div id="r_featured_image"<?= $Page->featured_image->rowAttributes() ?>>
        <label id="elh_projects_featured_image" class="<?= $Page->LeftColumnClass ?>"><?= $Page->featured_image->caption() ?><?= $Page->featured_image->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->featured_image->cellAttributes() ?>>
<span id="el_projects_featured_image">
<div id="fd_x_featured_image" class="fileinput-button ew-file-drop-zone">
    <input
        type="file"
        id="x_featured_image"
        name="x_featured_image"
        class="form-control ew-file-input"
        title="<?= $Page->featured_image->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="projects"
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
<?php if ($Page->is_featured->Visible) { // is_featured ?>
    <div id="r_is_featured"<?= $Page->is_featured->rowAttributes() ?>>
        <label id="elh_projects_is_featured" class="<?= $Page->LeftColumnClass ?>"><?= $Page->is_featured->caption() ?><?= $Page->is_featured->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->is_featured->cellAttributes() ?>>
<span id="el_projects_is_featured">
<div class="form-check d-inline-block">
    <input type="checkbox" class="form-check-input<?= $Page->is_featured->isInvalidClass() ?>" data-table="projects" data-field="x_is_featured" data-boolean name="x_is_featured" id="x_is_featured" value="1"<?= ConvertToBool($Page->is_featured->CurrentValue) ? " checked" : "" ?><?= $Page->is_featured->editAttributes() ?> aria-describedby="x_is_featured_help">
    <div class="invalid-feedback"><?= $Page->is_featured->getErrorMessage() ?></div>
</div>
<?= $Page->is_featured->getCustomMessage() ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->project_date->Visible) { // project_date ?>
    <div id="r_project_date"<?= $Page->project_date->rowAttributes() ?>>
        <label id="elh_projects_project_date" for="x_project_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->project_date->caption() ?><?= $Page->project_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->project_date->cellAttributes() ?>>
<span id="el_projects_project_date">
<input type="<?= $Page->project_date->getInputTextType() ?>" name="x_project_date" id="x_project_date" data-table="projects" data-field="x_project_date" value="<?= $Page->project_date->EditValue ?>" placeholder="<?= HtmlEncode($Page->project_date->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->project_date->formatPattern()) ?>"<?= $Page->project_date->editAttributes() ?> aria-describedby="x_project_date_help">
<?= $Page->project_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->project_date->getErrorMessage() ?></div>
<?php if (!$Page->project_date->ReadOnly && !$Page->project_date->Disabled && !isset($Page->project_date->EditAttrs["readonly"]) && !isset($Page->project_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fprojectsadd", "datetimepicker"], function () {
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
    ew.createDateTimePicker("fprojectsadd", "x_project_date", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->full_description->Visible) { // full_description ?>
    <div id="r_full_description"<?= $Page->full_description->rowAttributes() ?>>
        <label id="elh_projects_full_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->full_description->caption() ?><?= $Page->full_description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->full_description->cellAttributes() ?>>
<span id="el_projects_full_description">
<?php $Page->full_description->EditAttrs->appendClass("editor"); ?>
<textarea data-table="projects" data-field="x_full_description" name="x_full_description" id="x_full_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->full_description->getPlaceHolder()) ?>"<?= $Page->full_description->editAttributes() ?> aria-describedby="x_full_description_help"><?= $Page->full_description->EditValue ?></textarea>
<?= $Page->full_description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->full_description->getErrorMessage() ?></div>
<script>
loadjs.ready(["fprojectsadd", "editor"], function() {
    ew.createEditor("fprojectsadd", "x_full_description", 35, 4, <?= $Page->full_description->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->objectives->Visible) { // objectives ?>
    <div id="r_objectives"<?= $Page->objectives->rowAttributes() ?>>
        <label id="elh_projects_objectives" for="x_objectives" class="<?= $Page->LeftColumnClass ?>"><?= $Page->objectives->caption() ?><?= $Page->objectives->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->objectives->cellAttributes() ?>>
<span id="el_projects_objectives">
<textarea data-table="projects" data-field="x_objectives" name="x_objectives" id="x_objectives" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->objectives->getPlaceHolder()) ?>"<?= $Page->objectives->editAttributes() ?> aria-describedby="x_objectives_help"><?= $Page->objectives->EditValue ?></textarea>
<?= $Page->objectives->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->objectives->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->impact->Visible) { // impact ?>
    <div id="r_impact"<?= $Page->impact->rowAttributes() ?>>
        <label id="elh_projects_impact" for="x_impact" class="<?= $Page->LeftColumnClass ?>"><?= $Page->impact->caption() ?><?= $Page->impact->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->impact->cellAttributes() ?>>
<span id="el_projects_impact">
<textarea data-table="projects" data-field="x_impact" name="x_impact" id="x_impact" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->impact->getPlaceHolder()) ?>"<?= $Page->impact->editAttributes() ?> aria-describedby="x_impact_help"><?= $Page->impact->EditValue ?></textarea>
<?= $Page->impact->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->impact->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->location->Visible) { // location ?>
    <div id="r_location"<?= $Page->location->rowAttributes() ?>>
        <label id="elh_projects_location" for="x_location" class="<?= $Page->LeftColumnClass ?>"><?= $Page->location->caption() ?><?= $Page->location->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->location->cellAttributes() ?>>
<span id="el_projects_location">
<input type="<?= $Page->location->getInputTextType() ?>" name="x_location" id="x_location" data-table="projects" data-field="x_location" value="<?= $Page->location->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->location->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->location->formatPattern()) ?>"<?= $Page->location->editAttributes() ?> aria-describedby="x_location_help">
<?= $Page->location->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->location->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
    <div id="r_start_date"<?= $Page->start_date->rowAttributes() ?>>
        <label id="elh_projects_start_date" for="x_start_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->start_date->caption() ?><?= $Page->start_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->start_date->cellAttributes() ?>>
<span id="el_projects_start_date">
<input type="<?= $Page->start_date->getInputTextType() ?>" name="x_start_date" id="x_start_date" data-table="projects" data-field="x_start_date" value="<?= $Page->start_date->EditValue ?>" placeholder="<?= HtmlEncode($Page->start_date->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->start_date->formatPattern()) ?>"<?= $Page->start_date->editAttributes() ?> aria-describedby="x_start_date_help">
<?= $Page->start_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->start_date->getErrorMessage() ?></div>
<?php if (!$Page->start_date->ReadOnly && !$Page->start_date->Disabled && !isset($Page->start_date->EditAttrs["readonly"]) && !isset($Page->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fprojectsadd", "datetimepicker"], function () {
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
    ew.createDateTimePicker("fprojectsadd", "x_start_date", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
    <div id="r_end_date"<?= $Page->end_date->rowAttributes() ?>>
        <label id="elh_projects_end_date" for="x_end_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->end_date->caption() ?><?= $Page->end_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->end_date->cellAttributes() ?>>
<span id="el_projects_end_date">
<input type="<?= $Page->end_date->getInputTextType() ?>" name="x_end_date" id="x_end_date" data-table="projects" data-field="x_end_date" value="<?= $Page->end_date->EditValue ?>" placeholder="<?= HtmlEncode($Page->end_date->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->end_date->formatPattern()) ?>"<?= $Page->end_date->editAttributes() ?> aria-describedby="x_end_date_help">
<?= $Page->end_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->end_date->getErrorMessage() ?></div>
<?php if (!$Page->end_date->ReadOnly && !$Page->end_date->Disabled && !isset($Page->end_date->EditAttrs["readonly"]) && !isset($Page->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fprojectsadd", "datetimepicker"], function () {
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
    ew.createDateTimePicker("fprojectsadd", "x_end_date", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status"<?= $Page->status->rowAttributes() ?>>
        <label id="elh_projects_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->status->cellAttributes() ?>>
<span id="el_projects_status">
    <select
        id="x_status"
        name="x_status"
        class="form-select ew-select<?= $Page->status->isInvalidClass() ?>"
        <?php if (!$Page->status->IsNativeSelect) { ?>
        data-select2-id="fprojectsadd_x_status"
        <?php } ?>
        data-table="projects"
        data-field="x_status"
        data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>"
        <?= $Page->status->editAttributes() ?>>
        <?= $Page->status->selectOptionListHtml("x_status") ?>
    </select>
    <?= $Page->status->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
<?php if (!$Page->status->IsNativeSelect) { ?>
<script>
loadjs.ready("fprojectsadd", function() {
    var options = { name: "x_status", selectId: "fprojectsadd_x_status" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fprojectsadd.lists.status?.lookupOptions.length) {
        options.data = { id: "x_status", form: "fprojectsadd" };
    } else {
        options.ajax = { id: "x_status", form: "fprojectsadd", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.projects.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->municipality->Visible) { // municipality ?>
    <div id="r_municipality"<?= $Page->municipality->rowAttributes() ?>>
        <label id="elh_projects_municipality" for="x_municipality" class="<?= $Page->LeftColumnClass ?>"><?= $Page->municipality->caption() ?><?= $Page->municipality->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->municipality->cellAttributes() ?>>
<span id="el_projects_municipality">
<input type="<?= $Page->municipality->getInputTextType() ?>" name="x_municipality" id="x_municipality" data-table="projects" data-field="x_municipality" value="<?= $Page->municipality->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->municipality->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->municipality->formatPattern()) ?>"<?= $Page->municipality->editAttributes() ?> aria-describedby="x_municipality_help">
<?= $Page->municipality->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->municipality->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->economic_impact->Visible) { // economic_impact ?>
    <div id="r_economic_impact"<?= $Page->economic_impact->rowAttributes() ?>>
        <label id="elh_projects_economic_impact" for="x_economic_impact" class="<?= $Page->LeftColumnClass ?>"><?= $Page->economic_impact->caption() ?><?= $Page->economic_impact->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->economic_impact->cellAttributes() ?>>
<span id="el_projects_economic_impact">
<textarea data-table="projects" data-field="x_economic_impact" name="x_economic_impact" id="x_economic_impact" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->economic_impact->getPlaceHolder()) ?>"<?= $Page->economic_impact->editAttributes() ?> aria-describedby="x_economic_impact_help"><?= $Page->economic_impact->EditValue ?></textarea>
<?= $Page->economic_impact->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->economic_impact->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php
    if (in_array("project_highlights", explode(",", $Page->getCurrentDetailTable())) && $project_highlights->DetailAdd) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("project_highlights", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ProjectHighlightsGrid.php" ?>
<?php } ?>
<?php
    if (in_array("project_gallery", explode(",", $Page->getCurrentDetailTable())) && $project_gallery->DetailAdd) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("project_gallery", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ProjectGalleryGrid.php" ?>
<?php } ?>
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fprojectsadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fprojectsadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("projects");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
