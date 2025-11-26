<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$InvestmentOpportunitiesEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="finvestment_opportunitiesedit" id="finvestment_opportunitiesedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { investment_opportunities: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var finvestment_opportunitiesedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("finvestment_opportunitiesedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
            ["opportunity_title", [fields.opportunity_title.visible && fields.opportunity_title.required ? ew.Validators.required(fields.opportunity_title.caption) : null], fields.opportunity_title.isInvalid],
            ["sector", [fields.sector.visible && fields.sector.required ? ew.Validators.required(fields.sector.caption) : null], fields.sector.isInvalid],
            ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
            ["location", [fields.location.visible && fields.location.required ? ew.Validators.required(fields.location.caption) : null], fields.location.isInvalid],
            ["estimated_investment", [fields.estimated_investment.visible && fields.estimated_investment.required ? ew.Validators.required(fields.estimated_investment.caption) : null], fields.estimated_investment.isInvalid],
            ["potential_returns", [fields.potential_returns.visible && fields.potential_returns.required ? ew.Validators.required(fields.potential_returns.caption) : null], fields.potential_returns.isInvalid],
            ["incentives", [fields.incentives.visible && fields.incentives.required ? ew.Validators.required(fields.incentives.caption) : null], fields.incentives.isInvalid],
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
<input type="hidden" name="t" value="investment_opportunities">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id"<?= $Page->id->rowAttributes() ?>>
        <label id="elh_investment_opportunities_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id->cellAttributes() ?>>
<span id="el_investment_opportunities_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
<input type="hidden" data-table="investment_opportunities" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->opportunity_title->Visible) { // opportunity_title ?>
    <div id="r_opportunity_title"<?= $Page->opportunity_title->rowAttributes() ?>>
        <label id="elh_investment_opportunities_opportunity_title" for="x_opportunity_title" class="<?= $Page->LeftColumnClass ?>"><?= $Page->opportunity_title->caption() ?><?= $Page->opportunity_title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->opportunity_title->cellAttributes() ?>>
<span id="el_investment_opportunities_opportunity_title">
<input type="<?= $Page->opportunity_title->getInputTextType() ?>" name="x_opportunity_title" id="x_opportunity_title" data-table="investment_opportunities" data-field="x_opportunity_title" value="<?= $Page->opportunity_title->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->opportunity_title->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->opportunity_title->formatPattern()) ?>"<?= $Page->opportunity_title->editAttributes() ?> aria-describedby="x_opportunity_title_help">
<?= $Page->opportunity_title->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->opportunity_title->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->sector->Visible) { // sector ?>
    <div id="r_sector"<?= $Page->sector->rowAttributes() ?>>
        <label id="elh_investment_opportunities_sector" for="x_sector" class="<?= $Page->LeftColumnClass ?>"><?= $Page->sector->caption() ?><?= $Page->sector->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->sector->cellAttributes() ?>>
<span id="el_investment_opportunities_sector">
<input type="<?= $Page->sector->getInputTextType() ?>" name="x_sector" id="x_sector" data-table="investment_opportunities" data-field="x_sector" value="<?= $Page->sector->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->sector->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->sector->formatPattern()) ?>"<?= $Page->sector->editAttributes() ?> aria-describedby="x_sector_help">
<?= $Page->sector->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->sector->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description"<?= $Page->description->rowAttributes() ?>>
        <label id="elh_investment_opportunities_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->description->cellAttributes() ?>>
<span id="el_investment_opportunities_description">
<textarea data-table="investment_opportunities" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->location->Visible) { // location ?>
    <div id="r_location"<?= $Page->location->rowAttributes() ?>>
        <label id="elh_investment_opportunities_location" for="x_location" class="<?= $Page->LeftColumnClass ?>"><?= $Page->location->caption() ?><?= $Page->location->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->location->cellAttributes() ?>>
<span id="el_investment_opportunities_location">
<input type="<?= $Page->location->getInputTextType() ?>" name="x_location" id="x_location" data-table="investment_opportunities" data-field="x_location" value="<?= $Page->location->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->location->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->location->formatPattern()) ?>"<?= $Page->location->editAttributes() ?> aria-describedby="x_location_help">
<?= $Page->location->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->location->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->estimated_investment->Visible) { // estimated_investment ?>
    <div id="r_estimated_investment"<?= $Page->estimated_investment->rowAttributes() ?>>
        <label id="elh_investment_opportunities_estimated_investment" for="x_estimated_investment" class="<?= $Page->LeftColumnClass ?>"><?= $Page->estimated_investment->caption() ?><?= $Page->estimated_investment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->estimated_investment->cellAttributes() ?>>
<span id="el_investment_opportunities_estimated_investment">
<input type="<?= $Page->estimated_investment->getInputTextType() ?>" name="x_estimated_investment" id="x_estimated_investment" data-table="investment_opportunities" data-field="x_estimated_investment" value="<?= $Page->estimated_investment->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->estimated_investment->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->estimated_investment->formatPattern()) ?>"<?= $Page->estimated_investment->editAttributes() ?> aria-describedby="x_estimated_investment_help">
<?= $Page->estimated_investment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->estimated_investment->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->potential_returns->Visible) { // potential_returns ?>
    <div id="r_potential_returns"<?= $Page->potential_returns->rowAttributes() ?>>
        <label id="elh_investment_opportunities_potential_returns" for="x_potential_returns" class="<?= $Page->LeftColumnClass ?>"><?= $Page->potential_returns->caption() ?><?= $Page->potential_returns->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->potential_returns->cellAttributes() ?>>
<span id="el_investment_opportunities_potential_returns">
<textarea data-table="investment_opportunities" data-field="x_potential_returns" name="x_potential_returns" id="x_potential_returns" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->potential_returns->getPlaceHolder()) ?>"<?= $Page->potential_returns->editAttributes() ?> aria-describedby="x_potential_returns_help"><?= $Page->potential_returns->EditValue ?></textarea>
<?= $Page->potential_returns->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->potential_returns->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->incentives->Visible) { // incentives ?>
    <div id="r_incentives"<?= $Page->incentives->rowAttributes() ?>>
        <label id="elh_investment_opportunities_incentives" for="x_incentives" class="<?= $Page->LeftColumnClass ?>"><?= $Page->incentives->caption() ?><?= $Page->incentives->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->incentives->cellAttributes() ?>>
<span id="el_investment_opportunities_incentives">
<textarea data-table="investment_opportunities" data-field="x_incentives" name="x_incentives" id="x_incentives" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->incentives->getPlaceHolder()) ?>"<?= $Page->incentives->editAttributes() ?> aria-describedby="x_incentives_help"><?= $Page->incentives->EditValue ?></textarea>
<?= $Page->incentives->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->incentives->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->contact_info->Visible) { // contact_info ?>
    <div id="r_contact_info"<?= $Page->contact_info->rowAttributes() ?>>
        <label id="elh_investment_opportunities_contact_info" for="x_contact_info" class="<?= $Page->LeftColumnClass ?>"><?= $Page->contact_info->caption() ?><?= $Page->contact_info->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->contact_info->cellAttributes() ?>>
<span id="el_investment_opportunities_contact_info">
<textarea data-table="investment_opportunities" data-field="x_contact_info" name="x_contact_info" id="x_contact_info" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->contact_info->getPlaceHolder()) ?>"<?= $Page->contact_info->editAttributes() ?> aria-describedby="x_contact_info_help"><?= $Page->contact_info->EditValue ?></textarea>
<?= $Page->contact_info->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->contact_info->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
    <div id="r_featured_image"<?= $Page->featured_image->rowAttributes() ?>>
        <label id="elh_investment_opportunities_featured_image" for="x_featured_image" class="<?= $Page->LeftColumnClass ?>"><?= $Page->featured_image->caption() ?><?= $Page->featured_image->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->featured_image->cellAttributes() ?>>
