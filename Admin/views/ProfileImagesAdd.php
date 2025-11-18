<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$ProfileImagesAdd = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { profile_images: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fprofile_imagesadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fprofile_imagesadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["image_path", [fields.image_path.visible && fields.image_path.required ? ew.Validators.fileRequired(fields.image_path.caption) : null], fields.image_path.isInvalid],
            ["image_type", [fields.image_type.visible && fields.image_type.required ? ew.Validators.required(fields.image_type.caption) : null], fields.image_type.isInvalid],
            ["is_primary", [fields.is_primary.visible && fields.is_primary.required ? ew.Validators.required(fields.is_primary.caption) : null], fields.is_primary.isInvalid],
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
            "is_primary": <?= $Page->is_primary->toClientList($Page) ?>,
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
<form name="fprofile_imagesadd" id="fprofile_imagesadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="profile_images">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->image_path->Visible) { // image_path ?>
    <div id="r_image_path"<?= $Page->image_path->rowAttributes() ?>>
        <label id="elh_profile_images_image_path" class="<?= $Page->LeftColumnClass ?>"><?= $Page->image_path->caption() ?><?= $Page->image_path->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->image_path->cellAttributes() ?>>
<span id="el_profile_images_image_path">
<div id="fd_x_image_path" class="fileinput-button ew-file-drop-zone">
    <input
        type="file"
        id="x_image_path"
        name="x_image_path"
        class="form-control ew-file-input"
        title="<?= $Page->image_path->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="profile_images"
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
<?php if ($Page->image_type->Visible) { // image_type ?>
    <div id="r_image_type"<?= $Page->image_type->rowAttributes() ?>>
        <label id="elh_profile_images_image_type" for="x_image_type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->image_type->caption() ?><?= $Page->image_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->image_type->cellAttributes() ?>>
<span id="el_profile_images_image_type">
<input type="<?= $Page->image_type->getInputTextType() ?>" name="x_image_type" id="x_image_type" data-table="profile_images" data-field="x_image_type" value="<?= $Page->image_type->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->image_type->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->image_type->formatPattern()) ?>"<?= $Page->image_type->editAttributes() ?> aria-describedby="x_image_type_help">
<?= $Page->image_type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->image_type->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->is_primary->Visible) { // is_primary ?>
    <div id="r_is_primary"<?= $Page->is_primary->rowAttributes() ?>>
        <label id="elh_profile_images_is_primary" class="<?= $Page->LeftColumnClass ?>"><?= $Page->is_primary->caption() ?><?= $Page->is_primary->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->is_primary->cellAttributes() ?>>
<span id="el_profile_images_is_primary">
<div class="form-check d-inline-block">
    <input type="checkbox" class="form-check-input<?= $Page->is_primary->isInvalidClass() ?>" data-table="profile_images" data-field="x_is_primary" data-boolean name="x_is_primary" id="x_is_primary" value="1"<?= ConvertToBool($Page->is_primary->CurrentValue) ? " checked" : "" ?><?= $Page->is_primary->editAttributes() ?> aria-describedby="x_is_primary_help">
    <div class="invalid-feedback"><?= $Page->is_primary->getErrorMessage() ?></div>
</div>
<?= $Page->is_primary->getCustomMessage() ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <div id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <label id="elh_profile_images_created_at" for="x_created_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created_at->caption() ?><?= $Page->created_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->created_at->cellAttributes() ?>>
<span id="el_profile_images_created_at">
<input type="<?= $Page->created_at->getInputTextType() ?>" name="x_created_at" id="x_created_at" data-table="profile_images" data-field="x_created_at" value="<?= $Page->created_at->EditValue ?>" placeholder="<?= HtmlEncode($Page->created_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->created_at->formatPattern()) ?>"<?= $Page->created_at->editAttributes() ?> aria-describedby="x_created_at_help">
<?= $Page->created_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created_at->getErrorMessage() ?></div>
<?php if (!$Page->created_at->ReadOnly && !$Page->created_at->Disabled && !isset($Page->created_at->EditAttrs["readonly"]) && !isset($Page->created_at->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fprofile_imagesadd", "datetimepicker"], function () {
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
    ew.createDateTimePicker("fprofile_imagesadd", "x_created_at", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fprofile_imagesadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fprofile_imagesadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("profile_images");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
