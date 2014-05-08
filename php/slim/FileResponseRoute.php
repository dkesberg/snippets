<?php
/**
 * example for SLIM framework file response route
 */

$app = new \Slim\Slim();

$app->get('/file', function() use ($app, $data) {
  
  // path to file
  $path = 'path/to/image/file.jpg';
  
  // build header data
  $name     = basename($path);  
  $lifetime = 2 * 7 * 24 * 60 * 60;  
  $filetime = filemtime($path);
  $etag     = md5($filetime . $path);
  $time     = gmdate('r', $filetime);
  $expires  = gmdate('r', $filetime + $lifetime);
  $length   = filesize($path);
  
  $headers = array(
    'Content-Disposition' => 'inline; filename="' . $name . '"',
    'Last-Modified' => $time,
    'Cache-Control' => 'must-revalidate',
    'Expires' => $expires,
    'Pragma' => 'public',
    'Etag' => $etag,
  );
  
  $headers = array_merge($headers, array(
    'Content-Type' => finfo_file(finfo_open(FILEINFO_MIME_TYPE), $path),
    'Content-Length' => $length,
  ));
  
  // build response obj
  $response = $app->response();
  
  foreach ($headers as $headerName => $headerValue) {
    $response->headers->set($headerName, $headerValue);
  }
  
  // stream file data
  readfile($path);
  
});
