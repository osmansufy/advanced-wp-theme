<?php

/* 

AutoLoader for theme

@package advancedwordpress


*/

namespace AW_THEME\Inc\Helpers;

/**    
 * AutoLoader Function
 * 
 * @param string $resource Source namespace being requested.
 * 
 * @return void
 */


function autoloader($resource = '')
{

    $resource_path = false;

    $namespace_root = 'AW_THEME\\';

    $resource = trim($resource, '\\');

    if (empty($resource) || strpos($resource, '\\') === false || strpos($resource, $namespace_root) !== 0) {
        return;
    }

    // Remove namespace root

    $resource = str_replace($namespace_root, '', $resource);



    $resource_path = explode(
        '\\',
        str_replace('_', '-', strtolower($resource))
    );

    /**     
     * 
     * Determine which type of resource path it is
     * 
     * So that we can load the file accordingly
     * 
     */

    if (empty($resource_path[0]) || empty($resource_path[1])) {
        return;
    }

    $directory = '';
    $file_name = '';


    if ('inc' === $resource_path[0]) {

        switch ($resource_path[1]) {
            case 'traits':
                $directory = 'traits';
                $file_name = sprintf('trait-%s', $resource_path[2]);
                break;
            case 'widgets':
                $directory = 'widgets';
                $file_name = sprintf('class-%s', $resource_path[2]);
                break;
            case 'blocks':
                /**
                 * If there is class name provided for specific directory then load that.
                 * otherwise find in inc/ directory.
                 */

                if (!empty($resource_path[2])) {
                    $directory = sprintf('classes/%s', $resource_path[1]);
                    $file_name = sprintf('class-%s', $resource_path[2]);
                }
                break;

            default:
                $directory = 'classes';
                $file_name = sprintf('class-%s', trim(strtolower($resource_path[1])));
                break;
        }


        $final_resource_path = sprintf('%s/%s/%s.php', untrailingslashit(ADVANCEDWORDPRESS_DIR_PATH, $directory, $file_name));

        /**
         * If $is_valid_file has 0 means valid path or 2 means the file path contains a Windows drive path.
         */
        $is_valid_file = validate_file($final_resource_path);

        if (!empty($final_resource_path) && file_exists($final_resource_path) && $is_valid_file === 0) {
            require_once $final_resource_path;
        }
    }
}

spl_autoload_register('\AW_THEME\Inc\Helpers\autoloader');
