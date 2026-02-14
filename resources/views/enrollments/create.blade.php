<!DOCTYPE html>
<html>
<head>
    <title>Enroll Course</title>
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
        <a href="/courses"><button>Course List</button></a>
    </nav>
</header>

<div class="container">
    <h2>Enroll Student in Course</h2>

    @if (session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    @if (session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="/enrollments">
        @csrf

        <select name="student_id" required>
            <option value="">Select Student</option>
            @foreach ($students as $student)
                <option value="{{ $student->id }}">
                    {{ $student->student_number }} - {{ $student->first_name }} {{ $student->last_name }}
                </option>
            @endforeach
        </select>

        <select name="course_id" required>
            <option value="">Select Course</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">
                    {{ $course->course_code }} - {{ $course->course_name }}
                </option>
            @endforeach
        </select>

        <button class="action-btn" type="submit">Enroll</button>
    </form>
</div>

</body>
</html>
