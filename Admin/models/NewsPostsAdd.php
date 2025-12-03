<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

use Doctrine\DBAL\ParameterType;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Container\ContainerInterface;
use Slim\Routing\RouteCollectorProxy;
use Slim\App;
use Closure;

/**
 * Page class
 */
class NewsPostsAdd extends NewsPosts
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Page object name
    public $PageObjName = "NewsPostsAdd";

    // View file path
    public $View = null;

    // Title
    public $Title = null; // Title for <title> tag

    // Rendering View
    public $RenderingView = false;

    // CSS class/style
    public $CurrentPageName = "NewsPostsAdd";

    // Page headings
    public $Heading = "";
    public $Subheading = "";
    public $PageHeader;
    public $PageFooter;

    // Page layout
    public $UseLayout = true;

    // Page terminated
    private $terminated = false;

    // Page heading
    public function pageHeading()
    {
        global $Language;
        if ($this->Heading != "") {
            return $this->Heading;
        }
        if (method_exists($this, "tableCaption")) {
            return $this->tableCaption();
        }
        return "";
    }

    // Page subheading
    public function pageSubheading()
    {
        global $Language;
        if ($this->Subheading != "") {
            return $this->Subheading;
        }
        if ($this->TableName) {
            return $Language->phrase($this->PageID);
        }
        return "";
    }

    // Page name
    public function pageName()
    {
        return CurrentPageName();
    }

    // Page URL
    public function pageUrl($withArgs = true)
    {
        $route = GetRoute();
        $args = RemoveXss($route->getArguments());
        if (!$withArgs) {
            foreach ($args as $key => &$val) {
                $val = "";
            }
            unset($val);
        }
        return rtrim(UrlFor($route->getName(), $args), "/") . "?";
    }

    // Show Page Header
    public function showPageHeader()
    {
        $header = $this->PageHeader;
        $this->pageDataRendering($header);
        if ($header != "") { // Header exists, display
            echo '<div id="ew-page-header">' . $header . '</div>';
        }
    }

    // Show Page Footer
    public function showPageFooter()
    {
        $footer = $this->PageFooter;
        $this->pageDataRendered($footer);
        if ($footer != "") { // Footer exists, display
            echo '<div id="ew-page-footer">' . $footer . '</div>';
        }
    }

    // Set field visibility
    public function setVisibility()
    {
        $this->id->Visible = false;
        $this->_title->setVisibility();
        $this->slug->setVisibility();
        $this->excerpt->setVisibility();
        $this->_content->setVisibility();
        $this->category_id->setVisibility();
        $this->featured_image->setVisibility();
        $this->author_name->setVisibility();
        $this->is_featured->setVisibility();
        $this->is_published->setVisibility();
        $this->published_date->setVisibility();
        $this->views_count->setVisibility();
        $this->created_at->setVisibility();
        $this->updated_at->setVisibility();
        $this->news_type_id->setVisibility();
    }

    // Constructor
    public function __construct()
    {
        parent::__construct();
        global $Language, $DashboardReport, $DebugTimer, $UserTable;
        $this->TableVar = 'news_posts';
        $this->TableName = 'news_posts';

        // Table CSS class
        $this->TableClass = "table table-striped table-bordered table-hover table-sm ew-desktop-table ew-add-table";

        // Initialize
        $GLOBALS["Page"] = &$this;

        // Language object
        $Language = Container("app.language");

        // Table object (news_posts)
        if (!isset($GLOBALS["news_posts"]) || $GLOBALS["news_posts"]::class == PROJECT_NAMESPACE . "news_posts") {
            $GLOBALS["news_posts"] = &$this;
        }

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'news_posts');
        }

        // Start timer
        $DebugTimer = Container("debug.timer");

        // Debug message
        LoadDebugMessage();

        // Open connection
        $GLOBALS["Conn"] ??= $this->getConnection();

        // User table object
        $UserTable = Container("usertable");
    }

    // Get content from stream
    public function getContents(): string
    {
        global $Response;
        return $Response?->getBody() ?? ob_get_clean();
    }

    // Is lookup
    public function isLookup()
    {
        return SameText(Route(0), Config("API_LOOKUP_ACTION"));
    }

    // Is AutoFill
    public function isAutoFill()
    {
        return $this->isLookup() && SameText(Post("ajax"), "autofill");
    }

    // Is AutoSuggest
    public function isAutoSuggest()
    {
        return $this->isLookup() && SameText(Post("ajax"), "autosuggest");
    }

    // Is modal lookup
    public function isModalLookup()
    {
        return $this->isLookup() && SameText(Post("ajax"), "modal");
    }

    // Is terminated
    public function isTerminated()
    {
        return $this->terminated;
    }

    /**
     * Terminate page
     *
     * @param string $url URL for direction
     * @return void
     */
    public function terminate($url = "")
    {
        if ($this->terminated) {
            return;
        }
        global $TempImages, $DashboardReport, $Response;

        // Page is terminated
        $this->terminated = true;

        // Page Unload event
        if (method_exists($this, "pageUnload")) {
            $this->pageUnload();
        }
        DispatchEvent(new PageUnloadedEvent($this), PageUnloadedEvent::NAME);
        if (!IsApi() && method_exists($this, "pageRedirecting")) {
            $this->pageRedirecting($url);
        }

        // Close connection
        CloseConnections();

        // Return for API
        if (IsApi()) {
            $res = $url === true;
            if (!$res) { // Show response for API
                $ar = array_merge($this->getMessages(), $url ? ["url" => GetUrl($url)] : []);
                WriteJson($ar);
            }
            $this->clearMessages(); // Clear messages for API request
            return;
        } else { // Check if response is JSON
            if (WithJsonResponse()) { // With JSON response
                $this->clearMessages();
                return;
            }
        }

        // Go to URL if specified
        if ($url != "") {
            if (!Config("DEBUG") && ob_get_length()) {
                ob_end_clean();
            }

            // Handle modal response
            if ($this->IsModal) { // Show as modal
                $pageName = GetPageName($url);
                $result = ["url" => GetUrl($url), "modal" => "1"];  // Assume return to modal for simplicity
                if (
                    SameString($pageName, GetPageName($this->getListUrl())) ||
                    SameString($pageName, GetPageName($this->getViewUrl())) ||
                    SameString($pageName, GetPageName(CurrentMasterTable()?->getViewUrl() ?? ""))
                ) { // List / View / Master View page
                    if (!SameString($pageName, GetPageName($this->getListUrl()))) { // Not List page
                        $result["caption"] = $this->getModalCaption($pageName);
                        $result["view"] = SameString($pageName, "NewsPostsView"); // If View page, no primary button
                    } else { // List page
                        $result["error"] = $this->getFailureMessage(); // List page should not be shown as modal => error
                        $this->clearFailureMessage();
                    }
                } else { // Other pages (add messages and then clear messages)
                    $result = array_merge($this->getMessages(), ["modal" => "1"]);
                    $this->clearMessages();
                }
                WriteJson($result);
            } else {
                SaveDebugMessage();
                Redirect(GetUrl($url));
            }
        }
        return; // Return to controller
    }

    // Get records from result set
    protected function getRecordsFromRecordset($rs, $current = false)
    {
        $rows = [];
        if (is_object($rs)) { // Result set
            while ($row = $rs->fetch()) {
                $this->loadRowValues($row); // Set up DbValue/CurrentValue
                $this->featured_image->OldUploadPath = $this->featured_image->getUploadPath(); // PHP
                $this->featured_image->UploadPath = $this->featured_image->OldUploadPath;
                $row = $this->getRecordFromArray($row);
                if ($current) {
                    return $row;
                } else {
                    $rows[] = $row;
                }
            }
        } elseif (is_array($rs)) {
            foreach ($rs as $ar) {
                $row = $this->getRecordFromArray($ar);
                if ($current) {
                    return $row;
                } else {
                    $rows[] = $row;
                }
            }
        }
        return $rows;
    }

    // Get record from array
    protected function getRecordFromArray($ar)
    {
        $row = [];
        if (is_array($ar)) {
            foreach ($ar as $fldname => $val) {
                if (array_key_exists($fldname, $this->Fields) && ($this->Fields[$fldname]->Visible || $this->Fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
                    $fld = &$this->Fields[$fldname];
                    if ($fld->HtmlTag == "FILE") { // Upload field
                        if (EmptyValue($val)) {
                            $row[$fldname] = null;
                        } else {
                            if ($fld->DataType == DataType::BLOB) {
                                $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $fld->TableVar . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))));
                                $row[$fldname] = ["type" => ContentType($val), "url" => $url, "name" => $fld->Param . ContentExtension($val)];
                            } elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
                                $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $fld->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $val)));
                                $row[$fldname] = ["type" => MimeContentType($val), "url" => $url, "name" => $val];
                            } else { // Multiple files
                                $files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
                                $ar = [];
                                foreach ($files as $file) {
                                    $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                        "/" . $fld->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $file)));
                                    if (!EmptyValue($file)) {
                                        $ar[] = ["type" => MimeContentType($file), "url" => $url, "name" => $file];
                                    }
                                }
                                $row[$fldname] = $ar;
                            }
                        }
                    } else {
                        $row[$fldname] = $val;
                    }
                }
            }
        }
        return $row;
    }

    // Get record key value from array
    protected function getRecordKeyValue($ar)
    {
        $key = "";
        if (is_array($ar)) {
            $key .= @$ar['id'];
        }
        return $key;
    }

    /**
     * Hide fields for add/edit
     *
     * @return void
     */
    protected function hideFieldsForAddEdit()
    {
        if ($this->isAdd() || $this->isCopy() || $this->isGridAdd()) {
            $this->id->Visible = false;
        }
    }

    // Lookup data
    public function lookup(array $req = [], bool $response = true)
    {
        global $Language, $Security;

        // Get lookup object
        $fieldName = $req["field"] ?? null;
        if (!$fieldName) {
            return [];
        }
        $fld = $this->Fields[$fieldName];
        $lookup = $fld->Lookup;
        $name = $req["name"] ?? "";
        if (ContainsString($name, "query_builder_rule")) {
            $lookup->FilterFields = []; // Skip parent fields if any
        }

        // Get lookup parameters
        $lookupType = $req["ajax"] ?? "unknown";
        $pageSize = -1;
        $offset = -1;
        $searchValue = "";
        if (SameText($lookupType, "modal") || SameText($lookupType, "filter")) {
            $searchValue = $req["q"] ?? $req["sv"] ?? "";
            $pageSize = $req["n"] ?? $req["recperpage"] ?? 10;
        } elseif (SameText($lookupType, "autosuggest")) {
            $searchValue = $req["q"] ?? "";
            $pageSize = $req["n"] ?? -1;
            $pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
            if ($pageSize <= 0) {
                $pageSize = Config("AUTO_SUGGEST_MAX_ENTRIES");
            }
        }
        $start = $req["start"] ?? -1;
        $start = is_numeric($start) ? (int)$start : -1;
        $page = $req["page"] ?? -1;
        $page = is_numeric($page) ? (int)$page : -1;
        $offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
        $userSelect = Decrypt($req["s"] ?? "");
        $userFilter = Decrypt($req["f"] ?? "");
        $userOrderBy = Decrypt($req["o"] ?? "");
        $keys = $req["keys"] ?? null;
        $lookup->LookupType = $lookupType; // Lookup type
        $lookup->FilterValues = []; // Clear filter values first
        if ($keys !== null) { // Selected records from modal
            if (is_array($keys)) {
                $keys = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $keys);
            }
            $lookup->FilterFields = []; // Skip parent fields if any
            $lookup->FilterValues[] = $keys; // Lookup values
            $pageSize = -1; // Show all records
        } else { // Lookup values
            $lookup->FilterValues[] = $req["v0"] ?? $req["lookupValue"] ?? "";
        }
        $cnt = is_array($lookup->FilterFields) ? count($lookup->FilterFields) : 0;
        for ($i = 1; $i <= $cnt; $i++) {
            $lookup->FilterValues[] = $req["v" . $i] ?? "";
        }
        $lookup->SearchValue = $searchValue;
        $lookup->PageSize = $pageSize;
        $lookup->Offset = $offset;
        if ($userSelect != "") {
            $lookup->UserSelect = $userSelect;
        }
        if ($userFilter != "") {
            $lookup->UserFilter = $userFilter;
        }
        if ($userOrderBy != "") {
            $lookup->UserOrderBy = $userOrderBy;
        }
        return $lookup->toJson($this, $response); // Use settings from current page
    }
    public $FormClassName = "ew-form ew-add-form";
    public $IsModal = false;
    public $IsMobileOrModal = false;
    public $DbMasterFilter = "";
    public $DbDetailFilter = "";
    public $StartRecord;
    public $Priv = 0;
    public $CopyRecord;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $Language, $Security, $CurrentForm, $SkipHeaderFooter;

        // Is modal
        $this->IsModal = ConvertToBool(Param("modal"));
        $this->UseLayout = $this->UseLayout && !$this->IsModal;

        // Use layout
        $this->UseLayout = $this->UseLayout && ConvertToBool(Param(Config("PAGE_LAYOUT"), true));

        // View
        $this->View = Get(Config("VIEW"));

        // Load user profile
        if (IsLoggedIn()) {
            Profile()->setUserName(CurrentUserName())->loadFromStorage();
        }

        // Create form object
        $CurrentForm = new HttpForm();
        $this->CurrentAction = Param("action"); // Set up current action
        $this->setVisibility();

        // Set lookup cache
        if (!in_array($this->PageID, Config("LOOKUP_CACHE_PAGE_IDS"))) {
            $this->setUseLookupCache(false);
        }

        // Global Page Loading event (in userfn*.php)
        DispatchEvent(new PageLoadingEvent($this), PageLoadingEvent::NAME);

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Hide fields for add/edit
        if (!$this->UseAjaxActions) {
            $this->hideFieldsForAddEdit();
        }
        // Use inline delete
        if ($this->UseAjaxActions) {
            $this->InlineDelete = true;
        }

        // Set up lookup cache
        $this->setupLookupOptions($this->category_id);
        $this->setupLookupOptions($this->is_featured);
        $this->setupLookupOptions($this->is_published);
        $this->setupLookupOptions($this->news_type_id);

        // Load default values for add
        $this->loadDefaultValues();

        // Check modal
        if ($this->IsModal) {
            $SkipHeaderFooter = true;
        }
        $this->IsMobileOrModal = IsMobile() || $this->IsModal;
        $postBack = false;

        // Set up current action
        if (IsApi()) {
            $this->CurrentAction = "insert"; // Add record directly
            $postBack = true;
        } elseif (Post("action", "") !== "") {
            $this->CurrentAction = Post("action"); // Get form action
            $this->setKey(Post($this->OldKeyName));
            $postBack = true;
        } else {
            // Load key values from QueryString
            if (($keyValue = Get("id") ?? Route("id")) !== null) {
                $this->id->setQueryStringValue($keyValue);
            }
            $this->OldKey = $this->getKey(true); // Get from CurrentValue
            $this->CopyRecord = !EmptyValue($this->OldKey);
            if ($this->CopyRecord) {
                $this->CurrentAction = "copy"; // Copy record
                $this->setKey($this->OldKey); // Set up record key
            } else {
                $this->CurrentAction = "show"; // Display blank record
            }
        }

        // Load old record or default values
        $rsold = $this->loadOldRecord();

        // Load form values
        if ($postBack) {
            $this->loadFormValues(); // Load form values
        }

        // Validate form if post back
        if ($postBack) {
            if (!$this->validateForm()) {
                $this->EventCancelled = true; // Event cancelled
                $this->restoreFormValues(); // Restore form values
                if (IsApi()) {
                    $this->terminate();
                    return;
                } else {
                    $this->CurrentAction = "show"; // Form error, reset action
                }
            }
        }

        // Perform current action
        switch ($this->CurrentAction) {
            case "copy": // Copy an existing record
                if (!$rsold) { // Record not loaded
                    if ($this->getFailureMessage() == "") {
                        $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
                    }
                    $this->terminate("NewsPostsList"); // No matching record, return to list
                    return;
                }
                break;
            case "insert": // Add new record
                $this->SendEmail = true; // Send email on add success
                if ($this->addRow($rsold)) { // Add successful
                    if ($this->getSuccessMessage() == "" && Post("addopt") != "1") { // Skip success message for addopt (done in JavaScript)
                        $this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
                    }
                    $returnUrl = $this->getReturnUrl();
                    if (GetPageName($returnUrl) == "NewsPostsList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "NewsPostsView") {
                        $returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
                    }

                    // Handle UseAjaxActions with return page
                    if ($this->IsModal && $this->UseAjaxActions) {
                        $this->IsModal = false;
                        if (GetPageName($returnUrl) != "NewsPostsList") {
                            Container("app.flash")->addMessage("Return-Url", $returnUrl); // Save return URL
                            $returnUrl = "NewsPostsList"; // Return list page content
                        }
                    }
                    if (IsJsonResponse()) { // Return to caller
                        $this->terminate(true);
                        return;
                    } else {
                        $this->terminate($returnUrl);
                        return;
                    }
                } elseif (IsApi()) { // API request, return
                    $this->terminate();
                    return;
                } elseif ($this->IsModal && $this->UseAjaxActions) { // Return JSON error message
                    WriteJson(["success" => false, "validation" => $this->getValidationErrors(), "error" => $this->getFailureMessage()]);
                    $this->clearFailureMessage();
                    $this->terminate();
                    return;
                } else {
                    $this->EventCancelled = true; // Event cancelled
                    $this->restoreFormValues(); // Add failed, restore form values
                }
        }

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Render row based on row type
        $this->RowType = RowType::ADD; // Render add type

        // Render row
        $this->resetAttributes();
        $this->renderRow();

        // Set LoginStatus / Page_Rendering / Page_Render
        if (!IsApi() && !$this->isTerminated()) {
            // Setup login status
            SetupLoginStatus();

            // Pass login status to client side
            SetClientVar("login", LoginStatus());

            // Global Page Rendering event (in userfn*.php)
            DispatchEvent(new PageRenderingEvent($this), PageRenderingEvent::NAME);

            // Page Render event
            if (method_exists($this, "pageRender")) {
                $this->pageRender();
            }

            // Render search option
            if (method_exists($this, "renderSearchOptions")) {
                $this->renderSearchOptions();
            }
        }
    }

    // Get upload files
    protected function getUploadFiles()
    {
        global $CurrentForm, $Language;
        $this->featured_image->Upload->Index = $CurrentForm->Index;
        $this->featured_image->Upload->uploadFile();
        $this->featured_image->CurrentValue = $this->featured_image->Upload->FileName;
    }

    // Load default values
    protected function loadDefaultValues()
    {
        $this->author_name->DefaultValue = $this->author_name->getDefault(); // PHP
        $this->author_name->OldValue = $this->author_name->DefaultValue;
        $this->views_count->DefaultValue = $this->views_count->getDefault(); // PHP
        $this->views_count->OldValue = $this->views_count->DefaultValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;
        $validate = !Config("SERVER_VALIDATE");

        // Check field name 'title' first before field var 'x__title'
        $val = $CurrentForm->hasValue("title") ? $CurrentForm->getValue("title") : $CurrentForm->getValue("x__title");
        if (!$this->_title->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_title->Visible = false; // Disable update for API request
            } else {
                $this->_title->setFormValue($val);
            }
        }

        // Check field name 'slug' first before field var 'x_slug'
        $val = $CurrentForm->hasValue("slug") ? $CurrentForm->getValue("slug") : $CurrentForm->getValue("x_slug");
        if (!$this->slug->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->slug->Visible = false; // Disable update for API request
            } else {
                $this->slug->setFormValue($val);
            }
        }

        // Check field name 'excerpt' first before field var 'x_excerpt'
        $val = $CurrentForm->hasValue("excerpt") ? $CurrentForm->getValue("excerpt") : $CurrentForm->getValue("x_excerpt");
        if (!$this->excerpt->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->excerpt->Visible = false; // Disable update for API request
            } else {
                $this->excerpt->setFormValue($val);
            }
        }

        // Check field name 'content' first before field var 'x__content'
        $val = $CurrentForm->hasValue("content") ? $CurrentForm->getValue("content") : $CurrentForm->getValue("x__content");
        if (!$this->_content->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_content->Visible = false; // Disable update for API request
            } else {
                $this->_content->setFormValue($val);
            }
        }

        // Check field name 'category_id' first before field var 'x_category_id'
        $val = $CurrentForm->hasValue("category_id") ? $CurrentForm->getValue("category_id") : $CurrentForm->getValue("x_category_id");
        if (!$this->category_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->category_id->Visible = false; // Disable update for API request
            } else {
                $this->category_id->setFormValue($val);
            }
        }

        // Check field name 'author_name' first before field var 'x_author_name'
        $val = $CurrentForm->hasValue("author_name") ? $CurrentForm->getValue("author_name") : $CurrentForm->getValue("x_author_name");
        if (!$this->author_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->author_name->Visible = false; // Disable update for API request
            } else {
                $this->author_name->setFormValue($val);
            }
        }

        // Check field name 'is_featured' first before field var 'x_is_featured'
        $val = $CurrentForm->hasValue("is_featured") ? $CurrentForm->getValue("is_featured") : $CurrentForm->getValue("x_is_featured");
        if (!$this->is_featured->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->is_featured->Visible = false; // Disable update for API request
            } else {
                $this->is_featured->setFormValue($val);
            }
        }

        // Check field name 'is_published' first before field var 'x_is_published'
        $val = $CurrentForm->hasValue("is_published") ? $CurrentForm->getValue("is_published") : $CurrentForm->getValue("x_is_published");
        if (!$this->is_published->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->is_published->Visible = false; // Disable update for API request
            } else {
                $this->is_published->setFormValue($val);
            }
        }

        // Check field name 'published_date' first before field var 'x_published_date'
        $val = $CurrentForm->hasValue("published_date") ? $CurrentForm->getValue("published_date") : $CurrentForm->getValue("x_published_date");
        if (!$this->published_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->published_date->Visible = false; // Disable update for API request
            } else {
                $this->published_date->setFormValue($val, true, $validate);
            }
            $this->published_date->CurrentValue = UnFormatDateTime($this->published_date->CurrentValue, $this->published_date->formatPattern());
        }

        // Check field name 'views_count' first before field var 'x_views_count'
        $val = $CurrentForm->hasValue("views_count") ? $CurrentForm->getValue("views_count") : $CurrentForm->getValue("x_views_count");
        if (!$this->views_count->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->views_count->Visible = false; // Disable update for API request
            } else {
                $this->views_count->setFormValue($val, true, $validate);
            }
        }

        // Check field name 'created_at' first before field var 'x_created_at'
        $val = $CurrentForm->hasValue("created_at") ? $CurrentForm->getValue("created_at") : $CurrentForm->getValue("x_created_at");
        if (!$this->created_at->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->created_at->Visible = false; // Disable update for API request
            } else {
                $this->created_at->setFormValue($val);
            }
            $this->created_at->CurrentValue = UnFormatDateTime($this->created_at->CurrentValue, $this->created_at->formatPattern());
        }

        // Check field name 'updated_at' first before field var 'x_updated_at'
        $val = $CurrentForm->hasValue("updated_at") ? $CurrentForm->getValue("updated_at") : $CurrentForm->getValue("x_updated_at");
        if (!$this->updated_at->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->updated_at->Visible = false; // Disable update for API request
            } else {
                $this->updated_at->setFormValue($val);
            }
            $this->updated_at->CurrentValue = UnFormatDateTime($this->updated_at->CurrentValue, $this->updated_at->formatPattern());
        }

        // Check field name 'news_type_id' first before field var 'x_news_type_id'
        $val = $CurrentForm->hasValue("news_type_id") ? $CurrentForm->getValue("news_type_id") : $CurrentForm->getValue("x_news_type_id");
        if (!$this->news_type_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->news_type_id->Visible = false; // Disable update for API request
            } else {
                $this->news_type_id->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		$this->featured_image->OldUploadPath = $this->featured_image->getUploadPath(); // PHP
		$this->featured_image->UploadPath = $this->featured_image->OldUploadPath;
        $this->getUploadFiles(); // Get upload files
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->_title->CurrentValue = $this->_title->FormValue;
        $this->slug->CurrentValue = $this->slug->FormValue;
        $this->excerpt->CurrentValue = $this->excerpt->FormValue;
        $this->_content->CurrentValue = $this->_content->FormValue;
        $this->category_id->CurrentValue = $this->category_id->FormValue;
        $this->author_name->CurrentValue = $this->author_name->FormValue;
        $this->is_featured->CurrentValue = $this->is_featured->FormValue;
        $this->is_published->CurrentValue = $this->is_published->FormValue;
        $this->published_date->CurrentValue = $this->published_date->FormValue;
        $this->published_date->CurrentValue = UnFormatDateTime($this->published_date->CurrentValue, $this->published_date->formatPattern());
        $this->views_count->CurrentValue = $this->views_count->FormValue;
        $this->created_at->CurrentValue = $this->created_at->FormValue;
        $this->created_at->CurrentValue = UnFormatDateTime($this->created_at->CurrentValue, $this->created_at->formatPattern());
        $this->updated_at->CurrentValue = $this->updated_at->FormValue;
        $this->updated_at->CurrentValue = UnFormatDateTime($this->updated_at->CurrentValue, $this->updated_at->formatPattern());
        $this->news_type_id->CurrentValue = $this->news_type_id->FormValue;
    }

    /**
     * Load row based on key values
     *
     * @return void
     */
    public function loadRow()
    {
        global $Security, $Language;
        $filter = $this->getRecordFilter();

        // Call Row Selecting event
        $this->rowSelecting($filter);

        // Load SQL based on filter
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $res = false;
        $row = $conn->fetchAssociative($sql);
        if ($row) {
            $res = true;
            $this->loadRowValues($row); // Load row values
        }
        return $res;
    }

    /**
     * Load row values from result set or record
     *
     * @param array $row Record
     * @return void
     */
    public function loadRowValues($row = null)
    {
        $row = is_array($row) ? $row : $this->newRow();

        // Call Row Selected event
        $this->rowSelected($row);
        $this->id->setDbValue($row['id']);
        $this->_title->setDbValue($row['title']);
        $this->slug->setDbValue($row['slug']);
        $this->excerpt->setDbValue($row['excerpt']);
        $this->_content->setDbValue($row['content']);
        $this->category_id->setDbValue($row['category_id']);
        $this->featured_image->Upload->DbValue = $row['featured_image'];
        $this->featured_image->setDbValue($this->featured_image->Upload->DbValue);
        $this->author_name->setDbValue($row['author_name']);
        $this->is_featured->setDbValue((ConvertToBool($row['is_featured']) ? "1" : "0"));
        $this->is_published->setDbValue((ConvertToBool($row['is_published']) ? "1" : "0"));
        $this->published_date->setDbValue($row['published_date']);
        $this->views_count->setDbValue($row['views_count']);
        $this->created_at->setDbValue($row['created_at']);
        $this->updated_at->setDbValue($row['updated_at']);
        $this->news_type_id->setDbValue($row['news_type_id']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = $this->id->DefaultValue;
        $row['title'] = $this->_title->DefaultValue;
        $row['slug'] = $this->slug->DefaultValue;
        $row['excerpt'] = $this->excerpt->DefaultValue;
        $row['content'] = $this->_content->DefaultValue;
        $row['category_id'] = $this->category_id->DefaultValue;
        $row['featured_image'] = $this->featured_image->DefaultValue;
        $row['author_name'] = $this->author_name->DefaultValue;
        $row['is_featured'] = $this->is_featured->DefaultValue;
        $row['is_published'] = $this->is_published->DefaultValue;
        $row['published_date'] = $this->published_date->DefaultValue;
        $row['views_count'] = $this->views_count->DefaultValue;
        $row['created_at'] = $this->created_at->DefaultValue;
        $row['updated_at'] = $this->updated_at->DefaultValue;
        $row['news_type_id'] = $this->news_type_id->DefaultValue;
        return $row;
    }

    // Load old record
    protected function loadOldRecord()
    {
        // Load old record
        if ($this->OldKey != "") {
            $this->setKey($this->OldKey);
            $this->CurrentFilter = $this->getRecordFilter();
            $sql = $this->getCurrentSql();
            $conn = $this->getConnection();
            $rs = ExecuteQuery($sql, $conn);
            if ($row = $rs->fetch()) {
                $this->loadRowValues($row); // Load row values
                return $row;
            }
        }
        $this->loadRowValues(); // Load default row values
        return null;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id
        $this->id->RowCssClass = "row";

        // title
        $this->_title->RowCssClass = "row";

        // slug
        $this->slug->RowCssClass = "row";

        // excerpt
        $this->excerpt->RowCssClass = "row";

        // content
        $this->_content->RowCssClass = "row";

        // category_id
        $this->category_id->RowCssClass = "row";

        // featured_image
        $this->featured_image->RowCssClass = "row";

        // author_name
        $this->author_name->RowCssClass = "row";

        // is_featured
        $this->is_featured->RowCssClass = "row";

        // is_published
        $this->is_published->RowCssClass = "row";

        // published_date
        $this->published_date->RowCssClass = "row";

        // views_count
        $this->views_count->RowCssClass = "row";

        // created_at
        $this->created_at->RowCssClass = "row";

        // updated_at
        $this->updated_at->RowCssClass = "row";

        // news_type_id
        $this->news_type_id->RowCssClass = "row";

        // View row
        if ($this->RowType == RowType::VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;

            // title
            $this->_title->ViewValue = $this->_title->CurrentValue;

            // slug
            $this->slug->ViewValue = $this->slug->CurrentValue;

            // excerpt
            $this->excerpt->ViewValue = $this->excerpt->CurrentValue;

            // content
            $this->_content->ViewValue = $this->_content->CurrentValue;

            // category_id
            $curVal = strval($this->category_id->CurrentValue);
            if ($curVal != "") {
                $this->category_id->ViewValue = $this->category_id->lookupCacheOption($curVal);
                if ($this->category_id->ViewValue === null) { // Lookup from database
                    $filterWrk = SearchFilter($this->category_id->Lookup->getTable()->Fields["id"]->searchExpression(), "=", $curVal, $this->category_id->Lookup->getTable()->Fields["id"]->searchDataType(), "");
                    $sqlWrk = $this->category_id->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $conn = Conn();
                    $config = $conn->getConfiguration();
                    $config->setResultCache($this->Cache);
                    $rswrk = $conn->executeCacheQuery($sqlWrk, [], [], $this->CacheProfile)->fetchAll();
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->category_id->Lookup->renderViewRow($rswrk[0]);
                        $this->category_id->ViewValue = $this->category_id->displayValue($arwrk);
                    } else {
                        $this->category_id->ViewValue = FormatNumber($this->category_id->CurrentValue, $this->category_id->formatPattern());
                    }
                }
            } else {
                $this->category_id->ViewValue = null;
            }

            // featured_image
            $this->featured_image->UploadPath = $this->featured_image->getUploadPath(); // PHP
            if (!EmptyValue($this->featured_image->Upload->DbValue)) {
                $this->featured_image->ImageWidth = 100;
                $this->featured_image->ImageHeight = 100;
                $this->featured_image->ImageAlt = $this->featured_image->alt();
                $this->featured_image->ImageCssClass = "ew-image";
                $this->featured_image->ViewValue = $this->featured_image->Upload->DbValue;
            } else {
                $this->featured_image->ViewValue = "";
            }

            // author_name
            $this->author_name->ViewValue = $this->author_name->CurrentValue;

            // is_featured
            if (ConvertToBool($this->is_featured->CurrentValue)) {
                $this->is_featured->ViewValue = $this->is_featured->tagCaption(1) != "" ? $this->is_featured->tagCaption(1) : "Yes";
            } else {
                $this->is_featured->ViewValue = $this->is_featured->tagCaption(2) != "" ? $this->is_featured->tagCaption(2) : "No";
            }

            // is_published
            if (ConvertToBool($this->is_published->CurrentValue)) {
                $this->is_published->ViewValue = $this->is_published->tagCaption(1) != "" ? $this->is_published->tagCaption(1) : "Yes";
            } else {
                $this->is_published->ViewValue = $this->is_published->tagCaption(2) != "" ? $this->is_published->tagCaption(2) : "No";
            }

            // published_date
            $this->published_date->ViewValue = $this->published_date->CurrentValue;
            $this->published_date->ViewValue = FormatDateTime($this->published_date->ViewValue, $this->published_date->formatPattern());

            // views_count
            $this->views_count->ViewValue = $this->views_count->CurrentValue;
            $this->views_count->ViewValue = FormatNumber($this->views_count->ViewValue, $this->views_count->formatPattern());

            // created_at
            $this->created_at->ViewValue = $this->created_at->CurrentValue;
            $this->created_at->ViewValue = FormatDateTime($this->created_at->ViewValue, $this->created_at->formatPattern());

            // updated_at
            $this->updated_at->ViewValue = $this->updated_at->CurrentValue;
            $this->updated_at->ViewValue = FormatDateTime($this->updated_at->ViewValue, $this->updated_at->formatPattern());

            // news_type_id
            $curVal = strval($this->news_type_id->CurrentValue);
            if ($curVal != "") {
                $this->news_type_id->ViewValue = $this->news_type_id->lookupCacheOption($curVal);
                if ($this->news_type_id->ViewValue === null) { // Lookup from database
                    $filterWrk = SearchFilter($this->news_type_id->Lookup->getTable()->Fields["id"]->searchExpression(), "=", $curVal, $this->news_type_id->Lookup->getTable()->Fields["id"]->searchDataType(), "");
                    $sqlWrk = $this->news_type_id->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $conn = Conn();
                    $config = $conn->getConfiguration();
                    $config->setResultCache($this->Cache);
                    $rswrk = $conn->executeCacheQuery($sqlWrk, [], [], $this->CacheProfile)->fetchAll();
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->news_type_id->Lookup->renderViewRow($rswrk[0]);
                        $this->news_type_id->ViewValue = $this->news_type_id->displayValue($arwrk);
                    } else {
                        $this->news_type_id->ViewValue = FormatNumber($this->news_type_id->CurrentValue, $this->news_type_id->formatPattern());
                    }
                }
            } else {
                $this->news_type_id->ViewValue = null;
            }

            // title
            $this->_title->HrefValue = "";

            // slug
            $this->slug->HrefValue = "";

            // excerpt
            $this->excerpt->HrefValue = "";

            // content
            $this->_content->HrefValue = "";

            // category_id
            $this->category_id->HrefValue = "";

            // featured_image
            $this->featured_image->UploadPath = $this->featured_image->getUploadPath(); // PHP
            if (!EmptyValue($this->featured_image->Upload->DbValue)) {
                $this->featured_image->HrefValue = GetFileUploadUrl($this->featured_image, $this->featured_image->htmlDecode($this->featured_image->Upload->DbValue)); // Add prefix/suffix
                $this->featured_image->LinkAttrs["target"] = ""; // Add target
                if ($this->isExport()) {
                    $this->featured_image->HrefValue = FullUrl($this->featured_image->HrefValue, "href");
                }
            } else {
                $this->featured_image->HrefValue = "";
            }
            $this->featured_image->ExportHrefValue = $this->featured_image->UploadPath . $this->featured_image->Upload->DbValue;

            // author_name
            $this->author_name->HrefValue = "";

            // is_featured
            $this->is_featured->HrefValue = "";

            // is_published
            $this->is_published->HrefValue = "";

            // published_date
            $this->published_date->HrefValue = "";

            // views_count
            $this->views_count->HrefValue = "";

            // created_at
            $this->created_at->HrefValue = "";

            // updated_at
            $this->updated_at->HrefValue = "";

            // news_type_id
            $this->news_type_id->HrefValue = "";
        } elseif ($this->RowType == RowType::ADD) {
            // title
            $this->_title->setupEditAttributes();
            if (!$this->_title->Raw) {
                $this->_title->CurrentValue = HtmlDecode($this->_title->CurrentValue);
            }
            $this->_title->EditValue = HtmlEncode($this->_title->CurrentValue);
            $this->_title->PlaceHolder = RemoveHtml($this->_title->caption());

            // slug
            $this->slug->setupEditAttributes();
            if (!$this->slug->Raw) {
                $this->slug->CurrentValue = HtmlDecode($this->slug->CurrentValue);
            }
            $this->slug->EditValue = HtmlEncode($this->slug->CurrentValue);
            $this->slug->PlaceHolder = RemoveHtml($this->slug->caption());

            // excerpt
            $this->excerpt->setupEditAttributes();
            $this->excerpt->EditValue = HtmlEncode($this->excerpt->CurrentValue);
            $this->excerpt->PlaceHolder = RemoveHtml($this->excerpt->caption());

            // content
            $this->_content->setupEditAttributes();
            $this->_content->EditValue = HtmlEncode($this->_content->CurrentValue);
            $this->_content->PlaceHolder = RemoveHtml($this->_content->caption());

            // category_id
            $this->category_id->setupEditAttributes();
            $curVal = trim(strval($this->category_id->CurrentValue));
            if ($curVal != "") {
                $this->category_id->ViewValue = $this->category_id->lookupCacheOption($curVal);
            } else {
                $this->category_id->ViewValue = $this->category_id->Lookup !== null && is_array($this->category_id->lookupOptions()) && count($this->category_id->lookupOptions()) > 0 ? $curVal : null;
            }
            if ($this->category_id->ViewValue !== null) { // Load from cache
                $this->category_id->EditValue = array_values($this->category_id->lookupOptions());
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = SearchFilter($this->category_id->Lookup->getTable()->Fields["id"]->searchExpression(), "=", $this->category_id->CurrentValue, $this->category_id->Lookup->getTable()->Fields["id"]->searchDataType(), "");
                }
                $sqlWrk = $this->category_id->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $conn = Conn();
                $config = $conn->getConfiguration();
                $config->setResultCache($this->Cache);
                $rswrk = $conn->executeCacheQuery($sqlWrk, [], [], $this->CacheProfile)->fetchAll();
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->category_id->EditValue = $arwrk;
            }
            $this->category_id->PlaceHolder = RemoveHtml($this->category_id->caption());

            // featured_image
            $this->featured_image->setupEditAttributes();
            $this->featured_image->UploadPath = $this->featured_image->getUploadPath(); // PHP
            if (!EmptyValue($this->featured_image->Upload->DbValue)) {
                $this->featured_image->ImageWidth = 100;
                $this->featured_image->ImageHeight = 100;
                $this->featured_image->ImageAlt = $this->featured_image->alt();
                $this->featured_image->ImageCssClass = "ew-image";
                $this->featured_image->EditValue = $this->featured_image->Upload->DbValue;
            } else {
                $this->featured_image->EditValue = "";
            }
            if (!EmptyValue($this->featured_image->CurrentValue)) {
                $this->featured_image->Upload->FileName = $this->featured_image->CurrentValue;
            }
            if (!Config("CREATE_UPLOAD_FILE_ON_COPY")) {
                $this->featured_image->Upload->DbValue = null;
            }
            if ($this->isShow() || $this->isCopy()) {
                RenderUploadField($this->featured_image);
            }

            // author_name
            $this->author_name->setupEditAttributes();
            if (!$this->author_name->Raw) {
                $this->author_name->CurrentValue = HtmlDecode($this->author_name->CurrentValue);
            }
            $this->author_name->EditValue = HtmlEncode($this->author_name->CurrentValue);
            $this->author_name->PlaceHolder = RemoveHtml($this->author_name->caption());

            // is_featured
            $this->is_featured->EditValue = $this->is_featured->options(false);
            $this->is_featured->PlaceHolder = RemoveHtml($this->is_featured->caption());

            // is_published
            $this->is_published->EditValue = $this->is_published->options(false);
            $this->is_published->PlaceHolder = RemoveHtml($this->is_published->caption());

            // published_date
            $this->published_date->setupEditAttributes();
            $this->published_date->EditValue = HtmlEncode(FormatDateTime($this->published_date->CurrentValue, $this->published_date->formatPattern()));
            $this->published_date->PlaceHolder = RemoveHtml($this->published_date->caption());

            // views_count
            $this->views_count->setupEditAttributes();
            $this->views_count->EditValue = $this->views_count->CurrentValue;
            $this->views_count->PlaceHolder = RemoveHtml($this->views_count->caption());
            if (strval($this->views_count->EditValue) != "" && is_numeric($this->views_count->EditValue)) {
                $this->views_count->EditValue = FormatNumber($this->views_count->EditValue, null);
            }

            // created_at

            // updated_at

            // news_type_id
            $this->news_type_id->setupEditAttributes();
            $curVal = trim(strval($this->news_type_id->CurrentValue));
            if ($curVal != "") {
                $this->news_type_id->ViewValue = $this->news_type_id->lookupCacheOption($curVal);
            } else {
                $this->news_type_id->ViewValue = $this->news_type_id->Lookup !== null && is_array($this->news_type_id->lookupOptions()) && count($this->news_type_id->lookupOptions()) > 0 ? $curVal : null;
            }
            if ($this->news_type_id->ViewValue !== null) { // Load from cache
                $this->news_type_id->EditValue = array_values($this->news_type_id->lookupOptions());
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = SearchFilter($this->news_type_id->Lookup->getTable()->Fields["id"]->searchExpression(), "=", $this->news_type_id->CurrentValue, $this->news_type_id->Lookup->getTable()->Fields["id"]->searchDataType(), "");
                }
                $sqlWrk = $this->news_type_id->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $conn = Conn();
                $config = $conn->getConfiguration();
                $config->setResultCache($this->Cache);
                $rswrk = $conn->executeCacheQuery($sqlWrk, [], [], $this->CacheProfile)->fetchAll();
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->news_type_id->EditValue = $arwrk;
            }
            $this->news_type_id->PlaceHolder = RemoveHtml($this->news_type_id->caption());

            // Add refer script

            // title
            $this->_title->HrefValue = "";

            // slug
            $this->slug->HrefValue = "";

            // excerpt
            $this->excerpt->HrefValue = "";

            // content
            $this->_content->HrefValue = "";

            // category_id
            $this->category_id->HrefValue = "";

            // featured_image
            $this->featured_image->UploadPath = $this->featured_image->getUploadPath(); // PHP
            if (!EmptyValue($this->featured_image->Upload->DbValue)) {
                $this->featured_image->HrefValue = GetFileUploadUrl($this->featured_image, $this->featured_image->htmlDecode($this->featured_image->Upload->DbValue)); // Add prefix/suffix
                $this->featured_image->LinkAttrs["target"] = ""; // Add target
                if ($this->isExport()) {
                    $this->featured_image->HrefValue = FullUrl($this->featured_image->HrefValue, "href");
                }
            } else {
                $this->featured_image->HrefValue = "";
            }
            $this->featured_image->ExportHrefValue = $this->featured_image->UploadPath . $this->featured_image->Upload->DbValue;

            // author_name
            $this->author_name->HrefValue = "";

            // is_featured
            $this->is_featured->HrefValue = "";

            // is_published
            $this->is_published->HrefValue = "";

            // published_date
            $this->published_date->HrefValue = "";

            // views_count
            $this->views_count->HrefValue = "";

            // created_at
            $this->created_at->HrefValue = "";

            // updated_at
            $this->updated_at->HrefValue = "";

            // news_type_id
            $this->news_type_id->HrefValue = "";
        }
        if ($this->RowType == RowType::ADD || $this->RowType == RowType::EDIT || $this->RowType == RowType::SEARCH) { // Add/Edit/Search row
            $this->setupFieldTitles();
        }

        // Call Row Rendered event
        if ($this->RowType != RowType::AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Validate form
    protected function validateForm()
    {
        global $Language, $Security;

        // Check if validation required
        if (!Config("SERVER_VALIDATE")) {
            return true;
        }
        $validateForm = true;
            if ($this->_title->Visible && $this->_title->Required) {
                if (!$this->_title->IsDetailKey && EmptyValue($this->_title->FormValue)) {
                    $this->_title->addErrorMessage(str_replace("%s", $this->_title->caption(), $this->_title->RequiredErrorMessage));
                }
            }
            if ($this->slug->Visible && $this->slug->Required) {
                if (!$this->slug->IsDetailKey && EmptyValue($this->slug->FormValue)) {
                    $this->slug->addErrorMessage(str_replace("%s", $this->slug->caption(), $this->slug->RequiredErrorMessage));
                }
            }
            if ($this->excerpt->Visible && $this->excerpt->Required) {
                if (!$this->excerpt->IsDetailKey && EmptyValue($this->excerpt->FormValue)) {
                    $this->excerpt->addErrorMessage(str_replace("%s", $this->excerpt->caption(), $this->excerpt->RequiredErrorMessage));
                }
            }
            if ($this->_content->Visible && $this->_content->Required) {
                if (!$this->_content->IsDetailKey && EmptyValue($this->_content->FormValue)) {
                    $this->_content->addErrorMessage(str_replace("%s", $this->_content->caption(), $this->_content->RequiredErrorMessage));
                }
            }
            if ($this->category_id->Visible && $this->category_id->Required) {
                if (!$this->category_id->IsDetailKey && EmptyValue($this->category_id->FormValue)) {
                    $this->category_id->addErrorMessage(str_replace("%s", $this->category_id->caption(), $this->category_id->RequiredErrorMessage));
                }
            }
            if ($this->featured_image->Visible && $this->featured_image->Required) {
                if ($this->featured_image->Upload->FileName == "" && !$this->featured_image->Upload->KeepFile) {
                    $this->featured_image->addErrorMessage(str_replace("%s", $this->featured_image->caption(), $this->featured_image->RequiredErrorMessage));
                }
            }
            if ($this->author_name->Visible && $this->author_name->Required) {
                if (!$this->author_name->IsDetailKey && EmptyValue($this->author_name->FormValue)) {
                    $this->author_name->addErrorMessage(str_replace("%s", $this->author_name->caption(), $this->author_name->RequiredErrorMessage));
                }
            }
            if ($this->is_featured->Visible && $this->is_featured->Required) {
                if ($this->is_featured->FormValue == "") {
                    $this->is_featured->addErrorMessage(str_replace("%s", $this->is_featured->caption(), $this->is_featured->RequiredErrorMessage));
                }
            }
            if ($this->is_published->Visible && $this->is_published->Required) {
                if ($this->is_published->FormValue == "") {
                    $this->is_published->addErrorMessage(str_replace("%s", $this->is_published->caption(), $this->is_published->RequiredErrorMessage));
                }
            }
            if ($this->published_date->Visible && $this->published_date->Required) {
                if (!$this->published_date->IsDetailKey && EmptyValue($this->published_date->FormValue)) {
                    $this->published_date->addErrorMessage(str_replace("%s", $this->published_date->caption(), $this->published_date->RequiredErrorMessage));
                }
            }
            if (!CheckDate($this->published_date->FormValue, $this->published_date->formatPattern())) {
                $this->published_date->addErrorMessage($this->published_date->getErrorMessage(false));
            }
            if ($this->views_count->Visible && $this->views_count->Required) {
                if (!$this->views_count->IsDetailKey && EmptyValue($this->views_count->FormValue)) {
                    $this->views_count->addErrorMessage(str_replace("%s", $this->views_count->caption(), $this->views_count->RequiredErrorMessage));
                }
            }
            if (!CheckInteger($this->views_count->FormValue)) {
                $this->views_count->addErrorMessage($this->views_count->getErrorMessage(false));
            }
            if ($this->created_at->Visible && $this->created_at->Required) {
                if (!$this->created_at->IsDetailKey && EmptyValue($this->created_at->FormValue)) {
                    $this->created_at->addErrorMessage(str_replace("%s", $this->created_at->caption(), $this->created_at->RequiredErrorMessage));
                }
            }
            if ($this->updated_at->Visible && $this->updated_at->Required) {
                if (!$this->updated_at->IsDetailKey && EmptyValue($this->updated_at->FormValue)) {
                    $this->updated_at->addErrorMessage(str_replace("%s", $this->updated_at->caption(), $this->updated_at->RequiredErrorMessage));
                }
            }
            if ($this->news_type_id->Visible && $this->news_type_id->Required) {
                if (!$this->news_type_id->IsDetailKey && EmptyValue($this->news_type_id->FormValue)) {
                    $this->news_type_id->addErrorMessage(str_replace("%s", $this->news_type_id->caption(), $this->news_type_id->RequiredErrorMessage));
                }
            }

        // Return validate result
        $validateForm = $validateForm && !$this->hasInvalidFields();

        // Call Form_CustomValidate event
        $formCustomError = "";
        $validateForm = $validateForm && $this->formCustomValidate($formCustomError);
        if ($formCustomError != "") {
            $this->setFailureMessage($formCustomError);
        }
        return $validateForm;
    }

    // Add record
    protected function addRow($rsold = null)
    {
        global $Language, $Security;

        // Get new row
        $rsnew = $this->getAddRow();
        if ($this->featured_image->Visible && !$this->featured_image->Upload->KeepFile) {
            $this->featured_image->UploadPath = $this->featured_image->getUploadPath();
            if (!EmptyValue($this->featured_image->Upload->FileName)) {
                $this->featured_image->Upload->DbValue = null;
                FixUploadFileNames($this->featured_image);
                $this->featured_image->setDbValueDef($rsnew, $this->featured_image->Upload->FileName, false);
            }
        }

        // Update current values
        $this->setCurrentValues($rsnew);
        if ($this->slug->CurrentValue != "") { // Check field with unique index
            $filter = "(\"slug\" = '" . AdjustSql($this->slug->CurrentValue, $this->Dbid) . "')";
            $rsChk = $this->loadRs($filter)->fetch();
            if ($rsChk !== false) {
                $idxErrMsg = str_replace("%f", $this->slug->caption(), $Language->phrase("DupIndex"));
                $idxErrMsg = str_replace("%v", $this->slug->CurrentValue, $idxErrMsg);
                $this->setFailureMessage($idxErrMsg);
                return false;
            }
        }
        $conn = $this->getConnection();

        // Load db values from old row
        $this->loadDbValues($rsold);
        $this->featured_image->OldUploadPath = $this->featured_image->getUploadPath(); // PHP
        $this->featured_image->UploadPath = $this->featured_image->OldUploadPath;

        // Call Row Inserting event
        $insertRow = $this->rowInserting($rsold, $rsnew);
        if ($insertRow) {
            $addRow = $this->insert($rsnew);
            if ($addRow) {
                if ($this->featured_image->Visible && !$this->featured_image->Upload->KeepFile) {
                    $this->featured_image->Upload->DbValue = null;
                    if (!SaveUploadFiles($this->featured_image, $rsnew['featured_image'], false)) {
                        $this->setFailureMessage($Language->phrase("UploadError7"));
                        return false;
                    }
                }
            } elseif (!EmptyValue($this->DbErrorMessage)) { // Show database error
                $this->setFailureMessage($this->DbErrorMessage);
            }
        } else {
            if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                // Use the message, do nothing
            } elseif ($this->CancelMessage != "") {
                $this->setFailureMessage($this->CancelMessage);
                $this->CancelMessage = "";
            } else {
                $this->setFailureMessage($Language->phrase("InsertCancelled"));
            }
            $addRow = false;
        }
        if ($addRow) {
            // Call Row Inserted event
            $this->rowInserted($rsold, $rsnew);
        }

        // Write JSON response
        if (IsJsonResponse() && $addRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            $table = $this->TableVar;
            WriteJson(["success" => true, "action" => Config("API_ADD_ACTION"), $table => $row]);
        }
        return $addRow;
    }

    /**
     * Get add row
     *
     * @return array
     */
    protected function getAddRow()
    {
        global $Security;
        $rsnew = [];

        // title
        $this->_title->setDbValueDef($rsnew, $this->_title->CurrentValue, false);

        // slug
        $this->slug->setDbValueDef($rsnew, $this->slug->CurrentValue, false);

        // excerpt
        $this->excerpt->setDbValueDef($rsnew, $this->excerpt->CurrentValue, false);

        // content
        $this->_content->setDbValueDef($rsnew, $this->_content->CurrentValue, false);

        // category_id
        $this->category_id->setDbValueDef($rsnew, $this->category_id->CurrentValue, false);

        // featured_image
        if ($this->featured_image->Visible && !$this->featured_image->Upload->KeepFile) {
            if ($this->featured_image->Upload->FileName == "") {
                $rsnew['featured_image'] = null;
            } else {
                FixUploadTempFileNames($this->featured_image);
                $rsnew['featured_image'] = $this->featured_image->Upload->FileName;
            }
        }

        // author_name
        $this->author_name->setDbValueDef($rsnew, $this->author_name->CurrentValue, strval($this->author_name->CurrentValue) == "");

        // is_featured
        $tmpBool = $this->is_featured->CurrentValue;
        if ($tmpBool != "1" && $tmpBool != "0") {
            $tmpBool = !empty($tmpBool) ? "1" : "0";
        }
        $this->is_featured->setDbValueDef($rsnew, $tmpBool, strval($this->is_featured->CurrentValue) == "");

        // is_published
        $tmpBool = $this->is_published->CurrentValue;
        if ($tmpBool != "1" && $tmpBool != "0") {
            $tmpBool = !empty($tmpBool) ? "1" : "0";
        }
        $this->is_published->setDbValueDef($rsnew, $tmpBool, strval($this->is_published->CurrentValue) == "");

        // published_date
        $this->published_date->setDbValueDef($rsnew, UnFormatDateTime($this->published_date->CurrentValue, $this->published_date->formatPattern()), false);

        // views_count
        $this->views_count->setDbValueDef($rsnew, $this->views_count->CurrentValue, strval($this->views_count->CurrentValue) == "");

        // created_at
        $this->created_at->CurrentValue = $this->created_at->getAutoUpdateValue(); // PHP
        $this->created_at->setDbValueDef($rsnew, UnFormatDateTime($this->created_at->CurrentValue, $this->created_at->formatPattern()), false);

        // updated_at
        $this->updated_at->CurrentValue = $this->updated_at->getAutoUpdateValue(); // PHP
        $this->updated_at->setDbValueDef($rsnew, UnFormatDateTime($this->updated_at->CurrentValue, $this->updated_at->formatPattern()), false);

        // news_type_id
        $this->news_type_id->setDbValueDef($rsnew, $this->news_type_id->CurrentValue, false);
        return $rsnew;
    }

    /**
     * Restore add form from row
     * @param array $row Row
     */
    protected function restoreAddFormFromRow($row)
    {
        if (isset($row['title'])) { // title
            $this->_title->setFormValue($row['title']);
        }
        if (isset($row['slug'])) { // slug
            $this->slug->setFormValue($row['slug']);
        }
        if (isset($row['excerpt'])) { // excerpt
            $this->excerpt->setFormValue($row['excerpt']);
        }
        if (isset($row['content'])) { // content
            $this->_content->setFormValue($row['content']);
        }
        if (isset($row['category_id'])) { // category_id
            $this->category_id->setFormValue($row['category_id']);
        }
        if (isset($row['featured_image'])) { // featured_image
            $this->featured_image->setFormValue($row['featured_image']);
        }
        if (isset($row['author_name'])) { // author_name
            $this->author_name->setFormValue($row['author_name']);
        }
        if (isset($row['is_featured'])) { // is_featured
            $this->is_featured->setFormValue($row['is_featured']);
        }
        if (isset($row['is_published'])) { // is_published
            $this->is_published->setFormValue($row['is_published']);
        }
        if (isset($row['published_date'])) { // published_date
            $this->published_date->setFormValue($row['published_date']);
        }
        if (isset($row['views_count'])) { // views_count
            $this->views_count->setFormValue($row['views_count']);
        }
        if (isset($row['created_at'])) { // created_at
            $this->created_at->setFormValue($row['created_at']);
        }
        if (isset($row['updated_at'])) { // updated_at
            $this->updated_at->setFormValue($row['updated_at']);
        }
        if (isset($row['news_type_id'])) { // news_type_id
            $this->news_type_id->setFormValue($row['news_type_id']);
        }
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("NewsPostsList"), "", $this->TableVar, true);
        $pageId = ($this->isCopy()) ? "Copy" : "Add";
        $Breadcrumb->add("add", $pageId, $url);
    }

    // Setup lookup options
    public function setupLookupOptions($fld)
    {
        if ($fld->Lookup && $fld->Lookup->Options === null) {
            // Get default connection and filter
            $conn = $this->getConnection();
            $lookupFilter = "";

            // No need to check any more
            $fld->Lookup->Options = [];

            // Set up lookup SQL and connection
            switch ($fld->FieldVar) {
                case "x_category_id":
                    break;
                case "x_is_featured":
                    break;
                case "x_is_published":
                    break;
                case "x_news_type_id":
                    break;
                default:
                    $lookupFilter = "";
                    break;
            }

            // Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
            $sql = $fld->Lookup->getSql(false, "", $lookupFilter, $this);

            // Set up lookup cache
            if (!$fld->hasLookupOptions() && $fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0 && count($fld->Lookup->FilterFields) == 0) {
                $totalCnt = $this->getRecordCount($sql, $conn);
                if ($totalCnt > $fld->LookupCacheCount) { // Total count > cache count, do not cache
                    return;
                }
                $rows = $conn->executeQuery($sql)->fetchAll();
                $ar = [];
                foreach ($rows as $row) {
                    $row = $fld->Lookup->renderViewRow($row, Container($fld->Lookup->LinkTable));
                    $key = $row["lf"];
                    if (IsFloatType($fld->Type)) { // Handle float field
                        $key = (float)$key;
                    }
                    $ar[strval($key)] = $row;
                }
                $fld->Lookup->Options = $ar;
            }
        }
    }

    // Page Load event
    public function pageLoad()
    {
        //Log("Page Load");
    }

    // Page Unload event
    public function pageUnload()
    {
        //Log("Page Unload");
    }

    // Page Redirecting event
    public function pageRedirecting(&$url)
    {
        // Example:
        //$url = "your URL";
    }

    // Message Showing event
    // $type = ''|'success'|'failure'|'warning'
    public function messageShowing(&$msg, $type)
    {
        if ($type == "success") {
            //$msg = "your success message";
        } elseif ($type == "failure") {
            //$msg = "your failure message";
        } elseif ($type == "warning") {
            //$msg = "your warning message";
        } else {
            //$msg = "your message";
        }
    }

    // Page Render event
    public function pageRender()
    {
        //Log("Page Render");
    }

    // Page Data Rendering event
    public function pageDataRendering(&$header)
    {
        // Example:
        //$header = "your header";
    }

    // Page Data Rendered event
    public function pageDataRendered(&$footer)
    {
        // Example:
        //$footer = "your footer";
    }

    // Page Breaking event
    public function pageBreaking(&$break, &$content)
    {
        // Example:
        //$break = false; // Skip page break, or
        //$content = "<div style=\"break-after:page;\"></div>"; // Modify page break content
    }

    // Form Custom Validate event
    public function formCustomValidate(&$customError)
    {
        // Return error message in $customError
        return true;
    }
}
