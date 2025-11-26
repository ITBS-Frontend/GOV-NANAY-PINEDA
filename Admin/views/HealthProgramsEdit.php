<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$HealthProgramsEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="fhealth_programsedit" id="fhealth_programsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { health_programs: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var fhealth_programsedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fhealth_programsedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
            ["program_name", [fields.program_name.visible && fields.program_name.required ? ew.Validators.required(fields.program_name.caption) : null], fields.program_name.isInvalid],
            ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
            ["objectives", [fields.objectives.visible && fields.objectives.required ? ew.Validators.required(fields.objectives.caption) : null], fields.objectives.isInvalid],
            ["target_beneficiaries", [fields.target_beneficiaries.visible && fields.target_beneficiaries.required ? ew.Validators.required(fields.target_beneficiaries.caption) : null], fields.target_beneficiaries.isInvalid],
            ["coverage_area", [fields.coverage_area.visible && fields.coverage_area.required ? ew.Validators.required(fields.coverage_area.caption) : null], fields.coverage_area.isInvalid],
            ["implementation_date", [fields.implementation_date.visible && fields.implementation_date.required ? ew.Validators.required(fields.implementation_date.caption) : null, ew.Validators.datetime(fields.implementation_date.clientFormatPattern)], fields.implementation_date.isInvalid],
            ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
            ["contact_info", [fields.contact_info.visible && fields.contact_info.required ? ew.Validators.required(fields.contact_info.caption) : null], fields.contact_info.isInvalid],
            ["featured_image", [fields.featured_image.visible && fields.featured_image.required ? ew.Validators.required(fields.featured_image.caption) : null], fields.featured_image.isInvalid],
            ["is_active", [fields.is_active.visible && fields.is_active.required ? ew.Validators.required(fields.is_active.caption) : null], fields.is_active.isInvalid],
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
            "is_active": <?= $Page->is_active->toClientList($Page) ?>,
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
<input type="hidden" name="t" value="health_programs">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id"<?= $Page->id->rowAttributes() ?>>
        <label id="elh_health_programs_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id->cellAttributes() ?>>
