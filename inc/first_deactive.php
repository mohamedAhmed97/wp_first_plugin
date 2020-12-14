<?php
class FirstDeactive{
    public static function deactive()
    {
        flush_rewrite_rules();
    }
}
?>