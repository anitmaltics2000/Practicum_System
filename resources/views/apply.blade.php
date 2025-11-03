@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 pt-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-green-600 text-white px-6 py-4">
                <h1 class="text-2xl font-bold">Submit Practicum Application</h1>
                <p class="text-green-100">Apply for your practicum placement</p>
            </div>

            <div class="p-6">
                <form action="{{ route('student.submit.application') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Company Selection -->
                        <div>
                            <label for="company_id" class="block text-sm font-medium text-gray-700 mb-2">Select Company</label>
                            <select name="company_id" id="company_id" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Choose a company...</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Position Title -->
                        <div>
                            <label for="position_title" class="block text-sm font-medium text-gray-700 mb-2">Position Title</label>
                            <input type="text" name="position_title" id="position_title" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Position Description</label>
                        <textarea name="description" id="description" rows="4" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Start Date -->
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
                            <input type="date" name="start_date" id="start_date" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- End Date -->
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">End Date</label>
                            <input type="date" name="end_date" id="end_date" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Requirements -->
                        <div>
                            <label for="requirements" class="block text-sm font-medium text-gray-700 mb-2">Requirements (Optional)</label>
                            <textarea name="requirements" id="requirements" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>

                        <!-- Stipend -->
                        <div>
                            <label for="stipend" class="block text-sm font-medium text-gray-700 mb-2">Stipend (Optional)</label>
                            <input type="number" name="stipend" id="stipend" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Supervisor Name -->
                        <div>
                            <label for="supervisor_name" class="block text-sm font-medium text-gray-700 mb-2">Supervisor Name</label>
                            <input type="text" name="supervisor_name" id="supervisor_name" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Supervisor Email -->
                        <div>
                            <label for="supervisor_email" class="block text-sm font-medium text-gray-700 mb-2">Supervisor Email</label>
                            <input type="email" name="supervisor_email" id="supervisor_email" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- CV Upload -->
                        <div>
                            <label for="cv" class="block text-sm font-medium text-gray-700 mb-2">CV (PDF, DOC, DOCX - Max 2MB)</label>
                            <input type="file" name="cv" id="cv" accept=".pdf,.doc,.docx" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Cover Letter Upload -->
                        <div>
                            <label for="cover_letter" class="block text-sm font-medium text-gray-700 mb-2">Cover Letter (PDF, DOC, DOCX - Max 2MB)</label>
                            <input type="file" name="cover_letter" id="cover_letter" accept=".pdf,.doc,.docx" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('student.portal') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition duration-300">Cancel</a>
                        <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-paper-plane mr-2"></i>Submit Application
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
