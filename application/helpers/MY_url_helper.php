<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('unpaginated_url'))
{
    /**
     * Current URL
     *
     * Returns the full URL (including segments) of the page where this
     * function is placed
     *
     * @return  string
     */
    function unpaginated_url()
    {
        $CI =& get_instance();
        $url = $CI->config->site_url($CI->uri->uri_string());
        $url = $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
        return preg_replace('/&page=[0-9]+/', '', $url);
    }
}


