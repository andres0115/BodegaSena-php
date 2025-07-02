<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bodega SENA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 to-black">
    <!-- Efectos de fondo -->
    <div class="fixed inset-0">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-blue-500/10 via-transparent to-purple-500/10"></div>
    </div>

    <!-- Contenedor principal -->
    <div class="relative w-full max-w-lg mx-4">
        <!-- Logo -->
        <div class="absolute -top-20 left-1/2 transform -translate-x-1/2 animate-bounce">
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-4 rounded-full shadow-[0_0_30px_rgba(37,99,235,0.5)]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.104-.896-2-2-2s-2 .896-2 2 .896 2 2 2 2-.896 2-2zm0 0c0-1.104.896-2 2-2s2 .896 2 2-.896 2-2 2-2-.896-2-2zm0 0v2m0 4v.01"/>
                </svg>
            </div>
        </div>

        <!-- Tarjeta de login -->
        <div class="backdrop-blur-xl bg-white/10 rounded-3xl border border-white/20 shadow-[0_8px_32px_rgba(37,99,235,0.25)] p-8 relative overflow-hidden group">
            <!-- Línea decorativa superior -->
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600"></div>
            
            <!-- Contenido -->
            <div class="relative z-10">
                <h2 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400 text-center mb-2">Bienvenido</h2>
                <p class="text-blue-200 text-center mb-8">Sistema de Inventario SENA</p>

                <!-- Selector de Rol -->
                <div class="mb-8">
                    <div class="flex justify-center space-x-4">
                        <button type="button" onclick="setRole('login')" class="role-btn flex items-center space-x-2 px-6 py-2 rounded-lg bg-black/30 border border-white/10 text-white hover:bg-black/40 transition-all duration-300" data-role="login">
                            <i class="fas fa-sign-in-alt text-blue-400"></i>
                            <span>Iniciar Sesión</span>
                        </button>
                        <button type="button" onclick="setRole('register')" class="role-btn flex items-center space-x-2 px-6 py-2 rounded-lg bg-black/30 border border-white/10 text-white hover:bg-black/40 transition-all duration-300" data-role="register">
                            <i class="fas fa-user-plus text-purple-400"></i>
                            <span>Crear Cuenta</span>
                        </button>
                    </div>
                </div>

                <form id="loginForm" class="space-y-6">
                    <div class="space-y-2">
                        <label class="block text-blue-200 text-sm font-medium pl-1" for="email">
                            <i class="fas fa-envelope mr-2"></i>Correo electrónico
                        </label>
                        <div class="relative">
                            <input type="email" id="email" 
                                class="w-full pl-10 pr-4 py-3 bg-black/30 border border-white/10 rounded-xl text-white placeholder-blue-200/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                placeholder="usuario@correo.com" required>
                            <i class="fas fa-at absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400/50"></i>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-blue-200 text-sm font-medium pl-1" for="password">
                            <i class="fas fa-lock mr-2"></i>Contraseña
                        </label>
                        <div class="relative">
                            <input type="password" id="password" 
                                class="w-full pl-10 pr-4 py-3 bg-black/30 border border-white/10 rounded-xl text-white placeholder-blue-200/50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300"
                                placeholder="********" required>
                            <i class="fas fa-key absolute left-3 top-1/2 transform -translate-y-1/2 text-purple-400/50"></i>
                            <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-blue-200/50 hover:text-blue-200 transition-colors">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center text-blue-200 hover:text-blue-300 cursor-pointer group">
                            <input type="checkbox" class="form-checkbox h-4 w-4 bg-black/30 border-white/10 rounded text-blue-500 transition duration-150 ease-in-out">
                            <span class="ml-2">Recordarme</span>
                        </label>
                        <a href="#" class="text-blue-300 hover:text-blue-200 transition-colors">¿Olvidaste tu contraseña?</a>
                    </div>

                    <button type="submit" 
                        class="w-full py-3 px-6 rounded-xl bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold shadow-lg hover:shadow-blue-500/25 hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 group">
                        <span class="flex items-center justify-center">
                            <i class="fas fa-sign-in-alt mr-2 group-hover:animate-bounce"></i>
                            Iniciar Sesión
                        </span>
                    </button>

                    <!-- Separador -->
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-white/10"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 text-blue-200 bg-[#111827]">O continúa con</span>
                        </div>
                    </div>

                    <!-- Botones de redes sociales -->
                    <div class="grid grid-cols-3 gap-4">
                        <button type="button" class="flex items-center justify-center p-3 bg-black/30 rounded-lg hover:bg-black/40 transition-all duration-300 group">
                            <i class="fab fa-google text-2xl text-red-500 group-hover:scale-110 transition-transform"></i>
                        </button>
                        <button type="button" class="flex items-center justify-center p-3 bg-black/30 rounded-lg hover:bg-black/40 transition-all duration-300 group">
                            <i class="fab fa-facebook text-2xl text-blue-500 group-hover:scale-110 transition-transform"></i>
                        </button>
                        <button type="button" class="flex items-center justify-center p-3 bg-black/30 rounded-lg hover:bg-black/40 transition-all duration-300 group">
                            <i class="fab fa-github text-2xl text-white group-hover:scale-110 transition-transform"></i>
                        </button>
                    </div>
                </form>

                <div id="result" class="mt-6 text-center text-sm"></div>
            </div>

            <!-- Efectos de resplandor -->
            <div class="absolute bottom-0 right-0 w-40 h-40 bg-blue-500 rounded-full filter blur-[100px] opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
            <div class="absolute top-0 left-0 w-40 h-40 bg-purple-500 rounded-full filter blur-[100px] opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
        </div>

        <!-- Badge -->
        <div class="absolute -top-2 -right-2">
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-full shadow-lg px-4 py-1">
                <span class="text-xs text-white font-medium tracking-wider">BODEGA SENA</span>
            </div>
        </div>
    </div>

    <script>
        // Función para alternar la visibilidad de la contraseña
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Función para seleccionar rol
        function setRole(role) {
            const buttons = document.querySelectorAll('.role-btn');
            buttons.forEach(btn => {
                if (btn.dataset.role === role) {
                    btn.classList.add('bg-blue-600', 'border-blue-500');
                    btn.classList.remove('bg-black/30', 'border-white/10');
                } else {
                    btn.classList.remove('bg-blue-600', 'border-blue-500');
                    btn.classList.add('bg-black/30', 'border-white/10');
                }
            });
        }

        // Manejador del formulario
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const resultDiv = document.getElementById('result');
            resultDiv.innerHTML = '<span class="text-blue-200 animate-pulse">Procesando...</span>';
            
            try {
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ email, password })
                });
                const data = await response.json();
                
                if (response.ok) {
                    resultDiv.innerHTML = '<span class="text-green-400">¡Acceso exitoso!</span>';
                    window.location.href = '/admin';
                } else {
                    resultDiv.innerHTML = `<span class="text-red-400">${data.mensaje || 'Error de autenticación'}</span>`;
                }
            } catch (error) {
                resultDiv.innerHTML = '<span class="text-red-400">Error en la conexión</span>';
            }
        });
    </script>
</body>
</html>
