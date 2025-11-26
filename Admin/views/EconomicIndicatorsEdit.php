<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$EconomicIndicatorsEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="feconomic_indicatorsedit" id="feconomic_indicatorsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { economic_indicators: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var feconomic_indicatorsedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("feconomic_indicatorsedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
            ["indicator_name", [fields.indicator_name.visible && fields.indicator_name.required ? ew.Validators.required(fields.indicator_name.caption) : null], fields.indicator_name.isInvalid],
            ["value", [fields.value.visible && fields.value.required ? ew.Validators.required(fields.value.caption) : null], fields.value.isInvalid],
            ["unit", [fields.unit.visible && fields.unit.required ? ew.Validators.required(fields.unit.caption) : null], fields.unit.isInvalid],
            ["year", [fields.year.visible && fields.year.required ? ew.Validators.required(fields.year.caption) : null, ew.Validators.integer], fields.year.isInvalid],
            ["quarter", [fields.quarter.visible && fields.quarter.required ? ew.Validators.required(fields.quarter.caption) : null], fields.quarter.isInvalid],
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
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="economic_indicators">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id"<?= $Page->id->rowAttributes() ?>>
        <label id="elh_economic_indicators_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id->cellAttributes() ?>>
<span id="el_economic_indicators_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
<input type="hidden" data-table="economic_indicators" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->indicator_name->Visible) { // indicator_name ?>
    <div id="r_indicator_name"<?= $Page->indicator_name->rowAttributes() ?>>
        <label id="elh_economic_indicators_indicator_name" for="x_indicator_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->indicator_name->caption() ?><?= $Page->indicator_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->indicator_name->cellAttributes() ?>>
<span id="el_economic_indicators_indicator_name">
<input type="<?= $Page->indicator_name->getInputTextType() ?>" name="x_indicator_name" id="x_indicator_name" data-table="economic_indicators" data-field="x_indicator_name" value="<?= $Page->indicator_name->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->indicator_name->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->indicator_name->formatPattern()) ?>"<?= $Page->indicator_name->editAttributes() ?> aria-describedby="x_indicator_name_help">
<?= $Page->indicator_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->indicator_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->value->Visible) { // value ?>
    <div id="r_value"<?= $Page->value->rowAttributes() ?>>
        <label id="elh_economic_indicators_value" for="x_value" class="<?= $Page->LeftColumnClass ?>"><?= $Page->value->caption() ?><?= $Page->value->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->value->cellAttributes() ?>>
<span id="el_economic_indicators_value">
<input type="<?= $Page->value->getInputTextType() ?>" name="x_value" id="x_value" data-table="economic_indicators" data-field="x_value" value="<?= $Page->value->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->value->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->value->formatPattern()) ?>"<?= $Page->value->editAttributes() ?> aria-describedby="x_value_help">
<?= $Page->value->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->value->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->unit->Visible) { // unit ?>
    <div id="r_unit"<?= $Page->unit->rowAttributes() ?>>
        <label id="elh_economic_indicators_unit" for="x_unit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->unit->caption() ?><?= $Page->unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->unit->cellAttributes() ?>>
<span id="el_economic_indicators_unit">
<input type="<?= $Page->unit->getInputTextType() ?>" name="x_unit" id="x_unit" data-table="economic_indicators" data-field="x_unit" value="<?= $Page->unit->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->unit->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->unit->formatPattern()) ?>"<?= $Page->unit->editAttributes() ?> aria-describedby="x_unit_help">
<?= $Page->unit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->unit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->year->Visible) { // year ?>
    <div id="r_year"<?= $Page->year->rowAttributes() ?>>
        <label id="elh_economic_indicators_year" for="x_year" class="<?= $Page->LeftColumnClass ?>"><?= $Page->year->caption() ?><?= $Page->year->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->year->cellAttributes() ?>>
<span id="el_economic_indicators_year">
<input type="<?= $Page->year->getInputTextType() ?>" name="x_year" id="x_year" data-table="economic_indicators" data-field="x_year" value="<?= $Page->year->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->year->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->year->formatPattern()) ?>"<?= $Page->year->editAttributes() ?> aria-describedby="x_year_help">
<?= $Page->year->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->year->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->quarter->Visible) { // quarter ?>
    <div id="r_quarter"<?= $Page->quarter->rowAttributes() ?>>
        <label id="elh_economic_indicators_quarter" for="x_quarter" class="<?= $Page->LeftColumnClass ?>"><?= $Page->quarter->caption() ?><?= $Page->quarter->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->quarter->cellAttributes() ?>>
<span id="el_economic_indicators_quarter">
<input type="<?= $Page->quarter->getInputTextType() ?>" name="x_quarter" id="x_quarter" data-table="economic_indicators" data-field="x_quarter" value="<?= $Page->quarter->EditValue ?>" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->quarter->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->quarter->formatPattern()) ?>"<?= $Page->quarter->editAttributes() ?> aria-describedby="x_quarter_help">
<?= $Page->quarter->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->quarter->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->source->Visible) { // source ?>
    <div id="r_source"<?= $Page->source->rowAttributes() ?>>
        <label id="elh_economic_indicators_source" for="x_source" class="<?= $Page->LeftColumnClass ?>"><?= $Page->source->caption() ?><?= $Page->source->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->source->cellAttributes() ?>>
<span id="el_economic_indicators_source">
<input type="<?= $Page->source->getInputTextType() ?>" name="x_source" id="x_source" data-table="economic_indicators" data-field="x_source" value="<?= $Page->source->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->source->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->source->formatPattern()) ?>"<?= $Page->source->editAttributes() ?> aria-describedby="x_source_help">
<?= $Page->source->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->source->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
    <div id="r_display_order"<?= $Page->display_order->rowAttributes() ?>>
        <label id="elh_economic_indicators_display_order" for="x_display_order" class="<?= $Page->LeftColumnClass ?>"><?= $Page->display_order->caption() ?><?= $Page->display_order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->display_order->cellAttributes() ?>>
<span id="el_economic_indicators_display_order">
<input type="<?= $Page->display_order->getInputTextType() ?>" name="x_display_order" id="x_display_order" data-table="economic_indicators" data-field="x_display_order" value="<?= $Page->display_order->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->display_order->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->display_order->formatPattern()) ?>"<?= $Page->display_order->editAttributes() ?> aria-describedby="x_display_order_help">
<?= $Page->display_order->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->display_order->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <div id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <label id="elh_economic_indicators_created_at" for="x_created_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created_at->caption() ?><?= $Page->created_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->created_at->cellAttributes() ?>>
<span id="el_economic_indicators_created_at">
<input type="<?= $Page->created_at->getInputTextType() ?>" name="x_created_at" id="x_created_at" data-table="economic_indicators" data-field="x_created_at" value="<?= $Page->created_at->EditValue ?>" placeholder="<?= HtmlEncode($Page->created_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->created_at->formatPattern()) ?>"<?= $Page->created_at->editAttributes() ?> aria-describedby="x_created_at_help">
<?= $Page->created_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created_at->getErrorMessage() ?></div>
<?php if (!$Page->created_at->ReadOnly && !$Page->created_at->Disabled && !isset($Page->created_at->EditAttrs["readonly"]) && !isset($Page->created_at->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["feconomic_indicatorsedit", "datetimepicker"], function () {
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
    ew.createDateTimePicker("feconomic_indicatorsedit", "x_created_at", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="feconomic_indicatorsedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="feconomic_indicatorsedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("economic_indicators");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
