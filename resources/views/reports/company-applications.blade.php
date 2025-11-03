<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Company Applications Report - {{ $company->company_name }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #333; padding-bottom: 20px; }
        .company-info { margin-bottom: 20px; }
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .table th { background-color: #f2f2f2; font-weight: bold; }
        .status-pending { background-color: #fff3cd; }
        .status-accepted { background-color: #d4edda; }
        .status-rejected { background-color: #f8d7da; }
        .summary { margin-top: 30px; padding: 15px; background-color: #f8f9fa; border-radius: 5px; }
        .footer { margin-top: 40px; text-align: center; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Practicum Placement Applications Report</h1>
        <h2>{{ $company->company_name }}</h2>
        <p>Report Generated: {{ now()->format('F d, Y H:i') }}</p>
    </div>

    <div class="company-info">
        <h3>Company Information</h3>
        <p><strong>Email:</strong> {{ $company->email }}</p>
        <p><strong>Phone:</strong> {{ $company->phone }}</p>
        <p><strong>Industry:</strong> {{ $company->industry }}</p>
        <p><strong>Address:</strong> {{ $company->address }}</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Email</th>
                <th>Major</th>
                <th>Position</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Applied Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
                <tr class="status-{{ $application->status }}">
                    <td>{{ $application->student->name }}</td>
                    <td>{{ $application->student->email }}</td>
                    <td>{{ $application->student->major }}</td>
                    <td>{{ $application->position_title }}</td>
                    <td>{{ $application->start_date->format('M d, Y') }}</td>
                    <td>{{ $application->end_date->format('M d, Y') }}</td>
                    <td>{{ ucfirst($application->status) }}</td>
                    <td>{{ $application->created_at->format('M d, Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <h3>Summary</h3>
        <p><strong>Total Applications:</strong> {{ $applications->count() }}</p>
        <p><strong>Pending:</strong> {{ $applications->where('status', 'pending')->count() }}</p>
        <p><strong>Accepted:</strong> {{ $applications->where('status', 'accepted')->count() }}</p>
        <p><strong>Rejected:</strong> {{ $applications->where('status', 'rejected')->count() }}</p>
    </div>

    <div class="footer">
        <p>This report was generated automatically by the Practicum Placement System</p>
    </div>
</body>
</html>
