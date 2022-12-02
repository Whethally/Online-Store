<?php

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as FacadesRoute;

// if (! function_exists('test')) {
//     function test() {
//         return app('test');
//     }
// }

// if (! function_exists('active_link')) {
//     function active_link(string $name, string $active = 'active'): string {
//         return FacadesRoute::is($name) ? $active : '';
//     }
// }

if (! function_exists('alert')) {
    function alert(string $value) {
        session(['alert'=> $value]);
    }
    function warning(string $value) {
        session(['warning'=> $value]);
    }
    function danger(string $value) {
        session(['danger'=> $value]);
    }
    function success(string $value) {
        session(['success'=> $value]);
    }
}
// if (! function_exists('alert_danger')) {
//     function alert_danger(string $value) {
//         session(['alert-danger'=> $value]);
//     }
// }
if (! function_exists('validate')) {
    function validate(array $attributes, array $rules) {
        return validator($attributes, $rules)->validate();
    }
}