<?php
class FirstActive{
    public static function active()
    {
        flush_rewrite_rules();
    }
}
?>