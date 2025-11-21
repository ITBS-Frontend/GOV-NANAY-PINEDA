<?php
/**
 * PHPMaker 2024 User Level Settings
 */
namespace PHPMaker2024\Gov_Nanay_Pineda;

/**
 * User levels
 *
 * @var array<int, string>
 * [0] int User level ID
 * [1] string User level name
 */
$USER_LEVELS = [["-2","Anonymous"],
    ["0","Default"]];

/**
 * User level permissions
 *
 * @var array<string, int, int>
 * [0] string Project ID + Table name
 * [1] int User level ID
 * [2] int Permissions
 */
$USER_LEVEL_PRIVS = [["{05BA416D-6E12-4581-9EFA-04B8838F18C5}categories","-2","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}categories","0","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}political_journey","-2","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}political_journey","0","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}project_stats","-2","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}project_stats","0","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}projects","-2","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}projects","0","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}user_levels","-2","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}user_levels","0","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}user_permissions","-2","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}user_permissions","0","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}users","-2","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}users","0","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}main.php","-2","72"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}main.php","0","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}about_content","-2","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}about_content","0","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}achievements","-2","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}achievements","0","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}profile_details","-2","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}profile_details","0","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}profile_images","-2","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}profile_images","0","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}project_gallery","-2","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}project_gallery","0","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}project_highlights","-2","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}project_highlights","0","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}news_categories","-2","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}news_categories","0","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}news_post_tags","-2","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}news_post_tags","0","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}news_posts","-2","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}news_posts","0","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}news_tags","-2","0"],
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}news_tags","0","0"]];

/**
 * Tables
 *
 * @var array<string, string, string, bool, string>
 * [0] string Table name
 * [1] string Table variable name
 * [2] string Table caption
 * [3] bool Allowed for update (for userpriv.php)
 * [4] string Project ID
 * [5] string URL (for OthersController::index)
 */
$USER_LEVEL_TABLES = [["categories","categories","categories",true,"{05BA416D-6E12-4581-9EFA-04B8838F18C5}","CategoriesList"],
    ["political_journey","political_journey","political journey",true,"{05BA416D-6E12-4581-9EFA-04B8838F18C5}","PoliticalJourneyList"],
    ["project_stats","project_stats","project stats",true,"{05BA416D-6E12-4581-9EFA-04B8838F18C5}","ProjectStatsList"],
    ["projects","projects","projects",true,"{05BA416D-6E12-4581-9EFA-04B8838F18C5}","ProjectsList"],
    ["user_levels","_user_levels","user levels",true,"{05BA416D-6E12-4581-9EFA-04B8838F18C5}","UserLevelsList"],
    ["user_permissions","user_permissions","user permissions",true,"{05BA416D-6E12-4581-9EFA-04B8838F18C5}","UserPermissionsList"],
    ["users","users","users",true,"{05BA416D-6E12-4581-9EFA-04B8838F18C5}","UsersList"],
    ["main.php","main","main",true,"{05BA416D-6E12-4581-9EFA-04B8838F18C5}","Main"],
    ["about_content","about_content","about content",true,"{05BA416D-6E12-4581-9EFA-04B8838F18C5}","AboutContentList"],
    ["achievements","achievements","achievements",true,"{05BA416D-6E12-4581-9EFA-04B8838F18C5}","AchievementsList"],
    ["profile_details","profile_details","profile details",true,"{05BA416D-6E12-4581-9EFA-04B8838F18C5}","ProfileDetailsList"],
    ["profile_images","profile_images","profile images",true,"{05BA416D-6E12-4581-9EFA-04B8838F18C5}","ProfileImagesList"],
    ["project_gallery","project_gallery","project gallery",true,"{05BA416D-6E12-4581-9EFA-04B8838F18C5}","ProjectGalleryList"],
    ["project_highlights","project_highlights","project highlights",true,"{05BA416D-6E12-4581-9EFA-04B8838F18C5}","ProjectHighlightsList"],
    ["news_categories","news_categories","news categories",true,"{05BA416D-6E12-4581-9EFA-04B8838F18C5}","NewsCategoriesList"],
    ["news_post_tags","news_post_tags","news post tags",true,"{05BA416D-6E12-4581-9EFA-04B8838F18C5}","NewsPostTagsList"],
    ["news_posts","news_posts","news posts",true,"{05BA416D-6E12-4581-9EFA-04B8838F18C5}","NewsPostsList"],
    ["news_tags","news_tags","news tags",true,"{05BA416D-6E12-4581-9EFA-04B8838F18C5}","NewsTagsList"]];
