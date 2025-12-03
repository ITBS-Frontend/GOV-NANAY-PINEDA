<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$PampangaAboutEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="fpampanga_aboutedit" id="fpampanga_aboutedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { pampanga_about: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var fpampanga_aboutedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fpampanga_aboutedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
            ["preview_text", [fields.preview_text.visible && fields.preview_text.required ? ew.Validators.required(fields.preview_text.caption) : null], fields.preview_text.isInvalid],
            ["main_image", [fields.main_image.visible && fields.main_image.required ? ew.Validators.fileRequired(fields.main_image.caption) : null], fields.main_image.isInvalid],
            ["showcase_image_1", [fields.showcase_image_1.visible && fields.showcase_image_1.required ? ew.Validators.fileRequired(fields.showcase_image_1.caption) : null], fields.showcase_image_1.isInvalid],
            ["showcase_image_2", [fields.showcase_image_2.visible && fields.showcase_image_2.required ? ew.Validators.fileRequired(fields.showcase_image_2.caption) : null], fields.showcase_image_2.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null], fields.created_at.isInvalid],
            ["updated_at", [fields.updated_at.visible && fields.updated_at.required ? ew.Validators.required(fields.updated_at.caption) : null], fields.updated_at.isInvalid]
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
<input type="hidden" name="t" value="pampanga_about">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id"<?= $Page->id->rowAttributes() ?>>
        <label id="elh_pampanga_about_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id->cellAttributes() ?>>
