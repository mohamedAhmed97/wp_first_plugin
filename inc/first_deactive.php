<?php
class FirstDeactive{
    public static function deactive()
    {
        var_dump("deactive");
        flush_rewrite_rules();
    }
}
?>