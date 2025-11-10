<?php

/**
 * get the base path
 * 
 * @param string $path
 * @return string
 */

function basePath($path)
{
    return __DIR__ . '/'. $path;
}

/**
 * load view file
 * @param string $name
 * @return void
 */

function loadView($name)
{
  $viewPath = basePath("views/{$name}.view.php");

  //check if path exists
  if(file_exists($viewPath)){
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
   $partial = basePath("views/partials/{$name}.php");

   //check if path exists
   if(file_exists($partial)){
    require $partial;
   } else {
    echo "Partial file not found.";
   }
}