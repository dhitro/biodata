<?php

$file = "upload";
if (is_dir($file)) {
    echo ("$file is a directory");
} else {
    echo ("$file is not a directory");
}

echo __FILE__;
echo dirname(__FILE__);
echo __DIR__;
