<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Table
$news_posts = Container("news_posts");
$news_posts->TableClass = "table table-bordered table-hover table-sm ew-table ew-master-table";
?>
<?php if ($news_posts->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_news_postsmaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($news_posts->id->Visible) { // id ?>
        <tr id="r_id"<?= $news_posts->id->rowAttributes() ?>>
            <td class="<?= $news_posts->TableLeftColumnClass ?>"><?= $news_posts->id->caption() ?></td>
            <td<?= $news_posts->id->cellAttributes() ?>>
<span id="el_news_posts_id">
<span<?= $news_posts->id->viewAttributes() ?>>
<?= $news_posts->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($news_posts->_title->Visible) { // title ?>
        <tr id="r__title"<?= $news_posts->_title->rowAttributes() ?>>
            <td class="<?= $news_posts->TableLeftColumnClass ?>"><?= $news_posts->_title->caption() ?></td>
            <td<?= $news_posts->_title->cellAttributes() ?>>
<span id="el_news_posts__title">
<span<?= $news_posts->_title->viewAttributes() ?>>
<?= $news_posts->_title->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($news_posts->category_id->Visible) { // category_id ?>
        <tr id="r_category_id"<?= $news_posts->category_id->rowAttributes() ?>>
            <td class="<?= $news_posts->TableLeftColumnClass ?>"><?= $news_posts->category_id->caption() ?></td>
            <td<?= $news_posts->category_id->cellAttributes() ?>>
<span id="el_news_posts_category_id">
<span<?= $news_posts->category_id->viewAttributes() ?>>
<?= $news_posts->category_id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($news_posts->featured_image->Visible) { // featured_image ?>
        <tr id="r_featured_image"<?= $news_posts->featured_image->rowAttributes() ?>>
            <td class="<?= $news_posts->TableLeftColumnClass ?>"><?= $news_posts->featured_image->caption() ?></td>
            <td<?= $news_posts->featured_image->cellAttributes() ?>>
<span id="el_news_posts_featured_image">
<span>
<?= GetFileViewTag($news_posts->featured_image, $news_posts->featured_image->getViewValue(), false) ?>
</span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($news_posts->author_name->Visible) { // author_name ?>
        <tr id="r_author_name"<?= $news_posts->author_name->rowAttributes() ?>>
            <td class="<?= $news_posts->TableLeftColumnClass ?>"><?= $news_posts->author_name->caption() ?></td>
            <td<?= $news_posts->author_name->cellAttributes() ?>>
<span id="el_news_posts_author_name">
<span<?= $news_posts->author_name->viewAttributes() ?>>
<?= $news_posts->author_name->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($news_posts->is_featured->Visible) { // is_featured ?>
        <tr id="r_is_featured"<?= $news_posts->is_featured->rowAttributes() ?>>
            <td class="<?= $news_posts->TableLeftColumnClass ?>"><?= $news_posts->is_featured->caption() ?></td>
            <td<?= $news_posts->is_featured->cellAttributes() ?>>
<span id="el_news_posts_is_featured">
<span<?= $news_posts->is_featured->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($news_posts->is_featured->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($news_posts->is_published->Visible) { // is_published ?>
        <tr id="r_is_published"<?= $news_posts->is_published->rowAttributes() ?>>
            <td class="<?= $news_posts->TableLeftColumnClass ?>"><?= $news_posts->is_published->caption() ?></td>
            <td<?= $news_posts->is_published->cellAttributes() ?>>
<span id="el_news_posts_is_published">
<span<?= $news_posts->is_published->viewAttributes() ?>>
<i class="fa-regular fa-square<?php if (ConvertToBool($news_posts->is_published->CurrentValue)) { ?>-check<?php } ?> ew-icon ew-boolean"></i>
</span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($news_posts->published_date->Visible) { // published_date ?>
        <tr id="r_published_date"<?= $news_posts->published_date->rowAttributes() ?>>
            <td class="<?= $news_posts->TableLeftColumnClass ?>"><?= $news_posts->published_date->caption() ?></td>
            <td<?= $news_posts->published_date->cellAttributes() ?>>
<span id="el_news_posts_published_date">
<span<?= $news_posts->published_date->viewAttributes() ?>>
<?= $news_posts->published_date->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
