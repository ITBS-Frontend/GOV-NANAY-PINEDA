<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$GovernmentFacilitiesAdd = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { government_facilities: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fgovernment_facilitiesadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fgovernment_facilitiesadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["name", [fields.name.visible && fields.name.required ? ew.Validators.required(fields.name.caption) : null], fields.name.isInvalid],
            ["address", [fields.address.visible && fields.address.required ? ew.Validators.required(fields.address.caption) : null], fields.address.isInvalid],
            ["municipality", [fields.municipality.visible && fields.municipality.required ? ew.Validators.required(fields.municipality.caption) : null], fields.municipality.isInvalid],
            ["contact_number", [fields.contact_number.visible && fields.contact_number.required ? ew.Validators.required(fields.contact_number.caption) : null], fields.contact_number.isInvalid],
            ["_email", [fields._email.visible && fields._email.required ? ew.Validators.required(fields._email.caption) : null], fields._email.isInvalid],
            ["operating_hours", [fields.operating_hours.visible && fields.operating_hours.required ? ew.Validators.required(fields.operating_hours.caption) : null], fields.operating_hours.isInvalid],
            ["services_offered", [fields.services_offered.visible && fields.services_offered.required ? ew.Validators.required(fields.services_offered.caption) : null], fields.services_offered.isInvalid],
            ["coordinates", [fields.coordinates.visible && fields.coordinates.required ? ew.Validators.required(fields.coordinates.caption) : null], fields.coordinates.isInvalid],
            ["featured_image", [fields.featured_image.visible && fields.featured_image.required ? ew.Validators.required(fields.featured_image.caption) : null], fields.featured_image.isInvalid],
            ["is_active", [fields.is_active.visible && fields.is_active.required ? ew.Validators.required(fields.is_active.caption) : null], fields.is_active.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null], fields.created_at.isInvalid],
            ["facility_type_id", [fields.facility_type_id.visible && fields.facility_type_id.required ? ew.Validators.required(fields.facility_type_id.caption) : null], fields.facility_type_id.isInvalid]
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
            "facility_type_id": <?= $Page->facility_type_id->toClientList($Page) ?>,
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
<form name="fgovernment_facilitiesadd" id="fgovernment_facilitiesadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="government_facilities">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->name->Visible) { // name ?>
    <div id="r_name"<?= $Page->name->rowAttributes() ?>>
        <label id="elh_government_facilities_name" for="x_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->name->caption() ?><?= $Page->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->name->cellAttributes() ?>>
