<?php

/**
 * PHPMaker 2024 configuration file (Development)
 */

return [
    "Databases" => [
        "DB" => ["id" => "DB", "type" => "POSTGRESQL", "qs" => "\"", "qe" => "\"", "host" => "localhost", "port" => "5432", "user" => "postgres", "password" => "0yq5h3to9", "dbname" => "Gov_Lilia_Pineda", "schema" => ""]
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
    // "DO" => [
    //     "SPACES" => [
    //         "END_POINT" => "https://sgp1.digitaloceanspaces.com", // S3 bucket name
    //         "BUCKET" => "vector-icon-library", // S3 bucket name
    //         "REGION" => "sgp1", // S3 region
    //         "KEY" => "DO801KKY7N3YQAWTVMVV", // S3 access
    //         "SECRET" => "pYBxnUxXbHYuGxVcfECQDI+euf+MuYK5FumhANQGojY" // S3 secret
    //     ]
    // ],

       "DO" => [
    "SPACES" => [
        "END_POINT" => "https://sgp1.digitaloceanspaces.com",
        "BUCKET" => "vector-icon-library",
        "REGION" => "sgp1",
        "KEY" => "DO801KKY7N3YQAWTVMVV",
        "SECRET" => "pYBxnUxXbHYuGxVcfECQDI+euf+MuYK5FumhANQGojY",
        // Add these timeout settings
        "HTTP_TIMEOUT" => 1200,        // 20 minutes for large uploads
        "CONNECT_TIMEOUT" => 60,       // Connection timeout
        "REQUEST_TIMEOUT" => 1200      // Request timeout
    ]
    ],

    "UPLOAD_TEMP_PATH" => "D:/Projects/Gov-Lilia-Nanay-Pineda/Admin/uploads", // Upload temp path (absolute local physical path)
    "UPLOAD_TEMP_HREF_PATH" => "//http://gov-pineda.localhost//uploads/", // Upload temp href path (absolute URL path for download)
    // "UPLOAD_DEST_PATH" => "s3://vector-icon-library/gov-pineda-images/"
    "UPLOAD_DEST_PATH" => "s3://vector-icon-library/gov-pineda-images/"
];
