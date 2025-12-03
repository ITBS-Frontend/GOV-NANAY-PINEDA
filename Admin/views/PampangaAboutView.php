<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$PampangaAboutView = &$Page;
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
<form name="fpampanga_aboutview" id="fpampanga_aboutview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { pampanga_about: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var fpampanga_aboutview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fpampanga_aboutview")
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
<input type="hidden" name="t" value="pampanga_about">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id"<?= $Page->id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pampanga_about_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id"<?= $Page->id->cellAttributes() ?>>
<span id="el_pampanga_about_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->preview_text->Visible) { // preview_text ?>
    <tr id="r_preview_text"<?= $Page->preview_text->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pampanga_about_preview_text"><?= $Page->preview_text->caption() ?></span></td>
        <td data-name="preview_text"<?= $Page->preview_text->cellAttributes() ?>>
<span id="el_pampanga_about_preview_text">
<span<?= $Page->preview_text->viewAttributes() ?>>
<?= $Page->preview_text->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->main_image->Visible) { // main_image ?>
    <tr id="r_main_image"<?= $Page->main_image->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pampanga_about_main_image"><?= $Page->main_image->caption() ?></span></td>
        <td data-name="main_image"<?= $Page->main_image->cellAttributes() ?>>
<span id="el_pampanga_about_main_image">
<span>
<?= GetFileViewTag($Page->main_image, $Page->main_image->getViewValue(), false) ?>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->showcase_image_1->Visible) { // showcase_image_1 ?>
    <tr id="r_showcase_image_1"<?= $Page->showcase_image_1->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pampanga_about_showcase_image_1"><?= $Page->showcase_image_1->caption() ?></span></td>
        <td data-name="showcase_image_1"<?= $Page->showcase_image_1->cellAttributes() ?>>
<span id="el_pampanga_about_showcase_image_1">
<span>
<?= GetFileViewTag($Page->showcase_image_1, $Page->showcase_image_1->getViewValue(), false) ?>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->showcase_image_2->Visible) { // showcase_image_2 ?>
    <tr id="r_showcase_image_2"<?= $Page->showcase_image_2->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pampanga_about_showcase_image_2"><?= $Page->showcase_image_2->caption() ?></span></td>
        <td data-name="showcase_image_2"<?= $Page->showcase_image_2->cellAttributes() ?>>
<span id="el_pampanga_about_showcase_image_2">
<span>
<?= GetFileViewTag($Page->showcase_image_2, $Page->showcase_image_2->getViewValue(), false) ?>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <tr id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pampanga_about_created_at"><?= $Page->created_at->caption() ?></span></td>
        <td data-name="created_at"<?= $Page->created_at->cellAttributes() ?>>
<span id="el_pampanga_about_created_at">
<span<?= $Page->created_at->viewAttributes() ?>>
<?= $Page->created_at->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->updated_at->Visible) { // updated_at ?>
    <tr id="r_updated_at"<?= $Page->updated_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pampanga_about_updated_at"><?= $Page->updated_at->caption() ?></span></td>
        <td data-name="updated_at"<?= $Page->updated_at->cellAttributes() ?>>
<span id="el_pampanga_about_updated_at">
<span<?= $Page->updated_at->viewAttributes() ?>>
<?= $Page->updated_at->getViewValue() ?></span>
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
