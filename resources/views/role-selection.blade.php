<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Role - Practicum Placement</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    @include('partials.navbar')

    <div class="pt-20 px-4">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Create Account</h1>
            <p class="text-center text-gray-600 mb-8">Please select your role to continue with registration</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="/register/student" class="block bg-blue-50 border-2 border-blue-200 rounded-lg p-6 hover:bg-blue-100 hover:border-blue-300 transition duration-300 text-center">
                    <i class="fas fa-user-graduate text-4xl text-blue-600 mb-4"></i>
                    <h3 class="text-xl font-semibold text-blue-800 mb-2">Student</h3>
                </a>

                <a href="/register/company" class="block bg-green-50 border-2 border-green-200 rounded-lg p-6 hover:bg-green-100 hover:border-green-300 transition duration-300 text-center">
                    <i class="fas fa-building text-4xl text-green-600 mb-4"></i>
                    <h3 class="text-xl font-semibold text-green-800 mb-2">Company</h3>
                </a>

                <a href="/register/admin" class="block bg-purple-50 border-2 border-purple-200 rounded-lg p-6 hover:bg-purple-100 hover:border-purple-300 transition duration-300 text-center">
                    <i class="fas fa-cog text-4xl text-purple-600 mb-4"></i>
                    <h3 class="text-xl font-semibold text-purple-800 mb-2">Administrator</h3>
                </a>
            </div>

            <p class="mt-6 text-center text-sm text-gray-600">
                Already have an account? <a href="/signin" class="text-blue-600 hover:text-blue-500">Sign in here</a>
            </p>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 z-50">
        <p id="toast-message"></p>
    </div>

    <script>
        // Show toast notification if there's a success message
        @if(session('success'))
            document.addEventListener('DOMContentLoaded', function() {
                showToast('{{ session('success') }}');
            });
        @endif

        function showToast(message) {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toast-message');
            toastMessage.textContent = message;
            toast.classList.remove('translate-x-full');
            toast.classList.add('translate-x-0');

            setTimeout(function() {
                toast.classList.remove('translate-x-0');
                toast.classList.add('translate-x-full');
            }, 3000); // Hide after 3 seconds
        }
    </script>
</body>
</html>
