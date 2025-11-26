<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$CategoriesAdd = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { categories: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fcategoriesadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fcategoriesadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["name", [fields.name.visible && fields.name.required ? ew.Validators.required(fields.name.caption) : null], fields.name.isInvalid],
            ["color_code", [fields.color_code.visible && fields.color_code.required ? ew.Validators.required(fields.color_code.caption) : null], fields.color_code.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null, ew.Validators.datetime(fields.created_at.clientFormatPattern)], fields.created_at.isInvalid],
            ["category_type", [fields.category_type.visible && fields.category_type.required ? ew.Validators.required(fields.category_type.caption) : null], fields.category_type.isInvalid],
            ["parent_id", [fields.parent_id.visible && fields.parent_id.required ? ew.Validators.required(fields.parent_id.caption) : null, ew.Validators.integer], fields.parent_id.isInvalid]
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
<form name="fcategoriesadd" id="fcategoriesadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="categories">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->name->Visible) { // name ?>
    <div id="r_name"<?= $Page->name->rowAttributes() ?>>
        <label id="elh_categories_name" for="x_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->name->caption() ?><?= $Page->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->name->cellAttributes() ?>>
<span id="el_categories_name">
<input type="<?= $Page->name->getInputTextType() ?>" name="x_name" id="x_name" data-table="categories" data-field="x_name" value="<?= $Page->name->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->name->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->name->formatPattern()) ?>"<?= $Page->name->editAttributes() ?> aria-describedby="x_name_help">
<?= $Page->name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->color_code->Visible) { // color_code ?>
    <div id="r_color_code"<?= $Page->color_code->rowAttributes() ?>>
        <label id="elh_categories_color_code" for="x_color_code" class="<?= $Page->LeftColumnClass ?>"><?= $Page->color_code->caption() ?><?= $Page->color_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->color_code->cellAttributes() ?>>
<span id="el_categories_color_code">
<input type="<?= $Page->color_code->getInputTextType() ?>" name="x_color_code" id="x_color_code" data-table="categories" data-field="x_color_code" value="<?= $Page->color_code->EditValue ?>" size="30" maxlength="7" placeholder="<?= HtmlEncode($Page->color_code->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->color_code->formatPattern()) ?>"<?= $Page->color_code->editAttributes() ?> aria-describedby="x_color_code_help">
<?= $Page->color_code->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->color_code->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <div id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <label id="elh_categories_created_at" for="x_created_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created_at->caption() ?><?= $Page->created_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->created_at->cellAttributes() ?>>
<span id="el_categories_created_at">
<input type="<?= $Page->created_at->getInputTextType() ?>" name="x_created_at" id="x_created_at" data-table="categories" data-field="x_created_at" value="<?= $Page->created_at->EditValue ?>" placeholder="<?= HtmlEncode($Page->created_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->created_at->formatPattern()) ?>"<?= $Page->created_at->editAttributes() ?> aria-describedby="x_created_at_help">
<?= $Page->created_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created_at->getErrorMessage() ?></div>
<?php if (!$Page->created_at->ReadOnly && !$Page->created_at->Disabled && !isset($Page->created_at->EditAttrs["readonly"]) && !isset($Page->created_at->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fcategoriesadd", "datetimepicker"], function () {
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
    ew.createDateTimePicker("fcategoriesadd", "x_created_at", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->category_type->Visible) { // category_type ?>
    <div id="r_category_type"<?= $Page->category_type->rowAttributes() ?>>
        <label id="elh_categories_category_type" for="x_category_type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->category_type->caption() ?><?= $Page->category_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->category_type->cellAttributes() ?>>
<span id="el_categories_category_type">
<input type="<?= $Page->category_type->getInputTextType() ?>" name="x_category_type" id="x_category_type" data-table="categories" data-field="x_category_type" value="<?= $Page->category_type->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->category_type->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->category_type->formatPattern()) ?>"<?= $Page->category_type->editAttributes() ?> aria-describedby="x_category_type_help">
<?= $Page->category_type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->category_type->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->parent_id->Visible) { // parent_id ?>
    <div id="r_parent_id"<?= $Page->parent_id->rowAttributes() ?>>
        <label id="elh_categories_parent_id" for="x_parent_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->parent_id->caption() ?><?= $Page->parent_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->parent_id->cellAttributes() ?>>
<span id="el_categories_parent_id">
<input type="<?= $Page->parent_id->getInputTextType() ?>" name="x_parent_id" id="x_parent_id" data-table="categories" data-field="x_parent_id" value="<?= $Page->parent_id->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->parent_id->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->parent_id->formatPattern()) ?>"<?= $Page->parent_id->editAttributes() ?> aria-describedby="x_parent_id_help">
<?= $Page->parent_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->parent_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fcategoriesadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fcategoriesadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("categories");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
