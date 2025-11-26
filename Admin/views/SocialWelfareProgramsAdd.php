<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$SocialWelfareProgramsAdd = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { social_welfare_programs: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fsocial_welfare_programsadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fsocial_welfare_programsadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["category_id", [fields.category_id.visible && fields.category_id.required ? ew.Validators.required(fields.category_id.caption) : null, ew.Validators.integer], fields.category_id.isInvalid],
            ["program_name", [fields.program_name.visible && fields.program_name.required ? ew.Validators.required(fields.program_name.caption) : null], fields.program_name.isInvalid],
            ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
            ["eligibility_criteria", [fields.eligibility_criteria.visible && fields.eligibility_criteria.required ? ew.Validators.required(fields.eligibility_criteria.caption) : null], fields.eligibility_criteria.isInvalid],
            ["benefits", [fields.benefits.visible && fields.benefits.required ? ew.Validators.required(fields.benefits.caption) : null], fields.benefits.isInvalid],
            ["how_to_apply", [fields.how_to_apply.visible && fields.how_to_apply.required ? ew.Validators.required(fields.how_to_apply.caption) : null], fields.how_to_apply.isInvalid],
            ["required_documents", [fields.required_documents.visible && fields.required_documents.required ? ew.Validators.required(fields.required_documents.caption) : null], fields.required_documents.isInvalid],
            ["contact_info", [fields.contact_info.visible && fields.contact_info.required ? ew.Validators.required(fields.contact_info.caption) : null], fields.contact_info.isInvalid],
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
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fsocial_welfare_programsadd" id="fsocial_welfare_programsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="social_welfare_programs">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->category_id->Visible) { // category_id ?>
    <div id="r_category_id"<?= $Page->category_id->rowAttributes() ?>>
        <label id="elh_social_welfare_programs_category_id" for="x_category_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->category_id->caption() ?><?= $Page->category_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->category_id->cellAttributes() ?>>
<span id="el_social_welfare_programs_category_id">
<input type="<?= $Page->category_id->getInputTextType() ?>" name="x_category_id" id="x_category_id" data-table="social_welfare_programs" data-field="x_category_id" value="<?= $Page->category_id->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->category_id->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->category_id->formatPattern()) ?>"<?= $Page->category_id->editAttributes() ?> aria-describedby="x_category_id_help">
<?= $Page->category_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->category_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->program_name->Visible) { // program_name ?>
    <div id="r_program_name"<?= $Page->program_name->rowAttributes() ?>>
        <label id="elh_social_welfare_programs_program_name" for="x_program_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->program_name->caption() ?><?= $Page->program_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->program_name->cellAttributes() ?>>
<span id="el_social_welfare_programs_program_name">
<input type="<?= $Page->program_name->getInputTextType() ?>" name="x_program_name" id="x_program_name" data-table="social_welfare_programs" data-field="x_program_name" value="<?= $Page->program_name->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->program_name->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->program_name->formatPattern()) ?>"<?= $Page->program_name->editAttributes() ?> aria-describedby="x_program_name_help">
<?= $Page->program_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->program_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description"<?= $Page->description->rowAttributes() ?>>
        <label id="elh_social_welfare_programs_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->description->cellAttributes() ?>>
<span id="el_social_welfare_programs_description">
<textarea data-table="social_welfare_programs" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->eligibility_criteria->Visible) { // eligibility_criteria ?>
    <div id="r_eligibility_criteria"<?= $Page->eligibility_criteria->rowAttributes() ?>>
        <label id="elh_social_welfare_programs_eligibility_criteria" for="x_eligibility_criteria" class="<?= $Page->LeftColumnClass ?>"><?= $Page->eligibility_criteria->caption() ?><?= $Page->eligibility_criteria->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->eligibility_criteria->cellAttributes() ?>>
<span id="el_social_welfare_programs_eligibility_criteria">
<textarea data-table="social_welfare_programs" data-field="x_eligibility_criteria" name="x_eligibility_criteria" id="x_eligibility_criteria" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->eligibility_criteria->getPlaceHolder()) ?>"<?= $Page->eligibility_criteria->editAttributes() ?> aria-describedby="x_eligibility_criteria_help"><?= $Page->eligibility_criteria->EditValue ?></textarea>
<?= $Page->eligibility_criteria->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->eligibility_criteria->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->benefits->Visible) { // benefits ?>
    <div id="r_benefits"<?= $Page->benefits->rowAttributes() ?>>
        <label id="elh_social_welfare_programs_benefits" for="x_benefits" class="<?= $Page->LeftColumnClass ?>"><?= $Page->benefits->caption() ?><?= $Page->benefits->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->benefits->cellAttributes() ?>>
<span id="el_social_welfare_programs_benefits">
<textarea data-table="social_welfare_programs" data-field="x_benefits" name="x_benefits" id="x_benefits" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->benefits->getPlaceHolder()) ?>"<?= $Page->benefits->editAttributes() ?> aria-describedby="x_benefits_help"><?= $Page->benefits->EditValue ?></textarea>
<?= $Page->benefits->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->benefits->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->how_to_apply->Visible) { // how_to_apply ?>
    <div id="r_how_to_apply"<?= $Page->how_to_apply->rowAttributes() ?>>
        <label id="elh_social_welfare_programs_how_to_apply" for="x_how_to_apply" class="<?= $Page->LeftColumnClass ?>"><?= $Page->how_to_apply->caption() ?><?= $Page->how_to_apply->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->how_to_apply->cellAttributes() ?>>
<span id="el_social_welfare_programs_how_to_apply">
<textarea data-table="social_welfare_programs" data-field="x_how_to_apply" name="x_how_to_apply" id="x_how_to_apply" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->how_to_apply->getPlaceHolder()) ?>"<?= $Page->how_to_apply->editAttributes() ?> aria-describedby="x_how_to_apply_help"><?= $Page->how_to_apply->EditValue ?></textarea>
<?= $Page->how_to_apply->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->how_to_apply->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->required_documents->Visible) { // required_documents ?>
    <div id="r_required_documents"<?= $Page->required_documents->rowAttributes() ?>>
        <label id="elh_social_welfare_programs_required_documents" for="x_required_documents" class="<?= $Page->LeftColumnClass ?>"><?= $Page->required_documents->caption() ?><?= $Page->required_documents->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->required_documents->cellAttributes() ?>>
<span id="el_social_welfare_programs_required_documents">
<textarea data-table="social_welfare_programs" data-field="x_required_documents" name="x_required_documents" id="x_required_documents" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->required_documents->getPlaceHolder()) ?>"<?= $Page->required_documents->editAttributes() ?> aria-describedby="x_required_documents_help"><?= $Page->required_documents->EditValue ?></textarea>
<?= $Page->required_documents->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->required_documents->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->contact_info->Visible) { // contact_info ?>
    <div id="r_contact_info"<?= $Page->contact_info->rowAttributes() ?>>
        <label id="elh_social_welfare_programs_contact_info" for="x_contact_info" class="<?= $Page->LeftColumnClass ?>"><?= $Page->contact_info->caption() ?><?= $Page->contact_info->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->contact_info->cellAttributes() ?>>
<span id="el_social_welfare_programs_contact_info">
<textarea data-table="social_welfare_programs" data-field="x_contact_info" name="x_contact_info" id="x_contact_info" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->contact_info->getPlaceHolder()) ?>"<?= $Page->contact_info->editAttributes() ?> aria-describedby="x_contact_info_help"><?= $Page->contact_info->EditValue ?></textarea>
<?= $Page->contact_info->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->contact_info->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->is_active->Visible) { // is_active ?>
    <div id="r_is_active"<?= $Page->is_active->rowAttributes() ?>>
        <label id="elh_social_welfare_programs_is_active" class="<?= $Page->LeftColumnClass ?>"><?= $Page->is_active->caption() ?><?= $Page->is_active->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->is_active->cellAttributes() ?>>
<span id="el_social_welfare_programs_is_active">
<div class="form-check d-inline-block">
    <input type="checkbox" class="form-check-input<?= $Page->is_active->isInvalidClass() ?>" data-table="social_welfare_programs" data-field="x_is_active" data-boolean name="x_is_active" id="x_is_active" value="1"<?= ConvertToBool($Page->is_active->CurrentValue) ? " checked" : "" ?><?= $Page->is_active->editAttributes() ?> aria-describedby="x_is_active_help">
    <div class="invalid-feedback"><?= $Page->is_active->getErrorMessage() ?></div>
</div>
<?= $Page->is_active->getCustomMessage() ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <div id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <label id="elh_social_welfare_programs_created_at" for="x_created_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created_at->caption() ?><?= $Page->created_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->created_at->cellAttributes() ?>>
<span id="el_social_welfare_programs_created_at">
<input type="<?= $Page->created_at->getInputTextType() ?>" name="x_created_at" id="x_created_at" data-table="social_welfare_programs" data-field="x_created_at" value="<?= $Page->created_at->EditValue ?>" placeholder="<?= HtmlEncode($Page->created_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->created_at->formatPattern()) ?>"<?= $Page->created_at->editAttributes() ?> aria-describedby="x_created_at_help">
<?= $Page->created_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created_at->getErrorMessage() ?></div>
<?php if (!$Page->created_at->ReadOnly && !$Page->created_at->Disabled && !isset($Page->created_at->EditAttrs["readonly"]) && !isset($Page->created_at->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fsocial_welfare_programsadd", "datetimepicker"], function () {
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
    ew.createDateTimePicker("fsocial_welfare_programsadd", "x_created_at", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fsocial_welfare_programsadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fsocial_welfare_programsadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("social_welfare_programs");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
