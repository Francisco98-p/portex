<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TEApp</title>
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <header class="bg-green-500 text-white p-4 border rounded-lg shadow-xl m-3">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold">Software para Personas con Diagnóstico de Autismo</h1>
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Panel
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#477c92] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Ingresar
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#477c92] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Registrarse
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        <section class="mb-12">
            <h2 class="text-2xl font-semibold mb-4">¿Qué es el Trastorno del Espectro Autista (TEA)?</h2>
            <p class="mb-4">El Trastorno del Espectro Autista (TEA) es una condición caracterizada por presentar
                variables alteraciones con un impacto de por vida. Estas manifestaciones son muy variables entre
                individuos y a través del tiempo, acorde al crecimiento y maduración de las personas.</p>
            <img src="images/image_1.jpeg" alt="Representación del espectro autista" class="rounded-lg shadow-lg mb-4">
        </section>

        <section class="mb-12">
            <h2 class="text-2xl font-semibold mb-4">Características del Autismo</h2>
            <ul class="list-disc pl-6 mb-4">
                <li>Dificultades en la comunicación</li>
                <li>Dificultades en las interacciones sociales</li>
                <li>Intereses restringidos</li>
                <li>Repetición de comportamientos</li>
                <li>Sensibilidad sensorial</li>
                <li>Dificultades con el cambio</li>
                <li>Habilidades excepcionales en áreas específicas</li>
            </ul>
            <img src="images/image_2.jpeg" alt="Ilustración de características del autismo"
                class="rounded-lg shadow-lg mb-4">
        </section>

        <section class="mb-12">
            <h2 class="text-2xl font-semibold mb-4">Nuestro Software</h2>
            <p class="mb-4">Desarrollamos un software especializado para ayudar a personas con Trastorno del Espectro
                Autista (TEA). Nuestro objetivo es proporcionar una herramienta que facilite la inclusión y mejore la
                calidad de vida de las personas con TEA.</p>
            <h3 class="text-xl font-semibold mb-2">Características del Software:</h3>
            <ul class="list-disc pl-6 mb-4">
                <li>Interfaz amigable e intuitiva</li>
                <li>Personalización según necesidades individuales</li>
                <li>Comunicación visual</li>
                <li>Estructura y rutina claras</li>
                <li>Accesibilidad en diferentes dispositivos</li>
                <li>Colaboración con expertos en TEA</li>
                <li>Privacidad y seguridad garantizadas</li>
                <li>Actualizaciones y soporte continuo</li>
            </ul>
            <img src="images/image_3.jpeg" alt="Captura de pantalla del software" class="rounded-lg shadow-lg mb-4">
        </section>

        <section class="mb-12">
            <h2 class="text-2xl font-semibold mb-4">Beneficios de Nuestro Software</h2>
            <ul class="list-disc pl-6 mb-4">
                <li>Desarrollo de habilidades cognitivas, emocionales y motrices</li>
                <li>Fomento de actividades interactivas para mejorar relaciones interpersonales</li>
                <li>Complemento a la intervención terapéutica tradicional</li>
                <li>Contenido adaptable y personalizable</li>
                <li>Retroalimentación inmediata y seguimiento del progreso</li>
            </ul>
            <img src="images/image_4.jpeg" alt="Personas utilizando el software" class="rounded-lg shadow-lg mb-4">
        </section>

        <section class="bg-blue-100 p-6 rounded-lg">
            <h2 class="text-2xl font-semibold mb-4">Contáctenos</h2>
            <p>Para más información sobre nuestro software o para solicitar una demostración, por favor contáctenos:</p>
            <a href="mailto:info@autismosoftware.com" class="text-blue-600 hover:underline">info@autismosoftware.com</a>
        </section>
    </main>

    <footer class="bg-gray-800 text-white py-4 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 Software para Personas con Diagnóstico de Autismo. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>

</html>
