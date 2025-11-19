<?php

/**
 * PHPMaker 2024 configuration file (Development)
 */

return [
    "Databases" => [
        "DB" => ["id" => "DB", "type" => "POSTGRESQL", "qs" => "\"", "qe" => "\"", "host" => "localhost", "port" => "5432", "user" => "itbsvanguard", "password" => "jdf3MrRp&3asP3k", "dbname" => "ITBS_nanay", "schema" => ""]
    ],
    "SMTP" => [
        "PHPMAILER_MAILER" => "smtp", // PHPMailer mailer
        "SERVER" => "localhost", // SMTP server
        "SERVER_PORT" => 25, // SMTP server port
        "SECURE_OPTION" => "",
        "SERVER_USERNAME" => "", // SMTP server user name
        "SERVER_PASSWORD" => "", // SMTP server password
    ],
    "JWT" => [
        "SECRET_KEY" => "CTLOqYPcCwOMz1Ogq9EaiIgmSZIa47Rf1EKUXWI6N+c=", // JWT secret key
        "ALGORITHM" => "HS512", // JWT algorithm
        "AUTH_HEADER" => "X-Authorization", // API authentication header (Note: The "Authorization" header is removed by IIS, use "X-Authorization" instead.)
        "NOT_BEFORE_TIME" => 0, // API access time before login
        "EXPIRE_TIME" => 600 // API expire time
    ],
    "DO" => [
        "SPACES" => [
            "END_POINT" => "https://sgp1.digitaloceanspaces.com", // S3 bucket name
            "BUCKET" => "vector-icon-library", // S3 bucket name
            "REGION" => "sgp1", // S3 region
            "KEY" => "DO801KKY7N3YQAWTVMVV", // S3 access
            "SECRET" => "pYBxnUxXbHYuGxVcfECQDI+euf+MuYK5FumhANQGojY" // S3 secret
        ]
    ],

    "UPLOAD_TEMP_PATH" => "/var/www/nanay.smartcountry.ph/public/Admin/uploads", // Upload temp path (absolute local physical path)
    // "UPLOAD_TEMP_HREF_PATH" => "//pms-shopping.localhost//uploads/", // Upload temp href path (absolute URL path for download)
    "UPLOAD_DEST_PATH" => "s3://vector-icon-library/gov-pineda-images/"
    // "UPLOAD_DEST_PATH" => "s3://shopitbs/PMS_Cart_images/"
];
