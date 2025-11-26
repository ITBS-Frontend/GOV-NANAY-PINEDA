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
class ProjectsEdit extends Projects
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Page object name
    public $PageObjName = "ProjectsEdit";

    // View file path
    public $View = null;

    // Title
    public $Title = null; // Title for <title> tag

    // Rendering View
    public $RenderingView = false;

    // CSS class/style
    public $CurrentPageName = "ProjectsEdit";

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
        $this->id->setVisibility();
        $this->_title->setVisibility();
        $this->description->setVisibility();
        $this->category_id->setVisibility();
        $this->project_number->setVisibility();
        $this->featured_image->setVisibility();
        $this->is_featured->setVisibility();
        $this->project_date->setVisibility();
        $this->budget_amount->Visible = false;
        $this->created_at->setVisibility();
        $this->full_description->setVisibility();
        $this->objectives->setVisibility();
        $this->impact->setVisibility();
        $this->location->setVisibility();
        $this->start_date->setVisibility();
        $this->end_date->setVisibility();
        $this->status->setVisibility();
        $this->project_type->setVisibility();
        $this->municipality->setVisibility();
        $this->coordinates->setVisibility();
        $this->economic_impact->setVisibility();
    }

    // Constructor
    public function __construct()
    {
        parent::__construct();
        global $Language, $DashboardReport, $DebugTimer, $UserTable;
        $this->TableVar = 'projects';
        $this->TableName = 'projects';

        // Table CSS class
        $this->TableClass = "table table-striped table-bordered table-hover table-sm ew-desktop-table ew-edit-table";

        // Initialize
        $GLOBALS["Page"] = &$this;

        // Language object
        $Language = Container("app.language");

        // Table object (projects)
        if (!isset($GLOBALS["projects"]) || $GLOBALS["projects"]::class == PROJECT_NAMESPACE . "projects") {
            $GLOBALS["projects"] = &$this;
        }

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'projects');
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
                        $result["view"] = SameString($pageName, "ProjectsView"); // If View page, no primary button
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

    // Properties
    public $FormClassName = "ew-form ew-edit-form overlay-wrapper";
    public $IsModal = false;
    public $IsMobileOrModal = false;
    public $DbMasterFilter;
    public $DbDetailFilter;
    public $HashValue; // Hash Value
    public $DisplayRecords = 1;
    public $StartRecord;
    public $StopRecord;
    public $TotalRecords = 0;
    public $RecordRange = 10;
    public $RecordCount;

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

        // Check modal
        if ($this->IsModal) {
            $SkipHeaderFooter = true;
        }
        $this->IsMobileOrModal = IsMobile() || $this->IsModal;
        $loaded = false;
        $postBack = false;

        // Set up current action and primary key
        if (IsApi()) {
            // Load key values
            $loaded = true;
            if (($keyValue = Get("id") ?? Key(0) ?? Route(2)) !== null) {
                $this->id->setQueryStringValue($keyValue);
                $this->id->setOldValue($this->id->QueryStringValue);
            } elseif (Post("id") !== null) {
                $this->id->setFormValue(Post("id"));
                $this->id->setOldValue($this->id->FormValue);
            } else {
                $loaded = false; // Unable to load key
            }

            // Load record
            if ($loaded) {
                $loaded = $this->loadRow();
            }
            if (!$loaded) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
                $this->terminate();
                return;
            }
            $this->CurrentAction = "update"; // Update record directly
            $this->OldKey = $this->getKey(true); // Get from CurrentValue
            $postBack = true;
        } else {
            if (Post("action", "") !== "") {
                $this->CurrentAction = Post("action"); // Get action code
                if (!$this->isShow()) { // Not reload record, handle as postback
                    $postBack = true;
                }

                // Get key from Form
                $this->setKey(Post($this->OldKeyName), $this->isShow());
            } else {
                $this->CurrentAction = "show"; // Default action is display

                // Load key from QueryString
                $loadByQuery = false;
                if (($keyValue = Get("id") ?? Route("id")) !== null) {
                    $this->id->setQueryStringValue($keyValue);
                    $loadByQuery = true;
                } else {
                    $this->id->CurrentValue = null;
                }
            }

            // Load result set
            if ($this->isShow()) {
                    // Load current record
                    $loaded = $this->loadRow();
                $this->OldKey = $loaded ? $this->getKey(true) : ""; // Get from CurrentValue
            }
        }

        // Process form if post back
        if ($postBack) {
            $this->loadFormValues(); // Get form values
        }

        // Validate form if post back
        if ($postBack) {
            if (!$this->validateForm()) {
                $this->EventCancelled = true; // Event cancelled
                $this->restoreFormValues();
                if (IsApi()) {
                    $this->terminate();
                    return;
                } else {
                    $this->CurrentAction = ""; // Form error, reset action
                }
            }
        }

        // Perform current action
        switch ($this->CurrentAction) {
            case "show": // Get a record to display
                    if (!$loaded) { // Load record based on key
                        if ($this->getFailureMessage() == "") {
                            $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
                        }
                        $this->terminate("ProjectsList"); // No matching record, return to list
                        return;
                    }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "ProjectsList") {
                    $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                }
                $this->SendEmail = true; // Send email on update success
                if ($this->editRow()) { // Update record based on key
                    if ($this->getSuccessMessage() == "") {
                        $this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
                    }

                    // Handle UseAjaxActions with return page
                    if ($this->IsModal && $this->UseAjaxActions) {
                        $this->IsModal = false;
                        if (GetPageName($returnUrl) != "ProjectsList") {
                            Container("app.flash")->addMessage("Return-Url", $returnUrl); // Save return URL
                            $returnUrl = "ProjectsList"; // Return list page content
                        }
                    }
                    if (IsJsonResponse()) {
                        $this->terminate(true);
                        return;
                    } else {
                        $this->terminate($returnUrl); // Return to caller
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
                } elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
                    $this->terminate($returnUrl); // Return to caller
                    return;
                } else {
                    $this->EventCancelled = true; // Event cancelled
                    $this->restoreFormValues(); // Restore form values if update failed
                }
        }

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Render the record
        $this->RowType = RowType::EDIT; // Render as Edit
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

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;
        $validate = !Config("SERVER_VALIDATE");

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
        if (!$this->id->IsDetailKey) {
            $this->id->setFormValue($val);
        }

        // Check field name 'title' first before field var 'x__title'
        $val = $CurrentForm->hasValue("title") ? $CurrentForm->getValue("title") : $CurrentForm->getValue("x__title");
        if (!$this->_title->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_title->Visible = false; // Disable update for API request
            } else {
                $this->_title->setFormValue($val);
            }
        }

        // Check field name 'description' first before field var 'x_description'
        $val = $CurrentForm->hasValue("description") ? $CurrentForm->getValue("description") : $CurrentForm->getValue("x_description");
        if (!$this->description->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->description->Visible = false; // Disable update for API request
            } else {
                $this->description->setFormValue($val);
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

        // Check field name 'project_number' first before field var 'x_project_number'
        $val = $CurrentForm->hasValue("project_number") ? $CurrentForm->getValue("project_number") : $CurrentForm->getValue("x_project_number");
        if (!$this->project_number->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->project_number->Visible = false; // Disable update for API request
            } else {
                $this->project_number->setFormValue($val, true, $validate);
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

        // Check field name 'project_date' first before field var 'x_project_date'
        $val = $CurrentForm->hasValue("project_date") ? $CurrentForm->getValue("project_date") : $CurrentForm->getValue("x_project_date");
        if (!$this->project_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->project_date->Visible = false; // Disable update for API request
            } else {
                $this->project_date->setFormValue($val, true, $validate);
            }
            $this->project_date->CurrentValue = UnFormatDateTime($this->project_date->CurrentValue, $this->project_date->formatPattern());
        }

        // Check field name 'created_at' first before field var 'x_created_at'
        $val = $CurrentForm->hasValue("created_at") ? $CurrentForm->getValue("created_at") : $CurrentForm->getValue("x_created_at");
        if (!$this->created_at->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->created_at->Visible = false; // Disable update for API request
            } else {
                $this->created_at->setFormValue($val, true, $validate);
            }
            $this->created_at->CurrentValue = UnFormatDateTime($this->created_at->CurrentValue, $this->created_at->formatPattern());
        }

        // Check field name 'full_description' first before field var 'x_full_description'
        $val = $CurrentForm->hasValue("full_description") ? $CurrentForm->getValue("full_description") : $CurrentForm->getValue("x_full_description");
        if (!$this->full_description->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->full_description->Visible = false; // Disable update for API request
            } else {
                $this->full_description->setFormValue($val);
            }
        }

        // Check field name 'objectives' first before field var 'x_objectives'
        $val = $CurrentForm->hasValue("objectives") ? $CurrentForm->getValue("objectives") : $CurrentForm->getValue("x_objectives");
        if (!$this->objectives->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->objectives->Visible = false; // Disable update for API request
            } else {
                $this->objectives->setFormValue($val);
            }
        }

        // Check field name 'impact' first before field var 'x_impact'
        $val = $CurrentForm->hasValue("impact") ? $CurrentForm->getValue("impact") : $CurrentForm->getValue("x_impact");
        if (!$this->impact->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->impact->Visible = false; // Disable update for API request
            } else {
                $this->impact->setFormValue($val);
            }
        }

        // Check field name 'location' first before field var 'x_location'
        $val = $CurrentForm->hasValue("location") ? $CurrentForm->getValue("location") : $CurrentForm->getValue("x_location");
        if (!$this->location->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->location->Visible = false; // Disable update for API request
            } else {
                $this->location->setFormValue($val);
            }
        }

        // Check field name 'start_date' first before field var 'x_start_date'
        $val = $CurrentForm->hasValue("start_date") ? $CurrentForm->getValue("start_date") : $CurrentForm->getValue("x_start_date");
        if (!$this->start_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->start_date->Visible = false; // Disable update for API request
            } else {
                $this->start_date->setFormValue($val, true, $validate);
            }
            $this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, $this->start_date->formatPattern());
        }

        // Check field name 'end_date' first before field var 'x_end_date'
        $val = $CurrentForm->hasValue("end_date") ? $CurrentForm->getValue("end_date") : $CurrentForm->getValue("x_end_date");
        if (!$this->end_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->end_date->Visible = false; // Disable update for API request
            } else {
                $this->end_date->setFormValue($val, true, $validate);
            }
            $this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, $this->end_date->formatPattern());
        }

        // Check field name 'status' first before field var 'x_status'
        $val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
        if (!$this->status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->status->Visible = false; // Disable update for API request
            } else {
                $this->status->setFormValue($val);
            }
        }

        // Check field name 'project_type' first before field var 'x_project_type'
        $val = $CurrentForm->hasValue("project_type") ? $CurrentForm->getValue("project_type") : $CurrentForm->getValue("x_project_type");
        if (!$this->project_type->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->project_type->Visible = false; // Disable update for API request
            } else {
                $this->project_type->setFormValue($val);
            }
        }

        // Check field name 'municipality' first before field var 'x_municipality'
        $val = $CurrentForm->hasValue("municipality") ? $CurrentForm->getValue("municipality") : $CurrentForm->getValue("x_municipality");
        if (!$this->municipality->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->municipality->Visible = false; // Disable update for API request
            } else {
                $this->municipality->setFormValue($val);
            }
        }

        // Check field name 'coordinates' first before field var 'x_coordinates'
        $val = $CurrentForm->hasValue("coordinates") ? $CurrentForm->getValue("coordinates") : $CurrentForm->getValue("x_coordinates");
        if (!$this->coordinates->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->coordinates->Visible = false; // Disable update for API request
            } else {
                $this->coordinates->setFormValue($val);
            }
        }

        // Check field name 'economic_impact' first before field var 'x_economic_impact'
        $val = $CurrentForm->hasValue("economic_impact") ? $CurrentForm->getValue("economic_impact") : $CurrentForm->getValue("x_economic_impact");
        if (!$this->economic_impact->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->economic_impact->Visible = false; // Disable update for API request
            } else {
                $this->economic_impact->setFormValue($val);
            }
        }
		$this->featured_image->OldUploadPath = $this->featured_image->getUploadPath(); // PHP
		$this->featured_image->UploadPath = $this->featured_image->OldUploadPath;
        $this->getUploadFiles(); // Get upload files
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->_title->CurrentValue = $this->_title->FormValue;
        $this->description->CurrentValue = $this->description->FormValue;
        $this->category_id->CurrentValue = $this->category_id->FormValue;
        $this->project_number->CurrentValue = $this->project_number->FormValue;
        $this->is_featured->CurrentValue = $this->is_featured->FormValue;
        $this->project_date->CurrentValue = $this->project_date->FormValue;
        $this->project_date->CurrentValue = UnFormatDateTime($this->project_date->CurrentValue, $this->project_date->formatPattern());
        $this->created_at->CurrentValue = $this->created_at->FormValue;
        $this->created_at->CurrentValue = UnFormatDateTime($this->created_at->CurrentValue, $this->created_at->formatPattern());
        $this->full_description->CurrentValue = $this->full_description->FormValue;
        $this->objectives->CurrentValue = $this->objectives->FormValue;
        $this->impact->CurrentValue = $this->impact->FormValue;
        $this->location->CurrentValue = $this->location->FormValue;
        $this->start_date->CurrentValue = $this->start_date->FormValue;
        $this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, $this->start_date->formatPattern());
        $this->end_date->CurrentValue = $this->end_date->FormValue;
        $this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, $this->end_date->formatPattern());
        $this->status->CurrentValue = $this->status->FormValue;
        $this->project_type->CurrentValue = $this->project_type->FormValue;
        $this->municipality->CurrentValue = $this->municipality->FormValue;
        $this->coordinates->CurrentValue = $this->coordinates->FormValue;
        $this->economic_impact->CurrentValue = $this->economic_impact->FormValue;
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
        $this->description->setDbValue($row['description']);
        $this->category_id->setDbValue($row['category_id']);
        $this->project_number->setDbValue($row['project_number']);
        $this->featured_image->Upload->DbValue = $row['featured_image'];
        $this->featured_image->setDbValue($this->featured_image->Upload->DbValue);
        $this->is_featured->setDbValue((ConvertToBool($row['is_featured']) ? "1" : "0"));
        $this->project_date->setDbValue($row['project_date']);
        $this->budget_amount->setDbValue($row['budget_amount']);
        $this->created_at->setDbValue($row['created_at']);
        $this->full_description->setDbValue($row['full_description']);
        $this->objectives->setDbValue($row['objectives']);
        $this->impact->setDbValue($row['impact']);
        $this->location->setDbValue($row['location']);
        $this->start_date->setDbValue($row['start_date']);
        $this->end_date->setDbValue($row['end_date']);
        $this->status->setDbValue($row['status']);
        $this->project_type->setDbValue($row['project_type']);
        $this->municipality->setDbValue($row['municipality']);
        $this->coordinates->setDbValue($row['coordinates']);
        $this->economic_impact->setDbValue($row['economic_impact']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = $this->id->DefaultValue;
        $row['title'] = $this->_title->DefaultValue;
        $row['description'] = $this->description->DefaultValue;
        $row['category_id'] = $this->category_id->DefaultValue;
        $row['project_number'] = $this->project_number->DefaultValue;
        $row['featured_image'] = $this->featured_image->DefaultValue;
        $row['is_featured'] = $this->is_featured->DefaultValue;
        $row['project_date'] = $this->project_date->DefaultValue;
        $row['budget_amount'] = $this->budget_amount->DefaultValue;
        $row['created_at'] = $this->created_at->DefaultValue;
        $row['full_description'] = $this->full_description->DefaultValue;
        $row['objectives'] = $this->objectives->DefaultValue;
        $row['impact'] = $this->impact->DefaultValue;
        $row['location'] = $this->location->DefaultValue;
        $row['start_date'] = $this->start_date->DefaultValue;
        $row['end_date'] = $this->end_date->DefaultValue;
        $row['status'] = $this->status->DefaultValue;
        $row['project_type'] = $this->project_type->DefaultValue;
        $row['municipality'] = $this->municipality->DefaultValue;
        $row['coordinates'] = $this->coordinates->DefaultValue;
        $row['economic_impact'] = $this->economic_impact->DefaultValue;
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

        // description
        $this->description->RowCssClass = "row";

        // category_id
        $this->category_id->RowCssClass = "row";

        // project_number
        $this->project_number->RowCssClass = "row";

        // featured_image
        $this->featured_image->RowCssClass = "row";

        // is_featured
        $this->is_featured->RowCssClass = "row";

        // project_date
        $this->project_date->RowCssClass = "row";

        // budget_amount
        $this->budget_amount->RowCssClass = "row";

        // created_at
        $this->created_at->RowCssClass = "row";

        // full_description
        $this->full_description->RowCssClass = "row";

        // objectives
        $this->objectives->RowCssClass = "row";

        // impact
        $this->impact->RowCssClass = "row";

        // location
        $this->location->RowCssClass = "row";

        // start_date
        $this->start_date->RowCssClass = "row";

        // end_date
        $this->end_date->RowCssClass = "row";

        // status
        $this->status->RowCssClass = "row";

        // project_type
        $this->project_type->RowCssClass = "row";

        // municipality
        $this->municipality->RowCssClass = "row";

        // coordinates
        $this->coordinates->RowCssClass = "row";

        // economic_impact
        $this->economic_impact->RowCssClass = "row";

        // View row
        if ($this->RowType == RowType::VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;

            // title
            $this->_title->ViewValue = $this->_title->CurrentValue;

            // description
            $this->description->ViewValue = $this->description->CurrentValue;

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

            // project_number
            $this->project_number->ViewValue = $this->project_number->CurrentValue;
            $this->project_number->ViewValue = FormatNumber($this->project_number->ViewValue, $this->project_number->formatPattern());

            // featured_image
            $this->featured_image->UploadPath = $this->featured_image->getUploadPath(); // PHP
            if (!EmptyValue($this->featured_image->Upload->DbValue)) {
                $this->featured_image->ImageWidth = 40;
                $this->featured_image->ImageHeight = 40;
                $this->featured_image->ImageAlt = $this->featured_image->alt();
                $this->featured_image->ImageCssClass = "ew-image";
                $this->featured_image->ViewValue = $this->featured_image->Upload->DbValue;
            } else {
                $this->featured_image->ViewValue = "";
            }

            // is_featured
            if (ConvertToBool($this->is_featured->CurrentValue)) {
                $this->is_featured->ViewValue = $this->is_featured->tagCaption(1) != "" ? $this->is_featured->tagCaption(1) : "Yes";
            } else {
                $this->is_featured->ViewValue = $this->is_featured->tagCaption(2) != "" ? $this->is_featured->tagCaption(2) : "No";
            }

            // project_date
            $this->project_date->ViewValue = $this->project_date->CurrentValue;
            $this->project_date->ViewValue = FormatDateTime($this->project_date->ViewValue, $this->project_date->formatPattern());

            // budget_amount
            $this->budget_amount->ViewValue = $this->budget_amount->CurrentValue;
            $this->budget_amount->ViewValue = FormatNumber($this->budget_amount->ViewValue, $this->budget_amount->formatPattern());

            // created_at
            $this->created_at->ViewValue = $this->created_at->CurrentValue;
            $this->created_at->ViewValue = FormatDateTime($this->created_at->ViewValue, $this->created_at->formatPattern());

            // full_description
            $this->full_description->ViewValue = $this->full_description->CurrentValue;

            // objectives
            $this->objectives->ViewValue = $this->objectives->CurrentValue;

            // impact
            $this->impact->ViewValue = $this->impact->CurrentValue;

            // location
            $this->location->ViewValue = $this->location->CurrentValue;

            // start_date
            $this->start_date->ViewValue = $this->start_date->CurrentValue;
            $this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, $this->start_date->formatPattern());

            // end_date
            $this->end_date->ViewValue = $this->end_date->CurrentValue;
            $this->end_date->ViewValue = FormatDateTime($this->end_date->ViewValue, $this->end_date->formatPattern());

            // status
            $this->status->ViewValue = $this->status->CurrentValue;

            // project_type
            $this->project_type->ViewValue = $this->project_type->CurrentValue;

            // municipality
            $this->municipality->ViewValue = $this->municipality->CurrentValue;

            // coordinates
            $this->coordinates->ViewValue = $this->coordinates->CurrentValue;

            // economic_impact
            $this->economic_impact->ViewValue = $this->economic_impact->CurrentValue;

            // id
            $this->id->HrefValue = "";

            // title
            $this->_title->HrefValue = "";

            // description
            $this->description->HrefValue = "";

            // category_id
            $this->category_id->HrefValue = "";

            // project_number
            $this->project_number->HrefValue = "";

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

            // is_featured
            $this->is_featured->HrefValue = "";

            // project_date
            $this->project_date->HrefValue = "";

            // created_at
            $this->created_at->HrefValue = "";

            // full_description
            $this->full_description->HrefValue = "";

            // objectives
            $this->objectives->HrefValue = "";

            // impact
            $this->impact->HrefValue = "";

            // location
            $this->location->HrefValue = "";

            // start_date
            $this->start_date->HrefValue = "";

            // end_date
            $this->end_date->HrefValue = "";

            // status
            $this->status->HrefValue = "";

            // project_type
            $this->project_type->HrefValue = "";

            // municipality
            $this->municipality->HrefValue = "";

            // coordinates
            $this->coordinates->HrefValue = "";

            // economic_impact
            $this->economic_impact->HrefValue = "";
        } elseif ($this->RowType == RowType::EDIT) {
            // id
            $this->id->setupEditAttributes();
            $this->id->EditValue = $this->id->CurrentValue;

            // title
            $this->_title->setupEditAttributes();
            if (!$this->_title->Raw) {
                $this->_title->CurrentValue = HtmlDecode($this->_title->CurrentValue);
            }
            $this->_title->EditValue = HtmlEncode($this->_title->CurrentValue);
            $this->_title->PlaceHolder = RemoveHtml($this->_title->caption());

            // description
            $this->description->setupEditAttributes();
            $this->description->EditValue = HtmlEncode($this->description->CurrentValue);
            $this->description->PlaceHolder = RemoveHtml($this->description->caption());

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

            // project_number
            $this->project_number->setupEditAttributes();
            $this->project_number->EditValue = $this->project_number->CurrentValue;
            $this->project_number->PlaceHolder = RemoveHtml($this->project_number->caption());
            if (strval($this->project_number->EditValue) != "" && is_numeric($this->project_number->EditValue)) {
                $this->project_number->EditValue = FormatNumber($this->project_number->EditValue, null);
            }

            // featured_image
            $this->featured_image->setupEditAttributes();
            $this->featured_image->UploadPath = $this->featured_image->getUploadPath(); // PHP
            if (!EmptyValue($this->featured_image->Upload->DbValue)) {
                $this->featured_image->ImageWidth = 40;
                $this->featured_image->ImageHeight = 40;
                $this->featured_image->ImageAlt = $this->featured_image->alt();
                $this->featured_image->ImageCssClass = "ew-image";
                $this->featured_image->EditValue = $this->featured_image->Upload->DbValue;
            } else {
                $this->featured_image->EditValue = "";
            }
            if (!EmptyValue($this->featured_image->CurrentValue)) {
                $this->featured_image->Upload->FileName = $this->featured_image->CurrentValue;
            }
            if ($this->isShow()) {
                RenderUploadField($this->featured_image);
            }

            // is_featured
            $this->is_featured->EditValue = $this->is_featured->options(false);
            $this->is_featured->PlaceHolder = RemoveHtml($this->is_featured->caption());

            // project_date
            $this->project_date->setupEditAttributes();
            $this->project_date->EditValue = HtmlEncode(FormatDateTime($this->project_date->CurrentValue, $this->project_date->formatPattern()));
            $this->project_date->PlaceHolder = RemoveHtml($this->project_date->caption());

            // created_at
            $this->created_at->setupEditAttributes();
            $this->created_at->EditValue = HtmlEncode(FormatDateTime($this->created_at->CurrentValue, $this->created_at->formatPattern()));
            $this->created_at->PlaceHolder = RemoveHtml($this->created_at->caption());

            // full_description
            $this->full_description->setupEditAttributes();
            $this->full_description->EditValue = HtmlEncode($this->full_description->CurrentValue);
            $this->full_description->PlaceHolder = RemoveHtml($this->full_description->caption());

            // objectives
            $this->objectives->setupEditAttributes();
            $this->objectives->EditValue = HtmlEncode($this->objectives->CurrentValue);
            $this->objectives->PlaceHolder = RemoveHtml($this->objectives->caption());

            // impact
            $this->impact->setupEditAttributes();
            $this->impact->EditValue = HtmlEncode($this->impact->CurrentValue);
            $this->impact->PlaceHolder = RemoveHtml($this->impact->caption());

            // location
            $this->location->setupEditAttributes();
            if (!$this->location->Raw) {
                $this->location->CurrentValue = HtmlDecode($this->location->CurrentValue);
            }
            $this->location->EditValue = HtmlEncode($this->location->CurrentValue);
            $this->location->PlaceHolder = RemoveHtml($this->location->caption());

            // start_date
            $this->start_date->setupEditAttributes();
            $this->start_date->EditValue = HtmlEncode(FormatDateTime($this->start_date->CurrentValue, $this->start_date->formatPattern()));
            $this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

            // end_date
            $this->end_date->setupEditAttributes();
            $this->end_date->EditValue = HtmlEncode(FormatDateTime($this->end_date->CurrentValue, $this->end_date->formatPattern()));
            $this->end_date->PlaceHolder = RemoveHtml($this->end_date->caption());

            // status
            $this->status->setupEditAttributes();
            if (!$this->status->Raw) {
                $this->status->CurrentValue = HtmlDecode($this->status->CurrentValue);
            }
            $this->status->EditValue = HtmlEncode($this->status->CurrentValue);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // project_type
            $this->project_type->setupEditAttributes();
            if (!$this->project_type->Raw) {
                $this->project_type->CurrentValue = HtmlDecode($this->project_type->CurrentValue);
            }
            $this->project_type->EditValue = HtmlEncode($this->project_type->CurrentValue);
            $this->project_type->PlaceHolder = RemoveHtml($this->project_type->caption());

            // municipality
            $this->municipality->setupEditAttributes();
            if (!$this->municipality->Raw) {
                $this->municipality->CurrentValue = HtmlDecode($this->municipality->CurrentValue);
            }
            $this->municipality->EditValue = HtmlEncode($this->municipality->CurrentValue);
            $this->municipality->PlaceHolder = RemoveHtml($this->municipality->caption());

            // coordinates
            $this->coordinates->setupEditAttributes();
            if (!$this->coordinates->Raw) {
                $this->coordinates->CurrentValue = HtmlDecode($this->coordinates->CurrentValue);
            }
            $this->coordinates->EditValue = HtmlEncode($this->coordinates->CurrentValue);
            $this->coordinates->PlaceHolder = RemoveHtml($this->coordinates->caption());

            // economic_impact
            $this->economic_impact->setupEditAttributes();
            $this->economic_impact->EditValue = HtmlEncode($this->economic_impact->CurrentValue);
            $this->economic_impact->PlaceHolder = RemoveHtml($this->economic_impact->caption());

            // Edit refer script

            // id
            $this->id->HrefValue = "";

            // title
            $this->_title->HrefValue = "";

            // description
            $this->description->HrefValue = "";

            // category_id
            $this->category_id->HrefValue = "";

            // project_number
            $this->project_number->HrefValue = "";

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

            // is_featured
            $this->is_featured->HrefValue = "";

            // project_date
            $this->project_date->HrefValue = "";

            // created_at
            $this->created_at->HrefValue = "";

            // full_description
            $this->full_description->HrefValue = "";

            // objectives
            $this->objectives->HrefValue = "";

            // impact
            $this->impact->HrefValue = "";

            // location
            $this->location->HrefValue = "";

            // start_date
            $this->start_date->HrefValue = "";

            // end_date
            $this->end_date->HrefValue = "";

            // status
            $this->status->HrefValue = "";

            // project_type
            $this->project_type->HrefValue = "";

            // municipality
            $this->municipality->HrefValue = "";

            // coordinates
            $this->coordinates->HrefValue = "";

            // economic_impact
            $this->economic_impact->HrefValue = "";
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
            if ($this->id->Visible && $this->id->Required) {
                if (!$this->id->IsDetailKey && EmptyValue($this->id->FormValue)) {
                    $this->id->addErrorMessage(str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
                }
            }
            if ($this->_title->Visible && $this->_title->Required) {
                if (!$this->_title->IsDetailKey && EmptyValue($this->_title->FormValue)) {
                    $this->_title->addErrorMessage(str_replace("%s", $this->_title->caption(), $this->_title->RequiredErrorMessage));
                }
            }
            if ($this->description->Visible && $this->description->Required) {
                if (!$this->description->IsDetailKey && EmptyValue($this->description->FormValue)) {
                    $this->description->addErrorMessage(str_replace("%s", $this->description->caption(), $this->description->RequiredErrorMessage));
                }
            }
            if ($this->category_id->Visible && $this->category_id->Required) {
                if (!$this->category_id->IsDetailKey && EmptyValue($this->category_id->FormValue)) {
                    $this->category_id->addErrorMessage(str_replace("%s", $this->category_id->caption(), $this->category_id->RequiredErrorMessage));
                }
            }
            if ($this->project_number->Visible && $this->project_number->Required) {
                if (!$this->project_number->IsDetailKey && EmptyValue($this->project_number->FormValue)) {
                    $this->project_number->addErrorMessage(str_replace("%s", $this->project_number->caption(), $this->project_number->RequiredErrorMessage));
                }
            }
            if (!CheckInteger($this->project_number->FormValue)) {
                $this->project_number->addErrorMessage($this->project_number->getErrorMessage(false));
            }
            if ($this->featured_image->Visible && $this->featured_image->Required) {
                if ($this->featured_image->Upload->FileName == "" && !$this->featured_image->Upload->KeepFile) {
                    $this->featured_image->addErrorMessage(str_replace("%s", $this->featured_image->caption(), $this->featured_image->RequiredErrorMessage));
                }
            }
            if ($this->is_featured->Visible && $this->is_featured->Required) {
                if ($this->is_featured->FormValue == "") {
                    $this->is_featured->addErrorMessage(str_replace("%s", $this->is_featured->caption(), $this->is_featured->RequiredErrorMessage));
                }
            }
            if ($this->project_date->Visible && $this->project_date->Required) {
                if (!$this->project_date->IsDetailKey && EmptyValue($this->project_date->FormValue)) {
                    $this->project_date->addErrorMessage(str_replace("%s", $this->project_date->caption(), $this->project_date->RequiredErrorMessage));
                }
            }
            if (!CheckDate($this->project_date->FormValue, $this->project_date->formatPattern())) {
                $this->project_date->addErrorMessage($this->project_date->getErrorMessage(false));
            }
            if ($this->created_at->Visible && $this->created_at->Required) {
                if (!$this->created_at->IsDetailKey && EmptyValue($this->created_at->FormValue)) {
                    $this->created_at->addErrorMessage(str_replace("%s", $this->created_at->caption(), $this->created_at->RequiredErrorMessage));
                }
            }
            if (!CheckDate($this->created_at->FormValue, $this->created_at->formatPattern())) {
                $this->created_at->addErrorMessage($this->created_at->getErrorMessage(false));
            }
            if ($this->full_description->Visible && $this->full_description->Required) {
                if (!$this->full_description->IsDetailKey && EmptyValue($this->full_description->FormValue)) {
                    $this->full_description->addErrorMessage(str_replace("%s", $this->full_description->caption(), $this->full_description->RequiredErrorMessage));
                }
            }
            if ($this->objectives->Visible && $this->objectives->Required) {
                if (!$this->objectives->IsDetailKey && EmptyValue($this->objectives->FormValue)) {
                    $this->objectives->addErrorMessage(str_replace("%s", $this->objectives->caption(), $this->objectives->RequiredErrorMessage));
                }
            }
            if ($this->impact->Visible && $this->impact->Required) {
                if (!$this->impact->IsDetailKey && EmptyValue($this->impact->FormValue)) {
                    $this->impact->addErrorMessage(str_replace("%s", $this->impact->caption(), $this->impact->RequiredErrorMessage));
                }
            }
            if ($this->location->Visible && $this->location->Required) {
                if (!$this->location->IsDetailKey && EmptyValue($this->location->FormValue)) {
                    $this->location->addErrorMessage(str_replace("%s", $this->location->caption(), $this->location->RequiredErrorMessage));
                }
            }
            if ($this->start_date->Visible && $this->start_date->Required) {
                if (!$this->start_date->IsDetailKey && EmptyValue($this->start_date->FormValue)) {
                    $this->start_date->addErrorMessage(str_replace("%s", $this->start_date->caption(), $this->start_date->RequiredErrorMessage));
                }
            }
            if (!CheckDate($this->start_date->FormValue, $this->start_date->formatPattern())) {
                $this->start_date->addErrorMessage($this->start_date->getErrorMessage(false));
            }
            if ($this->end_date->Visible && $this->end_date->Required) {
                if (!$this->end_date->IsDetailKey && EmptyValue($this->end_date->FormValue)) {
                    $this->end_date->addErrorMessage(str_replace("%s", $this->end_date->caption(), $this->end_date->RequiredErrorMessage));
                }
            }
            if (!CheckDate($this->end_date->FormValue, $this->end_date->formatPattern())) {
                $this->end_date->addErrorMessage($this->end_date->getErrorMessage(false));
            }
            if ($this->status->Visible && $this->status->Required) {
                if (!$this->status->IsDetailKey && EmptyValue($this->status->FormValue)) {
                    $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
                }
            }
            if ($this->project_type->Visible && $this->project_type->Required) {
                if (!$this->project_type->IsDetailKey && EmptyValue($this->project_type->FormValue)) {
                    $this->project_type->addErrorMessage(str_replace("%s", $this->project_type->caption(), $this->project_type->RequiredErrorMessage));
                }
            }
            if ($this->municipality->Visible && $this->municipality->Required) {
                if (!$this->municipality->IsDetailKey && EmptyValue($this->municipality->FormValue)) {
                    $this->municipality->addErrorMessage(str_replace("%s", $this->municipality->caption(), $this->municipality->RequiredErrorMessage));
                }
            }
            if ($this->coordinates->Visible && $this->coordinates->Required) {
                if (!$this->coordinates->IsDetailKey && EmptyValue($this->coordinates->FormValue)) {
                    $this->coordinates->addErrorMessage(str_replace("%s", $this->coordinates->caption(), $this->coordinates->RequiredErrorMessage));
                }
            }
            if ($this->economic_impact->Visible && $this->economic_impact->Required) {
                if (!$this->economic_impact->IsDetailKey && EmptyValue($this->economic_impact->FormValue)) {
                    $this->economic_impact->addErrorMessage(str_replace("%s", $this->economic_impact->caption(), $this->economic_impact->RequiredErrorMessage));
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

    // Update record based on key values
    protected function editRow()
    {
        global $Security, $Language;
        $oldKeyFilter = $this->getRecordFilter();
        $filter = $this->applyUserIDFilters($oldKeyFilter);
        $conn = $this->getConnection();

        // Load old row
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $rsold = $conn->fetchAssociative($sql);
        if (!$rsold) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
            return false; // Update Failed
        } else {
            // Load old values
            $this->loadDbValues($rsold);
        }

        // Get new row
        $rsnew = $this->getEditRow($rsold);

        // Update current values
        $this->setCurrentValues($rsnew);
        if ($this->featured_image->Visible && !$this->featured_image->Upload->KeepFile) {
            $this->featured_image->UploadPath = $this->featured_image->getUploadPath();
            if (!EmptyValue($this->featured_image->Upload->FileName)) {
                FixUploadFileNames($this->featured_image);
                $this->featured_image->setDbValueDef($rsnew, $this->featured_image->Upload->FileName, $this->featured_image->ReadOnly);
            }
        }

        // Call Row Updating event
        $updateRow = $this->rowUpdating($rsold, $rsnew);
        if ($updateRow) {
            if (count($rsnew) > 0) {
                $this->CurrentFilter = $filter; // Set up current filter
                $editRow = $this->update($rsnew, "", $rsold);
                if (!$editRow && !EmptyValue($this->DbErrorMessage)) { // Show database error
                    $this->setFailureMessage($this->DbErrorMessage);
                }
            } else {
                $editRow = true; // No field to update
            }
            if ($editRow) {
                if ($this->featured_image->Visible && !$this->featured_image->Upload->KeepFile) {
                    if (!SaveUploadFiles($this->featured_image, $rsnew['featured_image'], false)) {
                        $this->setFailureMessage($Language->phrase("UploadError7"));
                        return false;
                    }
                }
            }
        } else {
            if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                // Use the message, do nothing
            } elseif ($this->CancelMessage != "") {
                $this->setFailureMessage($this->CancelMessage);
                $this->CancelMessage = "";
            } else {
                $this->setFailureMessage($Language->phrase("UpdateCancelled"));
            }
            $editRow = false;
        }

        // Call Row_Updated event
        if ($editRow) {
            $this->rowUpdated($rsold, $rsnew);
        }

        // Write JSON response
        if (IsJsonResponse() && $editRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            $table = $this->TableVar;
            WriteJson(["success" => true, "action" => Config("API_EDIT_ACTION"), $table => $row]);
        }
        return $editRow;
    }

    /**
     * Get edit row
     *
     * @return array
     */
    protected function getEditRow($rsold)
    {
        global $Security;
        $this->featured_image->OldUploadPath = $this->featured_image->getUploadPath(); // PHP
        $this->featured_image->UploadPath = $this->featured_image->OldUploadPath;
        $rsnew = [];

        // title
        $this->_title->setDbValueDef($rsnew, $this->_title->CurrentValue, $this->_title->ReadOnly);

        // description
        $this->description->setDbValueDef($rsnew, $this->description->CurrentValue, $this->description->ReadOnly);

        // category_id
        $this->category_id->setDbValueDef($rsnew, $this->category_id->CurrentValue, $this->category_id->ReadOnly);

        // project_number
        $this->project_number->setDbValueDef($rsnew, $this->project_number->CurrentValue, $this->project_number->ReadOnly);

        // featured_image
        if ($this->featured_image->Visible && !$this->featured_image->ReadOnly && !$this->featured_image->Upload->KeepFile) {
            if ($this->featured_image->Upload->FileName == "") {
                $rsnew['featured_image'] = null;
            } else {
                FixUploadTempFileNames($this->featured_image);
                $rsnew['featured_image'] = $this->featured_image->Upload->FileName;
            }
        }

        // is_featured
        $tmpBool = $this->is_featured->CurrentValue;
        if ($tmpBool != "1" && $tmpBool != "0") {
            $tmpBool = !empty($tmpBool) ? "1" : "0";
        }
        $this->is_featured->setDbValueDef($rsnew, $tmpBool, $this->is_featured->ReadOnly);

        // project_date
        $this->project_date->setDbValueDef($rsnew, UnFormatDateTime($this->project_date->CurrentValue, $this->project_date->formatPattern()), $this->project_date->ReadOnly);

        // created_at
        $this->created_at->setDbValueDef($rsnew, UnFormatDateTime($this->created_at->CurrentValue, $this->created_at->formatPattern()), $this->created_at->ReadOnly);

        // full_description
        $this->full_description->setDbValueDef($rsnew, $this->full_description->CurrentValue, $this->full_description->ReadOnly);

        // objectives
        $this->objectives->setDbValueDef($rsnew, $this->objectives->CurrentValue, $this->objectives->ReadOnly);

        // impact
        $this->impact->setDbValueDef($rsnew, $this->impact->CurrentValue, $this->impact->ReadOnly);

        // location
        $this->location->setDbValueDef($rsnew, $this->location->CurrentValue, $this->location->ReadOnly);

        // start_date
        $this->start_date->setDbValueDef($rsnew, UnFormatDateTime($this->start_date->CurrentValue, $this->start_date->formatPattern()), $this->start_date->ReadOnly);

        // end_date
        $this->end_date->setDbValueDef($rsnew, UnFormatDateTime($this->end_date->CurrentValue, $this->end_date->formatPattern()), $this->end_date->ReadOnly);

        // status
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, $this->status->ReadOnly);

        // project_type
        $this->project_type->setDbValueDef($rsnew, $this->project_type->CurrentValue, $this->project_type->ReadOnly);

        // municipality
        $this->municipality->setDbValueDef($rsnew, $this->municipality->CurrentValue, $this->municipality->ReadOnly);

        // coordinates
        $this->coordinates->setDbValueDef($rsnew, $this->coordinates->CurrentValue, $this->coordinates->ReadOnly);

        // economic_impact
        $this->economic_impact->setDbValueDef($rsnew, $this->economic_impact->CurrentValue, $this->economic_impact->ReadOnly);
        return $rsnew;
    }

    /**
     * Restore edit form from row
     * @param array $row Row
     */
    protected function restoreEditFormFromRow($row)
    {
        if (isset($row['title'])) { // title
            $this->_title->CurrentValue = $row['title'];
        }
        if (isset($row['description'])) { // description
            $this->description->CurrentValue = $row['description'];
        }
        if (isset($row['category_id'])) { // category_id
            $this->category_id->CurrentValue = $row['category_id'];
        }
        if (isset($row['project_number'])) { // project_number
            $this->project_number->CurrentValue = $row['project_number'];
        }
        if (isset($row['featured_image'])) { // featured_image
            $this->featured_image->CurrentValue = $row['featured_image'];
        }
        if (isset($row['is_featured'])) { // is_featured
            $this->is_featured->CurrentValue = $row['is_featured'];
        }
        if (isset($row['project_date'])) { // project_date
            $this->project_date->CurrentValue = $row['project_date'];
        }
        if (isset($row['created_at'])) { // created_at
            $this->created_at->CurrentValue = $row['created_at'];
        }
        if (isset($row['full_description'])) { // full_description
            $this->full_description->CurrentValue = $row['full_description'];
        }
        if (isset($row['objectives'])) { // objectives
            $this->objectives->CurrentValue = $row['objectives'];
        }
        if (isset($row['impact'])) { // impact
            $this->impact->CurrentValue = $row['impact'];
        }
        if (isset($row['location'])) { // location
            $this->location->CurrentValue = $row['location'];
        }
        if (isset($row['start_date'])) { // start_date
            $this->start_date->CurrentValue = $row['start_date'];
        }
        if (isset($row['end_date'])) { // end_date
            $this->end_date->CurrentValue = $row['end_date'];
        }
        if (isset($row['status'])) { // status
            $this->status->CurrentValue = $row['status'];
        }
        if (isset($row['project_type'])) { // project_type
            $this->project_type->CurrentValue = $row['project_type'];
        }
        if (isset($row['municipality'])) { // municipality
            $this->municipality->CurrentValue = $row['municipality'];
        }
        if (isset($row['coordinates'])) { // coordinates
            $this->coordinates->CurrentValue = $row['coordinates'];
        }
        if (isset($row['economic_impact'])) { // economic_impact
            $this->economic_impact->CurrentValue = $row['economic_impact'];
        }
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ProjectsList"), "", $this->TableVar, true);
        $pageId = "edit";
        $Breadcrumb->add("edit", $pageId, $url);
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

    // Set up starting record parameters
    public function setupStartRecord()
    {
        if ($this->DisplayRecords == 0) {
            return;
        }
        $pageNo = Get(Config("TABLE_PAGE_NUMBER"));
        $startRec = Get(Config("TABLE_START_REC"));
        $infiniteScroll = false;
        $recordNo = $pageNo ?? $startRec; // Record number = page number or start record
        if ($recordNo !== null && is_numeric($recordNo)) {
            $this->StartRecord = $recordNo;
        } else {
            $this->StartRecord = $this->getStartRecordNumber();
        }

        // Check if correct start record counter
        if (!is_numeric($this->StartRecord) || intval($this->StartRecord) <= 0) { // Avoid invalid start record counter
            $this->StartRecord = 1; // Reset start record counter
        } elseif ($this->StartRecord > $this->TotalRecords) { // Avoid starting record > total records
            $this->StartRecord = (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1; // Point to last page first record
        } elseif (($this->StartRecord - 1) % $this->DisplayRecords != 0) {
            $this->StartRecord = (int)(($this->StartRecord - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1; // Point to page boundary
        }
        if (!$infiniteScroll) {
            $this->setStartRecordNumber($this->StartRecord);
        }
    }

    // Get page count
    public function pageCount() {
        return ceil($this->TotalRecords / $this->DisplayRecords);
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
