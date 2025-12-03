<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$GeographicInfoEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="fgeographic_infoedit" id="fgeographic_infoedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { geographic_info: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var fgeographic_infoedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fgeographic_infoedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
            ["name", [fields.name.visible && fields.name.required ? ew.Validators.required(fields.name.caption) : null], fields.name.isInvalid],
            ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
            ["coordinates", [fields.coordinates.visible && fields.coordinates.required ? ew.Validators.required(fields.coordinates.caption) : null], fields.coordinates.isInvalid],
            ["area_sqkm", [fields.area_sqkm.visible && fields.area_sqkm.required ? ew.Validators.required(fields.area_sqkm.caption) : null, ew.Validators.float], fields.area_sqkm.isInvalid],
            ["population", [fields.population.visible && fields.population.required ? ew.Validators.required(fields.population.caption) : null, ew.Validators.integer], fields.population.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null], fields.created_at.isInvalid],
            ["info_type_id", [fields.info_type_id.visible && fields.info_type_id.required ? ew.Validators.required(fields.info_type_id.caption) : null], fields.info_type_id.isInvalid]
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
            "info_type_id": <?= $Page->info_type_id->toClientList($Page) ?>,
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
<input type="hidden" name="t" value="geographic_info">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id"<?= $Page->id->rowAttributes() ?>>
        <label id="elh_geographic_info_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id->cellAttributes() ?>>
<span id="el_geographic_info_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
<input type="hidden" data-table="geographic_info" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <div id="r_name"<?= $Page->name->rowAttributes() ?>>
        <label id="elh_geographic_info_name" for="x_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->name->caption() ?><?= $Page->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->name->cellAttributes() ?>>
<span id="el_geographic_info_name">
<input type="<?= $Page->name->getInputTextType() ?>" name="x_name" id="x_name" data-table="geographic_info" data-field="x_name" value="<?= $Page->name->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->name->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->name->formatPattern()) ?>"<?= $Page->name->editAttributes() ?> aria-describedby="x_name_help">
<?= $Page->name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description"<?= $Page->description->rowAttributes() ?>>
        <label id="elh_geographic_info_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->description->cellAttributes() ?>>
<span id="el_geographic_info_description">
<textarea data-table="geographic_info" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->coordinates->Visible) { // coordinates ?>
    <div id="r_coordinates"<?= $Page->coordinates->rowAttributes() ?>>
        <label id="elh_geographic_info_coordinates" for="x_coordinates" class="<?= $Page->LeftColumnClass ?>"><?= $Page->coordinates->caption() ?><?= $Page->coordinates->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->coordinates->cellAttributes() ?>>
<span id="el_geographic_info_coordinates">
<input type="<?= $Page->coordinates->getInputTextType() ?>" name="x_coordinates" id="x_coordinates" data-table="geographic_info" data-field="x_coordinates" value="<?= $Page->coordinates->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->coordinates->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->coordinates->formatPattern()) ?>"<?= $Page->coordinates->editAttributes() ?> aria-describedby="x_coordinates_help">
<?= $Page->coordinates->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->coordinates->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->area_sqkm->Visible) { // area_sqkm ?>
    <div id="r_area_sqkm"<?= $Page->area_sqkm->rowAttributes() ?>>
        <label id="elh_geographic_info_area_sqkm" for="x_area_sqkm" class="<?= $Page->LeftColumnClass ?>"><?= $Page->area_sqkm->caption() ?><?= $Page->area_sqkm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->area_sqkm->cellAttributes() ?>>
<span id="el_geographic_info_area_sqkm">
<input type="<?= $Page->area_sqkm->getInputTextType() ?>" name="x_area_sqkm" id="x_area_sqkm" data-table="geographic_info" data-field="x_area_sqkm" value="<?= $Page->area_sqkm->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->area_sqkm->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->area_sqkm->formatPattern()) ?>"<?= $Page->area_sqkm->editAttributes() ?> aria-describedby="x_area_sqkm_help">
<?= $Page->area_sqkm->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->area_sqkm->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->population->Visible) { // population ?>
    <div id="r_population"<?= $Page->population->rowAttributes() ?>>
        <label id="elh_geographic_info_population" for="x_population" class="<?= $Page->LeftColumnClass ?>"><?= $Page->population->caption() ?><?= $Page->population->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->population->cellAttributes() ?>>
<span id="el_geographic_info_population">
<input type="<?= $Page->population->getInputTextType() ?>" name="x_population" id="x_population" data-table="geographic_info" data-field="x_population" value="<?= $Page->population->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->population->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->population->formatPattern()) ?>"<?= $Page->population->editAttributes() ?> aria-describedby="x_population_help">
<?= $Page->population->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->population->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->info_type_id->Visible) { // info_type_id ?>
    <div id="r_info_type_id"<?= $Page->info_type_id->rowAttributes() ?>>
        <label id="elh_geographic_info_info_type_id" for="x_info_type_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->info_type_id->caption() ?><?= $Page->info_type_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->info_type_id->cellAttributes() ?>>
<span id="el_geographic_info_info_type_id">
    <select
        id="x_info_type_id"
        name="x_info_type_id"
        class="form-select ew-select<?= $Page->info_type_id->isInvalidClass() ?>"
        <?php if (!$Page->info_type_id->IsNativeSelect) { ?>
        data-select2-id="fgeographic_infoedit_x_info_type_id"
        <?php } ?>
        data-table="geographic_info"
        data-field="x_info_type_id"
        data-value-separator="<?= $Page->info_type_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->info_type_id->getPlaceHolder()) ?>"
        <?= $Page->info_type_id->editAttributes() ?>>
        <?= $Page->info_type_id->selectOptionListHtml("x_info_type_id") ?>
    </select>
    <?= $Page->info_type_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->info_type_id->getErrorMessage() ?></div>
<?= $Page->info_type_id->Lookup->getParamTag($Page, "p_x_info_type_id") ?>
<?php if (!$Page->info_type_id->IsNativeSelect) { ?>
<script>
loadjs.ready("fgeographic_infoedit", function() {
    var options = { name: "x_info_type_id", selectId: "fgeographic_infoedit_x_info_type_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fgeographic_infoedit.lists.info_type_id?.lookupOptions.length) {
        options.data = { id: "x_info_type_id", form: "fgeographic_infoedit" };
    } else {
        options.ajax = { id: "x_info_type_id", form: "fgeographic_infoedit", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.geographic_info.fields.info_type_id.selectOptions);
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fgeographic_infoedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fgeographic_infoedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("geographic_info");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
