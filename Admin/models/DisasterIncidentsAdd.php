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
class DisasterIncidentsAdd extends DisasterIncidents
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Page object name
    public $PageObjName = "DisasterIncidentsAdd";

    // View file path
    public $View = null;

    // Title
    public $Title = null; // Title for <title> tag

    // Rendering View
    public $RenderingView = false;

    // CSS class/style
    public $CurrentPageName = "DisasterIncidentsAdd";

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
        $this->incident_type->setVisibility();
        $this->incident_name->setVisibility();
        $this->occurrence_date->setVisibility();
        $this->affected_areas->setVisibility();
        $this->casualties->setVisibility();
        $this->damages_estimated->setVisibility();
        $this->response_actions->setVisibility();
        $this->lessons_learned->setVisibility();
        $this->created_at->setVisibility();
    }

    // Constructor
    public function __construct()
    {
        parent::__construct();
        global $Language, $DashboardReport, $DebugTimer, $UserTable;
        $this->TableVar = 'disaster_incidents';
        $this->TableName = 'disaster_incidents';

        // Table CSS class
        $this->TableClass = "table table-striped table-bordered table-hover table-sm ew-desktop-table ew-add-table";

        // Initialize
        $GLOBALS["Page"] = &$this;

        // Language object
        $Language = Container("app.language");

        // Table object (disaster_incidents)
        if (!isset($GLOBALS["disaster_incidents"]) || $GLOBALS["disaster_incidents"]::class == PROJECT_NAMESPACE . "disaster_incidents") {
            $GLOBALS["disaster_incidents"] = &$this;
        }

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'disaster_incidents');
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
                        $result["view"] = SameString($pageName, "DisasterIncidentsView"); // If View page, no primary button
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
                    $this->terminate("DisasterIncidentsList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "DisasterIncidentsList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "DisasterIncidentsView") {
                        $returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
                    }

                    // Handle UseAjaxActions with return page
                    if ($this->IsModal && $this->UseAjaxActions) {
                        $this->IsModal = false;
                        if (GetPageName($returnUrl) != "DisasterIncidentsList") {
                            Container("app.flash")->addMessage("Return-Url", $returnUrl); // Save return URL
                            $returnUrl = "DisasterIncidentsList"; // Return list page content
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
    }

    // Load default values
    protected function loadDefaultValues()
    {
        $this->casualties->DefaultValue = $this->casualties->getDefault(); // PHP
        $this->casualties->OldValue = $this->casualties->DefaultValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;
        $validate = !Config("SERVER_VALIDATE");

        // Check field name 'incident_type' first before field var 'x_incident_type'
        $val = $CurrentForm->hasValue("incident_type") ? $CurrentForm->getValue("incident_type") : $CurrentForm->getValue("x_incident_type");
        if (!$this->incident_type->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->incident_type->Visible = false; // Disable update for API request
            } else {
                $this->incident_type->setFormValue($val);
            }
        }

        // Check field name 'incident_name' first before field var 'x_incident_name'
        $val = $CurrentForm->hasValue("incident_name") ? $CurrentForm->getValue("incident_name") : $CurrentForm->getValue("x_incident_name");
        if (!$this->incident_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->incident_name->Visible = false; // Disable update for API request
            } else {
                $this->incident_name->setFormValue($val);
            }
        }

        // Check field name 'occurrence_date' first before field var 'x_occurrence_date'
        $val = $CurrentForm->hasValue("occurrence_date") ? $CurrentForm->getValue("occurrence_date") : $CurrentForm->getValue("x_occurrence_date");
        if (!$this->occurrence_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->occurrence_date->Visible = false; // Disable update for API request
            } else {
                $this->occurrence_date->setFormValue($val, true, $validate);
            }
            $this->occurrence_date->CurrentValue = UnFormatDateTime($this->occurrence_date->CurrentValue, $this->occurrence_date->formatPattern());
        }

        // Check field name 'affected_areas' first before field var 'x_affected_areas'
        $val = $CurrentForm->hasValue("affected_areas") ? $CurrentForm->getValue("affected_areas") : $CurrentForm->getValue("x_affected_areas");
        if (!$this->affected_areas->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->affected_areas->Visible = false; // Disable update for API request
            } else {
                $this->affected_areas->setFormValue($val);
            }
        }

        // Check field name 'casualties' first before field var 'x_casualties'
        $val = $CurrentForm->hasValue("casualties") ? $CurrentForm->getValue("casualties") : $CurrentForm->getValue("x_casualties");
        if (!$this->casualties->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->casualties->Visible = false; // Disable update for API request
            } else {
                $this->casualties->setFormValue($val, true, $validate);
            }
        }

        // Check field name 'damages_estimated' first before field var 'x_damages_estimated'
        $val = $CurrentForm->hasValue("damages_estimated") ? $CurrentForm->getValue("damages_estimated") : $CurrentForm->getValue("x_damages_estimated");
        if (!$this->damages_estimated->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->damages_estimated->Visible = false; // Disable update for API request
            } else {
                $this->damages_estimated->setFormValue($val, true, $validate);
            }
        }

        // Check field name 'response_actions' first before field var 'x_response_actions'
        $val = $CurrentForm->hasValue("response_actions") ? $CurrentForm->getValue("response_actions") : $CurrentForm->getValue("x_response_actions");
        if (!$this->response_actions->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->response_actions->Visible = false; // Disable update for API request
            } else {
                $this->response_actions->setFormValue($val);
            }
        }

        // Check field name 'lessons_learned' first before field var 'x_lessons_learned'
        $val = $CurrentForm->hasValue("lessons_learned") ? $CurrentForm->getValue("lessons_learned") : $CurrentForm->getValue("x_lessons_learned");
        if (!$this->lessons_learned->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->lessons_learned->Visible = false; // Disable update for API request
            } else {
                $this->lessons_learned->setFormValue($val);
            }
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

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->incident_type->CurrentValue = $this->incident_type->FormValue;
        $this->incident_name->CurrentValue = $this->incident_name->FormValue;
        $this->occurrence_date->CurrentValue = $this->occurrence_date->FormValue;
        $this->occurrence_date->CurrentValue = UnFormatDateTime($this->occurrence_date->CurrentValue, $this->occurrence_date->formatPattern());
        $this->affected_areas->CurrentValue = $this->affected_areas->FormValue;
        $this->casualties->CurrentValue = $this->casualties->FormValue;
        $this->damages_estimated->CurrentValue = $this->damages_estimated->FormValue;
        $this->response_actions->CurrentValue = $this->response_actions->FormValue;
        $this->lessons_learned->CurrentValue = $this->lessons_learned->FormValue;
        $this->created_at->CurrentValue = $this->created_at->FormValue;
        $this->created_at->CurrentValue = UnFormatDateTime($this->created_at->CurrentValue, $this->created_at->formatPattern());
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
        $this->incident_type->setDbValue($row['incident_type']);
        $this->incident_name->setDbValue($row['incident_name']);
        $this->occurrence_date->setDbValue($row['occurrence_date']);
        $this->affected_areas->setDbValue($row['affected_areas']);
        $this->casualties->setDbValue($row['casualties']);
        $this->damages_estimated->setDbValue($row['damages_estimated']);
        $this->response_actions->setDbValue($row['response_actions']);
        $this->lessons_learned->setDbValue($row['lessons_learned']);
        $this->created_at->setDbValue($row['created_at']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = $this->id->DefaultValue;
        $row['incident_type'] = $this->incident_type->DefaultValue;
        $row['incident_name'] = $this->incident_name->DefaultValue;
        $row['occurrence_date'] = $this->occurrence_date->DefaultValue;
        $row['affected_areas'] = $this->affected_areas->DefaultValue;
        $row['casualties'] = $this->casualties->DefaultValue;
        $row['damages_estimated'] = $this->damages_estimated->DefaultValue;
        $row['response_actions'] = $this->response_actions->DefaultValue;
        $row['lessons_learned'] = $this->lessons_learned->DefaultValue;
        $row['created_at'] = $this->created_at->DefaultValue;
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

        // incident_type
        $this->incident_type->RowCssClass = "row";

        // incident_name
        $this->incident_name->RowCssClass = "row";

        // occurrence_date
        $this->occurrence_date->RowCssClass = "row";

        // affected_areas
        $this->affected_areas->RowCssClass = "row";

        // casualties
        $this->casualties->RowCssClass = "row";

        // damages_estimated
        $this->damages_estimated->RowCssClass = "row";

        // response_actions
        $this->response_actions->RowCssClass = "row";

        // lessons_learned
        $this->lessons_learned->RowCssClass = "row";

        // created_at
        $this->created_at->RowCssClass = "row";

        // View row
        if ($this->RowType == RowType::VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;

            // incident_type
            $this->incident_type->ViewValue = $this->incident_type->CurrentValue;

            // incident_name
            $this->incident_name->ViewValue = $this->incident_name->CurrentValue;

            // occurrence_date
            $this->occurrence_date->ViewValue = $this->occurrence_date->CurrentValue;
            $this->occurrence_date->ViewValue = FormatDateTime($this->occurrence_date->ViewValue, $this->occurrence_date->formatPattern());

            // affected_areas
            $this->affected_areas->ViewValue = $this->affected_areas->CurrentValue;

            // casualties
            $this->casualties->ViewValue = $this->casualties->CurrentValue;
            $this->casualties->ViewValue = FormatNumber($this->casualties->ViewValue, $this->casualties->formatPattern());

            // damages_estimated
            $this->damages_estimated->ViewValue = $this->damages_estimated->CurrentValue;
            $this->damages_estimated->ViewValue = FormatNumber($this->damages_estimated->ViewValue, $this->damages_estimated->formatPattern());

            // response_actions
            $this->response_actions->ViewValue = $this->response_actions->CurrentValue;

            // lessons_learned
            $this->lessons_learned->ViewValue = $this->lessons_learned->CurrentValue;

            // created_at
            $this->created_at->ViewValue = $this->created_at->CurrentValue;
            $this->created_at->ViewValue = FormatDateTime($this->created_at->ViewValue, $this->created_at->formatPattern());

            // incident_type
            $this->incident_type->HrefValue = "";

            // incident_name
            $this->incident_name->HrefValue = "";

            // occurrence_date
            $this->occurrence_date->HrefValue = "";

            // affected_areas
            $this->affected_areas->HrefValue = "";

            // casualties
            $this->casualties->HrefValue = "";

            // damages_estimated
            $this->damages_estimated->HrefValue = "";

            // response_actions
            $this->response_actions->HrefValue = "";

            // lessons_learned
            $this->lessons_learned->HrefValue = "";

            // created_at
            $this->created_at->HrefValue = "";
        } elseif ($this->RowType == RowType::ADD) {
            // incident_type
            $this->incident_type->setupEditAttributes();
            if (!$this->incident_type->Raw) {
                $this->incident_type->CurrentValue = HtmlDecode($this->incident_type->CurrentValue);
            }
            $this->incident_type->EditValue = HtmlEncode($this->incident_type->CurrentValue);
            $this->incident_type->PlaceHolder = RemoveHtml($this->incident_type->caption());

            // incident_name
            $this->incident_name->setupEditAttributes();
            if (!$this->incident_name->Raw) {
                $this->incident_name->CurrentValue = HtmlDecode($this->incident_name->CurrentValue);
            }
            $this->incident_name->EditValue = HtmlEncode($this->incident_name->CurrentValue);
            $this->incident_name->PlaceHolder = RemoveHtml($this->incident_name->caption());

            // occurrence_date
            $this->occurrence_date->setupEditAttributes();
            $this->occurrence_date->EditValue = HtmlEncode(FormatDateTime($this->occurrence_date->CurrentValue, $this->occurrence_date->formatPattern()));
            $this->occurrence_date->PlaceHolder = RemoveHtml($this->occurrence_date->caption());

            // affected_areas
            $this->affected_areas->setupEditAttributes();
            $this->affected_areas->EditValue = HtmlEncode($this->affected_areas->CurrentValue);
            $this->affected_areas->PlaceHolder = RemoveHtml($this->affected_areas->caption());

            // casualties
            $this->casualties->setupEditAttributes();
            $this->casualties->EditValue = $this->casualties->CurrentValue;
            $this->casualties->PlaceHolder = RemoveHtml($this->casualties->caption());
            if (strval($this->casualties->EditValue) != "" && is_numeric($this->casualties->EditValue)) {
                $this->casualties->EditValue = FormatNumber($this->casualties->EditValue, null);
            }

            // damages_estimated
            $this->damages_estimated->setupEditAttributes();
            $this->damages_estimated->EditValue = $this->damages_estimated->CurrentValue;
            $this->damages_estimated->PlaceHolder = RemoveHtml($this->damages_estimated->caption());
            if (strval($this->damages_estimated->EditValue) != "" && is_numeric($this->damages_estimated->EditValue)) {
                $this->damages_estimated->EditValue = FormatNumber($this->damages_estimated->EditValue, null);
            }

            // response_actions
            $this->response_actions->setupEditAttributes();
            $this->response_actions->EditValue = HtmlEncode($this->response_actions->CurrentValue);
            $this->response_actions->PlaceHolder = RemoveHtml($this->response_actions->caption());

            // lessons_learned
            $this->lessons_learned->setupEditAttributes();
            $this->lessons_learned->EditValue = HtmlEncode($this->lessons_learned->CurrentValue);
            $this->lessons_learned->PlaceHolder = RemoveHtml($this->lessons_learned->caption());

            // created_at
            $this->created_at->setupEditAttributes();
            $this->created_at->EditValue = HtmlEncode(FormatDateTime($this->created_at->CurrentValue, $this->created_at->formatPattern()));
            $this->created_at->PlaceHolder = RemoveHtml($this->created_at->caption());

            // Add refer script

            // incident_type
            $this->incident_type->HrefValue = "";

            // incident_name
            $this->incident_name->HrefValue = "";

            // occurrence_date
            $this->occurrence_date->HrefValue = "";

            // affected_areas
            $this->affected_areas->HrefValue = "";

            // casualties
            $this->casualties->HrefValue = "";

            // damages_estimated
            $this->damages_estimated->HrefValue = "";

            // response_actions
            $this->response_actions->HrefValue = "";

            // lessons_learned
            $this->lessons_learned->HrefValue = "";

            // created_at
            $this->created_at->HrefValue = "";
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
            if ($this->incident_type->Visible && $this->incident_type->Required) {
                if (!$this->incident_type->IsDetailKey && EmptyValue($this->incident_type->FormValue)) {
                    $this->incident_type->addErrorMessage(str_replace("%s", $this->incident_type->caption(), $this->incident_type->RequiredErrorMessage));
                }
            }
            if ($this->incident_name->Visible && $this->incident_name->Required) {
                if (!$this->incident_name->IsDetailKey && EmptyValue($this->incident_name->FormValue)) {
                    $this->incident_name->addErrorMessage(str_replace("%s", $this->incident_name->caption(), $this->incident_name->RequiredErrorMessage));
                }
            }
            if ($this->occurrence_date->Visible && $this->occurrence_date->Required) {
                if (!$this->occurrence_date->IsDetailKey && EmptyValue($this->occurrence_date->FormValue)) {
                    $this->occurrence_date->addErrorMessage(str_replace("%s", $this->occurrence_date->caption(), $this->occurrence_date->RequiredErrorMessage));
                }
            }
            if (!CheckDate($this->occurrence_date->FormValue, $this->occurrence_date->formatPattern())) {
                $this->occurrence_date->addErrorMessage($this->occurrence_date->getErrorMessage(false));
            }
            if ($this->affected_areas->Visible && $this->affected_areas->Required) {
                if (!$this->affected_areas->IsDetailKey && EmptyValue($this->affected_areas->FormValue)) {
                    $this->affected_areas->addErrorMessage(str_replace("%s", $this->affected_areas->caption(), $this->affected_areas->RequiredErrorMessage));
                }
            }
            if ($this->casualties->Visible && $this->casualties->Required) {
                if (!$this->casualties->IsDetailKey && EmptyValue($this->casualties->FormValue)) {
                    $this->casualties->addErrorMessage(str_replace("%s", $this->casualties->caption(), $this->casualties->RequiredErrorMessage));
                }
            }
            if (!CheckInteger($this->casualties->FormValue)) {
                $this->casualties->addErrorMessage($this->casualties->getErrorMessage(false));
            }
            if ($this->damages_estimated->Visible && $this->damages_estimated->Required) {
                if (!$this->damages_estimated->IsDetailKey && EmptyValue($this->damages_estimated->FormValue)) {
                    $this->damages_estimated->addErrorMessage(str_replace("%s", $this->damages_estimated->caption(), $this->damages_estimated->RequiredErrorMessage));
                }
            }
            if (!CheckNumber($this->damages_estimated->FormValue)) {
                $this->damages_estimated->addErrorMessage($this->damages_estimated->getErrorMessage(false));
            }
            if ($this->response_actions->Visible && $this->response_actions->Required) {
                if (!$this->response_actions->IsDetailKey && EmptyValue($this->response_actions->FormValue)) {
                    $this->response_actions->addErrorMessage(str_replace("%s", $this->response_actions->caption(), $this->response_actions->RequiredErrorMessage));
                }
            }
            if ($this->lessons_learned->Visible && $this->lessons_learned->Required) {
                if (!$this->lessons_learned->IsDetailKey && EmptyValue($this->lessons_learned->FormValue)) {
                    $this->lessons_learned->addErrorMessage(str_replace("%s", $this->lessons_learned->caption(), $this->lessons_learned->RequiredErrorMessage));
                }
            }
            if ($this->created_at->Visible && $this->created_at->Required) {
                if (!$this->created_at->IsDetailKey && EmptyValue($this->created_at->FormValue)) {
                    $this->created_at->addErrorMessage(str_replace("%s", $this->created_at->caption(), $this->created_at->RequiredErrorMessage));
                }
            }
            if (!CheckDate($this->created_at->FormValue, $this->created_at->formatPattern())) {
                $this->created_at->addErrorMessage($this->created_at->getErrorMessage(false));
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

        // Update current values
        $this->setCurrentValues($rsnew);
        $conn = $this->getConnection();

        // Load db values from old row
        $this->loadDbValues($rsold);

        // Call Row Inserting event
        $insertRow = $this->rowInserting($rsold, $rsnew);
        if ($insertRow) {
            $addRow = $this->insert($rsnew);
            if ($addRow) {
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

        // incident_type
        $this->incident_type->setDbValueDef($rsnew, $this->incident_type->CurrentValue, false);

        // incident_name
        $this->incident_name->setDbValueDef($rsnew, $this->incident_name->CurrentValue, false);

        // occurrence_date
        $this->occurrence_date->setDbValueDef($rsnew, UnFormatDateTime($this->occurrence_date->CurrentValue, $this->occurrence_date->formatPattern()), false);

        // affected_areas
        $this->affected_areas->setDbValueDef($rsnew, $this->affected_areas->CurrentValue, false);

        // casualties
        $this->casualties->setDbValueDef($rsnew, $this->casualties->CurrentValue, strval($this->casualties->CurrentValue) == "");

        // damages_estimated
        $this->damages_estimated->setDbValueDef($rsnew, $this->damages_estimated->CurrentValue, false);

        // response_actions
        $this->response_actions->setDbValueDef($rsnew, $this->response_actions->CurrentValue, false);

        // lessons_learned
        $this->lessons_learned->setDbValueDef($rsnew, $this->lessons_learned->CurrentValue, false);

        // created_at
        $this->created_at->setDbValueDef($rsnew, UnFormatDateTime($this->created_at->CurrentValue, $this->created_at->formatPattern()), false);
        return $rsnew;
    }

    /**
     * Restore add form from row
     * @param array $row Row
     */
    protected function restoreAddFormFromRow($row)
    {
        if (isset($row['incident_type'])) { // incident_type
            $this->incident_type->setFormValue($row['incident_type']);
        }
        if (isset($row['incident_name'])) { // incident_name
            $this->incident_name->setFormValue($row['incident_name']);
        }
        if (isset($row['occurrence_date'])) { // occurrence_date
            $this->occurrence_date->setFormValue($row['occurrence_date']);
        }
        if (isset($row['affected_areas'])) { // affected_areas
            $this->affected_areas->setFormValue($row['affected_areas']);
        }
        if (isset($row['casualties'])) { // casualties
            $this->casualties->setFormValue($row['casualties']);
        }
        if (isset($row['damages_estimated'])) { // damages_estimated
            $this->damages_estimated->setFormValue($row['damages_estimated']);
        }
        if (isset($row['response_actions'])) { // response_actions
            $this->response_actions->setFormValue($row['response_actions']);
        }
        if (isset($row['lessons_learned'])) { // lessons_learned
            $this->lessons_learned->setFormValue($row['lessons_learned']);
        }
        if (isset($row['created_at'])) { // created_at
            $this->created_at->setFormValue($row['created_at']);
        }
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("DisasterIncidentsList"), "", $this->TableVar, true);
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
