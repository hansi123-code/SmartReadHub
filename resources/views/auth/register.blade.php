<x-guest-layout>
    
<div class="auth-title">

    <div style="display:flex; justify-content:center;">
        <img src="{{ asset('images/130ec3c3-860f-4d84-8c3a-dd4a88ac803b.jpg') }}" width="80">
    </div>

    <h1>Smart E-Book Management System</h1>
    <p>Read anytime, anywhere. Learn and explore books easily.</p>



</div>

<form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <!-- Password -->
<div class="mb-6">
    <label class="block text-gray-700 font-semibold mb-2">
        Password
    </label>

    <div class="relative">

        <input type="password"
               id="regPassword"
               name="password"
               required
               class="w-full px-4 py-3 pr-12 border rounded-xl focus:ring-2 focus:ring-blue-400 focus:outline-none">

        <button type="button"
                onclick="toggleRegPassword()"
                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">

            <!-- lock -->
            <svg id="lock1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 1a5 5 0 00-5 5v4H6a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2v-8a2 2 0 00-2-2h-1V6a5 5 0 00-5-5zm-3 9V6a3 3 0 016 0v4H9z"/>
            </svg>

            <!-- unlock -->
            <svg id="unlock1" style="display:none;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17 8h-1V6a5 5 0 00-9.9-1h2.02A3 3 0 0114 6v2H7a2 2 0 00-2 2v8a2 2 0 002 2h10a2 2 0 002-2v-8a2 2 0 00-2-2z"/>
            </svg>

        </button>

    </div>
</div>

        <!-- Confirm Password -->
        <!-- Confirm Password -->
<div class="mb-6">
    <label class="block text-gray-700 font-semibold mb-2">
        Confirm Password
    </label>

    <div class="relative">

        <input type="password"
               id="regConfirmPassword"
               name="password_confirmation"
               required
               class="w-full px-4 py-3 pr-12 border rounded-xl focus:ring-2 focus:ring-blue-400 focus:outline-none">

        <button type="button"
                onclick="toggleConfirmPassword()"
                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">

            <!-- lock -->
            <svg id="lock2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 1a5 5 0 00-5 5v4H6a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2v-8a2 2 0 00-2-2h-1V6a5 5 0 00-5-5zm-3 9V6a3 3 0 016 0v4H9z"/>
            </svg>

            <!-- unlock -->
            <svg id="unlock2" style="display:none;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17 8h-1V6a5 5 0 00-9.9-1h2.02A3 3 0 0114 6v2H7a2 2 0 00-2 2v8a2 2 0 002 2h10a2 2 0 002-2v-8a2 2 0 00-2-2z"/>
            </svg>

        </button>

    </div>
</div>



<div class="flex items-center justify-center mt-4">

<a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

<x-primary-button class="ms-4">
                {{ __('Register') }}

            </x-primary-button>

             
</div>


<p class="text-center mt-4 text-sm">
    Already have an account?
    
    <a href="{{ route('login') }}" class="text-blue-500 font-semibold">
        Login

        
    </a>

</p>

      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        </div>
    </form>
    <script>
function toggleRegPassword(){

    const input = document.getElementById("regPassword");
    const lock = document.getElementById("lock1");
    const unlock = document.getElementById("unlock1");

    if(input.type === "password"){
        input.type = "text";
        lock.style.display = "none";
        unlock.style.display = "block";
    } else {
        input.type = "password";
        lock.style.display = "block";
        unlock.style.display = "none";
    }
}

function toggleConfirmPassword(){

    const input = document.getElementById("regConfirmPassword");
    const lock = document.getElementById("lock2");
    const unlock = document.getElementById("unlock2");

    if(input.type === "password"){
        input.type = "text";
        lock.style.display = "none";
        unlock.style.display = "block";
    } else {
        input.type = "password";
        lock.style.display = "block";
        unlock.style.display = "none";
    }
}

</script>




</x-guest-layout>
