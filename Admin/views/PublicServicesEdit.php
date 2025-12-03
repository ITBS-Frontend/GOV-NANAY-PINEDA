<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$PublicServicesEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="fpublic_servicesedit" id="fpublic_servicesedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { public_services: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var fpublic_servicesedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fpublic_servicesedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
            ["category_id", [fields.category_id.visible && fields.category_id.required ? ew.Validators.required(fields.category_id.caption) : null, ew.Validators.integer], fields.category_id.isInvalid],
            ["service_name", [fields.service_name.visible && fields.service_name.required ? ew.Validators.required(fields.service_name.caption) : null], fields.service_name.isInvalid],
            ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
            ["requirements", [fields.requirements.visible && fields.requirements.required ? ew.Validators.required(fields.requirements.caption) : null], fields.requirements.isInvalid],
            ["process_steps", [fields.process_steps.visible && fields.process_steps.required ? ew.Validators.required(fields.process_steps.caption) : null], fields.process_steps.isInvalid],
            ["processing_time", [fields.processing_time.visible && fields.processing_time.required ? ew.Validators.required(fields.processing_time.caption) : null], fields.processing_time.isInvalid],
            ["fees", [fields.fees.visible && fields.fees.required ? ew.Validators.required(fields.fees.caption) : null], fields.fees.isInvalid],
            ["contact_info", [fields.contact_info.visible && fields.contact_info.required ? ew.Validators.required(fields.contact_info.caption) : null], fields.contact_info.isInvalid],
            ["online_link", [fields.online_link.visible && fields.online_link.required ? ew.Validators.required(fields.online_link.caption) : null], fields.online_link.isInvalid],
            ["display_order", [fields.display_order.visible && fields.display_order.required ? ew.Validators.required(fields.display_order.caption) : null, ew.Validators.integer], fields.display_order.isInvalid],
            ["is_active", [fields.is_active.visible && fields.is_active.required ? ew.Validators.required(fields.is_active.caption) : null], fields.is_active.isInvalid],
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
<input type="hidden" name="t" value="public_services">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id"<?= $Page->id->rowAttributes() ?>>
        <label id="elh_public_services_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id->cellAttributes() ?>>
