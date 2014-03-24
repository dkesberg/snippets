<?php
/**
 * remove all whitespaces/linebreaks and replaces them with a single space
 */
$string = trim(preg_replace('/\s+/', ' ', $string));