<span id="el_investment_opportunities_featured_image">
<input type="<?= $Page->featured_image->getInputTextType() ?>" name="x_featured_image" id="x_featured_image" data-table="investment_opportunities" data-field="x_featured_image" value="<?= $Page->featured_image->EditValue ?>" size="30" maxlength="500" placeholder="<?= HtmlEncode($Page->featured_image->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->featured_image->formatPattern()) ?>"<?= $Page->featured_image->editAttributes() ?> aria-describedby="x_featured_image_help">
<?= $Page->featured_image->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->featured_image->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->is_active->Visible) { // is_active ?>
    <div id="r_is_active"<?= $Page->is_active->rowAttributes() ?>>
        <label id="elh_investment_opportunities_is_active" class="<?= $Page->LeftColumnClass ?>"><?= $Page->is_active->caption() ?><?= $Page->is_active->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->is_active->cellAttributes() ?>>
<span id="el_investment_opportunities_is_active">
<div class="form-check d-inline-block">
    <input type="checkbox" class="form-check-input<?= $Page->is_active->isInvalidClass() ?>" data-table="investment_opportunities" data-field="x_is_active" data-boolean name="x_is_active" id="x_is_active" value="1"<?= ConvertToBool($Page->is_active->CurrentValue) ? " checked" : "" ?><?= $Page->is_active->editAttributes() ?> aria-describedby="x_is_active_help">
    <div class="invalid-feedback"><?= $Page->is_active->getErrorMessage() ?></div>
</div>
<?= $Page->is_active->getCustomMessage() ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <div id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <label id="elh_investment_opportunities_created_at" for="x_created_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created_at->caption() ?><?= $Page->created_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->created_at->cellAttributes() ?>>
<span id="el_investment_opportunities_created_at">
<input type="<?= $Page->created_at->getInputTextType() ?>" name="x_created_at" id="x_created_at" data-table="investment_opportunities" data-field="x_created_at" value="<?= $Page->created_at->EditValue ?>" placeholder="<?= HtmlEncode($Page->created_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->created_at->formatPattern()) ?>"<?= $Page->created_at->editAttributes() ?> aria-describedby="x_created_at_help">
<?= $Page->created_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created_at->getErrorMessage() ?></div>
<?php if (!$Page->created_at->ReadOnly && !$Page->created_at->Disabled && !isset($Page->created_at->EditAttrs["readonly"]) && !isset($Page->created_at->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["finvestment_opportunitiesedit", "datetimepicker"], function () {
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
    ew.createDateTimePicker("finvestment_opportunitiesedit", "x_created_at", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="finvestment_opportunitiesedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="finvestment_opportunitiesedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("investment_opportunities");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
