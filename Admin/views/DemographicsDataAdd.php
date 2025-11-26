<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$DemographicsDataAdd = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { demographics_data: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fdemographics_dataadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fdemographics_dataadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["data_type", [fields.data_type.visible && fields.data_type.required ? ew.Validators.required(fields.data_type.caption) : null], fields.data_type.isInvalid],
            ["label", [fields.label.visible && fields.label.required ? ew.Validators.required(fields.label.caption) : null], fields.label.isInvalid],
            ["value", [fields.value.visible && fields.value.required ? ew.Validators.required(fields.value.caption) : null], fields.value.isInvalid],
            ["year", [fields.year.visible && fields.year.required ? ew.Validators.required(fields.year.caption) : null, ew.Validators.integer], fields.year.isInvalid],
            ["source", [fields.source.visible && fields.source.required ? ew.Validators.required(fields.source.caption) : null], fields.source.isInvalid],
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
<form name="fdemographics_dataadd" id="fdemographics_dataadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="demographics_data">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->data_type->Visible) { // data_type ?>
    <div id="r_data_type"<?= $Page->data_type->rowAttributes() ?>>
        <label id="elh_demographics_data_data_type" for="x_data_type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->data_type->caption() ?><?= $Page->data_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->data_type->cellAttributes() ?>>
<span id="el_demographics_data_data_type">
<input type="<?= $Page->data_type->getInputTextType() ?>" name="x_data_type" id="x_data_type" data-table="demographics_data" data-field="x_data_type" value="<?= $Page->data_type->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->data_type->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->data_type->formatPattern()) ?>"<?= $Page->data_type->editAttributes() ?> aria-describedby="x_data_type_help">
<?= $Page->data_type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->data_type->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->label->Visible) { // label ?>
    <div id="r_label"<?= $Page->label->rowAttributes() ?>>
        <label id="elh_demographics_data_label" for="x_label" class="<?= $Page->LeftColumnClass ?>"><?= $Page->label->caption() ?><?= $Page->label->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->label->cellAttributes() ?>>
<span id="el_demographics_data_label">
<input type="<?= $Page->label->getInputTextType() ?>" name="x_label" id="x_label" data-table="demographics_data" data-field="x_label" value="<?= $Page->label->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->label->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->label->formatPattern()) ?>"<?= $Page->label->editAttributes() ?> aria-describedby="x_label_help">
<?= $Page->label->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->label->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->value->Visible) { // value ?>
    <div id="r_value"<?= $Page->value->rowAttributes() ?>>
        <label id="elh_demographics_data_value" for="x_value" class="<?= $Page->LeftColumnClass ?>"><?= $Page->value->caption() ?><?= $Page->value->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->value->cellAttributes() ?>>
<span id="el_demographics_data_value">
<input type="<?= $Page->value->getInputTextType() ?>" name="x_value" id="x_value" data-table="demographics_data" data-field="x_value" value="<?= $Page->value->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->value->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->value->formatPattern()) ?>"<?= $Page->value->editAttributes() ?> aria-describedby="x_value_help">
<?= $Page->value->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->value->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->year->Visible) { // year ?>
    <div id="r_year"<?= $Page->year->rowAttributes() ?>>
        <label id="elh_demographics_data_year" for="x_year" class="<?= $Page->LeftColumnClass ?>"><?= $Page->year->caption() ?><?= $Page->year->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->year->cellAttributes() ?>>
<span id="el_demographics_data_year">
<input type="<?= $Page->year->getInputTextType() ?>" name="x_year" id="x_year" data-table="demographics_data" data-field="x_year" value="<?= $Page->year->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->year->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->year->formatPattern()) ?>"<?= $Page->year->editAttributes() ?> aria-describedby="x_year_help">
<?= $Page->year->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->year->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->source->Visible) { // source ?>
    <div id="r_source"<?= $Page->source->rowAttributes() ?>>
        <label id="elh_demographics_data_source" for="x_source" class="<?= $Page->LeftColumnClass ?>"><?= $Page->source->caption() ?><?= $Page->source->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->source->cellAttributes() ?>>
<span id="el_demographics_data_source">
<input type="<?= $Page->source->getInputTextType() ?>" name="x_source" id="x_source" data-table="demographics_data" data-field="x_source" value="<?= $Page->source->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->source->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->source->formatPattern()) ?>"<?= $Page->source->editAttributes() ?> aria-describedby="x_source_help">
<?= $Page->source->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->source->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
    <div id="r_display_order"<?= $Page->display_order->rowAttributes() ?>>
        <label id="elh_demographics_data_display_order" for="x_display_order" class="<?= $Page->LeftColumnClass ?>"><?= $Page->display_order->caption() ?><?= $Page->display_order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->display_order->cellAttributes() ?>>
<span id="el_demographics_data_display_order">
<input type="<?= $Page->display_order->getInputTextType() ?>" name="x_display_order" id="x_display_order" data-table="demographics_data" data-field="x_display_order" value="<?= $Page->display_order->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->display_order->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->display_order->formatPattern()) ?>"<?= $Page->display_order->editAttributes() ?> aria-describedby="x_display_order_help">
<?= $Page->display_order->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->display_order->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <div id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <label id="elh_demographics_data_created_at" for="x_created_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created_at->caption() ?><?= $Page->created_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->created_at->cellAttributes() ?>>
<span id="el_demographics_data_created_at">
<input type="<?= $Page->created_at->getInputTextType() ?>" name="x_created_at" id="x_created_at" data-table="demographics_data" data-field="x_created_at" value="<?= $Page->created_at->EditValue ?>" placeholder="<?= HtmlEncode($Page->created_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->created_at->formatPattern()) ?>"<?= $Page->created_at->editAttributes() ?> aria-describedby="x_created_at_help">
<?= $Page->created_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created_at->getErrorMessage() ?></div>
<?php if (!$Page->created_at->ReadOnly && !$Page->created_at->Disabled && !isset($Page->created_at->EditAttrs["readonly"]) && !isset($Page->created_at->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdemographics_dataadd", "datetimepicker"], function () {
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
    ew.createDateTimePicker("fdemographics_dataadd", "x_created_at", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fdemographics_dataadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fdemographics_dataadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("demographics_data");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
