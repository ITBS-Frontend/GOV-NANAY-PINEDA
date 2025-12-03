<?php

namespace PHPMaker2024\Gov_Nanay_Pineda;

use Slim\Views\PhpRenderer;
use Slim\Csrf\Guard;
use Slim\HttpCache\CacheProvider;
use Slim\Flash\Messages;
use Psr\Container\ContainerInterface;
use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Doctrine\DBAL\Logging\LoggerChain;
use Doctrine\DBAL\Logging\DebugStack;
use Doctrine\DBAL\Platforms;
use Doctrine\Common\Cache\Psr6\DoctrineProvider;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Events;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Mime\MimeTypes;
use FastRoute\RouteParser\Std;
use Illuminate\Encryption\Encrypter;
use HTMLPurifier_Config;
use HTMLPurifier;

// Connections and entity managers
$definitions = [];
$dbids = array_keys(Config("Databases"));
foreach ($dbids as $dbid) {
    $definitions["connection." . $dbid] = \DI\factory(function (string $dbid) {
        return ConnectDb(Db($dbid));
    })->parameter("dbid", $dbid);
    $definitions["entitymanager." . $dbid] = \DI\factory(function (ContainerInterface $c, string $dbid) {
        $cache = IsDevelopment()
            ? DoctrineProvider::wrap(new ArrayAdapter())
            : DoctrineProvider::wrap(new FilesystemAdapter(directory: Config("DOCTRINE.CACHE_DIR")));
        $config = Setup::createAttributeMetadataConfiguration(
            Config("DOCTRINE.METADATA_DIRS"),
            IsDevelopment(),
            null,
            $cache
        );
        $conn = $c->get("connection." . $dbid);
        return new EntityManager($conn, $config);
    })->parameter("dbid", $dbid);
}

