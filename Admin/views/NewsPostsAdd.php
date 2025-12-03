<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$NewsPostsAdd = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { news_posts: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fnews_postsadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fnews_postsadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["_title", [fields._title.visible && fields._title.required ? ew.Validators.required(fields._title.caption) : null], fields._title.isInvalid],
            ["slug", [fields.slug.visible && fields.slug.required ? ew.Validators.required(fields.slug.caption) : null], fields.slug.isInvalid],
            ["excerpt", [fields.excerpt.visible && fields.excerpt.required ? ew.Validators.required(fields.excerpt.caption) : null], fields.excerpt.isInvalid],
            ["_content", [fields._content.visible && fields._content.required ? ew.Validators.required(fields._content.caption) : null], fields._content.isInvalid],
            ["category_id", [fields.category_id.visible && fields.category_id.required ? ew.Validators.required(fields.category_id.caption) : null], fields.category_id.isInvalid],
            ["featured_image", [fields.featured_image.visible && fields.featured_image.required ? ew.Validators.fileRequired(fields.featured_image.caption) : null], fields.featured_image.isInvalid],
            ["author_name", [fields.author_name.visible && fields.author_name.required ? ew.Validators.required(fields.author_name.caption) : null], fields.author_name.isInvalid],
            ["is_featured", [fields.is_featured.visible && fields.is_featured.required ? ew.Validators.required(fields.is_featured.caption) : null], fields.is_featured.isInvalid],
            ["is_published", [fields.is_published.visible && fields.is_published.required ? ew.Validators.required(fields.is_published.caption) : null], fields.is_published.isInvalid],
            ["published_date", [fields.published_date.visible && fields.published_date.required ? ew.Validators.required(fields.published_date.caption) : null, ew.Validators.datetime(fields.published_date.clientFormatPattern)], fields.published_date.isInvalid],
            ["views_count", [fields.views_count.visible && fields.views_count.required ? ew.Validators.required(fields.views_count.caption) : null, ew.Validators.integer], fields.views_count.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null], fields.created_at.isInvalid],
            ["updated_at", [fields.updated_at.visible && fields.updated_at.required ? ew.Validators.required(fields.updated_at.caption) : null], fields.updated_at.isInvalid],
            ["news_type_id", [fields.news_type_id.visible && fields.news_type_id.required ? ew.Validators.required(fields.news_type_id.caption) : null], fields.news_type_id.isInvalid]
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
            "category_id": <?= $Page->category_id->toClientList($Page) ?>,
            "is_featured": <?= $Page->is_featured->toClientList($Page) ?>,
            "is_published": <?= $Page->is_published->toClientList($Page) ?>,
            "news_type_id": <?= $Page->news_type_id->toClientList($Page) ?>,
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
<form name="fnews_postsadd" id="fnews_postsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="news_posts">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->_title->Visible) { // title ?>
    <div id="r__title"<?= $Page->_title->rowAttributes() ?>>
        <label id="elh_news_posts__title" for="x__title" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_title->caption() ?><?= $Page->_title->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->_title->cellAttributes() ?>>
