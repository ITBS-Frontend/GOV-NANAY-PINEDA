<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$DisasterIncidentsEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="fdisaster_incidentsedit" id="fdisaster_incidentsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { disaster_incidents: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var fdisaster_incidentsedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fdisaster_incidentsedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
            ["incident_name", [fields.incident_name.visible && fields.incident_name.required ? ew.Validators.required(fields.incident_name.caption) : null], fields.incident_name.isInvalid],
            ["occurrence_date", [fields.occurrence_date.visible && fields.occurrence_date.required ? ew.Validators.required(fields.occurrence_date.caption) : null, ew.Validators.datetime(fields.occurrence_date.clientFormatPattern)], fields.occurrence_date.isInvalid],
            ["affected_areas", [fields.affected_areas.visible && fields.affected_areas.required ? ew.Validators.required(fields.affected_areas.caption) : null], fields.affected_areas.isInvalid],
            ["casualties", [fields.casualties.visible && fields.casualties.required ? ew.Validators.required(fields.casualties.caption) : null, ew.Validators.integer], fields.casualties.isInvalid],
            ["damages_estimated", [fields.damages_estimated.visible && fields.damages_estimated.required ? ew.Validators.required(fields.damages_estimated.caption) : null, ew.Validators.float], fields.damages_estimated.isInvalid],
            ["response_actions", [fields.response_actions.visible && fields.response_actions.required ? ew.Validators.required(fields.response_actions.caption) : null], fields.response_actions.isInvalid],
            ["lessons_learned", [fields.lessons_learned.visible && fields.lessons_learned.required ? ew.Validators.required(fields.lessons_learned.caption) : null], fields.lessons_learned.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null], fields.created_at.isInvalid],
            ["incident_type_id", [fields.incident_type_id.visible && fields.incident_type_id.required ? ew.Validators.required(fields.incident_type_id.caption) : null], fields.incident_type_id.isInvalid]
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
            "incident_type_id": <?= $Page->incident_type_id->toClientList($Page) ?>,
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
<input type="hidden" name="t" value="disaster_incidents">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id"<?= $Page->id->rowAttributes() ?>>
        <label id="elh_disaster_incidents_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id->cellAttributes() ?>>