<span id="el_health_programs_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
<input type="hidden" data-table="health_programs" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->program_name->Visible) { // program_name ?>
    <div id="r_program_name"<?= $Page->program_name->rowAttributes() ?>>
        <label id="elh_health_programs_program_name" for="x_program_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->program_name->caption() ?><?= $Page->program_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->program_name->cellAttributes() ?>>
<span id="el_health_programs_program_name">
<input type="<?= $Page->program_name->getInputTextType() ?>" name="x_program_name" id="x_program_name" data-table="health_programs" data-field="x_program_name" value="<?= $Page->program_name->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->program_name->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->program_name->formatPattern()) ?>"<?= $Page->program_name->editAttributes() ?> aria-describedby="x_program_name_help">
<?= $Page->program_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->program_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description"<?= $Page->description->rowAttributes() ?>>
        <label id="elh_health_programs_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->description->cellAttributes() ?>>
<span id="el_health_programs_description">
<textarea data-table="health_programs" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->objectives->Visible) { // objectives ?>
    <div id="r_objectives"<?= $Page->objectives->rowAttributes() ?>>
        <label id="elh_health_programs_objectives" for="x_objectives" class="<?= $Page->LeftColumnClass ?>"><?= $Page->objectives->caption() ?><?= $Page->objectives->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->objectives->cellAttributes() ?>>
<span id="el_health_programs_objectives">
<textarea data-table="health_programs" data-field="x_objectives" name="x_objectives" id="x_objectives" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->objectives->getPlaceHolder()) ?>"<?= $Page->objectives->editAttributes() ?> aria-describedby="x_objectives_help"><?= $Page->objectives->EditValue ?></textarea>
<?= $Page->objectives->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->objectives->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->target_beneficiaries->Visible) { // target_beneficiaries ?>
    <div id="r_target_beneficiaries"<?= $Page->target_beneficiaries->rowAttributes() ?>>
        <label id="elh_health_programs_target_beneficiaries" for="x_target_beneficiaries" class="<?= $Page->LeftColumnClass ?>"><?= $Page->target_beneficiaries->caption() ?><?= $Page->target_beneficiaries->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->target_beneficiaries->cellAttributes() ?>>
<span id="el_health_programs_target_beneficiaries">
<input type="<?= $Page->target_beneficiaries->getInputTextType() ?>" name="x_target_beneficiaries" id="x_target_beneficiaries" data-table="health_programs" data-field="x_target_beneficiaries" value="<?= $Page->target_beneficiaries->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->target_beneficiaries->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->target_beneficiaries->formatPattern()) ?>"<?= $Page->target_beneficiaries->editAttributes() ?> aria-describedby="x_target_beneficiaries_help">
<?= $Page->target_beneficiaries->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->target_beneficiaries->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->coverage_area->Visible) { // coverage_area ?>
    <div id="r_coverage_area"<?= $Page->coverage_area->rowAttributes() ?>>
        <label id="elh_health_programs_coverage_area" for="x_coverage_area" class="<?= $Page->LeftColumnClass ?>"><?= $Page->coverage_area->caption() ?><?= $Page->coverage_area->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->coverage_area->cellAttributes() ?>>
<span id="el_health_programs_coverage_area">
<input type="<?= $Page->coverage_area->getInputTextType() ?>" name="x_coverage_area" id="x_coverage_area" data-table="health_programs" data-field="x_coverage_area" value="<?= $Page->coverage_area->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->coverage_area->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->coverage_area->formatPattern()) ?>"<?= $Page->coverage_area->editAttributes() ?> aria-describedby="x_coverage_area_help">
<?= $Page->coverage_area->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->coverage_area->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->implementation_date->Visible) { // implementation_date ?>
    <div id="r_implementation_date"<?= $Page->implementation_date->rowAttributes() ?>>
        <label id="elh_health_programs_implementation_date" for="x_implementation_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->implementation_date->caption() ?><?= $Page->implementation_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->implementation_date->cellAttributes() ?>>
<span id="el_health_programs_implementation_date">
<input type="<?= $Page->implementation_date->getInputTextType() ?>" name="x_implementation_date" id="x_implementation_date" data-table="health_programs" data-field="x_implementation_date" value="<?= $Page->implementation_date->EditValue ?>" placeholder="<?= HtmlEncode($Page->implementation_date->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->implementation_date->formatPattern()) ?>"<?= $Page->implementation_date->editAttributes() ?> aria-describedby="x_implementation_date_help">
<?= $Page->implementation_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->implementation_date->getErrorMessage() ?></div>
<?php if (!$Page->implementation_date->ReadOnly && !$Page->implementation_date->Disabled && !isset($Page->implementation_date->EditAttrs["readonly"]) && !isset($Page->implementation_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fhealth_programsedit", "datetimepicker"], function () {
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
    ew.createDateTimePicker("fhealth_programsedit", "x_implementation_date", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status"<?= $Page->status->rowAttributes() ?>>
        <label id="elh_health_programs_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->status->cellAttributes() ?>>
<span id="el_health_programs_status">
<input type="<?= $Page->status->getInputTextType() ?>" name="x_status" id="x_status" data-table="health_programs" data-field="x_status" value="<?= $Page->status->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->status->formatPattern()) ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->contact_info->Visible) { // contact_info ?>
    <div id="r_contact_info"<?= $Page->contact_info->rowAttributes() ?>>
        <label id="elh_health_programs_contact_info" for="x_contact_info" class="<?= $Page->LeftColumnClass ?>"><?= $Page->contact_info->caption() ?><?= $Page->contact_info->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->contact_info->cellAttributes() ?>>
<span id="el_health_programs_contact_info">
<textarea data-table="health_programs" data-field="x_contact_info" name="x_contact_info" id="x_contact_info" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->contact_info->getPlaceHolder()) ?>"<?= $Page->contact_info->editAttributes() ?> aria-describedby="x_contact_info_help"><?= $Page->contact_info->EditValue ?></textarea>
<?= $Page->contact_info->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->contact_info->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
    <div id="r_featured_image"<?= $Page->featured_image->rowAttributes() ?>>
        <label id="elh_health_programs_featured_image" for="x_featured_image" class="<?= $Page->LeftColumnClass ?>"><?= $Page->featured_image->caption() ?><?= $Page->featured_image->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->featured_image->cellAttributes() ?>>
<span id="el_health_programs_featured_image">
<input type="<?= $Page->featured_image->getInputTextType() ?>" name="x_featured_image" id="x_featured_image" data-table="health_programs" data-field="x_featured_image" value="<?= $Page->featured_image->EditValue ?>" size="30" maxlength="500" placeholder="<?= HtmlEncode($Page->featured_image->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->featured_image->formatPattern()) ?>"<?= $Page->featured_image->editAttributes() ?> aria-describedby="x_featured_image_help">
<?= $Page->featured_image->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->featured_image->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->is_active->Visible) { // is_active ?>
    <div id="r_is_active"<?= $Page->is_active->rowAttributes() ?>>
        <label id="elh_health_programs_is_active" class="<?= $Page->LeftColumnClass ?>"><?= $Page->is_active->caption() ?><?= $Page->is_active->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->is_active->cellAttributes() ?>>
<span id="el_health_programs_is_active">
<div class="form-check d-inline-block">
    <input type="checkbox" class="form-check-input<?= $Page->is_active->isInvalidClass() ?>" data-table="health_programs" data-field="x_is_active" data-boolean name="x_is_active" id="x_is_active" value="1"<?= ConvertToBool($Page->is_active->CurrentValue) ? " checked" : "" ?><?= $Page->is_active->editAttributes() ?> aria-describedby="x_is_active_help">
    <div class="invalid-feedback"><?= $Page->is_active->getErrorMessage() ?></div>
</div>
<?= $Page->is_active->getCustomMessage() ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <div id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <label id="elh_health_programs_created_at" for="x_created_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created_at->caption() ?><?= $Page->created_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->created_at->cellAttributes() ?>>
<span id="el_health_programs_created_at">
<input type="<?= $Page->created_at->getInputTextType() ?>" name="x_created_at" id="x_created_at" data-table="health_programs" data-field="x_created_at" value="<?= $Page->created_at->EditValue ?>" placeholder="<?= HtmlEncode($Page->created_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->created_at->formatPattern()) ?>"<?= $Page->created_at->editAttributes() ?> aria-describedby="x_created_at_help">
<?= $Page->created_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created_at->getErrorMessage() ?></div>
<?php if (!$Page->created_at->ReadOnly && !$Page->created_at->Disabled && !isset($Page->created_at->EditAttrs["readonly"]) && !isset($Page->created_at->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fhealth_programsedit", "datetimepicker"], function () {
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
    ew.createDateTimePicker("fhealth_programsedit", "x_created_at", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fhealth_programsedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fhealth_programsedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("health_programs");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
