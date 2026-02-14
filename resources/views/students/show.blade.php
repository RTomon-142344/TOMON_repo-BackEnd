<!DOCTYPE html>
<html>
<head>
    <title>Student Profile</title>
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

    <h2>{{ $student->first_name }} {{ $student->last_name }}</h2>

    <p><strong>Student Number:</strong> {{ $student->student_number }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>

    <br>

    <h2>Enrolled Courses</h2>

    @if ($student->courses->isEmpty())
        <p>No enrolled courses.</p>
    @else
        <ul>
            @foreach ($student->courses as $course)
                <li>
                    {{ $course->course_code }} - {{ $course->course_name }}
                </li>
            @endforeach
        </ul>
    @endif

    <a href="/enrollments/create">
        <button class="action-btn">Enroll Courses</button>
    </a>

</div>

</body>
</html>
