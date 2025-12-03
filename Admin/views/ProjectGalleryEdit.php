<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$ProjectGalleryEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="fproject_galleryedit" id="fproject_galleryedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { project_gallery: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var fproject_galleryedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fproject_galleryedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
            ["project_id", [fields.project_id.visible && fields.project_id.required ? ew.Validators.required(fields.project_id.caption) : null], fields.project_id.isInvalid],
            ["image_path", [fields.image_path.visible && fields.image_path.required ? ew.Validators.fileRequired(fields.image_path.caption) : null], fields.image_path.isInvalid],
            ["caption", [fields.caption.visible && fields.caption.required ? ew.Validators.required(fields.caption.caption) : null], fields.caption.isInvalid],
            ["display_order", [fields.display_order.visible && fields.display_order.required ? ew.Validators.required(fields.display_order.caption) : null, ew.Validators.integer], fields.display_order.isInvalid],
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
            "project_id": <?= $Page->project_id->toClientList($Page) ?>,
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
<input type="hidden" name="t" value="project_gallery">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id"<?= $Page->id->rowAttributes() ?>>
        <label id="elh_project_gallery_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id->cellAttributes() ?>>
<span id="el_project_gallery_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
<input type="hidden" data-table="project_gallery" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->project_id->Visible) { // project_id ?>
    <div id="r_project_id"<?= $Page->project_id->rowAttributes() ?>>
        <label id="elh_project_gallery_project_id" for="x_project_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->project_id->caption() ?><?= $Page->project_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->project_id->cellAttributes() ?>>
<span id="el_project_gallery_project_id">
    <select
        id="x_project_id"
        name="x_project_id"
        class="form-select ew-select<?= $Page->project_id->isInvalidClass() ?>"
        <?php if (!$Page->project_id->IsNativeSelect) { ?>
        data-select2-id="fproject_galleryedit_x_project_id"
        <?php } ?>
        data-table="project_gallery"
        data-field="x_project_id"
        data-value-separator="<?= $Page->project_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->project_id->getPlaceHolder()) ?>"
        <?= $Page->project_id->editAttributes() ?>>
        <?= $Page->project_id->selectOptionListHtml("x_project_id") ?>
    </select>
    <?= $Page->project_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->project_id->getErrorMessage() ?></div>
<?= $Page->project_id->Lookup->getParamTag($Page, "p_x_project_id") ?>
<?php if (!$Page->project_id->IsNativeSelect) { ?>
<script>
loadjs.ready("fproject_galleryedit", function() {
    var options = { name: "x_project_id", selectId: "fproject_galleryedit_x_project_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fproject_galleryedit.lists.project_id?.lookupOptions.length) {
        options.data = { id: "x_project_id", form: "fproject_galleryedit" };
    } else {
        options.ajax = { id: "x_project_id", form: "fproject_galleryedit", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.project_gallery.fields.project_id.selectOptions);
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
        <label id="elh_project_gallery_image_path" class="<?= $Page->LeftColumnClass ?>"><?= $Page->image_path->caption() ?><?= $Page->image_path->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->image_path->cellAttributes() ?>>
<span id="el_project_gallery_image_path">
<div id="fd_x_image_path" class="fileinput-button ew-file-drop-zone">
    <input
        type="file"
        id="x_image_path"
        name="x_image_path"
        class="form-control ew-file-input"
        title="<?= $Page->image_path->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="project_gallery"
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
<input type="hidden" name="fa_x_image_path" id= "fa_x_image_path" value="<?= (Post("fa_x_image_path") == "0") ? "0" : "1" ?>">
<table id="ft_x_image_path" class="table table-sm float-start ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->caption->Visible) { // caption ?>
    <div id="r_caption"<?= $Page->caption->rowAttributes() ?>>
        <label id="elh_project_gallery_caption" for="x_caption" class="<?= $Page->LeftColumnClass ?>"><?= $Page->caption->caption() ?><?= $Page->caption->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->caption->cellAttributes() ?>>
<span id="el_project_gallery_caption">
<input type="<?= $Page->caption->getInputTextType() ?>" name="x_caption" id="x_caption" data-table="project_gallery" data-field="x_caption" value="<?= $Page->caption->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->caption->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->caption->formatPattern()) ?>"<?= $Page->caption->editAttributes() ?> aria-describedby="x_caption_help">
<?= $Page->caption->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->caption->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->display_order->Visible) { // display_order ?>
    <div id="r_display_order"<?= $Page->display_order->rowAttributes() ?>>
        <label id="elh_project_gallery_display_order" for="x_display_order" class="<?= $Page->LeftColumnClass ?>"><?= $Page->display_order->caption() ?><?= $Page->display_order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->display_order->cellAttributes() ?>>
<span id="el_project_gallery_display_order">
<input type="<?= $Page->display_order->getInputTextType() ?>" name="x_display_order" id="x_display_order" data-table="project_gallery" data-field="x_display_order" value="<?= $Page->display_order->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->display_order->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->display_order->formatPattern()) ?>"<?= $Page->display_order->editAttributes() ?> aria-describedby="x_display_order_help">
<?= $Page->display_order->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->display_order->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fproject_galleryedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fproject_galleryedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("project_gallery");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
