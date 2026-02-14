<!DOCTYPE html>
<html>
<head>
    <title>Course Detail</title>
</head>
<body>

<h1>{{ $course->course_code }} - {{ $course->course_name }}</h1>
<p>Capacity: {{ $course->capacity }}</p>

<h2>Enrolled Students</h2>

@if ($course->students->isEmpty())
    <p>No students enrolled yet.</p>
@else
    <ul>
        @foreach ($course->students as $student)
            <li>{{ $student->first_name }} {{ $student->last_name }}</li>
        @endforeach
    </ul>
@endif

</body>
</html>
