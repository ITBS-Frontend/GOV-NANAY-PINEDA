<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$TourismDestinationsEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="ftourism_destinationsedit" id="ftourism_destinationsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { tourism_destinations: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var ftourism_destinationsedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("ftourism_destinationsedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
            ["category_id", [fields.category_id.visible && fields.category_id.required ? ew.Validators.required(fields.category_id.caption) : null], fields.category_id.isInvalid],
            ["name", [fields.name.visible && fields.name.required ? ew.Validators.required(fields.name.caption) : null], fields.name.isInvalid],
            ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
            ["full_description", [fields.full_description.visible && fields.full_description.required ? ew.Validators.required(fields.full_description.caption) : null], fields.full_description.isInvalid],
            ["municipality", [fields.municipality.visible && fields.municipality.required ? ew.Validators.required(fields.municipality.caption) : null], fields.municipality.isInvalid],
            ["address", [fields.address.visible && fields.address.required ? ew.Validators.required(fields.address.caption) : null], fields.address.isInvalid],
            ["coordinates", [fields.coordinates.visible && fields.coordinates.required ? ew.Validators.required(fields.coordinates.caption) : null], fields.coordinates.isInvalid],
            ["entry_fee", [fields.entry_fee.visible && fields.entry_fee.required ? ew.Validators.required(fields.entry_fee.caption) : null], fields.entry_fee.isInvalid],
            ["operating_hours", [fields.operating_hours.visible && fields.operating_hours.required ? ew.Validators.required(fields.operating_hours.caption) : null], fields.operating_hours.isInvalid],
            ["best_time_to_visit", [fields.best_time_to_visit.visible && fields.best_time_to_visit.required ? ew.Validators.required(fields.best_time_to_visit.caption) : null], fields.best_time_to_visit.isInvalid],
            ["how_to_get_there", [fields.how_to_get_there.visible && fields.how_to_get_there.required ? ew.Validators.required(fields.how_to_get_there.caption) : null], fields.how_to_get_there.isInvalid],
            ["featured_image", [fields.featured_image.visible && fields.featured_image.required ? ew.Validators.fileRequired(fields.featured_image.caption) : null], fields.featured_image.isInvalid],
            ["is_featured", [fields.is_featured.visible && fields.is_featured.required ? ew.Validators.required(fields.is_featured.caption) : null], fields.is_featured.isInvalid],
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
            "category_id": <?= $Page->category_id->toClientList($Page) ?>,
            "is_featured": <?= $Page->is_featured->toClientList($Page) ?>,
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
<input type="hidden" name="t" value="tourism_destinations">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id"<?= $Page->id->rowAttributes() ?>>
        <label id="elh_tourism_destinations_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id->cellAttributes() ?>>
