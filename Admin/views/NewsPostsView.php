<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$NewsPostsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="view">
<form name="fnews_postsview" id="fnews_postsview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { news_posts: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var fnews_postsview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fnews_postsview")
        .setPageId("view")
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
<?php } ?>
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="news_posts">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id"<?= $Page->id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_news_posts_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id"<?= $Page->id->cellAttributes() ?>>
<span id="el_news_posts_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_title->Visible) { // title ?>
    <tr id="r__title"<?= $Page->_title->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_news_posts__title"><?= $Page->_title->caption() ?></span></td>
        <td data-name="_title"<?= $Page->_title->cellAttributes() ?>>
<span id="el_news_posts__title">
<span<?= $Page->_title->viewAttributes() ?>>
<?= $Page->_title->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->slug->Visible) { // slug ?>
    <tr id="r_slug"<?= $Page->slug->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_news_posts_slug"><?= $Page->slug->caption() ?></span></td>
        <td data-name="slug"<?= $Page->slug->cellAttributes() ?>>
<span id="el_news_posts_slug">
<span<?= $Page->slug->viewAttributes() ?>>
<?= $Page->slug->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->excerpt->Visible) { // excerpt ?>
    <tr id="r_excerpt"<?= $Page->excerpt->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_news_posts_excerpt"><?= $Page->excerpt->caption() ?></span></td>
        <td data-name="excerpt"<?= $Page->excerpt->cellAttributes() ?>>
<span id="el_news_posts_excerpt">
<span<?= $Page->excerpt->viewAttributes() ?>>
<?= $Page->excerpt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_content->Visible) { // content ?>
    <tr id="r__content"<?= $Page->_content->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_news_posts__content"><?= $Page->_content->caption() ?></span></td>
        <td data-name="_content"<?= $Page->_content->cellAttributes() ?>>
<span id="el_news_posts__content">
<span<?= $Page->_content->viewAttributes() ?>>
<?= $Page->_content->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->category_id->Visible) { // category_id ?>
    <tr id="r_category_id"<?= $Page->category_id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_news_posts_category_id"><?= $Page->category_id->caption() ?></span></td>
        <td data-name="category_id"<?= $Page->category_id->cellAttributes() ?>>
<span id="el_news_posts_category_id">
<span<?= $Page->category_id->viewAttributes() ?>>
<?= $Page->category_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->featured_image->Visible) { // featured_image ?>
    <tr id="r_featured_image"<?= $Page->featured_image->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_news_posts_featured_image"><?= $Page->featured_image->caption() ?></span></td>
        <td data-name="featured_image"<?= $Page->featured_image->cellAttributes() ?>>
<span id="el_news_posts_featured_image">
<span>
<?= GetFileViewTag($Page->featured_image, $Page->featured_image->getViewValue(), false) ?>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->author_name->Visible) { // author_name ?>
    <tr id="r_author_name"<?= $Page->author_name->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_news_posts_author_name"><?= $Page->author_name->caption() ?></span></td>
        <td data-name="author_name"<?= $Page->author_name->cellAttributes() ?>>
<span id="el_news_posts_author_name">
<span<?= $Page->author_name->viewAttributes() ?>>
<?= $Page->author_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->is_featured->Visible) { // is_featured ?>
    <tr id="r_is_featured"<?= $Page->is_featured->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_news_posts_is_featured"><?= $Page->is_featured->caption() ?></span></td>
        <td data-name="is_featured"<?= $Page->is_featured->cellAttributes() ?>>
<span id="el_news_posts_is_featured">
<span<?= $Page->is_featured->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($Page->is_featured->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->is_published->Visible) { // is_published ?>
    <tr id="r_is_published"<?= $Page->is_published->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_news_posts_is_published"><?= $Page->is_published->caption() ?></span></td>
        <td data-name="is_published"<?= $Page->is_published->cellAttributes() ?>>
<span id="el_news_posts_is_published">
<span<?= $Page->is_published->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($Page->is_published->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->published_date->Visible) { // published_date ?>
    <tr id="r_published_date"<?= $Page->published_date->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_news_posts_published_date"><?= $Page->published_date->caption() ?></span></td>
        <td data-name="published_date"<?= $Page->published_date->cellAttributes() ?>>
<span id="el_news_posts_published_date">
<span<?= $Page->published_date->viewAttributes() ?>>
<?= $Page->published_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->views_count->Visible) { // views_count ?>
    <tr id="r_views_count"<?= $Page->views_count->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_news_posts_views_count"><?= $Page->views_count->caption() ?></span></td>
        <td data-name="views_count"<?= $Page->views_count->cellAttributes() ?>>
<span id="el_news_posts_views_count">
<span<?= $Page->views_count->viewAttributes() ?>>
<?= $Page->views_count->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <tr id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_news_posts_created_at"><?= $Page->created_at->caption() ?></span></td>
        <td data-name="created_at"<?= $Page->created_at->cellAttributes() ?>>
<span id="el_news_posts_created_at">
<span<?= $Page->created_at->viewAttributes() ?>>
<?= $Page->created_at->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->updated_at->Visible) { // updated_at ?>
    <tr id="r_updated_at"<?= $Page->updated_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_news_posts_updated_at"><?= $Page->updated_at->caption() ?></span></td>
        <td data-name="updated_at"<?= $Page->updated_at->cellAttributes() ?>>
<span id="el_news_posts_updated_at">
<span<?= $Page->updated_at->viewAttributes() ?>>
<?= $Page->updated_at->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->news_type_id->Visible) { // news_type_id ?>
    <tr id="r_news_type_id"<?= $Page->news_type_id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_news_posts_news_type_id"><?= $Page->news_type_id->caption() ?></span></td>
        <td data-name="news_type_id"<?= $Page->news_type_id->cellAttributes() ?>>
<span id="el_news_posts_news_type_id">
<span<?= $Page->news_type_id->viewAttributes() ?>>
<?= $Page->news_type_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
<?php
    if (in_array("news_post_tags", explode(",", $Page->getCurrentDetailTable())) && $news_post_tags->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("news_post_tags", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "NewsPostTagsGrid.php" ?>
<?php } ?>
</form>
</main>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
