<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

// Navbar menu
$topMenu = new Menu("navbar", true, true);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", true, false);
$sideMenu->addMenuItem(44, "mci_News_Article", $Language->menuPhrase("44", "MenuText"), "", -1, "", true, false, true, "", "", false, true);
$sideMenu->addMenuItem(27, "mi_news_posts", $Language->menuPhrase("27", "MenuText"), "NewsPostsList", 44, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}news_posts'), false, false, "", "", false, true);
$sideMenu->addMenuItem(25, "mi_news_categories", $Language->menuPhrase("25", "MenuText"), "NewsCategoriesList", 44, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}news_categories'), false, false, "", "", false, true);
$sideMenu->addMenuItem(26, "mi_news_post_tags", $Language->menuPhrase("26", "MenuText"), "NewsPostTagsList", 44, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}news_post_tags'), false, false, "", "", false, true);
$sideMenu->addMenuItem(28, "mi_news_tags", $Language->menuPhrase("28", "MenuText"), "NewsTagsList", 44, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}news_tags'), false, false, "", "", false, true);
$sideMenu->addMenuItem(24, "mci_Projects", $Language->menuPhrase("24", "MenuText"), "", -1, "", true, false, true, "", "", false, true);
$sideMenu->addMenuItem(4, "mi_projects", $Language->menuPhrase("4", "MenuText"), "ProjectsList", 24, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}projects'), false, false, "", "", false, true);
$sideMenu->addMenuItem(14, "mi_project_gallery", $Language->menuPhrase("14", "MenuText"), "ProjectGalleryList", 24, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}project_gallery'), false, false, "", "", false, true);
$sideMenu->addMenuItem(15, "mi_project_highlights", $Language->menuPhrase("15", "MenuText"), "ProjectHighlightsList", 24, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}project_highlights'), false, false, "", "", false, true);
$sideMenu->addMenuItem(1, "mi_categories", $Language->menuPhrase("1", "MenuText"), "CategoriesList", -1, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}categories'), false, false, "", "", false, true);
$sideMenu->addMenuItem(2, "mi_political_journey", $Language->menuPhrase("2", "MenuText"), "PoliticalJourneyList", -1, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}political_journey'), false, false, "", "", false, true);
$sideMenu->addMenuItem(13, "mci_About_Section", $Language->menuPhrase("13", "MenuText"), "", -1, "", true, false, true, "", "", false, true);
$sideMenu->addMenuItem(11, "mi_profile_details", $Language->menuPhrase("11", "MenuText"), "ProfileDetailsList", 13, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}profile_details'), false, false, "", "", false, true);
$sideMenu->addMenuItem(12, "mi_profile_images", $Language->menuPhrase("12", "MenuText"), "ProfileImagesList", 13, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}profile_images'), false, false, "", "", false, true);
$sideMenu->addMenuItem(9, "mi_about_content", $Language->menuPhrase("9", "MenuText"), "AboutContentList", 13, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}about_content'), false, false, "", "", false, true);
$sideMenu->addMenuItem(10, "mi_achievements", $Language->menuPhrase("10", "MenuText"), "AchievementsList", 13, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}achievements'), false, false, "", "", false, true);
$sideMenu->addMenuItem(5, "mi__user_levels", $Language->menuPhrase("5", "MenuText"), "UserLevelsList", -1, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}user_levels'), false, false, "", "", false, true);
$sideMenu->addMenuItem(6, "mi_user_permissions", $Language->menuPhrase("6", "MenuText"), "UserPermissionsList", -1, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}user_permissions'), false, false, "", "", false, true);
$sideMenu->addMenuItem(7, "mi_users", $Language->menuPhrase("7", "MenuText"), "UsersList", -1, "", AllowListMenu('{05BA416D-6E12-4581-9EFA-04B8838F18C5}users'), false, false, "", "", false, true);
echo $sideMenu->toScript();