<span id="el_government_facilities_name">
<input type="<?= $Page->name->getInputTextType() ?>" name="x_name" id="x_name" data-table="government_facilities" data-field="x_name" value="<?= $Page->name->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->name->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->name->formatPattern()) ?>"<?= $Page->name->editAttributes() ?> aria-describedby="x_name_help">
<?= $Page->name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->address->Visible) { // address ?>
    <div id="r_address"<?= $Page->address->rowAttributes() ?>>
        <label id="elh_government_facilities_address" for="x_address" class="<?= $Page->LeftColumnClass ?>"><?= $Page->address->caption() ?><?= $Page->address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->address->cellAttributes() ?>>
<span id="el_government_facilities_address">
<textarea data-table="government_facilities" data-field="x_address" name="x_address" id="x_address" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->address->getPlaceHolder()) ?>"<?= $Page->address->editAttributes() ?> aria-describedby="x_address_help"><?= $Page->address->EditValue ?></textarea>
<?= $Page->address->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->address->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->municipality->Visible) { // municipality ?>
    <div id="r_municipality"<?= $Page->municipality->rowAttributes() ?>>
        <label id="elh_government_facilities_municipality" for="x_municipality" class="<?= $Page->LeftColumnClass ?>"><?= $Page->municipality->caption() ?><?= $Page->municipality->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->municipality->cellAttributes() ?>>
<span id="el_government_facilities_municipality">
<input type="<?= $Page->municipality->getInputTextType() ?>" name="x_municipality" id="x_municipality" data-table="government_facilities" data-field="x_municipality" value="<?= $Page->municipality->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->municipality->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->municipality->formatPattern()) ?>"<?= $Page->municipality->editAttributes() ?> aria-describedby="x_municipality_help">
<?= $Page->municipality->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->municipality->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->contact_number->Visible) { // contact_number ?>
    <div id="r_contact_number"<?= $Page->contact_number->rowAttributes() ?>>
        <label id="elh_government_facilities_contact_number" for="x_contact_number" class="<?= $Page->LeftColumnClass ?>"><?= $Page->contact_number->caption() ?><?= $Page->contact_number->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->contact_number->cellAttributes() ?>>
<span id="el_government_facilities_contact_number">
<input type="<?= $Page->contact_number->getInputTextType() ?>" name="x_contact_number" id="x_contact_number" data-table="government_facilities" data-field="x_contact_number" value="<?= $Page->contact_number->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->contact_number->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->contact_number->formatPattern()) ?>"<?= $Page->contact_number->editAttributes() ?> aria-describedby="x_contact_number_help">
<?= $Page->contact_number->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->contact_number->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
    <div id="r__email"<?= $Page->_email->rowAttributes() ?>>
        <label id="elh_government_facilities__email" for="x__email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_email->caption() ?><?= $Page->_email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->_email->cellAttributes() ?>>
<span id="el_government_facilities__email">
<input type="<?= $Page->_email->getInputTextType() ?>" name="x__email" id="x__email" data-table="government_facilities" data-field="x__email" value="<?= $Page->_email->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->_email->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->_email->formatPattern()) ?>"<?= $Page->_email->editAttributes() ?> aria-describedby="x__email_help">
<?= $Page->_email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_email->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->operating_hours->Visible) { // operating_hours ?>
    <div id="r_operating_hours"<?= $Page->operating_hours->rowAttributes() ?>>
        <label id="elh_government_facilities_operating_hours" for="x_operating_hours" class="<?= $Page->LeftColumnClass ?>"><?= $Page->operating_hours->caption() ?><?= $Page->operating_hours->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->operating_hours->cellAttributes() ?>>
<span id="el_government_facilities_operating_hours">
<input type="<?= $Page->operating_hours->getInputTextType() ?>" name="x_operating_hours" id="x_operating_hours" data-table="government_facilities" data-field="x_operating_hours" value="<?= $Page->operating_hours->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->operating_hours->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->operating_hours->formatPattern()) ?>"<?= $Page->operating_hours->editAttributes() ?> aria-describedby="x_operating_hours_help">
<?= $Page->operating_hours->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->operating_hours->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->services_offered->Visible) { // services_offered ?>
    <div id="r_services_offered"<?= $Page->services_offered->rowAttributes() ?>>
        <label id="elh_government_facilities_services_offered" for="x_services_offered" class="<?= $Page->LeftColumnClass ?>"><?= $Page->services_offered->caption() ?><?= $Page->services_offered->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->services_offered->cellAttributes() ?>>
<span id="el_government_facilities_services_offered">
<textarea data-table="government_facilities" data-field="x_services_offered" name="x_services_offered" id="x_services_offered" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->services_offered->getPlaceHolder()) ?>"<?= $Page->services_offered->editAttributes() ?> aria-describedby="x_services_offered_help"><?= $Page->services_offered->EditValue ?></textarea>
<?= $Page->services_offered->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->services_offered->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->coordinates->Visible) { // coordinates ?>
    <div id="r_coordinates"<?= $Page->coordinates->rowAttributes() ?>>
        <label id="elh_government_facilities_coordinates" for="x_coordinates" class="<?= $Page->LeftColumnClass ?>"><?= $Page->coordinates->caption() ?><?= $Page->coordinates->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->coordinates->cellAttributes() ?>>
<span id="el_government_facilities_coordinates">
<input type="<?= $Page->coordinates->getInputTextType() ?>" name="x_coordinates" id="x_coordinates" data-table="government_facilities" data-field="x_coordinates" value="<?= $Page->coordinates->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->coordinates->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->coordinates->formatPattern()) ?>"<?= $Page->coordinates->editAttributes() ?> aria-describedby="x_coordinates_help">
<?= $Page->coordinates->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->coordinates->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
    <div id="r_featured_image"<?= $Page->featured_image->rowAttributes() ?>>
        <label id="elh_government_facilities_featured_image" for="x_featured_image" class="<?= $Page->LeftColumnClass ?>"><?= $Page->featured_image->caption() ?><?= $Page->featured_image->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->featured_image->cellAttributes() ?>>
<span id="el_government_facilities_featured_image">
<input type="<?= $Page->featured_image->getInputTextType() ?>" name="x_featured_image" id="x_featured_image" data-table="government_facilities" data-field="x_featured_image" value="<?= $Page->featured_image->EditValue ?>" size="30" maxlength="500" placeholder="<?= HtmlEncode($Page->featured_image->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->featured_image->formatPattern()) ?>"<?= $Page->featured_image->editAttributes() ?> aria-describedby="x_featured_image_help">
<?= $Page->featured_image->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->featured_image->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->is_active->Visible) { // is_active ?>
    <div id="r_is_active"<?= $Page->is_active->rowAttributes() ?>>
        <label id="elh_government_facilities_is_active" class="<?= $Page->LeftColumnClass ?>"><?= $Page->is_active->caption() ?><?= $Page->is_active->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->is_active->cellAttributes() ?>>
<span id="el_government_facilities_is_active">
<div class="form-check d-inline-block">
    <input type="checkbox" class="form-check-input<?= $Page->is_active->isInvalidClass() ?>" data-table="government_facilities" data-field="x_is_active" data-boolean name="x_is_active" id="x_is_active" value="1"<?= ConvertToBool($Page->is_active->CurrentValue) ? " checked" : "" ?><?= $Page->is_active->editAttributes() ?> aria-describedby="x_is_active_help">
    <div class="invalid-feedback"><?= $Page->is_active->getErrorMessage() ?></div>
</div>
<?= $Page->is_active->getCustomMessage() ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->facility_type_id->Visible) { // facility_type_id ?>
    <div id="r_facility_type_id"<?= $Page->facility_type_id->rowAttributes() ?>>
        <label id="elh_government_facilities_facility_type_id" for="x_facility_type_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->facility_type_id->caption() ?><?= $Page->facility_type_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->facility_type_id->cellAttributes() ?>>
<span id="el_government_facilities_facility_type_id">
    <select
        id="x_facility_type_id"
        name="x_facility_type_id"
        class="form-select ew-select<?= $Page->facility_type_id->isInvalidClass() ?>"
        <?php if (!$Page->facility_type_id->IsNativeSelect) { ?>
        data-select2-id="fgovernment_facilitiesadd_x_facility_type_id"
        <?php } ?>
        data-table="government_facilities"
        data-field="x_facility_type_id"
        data-value-separator="<?= $Page->facility_type_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->facility_type_id->getPlaceHolder()) ?>"
        <?= $Page->facility_type_id->editAttributes() ?>>
        <?= $Page->facility_type_id->selectOptionListHtml("x_facility_type_id") ?>
    </select>
    <?= $Page->facility_type_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->facility_type_id->getErrorMessage() ?></div>
<?= $Page->facility_type_id->Lookup->getParamTag($Page, "p_x_facility_type_id") ?>
<?php if (!$Page->facility_type_id->IsNativeSelect) { ?>
<script>
loadjs.ready("fgovernment_facilitiesadd", function() {
    var options = { name: "x_facility_type_id", selectId: "fgovernment_facilitiesadd_x_facility_type_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fgovernment_facilitiesadd.lists.facility_type_id?.lookupOptions.length) {
        options.data = { id: "x_facility_type_id", form: "fgovernment_facilitiesadd" };
    } else {
        options.ajax = { id: "x_facility_type_id", form: "fgovernment_facilitiesadd", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.government_facilities.fields.facility_type_id.selectOptions);
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fgovernment_facilitiesadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fgovernment_facilitiesadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("government_facilities");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
