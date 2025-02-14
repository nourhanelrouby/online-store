<?php
if (!function_exists('orderStatus')) {
    function orderStatus()
    {
        return collect([
            'value' => '1',
            'name' => 'Pending'
        ]);
    }
}
