<?php

/**
 * get the base path
 * 
 * @param string $path
 * @return string
 */

function basePath($path)
{
    return __DIR__ . '/' . $path;
}

/**
 * load view file
 * @param string $name
 * @return void
 */

function loadView($name, $data = [])
{
    $viewPath = basePath("App/views/{$name}.view.php");

    //check if path exists
    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View file not found.";
    }
}



/**
 * load partial file
 * @param string $name
 * @return void
 */

function loadPartial($name)
{
    $partial = basePath("App/views/partials/{$name}.php");

    //check if path exists
    if (file_exists($partial)) {
        require $partial;
    } else {
        echo "Partial file not found.";
    }
}

/**
 * load image
 * @param string $img
 * @return string
 */
function loadImage($img, $default = 'placeholder.jpg')
{
    // If empty, use default
    if (empty($img)) {
        $img = $default;
    }

    // If full URL provided, return as-is
    if (filter_var($img, FILTER_VALIDATE_URL) || preg_match('#^(https?:)?//#', $img)) {
        return $img;
    }

    $publicImgDir = __DIR__ . '/public/img/';
    $altImgDir = __DIR__ . '/img/';
    $urlBase = 'img/'; // path used in HTML src attributes

    // If filename already has an extension, check directly
    $ext = pathinfo($img, PATHINFO_EXTENSION);
    if ($ext) {
        $candidate = $publicImgDir . $img;
        if (file_exists($candidate)) {
            return $urlBase . $img;
        }
        $candidate = $altImgDir . $img;
        if (file_exists($candidate)) {
            return $urlBase . $img;
        }
    } else {
        // Try common extensions in order
        $exts = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
        foreach ($exts as $e) {
            $candidate = $publicImgDir . $img . '.' . $e;
            if (file_exists($candidate)) {
                return $urlBase . $img . '.' . $e;
            }
            $candidate = $altImgDir . $img . '.' . $e;
            if (file_exists($candidate)) {
                return $urlBase . $img . '.' . $e;
            }
        }
    }

    // Fallback to default if present in public/img
    $fallback = $publicImgDir . $default;
    if (file_exists($fallback)) {
        return $urlBase . $default;
    }

    // Last resort: transparent 1x1 GIF data URI
    return 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==';
}

/**
 * Inspect a value(s) and die
 * 
 * @param mixed $value
 * @return void
 */
function inspectAndDie($value)
{
    die(var_dump($value));
}

/**
 * format date
 * @param string $date
 * @return mixed string
 */
function dateFormat($date){
    echo date('F j, Y', strtotime($date));
}