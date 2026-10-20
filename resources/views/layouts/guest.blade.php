<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="auth-bg">
        <div class="min-h-screen flex flex-col justify-center items-center">
            

            <div class="auth-card">
    {{ $slot }}
</div>
        </div>
    </body>
</html>
<style>

/* BODY BACKGROUND */
.auth-bg{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;

    background: linear-gradient(135deg,#0f172a,#1e3a8a,#2563eb);
    position:relative;
    overflow:hidden;
}

/* Floating circles */
.auth-bg::before{
    content:"";
    position:absolute;
    width:350px;
    height:350px;
    background:rgba(255,255,255,0.08);
    border-radius:50%;
    top:-100px;
    left:-100px;
}

.auth-bg::after{
    content:"";
    position:absolute;
    width:300px;
    height:300px;
    background:rgba(255,255,255,0.08);
    border-radius:50%;
    bottom:-80px;
    right:-80px;
}

/* Card */
.auth-card{
    width:100%;
    max-width:450px;
    background:rgba(255,255,255,0.95);
    backdrop-filter: blur(12px);
    padding:35px;
    border-radius:25px;
    box-shadow:0 15px 45px rgba(0,0,0,0.25);
    transition:0.4s;
    z-index:10;
}

.auth-card:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 55px rgba(0,0,0,0.35);
}

/* Logo */
.auth-title img{
    width:90px;
    height:90px;
    object-fit:cover;
    border-radius:50%;
    border:4px solid #2563eb;
    padding:4px;
    background:white;
    margin-bottom:10px;
}

/* Title */
.auth-title{
    text-align:center;
    margin-bottom:25px;
}

.auth-title h1{
    color:#1d4ed8;
    font-size:30px;
    font-weight:800;
    margin-bottom:8px;
}

.auth-title p{
    color:#6b7280;
    font-size:14px;
}

/* Input */
.auth-card input{
    border-radius:12px !important;
    transition:0.3s;
}

input:focus{
    border-color:#2563eb !important;
    box-shadow:0 0 12px rgba(37,99,235,0.25) !important;
}

/* Buttons */
.auth-card button,
.auth-btn{
    background:#2563eb !important;
    color:white !important;
    border-radius:12px !important;
    transition:0.3s;
}

button:hover,
.auth-btn:hover{
    background:#1d4ed8 !important;
    transform:scale(1.03);
}

/* Links */
a{
    transition:0.3s;
}

.auth-card a:hover{
    color:#2563eb !important;
}

/* Mobile */
@media(max-width:768px){
    .auth-card{
        width:95%;
        padding:25px;
    }

    .auth-title h1{
        font-size:24px;
    }
}

</style>