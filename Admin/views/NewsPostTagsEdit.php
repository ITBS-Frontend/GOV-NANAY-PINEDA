<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$NewsPostTagsEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="fnews_post_tagsedit" id="fnews_post_tagsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { news_post_tags: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var fnews_post_tagsedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fnews_post_tagsedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["post_id", [fields.post_id.visible && fields.post_id.required ? ew.Validators.required(fields.post_id.caption) : null], fields.post_id.isInvalid],
            ["tag_id", [fields.tag_id.visible && fields.tag_id.required ? ew.Validators.required(fields.tag_id.caption) : null], fields.tag_id.isInvalid]
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
            "post_id": <?= $Page->post_id->toClientList($Page) ?>,
            "tag_id": <?= $Page->tag_id->toClientList($Page) ?>,
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
<input type="hidden" name="t" value="news_post_tags">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "news_posts") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="news_posts">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->post_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->post_id->Visible) { // post_id ?>
    <div id="r_post_id"<?= $Page->post_id->rowAttributes() ?>>
        <label id="elh_news_post_tags_post_id" for="x_post_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->post_id->caption() ?><?= $Page->post_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->post_id->cellAttributes() ?>>
<span id="el_news_post_tags_post_id">
<?php if ($Page->post_id->getSessionValue() != "") { ?>
<span<?= $Page->post_id->viewAttributes() ?>>
<span class="form-control-plaintext"><?= $Page->post_id->getDisplayValue($Page->post_id->EditValue) ?></span></span>
<input type="hidden" id="x_post_id" name="x_post_id" value="<?= HtmlEncode($Page->post_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
    <select
        id="x_post_id"
        name="x_post_id"
        class="form-select ew-select<?= $Page->post_id->isInvalidClass() ?>"
        <?php if (!$Page->post_id->IsNativeSelect) { ?>
        data-select2-id="fnews_post_tagsedit_x_post_id"
        <?php } ?>
        data-table="news_post_tags"
        data-field="x_post_id"
        data-value-separator="<?= $Page->post_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->post_id->getPlaceHolder()) ?>"
        <?= $Page->post_id->editAttributes() ?>>
        <?= $Page->post_id->selectOptionListHtml("x_post_id") ?>
    </select>
    <?= $Page->post_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->post_id->getErrorMessage() ?></div>
<?= $Page->post_id->Lookup->getParamTag($Page, "p_x_post_id") ?>
<?php if (!$Page->post_id->IsNativeSelect) { ?>
<script>
loadjs.ready("fnews_post_tagsedit", function() {
    var options = { name: "x_post_id", selectId: "fnews_post_tagsedit_x_post_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fnews_post_tagsedit.lists.post_id?.lookupOptions.length) {
        options.data = { id: "x_post_id", form: "fnews_post_tagsedit" };
    } else {
        options.ajax = { id: "x_post_id", form: "fnews_post_tagsedit", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.news_post_tags.fields.post_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
<?php } ?>
<input type="hidden" data-table="news_post_tags" data-field="x_post_id" data-hidden="1" data-old name="o_post_id" id="o_post_id" value="<?= HtmlEncode($Page->post_id->OldValue ?? $Page->post_id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tag_id->Visible) { // tag_id ?>
    <div id="r_tag_id"<?= $Page->tag_id->rowAttributes() ?>>
        <label id="elh_news_post_tags_tag_id" for="x_tag_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tag_id->caption() ?><?= $Page->tag_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->tag_id->cellAttributes() ?>>
<span id="el_news_post_tags_tag_id">
    <select
        id="x_tag_id"
        name="x_tag_id"
        class="form-select ew-select<?= $Page->tag_id->isInvalidClass() ?>"
        <?php if (!$Page->tag_id->IsNativeSelect) { ?>
        data-select2-id="fnews_post_tagsedit_x_tag_id"
        <?php } ?>
        data-table="news_post_tags"
        data-field="x_tag_id"
        data-value-separator="<?= $Page->tag_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->tag_id->getPlaceHolder()) ?>"
        <?= $Page->tag_id->editAttributes() ?>>
        <?= $Page->tag_id->selectOptionListHtml("x_tag_id") ?>
    </select>
    <?= $Page->tag_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->tag_id->getErrorMessage() ?></div>
<?= $Page->tag_id->Lookup->getParamTag($Page, "p_x_tag_id") ?>
<?php if (!$Page->tag_id->IsNativeSelect) { ?>
<script>
loadjs.ready("fnews_post_tagsedit", function() {
    var options = { name: "x_tag_id", selectId: "fnews_post_tagsedit_x_tag_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fnews_post_tagsedit.lists.tag_id?.lookupOptions.length) {
        options.data = { id: "x_tag_id", form: "fnews_post_tagsedit" };
    } else {
        options.ajax = { id: "x_tag_id", form: "fnews_post_tagsedit", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.news_post_tags.fields.tag_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
<input type="hidden" data-table="news_post_tags" data-field="x_tag_id" data-hidden="1" data-old name="o_tag_id" id="o_tag_id" value="<?= HtmlEncode($Page->tag_id->OldValue ?? $Page->tag_id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fnews_post_tagsedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fnews_post_tagsedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("news_post_tags");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
