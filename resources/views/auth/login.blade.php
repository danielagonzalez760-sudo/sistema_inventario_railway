<x-guest-layout>
    <!-- Fondo dinámico que no interfiere con el contenedor principal -->
    <div id="background" class="fixed inset-0 z-[-1] bg-cover bg-center transition-all duration-1000"></div>

    <div class="w-full max-w-sm bg-white rounded-2xl shadow-2xl p-8 relative overflow-hidden">
        
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/Logo_1.png') }}" alt="Logo" class="h-20 w-auto" />
        </div>

        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold tracking-tight text-[#013549]">¡Bienvenido!</h2>
            <p class="text-sm text-[#013549] mt-1">Ingresa tus credenciales para continuar</p>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="email" :value="__('Correo electrónico')" class="text-[#013549]" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                    class="mt-1 block w-full bg-slate-800 border border-slate-700 rounded-lg text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 px-3 py-2 placeholder-gray-400" />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500" />
            </div>

            <div class="mb-4">
                <x-input-label for="password" :value="__('Contraseña')" class="text-[#013549]" />
                <x-text-input id="password" type="password" name="password" required
                    class="mt-1 block w-full bg-slate-800 border border-slate-700 rounded-lg text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 px-3 py-2 placeholder-gray-400" />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500" />
            </div>

            <div class="flex items-center justify-between text-xs mb-6">
                <label for="remember_me" class="inline-flex items-center text-[#013549]">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="rounded border-slate-600 bg-slate-700 text-[#013549] focus:ring-[#013549] mr-2">
                    Recuérdame
                </label>


            </div>

            <div>
                <button type="submit"
                    class="w-full py-3 rounded-lg bg-[#013549] hover:bg-[#02506a] transition-all duration-300 font-semibold text-white shadow-md hover:shadow-[#013549]/30">
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