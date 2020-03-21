<?php

if (!function_exists('formatDate')) {
    function formatDate($timestamp = null)
    {
        return date('d.m.Y H:i:s', $timestamp ?? time());
    }
}

if (!function_exists('unicodeEscapeToUTF')) {
    function unicodeEscapeToUTF($str)
    {
        return preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
        }, $str);
    }
}
