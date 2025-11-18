<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Navbar menu
$topMenu = new Menu("navbar", true, true);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", true, false);
$sideMenu->addMenuItem(1, "mi_categories", $Language->menuPhrase("1", "MenuText"), "CategoriesList", -1, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}categories'), false, false, "", "", false, true);
$sideMenu->addMenuItem(2, "mi_political_journey", $Language->menuPhrase("2", "MenuText"), "PoliticalJourneyList", -1, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}political_journey'), false, false, "", "", false, true);
$sideMenu->addMenuItem(4, "mi_projects", $Language->menuPhrase("4", "MenuText"), "ProjectsList", -1, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}projects'), false, false, "", "", false, true);
$sideMenu->addMenuItem(5, "mi__user_levels", $Language->menuPhrase("5", "MenuText"), "UserLevelsList", -1, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}user_levels'), false, false, "", "", false, true);
$sideMenu->addMenuItem(6, "mi_user_permissions", $Language->menuPhrase("6", "MenuText"), "UserPermissionsList", -1, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}user_permissions'), false, false, "", "", false, true);
$sideMenu->addMenuItem(7, "mi_users", $Language->menuPhrase("7", "MenuText"), "UsersList", -1, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}users'), false, false, "", "", false, true);
echo $sideMenu->toScript();
