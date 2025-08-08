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
    ["{05BA416D-6E12-4581-9EFA-04B8838F18C5}main.php","0","0"]];

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
    ["main.php","main","main",true,"{05BA416D-6E12-4581-9EFA-04B8838F18C5}","Main"]];
