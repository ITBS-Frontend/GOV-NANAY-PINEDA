<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$TourismFacilitiesEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="ftourism_facilitiesedit" id="ftourism_facilitiesedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { tourism_facilities: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var ftourism_facilitiesedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("ftourism_facilitiesedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
            ["facility_type", [fields.facility_type.visible && fields.facility_type.required ? ew.Validators.required(fields.facility_type.caption) : null], fields.facility_type.isInvalid],
            ["ownership", [fields.ownership.visible && fields.ownership.required ? ew.Validators.required(fields.ownership.caption) : null], fields.ownership.isInvalid],
            ["name", [fields.name.visible && fields.name.required ? ew.Validators.required(fields.name.caption) : null], fields.name.isInvalid],
            ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
            ["municipality", [fields.municipality.visible && fields.municipality.required ? ew.Validators.required(fields.municipality.caption) : null], fields.municipality.isInvalid],
            ["address", [fields.address.visible && fields.address.required ? ew.Validators.required(fields.address.caption) : null], fields.address.isInvalid],
            ["contact_number", [fields.contact_number.visible && fields.contact_number.required ? ew.Validators.required(fields.contact_number.caption) : null], fields.contact_number.isInvalid],
            ["_email", [fields._email.visible && fields._email.required ? ew.Validators.required(fields._email.caption) : null], fields._email.isInvalid],
            ["website", [fields.website.visible && fields.website.required ? ew.Validators.required(fields.website.caption) : null], fields.website.isInvalid],
            ["price_range", [fields.price_range.visible && fields.price_range.required ? ew.Validators.required(fields.price_range.caption) : null], fields.price_range.isInvalid],
            ["amenities", [fields.amenities.visible && fields.amenities.required ? ew.Validators.required(fields.amenities.caption) : null], fields.amenities.isInvalid],
            ["coordinates", [fields.coordinates.visible && fields.coordinates.required ? ew.Validators.required(fields.coordinates.caption) : null], fields.coordinates.isInvalid],
            ["featured_image", [fields.featured_image.visible && fields.featured_image.required ? ew.Validators.fileRequired(fields.featured_image.caption) : null], fields.featured_image.isInvalid],
            ["rating", [fields.rating.visible && fields.rating.required ? ew.Validators.required(fields.rating.caption) : null, ew.Validators.float], fields.rating.isInvalid],
            ["is_verified", [fields.is_verified.visible && fields.is_verified.required ? ew.Validators.required(fields.is_verified.caption) : null], fields.is_verified.isInvalid],
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
            "is_verified": <?= $Page->is_verified->toClientList($Page) ?>,
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
<input type="hidden" name="t" value="tourism_facilities">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id"<?= $Page->id->rowAttributes() ?>>
        <label id="elh_tourism_facilities_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id->cellAttributes() ?>>
