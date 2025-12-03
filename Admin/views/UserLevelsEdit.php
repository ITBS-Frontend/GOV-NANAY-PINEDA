<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$UserLevelsEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="f_user_levelsedit" id="f_user_levelsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { _user_levels: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var f_user_levelsedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("f_user_levelsedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["user_level_id", [fields.user_level_id.visible && fields.user_level_id.required ? ew.Validators.required(fields.user_level_id.caption) : null, ew.Validators.userLevelId, ew.Validators.integer], fields.user_level_id.isInvalid],
            ["user_level_name", [fields.user_level_name.visible && fields.user_level_name.required ? ew.Validators.required(fields.user_level_name.caption) : null, ew.Validators.userLevelName('user_level_id')], fields.user_level_name.isInvalid],
            ["hierarchy", [fields.hierarchy.visible && fields.hierarchy.required ? ew.Validators.required(fields.hierarchy.caption) : null, ew.Validators.integer], fields.hierarchy.isInvalid],
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
<input type="hidden" name="t" value="_user_levels">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->user_level_id->Visible) { // user_level_id ?>
    <div id="r_user_level_id"<?= $Page->user_level_id->rowAttributes() ?>>
        <label id="elh__user_levels_user_level_id" for="x_user_level_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->user_level_id->caption() ?><?= $Page->user_level_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->user_level_id->cellAttributes() ?>>
<span id="el__user_levels_user_level_id">
<input type="<?= $Page->user_level_id->getInputTextType() ?>" name="x_user_level_id" id="x_user_level_id" data-table="_user_levels" data-field="x_user_level_id" value="<?= $Page->user_level_id->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->user_level_id->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->user_level_id->formatPattern()) ?>"<?= $Page->user_level_id->editAttributes() ?> aria-describedby="x_user_level_id_help">
<?= $Page->user_level_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->user_level_id->getErrorMessage() ?></div>
<input type="hidden" data-table="_user_levels" data-field="x_user_level_id" data-hidden="1" data-old name="o_user_level_id" id="o_user_level_id" value="<?= HtmlEncode($Page->user_level_id->OldValue ?? $Page->user_level_id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->user_level_name->Visible) { // user_level_name ?>
    <div id="r_user_level_name"<?= $Page->user_level_name->rowAttributes() ?>>
        <label id="elh__user_levels_user_level_name" for="x_user_level_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->user_level_name->caption() ?><?= $Page->user_level_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->user_level_name->cellAttributes() ?>>
<span id="el__user_levels_user_level_name">
<input type="<?= $Page->user_level_name->getInputTextType() ?>" name="x_user_level_name" id="x_user_level_name" data-table="_user_levels" data-field="x_user_level_name" value="<?= $Page->user_level_name->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->user_level_name->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->user_level_name->formatPattern()) ?>"<?= $Page->user_level_name->editAttributes() ?> aria-describedby="x_user_level_name_help">
<?= $Page->user_level_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->user_level_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->hierarchy->Visible) { // hierarchy ?>
    <div id="r_hierarchy"<?= $Page->hierarchy->rowAttributes() ?>>
        <label id="elh__user_levels_hierarchy" for="x_hierarchy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->hierarchy->caption() ?><?= $Page->hierarchy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->hierarchy->cellAttributes() ?>>
<span id="el__user_levels_hierarchy">
<input type="<?= $Page->hierarchy->getInputTextType() ?>" name="x_hierarchy" id="x_hierarchy" data-table="_user_levels" data-field="x_hierarchy" value="<?= $Page->hierarchy->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->hierarchy->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->hierarchy->formatPattern()) ?>"<?= $Page->hierarchy->editAttributes() ?> aria-describedby="x_hierarchy_help">
<?= $Page->hierarchy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->hierarchy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="f_user_levelsedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="f_user_levelsedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("_user_levels");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
