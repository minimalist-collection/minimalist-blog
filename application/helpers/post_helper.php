<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('preview'))
{
	function preview($content, $limit)
	{
		$CI =& get_instance();

        if(strlen($content) < $limit)
        {
            return $content;
        }

        $last_word_pos = strrpos(substr($content, 0, $limit), ' ');

        $truncated_content = substr($content, 0, $last_word_pos);

        $preview = close_tags($truncated_content);

        return $preview . ' ...';
	}
}

