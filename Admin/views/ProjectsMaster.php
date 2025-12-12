<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Table
$projects = Container("projects");
$projects->TableClass = "table table-bordered table-hover table-sm ew-table ew-master-table";
?>
<?php if ($projects->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_projectsmaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($projects->id->Visible) { // id ?>
        <tr id="r_id"<?= $projects->id->rowAttributes() ?>>
            <td class="<?= $projects->TableLeftColumnClass ?>"><?= $projects->id->caption() ?></td>
            <td<?= $projects->id->cellAttributes() ?>>
<span id="el_projects_id">
<span<?= $projects->id->viewAttributes() ?>>
<?= $projects->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($projects->_title->Visible) { // title ?>
        <tr id="r__title"<?= $projects->_title->rowAttributes() ?>>
            <td class="<?= $projects->TableLeftColumnClass ?>"><?= $projects->_title->caption() ?></td>
            <td<?= $projects->_title->cellAttributes() ?>>
<span id="el_projects__title">
<span<?= $projects->_title->viewAttributes() ?>>
<?= $projects->_title->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($projects->category_id->Visible) { // category_id ?>
        <tr id="r_category_id"<?= $projects->category_id->rowAttributes() ?>>
            <td class="<?= $projects->TableLeftColumnClass ?>"><?= $projects->category_id->caption() ?></td>
            <td<?= $projects->category_id->cellAttributes() ?>>
<span id="el_projects_category_id">
<span<?= $projects->category_id->viewAttributes() ?>>
<?= $projects->category_id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($projects->project_number->Visible) { // project_number ?>
        <tr id="r_project_number"<?= $projects->project_number->rowAttributes() ?>>
            <td class="<?= $projects->TableLeftColumnClass ?>"><?= $projects->project_number->caption() ?></td>
            <td<?= $projects->project_number->cellAttributes() ?>>
<span id="el_projects_project_number">
<span<?= $projects->project_number->viewAttributes() ?>>
<?= $projects->project_number->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($projects->featured_image->Visible) { // featured_image ?>
        <tr id="r_featured_image"<?= $projects->featured_image->rowAttributes() ?>>
            <td class="<?= $projects->TableLeftColumnClass ?>"><?= $projects->featured_image->caption() ?></td>
            <td<?= $projects->featured_image->cellAttributes() ?>>
<span id="el_projects_featured_image">
<span>
<?= GetFileViewTag($projects->featured_image, $projects->featured_image->getViewValue(), false) ?>
</span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($projects->is_featured->Visible) { // is_featured ?>
        <tr id="r_is_featured"<?= $projects->is_featured->rowAttributes() ?>>
            <td class="<?= $projects->TableLeftColumnClass ?>"><?= $projects->is_featured->caption() ?></td>
            <td<?= $projects->is_featured->cellAttributes() ?>>
<span id="el_projects_is_featured">
<span<?= $projects->is_featured->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($projects->is_featured->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($projects->status->Visible) { // status ?>
        <tr id="r_status"<?= $projects->status->rowAttributes() ?>>
            <td class="<?= $projects->TableLeftColumnClass ?>"><?= $projects->status->caption() ?></td>
            <td<?= $projects->status->cellAttributes() ?>>
<span id="el_projects_status">
<span<?= $projects->status->viewAttributes() ?>>
<?= $projects->status->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($projects->municipality->Visible) { // municipality ?>
        <tr id="r_municipality"<?= $projects->municipality->rowAttributes() ?>>
            <td class="<?= $projects->TableLeftColumnClass ?>"><?= $projects->municipality->caption() ?></td>
            <td<?= $projects->municipality->cellAttributes() ?>>
<span id="el_projects_municipality">
<span<?= $projects->municipality->viewAttributes() ?>>
<?= $projects->municipality->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