<span id="el_tourism_destinations_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
<input type="hidden" data-table="tourism_destinations" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->category_id->Visible) { // category_id ?>
    <div id="r_category_id"<?= $Page->category_id->rowAttributes() ?>>
        <label id="elh_tourism_destinations_category_id" for="x_category_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->category_id->caption() ?><?= $Page->category_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->category_id->cellAttributes() ?>>
<span id="el_tourism_destinations_category_id">
    <select
        id="x_category_id"
        name="x_category_id"
        class="form-select ew-select<?= $Page->category_id->isInvalidClass() ?>"
        <?php if (!$Page->category_id->IsNativeSelect) { ?>
        data-select2-id="ftourism_destinationsedit_x_category_id"
        <?php } ?>
        data-table="tourism_destinations"
        data-field="x_category_id"
        data-value-separator="<?= $Page->category_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->category_id->getPlaceHolder()) ?>"
        <?= $Page->category_id->editAttributes() ?>>
        <?= $Page->category_id->selectOptionListHtml("x_category_id") ?>
    </select>
    <?= $Page->category_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->category_id->getErrorMessage() ?></div>
<?= $Page->category_id->Lookup->getParamTag($Page, "p_x_category_id") ?>
<?php if (!$Page->category_id->IsNativeSelect) { ?>
<script>
loadjs.ready("ftourism_destinationsedit", function() {
    var options = { name: "x_category_id", selectId: "ftourism_destinationsedit_x_category_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (ftourism_destinationsedit.lists.category_id?.lookupOptions.length) {
        options.data = { id: "x_category_id", form: "ftourism_destinationsedit" };
    } else {
        options.ajax = { id: "x_category_id", form: "ftourism_destinationsedit", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.tourism_destinations.fields.category_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <div id="r_name"<?= $Page->name->rowAttributes() ?>>
        <label id="elh_tourism_destinations_name" for="x_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->name->caption() ?><?= $Page->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->name->cellAttributes() ?>>
<span id="el_tourism_destinations_name">
<input type="<?= $Page->name->getInputTextType() ?>" name="x_name" id="x_name" data-table="tourism_destinations" data-field="x_name" value="<?= $Page->name->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->name->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->name->formatPattern()) ?>"<?= $Page->name->editAttributes() ?> aria-describedby="x_name_help">
<?= $Page->name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description"<?= $Page->description->rowAttributes() ?>>
        <label id="elh_tourism_destinations_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->description->cellAttributes() ?>>
<span id="el_tourism_destinations_description">
<textarea data-table="tourism_destinations" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->full_description->Visible) { // full_description ?>
    <div id="r_full_description"<?= $Page->full_description->rowAttributes() ?>>
        <label id="elh_tourism_destinations_full_description" for="x_full_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->full_description->caption() ?><?= $Page->full_description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->full_description->cellAttributes() ?>>
<span id="el_tourism_destinations_full_description">
<textarea data-table="tourism_destinations" data-field="x_full_description" name="x_full_description" id="x_full_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->full_description->getPlaceHolder()) ?>"<?= $Page->full_description->editAttributes() ?> aria-describedby="x_full_description_help"><?= $Page->full_description->EditValue ?></textarea>
<?= $Page->full_description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->full_description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->municipality->Visible) { // municipality ?>
    <div id="r_municipality"<?= $Page->municipality->rowAttributes() ?>>
        <label id="elh_tourism_destinations_municipality" for="x_municipality" class="<?= $Page->LeftColumnClass ?>"><?= $Page->municipality->caption() ?><?= $Page->municipality->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->municipality->cellAttributes() ?>>
<span id="el_tourism_destinations_municipality">
<input type="<?= $Page->municipality->getInputTextType() ?>" name="x_municipality" id="x_municipality" data-table="tourism_destinations" data-field="x_municipality" value="<?= $Page->municipality->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->municipality->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->municipality->formatPattern()) ?>"<?= $Page->municipality->editAttributes() ?> aria-describedby="x_municipality_help">
<?= $Page->municipality->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->municipality->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->address->Visible) { // address ?>
    <div id="r_address"<?= $Page->address->rowAttributes() ?>>
        <label id="elh_tourism_destinations_address" for="x_address" class="<?= $Page->LeftColumnClass ?>"><?= $Page->address->caption() ?><?= $Page->address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->address->cellAttributes() ?>>
<span id="el_tourism_destinations_address">
<textarea data-table="tourism_destinations" data-field="x_address" name="x_address" id="x_address" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->address->getPlaceHolder()) ?>"<?= $Page->address->editAttributes() ?> aria-describedby="x_address_help"><?= $Page->address->EditValue ?></textarea>
<?= $Page->address->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->address->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->coordinates->Visible) { // coordinates ?>
    <div id="r_coordinates"<?= $Page->coordinates->rowAttributes() ?>>
        <label id="elh_tourism_destinations_coordinates" for="x_coordinates" class="<?= $Page->LeftColumnClass ?>"><?= $Page->coordinates->caption() ?><?= $Page->coordinates->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->coordinates->cellAttributes() ?>>
<span id="el_tourism_destinations_coordinates">
<input type="<?= $Page->coordinates->getInputTextType() ?>" name="x_coordinates" id="x_coordinates" data-table="tourism_destinations" data-field="x_coordinates" value="<?= $Page->coordinates->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->coordinates->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->coordinates->formatPattern()) ?>"<?= $Page->coordinates->editAttributes() ?> aria-describedby="x_coordinates_help">
<?= $Page->coordinates->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->coordinates->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->entry_fee->Visible) { // entry_fee ?>
    <div id="r_entry_fee"<?= $Page->entry_fee->rowAttributes() ?>>
        <label id="elh_tourism_destinations_entry_fee" for="x_entry_fee" class="<?= $Page->LeftColumnClass ?>"><?= $Page->entry_fee->caption() ?><?= $Page->entry_fee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->entry_fee->cellAttributes() ?>>
<span id="el_tourism_destinations_entry_fee">
<input type="<?= $Page->entry_fee->getInputTextType() ?>" name="x_entry_fee" id="x_entry_fee" data-table="tourism_destinations" data-field="x_entry_fee" value="<?= $Page->entry_fee->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->entry_fee->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->entry_fee->formatPattern()) ?>"<?= $Page->entry_fee->editAttributes() ?> aria-describedby="x_entry_fee_help">
<?= $Page->entry_fee->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->entry_fee->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->operating_hours->Visible) { // operating_hours ?>
    <div id="r_operating_hours"<?= $Page->operating_hours->rowAttributes() ?>>
        <label id="elh_tourism_destinations_operating_hours" for="x_operating_hours" class="<?= $Page->LeftColumnClass ?>"><?= $Page->operating_hours->caption() ?><?= $Page->operating_hours->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->operating_hours->cellAttributes() ?>>
<span id="el_tourism_destinations_operating_hours">
<input type="<?= $Page->operating_hours->getInputTextType() ?>" name="x_operating_hours" id="x_operating_hours" data-table="tourism_destinations" data-field="x_operating_hours" value="<?= $Page->operating_hours->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->operating_hours->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->operating_hours->formatPattern()) ?>"<?= $Page->operating_hours->editAttributes() ?> aria-describedby="x_operating_hours_help">
<?= $Page->operating_hours->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->operating_hours->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->best_time_to_visit->Visible) { // best_time_to_visit ?>
    <div id="r_best_time_to_visit"<?= $Page->best_time_to_visit->rowAttributes() ?>>
        <label id="elh_tourism_destinations_best_time_to_visit" for="x_best_time_to_visit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->best_time_to_visit->caption() ?><?= $Page->best_time_to_visit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->best_time_to_visit->cellAttributes() ?>>
<span id="el_tourism_destinations_best_time_to_visit">
<input type="<?= $Page->best_time_to_visit->getInputTextType() ?>" name="x_best_time_to_visit" id="x_best_time_to_visit" data-table="tourism_destinations" data-field="x_best_time_to_visit" value="<?= $Page->best_time_to_visit->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->best_time_to_visit->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->best_time_to_visit->formatPattern()) ?>"<?= $Page->best_time_to_visit->editAttributes() ?> aria-describedby="x_best_time_to_visit_help">
<?= $Page->best_time_to_visit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->best_time_to_visit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->how_to_get_there->Visible) { // how_to_get_there ?>
    <div id="r_how_to_get_there"<?= $Page->how_to_get_there->rowAttributes() ?>>
        <label id="elh_tourism_destinations_how_to_get_there" for="x_how_to_get_there" class="<?= $Page->LeftColumnClass ?>"><?= $Page->how_to_get_there->caption() ?><?= $Page->how_to_get_there->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->how_to_get_there->cellAttributes() ?>>
<span id="el_tourism_destinations_how_to_get_there">
<textarea data-table="tourism_destinations" data-field="x_how_to_get_there" name="x_how_to_get_there" id="x_how_to_get_there" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->how_to_get_there->getPlaceHolder()) ?>"<?= $Page->how_to_get_there->editAttributes() ?> aria-describedby="x_how_to_get_there_help"><?= $Page->how_to_get_there->EditValue ?></textarea>
<?= $Page->how_to_get_there->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->how_to_get_there->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
    <div id="r_featured_image"<?= $Page->featured_image->rowAttributes() ?>>
        <label id="elh_tourism_destinations_featured_image" class="<?= $Page->LeftColumnClass ?>"><?= $Page->featured_image->caption() ?><?= $Page->featured_image->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->featured_image->cellAttributes() ?>>
<span id="el_tourism_destinations_featured_image">
<div id="fd_x_featured_image" class="fileinput-button ew-file-drop-zone">
    <input
        type="file"
        id="x_featured_image"
        name="x_featured_image"
        class="form-control ew-file-input"
        title="<?= $Page->featured_image->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="tourism_destinations"
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
<?php if ($Page->is_featured->Visible) { // is_featured ?>
    <div id="r_is_featured"<?= $Page->is_featured->rowAttributes() ?>>
        <label id="elh_tourism_destinations_is_featured" class="<?= $Page->LeftColumnClass ?>"><?= $Page->is_featured->caption() ?><?= $Page->is_featured->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->is_featured->cellAttributes() ?>>
<span id="el_tourism_destinations_is_featured">
<div class="form-check d-inline-block">
    <input type="checkbox" class="form-check-input<?= $Page->is_featured->isInvalidClass() ?>" data-table="tourism_destinations" data-field="x_is_featured" data-boolean name="x_is_featured" id="x_is_featured" value="1"<?= ConvertToBool($Page->is_featured->CurrentValue) ? " checked" : "" ?><?= $Page->is_featured->editAttributes() ?> aria-describedby="x_is_featured_help">
    <div class="invalid-feedback"><?= $Page->is_featured->getErrorMessage() ?></div>
</div>
<?= $Page->is_featured->getCustomMessage() ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->is_active->Visible) { // is_active ?>
    <div id="r_is_active"<?= $Page->is_active->rowAttributes() ?>>
        <label id="elh_tourism_destinations_is_active" class="<?= $Page->LeftColumnClass ?>"><?= $Page->is_active->caption() ?><?= $Page->is_active->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->is_active->cellAttributes() ?>>
<span id="el_tourism_destinations_is_active">
<div class="form-check d-inline-block">
    <input type="checkbox" class="form-check-input<?= $Page->is_active->isInvalidClass() ?>" data-table="tourism_destinations" data-field="x_is_active" data-boolean name="x_is_active" id="x_is_active" value="1"<?= ConvertToBool($Page->is_active->CurrentValue) ? " checked" : "" ?><?= $Page->is_active->editAttributes() ?> aria-describedby="x_is_active_help">
    <div class="invalid-feedback"><?= $Page->is_active->getErrorMessage() ?></div>
</div>
<?= $Page->is_active->getCustomMessage() ?>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php
    if (in_array("tourism_activities", explode(",", $Page->getCurrentDetailTable())) && $tourism_activities->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("tourism_activities", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "TourismActivitiesGrid.php" ?>
<?php } ?>
<?php
    if (in_array("destination_gallery", explode(",", $Page->getCurrentDetailTable())) && $destination_gallery->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("destination_gallery", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "DestinationGalleryGrid.php" ?>
<?php } ?>
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="ftourism_destinationsedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="ftourism_destinationsedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("tourism_destinations");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
