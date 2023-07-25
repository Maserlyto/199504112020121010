<?php
    if (!function_exists('isPageActive')) {
        function isPageActive($pageIdentifier) {
            return isCurrentPage($pageIdentifier, 1) ? 'active' : '';
        }
    }
    
    if (!function_exists('isSubActive')) {
        function isSubActive($pageIdentifier) {
            return isCurrentPage($pageIdentifier, 2) ? 'active' : '';
        }
    }
    
    if (!function_exists('isPageOpen')) {
        function isPageOpen($pageIdentifier) {
            return isCurrentPage($pageIdentifier, 1) ? 'menu-open' : '';
        }
    }
    
    function isCurrentPage($pageIdentifier, $segment) {
        $CI = &get_instance();
        $current_page = $CI->uri->segment($segment);
        return ($current_page === $pageIdentifier);
    }
    if (!function_exists('include_scripts')) {
        function include_scripts($scriptNames) {
            if (empty($scriptNames)) {
                return ''; 
            }
            $output = '';
            foreach ($scriptNames as $scriptName) {
                $scriptTag = '<script src="' . base_url('/' . $scriptName) . '"></script>'."\n";
                $output .= $scriptTag;
            }
            return $output;
        }
    }
    if (!function_exists('include_styles')) {
        function include_styles($styleNames) {
            if (empty($styleNames)) {
                return ''; // Return empty string if $styleNames is empty
            }
            $output = '';
            foreach ($styleNames as $styleName) {
                $styleTag = '<link rel="stylesheet" href="' . base_url('/' . $styleName) . '">'."\n";
                $output .= $styleTag;
            }
            return $output;
        }
    }
        

        
?>