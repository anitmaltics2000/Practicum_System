<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - Practicum Placement</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    @include('partials.navbar')

    <div class="pt-20 px-4">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Create Account</h1>

            <!-- Error Messages -->
            @if($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/register" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">I am a:</label>
                    <select id="role" name="role" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Select your role</option>
                        <option value="student">Student</option>
                        <option value="company">Company Representative</option>
                    </select>
                </div>
                <div id="admission-number-field" style="display: none;">
                    <label for="admission_number" class="block text-sm font-medium text-gray-700">Admission Number</label>
                    <input type="text" id="admission_number" name="admission_number" value="{{ old('admission_number') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Company Fields -->
                <div id="company-fields" style="display: none;">
                    <div class="space-y-4">
                        <div>
                            <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                            <input type="text" id="company_name" name="company_name" value="{{ old('company_name') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="company_email" class="block text-sm font-medium text-gray-700">Company Email</label>
                            <input type="email" id="company_email" name="company_email" value="{{ old('company_email') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="company_phone" class="block text-sm font-medium text-gray-700">Company Phone</label>
                            <input type="text" id="company_phone" name="company_phone" value="{{ old('company_phone') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="company_address" class="block text-sm font-medium text-gray-700">Company Address</label>
                            <textarea id="company_address" name="company_address" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('company_address') }}</textarea>
                        </div>
                        <div>
                            <label for="company_industry" class="block text-sm font-medium text-gray-700">Industry</label>
                            <input type="text" id="company_industry" name="company_industry" value="{{ old('company_industry') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300">
                        Create Account
                    </button>
                </div>
            </form>
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

        // Show/hide fields based on role selection
        document.getElementById('role').addEventListener('change', function() {
            const admissionField = document.getElementById('admission-number-field');
            const admissionInput = document.getElementById('admission_number');
            const companyFields = document.getElementById('company-fields');
            const companyInputs = companyFields.querySelectorAll('input, textarea');

            if (this.value === 'student') {
                admissionField.style.display = 'block';
                admissionInput.required = true;
                companyFields.style.display = 'none';
                companyInputs.forEach(input => {
                    input.required = false;
                    input.value = '';
                });
            } else if (this.value === 'company') {
                admissionField.style.display = 'none';
                admissionInput.required = false;
                admissionInput.value = '';
                companyFields.style.display = 'block';
                companyInputs.forEach(input => {
                    input.required = true;
                });
            } else {
                admissionField.style.display = 'none';
                admissionInput.required = false;
                admissionInput.value = '';
                companyFields.style.display = 'none';
                companyInputs.forEach(input => {
                    input.required = false;
                    input.value = '';
                });
            }
        });
    </script>
</body>
</html>