return [
    "app.cache" => \DI\create(CacheProvider::class),
    "app.flash" => fn(ContainerInterface $c) => new Messages(),
    "app.view" => fn(ContainerInterface $c) => new PhpRenderer($GLOBALS["RELATIVE_PATH"] . "views/"),
    "email.view" => fn(ContainerInterface $c) => new PhpRenderer($GLOBALS["RELATIVE_PATH"] . "lang/"),
    "sms.view" => fn(ContainerInterface $c) => new PhpRenderer($GLOBALS["RELATIVE_PATH"] . "lang/"),
    "app.audit" => fn(ContainerInterface $c) => (new Logger("audit"))->pushHandler(new AuditTrailHandler($GLOBALS["RELATIVE_PATH"] . "log/audit.log")), // For audit trail
    "app.logger" => fn(ContainerInterface $c) => (new Logger("log"))->pushHandler(new RotatingFileHandler($GLOBALS["RELATIVE_PATH"] . "log/log.log")),
    "sql.logger" => function (ContainerInterface $c) {
        $loggers = [];
        if (Config("DEBUG")) {
            $loggers[] = $c->get("debug.stack");
        }
        return (count($loggers) > 0) ? new LoggerChain($loggers) : null;
    },
    "app.csrf" => fn(ContainerInterface $c) => new Guard($GLOBALS["ResponseFactory"], Config("CSRF_PREFIX")),
    "html.purifier.config" => fn(ContainerInterface $c) => HTMLPurifier_Config::createDefault(),
    "html.purifier" => fn(ContainerInterface $c) => new HTMLPurifier($c->get("html.purifier.config")),
    "debug.stack" => \DI\create(DebugStack::class),
    "debug.sql.logger" => \DI\create(DebugSqlLogger::class),
    "debug.timer" => \DI\create(Timer::class),
    "app.security" => \DI\create(AdvancedSecurity::class),
    "user.profile" => \DI\create(UserProfile::class),
    "app.session" => \DI\create(HttpSession::class),
    "mime.types" => \DI\create(MimeTypes::class),
    "app.language" => \DI\create(Language::class),
    PermissionMiddleware::class => \DI\create(PermissionMiddleware::class),
    ApiPermissionMiddleware::class => \DI\create(ApiPermissionMiddleware::class),
    JwtMiddleware::class => \DI\create(JwtMiddleware::class),
    Std::class => \DI\create(Std::class),
    Encrypter::class => fn(ContainerInterface $c) => new Encrypter(AesEncryptionKey(base64_decode(Config("AES_ENCRYPTION_KEY"))), Config("AES_ENCRYPTION_CIPHER")),

    // Tables
    "categories" => \DI\create(Categories::class),
    "political_journey" => \DI\create(PoliticalJourney::class),
    "project_stats" => \DI\create(ProjectStats::class),
    "projects" => \DI\create(Projects::class),
    "_user_levels" => \DI\create(UserLevels::class),
    "user_permissions" => \DI\create(UserPermissions::class),
    "users" => \DI\create(Users::class),
    "main" => \DI\create(Main::class),
    "about_content" => \DI\create(AboutContent::class),
    "achievements" => \DI\create(Achievements::class),
    "profile_details" => \DI\create(ProfileDetails::class),
    "profile_images" => \DI\create(ProfileImages::class),
    "project_gallery" => \DI\create(ProjectGallery::class),
    "project_highlights" => \DI\create(ProjectHighlights::class),
    "news_categories" => \DI\create(NewsCategories::class),
    "news_post_tags" => \DI\create(NewsPostTags::class),
    "news_posts" => \DI\create(NewsPosts::class),
    "news_tags" => \DI\create(NewsTags::class),
    "business_sectors" => \DI\create(BusinessSectors::class),
    "demographics_data" => \DI\create(DemographicsData::class),
    "destination_gallery" => \DI\create(DestinationGallery::class),
    "disaster_incidents" => \DI\create(DisasterIncidents::class),
    "disaster_preparedness" => \DI\create(DisasterPreparedness::class),
    "economic_indicators" => \DI\create(EconomicIndicators::class),
    "emergency_facilities" => \DI\create(EmergencyFacilities::class),
    "environmental_programs" => \DI\create(EnvironmentalPrograms::class),
    "geographic_info" => \DI\create(GeographicInfo::class),
    "government_facilities" => \DI\create(GovernmentFacilities::class),
    "health_programs" => \DI\create(HealthPrograms::class),
    "investment_opportunities" => \DI\create(InvestmentOpportunities::class),
    "municipalities" => \DI\create(Municipalities::class),
    "program_categories" => \DI\create(ProgramCategories::class),
    "program_statistics" => \DI\create(ProgramStatistics::class),
    "province_history" => \DI\create(ProvinceHistory::class),
    "public_services" => \DI\create(PublicServices::class),
    "service_categories" => \DI\create(ServiceCategories::class),
    "social_welfare_programs" => \DI\create(SocialWelfarePrograms::class),
    "tourism_activities" => \DI\create(TourismActivities::class),
    "tourism_categories" => \DI\create(TourismCategories::class),
    "tourism_destinations" => \DI\create(TourismDestinations::class),
    "tourism_facilities" => \DI\create(TourismFacilities::class),
    "facility_types" => \DI\create(FacilityTypes::class),
    "ownership_types" => \DI\create(OwnershipTypes::class),
    "program_types" => \DI\create(ProgramTypes::class),
    "tourism_facility_types" => \DI\create(TourismFacilityTypes::class),
    "category_types" => \DI\create(CategoryTypes::class),
    "demographics_types" => \DI\create(DemographicsTypes::class),
    "difficulty_levels" => \DI\create(DifficultyLevels::class),
    "disaster_types" => \DI\create(DisasterTypes::class),
    "emergency_facility_types" => \DI\create(EmergencyFacilityTypes::class),
    "environmental_program_types" => \DI\create(EnvironmentalProgramTypes::class),
    "geographic_info_types" => \DI\create(GeographicInfoTypes::class),
    "news_types" => \DI\create(NewsTypes::class),
    "project_types" => \DI\create(ProjectTypes::class),
    "status_types" => \DI\create(StatusTypes::class),
    "dashboard2" => \DI\create(Dashboard2::class),
    "pampanga_about" => \DI\create(PampangaAbout::class),
    "quick_facts" => \DI\create(QuickFacts::class),

    // User table
    "usertable" => \DI\get("users"),
] + $definitions;
