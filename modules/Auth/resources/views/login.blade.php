<x-guest-layout>
    <div class="h-full min-h-screen w-screen flex justify-center items-center bg-[#0d4656] p-5">
        <div class="w-full lg:w-1/2">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            
            <div class="w-full text-center mb-10">
                <h1 class="text-4xl text-white font-bold">Login</h1>
            </div>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="w-full flex justify-end">
                    <a href="/register" class="text-[#00b88d] border-2 rounded-lg border-[#00b88d] px-4 py-2">
                        Register now
                    </a>
                </div>
                
                <!-- Username Address -->
                <div>
                    <x-input-label for="username" :value="__('Username')" />
                    <x-text-input id="username" 
                                class="block mt-1 w-full bg-[#096f69] text-gray-100 placeholder:text-gray-200" 
                                type="text" 
                                name="username" 
                                :value="old('username')" 
                                placeholder="Username" 
                                required autofocus 
                                autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" 
                        class="block mt-1 w-full bg-[#096f69] text-gray-100 placeholder:text-gray-200" 
                        type="password"
                        name="password"
                        placeholder="Password"
                        required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                                
                    <div class="lg:flex justify-between items-center">
                        
                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                <span class="ms-2 text-sm text-gray-100 dark:text-gray-400 hover:text-gray-50">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                
                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-100 dark:text-gray-400 hover:text-gray-50 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="w-full mt-10 ">
                        <x-primary-button class="ms-3 w-full bg-gradient-to-r from-[#096f69] to-[#096f6933] flex items-center justify-center py-3">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
            </form>
        </div>
    </div>
</x-guest-layout>
