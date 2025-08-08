<?php
namespace PHPMaker2024\Gov_Nanay_Pineda;

date_default_timezone_set('Asia/Manila');
session_start();

use Aws\S3\S3Client;

$s3client = new S3Client([
    'version' => 'latest',
    'region' => Config('DO.SPACES.REGION'),
    'endpoint' => Config('DO.SPACES.END_POINT'),
    'credentials' => [
        'key' => Config('DO.SPACES.KEY'),
        'secret' => Config('DO.SPACES.SECRET'),
    ],
    'http' => ['verify' => false], // for testing purposes only
]);

$s3client->registerStreamWrapper();


include_once(dirname(__DIR__, 1) . "/app/lib/ProjectService.php");


function appConfig($option)
{
    $config["s3.custom_path"] = Config('UPLOAD_DEST_PATH');
    return $config[$option];
}


function validateJwt($request, $response)
{
    $authHeader = $request->getHeaderLine('Authorization');
    $jwt = str_replace('Bearer ', '', $authHeader);

    // Decode the JWT
    $payload = DecodeJwt($jwt);

    // If the JWT is invalid, return a 401 Unauthorized response
    if (isset($payload['failureMessage']) || !isset($jwt) || empty($jwt)) {
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode(['error' => 'Unauthorized']));
        return $response;
    }

    // If the JWT is valid, return null
    return null;
}

function timeAgo($dateString)
{
    $date = new \DateTime($dateString);
    $now = new \DateTime();

    $interval = $date->diff($now);

    if ($interval->y >= 1) {
        return $interval->format('%y years ago');
    } else if ($interval->m >= 1) {
        return $interval->format('%m months ago');
    } else if ($interval->d >= 1) {
        return $interval->format('%d days ago');
    } else if ($interval->h >= 1) {
        return $interval->format('%h hours ago');
    } else if ($interval->i >= 1) {
        return $interval->format('%i minutes ago');
    } else {
        return 'Just now';
    }
}

function filterTable($table, $field)
{
    if($table == "user_levels") {
        return " $field NOT IN (-1, -2, 0) ";
    }
}


function getPresignedUrl($objectKey, $expiration = '+48 hours')
{
    global $s3client;

    // Generate a pre-signed URL for the object
    $cmd = $s3client->getCommand('GetObject', [
        'Bucket' => Config('DO.SPACES.BUCKET'),
        'Key' => $objectKey,
    ]);

    $request = $s3client->createPresignedRequest($cmd, $expiration);
    return (string)$request->getUri();
}

/**
 * Upload a file to S3
 * @param string $filePath Local temporary file path
 * @param string $s3Key Key to use in S3 (destination path)
 * @return bool Success status
 */
function UploadToS3($filePath, $s3Key) {
    global $s3client;
    
    try {
        // Upload the file to S3
        $result = $s3client->putObject([
            'Bucket' => Config('DO.SPACES.BUCKET'),
            'Key' => $s3Key,
            'SourceFile' => $filePath,
            'ACL' => 'private', // Keep files private, access via signed URLs
        ]);
        
        return true;
    } catch (\Exception $e) {
        LogError('S3 Upload Error: ' . $e->getMessage());
        return false;
    }
}



function includeWithUserCache($file, $user_id, $cache_time = 3600, $refresh = false) {
    $cache_dir = Config('CACHE_PATH');
    if (!is_dir($cache_dir)) {
        mkdir($cache_dir, 0777, true);
    }
    
    $user_cache_dir = $cache_dir . '/user_' . $user_id;
    if (!is_dir($user_cache_dir)) {
        mkdir($user_cache_dir, 0777, true);
    }
    
    $cache_file = $user_cache_dir . '/' . md5($file) . '.cache';
    
    try {
        // Force refresh or check cache validity
        if ($refresh) {
            // Delete the current cache file
            if (file_exists($cache_file)) {
                unlink($cache_file);
            }
        }
        
        if (!file_exists($cache_file) || (time() - filemtime($cache_file)) > $cache_time) {
            ob_start();
            include $file;
            $content = ob_get_clean();
            
            file_put_contents($cache_file, $content);
            echo $content;
        } else {
            include $cache_file;
        }
    } catch (\Exception $e) {
        include $file;
    }
}


 function sendEmailConfirmation($toEmail,$subject,$Content){
       

    $mailContent = '
        <p>Dear Sir/Madam,</p>

        <p>'.$Content.'</p>

        <p>Please feel free to contact us in case of further queries.</p>

        <p>
        Best Regards,<br>
        Support
        </p>
    ';
    $fromEmail = Config('SENDER_EMAIL');
    $ccEmail = '';
    $bccEmail = '';
    $format = 'html';
    $charset = '';
    return SendEmail($fromEmail, $toEmail, $ccEmail, $bccEmail, $subject, $mailContent, $format, $charset);

}




