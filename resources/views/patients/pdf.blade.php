<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: #f3f3f3;
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<h2>Patient List</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Birthdate</th>
            <th>Address</th>
            <th>Email</th>
            <th>Number</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($patients as $index => $patient)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $patient->firstname }} {{ $patient->lastname }}</td>
            <td>{{ $patient->birthdate }}</td>
            <td>{{ $patient->address }}</td>
            <td>{{ $patient->email }}</td>
            <td>{{ $patient->number }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
