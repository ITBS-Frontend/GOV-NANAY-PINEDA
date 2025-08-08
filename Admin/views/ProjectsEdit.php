<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$ProjectsEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="fprojectsedit" id="fprojectsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { projects: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var fprojectsedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fprojectsedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
            ["_title", [fields._title.visible && fields._title.required ? ew.Validators.required(fields._title.caption) : null], fields._title.isInvalid],
            ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
            ["category_id", [fields.category_id.visible && fields.category_id.required ? ew.Validators.required(fields.category_id.caption) : null, ew.Validators.integer], fields.category_id.isInvalid],
            ["project_number", [fields.project_number.visible && fields.project_number.required ? ew.Validators.required(fields.project_number.caption) : null, ew.Validators.integer], fields.project_number.isInvalid],
            ["featured_image", [fields.featured_image.visible && fields.featured_image.required ? ew.Validators.fileRequired(fields.featured_image.caption) : null], fields.featured_image.isInvalid],
            ["is_featured", [fields.is_featured.visible && fields.is_featured.required ? ew.Validators.required(fields.is_featured.caption) : null], fields.is_featured.isInvalid],
            ["project_date", [fields.project_date.visible && fields.project_date.required ? ew.Validators.required(fields.project_date.caption) : null, ew.Validators.datetime(fields.project_date.clientFormatPattern)], fields.project_date.isInvalid],
            ["budget_amount", [fields.budget_amount.visible && fields.budget_amount.required ? ew.Validators.required(fields.budget_amount.caption) : null, ew.Validators.float], fields.budget_amount.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null, ew.Validators.datetime(fields.created_at.clientFormatPattern)], fields.created_at.isInvalid]
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
            "is_featured": <?= $Page->is_featured->toClientList($Page) ?>,
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
<input type="hidden" name="t" value="projects">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id"<?= $Page->id->rowAttributes() ?>>
        <label id="elh_projects_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id->cellAttributes() ?>>
<span id="el_projects_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
<input type="hidden" data-table="projects" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
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
<input type="<?= $Page->category_id->getInputTextType() ?>" name="x_category_id" id="x_category_id" data-table="projects" data-field="x_category_id" value="<?= $Page->category_id->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->category_id->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->category_id->formatPattern()) ?>"<?= $Page->category_id->editAttributes() ?> aria-describedby="x_category_id_help">
<?= $Page->category_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->category_id->getErrorMessage() ?></div>
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
<input type="hidden" name="fa_x_featured_image" id= "fa_x_featured_image" value="<?= (Post("fa_x_featured_image") == "0") ? "0" : "1" ?>">
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
loadjs.ready(["fprojectsedit", "datetimepicker"], function () {
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
    ew.createDateTimePicker("fprojectsedit", "x_project_date", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->budget_amount->Visible) { // budget_amount ?>
    <div id="r_budget_amount"<?= $Page->budget_amount->rowAttributes() ?>>
        <label id="elh_projects_budget_amount" for="x_budget_amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->budget_amount->caption() ?><?= $Page->budget_amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->budget_amount->cellAttributes() ?>>
<span id="el_projects_budget_amount">
<input type="<?= $Page->budget_amount->getInputTextType() ?>" name="x_budget_amount" id="x_budget_amount" data-table="projects" data-field="x_budget_amount" value="<?= $Page->budget_amount->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->budget_amount->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->budget_amount->formatPattern()) ?>"<?= $Page->budget_amount->editAttributes() ?> aria-describedby="x_budget_amount_help">
<?= $Page->budget_amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->budget_amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <div id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <label id="elh_projects_created_at" for="x_created_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created_at->caption() ?><?= $Page->created_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->created_at->cellAttributes() ?>>
<span id="el_projects_created_at">
<input type="<?= $Page->created_at->getInputTextType() ?>" name="x_created_at" id="x_created_at" data-table="projects" data-field="x_created_at" value="<?= $Page->created_at->EditValue ?>" placeholder="<?= HtmlEncode($Page->created_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->created_at->formatPattern()) ?>"<?= $Page->created_at->editAttributes() ?> aria-describedby="x_created_at_help">
<?= $Page->created_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created_at->getErrorMessage() ?></div>
<?php if (!$Page->created_at->ReadOnly && !$Page->created_at->Disabled && !isset($Page->created_at->EditAttrs["readonly"]) && !isset($Page->created_at->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fprojectsedit", "datetimepicker"], function () {
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
    ew.createDateTimePicker("fprojectsedit", "x_created_at", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fprojectsedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fprojectsedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("projects");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
