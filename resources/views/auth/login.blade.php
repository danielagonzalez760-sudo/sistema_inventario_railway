<x-guest-layout>
    <!-- Fondo dinámico que no interfiere con el contenedor principal -->
    <div id="background" class="fixed inset-0 z-[-1] bg-cover bg-center transition-all duration-1000"></div>

    <div class="w-full max-w-sm bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white rounded-2xl shadow-2xl p-8 relative overflow-hidden">
        
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/Logo_1.png') }}" alt="Logo" 
                class="h-24 w-auto rounded-md filter brightness-0 invert" />
        </div>

        <div class="text-center mb-6">
            <h2 class="text-3xl font-extrabold tracking-wide text-indigo-300">¡Bienvenido!</h2>
            <p class="text-sm text-gray-400">Ingresa tus credenciales para continuar</p>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="email" :value="__('Correo electrónico')" class="text-indigo-300" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                    class="mt-1 block w-full bg-gray-800 border border-gray-700 rounded-lg text-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-400 px-3 py-2 placeholder-gray-400" />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-400" />
            </div>

            <div class="mb-4">
                <x-input-label for="password" :value="__('Contraseña')" class="text-indigo-300" />
                <x-text-input id="password" type="password" name="password" required
                    class="mt-1 block w-full bg-gray-800 border border-gray-700 rounded-lg text-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-400 px-3 py-2 placeholder-gray-400" />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-400" />
            </div>

            <div class="flex items-center justify-between text-sm mb-6">
                <label for="remember_me" class="inline-flex items-center text-gray-300">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="rounded border-gray-600 bg-gray-700 text-indigo-400 focus:ring-indigo-400 mr-2">
                    Recuérdame
                </label>

                @if (Route::has('password.request'))
                    <a class="text-indigo-300 hover:text-indigo-200 transition underline" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif
            </div>

            <div>
                <button type="submit"
                    class="w-full py-3 rounded-lg bg-gradient-to-r from-indigo-500 to-blue-500 hover:from-indigo-400 hover:to-blue-400 transition-all duration-300 font-semibold shadow-lg hover:shadow-indigo-500/30 text-white">
                    INICIAR SESIÓN
                </button>
            </div>
        </form>
    </div>

    <script>
        const background = document.getElementById('background');
        const images = [
            "{{ asset('images/Login-1.jpg') }}",
            "{{ asset('images/Login-2.jpg') }}",
            "{{ asset('images/Login-3.jpg') }}",
            "{{ asset('images/Login-4.jpg') }}",
        ];
        let index = 0;

        function changeBackground() {
            const img = new Image();
            img.src = images[index];
            img.onload = () => {
                background.style.backgroundImage = `url('${images[index]}')`;
                background.style.transition = 'background-image 1s ease-in-out';
                index = (index + 1) % images.length;
            }
        }

        changeBackground();
        setInterval(changeBackground, 6000);
    </script>
</x-guest-layout>