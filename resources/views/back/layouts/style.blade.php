<!-- PICK ONE OF THE STYLES BELOW -->
<link href="{{ asset('tema') }}/css/modern.css" rel="stylesheet">
<link href="{{ asset('tema') }}/css/classic.css" rel="stylesheet">
<link href="{{ asset('tema') }}/css/dark.css" rel="stylesheet">
<link href="{{ asset('tema') }}/css/light.css" rel="stylesheet">

<!-- BEGIN SETTINGS -->
<!-- You can remove this after picking a style -->
<style>
    body {
        opacity: 0;
    }
</style>

@yield('css');

@toastr_css
