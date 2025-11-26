<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$DestinationGalleryAdd = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { destination_gallery: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fdestination_galleryadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fdestination_galleryadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["destination_id", [fields.destination_id.visible && fields.destination_id.required ? ew.Validators.required(fields.destination_id.caption) : null], fields.destination_id.isInvalid],
            ["image_path", [fields.image_path.visible && fields.image_path.required ? ew.Validators.fileRequired(fields.image_path.caption) : null], fields.image_path.isInvalid],
            ["caption", [fields.caption.visible && fields.caption.required ? ew.Validators.required(fields.caption.caption) : null], fields.caption.isInvalid],
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
            "destination_id": <?= $Page->destination_id->toClientList($Page) ?>,
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
<form name="fdestination_galleryadd" id="fdestination_galleryadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="destination_gallery">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->destination_id->Visible) { // destination_id ?>
    <div id="r_destination_id"<?= $Page->destination_id->rowAttributes() ?>>
        <label id="elh_destination_gallery_destination_id" for="x_destination_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->destination_id->caption() ?><?= $Page->destination_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->destination_id->cellAttributes() ?>>
<span id="el_destination_gallery_destination_id">
    <select
        id="x_destination_id"
        name="x_destination_id"
        class="form-select ew-select<?= $Page->destination_id->isInvalidClass() ?>"
        <?php if (!$Page->destination_id->IsNativeSelect) { ?>
        data-select2-id="fdestination_galleryadd_x_destination_id"
        <?php } ?>
        data-table="destination_gallery"
        data-field="x_destination_id"
        data-value-separator="<?= $Page->destination_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->destination_id->getPlaceHolder()) ?>"
        <?= $Page->destination_id->editAttributes() ?>>
        <?= $Page->destination_id->selectOptionListHtml("x_destination_id") ?>
    </select>
    <?= $Page->destination_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->destination_id->getErrorMessage() ?></div>
<?= $Page->destination_id->Lookup->getParamTag($Page, "p_x_destination_id") ?>
<?php if (!$Page->destination_id->IsNativeSelect) { ?>
<script>
loadjs.ready("fdestination_galleryadd", function() {
    var options = { name: "x_destination_id", selectId: "fdestination_galleryadd_x_destination_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fdestination_galleryadd.lists.destination_id?.lookupOptions.length) {
        options.data = { id: "x_destination_id", form: "fdestination_galleryadd" };
    } else {
        options.ajax = { id: "x_destination_id", form: "fdestination_galleryadd", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.destination_gallery.fields.destination_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->image_path->Visible) { // image_path ?>
    <div id="r_image_path"<?= $Page->image_path->rowAttributes() ?>>
        <label id="elh_destination_gallery_image_path" class="<?= $Page->LeftColumnClass ?>"><?= $Page->image_path->caption() ?><?= $Page->image_path->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->image_path->cellAttributes() ?>>
<span id="el_destination_gallery_image_path">
<div id="fd_x_image_path" class="fileinput-button ew-file-drop-zone">
    <input
        type="file"
        id="x_image_path"
        name="x_image_path"
        class="form-control ew-file-input"
        title="<?= $Page->image_path->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="destination_gallery"
        data-field="x_image_path"
        data-size="500"
        data-accept-file-types="<?= $Page->image_path->acceptFileTypes() ?>"
        data-max-file-size="<?= $Page->image_path->UploadMaxFileSize ?>"
        data-max-number-of-files="null"
        data-disable-image-crop="<?= $Page->image_path->ImageCropper ? 0 : 1 ?>"
        aria-describedby="x_image_path_help"
        <?= ($Page->image_path->ReadOnly || $Page->image_path->Disabled) ? " disabled" : "" ?>
        <?= $Page->image_path->editAttributes() ?>
    >
    <div class="text-body-secondary ew-file-text"><?= $Language->phrase("ChooseFile") ?></div>
    <?= $Page->image_path->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->image_path->getErrorMessage() ?></div>
</div>
<input type="hidden" name="fn_x_image_path" id= "fn_x_image_path" value="<?= $Page->image_path->Upload->FileName ?>">
<input type="hidden" name="fa_x_image_path" id= "fa_x_image_path" value="0">
<table id="ft_x_image_path" class="table table-sm float-start ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->caption->Visible) { // caption ?>
    <div id="r_caption"<?= $Page->caption->rowAttributes() ?>>
        <label id="elh_destination_gallery_caption" for="x_caption" class="<?= $Page->LeftColumnClass ?>"><?= $Page->caption->caption() ?><?= $Page->caption->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->caption->cellAttributes() ?>>
<span id="el_destination_gallery_caption">
<input type="<?= $Page->caption->getInputTextType() ?>" name="x_caption" id="x_caption" data-table="destination_gallery" data-field="x_caption" value="<?= $Page->caption->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->caption->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->caption->formatPattern()) ?>"<?= $Page->caption->editAttributes() ?> aria-describedby="x_caption_help">
<?= $Page->caption->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->caption->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
    <div id="r_display_order"<?= $Page->display_order->rowAttributes() ?>>
        <label id="elh_destination_gallery_display_order" for="x_display_order" class="<?= $Page->LeftColumnClass ?>"><?= $Page->display_order->caption() ?><?= $Page->display_order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->display_order->cellAttributes() ?>>
<span id="el_destination_gallery_display_order">
<input type="<?= $Page->display_order->getInputTextType() ?>" name="x_display_order" id="x_display_order" data-table="destination_gallery" data-field="x_display_order" value="<?= $Page->display_order->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->display_order->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->display_order->formatPattern()) ?>"<?= $Page->display_order->editAttributes() ?> aria-describedby="x_display_order_help">
<?= $Page->display_order->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->display_order->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <div id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <label id="elh_destination_gallery_created_at" for="x_created_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created_at->caption() ?><?= $Page->created_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->created_at->cellAttributes() ?>>
<span id="el_destination_gallery_created_at">
<input type="<?= $Page->created_at->getInputTextType() ?>" name="x_created_at" id="x_created_at" data-table="destination_gallery" data-field="x_created_at" value="<?= $Page->created_at->EditValue ?>" placeholder="<?= HtmlEncode($Page->created_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->created_at->formatPattern()) ?>"<?= $Page->created_at->editAttributes() ?> aria-describedby="x_created_at_help">
<?= $Page->created_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created_at->getErrorMessage() ?></div>
<?php if (!$Page->created_at->ReadOnly && !$Page->created_at->Disabled && !isset($Page->created_at->EditAttrs["readonly"]) && !isset($Page->created_at->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdestination_galleryadd", "datetimepicker"], function () {
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
    ew.createDateTimePicker("fdestination_galleryadd", "x_created_at", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fdestination_galleryadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fdestination_galleryadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("destination_gallery");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
