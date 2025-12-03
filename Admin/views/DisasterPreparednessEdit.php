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
            ["preparedness_guide", [fields.preparedness_guide.visible && fields.preparedness_guide.required ? ew.Validators.required(fields.preparedness_guide.caption) : null], fields.preparedness_guide.isInvalid],
            ["emergency_hotlines", [fields.emergency_hotlines.visible && fields.emergency_hotlines.required ? ew.Validators.required(fields.emergency_hotlines.caption) : null], fields.emergency_hotlines.isInvalid],
            ["evacuation_centers", [fields.evacuation_centers.visible && fields.evacuation_centers.required ? ew.Validators.required(fields.evacuation_centers.caption) : null], fields.evacuation_centers.isInvalid],
            ["relief_procedures", [fields.relief_procedures.visible && fields.relief_procedures.required ? ew.Validators.required(fields.relief_procedures.caption) : null], fields.relief_procedures.isInvalid],
            ["featured_image", [fields.featured_image.visible && fields.featured_image.required ? ew.Validators.fileRequired(fields.featured_image.caption) : null], fields.featured_image.isInvalid],
            ["display_order", [fields.display_order.visible && fields.display_order.required ? ew.Validators.required(fields.display_order.caption) : null, ew.Validators.integer], fields.display_order.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null], fields.created_at.isInvalid],
            ["disaster_type_id", [fields.disaster_type_id.visible && fields.disaster_type_id.required ? ew.Validators.required(fields.disaster_type_id.caption) : null], fields.disaster_type_id.isInvalid]
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
            "disaster_type_id": <?= $Page->disaster_type_id->toClientList($Page) ?>,
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
        <label id="elh_disaster_preparedness_featured_image" class="<?= $Page->LeftColumnClass ?>"><?= $Page->featured_image->caption() ?><?= $Page->featured_image->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->featured_image->cellAttributes() ?>>
<span id="el_disaster_preparedness_featured_image">
<div id="fd_x_featured_image" class="fileinput-button ew-file-drop-zone">
    <input
        type="file"
        id="x_featured_image"
        name="x_featured_image"
        class="form-control ew-file-input"
        title="<?= $Page->featured_image->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="disaster_preparedness"
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
<?php if ($Page->disaster_type_id->Visible) { // disaster_type_id ?>
    <div id="r_disaster_type_id"<?= $Page->disaster_type_id->rowAttributes() ?>>
        <label id="elh_disaster_preparedness_disaster_type_id" for="x_disaster_type_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->disaster_type_id->caption() ?><?= $Page->disaster_type_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->disaster_type_id->cellAttributes() ?>>
<span id="el_disaster_preparedness_disaster_type_id">
    <select
        id="x_disaster_type_id"
        name="x_disaster_type_id"
        class="form-select ew-select<?= $Page->disaster_type_id->isInvalidClass() ?>"
        <?php if (!$Page->disaster_type_id->IsNativeSelect) { ?>
        data-select2-id="fdisaster_preparednessedit_x_disaster_type_id"
        <?php } ?>
        data-table="disaster_preparedness"
        data-field="x_disaster_type_id"
        data-value-separator="<?= $Page->disaster_type_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->disaster_type_id->getPlaceHolder()) ?>"
        <?= $Page->disaster_type_id->editAttributes() ?>>
        <?= $Page->disaster_type_id->selectOptionListHtml("x_disaster_type_id") ?>
    </select>
    <?= $Page->disaster_type_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->disaster_type_id->getErrorMessage() ?></div>
<?= $Page->disaster_type_id->Lookup->getParamTag($Page, "p_x_disaster_type_id") ?>
<?php if (!$Page->disaster_type_id->IsNativeSelect) { ?>
<script>
loadjs.ready("fdisaster_preparednessedit", function() {
    var options = { name: "x_disaster_type_id", selectId: "fdisaster_preparednessedit_x_disaster_type_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fdisaster_preparednessedit.lists.disaster_type_id?.lookupOptions.length) {
        options.data = { id: "x_disaster_type_id", form: "fdisaster_preparednessedit" };
    } else {
        options.ajax = { id: "x_disaster_type_id", form: "fdisaster_preparednessedit", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.disaster_preparedness.fields.disaster_type_id.selectOptions);
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
