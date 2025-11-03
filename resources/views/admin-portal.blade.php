<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Portal - Practicum Placement</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    @include('partials.navbar')

    <div class="pt-20 px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-2">Administrator Portal</h1>
                <p class="text-gray-600">System overview and management dashboard</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-full">
                            <i class="fas fa-user-graduate text-blue-600 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Students</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['total_students'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full">
                            <i class="fas fa-building text-green-600 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Companies</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['total_companies'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-full">
                            <i class="fas fa-clipboard-list text-purple-600 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Applications</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['total_applications'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-yellow-100 rounded-full">
                            <i class="fas fa-clock text-yellow-600 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Pending Applications</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['pending_applications'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <a href="/admin/users" class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300 block">
                    <div class="text-center">
                        <i class="fas fa-users text-3xl text-blue-600 mb-4"></i>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Manage Users</h3>
                        <p class="text-gray-600 text-sm">View and manage all system users</p>
                    </div>
                </a>

                <a href="/admin/applications" class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300 block">
                    <div class="text-center">
                        <i class="fas fa-clipboard-check text-3xl text-green-600 mb-4"></i>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Manage Applications</h3>
                        <p class="text-gray-600 text-sm">Review and process applications</p>
                    </div>
                </a>

                <a href="/admin/reports" class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300 block">
                    <div class="text-center">
                        <i class="fas fa-chart-bar text-3xl text-purple-600 mb-4"></i>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Generate Reports</h3>
                        <p class="text-gray-600 text-sm">View system analytics and reports</p>
                    </div>
                </a>

                <a href="/admin/settings" class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300 block">
                    <div class="text-center">
                        <i class="fas fa-cog text-3xl text-gray-600 mb-4"></i>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">System Settings</h3>
                        <p class="text-gray-600 text-sm">Configure system parameters</p>
                    </div>
                </a>
            </div>

            <!-- Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Applications -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Recent Applications</h2>
                    <div class="space-y-4">
                        @forelse($recent_applications as $application)
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $application->student->name }}</p>
                                    <p class="text-sm text-gray-600">{{ $application->company->company_name }}</p>
                                    <p class="text-xs text-gray-500">{{ $application->created_at->diffForHumans() }}</p>
                                </div>
                                <span class="px-3 py-1 rounded-full text-xs font-medium
                                    @if($application->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($application->status === 'approved') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800 @endif">
                                    {{ ucfirst($application->status) }}
                                </span>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-4">No recent applications</p>
                        @endforelse
                    </div>
                </div>

                <!-- Recent Users -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Recent Registrations</h2>
                    <div class="space-y-4">
                        @forelse($recent_users as $user)
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $user->name }}</p>
                                    <p class="text-sm text-gray-600">{{ $user->email }}</p>
                                    <p class="text-xs text-gray-500">{{ $user->created_at->diffForHumans() }}</p>
                                </div>
                                <span class="px-3 py-1 rounded-full text-xs font-medium
                                    @if($user->role === 'student') bg-blue-100 text-blue-800
                                    @elseif($user->role === 'company') bg-green-100 text-green-800
                                    @else bg-purple-100 text-purple-800 @endif">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-4">No recent registrations</p>
                        @endforelse
                    </div>
                </div>
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
            }, 3000);
        }
    </script>
</body>
</html>
