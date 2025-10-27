<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Practicum Placement</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    @include('partials.navbar')

    <div class="pt-20 px-4">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold text-center mb-8 text-gray-800">Your Profile</h1>

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-lg shadow-lg p-8">
                @auth
                    <div class="flex items-center mb-8">
                        <div class="w-24 h-24 bg-blue-500 rounded-full flex items-center justify-center text-white text-2xl font-bold mr-6">
                            {{ substr(Auth::user()->name, 0, 2) }}
                        </div>
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-800">{{ Auth::user()->name }}</h2>
                            <p class="text-gray-600">{{ Auth::user()->role == 'student' ? 'Student' : 'Company Representative' }}</p>
                            <p class="text-gray-600">{{ Auth::user()->email }}</p>
                            <p class="text-gray-600">Admission: {{ Auth::user()->admission_number }}</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold mb-4 text-blue-600">Personal Information</h3>
                            <div class="space-y-2">
                                <p><strong>Full Name:</strong> {{ Auth::user()->name }}</p>
                                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                                <p><strong>Phone:</strong> {{ Auth::user()->phone ?? 'Not provided' }}</p>
                                <p><strong>Location:</strong> {{ Auth::user()->address ?? 'Not provided' }}</p>
                                <p><strong>Date of Birth:</strong> {{ Auth::user()->date_of_birth ? Auth::user()->date_of_birth->format('M d, Y') : 'Not provided' }}</p>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-4 text-green-600">Academic Information</h3>
                            <div class="space-y-2">
                                <p><strong>Major:</strong> {{ Auth::user()->major ?? 'Not provided' }}</p>
                                <p><strong>Year:</strong> {{ Auth::user()->year_of_study ?? 'Not provided' }}</p>
                                <p><strong>Admission Number:</strong> {{ Auth::user()->admission_number }}</p>
                                <p><strong>Role:</strong> {{ Auth::user()->role }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 flex space-x-4">
                        <button class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-300">
                            Edit Profile
                        </button>
                        <form method="POST" action="/logout" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-700 transition duration-300">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <div class="text-center">
                        <p class="text-gray-600 mb-4">You need to be logged in to view your profile.</p>
                        <a href="/signin" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-300">Sign In</a>
                    </div>
                @endauth
            </div>
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
