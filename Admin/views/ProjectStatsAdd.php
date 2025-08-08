<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$ProjectStatsAdd = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { project_stats: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fproject_statsadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fproject_statsadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["project_id", [fields.project_id.visible && fields.project_id.required ? ew.Validators.required(fields.project_id.caption) : null, ew.Validators.integer], fields.project_id.isInvalid],
            ["stat_label", [fields.stat_label.visible && fields.stat_label.required ? ew.Validators.required(fields.stat_label.caption) : null], fields.stat_label.isInvalid],
            ["stat_value", [fields.stat_value.visible && fields.stat_value.required ? ew.Validators.required(fields.stat_value.caption) : null], fields.stat_value.isInvalid],
            ["stat_description", [fields.stat_description.visible && fields.stat_description.required ? ew.Validators.required(fields.stat_description.caption) : null], fields.stat_description.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null, ew.Validators.datetime(fields.created_at.clientFormatPattern)], fields.created_at.isInvalid]
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
<form name="fproject_statsadd" id="fproject_statsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="project_stats">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->project_id->Visible) { // project_id ?>
    <div id="r_project_id"<?= $Page->project_id->rowAttributes() ?>>
        <label id="elh_project_stats_project_id" for="x_project_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->project_id->caption() ?><?= $Page->project_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->project_id->cellAttributes() ?>>
<span id="el_project_stats_project_id">
<input type="<?= $Page->project_id->getInputTextType() ?>" name="x_project_id" id="x_project_id" data-table="project_stats" data-field="x_project_id" value="<?= $Page->project_id->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->project_id->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->project_id->formatPattern()) ?>"<?= $Page->project_id->editAttributes() ?> aria-describedby="x_project_id_help">
<?= $Page->project_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->project_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->stat_label->Visible) { // stat_label ?>
    <div id="r_stat_label"<?= $Page->stat_label->rowAttributes() ?>>
        <label id="elh_project_stats_stat_label" for="x_stat_label" class="<?= $Page->LeftColumnClass ?>"><?= $Page->stat_label->caption() ?><?= $Page->stat_label->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->stat_label->cellAttributes() ?>>
<span id="el_project_stats_stat_label">
<input type="<?= $Page->stat_label->getInputTextType() ?>" name="x_stat_label" id="x_stat_label" data-table="project_stats" data-field="x_stat_label" value="<?= $Page->stat_label->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->stat_label->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->stat_label->formatPattern()) ?>"<?= $Page->stat_label->editAttributes() ?> aria-describedby="x_stat_label_help">
<?= $Page->stat_label->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->stat_label->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->stat_value->Visible) { // stat_value ?>
    <div id="r_stat_value"<?= $Page->stat_value->rowAttributes() ?>>
        <label id="elh_project_stats_stat_value" for="x_stat_value" class="<?= $Page->LeftColumnClass ?>"><?= $Page->stat_value->caption() ?><?= $Page->stat_value->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->stat_value->cellAttributes() ?>>
<span id="el_project_stats_stat_value">
<input type="<?= $Page->stat_value->getInputTextType() ?>" name="x_stat_value" id="x_stat_value" data-table="project_stats" data-field="x_stat_value" value="<?= $Page->stat_value->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->stat_value->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->stat_value->formatPattern()) ?>"<?= $Page->stat_value->editAttributes() ?> aria-describedby="x_stat_value_help">
<?= $Page->stat_value->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->stat_value->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->stat_description->Visible) { // stat_description ?>
    <div id="r_stat_description"<?= $Page->stat_description->rowAttributes() ?>>
        <label id="elh_project_stats_stat_description" for="x_stat_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->stat_description->caption() ?><?= $Page->stat_description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->stat_description->cellAttributes() ?>>
<span id="el_project_stats_stat_description">
<input type="<?= $Page->stat_description->getInputTextType() ?>" name="x_stat_description" id="x_stat_description" data-table="project_stats" data-field="x_stat_description" value="<?= $Page->stat_description->EditValue ?>" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->stat_description->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->stat_description->formatPattern()) ?>"<?= $Page->stat_description->editAttributes() ?> aria-describedby="x_stat_description_help">
<?= $Page->stat_description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->stat_description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created_at->Visible) { // created_at ?>
    <div id="r_created_at"<?= $Page->created_at->rowAttributes() ?>>
        <label id="elh_project_stats_created_at" for="x_created_at" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created_at->caption() ?><?= $Page->created_at->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->created_at->cellAttributes() ?>>
<span id="el_project_stats_created_at">
<input type="<?= $Page->created_at->getInputTextType() ?>" name="x_created_at" id="x_created_at" data-table="project_stats" data-field="x_created_at" value="<?= $Page->created_at->EditValue ?>" placeholder="<?= HtmlEncode($Page->created_at->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->created_at->formatPattern()) ?>"<?= $Page->created_at->editAttributes() ?> aria-describedby="x_created_at_help">
<?= $Page->created_at->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created_at->getErrorMessage() ?></div>
<?php if (!$Page->created_at->ReadOnly && !$Page->created_at->Disabled && !isset($Page->created_at->EditAttrs["readonly"]) && !isset($Page->created_at->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fproject_statsadd", "datetimepicker"], function () {
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
    ew.createDateTimePicker("fproject_statsadd", "x_created_at", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fproject_statsadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fproject_statsadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("project_stats");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
