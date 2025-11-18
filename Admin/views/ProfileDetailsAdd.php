<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$ProfileDetailsAdd = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { profile_details: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fprofile_detailsadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fprofile_detailsadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["detail_key", [fields.detail_key.visible && fields.detail_key.required ? ew.Validators.required(fields.detail_key.caption) : null], fields.detail_key.isInvalid],
            ["detail_label", [fields.detail_label.visible && fields.detail_label.required ? ew.Validators.required(fields.detail_label.caption) : null], fields.detail_label.isInvalid],
            ["detail_value", [fields.detail_value.visible && fields.detail_value.required ? ew.Validators.required(fields.detail_value.caption) : null], fields.detail_value.isInvalid],
            ["icon_class", [fields.icon_class.visible && fields.icon_class.required ? ew.Validators.required(fields.icon_class.caption) : null], fields.icon_class.isInvalid],
            ["display_order", [fields.display_order.visible && fields.display_order.required ? ew.Validators.required(fields.display_order.caption) : null, ew.Validators.integer], fields.display_order.isInvalid],
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
<form name="fprofile_detailsadd" id="fprofile_detailsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="profile_details">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->detail_key->Visible) { // detail_key ?>
    <div id="r_detail_key"<?= $Page->detail_key->rowAttributes() ?>>
        <label id="elh_profile_details_detail_key" for="x_detail_key" class="<?= $Page->LeftColumnClass ?>"><?= $Page->detail_key->caption() ?><?= $Page->detail_key->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->detail_key->cellAttributes() ?>>
<span id="el_profile_details_detail_key">
<input type="<?= $Page->detail_key->getInputTextType() ?>" name="x_detail_key" id="x_detail_key" data-table="profile_details" data-field="x_detail_key" value="<?= $Page->detail_key->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->detail_key->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->detail_key->formatPattern()) ?>"<?= $Page->detail_key->editAttributes() ?> aria-describedby="x_detail_key_help">
<?= $Page->detail_key->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->detail_key->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->detail_label->Visible) { // detail_label ?>
    <div id="r_detail_label"<?= $Page->detail_label->rowAttributes() ?>>
        <label id="elh_profile_details_detail_label" for="x_detail_label" class="<?= $Page->LeftColumnClass ?>"><?= $Page->detail_label->caption() ?><?= $Page->detail_label->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->detail_label->cellAttributes() ?>>
<span id="el_profile_details_detail_label">
<input type="<?= $Page->detail_label->getInputTextType() ?>" name="x_detail_label" id="x_detail_label" data-table="profile_details" data-field="x_detail_label" value="<?= $Page->detail_label->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->detail_label->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->detail_label->formatPattern()) ?>"<?= $Page->detail_label->editAttributes() ?> aria-describedby="x_detail_label_help">
<?= $Page->detail_label->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->detail_label->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->detail_value->Visible) { // detail_value ?>
    <div id="r_detail_value"<?= $Page->detail_value->rowAttributes() ?>>
        <label id="elh_profile_details_detail_value" for="x_detail_value" class="<?= $Page->LeftColumnClass ?>"><?= $Page->detail_value->caption() ?><?= $Page->detail_value->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->detail_value->cellAttributes() ?>>
<span id="el_profile_details_detail_value">
<input type="<?= $Page->detail_value->getInputTextType() ?>" name="x_detail_value" id="x_detail_value" data-table="profile_details" data-field="x_detail_value" value="<?= $Page->detail_value->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->detail_value->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->detail_value->formatPattern()) ?>"<?= $Page->detail_value->editAttributes() ?> aria-describedby="x_detail_value_help">
<?= $Page->detail_value->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->detail_value->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->icon_class->Visible) { // icon_class ?>
    <div id="r_icon_class"<?= $Page->icon_class->rowAttributes() ?>>
        <label id="elh_profile_details_icon_class" for="x_icon_class" class="<?= $Page->LeftColumnClass ?>"><?= $Page->icon_class->caption() ?><?= $Page->icon_class->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->icon_class->cellAttributes() ?>>
<span id="el_profile_details_icon_class">
<input type="<?= $Page->icon_class->getInputTextType() ?>" name="x_icon_class" id="x_icon_class" data-table="profile_details" data-field="x_icon_class" value="<?= $Page->icon_class->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->icon_class->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->icon_class->formatPattern()) ?>"<?= $Page->icon_class->editAttributes() ?> aria-describedby="x_icon_class_help">
<?= $Page->icon_class->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->icon_class->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
    <div id="r_display_order"<?= $Page->display_order->rowAttributes() ?>>
        <label id="elh_profile_details_display_order" for="x_display_order" class="<?= $Page->LeftColumnClass ?>"><?= $Page->display_order->caption() ?><?= $Page->display_order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->display_order->cellAttributes() ?>>
<span id="el_profile_details_display_order">
<input type="<?= $Page->display_order->getInputTextType() ?>" name="x_display_order" id="x_display_order" data-table="profile_details" data-field="x_display_order" value="<?= $Page->display_order->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->display_order->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->display_order->formatPattern()) ?>"<?= $Page->display_order->editAttributes() ?> aria-describedby="x_display_order_help">
<?= $Page->display_order->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->display_order->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->is_active->Visible) { // is_active ?>
    <div id="r_is_active"<?= $Page->is_active->rowAttributes() ?>>
        <label id="elh_profile_details_is_active" class="<?= $Page->LeftColumnClass ?>"><?= $Page->is_active->caption() ?><?= $Page->is_active->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->is_active->cellAttributes() ?>>
<span id="el_profile_details_is_active">
<div class="form-check d-inline-block">
    <input type="checkbox" class="form-check-input<?= $Page->is_active->isInvalidClass() ?>" data-table="profile_details" data-field="x_is_active" data-boolean name="x_is_active" id="x_is_active" value="1"<?= ConvertToBool($Page->is_active->CurrentValue) ? " checked" : "" ?><?= $Page->is_active->editAttributes() ?> aria-describedby="x_is_active_help">
    <div class="invalid-feedback"><?= $Page->is_active->getErrorMessage() ?></div>
</div>
<?= $Page->is_active->getCustomMessage() ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <div id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <label id="elh_profile_details_created_at" for="x_created_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created_at->caption() ?><?= $Page->created_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->created_at->cellAttributes() ?>>
<span id="el_profile_details_created_at">
<input type="<?= $Page->created_at->getInputTextType() ?>" name="x_created_at" id="x_created_at" data-table="profile_details" data-field="x_created_at" value="<?= $Page->created_at->EditValue ?>" placeholder="<?= HtmlEncode($Page->created_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->created_at->formatPattern()) ?>"<?= $Page->created_at->editAttributes() ?> aria-describedby="x_created_at_help">
<?= $Page->created_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created_at->getErrorMessage() ?></div>
<?php if (!$Page->created_at->ReadOnly && !$Page->created_at->Disabled && !isset($Page->created_at->EditAttrs["readonly"]) && !isset($Page->created_at->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fprofile_detailsadd", "datetimepicker"], function () {
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
    ew.createDateTimePicker("fprofile_detailsadd", "x_created_at", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fprofile_detailsadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fprofile_detailsadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("profile_details");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