<span id="el_disaster_incidents_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
<input type="hidden" data-table="disaster_incidents" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->incident_name->Visible) { // incident_name ?>
    <div id="r_incident_name"<?= $Page->incident_name->rowAttributes() ?>>
        <label id="elh_disaster_incidents_incident_name" for="x_incident_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->incident_name->caption() ?><?= $Page->incident_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->incident_name->cellAttributes() ?>>
<span id="el_disaster_incidents_incident_name">
<input type="<?= $Page->incident_name->getInputTextType() ?>" name="x_incident_name" id="x_incident_name" data-table="disaster_incidents" data-field="x_incident_name" value="<?= $Page->incident_name->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->incident_name->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->incident_name->formatPattern()) ?>"<?= $Page->incident_name->editAttributes() ?> aria-describedby="x_incident_name_help">
<?= $Page->incident_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->incident_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->occurrence_date->Visible) { // occurrence_date ?>
    <div id="r_occurrence_date"<?= $Page->occurrence_date->rowAttributes() ?>>
        <label id="elh_disaster_incidents_occurrence_date" for="x_occurrence_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->occurrence_date->caption() ?><?= $Page->occurrence_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->occurrence_date->cellAttributes() ?>>
<span id="el_disaster_incidents_occurrence_date">
<input type="<?= $Page->occurrence_date->getInputTextType() ?>" name="x_occurrence_date" id="x_occurrence_date" data-table="disaster_incidents" data-field="x_occurrence_date" value="<?= $Page->occurrence_date->EditValue ?>" placeholder="<?= HtmlEncode($Page->occurrence_date->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->occurrence_date->formatPattern()) ?>"<?= $Page->occurrence_date->editAttributes() ?> aria-describedby="x_occurrence_date_help">
<?= $Page->occurrence_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->occurrence_date->getErrorMessage() ?></div>
<?php if (!$Page->occurrence_date->ReadOnly && !$Page->occurrence_date->Disabled && !isset($Page->occurrence_date->EditAttrs["readonly"]) && !isset($Page->occurrence_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdisaster_incidentsedit", "datetimepicker"], function () {
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
    ew.createDateTimePicker("fdisaster_incidentsedit", "x_occurrence_date", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->affected_areas->Visible) { // affected_areas ?>
    <div id="r_affected_areas"<?= $Page->affected_areas->rowAttributes() ?>>
        <label id="elh_disaster_incidents_affected_areas" for="x_affected_areas" class="<?= $Page->LeftColumnClass ?>"><?= $Page->affected_areas->caption() ?><?= $Page->affected_areas->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->affected_areas->cellAttributes() ?>>
<span id="el_disaster_incidents_affected_areas">
<textarea data-table="disaster_incidents" data-field="x_affected_areas" name="x_affected_areas" id="x_affected_areas" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->affected_areas->getPlaceHolder()) ?>"<?= $Page->affected_areas->editAttributes() ?> aria-describedby="x_affected_areas_help"><?= $Page->affected_areas->EditValue ?></textarea>
<?= $Page->affected_areas->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->affected_areas->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->casualties->Visible) { // casualties ?>
    <div id="r_casualties"<?= $Page->casualties->rowAttributes() ?>>
        <label id="elh_disaster_incidents_casualties" for="x_casualties" class="<?= $Page->LeftColumnClass ?>"><?= $Page->casualties->caption() ?><?= $Page->casualties->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->casualties->cellAttributes() ?>>
<span id="el_disaster_incidents_casualties">
<input type="<?= $Page->casualties->getInputTextType() ?>" name="x_casualties" id="x_casualties" data-table="disaster_incidents" data-field="x_casualties" value="<?= $Page->casualties->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->casualties->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->casualties->formatPattern()) ?>"<?= $Page->casualties->editAttributes() ?> aria-describedby="x_casualties_help">
<?= $Page->casualties->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->casualties->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->damages_estimated->Visible) { // damages_estimated ?>
    <div id="r_damages_estimated"<?= $Page->damages_estimated->rowAttributes() ?>>
        <label id="elh_disaster_incidents_damages_estimated" for="x_damages_estimated" class="<?= $Page->LeftColumnClass ?>"><?= $Page->damages_estimated->caption() ?><?= $Page->damages_estimated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->damages_estimated->cellAttributes() ?>>
<span id="el_disaster_incidents_damages_estimated">
<input type="<?= $Page->damages_estimated->getInputTextType() ?>" name="x_damages_estimated" id="x_damages_estimated" data-table="disaster_incidents" data-field="x_damages_estimated" value="<?= $Page->damages_estimated->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->damages_estimated->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->damages_estimated->formatPattern()) ?>"<?= $Page->damages_estimated->editAttributes() ?> aria-describedby="x_damages_estimated_help">
<?= $Page->damages_estimated->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->damages_estimated->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->response_actions->Visible) { // response_actions ?>
    <div id="r_response_actions"<?= $Page->response_actions->rowAttributes() ?>>
        <label id="elh_disaster_incidents_response_actions" for="x_response_actions" class="<?= $Page->LeftColumnClass ?>"><?= $Page->response_actions->caption() ?><?= $Page->response_actions->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->response_actions->cellAttributes() ?>>
<span id="el_disaster_incidents_response_actions">
<textarea data-table="disaster_incidents" data-field="x_response_actions" name="x_response_actions" id="x_response_actions" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->response_actions->getPlaceHolder()) ?>"<?= $Page->response_actions->editAttributes() ?> aria-describedby="x_response_actions_help"><?= $Page->response_actions->EditValue ?></textarea>
<?= $Page->response_actions->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->response_actions->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->lessons_learned->Visible) { // lessons_learned ?>
    <div id="r_lessons_learned"<?= $Page->lessons_learned->rowAttributes() ?>>
        <label id="elh_disaster_incidents_lessons_learned" for="x_lessons_learned" class="<?= $Page->LeftColumnClass ?>"><?= $Page->lessons_learned->caption() ?><?= $Page->lessons_learned->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->lessons_learned->cellAttributes() ?>>
<span id="el_disaster_incidents_lessons_learned">
<textarea data-table="disaster_incidents" data-field="x_lessons_learned" name="x_lessons_learned" id="x_lessons_learned" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->lessons_learned->getPlaceHolder()) ?>"<?= $Page->lessons_learned->editAttributes() ?> aria-describedby="x_lessons_learned_help"><?= $Page->lessons_learned->EditValue ?></textarea>
<?= $Page->lessons_learned->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->lessons_learned->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->incident_type_id->Visible) { // incident_type_id ?>
    <div id="r_incident_type_id"<?= $Page->incident_type_id->rowAttributes() ?>>
        <label id="elh_disaster_incidents_incident_type_id" for="x_incident_type_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->incident_type_id->caption() ?><?= $Page->incident_type_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->incident_type_id->cellAttributes() ?>>
<span id="el_disaster_incidents_incident_type_id">
    <select
        id="x_incident_type_id"
        name="x_incident_type_id"
        class="form-select ew-select<?= $Page->incident_type_id->isInvalidClass() ?>"
        <?php if (!$Page->incident_type_id->IsNativeSelect) { ?>
        data-select2-id="fdisaster_incidentsedit_x_incident_type_id"
        <?php } ?>
        data-table="disaster_incidents"
        data-field="x_incident_type_id"
        data-value-separator="<?= $Page->incident_type_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->incident_type_id->getPlaceHolder()) ?>"
        <?= $Page->incident_type_id->editAttributes() ?>>
        <?= $Page->incident_type_id->selectOptionListHtml("x_incident_type_id") ?>
    </select>
    <?= $Page->incident_type_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->incident_type_id->getErrorMessage() ?></div>
<?= $Page->incident_type_id->Lookup->getParamTag($Page, "p_x_incident_type_id") ?>
<?php if (!$Page->incident_type_id->IsNativeSelect) { ?>
<script>
loadjs.ready("fdisaster_incidentsedit", function() {
    var options = { name: "x_incident_type_id", selectId: "fdisaster_incidentsedit_x_incident_type_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fdisaster_incidentsedit.lists.incident_type_id?.lookupOptions.length) {
        options.data = { id: "x_incident_type_id", form: "fdisaster_incidentsedit" };
    } else {
        options.ajax = { id: "x_incident_type_id", form: "fdisaster_incidentsedit", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.disaster_incidents.fields.incident_type_id.selectOptions);
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fdisaster_incidentsedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fdisaster_incidentsedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("disaster_incidents");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
