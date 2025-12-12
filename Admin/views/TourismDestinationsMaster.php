<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Table
$tourism_destinations = Container("tourism_destinations");
$tourism_destinations->TableClass = "table table-bordered table-hover table-sm ew-table ew-master-table";
?>
<?php if ($tourism_destinations->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_tourism_destinationsmaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($tourism_destinations->id->Visible) { // id ?>
        <tr id="r_id"<?= $tourism_destinations->id->rowAttributes() ?>>
            <td class="<?= $tourism_destinations->TableLeftColumnClass ?>"><?= $tourism_destinations->id->caption() ?></td>
            <td<?= $tourism_destinations->id->cellAttributes() ?>>
<span id="el_tourism_destinations_id">
<span<?= $tourism_destinations->id->viewAttributes() ?>>
<?= $tourism_destinations->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($tourism_destinations->category_id->Visible) { // category_id ?>
        <tr id="r_category_id"<?= $tourism_destinations->category_id->rowAttributes() ?>>
            <td class="<?= $tourism_destinations->TableLeftColumnClass ?>"><?= $tourism_destinations->category_id->caption() ?></td>
            <td<?= $tourism_destinations->category_id->cellAttributes() ?>>
<span id="el_tourism_destinations_category_id">
<span<?= $tourism_destinations->category_id->viewAttributes() ?>>
<?= $tourism_destinations->category_id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($tourism_destinations->name->Visible) { // name ?>
        <tr id="r_name"<?= $tourism_destinations->name->rowAttributes() ?>>
            <td class="<?= $tourism_destinations->TableLeftColumnClass ?>"><?= $tourism_destinations->name->caption() ?></td>
            <td<?= $tourism_destinations->name->cellAttributes() ?>>
<span id="el_tourism_destinations_name">
<span<?= $tourism_destinations->name->viewAttributes() ?>>
<?= $tourism_destinations->name->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($tourism_destinations->municipality->Visible) { // municipality ?>
        <tr id="r_municipality"<?= $tourism_destinations->municipality->rowAttributes() ?>>
            <td class="<?= $tourism_destinations->TableLeftColumnClass ?>"><?= $tourism_destinations->municipality->caption() ?></td>
            <td<?= $tourism_destinations->municipality->cellAttributes() ?>>
<span id="el_tourism_destinations_municipality">
<span<?= $tourism_destinations->municipality->viewAttributes() ?>>
<?= $tourism_destinations->municipality->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($tourism_destinations->coordinates->Visible) { // coordinates ?>
        <tr id="r_coordinates"<?= $tourism_destinations->coordinates->rowAttributes() ?>>
            <td class="<?= $tourism_destinations->TableLeftColumnClass ?>"><?= $tourism_destinations->coordinates->caption() ?></td>
            <td<?= $tourism_destinations->coordinates->cellAttributes() ?>>
<span id="el_tourism_destinations_coordinates">
<span<?= $tourism_destinations->coordinates->viewAttributes() ?>>
<?= $tourism_destinations->coordinates->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($tourism_destinations->entry_fee->Visible) { // entry_fee ?>
        <tr id="r_entry_fee"<?= $tourism_destinations->entry_fee->rowAttributes() ?>>
            <td class="<?= $tourism_destinations->TableLeftColumnClass ?>"><?= $tourism_destinations->entry_fee->caption() ?></td>
            <td<?= $tourism_destinations->entry_fee->cellAttributes() ?>>
<span id="el_tourism_destinations_entry_fee">
<span<?= $tourism_destinations->entry_fee->viewAttributes() ?>>
<?= $tourism_destinations->entry_fee->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($tourism_destinations->operating_hours->Visible) { // operating_hours ?>
        <tr id="r_operating_hours"<?= $tourism_destinations->operating_hours->rowAttributes() ?>>
            <td class="<?= $tourism_destinations->TableLeftColumnClass ?>"><?= $tourism_destinations->operating_hours->caption() ?></td>
            <td<?= $tourism_destinations->operating_hours->cellAttributes() ?>>
<span id="el_tourism_destinations_operating_hours">
<span<?= $tourism_destinations->operating_hours->viewAttributes() ?>>
<?= $tourism_destinations->operating_hours->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($tourism_destinations->best_time_to_visit->Visible) { // best_time_to_visit ?>
        <tr id="r_best_time_to_visit"<?= $tourism_destinations->best_time_to_visit->rowAttributes() ?>>
            <td class="<?= $tourism_destinations->TableLeftColumnClass ?>"><?= $tourism_destinations->best_time_to_visit->caption() ?></td>
            <td<?= $tourism_destinations->best_time_to_visit->cellAttributes() ?>>
<span id="el_tourism_destinations_best_time_to_visit">
<span<?= $tourism_destinations->best_time_to_visit->viewAttributes() ?>>
<?= $tourism_destinations->best_time_to_visit->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($tourism_destinations->featured_image->Visible) { // featured_image ?>
        <tr id="r_featured_image"<?= $tourism_destinations->featured_image->rowAttributes() ?>>
            <td class="<?= $tourism_destinations->TableLeftColumnClass ?>"><?= $tourism_destinations->featured_image->caption() ?></td>
            <td<?= $tourism_destinations->featured_image->cellAttributes() ?>>
<span id="el_tourism_destinations_featured_image">
<span>
<?= GetFileViewTag($tourism_destinations->featured_image, $tourism_destinations->featured_image->getViewValue(), false) ?>
</span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($tourism_destinations->is_featured->Visible) { // is_featured ?>
        <tr id="r_is_featured"<?= $tourism_destinations->is_featured->rowAttributes() ?>>
            <td class="<?= $tourism_destinations->TableLeftColumnClass ?>"><?= $tourism_destinations->is_featured->caption() ?></td>
            <td<?= $tourism_destinations->is_featured->cellAttributes() ?>>
<span id="el_tourism_destinations_is_featured">
<span<?= $tourism_destinations->is_featured->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($tourism_destinations->is_featured->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($tourism_destinations->is_active->Visible) { // is_active ?>
        <tr id="r_is_active"<?= $tourism_destinations->is_active->rowAttributes() ?>>
            <td class="<?= $tourism_destinations->TableLeftColumnClass ?>"><?= $tourism_destinations->is_active->caption() ?></td>
            <td<?= $tourism_destinations->is_active->cellAttributes() ?>>
<span id="el_tourism_destinations_is_active">
<span<?= $tourism_destinations->is_active->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($tourism_destinations->is_active->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($tourism_destinations->created_at->Visible) { // created_at ?>
        <tr id="r_created_at"<?= $tourism_destinations->created_at->rowAttributes() ?>>
            <td class="<?= $tourism_destinations->TableLeftColumnClass ?>"><?= $tourism_destinations->created_at->caption() ?></td>
            <td<?= $tourism_destinations->created_at->cellAttributes() ?>>
<span id="el_tourism_destinations_created_at">
<span<?= $tourism_destinations->created_at->viewAttributes() ?>>
<?= $tourism_destinations->created_at->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
