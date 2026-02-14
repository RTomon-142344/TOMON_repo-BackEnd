<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<header>
    <h1>
        <a href="/students" style="color:#ffcc00; text-decoration:none;">
            UMTC Enrollment Portal
        </a>
    </h1>
    <nav>
        <a href="/courses"><button>Course List</button></a>
        <a href="/enrollments/create"><button>Enroll Course</button></a>
    </nav>
</header>

<div class="container">
    <h2>Student List</h2>

    <ul>
        @foreach ($students as $student)
            <li>
                <a href="/students/{{ $student->id }}">
                    {{ $student->first_name }} {{ $student->last_name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>

</body>
</html>
