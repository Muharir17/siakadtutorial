<!--
Author : Hari Prasetyo
Website : harviacode.com
Create Date : 08/05/2015

You may edit this code, but please do not remove original information. Thanks :D
-->
<?php

$path = $target."config/pagination.php";
        
$createList = fopen($path, "w") or die("Unable to open file!");

$string = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Pagination Config Bootstrap 3 CSS Style
 * harviacode.com
 */

\$config['query_string_segment'] = 'start';

\$config['full_tag_open'] = '<nav><ul class=\"pagination\" style=\"margin-top:0px\">';
\$config['full_tag_close'] = '</ul></nav>';

\$config['first_link'] = 'First';
\$config['first_tag_open'] = '<li>';
\$config['first_tag_close'] = '</li>';

\$config['last_link'] = 'Last';
\$config['last_tag_open'] = '<li>';
\$config['last_tag_close'] = '</li>';

\$config['next_link'] = 'Next';
\$config['next_tag_open'] = '<li>';
\$config['next_tag_close'] = '</li>';

\$config['prev_link'] = 'Prev';
\$config['prev_tag_open'] = '<li>';
\$config['prev_tag_close'] = '</li>';

\$config['cur_tag_open'] = '<li class=\"active\"><a>';
\$config['cur_tag_close'] = '</a></li>';

\$config['num_tag_open'] = '<li>';
\$config['num_tag_close'] = '</li>';


/* End of file pagination.php */
/* Location: ./application/config/pagination.php */
";


fwrite($createList, $string);
fclose($createList);

$page_res = "<p>" . $path . "</p>";
?>