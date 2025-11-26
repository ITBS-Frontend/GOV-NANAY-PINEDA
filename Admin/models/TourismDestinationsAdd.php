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
class TourismDestinationsAdd extends TourismDestinations
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Page object name
    public $PageObjName = "TourismDestinationsAdd";

    // View file path
    public $View = null;

    // Title
    public $Title = null; // Title for <title> tag

    // Rendering View
    public $RenderingView = false;

    // CSS class/style
    public $CurrentPageName = "TourismDestinationsAdd";

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
        $this->category_id->setVisibility();
        $this->name->setVisibility();
        $this->description->setVisibility();
        $this->full_description->setVisibility();
        $this->municipality->setVisibility();
        $this->address->setVisibility();
        $this->coordinates->setVisibility();
        $this->entry_fee->setVisibility();
        $this->operating_hours->setVisibility();
        $this->best_time_to_visit->setVisibility();
        $this->how_to_get_there->setVisibility();
        $this->featured_image->setVisibility();
        $this->is_featured->setVisibility();
        $this->is_active->setVisibility();
        $this->created_at->setVisibility();
    }

    // Constructor
    public function __construct()
    {
        parent::__construct();
        global $Language, $DashboardReport, $DebugTimer, $UserTable;
        $this->TableVar = 'tourism_destinations';
        $this->TableName = 'tourism_destinations';

        // Table CSS class
        $this->TableClass = "table table-striped table-bordered table-hover table-sm ew-desktop-table ew-add-table";

        // Initialize
        $GLOBALS["Page"] = &$this;

        // Language object
        $Language = Container("app.language");

        // Table object (tourism_destinations)
        if (!isset($GLOBALS["tourism_destinations"]) || $GLOBALS["tourism_destinations"]::class == PROJECT_NAMESPACE . "tourism_destinations") {
            $GLOBALS["tourism_destinations"] = &$this;
        }

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'tourism_destinations');
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
                        $result["view"] = SameString($pageName, "TourismDestinationsView"); // If View page, no primary button
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
        $this->setupLookupOptions($this->is_active);

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
                    $this->terminate("TourismDestinationsList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "TourismDestinationsList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "TourismDestinationsView") {
                        $returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
                    }

                    // Handle UseAjaxActions with return page
                    if ($this->IsModal && $this->UseAjaxActions) {
                        $this->IsModal = false;
                        if (GetPageName($returnUrl) != "TourismDestinationsList") {
                            Container("app.flash")->addMessage("Return-Url", $returnUrl); // Save return URL
                            $returnUrl = "TourismDestinationsList"; // Return list page content
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
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;
        $validate = !Config("SERVER_VALIDATE");

        // Check field name 'category_id' first before field var 'x_category_id'
        $val = $CurrentForm->hasValue("category_id") ? $CurrentForm->getValue("category_id") : $CurrentForm->getValue("x_category_id");
        if (!$this->category_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->category_id->Visible = false; // Disable update for API request
            } else {
                $this->category_id->setFormValue($val);
            }
        }

        // Check field name 'name' first before field var 'x_name'
        $val = $CurrentForm->hasValue("name") ? $CurrentForm->getValue("name") : $CurrentForm->getValue("x_name");
        if (!$this->name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->name->Visible = false; // Disable update for API request
            } else {
                $this->name->setFormValue($val);
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

        // Check field name 'full_description' first before field var 'x_full_description'
        $val = $CurrentForm->hasValue("full_description") ? $CurrentForm->getValue("full_description") : $CurrentForm->getValue("x_full_description");
        if (!$this->full_description->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->full_description->Visible = false; // Disable update for API request
            } else {
                $this->full_description->setFormValue($val);
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

        // Check field name 'address' first before field var 'x_address'
        $val = $CurrentForm->hasValue("address") ? $CurrentForm->getValue("address") : $CurrentForm->getValue("x_address");
        if (!$this->address->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->address->Visible = false; // Disable update for API request
            } else {
                $this->address->setFormValue($val);
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

        // Check field name 'entry_fee' first before field var 'x_entry_fee'
        $val = $CurrentForm->hasValue("entry_fee") ? $CurrentForm->getValue("entry_fee") : $CurrentForm->getValue("x_entry_fee");
        if (!$this->entry_fee->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->entry_fee->Visible = false; // Disable update for API request
            } else {
                $this->entry_fee->setFormValue($val);
            }
        }

        // Check field name 'operating_hours' first before field var 'x_operating_hours'
        $val = $CurrentForm->hasValue("operating_hours") ? $CurrentForm->getValue("operating_hours") : $CurrentForm->getValue("x_operating_hours");
        if (!$this->operating_hours->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->operating_hours->Visible = false; // Disable update for API request
            } else {
                $this->operating_hours->setFormValue($val);
            }
        }

        // Check field name 'best_time_to_visit' first before field var 'x_best_time_to_visit'
        $val = $CurrentForm->hasValue("best_time_to_visit") ? $CurrentForm->getValue("best_time_to_visit") : $CurrentForm->getValue("x_best_time_to_visit");
        if (!$this->best_time_to_visit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->best_time_to_visit->Visible = false; // Disable update for API request
            } else {
                $this->best_time_to_visit->setFormValue($val);
            }
        }

        // Check field name 'how_to_get_there' first before field var 'x_how_to_get_there'
        $val = $CurrentForm->hasValue("how_to_get_there") ? $CurrentForm->getValue("how_to_get_there") : $CurrentForm->getValue("x_how_to_get_there");
        if (!$this->how_to_get_there->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->how_to_get_there->Visible = false; // Disable update for API request
            } else {
                $this->how_to_get_there->setFormValue($val);
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

        // Check field name 'is_active' first before field var 'x_is_active'
        $val = $CurrentForm->hasValue("is_active") ? $CurrentForm->getValue("is_active") : $CurrentForm->getValue("x_is_active");
        if (!$this->is_active->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->is_active->Visible = false; // Disable update for API request
            } else {
                $this->is_active->setFormValue($val);
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
		$this->featured_image->OldUploadPath = $this->featured_image->getUploadPath(); // PHP
		$this->featured_image->UploadPath = $this->featured_image->OldUploadPath;
        $this->getUploadFiles(); // Get upload files
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->category_id->CurrentValue = $this->category_id->FormValue;
        $this->name->CurrentValue = $this->name->FormValue;
        $this->description->CurrentValue = $this->description->FormValue;
        $this->full_description->CurrentValue = $this->full_description->FormValue;
        $this->municipality->CurrentValue = $this->municipality->FormValue;
        $this->address->CurrentValue = $this->address->FormValue;
        $this->coordinates->CurrentValue = $this->coordinates->FormValue;
        $this->entry_fee->CurrentValue = $this->entry_fee->FormValue;
        $this->operating_hours->CurrentValue = $this->operating_hours->FormValue;
        $this->best_time_to_visit->CurrentValue = $this->best_time_to_visit->FormValue;
        $this->how_to_get_there->CurrentValue = $this->how_to_get_there->FormValue;
        $this->is_featured->CurrentValue = $this->is_featured->FormValue;
        $this->is_active->CurrentValue = $this->is_active->FormValue;
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
        $this->category_id->setDbValue($row['category_id']);
        $this->name->setDbValue($row['name']);
        $this->description->setDbValue($row['description']);
        $this->full_description->setDbValue($row['full_description']);
        $this->municipality->setDbValue($row['municipality']);
        $this->address->setDbValue($row['address']);
        $this->coordinates->setDbValue($row['coordinates']);
        $this->entry_fee->setDbValue($row['entry_fee']);
        $this->operating_hours->setDbValue($row['operating_hours']);
        $this->best_time_to_visit->setDbValue($row['best_time_to_visit']);
        $this->how_to_get_there->setDbValue($row['how_to_get_there']);
        $this->featured_image->Upload->DbValue = $row['featured_image'];
        $this->featured_image->setDbValue($this->featured_image->Upload->DbValue);
        $this->is_featured->setDbValue((ConvertToBool($row['is_featured']) ? "1" : "0"));
        $this->is_active->setDbValue((ConvertToBool($row['is_active']) ? "1" : "0"));
        $this->created_at->setDbValue($row['created_at']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = $this->id->DefaultValue;
        $row['category_id'] = $this->category_id->DefaultValue;
        $row['name'] = $this->name->DefaultValue;
        $row['description'] = $this->description->DefaultValue;
        $row['full_description'] = $this->full_description->DefaultValue;
        $row['municipality'] = $this->municipality->DefaultValue;
        $row['address'] = $this->address->DefaultValue;
        $row['coordinates'] = $this->coordinates->DefaultValue;
        $row['entry_fee'] = $this->entry_fee->DefaultValue;
        $row['operating_hours'] = $this->operating_hours->DefaultValue;
        $row['best_time_to_visit'] = $this->best_time_to_visit->DefaultValue;
        $row['how_to_get_there'] = $this->how_to_get_there->DefaultValue;
        $row['featured_image'] = $this->featured_image->DefaultValue;
        $row['is_featured'] = $this->is_featured->DefaultValue;
        $row['is_active'] = $this->is_active->DefaultValue;
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

        // category_id
        $this->category_id->RowCssClass = "row";

        // name
        $this->name->RowCssClass = "row";

        // description
        $this->description->RowCssClass = "row";

        // full_description
        $this->full_description->RowCssClass = "row";

        // municipality
        $this->municipality->RowCssClass = "row";

        // address
        $this->address->RowCssClass = "row";

        // coordinates
        $this->coordinates->RowCssClass = "row";

        // entry_fee
        $this->entry_fee->RowCssClass = "row";

        // operating_hours
        $this->operating_hours->RowCssClass = "row";

        // best_time_to_visit
        $this->best_time_to_visit->RowCssClass = "row";

        // how_to_get_there
        $this->how_to_get_there->RowCssClass = "row";

        // featured_image
        $this->featured_image->RowCssClass = "row";

        // is_featured
        $this->is_featured->RowCssClass = "row";

        // is_active
        $this->is_active->RowCssClass = "row";

        // created_at
        $this->created_at->RowCssClass = "row";

        // View row
        if ($this->RowType == RowType::VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;

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

            // name
            $this->name->ViewValue = $this->name->CurrentValue;

            // description
            $this->description->ViewValue = $this->description->CurrentValue;

            // full_description
            $this->full_description->ViewValue = $this->full_description->CurrentValue;

            // municipality
            $this->municipality->ViewValue = $this->municipality->CurrentValue;

            // address
            $this->address->ViewValue = $this->address->CurrentValue;

            // coordinates
            $this->coordinates->ViewValue = $this->coordinates->CurrentValue;

            // entry_fee
            $this->entry_fee->ViewValue = $this->entry_fee->CurrentValue;

            // operating_hours
            $this->operating_hours->ViewValue = $this->operating_hours->CurrentValue;

            // best_time_to_visit
            $this->best_time_to_visit->ViewValue = $this->best_time_to_visit->CurrentValue;

            // how_to_get_there
            $this->how_to_get_there->ViewValue = $this->how_to_get_there->CurrentValue;

            // featured_image
            $this->featured_image->UploadPath = $this->featured_image->getUploadPath(); // PHP
            if (!EmptyValue($this->featured_image->Upload->DbValue)) {
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

            // is_active
            if (ConvertToBool($this->is_active->CurrentValue)) {
                $this->is_active->ViewValue = $this->is_active->tagCaption(1) != "" ? $this->is_active->tagCaption(1) : "Yes";
            } else {
                $this->is_active->ViewValue = $this->is_active->tagCaption(2) != "" ? $this->is_active->tagCaption(2) : "No";
            }

            // created_at
            $this->created_at->ViewValue = $this->created_at->CurrentValue;
            $this->created_at->ViewValue = FormatDateTime($this->created_at->ViewValue, $this->created_at->formatPattern());

            // category_id
            $this->category_id->HrefValue = "";

            // name
            $this->name->HrefValue = "";

            // description
            $this->description->HrefValue = "";

            // full_description
            $this->full_description->HrefValue = "";

            // municipality
            $this->municipality->HrefValue = "";

            // address
            $this->address->HrefValue = "";

            // coordinates
            $this->coordinates->HrefValue = "";

            // entry_fee
            $this->entry_fee->HrefValue = "";

            // operating_hours
            $this->operating_hours->HrefValue = "";

            // best_time_to_visit
            $this->best_time_to_visit->HrefValue = "";

            // how_to_get_there
            $this->how_to_get_there->HrefValue = "";

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

            // is_active
            $this->is_active->HrefValue = "";

            // created_at
            $this->created_at->HrefValue = "";
        } elseif ($this->RowType == RowType::ADD) {
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

            // name
            $this->name->setupEditAttributes();
            if (!$this->name->Raw) {
                $this->name->CurrentValue = HtmlDecode($this->name->CurrentValue);
            }
            $this->name->EditValue = HtmlEncode($this->name->CurrentValue);
            $this->name->PlaceHolder = RemoveHtml($this->name->caption());

            // description
            $this->description->setupEditAttributes();
            $this->description->EditValue = HtmlEncode($this->description->CurrentValue);
            $this->description->PlaceHolder = RemoveHtml($this->description->caption());

            // full_description
            $this->full_description->setupEditAttributes();
            $this->full_description->EditValue = HtmlEncode($this->full_description->CurrentValue);
            $this->full_description->PlaceHolder = RemoveHtml($this->full_description->caption());

            // municipality
            $this->municipality->setupEditAttributes();
            if (!$this->municipality->Raw) {
                $this->municipality->CurrentValue = HtmlDecode($this->municipality->CurrentValue);
            }
            $this->municipality->EditValue = HtmlEncode($this->municipality->CurrentValue);
            $this->municipality->PlaceHolder = RemoveHtml($this->municipality->caption());

            // address
            $this->address->setupEditAttributes();
            $this->address->EditValue = HtmlEncode($this->address->CurrentValue);
            $this->address->PlaceHolder = RemoveHtml($this->address->caption());

            // coordinates
            $this->coordinates->setupEditAttributes();
            if (!$this->coordinates->Raw) {
                $this->coordinates->CurrentValue = HtmlDecode($this->coordinates->CurrentValue);
            }
            $this->coordinates->EditValue = HtmlEncode($this->coordinates->CurrentValue);
            $this->coordinates->PlaceHolder = RemoveHtml($this->coordinates->caption());

            // entry_fee
            $this->entry_fee->setupEditAttributes();
            if (!$this->entry_fee->Raw) {
                $this->entry_fee->CurrentValue = HtmlDecode($this->entry_fee->CurrentValue);
            }
            $this->entry_fee->EditValue = HtmlEncode($this->entry_fee->CurrentValue);
            $this->entry_fee->PlaceHolder = RemoveHtml($this->entry_fee->caption());

            // operating_hours
            $this->operating_hours->setupEditAttributes();
            if (!$this->operating_hours->Raw) {
                $this->operating_hours->CurrentValue = HtmlDecode($this->operating_hours->CurrentValue);
            }
            $this->operating_hours->EditValue = HtmlEncode($this->operating_hours->CurrentValue);
            $this->operating_hours->PlaceHolder = RemoveHtml($this->operating_hours->caption());

            // best_time_to_visit
            $this->best_time_to_visit->setupEditAttributes();
            if (!$this->best_time_to_visit->Raw) {
                $this->best_time_to_visit->CurrentValue = HtmlDecode($this->best_time_to_visit->CurrentValue);
            }
            $this->best_time_to_visit->EditValue = HtmlEncode($this->best_time_to_visit->CurrentValue);
            $this->best_time_to_visit->PlaceHolder = RemoveHtml($this->best_time_to_visit->caption());

            // how_to_get_there
            $this->how_to_get_there->setupEditAttributes();
            $this->how_to_get_there->EditValue = HtmlEncode($this->how_to_get_there->CurrentValue);
            $this->how_to_get_there->PlaceHolder = RemoveHtml($this->how_to_get_there->caption());

            // featured_image
            $this->featured_image->setupEditAttributes();
            $this->featured_image->UploadPath = $this->featured_image->getUploadPath(); // PHP
            if (!EmptyValue($this->featured_image->Upload->DbValue)) {
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

            // is_featured
            $this->is_featured->EditValue = $this->is_featured->options(false);
            $this->is_featured->PlaceHolder = RemoveHtml($this->is_featured->caption());

            // is_active
            $this->is_active->EditValue = $this->is_active->options(false);
            $this->is_active->PlaceHolder = RemoveHtml($this->is_active->caption());

            // created_at
            $this->created_at->setupEditAttributes();
            $this->created_at->EditValue = HtmlEncode(FormatDateTime($this->created_at->CurrentValue, $this->created_at->formatPattern()));
            $this->created_at->PlaceHolder = RemoveHtml($this->created_at->caption());

            // Add refer script

            // category_id
            $this->category_id->HrefValue = "";

            // name
            $this->name->HrefValue = "";

            // description
            $this->description->HrefValue = "";

            // full_description
            $this->full_description->HrefValue = "";

            // municipality
            $this->municipality->HrefValue = "";

            // address
            $this->address->HrefValue = "";

            // coordinates
            $this->coordinates->HrefValue = "";

            // entry_fee
            $this->entry_fee->HrefValue = "";

            // operating_hours
            $this->operating_hours->HrefValue = "";

            // best_time_to_visit
            $this->best_time_to_visit->HrefValue = "";

            // how_to_get_there
            $this->how_to_get_there->HrefValue = "";

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

            // is_active
            $this->is_active->HrefValue = "";

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
            if ($this->category_id->Visible && $this->category_id->Required) {
                if (!$this->category_id->IsDetailKey && EmptyValue($this->category_id->FormValue)) {
                    $this->category_id->addErrorMessage(str_replace("%s", $this->category_id->caption(), $this->category_id->RequiredErrorMessage));
                }
            }
            if ($this->name->Visible && $this->name->Required) {
                if (!$this->name->IsDetailKey && EmptyValue($this->name->FormValue)) {
                    $this->name->addErrorMessage(str_replace("%s", $this->name->caption(), $this->name->RequiredErrorMessage));
                }
            }
            if ($this->description->Visible && $this->description->Required) {
                if (!$this->description->IsDetailKey && EmptyValue($this->description->FormValue)) {
                    $this->description->addErrorMessage(str_replace("%s", $this->description->caption(), $this->description->RequiredErrorMessage));
                }
            }
            if ($this->full_description->Visible && $this->full_description->Required) {
                if (!$this->full_description->IsDetailKey && EmptyValue($this->full_description->FormValue)) {
                    $this->full_description->addErrorMessage(str_replace("%s", $this->full_description->caption(), $this->full_description->RequiredErrorMessage));
                }
            }
            if ($this->municipality->Visible && $this->municipality->Required) {
                if (!$this->municipality->IsDetailKey && EmptyValue($this->municipality->FormValue)) {
                    $this->municipality->addErrorMessage(str_replace("%s", $this->municipality->caption(), $this->municipality->RequiredErrorMessage));
                }
            }
            if ($this->address->Visible && $this->address->Required) {
                if (!$this->address->IsDetailKey && EmptyValue($this->address->FormValue)) {
                    $this->address->addErrorMessage(str_replace("%s", $this->address->caption(), $this->address->RequiredErrorMessage));
                }
            }
            if ($this->coordinates->Visible && $this->coordinates->Required) {
                if (!$this->coordinates->IsDetailKey && EmptyValue($this->coordinates->FormValue)) {
                    $this->coordinates->addErrorMessage(str_replace("%s", $this->coordinates->caption(), $this->coordinates->RequiredErrorMessage));
                }
            }
            if ($this->entry_fee->Visible && $this->entry_fee->Required) {
                if (!$this->entry_fee->IsDetailKey && EmptyValue($this->entry_fee->FormValue)) {
                    $this->entry_fee->addErrorMessage(str_replace("%s", $this->entry_fee->caption(), $this->entry_fee->RequiredErrorMessage));
                }
            }
            if ($this->operating_hours->Visible && $this->operating_hours->Required) {
                if (!$this->operating_hours->IsDetailKey && EmptyValue($this->operating_hours->FormValue)) {
                    $this->operating_hours->addErrorMessage(str_replace("%s", $this->operating_hours->caption(), $this->operating_hours->RequiredErrorMessage));
                }
            }
            if ($this->best_time_to_visit->Visible && $this->best_time_to_visit->Required) {
                if (!$this->best_time_to_visit->IsDetailKey && EmptyValue($this->best_time_to_visit->FormValue)) {
                    $this->best_time_to_visit->addErrorMessage(str_replace("%s", $this->best_time_to_visit->caption(), $this->best_time_to_visit->RequiredErrorMessage));
                }
            }
            if ($this->how_to_get_there->Visible && $this->how_to_get_there->Required) {
                if (!$this->how_to_get_there->IsDetailKey && EmptyValue($this->how_to_get_there->FormValue)) {
                    $this->how_to_get_there->addErrorMessage(str_replace("%s", $this->how_to_get_there->caption(), $this->how_to_get_there->RequiredErrorMessage));
                }
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
            if ($this->is_active->Visible && $this->is_active->Required) {
                if ($this->is_active->FormValue == "") {
                    $this->is_active->addErrorMessage(str_replace("%s", $this->is_active->caption(), $this->is_active->RequiredErrorMessage));
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

        // category_id
        $this->category_id->setDbValueDef($rsnew, $this->category_id->CurrentValue, false);

        // name
        $this->name->setDbValueDef($rsnew, $this->name->CurrentValue, false);

        // description
        $this->description->setDbValueDef($rsnew, $this->description->CurrentValue, false);

        // full_description
        $this->full_description->setDbValueDef($rsnew, $this->full_description->CurrentValue, false);

        // municipality
        $this->municipality->setDbValueDef($rsnew, $this->municipality->CurrentValue, false);

        // address
        $this->address->setDbValueDef($rsnew, $this->address->CurrentValue, false);

        // coordinates
        $this->coordinates->setDbValueDef($rsnew, $this->coordinates->CurrentValue, false);

        // entry_fee
        $this->entry_fee->setDbValueDef($rsnew, $this->entry_fee->CurrentValue, false);

        // operating_hours
        $this->operating_hours->setDbValueDef($rsnew, $this->operating_hours->CurrentValue, false);

        // best_time_to_visit
        $this->best_time_to_visit->setDbValueDef($rsnew, $this->best_time_to_visit->CurrentValue, false);

        // how_to_get_there
        $this->how_to_get_there->setDbValueDef($rsnew, $this->how_to_get_there->CurrentValue, false);

        // featured_image
        if ($this->featured_image->Visible && !$this->featured_image->Upload->KeepFile) {
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
        $this->is_featured->setDbValueDef($rsnew, $tmpBool, strval($this->is_featured->CurrentValue) == "");

        // is_active
        $tmpBool = $this->is_active->CurrentValue;
        if ($tmpBool != "1" && $tmpBool != "0") {
            $tmpBool = !empty($tmpBool) ? "1" : "0";
        }
        $this->is_active->setDbValueDef($rsnew, $tmpBool, strval($this->is_active->CurrentValue) == "");

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
        if (isset($row['category_id'])) { // category_id
            $this->category_id->setFormValue($row['category_id']);
        }
        if (isset($row['name'])) { // name
            $this->name->setFormValue($row['name']);
        }
        if (isset($row['description'])) { // description
            $this->description->setFormValue($row['description']);
        }
        if (isset($row['full_description'])) { // full_description
            $this->full_description->setFormValue($row['full_description']);
        }
        if (isset($row['municipality'])) { // municipality
            $this->municipality->setFormValue($row['municipality']);
        }
        if (isset($row['address'])) { // address
            $this->address->setFormValue($row['address']);
        }
        if (isset($row['coordinates'])) { // coordinates
            $this->coordinates->setFormValue($row['coordinates']);
        }
        if (isset($row['entry_fee'])) { // entry_fee
            $this->entry_fee->setFormValue($row['entry_fee']);
        }
        if (isset($row['operating_hours'])) { // operating_hours
            $this->operating_hours->setFormValue($row['operating_hours']);
        }
        if (isset($row['best_time_to_visit'])) { // best_time_to_visit
            $this->best_time_to_visit->setFormValue($row['best_time_to_visit']);
        }
        if (isset($row['how_to_get_there'])) { // how_to_get_there
            $this->how_to_get_there->setFormValue($row['how_to_get_there']);
        }
        if (isset($row['featured_image'])) { // featured_image
            $this->featured_image->setFormValue($row['featured_image']);
        }
        if (isset($row['is_featured'])) { // is_featured
            $this->is_featured->setFormValue($row['is_featured']);
        }
        if (isset($row['is_active'])) { // is_active
            $this->is_active->setFormValue($row['is_active']);
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("TourismDestinationsList"), "", $this->TableVar, true);
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
                case "x_is_active":
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
