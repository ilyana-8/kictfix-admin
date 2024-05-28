<!DOCTYPE html>
<html>
<head>
    <title>New Report Assigned</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        html {
            font-family: 'Poppins', sans-serif;
        }
        .badge {
            display: inline-block;
            padding: 0.5em 0.75em;
            font-size: 0.75em;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 1rem;
        }
        .text-primary {
            color: #0d6efd;
        }
        .text-bg-primary {
            color: #fff;
            background-color: #0d6efd;
        }
        .text-bg-warning {
            color: #fff;
            background-color: #ffc107;
        }
        .text-bg-danger {
            color: #fff;
            background-color: #dc3545;
        }
        .text-bg-success {
            color: #fff;
            background-color: #28a745;
        }
        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        @media (min-width: 768px) {
            .container {
                width: 750px;
            }
        }
        @media (min-width: 992px) {
            .container {
                width: 970px;
            }
        }
        @media (min-width: 1200px) {
            .container {
                width: 1170px;
            }
        }
    </style>
</head>
<body class="container">
    <h3>Hello, {{ $technician->name }}!</h3>
    <p>You have been assigned a new report:</p>
    <p><strong>#ID:</strong> {{ $report->reporting_id }}</p>
    <p><strong>Title:</strong> {{ $report->title }}</p>
    <p><strong>Description:</strong> {{ $report->description }}</p>
    <p>
        <strong>Status:</strong>
        @if ($report->status == 'in progress')
            <span class="badge text-bg-warning">{{ $report->status }}</span>
        @elseif ($report->status == 'not process yet')
            <span class="badge text-bg-primary">{{ $report->status }}</span>
        @elseif ($report->status == 'not forwarded')
            <span class="badge text-bg-danger">{{ $report->status }}</span>
        @elseif ($report->status == 'completed')
            <span class="badge text-bg-success">{{ $report->status }}</span>
        @endif
    </p>
    <p>
        <strong>Here are the attachment (if any): </strong>
        @if ($report->attachment != '')
            <a href="{{ env('MAIN_APP_URL') . '/storage/' . $report->attachment }}" target="_blank" rel="noopener noreferrer" class="text-primary">Click here</a>
        @else
            <span>No Attachment</span>
        @endif
    </p>
    <p>Thank you!</p>
</body>
</html>