<span id="el_public_services_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
<input type="hidden" data-table="public_services" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->category_id->Visible) { // category_id ?>
    <div id="r_category_id"<?= $Page->category_id->rowAttributes() ?>>
        <label id="elh_public_services_category_id" for="x_category_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->category_id->caption() ?><?= $Page->category_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->category_id->cellAttributes() ?>>
<span id="el_public_services_category_id">
<input type="<?= $Page->category_id->getInputTextType() ?>" name="x_category_id" id="x_category_id" data-table="public_services" data-field="x_category_id" value="<?= $Page->category_id->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->category_id->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->category_id->formatPattern()) ?>"<?= $Page->category_id->editAttributes() ?> aria-describedby="x_category_id_help">
<?= $Page->category_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->category_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->service_name->Visible) { // service_name ?>
    <div id="r_service_name"<?= $Page->service_name->rowAttributes() ?>>
        <label id="elh_public_services_service_name" for="x_service_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->service_name->caption() ?><?= $Page->service_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->service_name->cellAttributes() ?>>
<span id="el_public_services_service_name">
<input type="<?= $Page->service_name->getInputTextType() ?>" name="x_service_name" id="x_service_name" data-table="public_services" data-field="x_service_name" value="<?= $Page->service_name->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->service_name->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->service_name->formatPattern()) ?>"<?= $Page->service_name->editAttributes() ?> aria-describedby="x_service_name_help">
<?= $Page->service_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->service_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description"<?= $Page->description->rowAttributes() ?>>
        <label id="elh_public_services_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->description->cellAttributes() ?>>
<span id="el_public_services_description">
<textarea data-table="public_services" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->requirements->Visible) { // requirements ?>
    <div id="r_requirements"<?= $Page->requirements->rowAttributes() ?>>
        <label id="elh_public_services_requirements" for="x_requirements" class="<?= $Page->LeftColumnClass ?>"><?= $Page->requirements->caption() ?><?= $Page->requirements->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->requirements->cellAttributes() ?>>
<span id="el_public_services_requirements">
<textarea data-table="public_services" data-field="x_requirements" name="x_requirements" id="x_requirements" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->requirements->getPlaceHolder()) ?>"<?= $Page->requirements->editAttributes() ?> aria-describedby="x_requirements_help"><?= $Page->requirements->EditValue ?></textarea>
<?= $Page->requirements->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->requirements->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->process_steps->Visible) { // process_steps ?>
    <div id="r_process_steps"<?= $Page->process_steps->rowAttributes() ?>>
        <label id="elh_public_services_process_steps" for="x_process_steps" class="<?= $Page->LeftColumnClass ?>"><?= $Page->process_steps->caption() ?><?= $Page->process_steps->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->process_steps->cellAttributes() ?>>
<span id="el_public_services_process_steps">
<textarea data-table="public_services" data-field="x_process_steps" name="x_process_steps" id="x_process_steps" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->process_steps->getPlaceHolder()) ?>"<?= $Page->process_steps->editAttributes() ?> aria-describedby="x_process_steps_help"><?= $Page->process_steps->EditValue ?></textarea>
<?= $Page->process_steps->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->process_steps->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->processing_time->Visible) { // processing_time ?>
    <div id="r_processing_time"<?= $Page->processing_time->rowAttributes() ?>>
        <label id="elh_public_services_processing_time" for="x_processing_time" class="<?= $Page->LeftColumnClass ?>"><?= $Page->processing_time->caption() ?><?= $Page->processing_time->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->processing_time->cellAttributes() ?>>
<span id="el_public_services_processing_time">
<input type="<?= $Page->processing_time->getInputTextType() ?>" name="x_processing_time" id="x_processing_time" data-table="public_services" data-field="x_processing_time" value="<?= $Page->processing_time->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->processing_time->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->processing_time->formatPattern()) ?>"<?= $Page->processing_time->editAttributes() ?> aria-describedby="x_processing_time_help">
<?= $Page->processing_time->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->processing_time->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->fees->Visible) { // fees ?>
    <div id="r_fees"<?= $Page->fees->rowAttributes() ?>>
        <label id="elh_public_services_fees" for="x_fees" class="<?= $Page->LeftColumnClass ?>"><?= $Page->fees->caption() ?><?= $Page->fees->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->fees->cellAttributes() ?>>
<span id="el_public_services_fees">
<input type="<?= $Page->fees->getInputTextType() ?>" name="x_fees" id="x_fees" data-table="public_services" data-field="x_fees" value="<?= $Page->fees->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->fees->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->fees->formatPattern()) ?>"<?= $Page->fees->editAttributes() ?> aria-describedby="x_fees_help">
<?= $Page->fees->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->fees->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->contact_info->Visible) { // contact_info ?>
    <div id="r_contact_info"<?= $Page->contact_info->rowAttributes() ?>>
        <label id="elh_public_services_contact_info" for="x_contact_info" class="<?= $Page->LeftColumnClass ?>"><?= $Page->contact_info->caption() ?><?= $Page->contact_info->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->contact_info->cellAttributes() ?>>
<span id="el_public_services_contact_info">
<textarea data-table="public_services" data-field="x_contact_info" name="x_contact_info" id="x_contact_info" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->contact_info->getPlaceHolder()) ?>"<?= $Page->contact_info->editAttributes() ?> aria-describedby="x_contact_info_help"><?= $Page->contact_info->EditValue ?></textarea>
<?= $Page->contact_info->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->contact_info->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->online_link->Visible) { // online_link ?>
    <div id="r_online_link"<?= $Page->online_link->rowAttributes() ?>>
        <label id="elh_public_services_online_link" for="x_online_link" class="<?= $Page->LeftColumnClass ?>"><?= $Page->online_link->caption() ?><?= $Page->online_link->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->online_link->cellAttributes() ?>>
<span id="el_public_services_online_link">
<input type="<?= $Page->online_link->getInputTextType() ?>" name="x_online_link" id="x_online_link" data-table="public_services" data-field="x_online_link" value="<?= $Page->online_link->EditValue ?>" size="30" maxlength="500" placeholder="<?= HtmlEncode($Page->online_link->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->online_link->formatPattern()) ?>"<?= $Page->online_link->editAttributes() ?> aria-describedby="x_online_link_help">
<?= $Page->online_link->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->online_link->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
    <div id="r_display_order"<?= $Page->display_order->rowAttributes() ?>>
        <label id="elh_public_services_display_order" for="x_display_order" class="<?= $Page->LeftColumnClass ?>"><?= $Page->display_order->caption() ?><?= $Page->display_order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->display_order->cellAttributes() ?>>
<span id="el_public_services_display_order">
<input type="<?= $Page->display_order->getInputTextType() ?>" name="x_display_order" id="x_display_order" data-table="public_services" data-field="x_display_order" value="<?= $Page->display_order->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->display_order->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->display_order->formatPattern()) ?>"<?= $Page->display_order->editAttributes() ?> aria-describedby="x_display_order_help">
<?= $Page->display_order->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->display_order->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->is_active->Visible) { // is_active ?>
    <div id="r_is_active"<?= $Page->is_active->rowAttributes() ?>>
        <label id="elh_public_services_is_active" class="<?= $Page->LeftColumnClass ?>"><?= $Page->is_active->caption() ?><?= $Page->is_active->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->is_active->cellAttributes() ?>>
<span id="el_public_services_is_active">
<div class="form-check d-inline-block">
    <input type="checkbox" class="form-check-input<?= $Page->is_active->isInvalidClass() ?>" data-table="public_services" data-field="x_is_active" data-boolean name="x_is_active" id="x_is_active" value="1"<?= ConvertToBool($Page->is_active->CurrentValue) ? " checked" : "" ?><?= $Page->is_active->editAttributes() ?> aria-describedby="x_is_active_help">
    <div class="invalid-feedback"><?= $Page->is_active->getErrorMessage() ?></div>
</div>
<?= $Page->is_active->getCustomMessage() ?>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fpublic_servicesedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fpublic_servicesedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("public_services");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
