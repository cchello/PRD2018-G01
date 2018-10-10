<?php

class MY_URI extends CI_URI {
/**
 * 解决Codeigniter中无法使用中文作为URI的问题
 * 转自：http://www.afen.cn/blog/?p=129
 */
	function _filter_uri($str){
		if($str != ''  AND $this->config->item('permitted_uri_char') != ''){
			$str = urlencode($str);
			if(!preg_match("|^[".preg_quote($this->config->item('permitted_uri_chars'))."]+$|i", $str))	{
				exit('The URI you submitted has disallowed characters.');
			}
				$str = urldecode($str);
			}
			return $str;
		}
}
