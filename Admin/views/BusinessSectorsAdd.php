<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$BusinessSectorsAdd = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { business_sectors: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fbusiness_sectorsadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fbusiness_sectorsadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["sector_name", [fields.sector_name.visible && fields.sector_name.required ? ew.Validators.required(fields.sector_name.caption) : null], fields.sector_name.isInvalid],
            ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
            ["number_of_establishments", [fields.number_of_establishments.visible && fields.number_of_establishments.required ? ew.Validators.required(fields.number_of_establishments.caption) : null, ew.Validators.integer], fields.number_of_establishments.isInvalid],
            ["employment_generated", [fields.employment_generated.visible && fields.employment_generated.required ? ew.Validators.required(fields.employment_generated.caption) : null, ew.Validators.integer], fields.employment_generated.isInvalid],
            ["contribution_to_gdp", [fields.contribution_to_gdp.visible && fields.contribution_to_gdp.required ? ew.Validators.required(fields.contribution_to_gdp.caption) : null, ew.Validators.float], fields.contribution_to_gdp.isInvalid],
            ["icon_class", [fields.icon_class.visible && fields.icon_class.required ? ew.Validators.required(fields.icon_class.caption) : null], fields.icon_class.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null], fields.created_at.isInvalid]
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
<form name="fbusiness_sectorsadd" id="fbusiness_sectorsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="business_sectors">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->sector_name->Visible) { // sector_name ?>
    <div id="r_sector_name"<?= $Page->sector_name->rowAttributes() ?>>
        <label id="elh_business_sectors_sector_name" for="x_sector_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->sector_name->caption() ?><?= $Page->sector_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->sector_name->cellAttributes() ?>>
<span id="el_business_sectors_sector_name">
<input type="<?= $Page->sector_name->getInputTextType() ?>" name="x_sector_name" id="x_sector_name" data-table="business_sectors" data-field="x_sector_name" value="<?= $Page->sector_name->EditValue ?>" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->sector_name->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->sector_name->formatPattern()) ?>"<?= $Page->sector_name->editAttributes() ?> aria-describedby="x_sector_name_help">
<?= $Page->sector_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->sector_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description"<?= $Page->description->rowAttributes() ?>>
        <label id="elh_business_sectors_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->description->cellAttributes() ?>>
<span id="el_business_sectors_description">
<textarea data-table="business_sectors" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->number_of_establishments->Visible) { // number_of_establishments ?>
    <div id="r_number_of_establishments"<?= $Page->number_of_establishments->rowAttributes() ?>>
        <label id="elh_business_sectors_number_of_establishments" for="x_number_of_establishments" class="<?= $Page->LeftColumnClass ?>"><?= $Page->number_of_establishments->caption() ?><?= $Page->number_of_establishments->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->number_of_establishments->cellAttributes() ?>>
<span id="el_business_sectors_number_of_establishments">
<input type="<?= $Page->number_of_establishments->getInputTextType() ?>" name="x_number_of_establishments" id="x_number_of_establishments" data-table="business_sectors" data-field="x_number_of_establishments" value="<?= $Page->number_of_establishments->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->number_of_establishments->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->number_of_establishments->formatPattern()) ?>"<?= $Page->number_of_establishments->editAttributes() ?> aria-describedby="x_number_of_establishments_help">
<?= $Page->number_of_establishments->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->number_of_establishments->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->employment_generated->Visible) { // employment_generated ?>
    <div id="r_employment_generated"<?= $Page->employment_generated->rowAttributes() ?>>
        <label id="elh_business_sectors_employment_generated" for="x_employment_generated" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employment_generated->caption() ?><?= $Page->employment_generated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->employment_generated->cellAttributes() ?>>
<span id="el_business_sectors_employment_generated">
<input type="<?= $Page->employment_generated->getInputTextType() ?>" name="x_employment_generated" id="x_employment_generated" data-table="business_sectors" data-field="x_employment_generated" value="<?= $Page->employment_generated->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->employment_generated->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->employment_generated->formatPattern()) ?>"<?= $Page->employment_generated->editAttributes() ?> aria-describedby="x_employment_generated_help">
<?= $Page->employment_generated->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employment_generated->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->contribution_to_gdp->Visible) { // contribution_to_gdp ?>
    <div id="r_contribution_to_gdp"<?= $Page->contribution_to_gdp->rowAttributes() ?>>
        <label id="elh_business_sectors_contribution_to_gdp" for="x_contribution_to_gdp" class="<?= $Page->LeftColumnClass ?>"><?= $Page->contribution_to_gdp->caption() ?><?= $Page->contribution_to_gdp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->contribution_to_gdp->cellAttributes() ?>>
<span id="el_business_sectors_contribution_to_gdp">
<input type="<?= $Page->contribution_to_gdp->getInputTextType() ?>" name="x_contribution_to_gdp" id="x_contribution_to_gdp" data-table="business_sectors" data-field="x_contribution_to_gdp" value="<?= $Page->contribution_to_gdp->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->contribution_to_gdp->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->contribution_to_gdp->formatPattern()) ?>"<?= $Page->contribution_to_gdp->editAttributes() ?> aria-describedby="x_contribution_to_gdp_help">
<?= $Page->contribution_to_gdp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->contribution_to_gdp->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->icon_class->Visible) { // icon_class ?>
    <div id="r_icon_class"<?= $Page->icon_class->rowAttributes() ?>>
        <label id="elh_business_sectors_icon_class" for="x_icon_class" class="<?= $Page->LeftColumnClass ?>"><?= $Page->icon_class->caption() ?><?= $Page->icon_class->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->icon_class->cellAttributes() ?>>
<span id="el_business_sectors_icon_class">
<input type="<?= $Page->icon_class->getInputTextType() ?>" name="x_icon_class" id="x_icon_class" data-table="business_sectors" data-field="x_icon_class" value="<?= $Page->icon_class->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->icon_class->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->icon_class->formatPattern()) ?>"<?= $Page->icon_class->editAttributes() ?> aria-describedby="x_icon_class_help">
<?= $Page->icon_class->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->icon_class->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fbusiness_sectorsadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fbusiness_sectorsadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("business_sectors");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
