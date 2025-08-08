<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$UserLevelsAdd = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { _user_levels: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var f_user_levelsadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("f_user_levelsadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["user_level_id", [fields.user_level_id.visible && fields.user_level_id.required ? ew.Validators.required(fields.user_level_id.caption) : null, ew.Validators.userLevelId, ew.Validators.integer], fields.user_level_id.isInvalid],
            ["user_level_name", [fields.user_level_name.visible && fields.user_level_name.required ? ew.Validators.required(fields.user_level_name.caption) : null, ew.Validators.userLevelName('user_level_id')], fields.user_level_name.isInvalid],
            ["hierarchy", [fields.hierarchy.visible && fields.hierarchy.required ? ew.Validators.required(fields.hierarchy.caption) : null, ew.Validators.integer], fields.hierarchy.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null, ew.Validators.datetime(fields.created_at.clientFormatPattern)], fields.created_at.isInvalid],
            ["updated_at", [fields.updated_at.visible && fields.updated_at.required ? ew.Validators.required(fields.updated_at.caption) : null, ew.Validators.datetime(fields.updated_at.clientFormatPattern)], fields.updated_at.isInvalid]
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
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="f_user_levelsadd" id="f_user_levelsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="_user_levels">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->user_level_id->Visible) { // user_level_id ?>
    <div id="r_user_level_id"<?= $Page->user_level_id->rowAttributes() ?>>
        <label id="elh__user_levels_user_level_id" for="x_user_level_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->user_level_id->caption() ?><?= $Page->user_level_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->user_level_id->cellAttributes() ?>>
<span id="el__user_levels_user_level_id">
<input type="<?= $Page->user_level_id->getInputTextType() ?>" name="x_user_level_id" id="x_user_level_id" data-table="_user_levels" data-field="x_user_level_id" value="<?= $Page->user_level_id->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->user_level_id->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->user_level_id->formatPattern()) ?>"<?= $Page->user_level_id->editAttributes() ?> aria-describedby="x_user_level_id_help">
<?= $Page->user_level_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->user_level_id->getErrorMessage() ?></div>
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
<?php if ($Page->created_at->Visible) { // created_at ?>
    <div id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <label id="elh__user_levels_created_at" for="x_created_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created_at->caption() ?><?= $Page->created_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->created_at->cellAttributes() ?>>
<span id="el__user_levels_created_at">
<input type="<?= $Page->created_at->getInputTextType() ?>" name="x_created_at" id="x_created_at" data-table="_user_levels" data-field="x_created_at" value="<?= $Page->created_at->EditValue ?>" placeholder="<?= HtmlEncode($Page->created_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->created_at->formatPattern()) ?>"<?= $Page->created_at->editAttributes() ?> aria-describedby="x_created_at_help">
<?= $Page->created_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created_at->getErrorMessage() ?></div>
<?php if (!$Page->created_at->ReadOnly && !$Page->created_at->Disabled && !isset($Page->created_at->EditAttrs["readonly"]) && !isset($Page->created_at->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["f_user_levelsadd", "datetimepicker"], function () {
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
    ew.createDateTimePicker("f_user_levelsadd", "x_created_at", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->updated_at->Visible) { // updated_at ?>
    <div id="r_updated_at"<?= $Page->updated_at->rowAttributes() ?>>
        <label id="elh__user_levels_updated_at" for="x_updated_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->updated_at->caption() ?><?= $Page->updated_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->updated_at->cellAttributes() ?>>
<span id="el__user_levels_updated_at">
<input type="<?= $Page->updated_at->getInputTextType() ?>" name="x_updated_at" id="x_updated_at" data-table="_user_levels" data-field="x_updated_at" value="<?= $Page->updated_at->EditValue ?>" placeholder="<?= HtmlEncode($Page->updated_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->updated_at->formatPattern()) ?>"<?= $Page->updated_at->editAttributes() ?> aria-describedby="x_updated_at_help">
<?= $Page->updated_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->updated_at->getErrorMessage() ?></div>
<?php if (!$Page->updated_at->ReadOnly && !$Page->updated_at->Disabled && !isset($Page->updated_at->EditAttrs["readonly"]) && !isset($Page->updated_at->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["f_user_levelsadd", "datetimepicker"], function () {
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
    ew.createDateTimePicker("f_user_levelsadd", "x_updated_at", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
    <!-- row for permission values -->
    <div id="rp_permission" class="row">
        <label id="elh_permission" class="<?= $Page->LeftColumnClass ?>"><?= HtmlTitle($Language->phrase("Permission")) ?></label>
        <div class="<?= $Page->RightColumnClass ?>">
        <?php
            foreach (PRIVILEGES as $priv) {
                if ($priv != "admin" || IsSysAdmin()) {
                    $priv = ucfirst($priv);
        ?>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="x__Allow<?= $priv ?>" id="<?= $priv ?>" value="<?= GetPrivilege($priv) ?>" /><label class="form-check-label" for="<?= $priv ?>"><?= $Language->phrase("Permission" . $priv) ?></label>
            </div>
        <?php
                }
            }
        ?>
        </div>
    </div>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="f_user_levelsadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="f_user_levelsadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("_user_levels");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