<span id="el_news_posts__title">
<input type="<?= $Page->_title->getInputTextType() ?>" name="x__title" id="x__title" data-table="news_posts" data-field="x__title" value="<?= $Page->_title->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->_title->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->_title->formatPattern()) ?>"<?= $Page->_title->editAttributes() ?> aria-describedby="x__title_help">
<?= $Page->_title->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_title->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->slug->Visible) { // slug ?>
    <div id="r_slug"<?= $Page->slug->rowAttributes() ?>>
        <label id="elh_news_posts_slug" for="x_slug" class="<?= $Page->LeftColumnClass ?>"><?= $Page->slug->caption() ?><?= $Page->slug->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->slug->cellAttributes() ?>>
<span id="el_news_posts_slug">
<input type="<?= $Page->slug->getInputTextType() ?>" name="x_slug" id="x_slug" data-table="news_posts" data-field="x_slug" value="<?= $Page->slug->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->slug->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->slug->formatPattern()) ?>"<?= $Page->slug->editAttributes() ?> aria-describedby="x_slug_help">
<?= $Page->slug->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->slug->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->excerpt->Visible) { // excerpt ?>
    <div id="r_excerpt"<?= $Page->excerpt->rowAttributes() ?>>
        <label id="elh_news_posts_excerpt" for="x_excerpt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->excerpt->caption() ?><?= $Page->excerpt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->excerpt->cellAttributes() ?>>
<span id="el_news_posts_excerpt">
<textarea data-table="news_posts" data-field="x_excerpt" name="x_excerpt" id="x_excerpt" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->excerpt->getPlaceHolder()) ?>"<?= $Page->excerpt->editAttributes() ?> aria-describedby="x_excerpt_help"><?= $Page->excerpt->EditValue ?></textarea>
<?= $Page->excerpt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->excerpt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_content->Visible) { // content ?>
    <div id="r__content"<?= $Page->_content->rowAttributes() ?>>
        <label id="elh_news_posts__content" for="x__content" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_content->caption() ?><?= $Page->_content->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->_content->cellAttributes() ?>>
<span id="el_news_posts__content">
<textarea data-table="news_posts" data-field="x__content" name="x__content" id="x__content" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->_content->getPlaceHolder()) ?>"<?= $Page->_content->editAttributes() ?> aria-describedby="x__content_help"><?= $Page->_content->EditValue ?></textarea>
<?= $Page->_content->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_content->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->category_id->Visible) { // category_id ?>
    <div id="r_category_id"<?= $Page->category_id->rowAttributes() ?>>
        <label id="elh_news_posts_category_id" for="x_category_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->category_id->caption() ?><?= $Page->category_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->category_id->cellAttributes() ?>>
<span id="el_news_posts_category_id">
    <select
        id="x_category_id"
        name="x_category_id"
        class="form-select ew-select<?= $Page->category_id->isInvalidClass() ?>"
        <?php if (!$Page->category_id->IsNativeSelect) { ?>
        data-select2-id="fnews_postsadd_x_category_id"
        <?php } ?>
        data-table="news_posts"
        data-field="x_category_id"
        data-value-separator="<?= $Page->category_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->category_id->getPlaceHolder()) ?>"
        <?= $Page->category_id->editAttributes() ?>>
        <?= $Page->category_id->selectOptionListHtml("x_category_id") ?>
    </select>
    <?= $Page->category_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->category_id->getErrorMessage() ?></div>
<?= $Page->category_id->Lookup->getParamTag($Page, "p_x_category_id") ?>
<?php if (!$Page->category_id->IsNativeSelect) { ?>
<script>
loadjs.ready("fnews_postsadd", function() {
    var options = { name: "x_category_id", selectId: "fnews_postsadd_x_category_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fnews_postsadd.lists.category_id?.lookupOptions.length) {
        options.data = { id: "x_category_id", form: "fnews_postsadd" };
    } else {
        options.ajax = { id: "x_category_id", form: "fnews_postsadd", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.news_posts.fields.category_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
    <div id="r_featured_image"<?= $Page->featured_image->rowAttributes() ?>>
        <label id="elh_news_posts_featured_image" class="<?= $Page->LeftColumnClass ?>"><?= $Page->featured_image->caption() ?><?= $Page->featured_image->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->featured_image->cellAttributes() ?>>
<span id="el_news_posts_featured_image">
<div id="fd_x_featured_image" class="fileinput-button ew-file-drop-zone">
    <input
        type="file"
        id="x_featured_image"
        name="x_featured_image"
        class="form-control ew-file-input"
        title="<?= $Page->featured_image->title() ?>"
        lang="<?= CurrentLanguageID() ?>"
        data-table="news_posts"
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
<input type="hidden" name="fa_x_featured_image" id= "fa_x_featured_image" value="0">
<table id="ft_x_featured_image" class="table table-sm float-start ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->author_name->Visible) { // author_name ?>
    <div id="r_author_name"<?= $Page->author_name->rowAttributes() ?>>
        <label id="elh_news_posts_author_name" for="x_author_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->author_name->caption() ?><?= $Page->author_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->author_name->cellAttributes() ?>>
<span id="el_news_posts_author_name">
<input type="<?= $Page->author_name->getInputTextType() ?>" name="x_author_name" id="x_author_name" data-table="news_posts" data-field="x_author_name" value="<?= $Page->author_name->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->author_name->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->author_name->formatPattern()) ?>"<?= $Page->author_name->editAttributes() ?> aria-describedby="x_author_name_help">
<?= $Page->author_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->author_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->is_featured->Visible) { // is_featured ?>
    <div id="r_is_featured"<?= $Page->is_featured->rowAttributes() ?>>
        <label id="elh_news_posts_is_featured" class="<?= $Page->LeftColumnClass ?>"><?= $Page->is_featured->caption() ?><?= $Page->is_featured->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->is_featured->cellAttributes() ?>>
<span id="el_news_posts_is_featured">
<div class="form-check d-inline-block">
    <input type="checkbox" class="form-check-input<?= $Page->is_featured->isInvalidClass() ?>" data-table="news_posts" data-field="x_is_featured" data-boolean name="x_is_featured" id="x_is_featured" value="1"<?= ConvertToBool($Page->is_featured->CurrentValue) ? " checked" : "" ?><?= $Page->is_featured->editAttributes() ?> aria-describedby="x_is_featured_help">
    <div class="invalid-feedback"><?= $Page->is_featured->getErrorMessage() ?></div>
</div>
<?= $Page->is_featured->getCustomMessage() ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->is_published->Visible) { // is_published ?>
    <div id="r_is_published"<?= $Page->is_published->rowAttributes() ?>>
        <label id="elh_news_posts_is_published" class="<?= $Page->LeftColumnClass ?>"><?= $Page->is_published->caption() ?><?= $Page->is_published->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->is_published->cellAttributes() ?>>
<span id="el_news_posts_is_published">
<div class="form-check d-inline-block">
    <input type="checkbox" class="form-check-input<?= $Page->is_published->isInvalidClass() ?>" data-table="news_posts" data-field="x_is_published" data-boolean name="x_is_published" id="x_is_published" value="1"<?= ConvertToBool($Page->is_published->CurrentValue) ? " checked" : "" ?><?= $Page->is_published->editAttributes() ?> aria-describedby="x_is_published_help">
    <div class="invalid-feedback"><?= $Page->is_published->getErrorMessage() ?></div>
</div>
<?= $Page->is_published->getCustomMessage() ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->published_date->Visible) { // published_date ?>
    <div id="r_published_date"<?= $Page->published_date->rowAttributes() ?>>
        <label id="elh_news_posts_published_date" for="x_published_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->published_date->caption() ?><?= $Page->published_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->published_date->cellAttributes() ?>>
<span id="el_news_posts_published_date">
<input type="<?= $Page->published_date->getInputTextType() ?>" name="x_published_date" id="x_published_date" data-table="news_posts" data-field="x_published_date" value="<?= $Page->published_date->EditValue ?>" placeholder="<?= HtmlEncode($Page->published_date->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->published_date->formatPattern()) ?>"<?= $Page->published_date->editAttributes() ?> aria-describedby="x_published_date_help">
<?= $Page->published_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->published_date->getErrorMessage() ?></div>
<?php if (!$Page->published_date->ReadOnly && !$Page->published_date->Disabled && !isset($Page->published_date->EditAttrs["readonly"]) && !isset($Page->published_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fnews_postsadd", "datetimepicker"], function () {
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
    ew.createDateTimePicker("fnews_postsadd", "x_published_date", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->views_count->Visible) { // views_count ?>
    <div id="r_views_count"<?= $Page->views_count->rowAttributes() ?>>
        <label id="elh_news_posts_views_count" for="x_views_count" class="<?= $Page->LeftColumnClass ?>"><?= $Page->views_count->caption() ?><?= $Page->views_count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->views_count->cellAttributes() ?>>
<span id="el_news_posts_views_count">
<input type="<?= $Page->views_count->getInputTextType() ?>" name="x_views_count" id="x_views_count" data-table="news_posts" data-field="x_views_count" value="<?= $Page->views_count->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->views_count->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->views_count->formatPattern()) ?>"<?= $Page->views_count->editAttributes() ?> aria-describedby="x_views_count_help">
<?= $Page->views_count->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->views_count->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->news_type_id->Visible) { // news_type_id ?>
    <div id="r_news_type_id"<?= $Page->news_type_id->rowAttributes() ?>>
        <label id="elh_news_posts_news_type_id" for="x_news_type_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->news_type_id->caption() ?><?= $Page->news_type_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->news_type_id->cellAttributes() ?>>
<span id="el_news_posts_news_type_id">
    <select
        id="x_news_type_id"
        name="x_news_type_id"
        class="form-select ew-select<?= $Page->news_type_id->isInvalidClass() ?>"
        <?php if (!$Page->news_type_id->IsNativeSelect) { ?>
        data-select2-id="fnews_postsadd_x_news_type_id"
        <?php } ?>
        data-table="news_posts"
        data-field="x_news_type_id"
        data-value-separator="<?= $Page->news_type_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->news_type_id->getPlaceHolder()) ?>"
        <?= $Page->news_type_id->editAttributes() ?>>
        <?= $Page->news_type_id->selectOptionListHtml("x_news_type_id") ?>
    </select>
    <?= $Page->news_type_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->news_type_id->getErrorMessage() ?></div>
<?= $Page->news_type_id->Lookup->getParamTag($Page, "p_x_news_type_id") ?>
<?php if (!$Page->news_type_id->IsNativeSelect) { ?>
<script>
loadjs.ready("fnews_postsadd", function() {
    var options = { name: "x_news_type_id", selectId: "fnews_postsadd_x_news_type_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fnews_postsadd.lists.news_type_id?.lookupOptions.length) {
        options.data = { id: "x_news_type_id", form: "fnews_postsadd" };
    } else {
        options.ajax = { id: "x_news_type_id", form: "fnews_postsadd", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.news_posts.fields.news_type_id.selectOptions);
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fnews_postsadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fnews_postsadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("news_posts");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
