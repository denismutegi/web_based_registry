<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pdf</title>
</head>
<body>
    <table width="100%" border="1" cellspacing="0" cellPadding="8" border-collapse: collapse;>
        <thead>
            <tr>
                <th>Fullname</th>
                <th>Age</th>
                <th>Id No</th>
                <th>Gender</th>
                <th>Place of birth</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $rdata)
            <tr>
                <td>{{ $rdata->firstname .' '. $rdata->lastname }}</td>
                <td>{{ $rdata->age.'yrs' }}</td>
                <td>{{ $rdata->idno }}</td>
                <td>{{ $rdata->gender }}</td>
                <td>{{ $rdata->place_of_birth }}</td>
                <td>{{ $rdata->address }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="9">
                    <div class="alert alert-warning">No records found</div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>