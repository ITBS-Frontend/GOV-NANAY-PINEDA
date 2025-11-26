<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$TourismActivitiesAdd = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { tourism_activities: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var ftourism_activitiesadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("ftourism_activitiesadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["destination_id", [fields.destination_id.visible && fields.destination_id.required ? ew.Validators.required(fields.destination_id.caption) : null, ew.Validators.integer], fields.destination_id.isInvalid],
            ["activity_name", [fields.activity_name.visible && fields.activity_name.required ? ew.Validators.required(fields.activity_name.caption) : null], fields.activity_name.isInvalid],
            ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
            ["duration", [fields.duration.visible && fields.duration.required ? ew.Validators.required(fields.duration.caption) : null], fields.duration.isInvalid],
            ["difficulty_level", [fields.difficulty_level.visible && fields.difficulty_level.required ? ew.Validators.required(fields.difficulty_level.caption) : null], fields.difficulty_level.isInvalid],
            ["display_order", [fields.display_order.visible && fields.display_order.required ? ew.Validators.required(fields.display_order.caption) : null, ew.Validators.integer], fields.display_order.isInvalid],
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
<form name="ftourism_activitiesadd" id="ftourism_activitiesadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="tourism_activities">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->destination_id->Visible) { // destination_id ?>
    <div id="r_destination_id"<?= $Page->destination_id->rowAttributes() ?>>
        <label id="elh_tourism_activities_destination_id" for="x_destination_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->destination_id->caption() ?><?= $Page->destination_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->destination_id->cellAttributes() ?>>
<span id="el_tourism_activities_destination_id">
<input type="<?= $Page->destination_id->getInputTextType() ?>" name="x_destination_id" id="x_destination_id" data-table="tourism_activities" data-field="x_destination_id" value="<?= $Page->destination_id->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->destination_id->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->destination_id->formatPattern()) ?>"<?= $Page->destination_id->editAttributes() ?> aria-describedby="x_destination_id_help">
<?= $Page->destination_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->destination_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->activity_name->Visible) { // activity_name ?>
    <div id="r_activity_name"<?= $Page->activity_name->rowAttributes() ?>>
        <label id="elh_tourism_activities_activity_name" for="x_activity_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->activity_name->caption() ?><?= $Page->activity_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->activity_name->cellAttributes() ?>>
<span id="el_tourism_activities_activity_name">
<input type="<?= $Page->activity_name->getInputTextType() ?>" name="x_activity_name" id="x_activity_name" data-table="tourism_activities" data-field="x_activity_name" value="<?= $Page->activity_name->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->activity_name->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->activity_name->formatPattern()) ?>"<?= $Page->activity_name->editAttributes() ?> aria-describedby="x_activity_name_help">
<?= $Page->activity_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->activity_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description"<?= $Page->description->rowAttributes() ?>>
        <label id="elh_tourism_activities_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->description->cellAttributes() ?>>
<span id="el_tourism_activities_description">
<textarea data-table="tourism_activities" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->duration->Visible) { // duration ?>
    <div id="r_duration"<?= $Page->duration->rowAttributes() ?>>
        <label id="elh_tourism_activities_duration" for="x_duration" class="<?= $Page->LeftColumnClass ?>"><?= $Page->duration->caption() ?><?= $Page->duration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->duration->cellAttributes() ?>>
<span id="el_tourism_activities_duration">
<input type="<?= $Page->duration->getInputTextType() ?>" name="x_duration" id="x_duration" data-table="tourism_activities" data-field="x_duration" value="<?= $Page->duration->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->duration->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->duration->formatPattern()) ?>"<?= $Page->duration->editAttributes() ?> aria-describedby="x_duration_help">
<?= $Page->duration->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->duration->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->difficulty_level->Visible) { // difficulty_level ?>
    <div id="r_difficulty_level"<?= $Page->difficulty_level->rowAttributes() ?>>
        <label id="elh_tourism_activities_difficulty_level" for="x_difficulty_level" class="<?= $Page->LeftColumnClass ?>"><?= $Page->difficulty_level->caption() ?><?= $Page->difficulty_level->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->difficulty_level->cellAttributes() ?>>
<span id="el_tourism_activities_difficulty_level">
<input type="<?= $Page->difficulty_level->getInputTextType() ?>" name="x_difficulty_level" id="x_difficulty_level" data-table="tourism_activities" data-field="x_difficulty_level" value="<?= $Page->difficulty_level->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->difficulty_level->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->difficulty_level->formatPattern()) ?>"<?= $Page->difficulty_level->editAttributes() ?> aria-describedby="x_difficulty_level_help">
<?= $Page->difficulty_level->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->difficulty_level->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
    <div id="r_display_order"<?= $Page->display_order->rowAttributes() ?>>
        <label id="elh_tourism_activities_display_order" for="x_display_order" class="<?= $Page->LeftColumnClass ?>"><?= $Page->display_order->caption() ?><?= $Page->display_order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->display_order->cellAttributes() ?>>
<span id="el_tourism_activities_display_order">
<input type="<?= $Page->display_order->getInputTextType() ?>" name="x_display_order" id="x_display_order" data-table="tourism_activities" data-field="x_display_order" value="<?= $Page->display_order->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->display_order->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->display_order->formatPattern()) ?>"<?= $Page->display_order->editAttributes() ?> aria-describedby="x_display_order_help">
<?= $Page->display_order->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->display_order->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <div id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <label id="elh_tourism_activities_created_at" for="x_created_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created_at->caption() ?><?= $Page->created_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->created_at->cellAttributes() ?>>
<span id="el_tourism_activities_created_at">
<input type="<?= $Page->created_at->getInputTextType() ?>" name="x_created_at" id="x_created_at" data-table="tourism_activities" data-field="x_created_at" value="<?= $Page->created_at->EditValue ?>" placeholder="<?= HtmlEncode($Page->created_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->created_at->formatPattern()) ?>"<?= $Page->created_at->editAttributes() ?> aria-describedby="x_created_at_help">
<?= $Page->created_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created_at->getErrorMessage() ?></div>
<?php if (!$Page->created_at->ReadOnly && !$Page->created_at->Disabled && !isset($Page->created_at->EditAttrs["readonly"]) && !isset($Page->created_at->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftourism_activitiesadd", "datetimepicker"], function () {
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
    ew.createDateTimePicker("ftourism_activitiesadd", "x_created_at", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="ftourism_activitiesadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="ftourism_activitiesadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("tourism_activities");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
