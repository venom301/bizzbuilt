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
 * load admin-partial file
 * @param string $name
 * @return void
 */

function loadAdminPartial($name)
{
    $partial = basePath("App/views/admin/admin-partials/{$name}.php");

    //check if path exists
    if (file_exists($partial)) {
        require $partial;
    } else {
        echo "Partial file not found.";
    }
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
function dateFormat($date)
{
    echo date('F j, Y', strtotime($date));
}