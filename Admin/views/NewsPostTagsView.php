<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$NewsPostTagsView = &$Page;
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
<form name="fnews_post_tagsview" id="fnews_post_tagsview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { news_post_tags: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var fnews_post_tagsview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fnews_post_tagsview")
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
<input type="hidden" name="t" value="news_post_tags">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->post_id->Visible) { // post_id ?>
    <tr id="r_post_id"<?= $Page->post_id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_news_post_tags_post_id"><?= $Page->post_id->caption() ?></span></td>
        <td data-name="post_id"<?= $Page->post_id->cellAttributes() ?>>
<span id="el_news_post_tags_post_id">
<span<?= $Page->post_id->viewAttributes() ?>>
<?= $Page->post_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->tag_id->Visible) { // tag_id ?>
    <tr id="r_tag_id"<?= $Page->tag_id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_news_post_tags_tag_id"><?= $Page->tag_id->caption() ?></span></td>
        <td data-name="tag_id"<?= $Page->tag_id->cellAttributes() ?>>
<span id="el_news_post_tags_tag_id">
<span<?= $Page->tag_id->viewAttributes() ?>>
<?= $Page->tag_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
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
