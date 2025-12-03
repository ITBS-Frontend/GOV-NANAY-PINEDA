<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$PoliticalJourneyEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="fpolitical_journeyedit" id="fpolitical_journeyedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { political_journey: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var fpolitical_journeyedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fpolitical_journeyedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
            ["position_title", [fields.position_title.visible && fields.position_title.required ? ew.Validators.required(fields.position_title.caption) : null], fields.position_title.isInvalid],
            ["start_year", [fields.start_year.visible && fields.start_year.required ? ew.Validators.required(fields.start_year.caption) : null, ew.Validators.integer], fields.start_year.isInvalid],
            ["end_year", [fields.end_year.visible && fields.end_year.required ? ew.Validators.required(fields.end_year.caption) : null, ew.Validators.integer], fields.end_year.isInvalid],
            ["duration_display", [fields.duration_display.visible && fields.duration_display.required ? ew.Validators.required(fields.duration_display.caption) : null], fields.duration_display.isInvalid],
            ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
            ["is_current", [fields.is_current.visible && fields.is_current.required ? ew.Validators.required(fields.is_current.caption) : null], fields.is_current.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null], fields.created_at.isInvalid]
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
            "is_current": <?= $Page->is_current->toClientList($Page) ?>,
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
<input type="hidden" name="t" value="political_journey">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id"<?= $Page->id->rowAttributes() ?>>
        <label id="elh_political_journey_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id->cellAttributes() ?>>
<span id="el_political_journey_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
<input type="hidden" data-table="political_journey" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->position_title->Visible) { // position_title ?>
    <div id="r_position_title"<?= $Page->position_title->rowAttributes() ?>>
        <label id="elh_political_journey_position_title" for="x_position_title" class="<?= $Page->LeftColumnClass ?>"><?= $Page->position_title->caption() ?><?= $Page->position_title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->position_title->cellAttributes() ?>>
<span id="el_political_journey_position_title">
<input type="<?= $Page->position_title->getInputTextType() ?>" name="x_position_title" id="x_position_title" data-table="political_journey" data-field="x_position_title" value="<?= $Page->position_title->EditValue ?>" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->position_title->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->position_title->formatPattern()) ?>"<?= $Page->position_title->editAttributes() ?> aria-describedby="x_position_title_help">
<?= $Page->position_title->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->position_title->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->start_year->Visible) { // start_year ?>
    <div id="r_start_year"<?= $Page->start_year->rowAttributes() ?>>
        <label id="elh_political_journey_start_year" for="x_start_year" class="<?= $Page->LeftColumnClass ?>"><?= $Page->start_year->caption() ?><?= $Page->start_year->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->start_year->cellAttributes() ?>>
<span id="el_political_journey_start_year">
<input type="<?= $Page->start_year->getInputTextType() ?>" name="x_start_year" id="x_start_year" data-table="political_journey" data-field="x_start_year" value="<?= $Page->start_year->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->start_year->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->start_year->formatPattern()) ?>"<?= $Page->start_year->editAttributes() ?> aria-describedby="x_start_year_help">
<?= $Page->start_year->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->start_year->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->end_year->Visible) { // end_year ?>
    <div id="r_end_year"<?= $Page->end_year->rowAttributes() ?>>
        <label id="elh_political_journey_end_year" for="x_end_year" class="<?= $Page->LeftColumnClass ?>"><?= $Page->end_year->caption() ?><?= $Page->end_year->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->end_year->cellAttributes() ?>>
<span id="el_political_journey_end_year">
<input type="<?= $Page->end_year->getInputTextType() ?>" name="x_end_year" id="x_end_year" data-table="political_journey" data-field="x_end_year" value="<?= $Page->end_year->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->end_year->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->end_year->formatPattern()) ?>"<?= $Page->end_year->editAttributes() ?> aria-describedby="x_end_year_help">
<?= $Page->end_year->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->end_year->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->duration_display->Visible) { // duration_display ?>
    <div id="r_duration_display"<?= $Page->duration_display->rowAttributes() ?>>
        <label id="elh_political_journey_duration_display" for="x_duration_display" class="<?= $Page->LeftColumnClass ?>"><?= $Page->duration_display->caption() ?><?= $Page->duration_display->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->duration_display->cellAttributes() ?>>
<span id="el_political_journey_duration_display">
<input type="<?= $Page->duration_display->getInputTextType() ?>" name="x_duration_display" id="x_duration_display" data-table="political_journey" data-field="x_duration_display" value="<?= $Page->duration_display->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->duration_display->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->duration_display->formatPattern()) ?>"<?= $Page->duration_display->editAttributes() ?> aria-describedby="x_duration_display_help">
<?= $Page->duration_display->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->duration_display->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description"<?= $Page->description->rowAttributes() ?>>
        <label id="elh_political_journey_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->description->cellAttributes() ?>>
<span id="el_political_journey_description">
<textarea data-table="political_journey" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->is_current->Visible) { // is_current ?>
    <div id="r_is_current"<?= $Page->is_current->rowAttributes() ?>>
        <label id="elh_political_journey_is_current" class="<?= $Page->LeftColumnClass ?>"><?= $Page->is_current->caption() ?><?= $Page->is_current->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->is_current->cellAttributes() ?>>
<span id="el_political_journey_is_current">
<div class="form-check d-inline-block">
    <input type="checkbox" class="form-check-input<?= $Page->is_current->isInvalidClass() ?>" data-table="political_journey" data-field="x_is_current" data-boolean name="x_is_current" id="x_is_current" value="1"<?= ConvertToBool($Page->is_current->CurrentValue) ? " checked" : "" ?><?= $Page->is_current->editAttributes() ?> aria-describedby="x_is_current_help">
    <div class="invalid-feedback"><?= $Page->is_current->getErrorMessage() ?></div>
</div>
<?= $Page->is_current->getCustomMessage() ?>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fpolitical_journeyedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fpolitical_journeyedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("political_journey");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
