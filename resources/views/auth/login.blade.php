<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="auth-title">

    <div style="display:flex; justify-content:center;">
        <img src="{{ asset('images/130ec3c3-860f-4d84-8c3a-dd4a88ac803b.jpg') }}" width="80">
    </div>

    <h1>Smart E-Book Management System</h1>
    <p>Read anytime, anywhere. Learn and explore books easily.</p>
</div>

@if(request('message') == 'login_required')

<div style="
background:#dbeafe;
color:#1e3a8a;
padding:15px;
border-radius:10px;
margin-bottom:20px;
text-align:center;
font-weight:bold;
">

🔒 Please log in to view book details,
 read books online, download e-books, save bookmarks, and submit ratings & reviews.

</div>

@endif


    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


    <!-- Password -->
<div class="mb-6">
    <label class="block text-gray-700 font-semibold mb-2">
        Password
    </label>

    <div class="relative">

        <input type="password"
               id="loginPassword"
               name="password"
               required
               class="w-full px-4 py-3 pr-12 border rounded-xl focus:ring-2 focus:ring-blue-400 focus:outline-none">

        <!-- Icon inside input -->
        <button type="button"
                id="toggleBtn"
                onclick="togglePassword()"
                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-blue-600">

            <!-- Lock Icon -->
            <svg id="iconLock" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 1a5 5 0 00-5 5v4H6a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2v-8a2 2 0 00-2-2h-1V6a5 5 0 00-5-5zm-3 9V6a3 3 0 016 0v4H9z"/>
            </svg>

            <!-- Unlock Icon -->
            <svg id="iconUnlock" style="display:none;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17 8h-1V6a5 5 0 00-9.9-1h2.02A3 3 0 0114 6v2H7a2 2 0 00-2 2v8a2 2 0 002 2h10a2 2 0 002-2v-8a2 2 0 00-2-2z"/>
            </svg>

        </button>

    </div>
</div>

<script>
function togglePassword(){
    const input = document.getElementById("loginPassword");

    if (input.type === "password") {
        input.type = "text";   // SHOW
    } else {
        input.type = "password"; // HIDE
    }
}
</script>


        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-center mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <p class="text-center mt-4 text-sm">
    Don't have an account?
    
    <a href="{{ route('register') }}" class="text-blue-500 font-semibold">
        Register
    </a>

</p>


</x-guest-layout>
