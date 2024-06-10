<?php
require 'vendor/autoload.php';

use BackblazeB2\Client;
use BackblazeB2\Exceptions\NotFoundException;

// Your Account ID and Application Key
$applicationKeyId = 'your_application_key_id';
$applicationKey = 'your_application_key';

// Initialize the B2 Client
$client = new Client($applicationKeyId, $applicationKey);

function getOrCreateUserBucket($client, $username) {
    // Ensure bucket name is unique and follows B2 naming conventions
    $bucketName = 'user-' . strtolower($username);

    try {
        // Attempt to get the bucket by name
        $bucket = $client->getBucketByName($bucketName);
        return $bucket;
    } catch (NotFoundException $e) {
        // If the bucket does not exist, create a new bucket
        try {
            $bucket = $client->createBucket([
                'BucketName' => $bucketName,
                'BucketType' => \BackblazeB2\Bucket::TYPE_PRIVATE,
            ]);
            return $bucket;
        } catch (\Exception $e) {
            echo "Error creating bucket: " . $e->getMessage();
            return null;
        }
    } catch (\Exception $e) {
        echo "Error retrieving bucket: " . $e->getMessage();
        return null;
    }
}

function uploadUserFile($client, $bucketId, $filePath, $fileName) {
    try {
        $client->upload([
            'BucketId' => $bucketId,
            'FileName' => $fileName,
            'Body' => fopen($filePath, 'r'),
        ]);
        echo "File {$fileName} uploaded successfully.\n";
    } catch (\Exception $e) {
        echo "Error uploading file: " . $e->getMessage();
    }
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file']) && isset($_POST['username'])) {
    $username = $_POST['username'];
    $file = $_FILES['file'];
    
    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo "Error uploading file. Error code: " . $file['error'];
        exit;
    }
    
    $filePath = $file['tmp_name'];
    $fileName = basename($file['name']);
    
    // Get or create a bucket for the user
    $bucket = getOrCreateUserBucket($client, $username);
    if ($bucket) {
        // Upload the file to the user's bucket
        uploadUserFile($client, $bucket->getId(), $filePath, $fileName);
    }
}
?>


<?php 

require 'vendor/autoload.php';

use BackblazeB2\Client;

// Your Account ID and Application Key
$applicationKeyId = 'your_application_key_id';
$applicationKey = 'your_application_key';

// Initialize the B2 Client
$client = new Client($applicationKeyId, $applicationKey);

function getUserBucket($client, $username) {
    // Construct the expected bucket name
    $bucketName = 'user-' . strtolower($username);

    try {
        // Attempt to get the bucket by name
        $bucket = $client->getBucketByName($bucketName);
        return $bucket;
    } catch (\Exception $e) {
        echo "Error retrieving bucket: " . $e->getMessage();
        return null;
    }
}

function getFileByName($client, $bucket, $fileName) {
    try {
        // List all files in the bucket to find the file by name
        $files = $client->listFiles([
            'BucketId' => $bucket->getId(),
        ]);

        foreach ($files['Files'] as $file) {
            if ($file['fileName'] === $fileName) {
                return $file;
            }
        }

        echo "File {$fileName} not found.\n";
        return null;
    } catch (\Exception $e) {
        echo "Error retrieving file: " . $e->getMessage();
        return null;
    }
}

function downloadFile($client, $fileId) {
    try {
        $response = $client->download([
            'FileId' => $fileId,
        ]);

        // Here you can handle the file content, for example, stream it directly
        $fileContent = $response['Body'];
        echo "File Content: " . stream_get_contents($fileContent);
    } catch (\Exception $e) {
        echo "Error downloading file: " . $e->getMessage();
    }
}

// User-specific logic (this can be from your application logic, e.g., user request)
$username = 'exampleUser';
$fileName = 'file.txt';

// Get the user's bucket
$bucket = getUserBucket($client, $username);
if ($bucket) {
    // Get the file by name
    $file = getFileByName($client, $bucket, $fileName);
    if ($file) {
        // Download or access the file
        downloadFile($client, $file['fileId']);
    }
}
<?













// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $username = $_POST['username'];
    $file = $_FILES['file'];
    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo "Error uploading file. Error code: " . $file['error'];
        exit;
    }
    
    $filePath = $file['tmp_name'];
    $fileName = basename($file['name']);
    
    // Get or create a bucket for the user
    $bucket = getOrCreateUserBucket($client, $username);
    if ($bucket) {
        // Upload the file to the user's bucket
        uploadUserFile($client, $bucket->getId(), $filePath, $fileName);
    }
}

