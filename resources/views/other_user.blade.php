@extends("layouts.admin")

@section("title_menu", "Su Carta Astral")
@section("content")

{{--<h1>{{$other[0]->imagen}}</h1>--}}
<style>
    .astral_img {
        display: block;
        width: 500px;
        height: 500px;
        margin-left: auto;
        margin-right: auto;
    }
</style>
<?php

$base_dir = __DIR__;

// server protocol
$protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';

// domain name
$domain = $_SERVER['SERVER_NAME'];

// base url
//$base_url = preg_replace("!^${doc_root}!", '', $base_dir);

// server port
$port = $_SERVER['SERVER_PORT'];
$disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";

// put em all together to get the complete base URL
$url = "${protocol}://${domain}${disp_port}";
?>

<a href="{{$url."/dashboard/storage/app/".$other[0]->imagen}}" class="btn btn-success">Descargar</a>
<img src="{{$url."/dashboard/storage/app/".$other[0]->imagen}}" class="astral_img" alt="" >
@endsection