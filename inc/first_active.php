<?php
class FirstActive{
    public static function active()
    {
        var_dump("active");
        flush_rewrite_rules();
    }
}
?>