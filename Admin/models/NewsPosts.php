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
 * Table class for news_posts
 */
class NewsPosts extends DbTable
{
    protected $SqlFrom = "";
    protected $SqlSelect = null;
    protected $SqlSelectList = null;
    protected $SqlWhere = "";
    protected $SqlGroupBy = "";
    protected $SqlHaving = "";
    protected $SqlOrderBy = "";
    public $DbErrorMessage = "";
    public $UseSessionForListSql = true;

    // Column CSS classes
    public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
    public $RightColumnClass = "col-sm-10";
    public $OffsetColumnClass = "col-sm-10 offset-sm-2";
    public $TableLeftColumnClass = "w-col-2";

    // Ajax / Modal
    public $UseAjaxActions = false;
    public $ModalSearch = false;
    public $ModalView = false;
    public $ModalAdd = false;
    public $ModalEdit = false;
    public $ModalUpdate = false;
    public $InlineDelete = false;
    public $ModalGridAdd = false;
    public $ModalGridEdit = false;
    public $ModalMultiEdit = false;

    // Fields
    public $id;
    public $_title;
    public $slug;
    public $excerpt;
    public $_content;
    public $category_id;
    public $news_type_id;
    public $featured_image;
    public $author_name;
    public $is_featured;
    public $is_published;
    public $published_date;
    public $views_count;
    public $created_at;
    public $updated_at;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        parent::__construct();
        global $Language, $CurrentLanguage, $CurrentLocale;

        // Language object
        $Language = Container("app.language");
        $this->TableVar = "news_posts";
        $this->TableName = 'news_posts';
        $this->TableType = "TABLE";
        $this->ImportUseTransaction = $this->supportsTransaction() && Config("IMPORT_USE_TRANSACTION");
        $this->UseTransaction = $this->supportsTransaction() && Config("USE_TRANSACTION");

