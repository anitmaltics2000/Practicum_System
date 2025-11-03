@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 pt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-blue-600 text-white px-6 py-4">
                <h1 class="text-2xl font-bold">Student Portal</h1>
                <p class="text-blue-100">Manage your practicum applications</p>
            </div>

            <div class="p-6">
                <div class="mb-6">
                    <a href="{{ route('student.apply') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300">
                        <i class="fas fa-plus mr-2"></i>Submit New Application
                    </a>
                </div>

                <h2 class="text-xl font-semibold mb-4">Your Applications</h2>

                @if($applications->count() > 0)
                    <div class="space-y-4">
                        @foreach($applications as $application)
                            <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition duration-300">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-gray-800">{{ $application->position_title }}</h3>
                                        <p class="text-gray-600 mb-2">{{ $application->company->company_name }}</p>
                                        <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
                                            <div>
                                                <strong>Start Date:</strong> {{ $application->start_date->format('M d, Y') }}
                                            </div>
                                            <div>
                                                <strong>End Date:</strong> {{ $application->end_date->format('M d, Y') }}
                                            </div>
                                            <div>
                                                <strong>Status:</strong>
                                                <span class="px-2 py-1 rounded-full text-xs font-medium
                                                    @if($application->status === 'pending') bg-yellow-100 text-yellow-800
                                                    @elseif($application->status === 'accepted') bg-green-100 text-green-800
                                                    @else bg-red-100 text-red-800 @endif">
                                                    {{ ucfirst($application->status) }}
                                                </span>
                                            </div>
                                            <div>
                                                <strong>Supervisor:</strong> {{ $application->supervisor_name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <i class="fas fa-file-alt text-6xl text-gray-300 mb-4"></i>
                        <h3 class="text-xl font-medium text-gray-900 mb-2">No applications yet</h3>
                        <p class="text-gray-500 mb-6">Start your practicum journey by submitting your first application.</p>
                        <a href="{{ route('student.apply') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                            Submit Your First Application
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
