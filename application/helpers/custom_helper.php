<?php

if (!function_exists('str_map_badge')) {
  function str_map_badge($s = '', $separator = ';')
  {
    $items = explode($separator, $s);
    return join(
      ' ',
      array_map(
        fn($x) => 
          "<span class='badge bg-warning'>{$x}</span>"
        , $items
      )
    );
  }
}

if (!function_exists('arr_map_badge')) {
  function arr_map_badge($arr = [])
  {
    return join(
      ' ',
      array_map(
        fn($x) => 
          "<span class='badge bg-success'>{$x}</span>"
        , $arr
      )
    );
  }
}