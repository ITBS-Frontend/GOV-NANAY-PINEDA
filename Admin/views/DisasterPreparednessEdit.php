<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$DisasterPreparednessEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="fdisaster_preparednessedit" id="fdisaster_preparednessedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { disaster_preparedness: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var fdisaster_preparednessedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fdisaster_preparednessedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
            ["disaster_type", [fields.disaster_type.visible && fields.disaster_type.required ? ew.Validators.required(fields.disaster_type.caption) : null], fields.disaster_type.isInvalid],
            ["preparedness_guide", [fields.preparedness_guide.visible && fields.preparedness_guide.required ? ew.Validators.required(fields.preparedness_guide.caption) : null], fields.preparedness_guide.isInvalid],
            ["emergency_hotlines", [fields.emergency_hotlines.visible && fields.emergency_hotlines.required ? ew.Validators.required(fields.emergency_hotlines.caption) : null], fields.emergency_hotlines.isInvalid],
            ["evacuation_centers", [fields.evacuation_centers.visible && fields.evacuation_centers.required ? ew.Validators.required(fields.evacuation_centers.caption) : null], fields.evacuation_centers.isInvalid],
            ["relief_procedures", [fields.relief_procedures.visible && fields.relief_procedures.required ? ew.Validators.required(fields.relief_procedures.caption) : null], fields.relief_procedures.isInvalid],
            ["featured_image", [fields.featured_image.visible && fields.featured_image.required ? ew.Validators.required(fields.featured_image.caption) : null], fields.featured_image.isInvalid],
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
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="disaster_preparedness">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id"<?= $Page->id->rowAttributes() ?>>
        <label id="elh_disaster_preparedness_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id->cellAttributes() ?>>
<span id="el_disaster_preparedness_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
<input type="hidden" data-table="disaster_preparedness" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->disaster_type->Visible) { // disaster_type ?>
    <div id="r_disaster_type"<?= $Page->disaster_type->rowAttributes() ?>>
        <label id="elh_disaster_preparedness_disaster_type" for="x_disaster_type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->disaster_type->caption() ?><?= $Page->disaster_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->disaster_type->cellAttributes() ?>>
<span id="el_disaster_preparedness_disaster_type">
<input type="<?= $Page->disaster_type->getInputTextType() ?>" name="x_disaster_type" id="x_disaster_type" data-table="disaster_preparedness" data-field="x_disaster_type" value="<?= $Page->disaster_type->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->disaster_type->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->disaster_type->formatPattern()) ?>"<?= $Page->disaster_type->editAttributes() ?> aria-describedby="x_disaster_type_help">
<?= $Page->disaster_type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->disaster_type->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->preparedness_guide->Visible) { // preparedness_guide ?>
    <div id="r_preparedness_guide"<?= $Page->preparedness_guide->rowAttributes() ?>>
        <label id="elh_disaster_preparedness_preparedness_guide" for="x_preparedness_guide" class="<?= $Page->LeftColumnClass ?>"><?= $Page->preparedness_guide->caption() ?><?= $Page->preparedness_guide->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->preparedness_guide->cellAttributes() ?>>
<span id="el_disaster_preparedness_preparedness_guide">
<textarea data-table="disaster_preparedness" data-field="x_preparedness_guide" name="x_preparedness_guide" id="x_preparedness_guide" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->preparedness_guide->getPlaceHolder()) ?>"<?= $Page->preparedness_guide->editAttributes() ?> aria-describedby="x_preparedness_guide_help"><?= $Page->preparedness_guide->EditValue ?></textarea>
<?= $Page->preparedness_guide->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->preparedness_guide->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->emergency_hotlines->Visible) { // emergency_hotlines ?>
    <div id="r_emergency_hotlines"<?= $Page->emergency_hotlines->rowAttributes() ?>>
        <label id="elh_disaster_preparedness_emergency_hotlines" for="x_emergency_hotlines" class="<?= $Page->LeftColumnClass ?>"><?= $Page->emergency_hotlines->caption() ?><?= $Page->emergency_hotlines->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->emergency_hotlines->cellAttributes() ?>>
<span id="el_disaster_preparedness_emergency_hotlines">
<textarea data-table="disaster_preparedness" data-field="x_emergency_hotlines" name="x_emergency_hotlines" id="x_emergency_hotlines" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->emergency_hotlines->getPlaceHolder()) ?>"<?= $Page->emergency_hotlines->editAttributes() ?> aria-describedby="x_emergency_hotlines_help"><?= $Page->emergency_hotlines->EditValue ?></textarea>
<?= $Page->emergency_hotlines->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->emergency_hotlines->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->evacuation_centers->Visible) { // evacuation_centers ?>
    <div id="r_evacuation_centers"<?= $Page->evacuation_centers->rowAttributes() ?>>
        <label id="elh_disaster_preparedness_evacuation_centers" for="x_evacuation_centers" class="<?= $Page->LeftColumnClass ?>"><?= $Page->evacuation_centers->caption() ?><?= $Page->evacuation_centers->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->evacuation_centers->cellAttributes() ?>>
<span id="el_disaster_preparedness_evacuation_centers">
<textarea data-table="disaster_preparedness" data-field="x_evacuation_centers" name="x_evacuation_centers" id="x_evacuation_centers" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->evacuation_centers->getPlaceHolder()) ?>"<?= $Page->evacuation_centers->editAttributes() ?> aria-describedby="x_evacuation_centers_help"><?= $Page->evacuation_centers->EditValue ?></textarea>
<?= $Page->evacuation_centers->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->evacuation_centers->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->relief_procedures->Visible) { // relief_procedures ?>
    <div id="r_relief_procedures"<?= $Page->relief_procedures->rowAttributes() ?>>
        <label id="elh_disaster_preparedness_relief_procedures" for="x_relief_procedures" class="<?= $Page->LeftColumnClass ?>"><?= $Page->relief_procedures->caption() ?><?= $Page->relief_procedures->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->relief_procedures->cellAttributes() ?>>
<span id="el_disaster_preparedness_relief_procedures">
<textarea data-table="disaster_preparedness" data-field="x_relief_procedures" name="x_relief_procedures" id="x_relief_procedures" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->relief_procedures->getPlaceHolder()) ?>"<?= $Page->relief_procedures->editAttributes() ?> aria-describedby="x_relief_procedures_help"><?= $Page->relief_procedures->EditValue ?></textarea>
<?= $Page->relief_procedures->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->relief_procedures->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
    <div id="r_featured_image"<?= $Page->featured_image->rowAttributes() ?>>
        <label id="elh_disaster_preparedness_featured_image" for="x_featured_image" class="<?= $Page->LeftColumnClass ?>"><?= $Page->featured_image->caption() ?><?= $Page->featured_image->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->featured_image->cellAttributes() ?>>