        // Update Table
        $this->UpdateTable = "news_posts";
        $this->Dbid = 'DB';
        $this->ExportAll = true;
        $this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)

        // PDF
        $this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
        $this->ExportPageSize = "a4"; // Page size (PDF only)

        // PhpSpreadsheet
        $this->ExportExcelPageOrientation = null; // Page orientation (PhpSpreadsheet only)
        $this->ExportExcelPageSize = null; // Page size (PhpSpreadsheet only)

        // PHPWord
        $this->ExportWordPageOrientation = ""; // Page orientation (PHPWord only)
        $this->ExportWordPageSize = ""; // Page orientation (PHPWord only)
        $this->ExportWordColumnWidth = null; // Cell width (PHPWord only)
        $this->DetailAdd = false; // Allow detail add
        $this->DetailEdit = false; // Allow detail edit
        $this->DetailView = false; // Allow detail view
        $this->ShowMultipleDetails = false; // Show multiple details
        $this->GridAddRowCount = 5;
        $this->AllowAddDeleteRow = true; // Allow add/delete row
        $this->UseAjaxActions = $this->UseAjaxActions || Config("USE_AJAX_ACTIONS");
        $this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
        $this->BasicSearch = new BasicSearch($this);

        // id
        $this->id = new DbField(
            $this, // Table
            'x_id', // Variable name
            'id', // Name
            '"id"', // Expression
            'CAST("id" AS varchar(255))', // Basic search expression
            3, // Type
            0, // Size
            -1, // Date/Time format
            false, // Is upload field
            '"id"', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'NO' // Edit Tag
        );
        $this->id->InputTextType = "text";
        $this->id->Raw = true;
        $this->id->IsAutoIncrement = true; // Autoincrement field
        $this->id->IsPrimaryKey = true; // Primary key field
        $this->id->IsForeignKey = true; // Foreign key field
        $this->id->Nullable = false; // NOT NULL field
        $this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id->SearchOperators = ["=", "<>", "IN", "NOT IN", "<", "<=", ">", ">=", "BETWEEN", "NOT BETWEEN"];
        $this->Fields['id'] = &$this->id;

        // title
        $this->_title = new DbField(
            $this, // Table
            'x__title', // Variable name
            'title', // Name
            '"title"', // Expression
            '"title"', // Basic search expression
            200, // Type
            255, // Size
            -1, // Date/Time format
            false, // Is upload field
            '"title"', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->_title->InputTextType = "text";
        $this->_title->Nullable = false; // NOT NULL field
        $this->_title->Required = true; // Required field
        $this->_title->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY"];
        $this->Fields['title'] = &$this->_title;

        // slug
        $this->slug = new DbField(
            $this, // Table
            'x_slug', // Variable name
            'slug', // Name
            '"slug"', // Expression
            '"slug"', // Basic search expression
            200, // Type
            255, // Size
            -1, // Date/Time format
            false, // Is upload field
            '"slug"', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->slug->InputTextType = "text";
        $this->slug->Nullable = false; // NOT NULL field
        $this->slug->Required = true; // Required field
        $this->slug->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY"];
        $this->Fields['slug'] = &$this->slug;

        // excerpt
        $this->excerpt = new DbField(
            $this, // Table
            'x_excerpt', // Variable name
            'excerpt', // Name
            '"excerpt"', // Expression
            '"excerpt"', // Basic search expression
            201, // Type
            0, // Size
            -1, // Date/Time format
            false, // Is upload field
            '"excerpt"', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXTAREA' // Edit Tag
        );
        $this->excerpt->InputTextType = "text";
        $this->excerpt->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['excerpt'] = &$this->excerpt;

        // content
        $this->_content = new DbField(
            $this, // Table
            'x__content', // Variable name
            'content', // Name
            '"content"', // Expression
            '"content"', // Basic search expression
            201, // Type
            0, // Size
            -1, // Date/Time format
            false, // Is upload field
            '"content"', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXTAREA' // Edit Tag
        );
        $this->_content->InputTextType = "text";
        $this->_content->Nullable = false; // NOT NULL field
        $this->_content->Required = true; // Required field
        $this->_content->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY"];
        $this->Fields['content'] = &$this->_content;

        // category_id
        $this->category_id = new DbField(
            $this, // Table
            'x_category_id', // Variable name
            'category_id', // Name
            '"category_id"', // Expression
            'CAST("category_id" AS varchar(255))', // Basic search expression
            3, // Type
            0, // Size
            -1, // Date/Time format
            false, // Is upload field
            '"category_id"', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'SELECT' // Edit Tag
        );
        $this->category_id->InputTextType = "text";
        $this->category_id->Raw = true;
        $this->category_id->setSelectMultiple(false); // Select one
        $this->category_id->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->category_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->category_id->Lookup = new Lookup($this->category_id, 'news_categories', false, 'id', ["name","","",""], '', '', [], [], [], [], [], [], false, '', '', "\"name\"");
        $this->category_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->category_id->SearchOperators = ["=", "<>", "<", "<=", ">", ">=", "BETWEEN", "NOT BETWEEN", "IS NULL", "IS NOT NULL"];
        $this->Fields['category_id'] = &$this->category_id;

        // news_type_id
        $this->news_type_id = new DbField(
            $this, // Table
            'x_news_type_id', // Variable name
            'news_type_id', // Name
            '"news_type_id"', // Expression
            'CAST("news_type_id" AS varchar(255))', // Basic search expression
            3, // Type
            0, // Size
            -1, // Date/Time format
            false, // Is upload field
            '"news_type_id"', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'SELECT' // Edit Tag
        );
        $this->news_type_id->InputTextType = "text";
        $this->news_type_id->Raw = true;
        $this->news_type_id->setSelectMultiple(false); // Select one
        $this->news_type_id->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->news_type_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->news_type_id->Lookup = new Lookup($this->news_type_id, 'news_types', false, 'id', ["type_name","","",""], '', '', [], [], [], [], [], [], false, '', '', "\"type_name\"");
        $this->news_type_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->news_type_id->SearchOperators = ["=", "<>", "<", "<=", ">", ">=", "BETWEEN", "NOT BETWEEN", "IS NULL", "IS NOT NULL"];
        $this->Fields['news_type_id'] = &$this->news_type_id;

        // featured_image
        $this->featured_image = new DbField(
            $this, // Table
            'x_featured_image', // Variable name
            'featured_image', // Name
            '"featured_image"', // Expression
            '"featured_image"', // Basic search expression
            200, // Type
            500, // Size
            -1, // Date/Time format
            true, // Is upload field
            '"featured_image"', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'IMAGE', // View Tag
            'FILE' // Edit Tag
        );
        $this->featured_image->addMethod("getUploadPath", fn() => appConfig('s3.custom_path'));
        $this->featured_image->InputTextType = "text";
        $this->featured_image->SearchOperators = ["=", "<>", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['featured_image'] = &$this->featured_image;

        // author_name
        $this->author_name = new DbField(
            $this, // Table
            'x_author_name', // Variable name
            'author_name', // Name
            '"author_name"', // Expression
            '"author_name"', // Basic search expression
            200, // Type
            100, // Size
            -1, // Date/Time format
            false, // Is upload field
            '"author_name"', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->author_name->addMethod("getDefault", fn() => "office of gov. lilia pineda");
        $this->author_name->InputTextType = "text";
        $this->author_name->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['author_name'] = &$this->author_name;

        // is_featured
        $this->is_featured = new DbField(
            $this, // Table
            'x_is_featured', // Variable name
            'is_featured', // Name
            '"is_featured"', // Expression
            'CAST("is_featured" AS varchar(255))', // Basic search expression
            11, // Type
            0, // Size
            -1, // Date/Time format
            false, // Is upload field
            '"is_featured"', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'CHECKBOX' // Edit Tag
        );
        $this->is_featured->InputTextType = "text";
        $this->is_featured->Raw = true;
        $this->is_featured->setDataType(DataType::BOOLEAN);
        $this->is_featured->Lookup = new Lookup($this->is_featured, 'news_posts', false, '', ["","","",""], '', '', [], [], [], [], [], [], false, '', '', "");
        $this->is_featured->OptionCount = 2;
        $this->is_featured->SearchOperators = ["=", "<>", "IS NULL", "IS NOT NULL"];
        $this->Fields['is_featured'] = &$this->is_featured;

        // is_published
        $this->is_published = new DbField(
            $this, // Table
            'x_is_published', // Variable name
            'is_published', // Name
            '"is_published"', // Expression
            'CAST("is_published" AS varchar(255))', // Basic search expression
            11, // Type
            0, // Size
            -1, // Date/Time format
            false, // Is upload field
            '"is_published"', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'CHECKBOX' // Edit Tag
        );
        $this->is_published->InputTextType = "text";
        $this->is_published->Raw = true;
        $this->is_published->setDataType(DataType::BOOLEAN);
        $this->is_published->Lookup = new Lookup($this->is_published, 'news_posts', false, '', ["","","",""], '', '', [], [], [], [], [], [], false, '', '', "");
        $this->is_published->OptionCount = 2;
        $this->is_published->SearchOperators = ["=", "<>", "IS NULL", "IS NOT NULL"];
        $this->Fields['is_published'] = &$this->is_published;

        // published_date
        $this->published_date = new DbField(
            $this, // Table
            'x_published_date', // Variable name
            'published_date', // Name
            '"published_date"', // Expression
            CastDateFieldForLike("\"published_date\"", 0, "DB"), // Basic search expression
            135, // Type
            0, // Size
            0, // Date/Time format
            false, // Is upload field
            '"published_date"', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->published_date->InputTextType = "text";
        $this->published_date->Raw = true;
        $this->published_date->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->published_date->SearchOperators = ["=", "<>", "IN", "NOT IN", "<", "<=", ">", ">=", "BETWEEN", "NOT BETWEEN", "IS NULL", "IS NOT NULL"];
        $this->Fields['published_date'] = &$this->published_date;

        // views_count
        $this->views_count = new DbField(
            $this, // Table
            'x_views_count', // Variable name
            'views_count', // Name
            '"views_count"', // Expression
            'CAST("views_count" AS varchar(255))', // Basic search expression
            3, // Type
            0, // Size
            -1, // Date/Time format
            false, // Is upload field
            '"views_count"', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->views_count->addMethod("getDefault", fn() => 0);
        $this->views_count->InputTextType = "text";
        $this->views_count->Raw = true;
        $this->views_count->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->views_count->SearchOperators = ["=", "<>", "IN", "NOT IN", "<", "<=", ">", ">=", "BETWEEN", "NOT BETWEEN", "IS NULL", "IS NOT NULL"];
        $this->Fields['views_count'] = &$this->views_count;

        // created_at
        $this->created_at = new DbField(
            $this, // Table
            'x_created_at', // Variable name
            'created_at', // Name
            '"created_at"', // Expression
            CastDateFieldForLike("\"created_at\"", 0, "DB"), // Basic search expression
            135, // Type
            0, // Size
            0, // Date/Time format
            false, // Is upload field
            '"created_at"', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->created_at->addMethod("getAutoUpdateValue", fn() => CurrentDateTime());
        $this->created_at->InputTextType = "text";
        $this->created_at->Raw = true;
        $this->created_at->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->created_at->SearchOperators = ["=", "<>", "IN", "NOT IN", "<", "<=", ">", ">=", "BETWEEN", "NOT BETWEEN", "IS NULL", "IS NOT NULL"];
        $this->Fields['created_at'] = &$this->created_at;

        // updated_at
        $this->updated_at = new DbField(
            $this, // Table
            'x_updated_at', // Variable name
            'updated_at', // Name
            '"updated_at"', // Expression
            CastDateFieldForLike("\"updated_at\"", 0, "DB"), // Basic search expression
            135, // Type
            0, // Size
            0, // Date/Time format
            false, // Is upload field
            '"updated_at"', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->updated_at->addMethod("getAutoUpdateValue", fn() => CurrentDateTime());
        $this->updated_at->InputTextType = "text";
        $this->updated_at->Raw = true;
        $this->updated_at->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->updated_at->SearchOperators = ["=", "<>", "IN", "NOT IN", "<", "<=", ">", ">=", "BETWEEN", "NOT BETWEEN", "IS NULL", "IS NOT NULL"];
        $this->Fields['updated_at'] = &$this->updated_at;

        // Add Doctrine Cache
        $this->Cache = new \Symfony\Component\Cache\Adapter\ArrayAdapter();
        $this->CacheProfile = new \Doctrine\DBAL\Cache\QueryCacheProfile(0, $this->TableVar);

        // Call Table Load event
        $this->tableLoad();
    }

    // Field Visibility
    public function getFieldVisibility($fldParm)
    {
        global $Security;
        return $this->$fldParm->Visible; // Returns original value
    }

    // Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
    public function setLeftColumnClass($class)
    {
        if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
            $this->LeftColumnClass = $class . " col-form-label ew-label";
            $this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
            $this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
            $this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
        }
    }

    // Single column sort
    public function updateSort(&$fld)
    {
        if ($this->CurrentOrder == $fld->Name) {
            $sortField = $fld->Expression;
            $lastSort = $fld->getSort();
            if (in_array($this->CurrentOrderType, ["ASC", "DESC", "NO"])) {
                $curSort = $this->CurrentOrderType;
            } else {
                $curSort = $lastSort;
            }
            $orderBy = in_array($curSort, ["ASC", "DESC"]) ? $sortField . " " . $curSort : "";
            $this->setSessionOrderBy($orderBy); // Save to Session
        }
    }

    // Update field sort
    public function updateFieldSort()
    {
        $orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
        $flds = GetSortFields($orderBy);
        foreach ($this->Fields as $field) {
            $fldSort = "";
            foreach ($flds as $fld) {
                if ($fld[0] == $field->Expression || $fld[0] == $field->VirtualExpression) {
                    $fldSort = $fld[1];
                }
            }
            $field->setSort($fldSort);
        }
    }

    // Current detail table name
    public function getCurrentDetailTable()
    {
        return Session(PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")) ?? "";
    }

    public function setCurrentDetailTable($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")] = $v;
    }

    // Get detail url
    public function getDetailUrl()
    {
        // Detail url
        $detailUrl = "";
        if ($this->getCurrentDetailTable() == "news_post_tags") {
            $detailUrl = Container("news_post_tags")->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
            $detailUrl .= "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue);
        }
        if ($detailUrl == "") {
            $detailUrl = "NewsPostsList";
        }
        return $detailUrl;
    }

    // Render X Axis for chart
    public function renderChartXAxis($chartVar, $chartRow)
    {
        return $chartRow;
    }

    // Get FROM clause
    public function getSqlFrom()
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "news_posts";
    }

    // Get FROM clause (for backward compatibility)
    public function sqlFrom()
    {
        return $this->getSqlFrom();
    }

    // Set FROM clause
    public function setSqlFrom($v)
    {
        $this->SqlFrom = $v;
    }

    // Get SELECT clause
    public function getSqlSelect() // Select
    {
        return $this->SqlSelect ?? $this->getQueryBuilder()->select($this->sqlSelectFields());
    }

    // Get list of fields
    private function sqlSelectFields()
    {
        $useFieldNames = false;
        $fieldNames = [];
        $platform = $this->getConnection()->getDatabasePlatform();
        foreach ($this->Fields as $field) {
            $expr = $field->Expression;
            $customExpr = $field->CustomDataType?->convertToPHPValueSQL($expr, $platform) ?? $expr;
            if ($customExpr != $expr) {
                $fieldNames[] = $customExpr . " AS " . QuotedName($field->Name, $this->Dbid);
                $useFieldNames = true;
            } else {
                $fieldNames[] = $expr;
            }
        }
        return $useFieldNames ? implode(", ", $fieldNames) : "*";
    }

    // Get SELECT clause (for backward compatibility)
    public function sqlSelect()
    {
        return $this->getSqlSelect();
    }

    // Set SELECT clause
    public function setSqlSelect($v)
    {
        $this->SqlSelect = $v;
    }

    // Get WHERE clause
    public function getSqlWhere()
    {
        $where = ($this->SqlWhere != "") ? $this->SqlWhere : "";
        $this->DefaultFilter = "";
        AddFilter($where, $this->DefaultFilter);
        return $where;
    }

    // Get WHERE clause (for backward compatibility)
    public function sqlWhere()
    {
        return $this->getSqlWhere();
    }

    // Set WHERE clause
    public function setSqlWhere($v)
    {
        $this->SqlWhere = $v;
    }

    // Get GROUP BY clause
    public function getSqlGroupBy()
    {
        return $this->SqlGroupBy != "" ? $this->SqlGroupBy : "";
    }

    // Get GROUP BY clause (for backward compatibility)
    public function sqlGroupBy()
    {
        return $this->getSqlGroupBy();
    }

    // set GROUP BY clause
    public function setSqlGroupBy($v)
    {
        $this->SqlGroupBy = $v;
    }

    // Get HAVING clause
    public function getSqlHaving() // Having
    {
        return ($this->SqlHaving != "") ? $this->SqlHaving : "";
    }

    // Get HAVING clause (for backward compatibility)
    public function sqlHaving()
    {
        return $this->getSqlHaving();
    }

    // Set HAVING clause
    public function setSqlHaving($v)
    {
        $this->SqlHaving = $v;
    }

    // Get ORDER BY clause
    public function getSqlOrderBy()
    {
        return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "";
    }

    // Get ORDER BY clause (for backward compatibility)
    public function sqlOrderBy()
    {
        return $this->getSqlOrderBy();
    }

    // set ORDER BY clause
    public function setSqlOrderBy($v)
    {
        $this->SqlOrderBy = $v;
    }

    // Apply User ID filters
    public function applyUserIDFilters($filter, $id = "")
    {
        return $filter;
    }

    // Check if User ID security allows view all
    public function userIDAllow($id = "")
    {
        $allow = $this->UserIDAllowSecurity;
        switch ($id) {
            case "add":
            case "copy":
            case "gridadd":
            case "register":
            case "addopt":
                return ($allow & Allow::ADD->value) == Allow::ADD->value;
            case "edit":
            case "gridedit":
            case "update":
            case "changepassword":
            case "resetpassword":
                return ($allow & Allow::EDIT->value) == Allow::EDIT->value;
            case "delete":
                return ($allow & Allow::DELETE->value) == Allow::DELETE->value;
            case "view":
                return ($allow & Allow::VIEW->value) == Allow::VIEW->value;
            case "search":
                return ($allow & Allow::SEARCH->value) == Allow::SEARCH->value;
            case "lookup":
                return ($allow & Allow::LOOKUP->value) == Allow::LOOKUP->value;
            default:
                return ($allow & Allow::LIST->value) == Allow::LIST->value;
        }
    }

    /**
     * Get record count
     *
     * @param string|QueryBuilder $sql SQL or QueryBuilder
     * @param mixed $c Connection
     * @return int
     */
    public function getRecordCount($sql, $c = null)
    {
        $cnt = -1;
        $sqlwrk = $sql instanceof QueryBuilder // Query builder
            ? (clone $sql)->resetQueryPart("orderBy")->getSQL()
            : $sql;
        $pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';
        // Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
        if (
            in_array($this->TableType, ["TABLE", "VIEW", "LINKTABLE"]) &&
            preg_match($pattern, $sqlwrk) &&
            !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sqlwrk) &&
            !preg_match('/^\s*SELECT\s+DISTINCT\s+/i', $sqlwrk) &&
            !preg_match('/\s+ORDER\s+BY\s+/i', $sqlwrk)
        ) {
            $sqlcnt = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sqlwrk);
        } else {
            $sqlcnt = "SELECT COUNT(*) FROM (" . $sqlwrk . ") COUNT_TABLE";
        }
        $conn = $c ?? $this->getConnection();
        $cnt = $conn->fetchOne($sqlcnt);
        if ($cnt !== false) {
            return (int)$cnt;
        }
        // Unable to get count by SELECT COUNT(*), execute the SQL to get record count directly
        $result = $conn->executeQuery($sqlwrk);
        $cnt = $result->rowCount();
        if ($cnt == 0) { // Unable to get record count, count directly
            while ($result->fetch()) {
                $cnt++;
            }
        }
        return $cnt;
    }

    // Get SQL
    public function getSql($where, $orderBy = "")
    {
        return $this->getSqlAsQueryBuilder($where, $orderBy)->getSQL();
    }

    // Get QueryBuilder
    public function getSqlAsQueryBuilder($where, $orderBy = "")
    {
        return $this->buildSelectSql(
            $this->getSqlSelect(),
            $this->getSqlFrom(),
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $where,
            $orderBy
        );
    }

    // Table SQL
    public function getCurrentSql()
    {
        $filter = $this->CurrentFilter;
        $filter = $this->applyUserIDFilters($filter);
        $sort = $this->getSessionOrderBy();
        return $this->getSql($filter, $sort);
    }

    /**
     * Table SQL with List page filter
     *
     * @return QueryBuilder
     */
    public function getListSql()
    {
        $filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
        AddFilter($filter, $this->CurrentFilter);
        $filter = $this->applyUserIDFilters($filter);
        $this->recordsetSelecting($filter);
        $select = $this->getSqlSelect();
        $from = $this->getSqlFrom();
        $sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
        $this->Sort = $sort;
        return $this->buildSelectSql(
            $select,
            $from,
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $filter,
            $sort
        );
    }

    // Get ORDER BY clause
    public function getOrderBy()
    {
        $orderBy = $this->getSqlOrderBy();
        $sort = $this->getSessionOrderBy();
        if ($orderBy != "" && $sort != "") {
            $orderBy .= ", " . $sort;
        } elseif ($sort != "") {
            $orderBy = $sort;
        }
        return $orderBy;
    }

    // Get record count based on filter (for detail record count in master table pages)
    public function loadRecordCount($filter)
    {
        $origFilter = $this->CurrentFilter;
        $this->CurrentFilter = $filter;
        $this->recordsetSelecting($this->CurrentFilter);
        $isCustomView = $this->TableType == "CUSTOMVIEW";
        $select = $isCustomView ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $isCustomView ? $this->getSqlGroupBy() : "";
        $having = $isCustomView ? $this->getSqlHaving() : "";
        $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
        $cnt = $this->getRecordCount($sql);
        $this->CurrentFilter = $origFilter;
        return $cnt;
    }

    // Get record count (for current List page)
    public function listRecordCount()
    {
        $filter = $this->getSessionWhere();
        AddFilter($filter, $this->CurrentFilter);
        $filter = $this->applyUserIDFilters($filter);
        $this->recordsetSelecting($filter);
        $isCustomView = $this->TableType == "CUSTOMVIEW";
        $select = $isCustomView ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $isCustomView ? $this->getSqlGroupBy() : "";
        $having = $isCustomView ? $this->getSqlHaving() : "";
        $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
        $cnt = $this->getRecordCount($sql);
        return $cnt;
    }

    /**
     * INSERT statement
     *
     * @param mixed $rs
     * @return QueryBuilder
     */
    public function insertSql(&$rs)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->insert($this->UpdateTable);
        $platform = $this->getConnection()->getDatabasePlatform();
        foreach ($rs as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom) {
                continue;
            }
            $field = $this->Fields[$name];
            $parm = $queryBuilder->createPositionalParameter($value, $field->getParameterType());
            $parm = $field->CustomDataType?->convertToDatabaseValueSQL($parm, $platform) ?? $parm; // Convert database SQL
            $queryBuilder->setValue($field->Expression, $parm);
        }
        return $queryBuilder;
    }

    // Insert
    public function insert(&$rs)
    {
        $conn = $this->getConnection();
        try {
            $queryBuilder = $this->insertSql($rs);
            $result = $conn->executeQuery(
                $queryBuilder->getSQL() . " RETURNING id",
                $queryBuilder->getParameters(),
                $queryBuilder->getParameterTypes()
            )->fetchOne();
            $this->DbErrorMessage = "";
        } catch (\Exception $e) {
            $result = false;
            $this->DbErrorMessage = $e->getMessage();
        }
        if ($result) {
            $this->id->setDbValue($result);
            $rs['id'] = $this->id->DbValue;
        }
        return $result !== false ? 1 : false;
    }

    /**
     * UPDATE statement
     *
     * @param array $rs Data to be updated
     * @param string|array $where WHERE clause
     * @param string $curfilter Filter
     * @return QueryBuilder
     */
    public function updateSql(&$rs, $where = "", $curfilter = true)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->update($this->UpdateTable);
        $platform = $this->getConnection()->getDatabasePlatform();
        foreach ($rs as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom || $this->Fields[$name]->IsAutoIncrement) {
                continue;
            }
            $field = $this->Fields[$name];
            $parm = $queryBuilder->createPositionalParameter($value, $field->getParameterType());
            $parm = $field->CustomDataType?->convertToDatabaseValueSQL($parm, $platform) ?? $parm; // Convert database SQL
            $queryBuilder->set($field->Expression, $parm);
        }
        $filter = $curfilter ? $this->CurrentFilter : "";
        if (is_array($where)) {
            $where = $this->arrayToFilter($where);
        }
        AddFilter($filter, $where);
        if ($filter != "") {
            $queryBuilder->where($filter);
        }
        return $queryBuilder;
    }

    // Update
    public function update(&$rs, $where = "", $rsold = null, $curfilter = true)
    {
        // If no field is updated, execute may return 0. Treat as success
        try {
            $success = $this->updateSql($rs, $where, $curfilter)->executeStatement();
            $success = $success > 0 ? $success : true;
            $this->DbErrorMessage = "";
        } catch (\Exception $e) {
            $success = false;
            $this->DbErrorMessage = $e->getMessage();
        }

        // Return auto increment field
        if ($success) {
            if (!isset($rs['id']) && !EmptyValue($this->id->CurrentValue)) {
                $rs['id'] = $this->id->CurrentValue;
            }
        }
        return $success;
    }

    /**
     * DELETE statement
     *
     * @param array $rs Key values
     * @param string|array $where WHERE clause
     * @param string $curfilter Filter
     * @return QueryBuilder
     */
    public function deleteSql(&$rs, $where = "", $curfilter = true)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->delete($this->UpdateTable);
        if (is_array($where)) {
            $where = $this->arrayToFilter($where);
        }
        if ($rs) {
            if (array_key_exists('id', $rs)) {
                AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($rs['id'], $this->id->DataType, $this->Dbid));
            }
        }
        $filter = $curfilter ? $this->CurrentFilter : "";
        AddFilter($filter, $where);
        return $queryBuilder->where($filter != "" ? $filter : "0=1");
    }

    // Delete
    public function delete(&$rs, $where = "", $curfilter = false)
    {
        $success = true;
        if ($success) {
            try {
                $success = $this->deleteSql($rs, $where, $curfilter)->executeStatement();
                $this->DbErrorMessage = "";
            } catch (\Exception $e) {
                $success = false;
                $this->DbErrorMessage = $e->getMessage();
            }
        }
        return $success;
    }

    // Load DbValue from result set or array
    protected function loadDbValues($row)
    {
        if (!is_array($row)) {
            return;
        }
        $this->id->DbValue = $row['id'];
        $this->_title->DbValue = $row['title'];
        $this->slug->DbValue = $row['slug'];
        $this->excerpt->DbValue = $row['excerpt'];
        $this->_content->DbValue = $row['content'];
        $this->category_id->DbValue = $row['category_id'];
        $this->news_type_id->DbValue = $row['news_type_id'];
        $this->featured_image->Upload->DbValue = $row['featured_image'];
        $this->author_name->DbValue = $row['author_name'];
        $this->is_featured->DbValue = (ConvertToBool($row['is_featured']) ? "1" : "0");
        $this->is_published->DbValue = (ConvertToBool($row['is_published']) ? "1" : "0");
        $this->published_date->DbValue = $row['published_date'];
        $this->views_count->DbValue = $row['views_count'];
        $this->created_at->DbValue = $row['created_at'];
        $this->updated_at->DbValue = $row['updated_at'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
        $this->featured_image->OldUploadPath = $this->featured_image->getUploadPath(); // PHP
        $oldFiles = EmptyValue($row['featured_image']) ? [] : [$row['featured_image']];
        foreach ($oldFiles as $oldFile) {
            if (file_exists($this->featured_image->oldPhysicalUploadPath() . $oldFile)) {
                @unlink($this->featured_image->oldPhysicalUploadPath() . $oldFile);
            }
        }
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter()
    {
        return "\"id\" = @id@";
    }

    // Get Key
    public function getKey($current = false, $keySeparator = null)
    {
        $keys = [];
        $val = $current ? $this->id->CurrentValue : $this->id->OldValue;
        if (EmptyValue($val)) {
            return "";
        } else {
            $keys[] = $val;
        }
        $keySeparator ??= Config("COMPOSITE_KEY_SEPARATOR");
        return implode($keySeparator, $keys);
    }

    // Set Key
    public function setKey($key, $current = false, $keySeparator = null)
    {
        $keySeparator ??= Config("COMPOSITE_KEY_SEPARATOR");
        $this->OldKey = strval($key);
        $keys = explode($keySeparator, $this->OldKey);
        if (count($keys) == 1) {
            if ($current) {
                $this->id->CurrentValue = $keys[0];
            } else {
                $this->id->OldValue = $keys[0];
            }
        }
    }

    // Get record filter
    public function getRecordFilter($row = null, $current = false)
    {
        $keyFilter = $this->sqlKeyFilter();
        if (is_array($row)) {
            $val = array_key_exists('id', $row) ? $row['id'] : null;
        } else {
            $val = !EmptyValue($this->id->OldValue) && !$current ? $this->id->OldValue : $this->id->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
        }
        return $keyFilter;
    }

    // Return page URL
    public function getReturnUrl()
    {
        $referUrl = ReferUrl();
        $referPageName = ReferPageName();
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if ($referUrl != "" && $referPageName != CurrentPageName() && $referPageName != "login") { // Referer not same page or login page
            $_SESSION[$name] = $referUrl; // Save to Session
        }
        return $_SESSION[$name] ?? GetUrl("NewsPostsList");
    }

    // Set return page URL
    public function setReturnUrl($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
    }

    // Get modal caption
    public function getModalCaption($pageName)
    {
        global $Language;
        return match ($pageName) {
            "NewsPostsView" => $Language->phrase("View"),
            "NewsPostsEdit" => $Language->phrase("Edit"),
            "NewsPostsAdd" => $Language->phrase("Add"),
            default => ""
        };
    }

    // Default route URL
    public function getDefaultRouteUrl()
    {
        return "NewsPostsList";
    }

    // API page name
    public function getApiPageName($action)
    {
        return match (strtolower($action)) {
            Config("API_VIEW_ACTION") => "NewsPostsView",
            Config("API_ADD_ACTION") => "NewsPostsAdd",
            Config("API_EDIT_ACTION") => "NewsPostsEdit",
            Config("API_DELETE_ACTION") => "NewsPostsDelete",
            Config("API_LIST_ACTION") => "NewsPostsList",
            default => ""
        };
    }

    // Current URL
    public function getCurrentUrl($parm = "")
    {
        $url = CurrentPageUrl(false);
        if ($parm != "") {
            $url = $this->keyUrl($url, $parm);
        } else {
            $url = $this->keyUrl($url, Config("TABLE_SHOW_DETAIL") . "=");
        }
        return $this->addMasterUrl($url);
    }

    // List URL
    public function getListUrl()
    {
        return "NewsPostsList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("NewsPostsView", $parm);
        } else {
            $url = $this->keyUrl("NewsPostsView", Config("TABLE_SHOW_DETAIL") . "=");
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "NewsPostsAdd?" . $parm;
        } else {
            $url = "NewsPostsAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("NewsPostsEdit", $parm);
        } else {
            $url = $this->keyUrl("NewsPostsEdit", Config("TABLE_SHOW_DETAIL") . "=");
        }
        return $this->addMasterUrl($url);
    }

    // Inline edit URL
    public function getInlineEditUrl()
    {
        $url = $this->keyUrl("NewsPostsList", "action=edit");
        return $this->addMasterUrl($url);
    }

    // Copy URL
    public function getCopyUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("NewsPostsAdd", $parm);
        } else {
            $url = $this->keyUrl("NewsPostsAdd", Config("TABLE_SHOW_DETAIL") . "=");
        }
        return $this->addMasterUrl($url);
    }

    // Inline copy URL
    public function getInlineCopyUrl()
    {
        $url = $this->keyUrl("NewsPostsList", "action=copy");
        return $this->addMasterUrl($url);
    }

    // Delete URL
    public function getDeleteUrl($parm = "")
    {
        if ($this->UseAjaxActions && ConvertToBool(Param("infinitescroll")) && CurrentPageID() == "list") {
            return $this->keyUrl(GetApiUrl(Config("API_DELETE_ACTION") . "/" . $this->TableVar));
        } else {
            return $this->keyUrl("NewsPostsDelete", $parm);
        }
    }

    // Add master url
    public function addMasterUrl($url)
    {
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json .= "\"id\":" . VarToJson($this->id->CurrentValue, "number");
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
        if ($this->id->CurrentValue !== null) {
            $url .= "/" . $this->encodeKeyValue($this->id->CurrentValue);
        } else {
            return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
        }
        if ($parm != "") {
            $url .= "?" . $parm;
        }
        return $url;
    }

    // Render sort
    public function renderFieldHeader($fld)
    {
        global $Security, $Language;
        $sortUrl = "";
        $attrs = "";
        if ($this->PageID != "grid" && $fld->Sortable) {
            $sortUrl = $this->sortUrl($fld);
            $attrs = ' role="button" data-ew-action="sort" data-ajax="' . ($this->UseAjaxActions ? "true" : "false") . '" data-sort-url="' . $sortUrl . '" data-sort-type="1"';
            if ($this->ContextClass) { // Add context
                $attrs .= ' data-context="' . HtmlEncode($this->ContextClass) . '"';
            }
        }
        $html = '<div class="ew-table-header-caption"' . $attrs . '>' . $fld->caption() . '</div>';
        if ($sortUrl) {
            $html .= '<div class="ew-table-header-sort">' . $fld->getSortIcon() . '</div>';
        }
        if ($this->PageID != "grid" && !$this->isExport() && $fld->UseFilter && $Security->canSearch()) {
            $html .= '<div class="ew-filter-dropdown-btn" data-ew-action="filter" data-table="' . $fld->TableVar . '" data-field="' . $fld->FieldVar .
                '"><div class="ew-table-header-filter" role="button" aria-haspopup="true">' . $Language->phrase("Filter") .
                (is_array($fld->EditValue) ? str_replace("%c", count($fld->EditValue), $Language->phrase("FilterCount")) : '') .
                '</div></div>';
        }
        $html = '<div class="ew-table-header-btn">' . $html . '</div>';
        if ($this->UseCustomTemplate) {
            $scriptId = str_replace("{id}", $fld->TableVar . "_" . $fld->Param, "tpc_{id}");
            $html = '<template id="' . $scriptId . '">' . $html . '</template>';
        }
        return $html;
    }

    // Sort URL
    public function sortUrl($fld)
    {
        global $DashboardReport;
        if (
            $this->CurrentAction || $this->isExport() ||
            in_array($fld->Type, [128, 204, 205])
        ) { // Unsortable data type
                return "";
        } elseif ($fld->Sortable) {
            $urlParm = "order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->getNextSort();
            if ($DashboardReport) {
                $urlParm .= "&amp;" . Config("PAGE_DASHBOARD") . "=" . $DashboardReport;
            }
            return $this->addMasterUrl($this->CurrentPageName . "?" . $urlParm);
        } else {
            return "";
        }
    }

    // Get record keys from Post/Get/Session
    public function getRecordKeys()
    {
        $arKeys = [];
        $arKey = [];
        if (Param("key_m") !== null) {
            $arKeys = Param("key_m");
            $cnt = count($arKeys);
        } else {
            $isApi = IsApi();
            $keyValues = $isApi
                ? (Route(0) == "export"
                    ? array_map(fn ($i) => Route($i + 3), range(0, 0))  // Export API
                    : array_map(fn ($i) => Route($i + 2), range(0, 0))) // Other API
                : []; // Non-API
            if (($keyValue = Param("id") ?? Route("id")) !== null) {
                $arKeys[] = $keyValue;
            } elseif ($isApi && (($keyValue = Key(0) ?? $keyValues[0] ?? null) !== null)) {
                $arKeys[] = $keyValue;
            } else {
                $arKeys = null; // Do not setup
            }
        }
        // Check keys
        $ar = [];
        if (is_array($arKeys)) {
            foreach ($arKeys as $key) {
                if (!is_numeric($key)) {
                    continue;
                }
                $ar[] = $key;
            }
        }
        return $ar;
    }

    // Get filter from records
    public function getFilterFromRecords($rows)
    {
        return implode(" OR ", array_map(fn($row) => "(" . $this->getRecordFilter($row) . ")", $rows));
    }

    // Get filter from record keys
    public function getFilterFromRecordKeys($setCurrent = true)
    {
        $arKeys = $this->getRecordKeys();
        $keyFilter = "";
        foreach ($arKeys as $key) {
            if ($keyFilter != "") {
                $keyFilter .= " OR ";
            }
            if ($setCurrent) {
                $this->id->CurrentValue = $key;
            } else {
                $this->id->OldValue = $key;
            }
            $keyFilter .= "(" . $this->getRecordFilter() . ")";
        }
        return $keyFilter;
    }

    // Load result set based on filter/sort
    public function loadRs($filter, $sort = "")
    {
        $sql = $this->getSql($filter, $sort); // Set up filter (WHERE Clause) / sort (ORDER BY Clause)
        $conn = $this->getConnection();
        return $conn->executeQuery($sql);
    }

    // Load row values from record
    public function loadListRowValues(&$rs)
    {
        if (is_array($rs)) {
            $row = $rs;
        } elseif ($rs && property_exists($rs, "fields")) { // Recordset
            $row = $rs->fields;
        } else {
            return;
        }
        $this->id->setDbValue($row['id']);
        $this->_title->setDbValue($row['title']);
        $this->slug->setDbValue($row['slug']);
        $this->excerpt->setDbValue($row['excerpt']);
        $this->_content->setDbValue($row['content']);
        $this->category_id->setDbValue($row['category_id']);
        $this->news_type_id->setDbValue($row['news_type_id']);
        $this->featured_image->Upload->DbValue = $row['featured_image'];
        $this->author_name->setDbValue($row['author_name']);
        $this->is_featured->setDbValue(ConvertToBool($row['is_featured']) ? "1" : "0");
        $this->is_published->setDbValue(ConvertToBool($row['is_published']) ? "1" : "0");
        $this->published_date->setDbValue($row['published_date']);
        $this->views_count->setDbValue($row['views_count']);
        $this->created_at->setDbValue($row['created_at']);
        $this->updated_at->setDbValue($row['updated_at']);
    }

    // Render list content
    public function renderListContent($filter)
    {
        global $Response;
        $listPage = "NewsPostsList";
        $listClass = PROJECT_NAMESPACE . $listPage;
        $page = new $listClass();
        $page->loadRecordsetFromFilter($filter);
        $view = Container("app.view");
        $template = $listPage . ".php"; // View
        $GLOBALS["Title"] ??= $page->Title; // Title
        try {
            $Response = $view->render($Response, $template, $GLOBALS);
        } finally {
            $page->terminate(); // Terminate page and clean up
        }
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id

        // title

        // slug

        // excerpt

        // content

        // category_id

        // news_type_id

        // featured_image

        // author_name

        // is_featured

        // is_published

        // published_date

        // views_count

        // created_at

        // updated_at

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

        // id
        $this->id->HrefValue = "";
        $this->id->TooltipValue = "";

        // title
        $this->_title->HrefValue = "";
        $this->_title->TooltipValue = "";

        // slug
        $this->slug->HrefValue = "";
        $this->slug->TooltipValue = "";

        // excerpt
        $this->excerpt->HrefValue = "";
        $this->excerpt->TooltipValue = "";

        // content
        $this->_content->HrefValue = "";
        $this->_content->TooltipValue = "";

        // category_id
        $this->category_id->HrefValue = "";
        $this->category_id->TooltipValue = "";

        // news_type_id
        $this->news_type_id->HrefValue = "";
        $this->news_type_id->TooltipValue = "";

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
        $this->featured_image->TooltipValue = "";
        if ($this->featured_image->UseColorbox) {
            if (EmptyValue($this->featured_image->TooltipValue)) {
                $this->featured_image->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
            }
            $this->featured_image->LinkAttrs["data-rel"] = "news_posts_x_featured_image";
            $this->featured_image->LinkAttrs->appendClass("ew-lightbox");
        }

        // author_name
        $this->author_name->HrefValue = "";
        $this->author_name->TooltipValue = "";

        // is_featured
        $this->is_featured->HrefValue = "";
        $this->is_featured->TooltipValue = "";

        // is_published
        $this->is_published->HrefValue = "";
        $this->is_published->TooltipValue = "";

        // published_date
        $this->published_date->HrefValue = "";
        $this->published_date->TooltipValue = "";

        // views_count
        $this->views_count->HrefValue = "";
        $this->views_count->TooltipValue = "";

        // created_at
        $this->created_at->HrefValue = "";
        $this->created_at->TooltipValue = "";

        // updated_at
        $this->updated_at->HrefValue = "";
        $this->updated_at->TooltipValue = "";

        // Call Row Rendered event
        $this->rowRendered();

        // Save data for Custom Template
        $this->Rows[] = $this->customTemplateFieldValues();
    }

    // Render edit row values
    public function renderEditRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // id
        $this->id->setupEditAttributes();
        $this->id->EditValue = $this->id->CurrentValue;

        // title
        $this->_title->setupEditAttributes();
        if (!$this->_title->Raw) {
            $this->_title->CurrentValue = HtmlDecode($this->_title->CurrentValue);
        }
        $this->_title->EditValue = $this->_title->CurrentValue;
        $this->_title->PlaceHolder = RemoveHtml($this->_title->caption());

        // slug
        $this->slug->setupEditAttributes();
        if (!$this->slug->Raw) {
            $this->slug->CurrentValue = HtmlDecode($this->slug->CurrentValue);
        }
        $this->slug->EditValue = $this->slug->CurrentValue;
        $this->slug->PlaceHolder = RemoveHtml($this->slug->caption());

        // excerpt
        $this->excerpt->setupEditAttributes();
        $this->excerpt->EditValue = $this->excerpt->CurrentValue;
        $this->excerpt->PlaceHolder = RemoveHtml($this->excerpt->caption());

        // content
        $this->_content->setupEditAttributes();
        $this->_content->EditValue = $this->_content->CurrentValue;
        $this->_content->PlaceHolder = RemoveHtml($this->_content->caption());

        // category_id
        $this->category_id->setupEditAttributes();
        $this->category_id->PlaceHolder = RemoveHtml($this->category_id->caption());

        // news_type_id
        $this->news_type_id->setupEditAttributes();
        $this->news_type_id->PlaceHolder = RemoveHtml($this->news_type_id->caption());

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

        // author_name
        $this->author_name->setupEditAttributes();
        if (!$this->author_name->Raw) {
            $this->author_name->CurrentValue = HtmlDecode($this->author_name->CurrentValue);
        }
        $this->author_name->EditValue = $this->author_name->CurrentValue;
        $this->author_name->PlaceHolder = RemoveHtml($this->author_name->caption());

        // is_featured
        $this->is_featured->EditValue = $this->is_featured->options(false);
        $this->is_featured->PlaceHolder = RemoveHtml($this->is_featured->caption());

        // is_published
        $this->is_published->EditValue = $this->is_published->options(false);
        $this->is_published->PlaceHolder = RemoveHtml($this->is_published->caption());

        // published_date
        $this->published_date->setupEditAttributes();
        $this->published_date->EditValue = FormatDateTime($this->published_date->CurrentValue, $this->published_date->formatPattern());
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

        // Call Row Rendered event
        $this->rowRendered();
    }

    // Aggregate list row values
    public function aggregateListRowValues()
    {
    }

    // Aggregate list row (for rendering)
    public function aggregateListRow()
    {
        // Call Row Rendered event
        $this->rowRendered();
    }

    // Export data in HTML/CSV/Word/Excel/Email/PDF format
    public function exportDocument($doc, $result, $startRec = 1, $stopRec = 1, $exportPageType = "")
    {
        if (!$result || !$doc) {
            return;
        }
        if (!$doc->ExportCustom) {
            // Write header
            $doc->exportTableHeader();
            if ($doc->Horizontal) { // Horizontal format, write header
                $doc->beginExportRow();
                if ($exportPageType == "view") {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->_title);
                    $doc->exportCaption($this->slug);
                    $doc->exportCaption($this->excerpt);
                    $doc->exportCaption($this->_content);
                    $doc->exportCaption($this->category_id);
                    $doc->exportCaption($this->news_type_id);
                    $doc->exportCaption($this->featured_image);
                    $doc->exportCaption($this->author_name);
                    $doc->exportCaption($this->is_featured);
                    $doc->exportCaption($this->is_published);
                    $doc->exportCaption($this->published_date);
                    $doc->exportCaption($this->views_count);
                    $doc->exportCaption($this->created_at);
                    $doc->exportCaption($this->updated_at);
                } else {
                    $doc->exportCaption($this->id);
                    $doc->exportCaption($this->_title);
                    $doc->exportCaption($this->slug);
                    $doc->exportCaption($this->category_id);
                    $doc->exportCaption($this->news_type_id);
                    $doc->exportCaption($this->featured_image);
                    $doc->exportCaption($this->author_name);
                    $doc->exportCaption($this->is_featured);
                    $doc->exportCaption($this->is_published);
                    $doc->exportCaption($this->published_date);
                    $doc->exportCaption($this->views_count);
                    $doc->exportCaption($this->created_at);
                    $doc->exportCaption($this->updated_at);
                }
                $doc->endExportRow();
            }
        }
        $recCnt = $startRec - 1;
        $stopRec = $stopRec > 0 ? $stopRec : PHP_INT_MAX;
        while (($row = $result->fetch()) && $recCnt < $stopRec) {
            $recCnt++;
            if ($recCnt >= $startRec) {
                $rowCnt = $recCnt - $startRec + 1;

                // Page break
                if ($this->ExportPageBreakCount > 0) {
                    if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0) {
                        $doc->exportPageBreak();
                    }
                }
                $this->loadListRowValues($row);

                // Render row
                $this->RowType = RowType::VIEW; // Render view
                $this->resetAttributes();
                $this->renderListRow();
                if (!$doc->ExportCustom) {
                    $doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
                    if ($exportPageType == "view") {
                        $doc->exportField($this->id);
                        $doc->exportField($this->_title);
                        $doc->exportField($this->slug);
                        $doc->exportField($this->excerpt);
                        $doc->exportField($this->_content);
                        $doc->exportField($this->category_id);
                        $doc->exportField($this->news_type_id);
                        $doc->exportField($this->featured_image);
                        $doc->exportField($this->author_name);
                        $doc->exportField($this->is_featured);
                        $doc->exportField($this->is_published);
                        $doc->exportField($this->published_date);
                        $doc->exportField($this->views_count);
                        $doc->exportField($this->created_at);
                        $doc->exportField($this->updated_at);
                    } else {
                        $doc->exportField($this->id);
                        $doc->exportField($this->_title);
                        $doc->exportField($this->slug);
                        $doc->exportField($this->category_id);
                        $doc->exportField($this->news_type_id);
                        $doc->exportField($this->featured_image);
                        $doc->exportField($this->author_name);
                        $doc->exportField($this->is_featured);
                        $doc->exportField($this->is_published);
                        $doc->exportField($this->published_date);
                        $doc->exportField($this->views_count);
                        $doc->exportField($this->created_at);
                        $doc->exportField($this->updated_at);
                    }
                    $doc->endExportRow($rowCnt);
                }
            }

            // Call Row Export server event
            if ($doc->ExportCustom) {
                $this->rowExport($doc, $row);
            }
        }
        if (!$doc->ExportCustom) {
            $doc->exportTableFooter();
        }
    }

    // Get file data
    public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0, $plugins = [])
    {
        global $DownloadFileName;
        $width = ($width > 0) ? $width : Config("THUMBNAIL_DEFAULT_WIDTH");
        $height = ($height > 0) ? $height : Config("THUMBNAIL_DEFAULT_HEIGHT");

        // Set up field name / file name field / file type field
        $fldName = "";
        $fileNameFld = "";
        $fileTypeFld = "";
        if ($fldparm == 'featured_image') {
            $fldName = "featured_image";
            $fileNameFld = "featured_image";
        } else {
            return false; // Incorrect field
        }

        // Set up key values
        $ar = explode(Config("COMPOSITE_KEY_SEPARATOR"), $key);
        if (count($ar) == 1) {
            $this->id->CurrentValue = $ar[0];
        } else {
            return false; // Incorrect key
        }

        // Set up filter (WHERE Clause)
        $filter = $this->getRecordFilter();
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $dbtype = GetConnectionType($this->Dbid);
        if ($row = $conn->fetchAssociative($sql)) {
            $val = $row[$fldName];
            if (!EmptyValue($val)) {
                $fld = $this->Fields[$fldName];

                // Binary data
                if ($fld->DataType == DataType::BLOB) {
                    if ($dbtype != "MYSQL") {
                        if (is_resource($val) && get_resource_type($val) == "stream") { // Byte array
                            $val = stream_get_contents($val);
                        }
                    }
                    if ($resize) {
                        ResizeBinary($val, $width, $height, $plugins);
                    }

                    // Write file type
                    if ($fileTypeFld != "" && !EmptyValue($row[$fileTypeFld])) {
                        AddHeader("Content-type", $row[$fileTypeFld]);
                    } else {
                        AddHeader("Content-type", ContentType($val));
                    }

                    // Write file name
                    $downloadPdf = !Config("EMBED_PDF") && Config("DOWNLOAD_PDF_FILE");
                    if ($fileNameFld != "" && !EmptyValue($row[$fileNameFld])) {
                        $fileName = $row[$fileNameFld];
                        $pathinfo = pathinfo($fileName);
                        $ext = strtolower($pathinfo["extension"] ?? "");
                        $isPdf = SameText($ext, "pdf");
                        if ($downloadPdf || !$isPdf) { // Skip header if not download PDF
                            AddHeader("Content-Disposition", "attachment; filename=\"" . $fileName . "\"");
                        }
                    } else {
                        $ext = ContentExtension($val);
                        $isPdf = SameText($ext, ".pdf");
                        if ($isPdf && $downloadPdf) { // Add header if download PDF
                            AddHeader("Content-Disposition", "attachment" . ($DownloadFileName ? "; filename=\"" . $DownloadFileName . "\"" : ""));
                        }
                    }

                    // Write file data
                    if (
                        StartsString("PK", $val) &&
                        ContainsString($val, "[Content_Types].xml") &&
                        ContainsString($val, "_rels") &&
                        ContainsString($val, "docProps")
                    ) { // Fix Office 2007 documents
                        if (!EndsString("\0\0\0", $val)) { // Not ends with 3 or 4 \0
                            $val .= "\0\0\0\0";
                        }
                    }

                    // Clear any debug message
                    if (ob_get_length()) {
                        ob_end_clean();
                    }

                    // Write binary data
                    Write($val);

                // Upload to folder
                } else {
                    if ($fld->UploadMultiple) {
                        $files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
                    } else {
                        $files = [$val];
                    }
                    $data = [];
                    $ar = [];
                    if ($fld->hasMethod("getUploadPath")) { // Check field level upload path
                        $fld->UploadPath = $fld->getUploadPath();
                    }
                    foreach ($files as $file) {
                        if (!EmptyValue($file)) {
                            if (Config("ENCRYPT_FILE_PATH")) {
                                $ar[$file] = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $this->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $file)));
                            } else {
                                $ar[$file] = FullUrl($fld->hrefPath() . $file);
                            }
                        }
                    }
                    $data[$fld->Param] = $ar;
                    WriteJson($data);
                }
            }
            return true;
        }
        return false;
    }

    // Table level events

    // Table Load event
    public function tableLoad()
    {
        // Enter your code here
    }

    // Recordset Selecting event
    public function recordsetSelecting(&$filter)
    {
        // Enter your code here
    }

    // Recordset Selected event
    public function recordsetSelected($rs)
    {
        //Log("Recordset Selected");
    }

    // Recordset Search Validated event
    public function recordsetSearchValidated()
    {
        // Example:
        //$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value
    }

    // Recordset Searching event
    public function recordsetSearching(&$filter)
    {
        // Enter your code here
    }

    // Row_Selecting event
    public function rowSelecting(&$filter)
    {
        // Enter your code here
    }

    // Row Selected event
    public function rowSelected(&$rs)
    {
        //Log("Row Selected");
    }

    // Row Inserting event
    public function rowInserting($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
    }

    // Row Inserted event
    public function rowInserted($rsold, $rsnew)
    {
        //Log("Row Inserted");
    }

    // Row Updating event
    public function rowUpdating($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
    }

    // Row Updated event
    public function rowUpdated($rsold, $rsnew)
    {
        //Log("Row Updated");
    }

    // Row Update Conflict event
    public function rowUpdateConflict($rsold, &$rsnew)
    {
        // Enter your code here
        // To ignore conflict, set return value to false
        return true;
    }

    // Grid Inserting event
    public function gridInserting()
    {
        // Enter your code here
        // To reject grid insert, set return value to false
        return true;
    }

    // Grid Inserted event
    public function gridInserted($rsnew)
    {
        //Log("Grid Inserted");
    }

    // Grid Updating event
    public function gridUpdating($rsold)
    {
        // Enter your code here
        // To reject grid update, set return value to false
        return true;
    }

    // Grid Updated event
    public function gridUpdated($rsold, $rsnew)
    {
        //Log("Grid Updated");
    }

    // Row Deleting event
    public function rowDeleting(&$rs)
    {
        // Enter your code here
        // To cancel, set return value to False
        return true;
    }

    // Row Deleted event
    public function rowDeleted($rs)
    {
        //Log("Row Deleted");
    }

    // Email Sending event
    public function emailSending($email, $args)
    {
        //var_dump($email, $args); exit();
        return true;
    }

    // Lookup Selecting event
    public function lookupSelecting($fld, &$filter)
    {
        //var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
        // Enter your code here
    }

    // Row Rendering event
    public function rowRendering()
    {
        // Enter your code here
    }

    // Row Rendered event
    public function rowRendered()
    {
        // To view properties of field class, use:
        //var_dump($this-><FieldName>);
    }

    // User ID Filtering event
    public function userIdFiltering(&$filter)
    {
        // Enter your code here
    }
}
