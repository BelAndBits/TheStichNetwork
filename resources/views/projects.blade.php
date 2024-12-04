<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project list</title>
</head>
<body>
<h1>My projects</h1>

@if (!empty($projects) && count($projects) > 0)
    <ul>
        @foreach ($projects as $project)
            <li>
                <strong>{{ $project['name'] }}</strong>: {{ $project['description'] }}
            </li>
        @endforeach
    </ul>
@else
    <p>There are no projects available.</p>
@endif
</body>
</html>
