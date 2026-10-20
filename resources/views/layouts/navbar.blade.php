<div class="navbar">

    <div class="logo">
        📚 Smart ReadHub
    </div>

    <div class="nav-links">

        <a href="/">Home</a>
        <a href="/books">Books</a>
        <a href="{{ route('assistant') }}">AI Assistant</a>
        <a href="/profile">Profile</a>

        <a href="/login" class="login-btn">Login</a>
        <a href="/register" class="register-btn">Register</a>

    </div>

</div>

<style>

.navbar{
    background:linear-gradient(90deg,#0f172a,#1e3a8a);
    padding:14px 40px;
    min-height:60px;

    display:flex;
    justify-content:space-between;
    align-items:center;

    box-shadow:0 5px 20px rgba(20, 16, 247, 0.2);

    position:sticky;
    top:0;
    z-index:1000;
}

.logo{
    color:white;
    font-size:24px;
    font-weight:800;
    letter-spacing:1px;
}

.nav-links{
    display:flex;
    align-items:center;
    gap:10px;
}

.navbar .nav-links a{
    color:white;
    text-decoration:none;
    padding:9px 14px;
    border-radius:10px;
    transition:all 0.3s ease;
    font-weight:600;
    font-size:15px;
    margin:10px;
}

.navbar .nav-links a:hover{
    background:rgba(141, 245, 128, 0.18);
    transform:translateY(-3px);
}

.navbar .login-btn{
    background:#475569;
    padding:9px 14px !important;
}

.login-btn:hover{
    background:#64748b !important;
}

.navbar .register-btn{
    background:#22c55e;
    padding:9px 14px !important;
}

.register-btn:hover{
    background:#16a34a !important;
}

</style>