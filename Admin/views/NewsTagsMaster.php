<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Table
$news_tags = Container("news_tags");
$news_tags->TableClass = "table table-bordered table-hover table-sm ew-table ew-master-table";
?>
<?php if ($news_tags->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_news_tagsmaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($news_tags->id->Visible) { // id ?>
        <tr id="r_id"<?= $news_tags->id->rowAttributes() ?>>
            <td class="<?= $news_tags->TableLeftColumnClass ?>"><?= $news_tags->id->caption() ?></td>
            <td<?= $news_tags->id->cellAttributes() ?>>
<span id="el_news_tags_id">
<span<?= $news_tags->id->viewAttributes() ?>>
<?= $news_tags->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($news_tags->name->Visible) { // name ?>
        <tr id="r_name"<?= $news_tags->name->rowAttributes() ?>>
            <td class="<?= $news_tags->TableLeftColumnClass ?>"><?= $news_tags->name->caption() ?></td>
            <td<?= $news_tags->name->cellAttributes() ?>>
<span id="el_news_tags_name">
<span<?= $news_tags->name->viewAttributes() ?>>
<?= $news_tags->name->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($news_tags->slug->Visible) { // slug ?>
        <tr id="r_slug"<?= $news_tags->slug->rowAttributes() ?>>
            <td class="<?= $news_tags->TableLeftColumnClass ?>"><?= $news_tags->slug->caption() ?></td>
            <td<?= $news_tags->slug->cellAttributes() ?>>
<span id="el_news_tags_slug">
<span<?= $news_tags->slug->viewAttributes() ?>>
<?= $news_tags->slug->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($news_tags->created_at->Visible) { // created_at ?>
        <tr id="r_created_at"<?= $news_tags->created_at->rowAttributes() ?>>
            <td class="<?= $news_tags->TableLeftColumnClass ?>"><?= $news_tags->created_at->caption() ?></td>
            <td<?= $news_tags->created_at->cellAttributes() ?>>
<span id="el_news_tags_created_at">
<span<?= $news_tags->created_at->viewAttributes() ?>>
<?= $news_tags->created_at->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
