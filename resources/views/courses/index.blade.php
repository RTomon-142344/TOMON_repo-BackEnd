<!DOCTYPE html>
<html>
<head>
    <title>Courses</title>
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
        <a href="/"><button>Student List</button></a>
        <a href="/enrollments/create"><button>Enroll Course</button></a>
    </nav>
</header>

<div class="container">
    <h2>Course List</h2>

    <ul>
        @foreach ($courses as $course)
            <li>
                <a href="/courses/{{ $course->id }}">
                    {{ $course->course_code }} - {{ $course->course_name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>

</body>
</html>
