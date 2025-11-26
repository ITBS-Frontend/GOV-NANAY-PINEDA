<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$SocialWelfareProgramsView = &$Page;
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
<form name="fsocial_welfare_programsview" id="fsocial_welfare_programsview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { social_welfare_programs: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var fsocial_welfare_programsview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fsocial_welfare_programsview")
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
<input type="hidden" name="t" value="social_welfare_programs">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id"<?= $Page->id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_social_welfare_programs_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id"<?= $Page->id->cellAttributes() ?>>
<span id="el_social_welfare_programs_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->category_id->Visible) { // category_id ?>
    <tr id="r_category_id"<?= $Page->category_id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_social_welfare_programs_category_id"><?= $Page->category_id->caption() ?></span></td>
        <td data-name="category_id"<?= $Page->category_id->cellAttributes() ?>>
<span id="el_social_welfare_programs_category_id">
<span<?= $Page->category_id->viewAttributes() ?>>
<?= $Page->category_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->program_name->Visible) { // program_name ?>
    <tr id="r_program_name"<?= $Page->program_name->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_social_welfare_programs_program_name"><?= $Page->program_name->caption() ?></span></td>
        <td data-name="program_name"<?= $Page->program_name->cellAttributes() ?>>
<span id="el_social_welfare_programs_program_name">
<span<?= $Page->program_name->viewAttributes() ?>>
<?= $Page->program_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <tr id="r_description"<?= $Page->description->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_social_welfare_programs_description"><?= $Page->description->caption() ?></span></td>
        <td data-name="description"<?= $Page->description->cellAttributes() ?>>
<span id="el_social_welfare_programs_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->eligibility_criteria->Visible) { // eligibility_criteria ?>
    <tr id="r_eligibility_criteria"<?= $Page->eligibility_criteria->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_social_welfare_programs_eligibility_criteria"><?= $Page->eligibility_criteria->caption() ?></span></td>
        <td data-name="eligibility_criteria"<?= $Page->eligibility_criteria->cellAttributes() ?>>
<span id="el_social_welfare_programs_eligibility_criteria">
<span<?= $Page->eligibility_criteria->viewAttributes() ?>>
<?= $Page->eligibility_criteria->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->benefits->Visible) { // benefits ?>
    <tr id="r_benefits"<?= $Page->benefits->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_social_welfare_programs_benefits"><?= $Page->benefits->caption() ?></span></td>
        <td data-name="benefits"<?= $Page->benefits->cellAttributes() ?>>
<span id="el_social_welfare_programs_benefits">
<span<?= $Page->benefits->viewAttributes() ?>>
<?= $Page->benefits->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->how_to_apply->Visible) { // how_to_apply ?>
    <tr id="r_how_to_apply"<?= $Page->how_to_apply->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_social_welfare_programs_how_to_apply"><?= $Page->how_to_apply->caption() ?></span></td>
        <td data-name="how_to_apply"<?= $Page->how_to_apply->cellAttributes() ?>>
<span id="el_social_welfare_programs_how_to_apply">
<span<?= $Page->how_to_apply->viewAttributes() ?>>
<?= $Page->how_to_apply->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->required_documents->Visible) { // required_documents ?>
    <tr id="r_required_documents"<?= $Page->required_documents->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_social_welfare_programs_required_documents"><?= $Page->required_documents->caption() ?></span></td>
        <td data-name="required_documents"<?= $Page->required_documents->cellAttributes() ?>>
<span id="el_social_welfare_programs_required_documents">
<span<?= $Page->required_documents->viewAttributes() ?>>
<?= $Page->required_documents->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->contact_info->Visible) { // contact_info ?>
    <tr id="r_contact_info"<?= $Page->contact_info->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_social_welfare_programs_contact_info"><?= $Page->contact_info->caption() ?></span></td>
        <td data-name="contact_info"<?= $Page->contact_info->cellAttributes() ?>>
<span id="el_social_welfare_programs_contact_info">
<span<?= $Page->contact_info->viewAttributes() ?>>
<?= $Page->contact_info->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->is_active->Visible) { // is_active ?>
    <tr id="r_is_active"<?= $Page->is_active->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_social_welfare_programs_is_active"><?= $Page->is_active->caption() ?></span></td>
        <td data-name="is_active"<?= $Page->is_active->cellAttributes() ?>>
<span id="el_social_welfare_programs_is_active">
<span<?= $Page->is_active->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($Page->is_active->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <tr id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_social_welfare_programs_created_at"><?= $Page->created_at->caption() ?></span></td>
        <td data-name="created_at"<?= $Page->created_at->cellAttributes() ?>>
<span id="el_social_welfare_programs_created_at">
<span<?= $Page->created_at->viewAttributes() ?>>
<?= $Page->created_at->getViewValue() ?></span>
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