<span id="el_tourism_facilities_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
<input type="hidden" data-table="tourism_facilities" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->facility_type->Visible) { // facility_type ?>
    <div id="r_facility_type"<?= $Page->facility_type->rowAttributes() ?>>
        <label id="elh_tourism_facilities_facility_type" for="x_facility_type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->facility_type->caption() ?><?= $Page->facility_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->facility_type->cellAttributes() ?>>
<span id="el_tourism_facilities_facility_type">
<input type="<?= $Page->facility_type->getInputTextType() ?>" name="x_facility_type" id="x_facility_type" data-table="tourism_facilities" data-field="x_facility_type" value="<?= $Page->facility_type->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->facility_type->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->facility_type->formatPattern()) ?>"<?= $Page->facility_type->editAttributes() ?> aria-describedby="x_facility_type_help">
<?= $Page->facility_type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->facility_type->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ownership->Visible) { // ownership ?>
    <div id="r_ownership"<?= $Page->ownership->rowAttributes() ?>>
        <label id="elh_tourism_facilities_ownership" for="x_ownership" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ownership->caption() ?><?= $Page->ownership->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->ownership->cellAttributes() ?>>
<span id="el_tourism_facilities_ownership">
<input type="<?= $Page->ownership->getInputTextType() ?>" name="x_ownership" id="x_ownership" data-table="tourism_facilities" data-field="x_ownership" value="<?= $Page->ownership->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ownership->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->ownership->formatPattern()) ?>"<?= $Page->ownership->editAttributes() ?> aria-describedby="x_ownership_help">
<?= $Page->ownership->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ownership->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <div id="r_name"<?= $Page->name->rowAttributes() ?>>
        <label id="elh_tourism_facilities_name" for="x_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->name->caption() ?><?= $Page->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->name->cellAttributes() ?>>
<span id="el_tourism_facilities_name">
<input type="<?= $Page->name->getInputTextType() ?>" name="x_name" id="x_name" data-table="tourism_facilities" data-field="x_name" value="<?= $Page->name->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->name->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->name->formatPattern()) ?>"<?= $Page->name->editAttributes() ?> aria-describedby="x_name_help">
<?= $Page->name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description"<?= $Page->description->rowAttributes() ?>>
        <label id="elh_tourism_facilities_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->description->cellAttributes() ?>>
<span id="el_tourism_facilities_description">
<textarea data-table="tourism_facilities" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->municipality->Visible) { // municipality ?>
    <div id="r_municipality"<?= $Page->municipality->rowAttributes() ?>>
        <label id="elh_tourism_facilities_municipality" for="x_municipality" class="<?= $Page->LeftColumnClass ?>"><?= $Page->municipality->caption() ?><?= $Page->municipality->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->municipality->cellAttributes() ?>>
<span id="el_tourism_facilities_municipality">
<input type="<?= $Page->municipality->getInputTextType() ?>" name="x_municipality" id="x_municipality" data-table="tourism_facilities" data-field="x_municipality" value="<?= $Page->municipality->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->municipality->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->municipality->formatPattern()) ?>"<?= $Page->municipality->editAttributes() ?> aria-describedby="x_municipality_help">
<?= $Page->municipality->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->municipality->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->address->Visible) { // address ?>
    <div id="r_address"<?= $Page->address->rowAttributes() ?>>
        <label id="elh_tourism_facilities_address" for="x_address" class="<?= $Page->LeftColumnClass ?>"><?= $Page->address->caption() ?><?= $Page->address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->address->cellAttributes() ?>>
<span id="el_tourism_facilities_address">
<textarea data-table="tourism_facilities" data-field="x_address" name="x_address" id="x_address" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->address->getPlaceHolder()) ?>"<?= $Page->address->editAttributes() ?> aria-describedby="x_address_help"><?= $Page->address->EditValue ?></textarea>
<?= $Page->address->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->address->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->contact_number->Visible) { // contact_number ?>
    <div id="r_contact_number"<?= $Page->contact_number->rowAttributes() ?>>
        <label id="elh_tourism_facilities_contact_number" for="x_contact_number" class="<?= $Page->LeftColumnClass ?>"><?= $Page->contact_number->caption() ?><?= $Page->contact_number->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->contact_number->cellAttributes() ?>>
<span id="el_tourism_facilities_contact_number">
<input type="<?= $Page->contact_number->getInputTextType() ?>" name="x_contact_number" id="x_contact_number" data-table="tourism_facilities" data-field="x_contact_number" value="<?= $Page->contact_number->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->contact_number->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->contact_number->formatPattern()) ?>"<?= $Page->contact_number->editAttributes() ?> aria-describedby="x_contact_number_help">
<?= $Page->contact_number->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->contact_number->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
    <div id="r__email"<?= $Page->_email->rowAttributes() ?>>
        <label id="elh_tourism_facilities__email" for="x__email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_email->caption() ?><?= $Page->_email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->_email->cellAttributes() ?>>
<span id="el_tourism_facilities__email">
<input type="<?= $Page->_email->getInputTextType() ?>" name="x__email" id="x__email" data-table="tourism_facilities" data-field="x__email" value="<?= $Page->_email->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->_email->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->_email->formatPattern()) ?>"<?= $Page->_email->editAttributes() ?> aria-describedby="x__email_help">
<?= $Page->_email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_email->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->website->Visible) { // website ?>
    <div id="r_website"<?= $Page->website->rowAttributes() ?>>
        <label id="elh_tourism_facilities_website" for="x_website" class="<?= $Page->LeftColumnClass ?>"><?= $Page->website->caption() ?><?= $Page->website->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->website->cellAttributes() ?>>
<span id="el_tourism_facilities_website">
<input type="<?= $Page->website->getInputTextType() ?>" name="x_website" id="x_website" data-table="tourism_facilities" data-field="x_website" value="<?= $Page->website->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->website->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->website->formatPattern()) ?>"<?= $Page->website->editAttributes() ?> aria-describedby="x_website_help">
<?= $Page->website->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->website->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->price_range->Visible) { // price_range ?>
    <div id="r_price_range"<?= $Page->price_range->rowAttributes() ?>>
        <label id="elh_tourism_facilities_price_range" for="x_price_range" class="<?= $Page->LeftColumnClass ?>"><?= $Page->price_range->caption() ?><?= $Page->price_range->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->price_range->cellAttributes() ?>>
<span id="el_tourism_facilities_price_range">
<input type="<?= $Page->price_range->getInputTextType() ?>" name="x_price_range" id="x_price_range" data-table="tourism_facilities" data-field="x_price_range" value="<?= $Page->price_range->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->price_range->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->price_range->formatPattern()) ?>"<?= $Page->price_range->editAttributes() ?> aria-describedby="x_price_range_help">
<?= $Page->price_range->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->price_range->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->amenities->Visible) { // amenities ?>
    <div id="r_amenities"<?= $Page->amenities->rowAttributes() ?>>
        <label id="elh_tourism_facilities_amenities" for="x_amenities" class="<?= $Page->LeftColumnClass ?>"><?= $Page->amenities->caption() ?><?= $Page->amenities->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->amenities->cellAttributes() ?>>
<span id="el_tourism_facilities_amenities">
<textarea data-table="tourism_facilities" data-field="x_amenities" name="x_amenities" id="x_amenities" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->amenities->getPlaceHolder()) ?>"<?= $Page->amenities->editAttributes() ?> aria-describedby="x_amenities_help"><?= $Page->amenities->EditValue ?></textarea>
<?= $Page->amenities->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->amenities->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->coordinates->Visible) { // coordinates ?>
    <div id="r_coordinates"<?= $Page->coordinates->rowAttributes() ?>>
        <label id="elh_tourism_facilities_coordinates" for="x_coordinates" class="<?= $Page->LeftColumnClass ?>"><?= $Page->coordinates->caption() ?><?= $Page->coordinates->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->coordinates->cellAttributes() ?>>
<span id="el_tourism_facilities_coordinates">
<input type="<?= $Page->coordinates->getInputTextType() ?>" name="x_coordinates" id="x_coordinates" data-table="tourism_facilities" data-field="x_coordinates" value="<?= $Page->coordinates->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->coordinates->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->coordinates->formatPattern()) ?>"<?= $Page->coordinates->editAttributes() ?> aria-describedby="x_coordinates_help">
<?= $Page->coordinates->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->coordinates->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
    <div id="r_featured_image"<?= $Page->featured_image->rowAttributes() ?>>
        <label id="elh_tourism_facilities_featured_image" class="<?= $Page->LeftColumnClass ?>"><?= $Page->featured_image->caption() ?><?= $Page->featured_image->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->featured_image->cellAttributes() ?>>
<span id="el_tourism_facilities_featured_image">
<div id="fd_x_featured_image" class="fileinput-button ew-file-drop-zone">
    <input
        type="file"
        id="x_featured_image"
        name="x_featured_image"
        class="form-control ew-file-input"
        title="<?= $Page->featured_image->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="tourism_facilities"
        data-field="x_featured_image"
        data-size="500"
        data-accept-file-types="<?= $Page->featured_image->acceptFileTypes() ?>"
        data-max-file-size="<?= $Page->featured_image->UploadMaxFileSize ?>"
        data-max-number-of-files="null"
        data-disable-image-crop="<?= $Page->featured_image->ImageCropper ? 0 : 1 ?>"
        aria-describedby="x_featured_image_help"
        <?= ($Page->featured_image->ReadOnly || $Page->featured_image->Disabled) ? " disabled" : "" ?>
        <?= $Page->featured_image->editAttributes() ?>
    >
    <div class="text-body-secondary ew-file-text"><?= $Language->phrase("ChooseFile") ?></div>
    <?= $Page->featured_image->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->featured_image->getErrorMessage() ?></div>
</div>
<input type="hidden" name="fn_x_featured_image" id= "fn_x_featured_image" value="<?= $Page->featured_image->Upload->FileName ?>">
<input type="hidden" name="fa_x_featured_image" id= "fa_x_featured_image" value="<?= (Post("fa_x_featured_image") == "0") ? "0" : "1" ?>">
<table id="ft_x_featured_image" class="table table-sm float-start ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->rating->Visible) { // rating ?>
    <div id="r_rating"<?= $Page->rating->rowAttributes() ?>>
        <label id="elh_tourism_facilities_rating" for="x_rating" class="<?= $Page->LeftColumnClass ?>"><?= $Page->rating->caption() ?><?= $Page->rating->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->rating->cellAttributes() ?>>
<span id="el_tourism_facilities_rating">
<input type="<?= $Page->rating->getInputTextType() ?>" name="x_rating" id="x_rating" data-table="tourism_facilities" data-field="x_rating" value="<?= $Page->rating->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->rating->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->rating->formatPattern()) ?>"<?= $Page->rating->editAttributes() ?> aria-describedby="x_rating_help">
<?= $Page->rating->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->rating->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->is_verified->Visible) { // is_verified ?>
    <div id="r_is_verified"<?= $Page->is_verified->rowAttributes() ?>>
        <label id="elh_tourism_facilities_is_verified" class="<?= $Page->LeftColumnClass ?>"><?= $Page->is_verified->caption() ?><?= $Page->is_verified->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->is_verified->cellAttributes() ?>>
<span id="el_tourism_facilities_is_verified">
<div class="form-check d-inline-block">
    <input type="checkbox" class="form-check-input<?= $Page->is_verified->isInvalidClass() ?>" data-table="tourism_facilities" data-field="x_is_verified" data-boolean name="x_is_verified" id="x_is_verified" value="1"<?= ConvertToBool($Page->is_verified->CurrentValue) ? " checked" : "" ?><?= $Page->is_verified->editAttributes() ?> aria-describedby="x_is_verified_help">
    <div class="invalid-feedback"><?= $Page->is_verified->getErrorMessage() ?></div>
</div>
<?= $Page->is_verified->getCustomMessage() ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->is_active->Visible) { // is_active ?>
    <div id="r_is_active"<?= $Page->is_active->rowAttributes() ?>>
        <label id="elh_tourism_facilities_is_active" class="<?= $Page->LeftColumnClass ?>"><?= $Page->is_active->caption() ?><?= $Page->is_active->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->is_active->cellAttributes() ?>>
<span id="el_tourism_facilities_is_active">
<div class="form-check d-inline-block">
    <input type="checkbox" class="form-check-input<?= $Page->is_active->isInvalidClass() ?>" data-table="tourism_facilities" data-field="x_is_active" data-boolean name="x_is_active" id="x_is_active" value="1"<?= ConvertToBool($Page->is_active->CurrentValue) ? " checked" : "" ?><?= $Page->is_active->editAttributes() ?> aria-describedby="x_is_active_help">
    <div class="invalid-feedback"><?= $Page->is_active->getErrorMessage() ?></div>
</div>
<?= $Page->is_active->getCustomMessage() ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <div id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <label id="elh_tourism_facilities_created_at" for="x_created_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created_at->caption() ?><?= $Page->created_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->created_at->cellAttributes() ?>>
<span id="el_tourism_facilities_created_at">
<input type="<?= $Page->created_at->getInputTextType() ?>" name="x_created_at" id="x_created_at" data-table="tourism_facilities" data-field="x_created_at" value="<?= $Page->created_at->EditValue ?>" placeholder="<?= HtmlEncode($Page->created_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->created_at->formatPattern()) ?>"<?= $Page->created_at->editAttributes() ?> aria-describedby="x_created_at_help">
<?= $Page->created_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created_at->getErrorMessage() ?></div>
<?php if (!$Page->created_at->ReadOnly && !$Page->created_at->Disabled && !isset($Page->created_at->EditAttrs["readonly"]) && !isset($Page->created_at->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftourism_facilitiesedit", "datetimepicker"], function () {
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
    ew.createDateTimePicker("ftourism_facilitiesedit", "x_created_at", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="ftourism_facilitiesedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="ftourism_facilitiesedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("tourism_facilities");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