<span id="el_pampanga_about_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
<input type="hidden" data-table="pampanga_about" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->preview_text->Visible) { // preview_text ?>
    <div id="r_preview_text"<?= $Page->preview_text->rowAttributes() ?>>
        <label id="elh_pampanga_about_preview_text" for="x_preview_text" class="<?= $Page->LeftColumnClass ?>"><?= $Page->preview_text->caption() ?><?= $Page->preview_text->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->preview_text->cellAttributes() ?>>
<span id="el_pampanga_about_preview_text">
<textarea data-table="pampanga_about" data-field="x_preview_text" name="x_preview_text" id="x_preview_text" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->preview_text->getPlaceHolder()) ?>"<?= $Page->preview_text->editAttributes() ?> aria-describedby="x_preview_text_help"><?= $Page->preview_text->EditValue ?></textarea>
<?= $Page->preview_text->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->preview_text->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->main_image->Visible) { // main_image ?>
    <div id="r_main_image"<?= $Page->main_image->rowAttributes() ?>>
        <label id="elh_pampanga_about_main_image" class="<?= $Page->LeftColumnClass ?>"><?= $Page->main_image->caption() ?><?= $Page->main_image->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->main_image->cellAttributes() ?>>
<span id="el_pampanga_about_main_image">
<div id="fd_x_main_image" class="fileinput-button ew-file-drop-zone">
    <input
        type="file"
        id="x_main_image"
        name="x_main_image"
        class="form-control ew-file-input"
        title="<?= $Page->main_image->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="pampanga_about"
        data-field="x_main_image"
        data-size="255"
        data-accept-file-types="<?= $Page->main_image->acceptFileTypes() ?>"
        data-max-file-size="<?= $Page->main_image->UploadMaxFileSize ?>"
        data-max-number-of-files="null"
        data-disable-image-crop="<?= $Page->main_image->ImageCropper ? 0 : 1 ?>"
        aria-describedby="x_main_image_help"
        <?= ($Page->main_image->ReadOnly || $Page->main_image->Disabled) ? " disabled" : "" ?>
        <?= $Page->main_image->editAttributes() ?>
    >
    <div class="text-body-secondary ew-file-text"><?= $Language->phrase("ChooseFile") ?></div>
    <?= $Page->main_image->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->main_image->getErrorMessage() ?></div>
</div>
<input type="hidden" name="fn_x_main_image" id= "fn_x_main_image" value="<?= $Page->main_image->Upload->FileName ?>">
<input type="hidden" name="fa_x_main_image" id= "fa_x_main_image" value="<?= (Post("fa_x_main_image") == "0") ? "0" : "1" ?>">
<table id="ft_x_main_image" class="table table-sm float-start ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->showcase_image_1->Visible) { // showcase_image_1 ?>
    <div id="r_showcase_image_1"<?= $Page->showcase_image_1->rowAttributes() ?>>
        <label id="elh_pampanga_about_showcase_image_1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->showcase_image_1->caption() ?><?= $Page->showcase_image_1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->showcase_image_1->cellAttributes() ?>>
<span id="el_pampanga_about_showcase_image_1">
<div id="fd_x_showcase_image_1" class="fileinput-button ew-file-drop-zone">
    <input
        type="file"
        id="x_showcase_image_1"
        name="x_showcase_image_1"
        class="form-control ew-file-input"
        title="<?= $Page->showcase_image_1->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="pampanga_about"
        data-field="x_showcase_image_1"
        data-size="255"
        data-accept-file-types="<?= $Page->showcase_image_1->acceptFileTypes() ?>"
        data-max-file-size="<?= $Page->showcase_image_1->UploadMaxFileSize ?>"
        data-max-number-of-files="null"
        data-disable-image-crop="<?= $Page->showcase_image_1->ImageCropper ? 0 : 1 ?>"
        aria-describedby="x_showcase_image_1_help"
        <?= ($Page->showcase_image_1->ReadOnly || $Page->showcase_image_1->Disabled) ? " disabled" : "" ?>
        <?= $Page->showcase_image_1->editAttributes() ?>
    >
    <div class="text-body-secondary ew-file-text"><?= $Language->phrase("ChooseFile") ?></div>
    <?= $Page->showcase_image_1->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->showcase_image_1->getErrorMessage() ?></div>
</div>
<input type="hidden" name="fn_x_showcase_image_1" id= "fn_x_showcase_image_1" value="<?= $Page->showcase_image_1->Upload->FileName ?>">
<input type="hidden" name="fa_x_showcase_image_1" id= "fa_x_showcase_image_1" value="<?= (Post("fa_x_showcase_image_1") == "0") ? "0" : "1" ?>">
<table id="ft_x_showcase_image_1" class="table table-sm float-start ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->showcase_image_2->Visible) { // showcase_image_2 ?>
    <div id="r_showcase_image_2"<?= $Page->showcase_image_2->rowAttributes() ?>>
        <label id="elh_pampanga_about_showcase_image_2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->showcase_image_2->caption() ?><?= $Page->showcase_image_2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->showcase_image_2->cellAttributes() ?>>
<span id="el_pampanga_about_showcase_image_2">
<div id="fd_x_showcase_image_2" class="fileinput-button ew-file-drop-zone">
    <input
        type="file"
        id="x_showcase_image_2"
        name="x_showcase_image_2"
        class="form-control ew-file-input"
        title="<?= $Page->showcase_image_2->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="pampanga_about"
        data-field="x_showcase_image_2"
        data-size="255"
        data-accept-file-types="<?= $Page->showcase_image_2->acceptFileTypes() ?>"
        data-max-file-size="<?= $Page->showcase_image_2->UploadMaxFileSize ?>"
        data-max-number-of-files="null"
        data-disable-image-crop="<?= $Page->showcase_image_2->ImageCropper ? 0 : 1 ?>"
        aria-describedby="x_showcase_image_2_help"
        <?= ($Page->showcase_image_2->ReadOnly || $Page->showcase_image_2->Disabled) ? " disabled" : "" ?>
        <?= $Page->showcase_image_2->editAttributes() ?>
    >
    <div class="text-body-secondary ew-file-text"><?= $Language->phrase("ChooseFile") ?></div>
    <?= $Page->showcase_image_2->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->showcase_image_2->getErrorMessage() ?></div>
</div>
<input type="hidden" name="fn_x_showcase_image_2" id= "fn_x_showcase_image_2" value="<?= $Page->showcase_image_2->Upload->FileName ?>">
<input type="hidden" name="fa_x_showcase_image_2" id= "fa_x_showcase_image_2" value="<?= (Post("fa_x_showcase_image_2") == "0") ? "0" : "1" ?>">
<table id="ft_x_showcase_image_2" class="table table-sm float-start ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fpampanga_aboutedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fpampanga_aboutedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("pampanga_about");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
