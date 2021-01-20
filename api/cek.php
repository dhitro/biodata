<?php

$file = "upload";
if (is_dir($file)) {
    echo ("$file is a directory");
} else {
    echo ("$file is not a directory");
}
echo "<br/>";
echo __FILE__;
echo "<br/>";
echo dirname(__FILE__);
echo "<br/>";
echo __DIR__;