<span id="el_disaster_preparedness_featured_image">
<input type="<?= $Page->featured_image->getInputTextType() ?>" name="x_featured_image" id="x_featured_image" data-table="disaster_preparedness" data-field="x_featured_image" value="<?= $Page->featured_image->EditValue ?>" size="30" maxlength="500" placeholder="<?= HtmlEncode($Page->featured_image->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->featured_image->formatPattern()) ?>"<?= $Page->featured_image->editAttributes() ?> aria-describedby="x_featured_image_help">
<?= $Page->featured_image->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->featured_image->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
    <div id="r_display_order"<?= $Page->display_order->rowAttributes() ?>>
        <label id="elh_disaster_preparedness_display_order" for="x_display_order" class="<?= $Page->LeftColumnClass ?>"><?= $Page->display_order->caption() ?><?= $Page->display_order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->display_order->cellAttributes() ?>>
<span id="el_disaster_preparedness_display_order">
<input type="<?= $Page->display_order->getInputTextType() ?>" name="x_display_order" id="x_display_order" data-table="disaster_preparedness" data-field="x_display_order" value="<?= $Page->display_order->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->display_order->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->display_order->formatPattern()) ?>"<?= $Page->display_order->editAttributes() ?> aria-describedby="x_display_order_help">
<?= $Page->display_order->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->display_order->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <div id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <label id="elh_disaster_preparedness_created_at" for="x_created_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created_at->caption() ?><?= $Page->created_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->created_at->cellAttributes() ?>>
<span id="el_disaster_preparedness_created_at">
<input type="<?= $Page->created_at->getInputTextType() ?>" name="x_created_at" id="x_created_at" data-table="disaster_preparedness" data-field="x_created_at" value="<?= $Page->created_at->EditValue ?>" placeholder="<?= HtmlEncode($Page->created_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->created_at->formatPattern()) ?>"<?= $Page->created_at->editAttributes() ?> aria-describedby="x_created_at_help">
<?= $Page->created_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created_at->getErrorMessage() ?></div>
<?php if (!$Page->created_at->ReadOnly && !$Page->created_at->Disabled && !isset($Page->created_at->EditAttrs["readonly"]) && !isset($Page->created_at->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdisaster_preparednessedit", "datetimepicker"], function () {
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
    ew.createDateTimePicker("fdisaster_preparednessedit", "x_created_at", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fdisaster_preparednessedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fdisaster_preparednessedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("disaster_preparedness");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
