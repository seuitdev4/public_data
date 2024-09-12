<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('info.title') }}</title>
    <link rel="icon" href="https://seu.edu.sa/images/new-logo.png" type="image/x-icon">

    <meta name="description"
        content="Access and analyze student statistics from Saudi Electronic University. Filter by faculty, degree, gender, and more.">
    <meta property="og:title" content="SEU Student Statistics Dashboard">
    <meta property="og:description" content="Access and analyze student statistics from Saudi Electronic University.">
    <meta property="og:image" content="https://seu.edu.sa/media/6634/logo-2.png">
    <meta property="og:url" content="https://academicreport.seu.edu.sa">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SEU Student Statistics Dashboard">
    <meta name="twitter:description" content="Access and analyze student statistics from Saudi Electronic University.">
    <meta name="twitter:image" content="https://seu.edu.sa/media/6634/logo-2.png">

    <link rel="canonical" href="https://academicreport.seu.edu.sa">
    <meta name="author" content="Saudi Electronic University">
    <meta name="keywords" content="Saudi Electronic University, student statistics, academic report, higher education">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Almarai" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/atom-one-dark.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>

    <style>
        body {
            background-color: #f0f2f5;
            color: #333;
        }

        .main-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .form-label {
            font-weight: bold;
            color: #4a9caf;
        }

        .btn-primary {
            background-color: #4a9caf;
            border-color: #4a9caf;
        }

        .btn-primary:hover {
            background-color: #3a7d8d;
            border-color: #3a7d8d;
        }

        .output-container {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 1rem;
            margin-top: 1rem;
            max-height: 400px;
            overflow-y: auto;
        }

        .catalog-table {
            margin-top: 2rem;
        }

        .catalog-table th {
            background-color: #4a9caf;
            color: white;
        }

        .example-value {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 1rem;
            margin-top: 1rem;
        }

        header {
            background: linear-gradient(to left, #5b3283, #3580ab, #5db5b3);
            color: white;
            padding: 1rem 0;
        }

        header .img-fluid {
            max-height: 50px;
            margin-left: 10px;
        }

        @media (max-width: 767px) {
            header .row>div {
                margin-bottom: 1rem;
            }

            header .img-fluid {
                max-height: 40px;
            }
        }

        footer {
            background: #fff url(https://seu.edu.sa/images/footer-b.png) top center repeat-x;
            padding-top: 40px;
        }

        footer p {
            color: #fff;
        }

        footer .footer-section {
            background: #001d6c;
            padding: 30px 0 0;
            text-align: right;
        }

        .dropdown-menu {
            border-radius: 0.3rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item {
            transition: background-color 0.3s, color 0.3s;
        }

        .dropdown-item:hover {
            background-color: #42659d;
            color: #ffffff;
        }

        .btn-primary {
            background-color: #42659d;
            border-color: #42659d;
            color: #ffffff;
            padding: 4px 8px;
            border-radius: 0.5rem;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn-primary:hover {
            background-color: #047faf;
            transform: scale(1.05);
        }

        .form-select {
            width: 100%;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid #ccc;
        }

        .endpoint {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
            font-size: 1rem;
            word-wrap: break-word;
        }

        .endpoint a {
            color: #007BFF;
            text-decoration: none;
        }

        .endpoint a:hover {
            text-decoration: underline;
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            .endpoint {
                font-size: 0.9rem;
                padding: 10px;
            }
        }

        @media (max-width: 576px) {
            .form-select {
                font-size: 1rem;
            }

            .hide-on-mobile {
                display: none;
            }
        }

        .nav-tabs {
            border-bottom: 1px solid #dee2e6;
            margin-bottom: 2rem;
        }

        .nav-tabs .nav-link {
            color: #495057;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-bottom: none;
            margin-right: 0.5rem;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
        }

        .nav-tabs .nav-link:hover {
            border-color: #e9ecef #e9ecef #dee2e6;
        }

        .nav-tabs .nav-link.active {
            color: #4a9caf;
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
        }

        .tab-content {
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-top: none;
            border-radius: 0 0 0.25rem 0.25rem;
        }

        .output-container {
            background: rgb(51, 51, 51);
            border-radius: 6px;
            padding: 16px;
            margin-top: 1rem;
            max-height: 400px;
            overflow-y: auto;
            border: 1px solid #444;
        }

        .output-container h3 {
            color: #ffffff;
            margin-bottom: 10px;
        }

        .output-container pre {
            background: rgb(51, 51, 51);
            color: #d4d4d4;
            border: none;
            padding: 16px;
            margin: 0;
            white-space: pre-wrap;
            word-wrap: break-word;
            border-radius: 5px;
            overflow: auto;
            font-family: 'Courier New', Courier, monospace;
        }

        .key {
            color: rgb(162, 252, 162);
        }

        .string {
            color: rgb(255, 183, 77);
        }

        .number {
            color: #bd93f9;
        }

        .boolean {
            color: #ffb86c;
        }

        .null {
            color: #ff5555;
        }

        .sidebar {
            background: linear-gradient(to left, #5b3283, #3580ab, #5db5b3);
            color: white;
            padding: 15px;
            border-radius: 5px 0 0 5px;
        }

        .sidebar h3 {
            margin-bottom: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            text-decoration: underline;
            color: #e0e0e0;
        }

        .content {
            padding: 20px;
            background: white;
            border-radius: 0 5px 5px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            flex: 1;
        }

        button {
            margin-top: 10px;
        }

        .output {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #007bff;
            background-color: #f8f9fa;
            border-radius: 5px;
            display: none;
        }

        .highlight {
            /* Light blue background for highlighted text */
            padding: 2px 4px;
            /* Padding for better readability */
            border-radius: 4px;
            /* Rounded corners */
        }

        .hint-icon {
            font-size: 1.5rem;
            /* Size of the hint icon */
            margin-left: 10px;
            /* Space between button and icon */
            cursor: pointer;
            /* Pointer cursor for interactivity */
            color: #007bff;
            /* Color to match the primary theme */
            transition: color 0.3s;
            /* Smooth color transition */
        }

        .hint-icon:hover {
            color: #0056b3;
            /* Darker shade on hover for better feedback */
        }

        .tooltip-inner {
            max-width: 600px;
            /* Set the desired width */
            background-color: #343a40;
            /* Dark background for tooltip */
            color: #ffffff;
            /* White text for contrast */
            border-radius: 4px;
            /* Rounded corners */
            padding: 15px;
            /* Padding for better spacing */
            font-size: 0.9rem;
            /* Font size */
            white-space: normal;
            /* Allow line breaks */
        }

        .tooltip-arrow {
            border-top-color: #343a40;
            /* Match tooltip arrow color */
        }
    </style>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HDGZC38HCB"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-HDGZC38HCB');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-3 text-md-start text-center mb-2 mb-md-0">
                    <img src="https://seu.edu.sa/media/1124/2030.png" alt="2030 Logo" class="img-fluid"
                        style="max-height: 50px" />
                </div>
                <div class="col-md-6 text-center">
                    <a href="https://www.seu.edu.sa" target="_blank">
                        <img src="https://seu.edu.sa/media/6634/logo-2.png" alt="SEU Logo" class="img-fluid"
                            style="max-height: 80px" />
                    </a>
                </div>
                <div class="col-md-3 d-flex justify-content-end align-items-center">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="languageDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ app()->getLocale() === 'ar' ? 'العربية' : 'English' }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item" href="{{ url('/lang/en') }}">English</a></li>
                            <li><a class="dropdown-item" href="{{ url('/lang/ar') }}">العربية</a></li>
                        </ul>
                    </div>
                    <img src="https://seu.edu.sa/media/5404/pattern.png" alt="Pattern" class="img-fluid hide-on-mobile"
                        style="max-height: 50px" />
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="main-container">
            <h1 class="mb-4">{{ __('info.welcome_message') }}</h1>
            <p class="mb-4">
                {{ __('info.welcome_sub_info1') }}
                <span class="text-danger"> {{ __('info.welcome_sub_info2') }}</span>
                .{{ __('info.welcome_sub_info3') }}
            </p>
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general"
                        type="button" role="tab" aria-controls="general"
                        aria-selected="true">{{ __('info.active_students') }}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="graduate-tab" data-bs-toggle="tab" data-bs-target="#graduate"
                        type="button" role="tab" aria-controls="graduate"
                        aria-selected="false">{{ __('info.graduate_students') }}</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <div class="main-container">
                        <form id="filterForm" method="get">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="facultyInput"
                                        class="form-label">{{ __('general.faculties') }}:</label>
                                    <select id="faculty" class="form-select" name="faculty_id[]" multiple>
                                        <option value="">{{ __('general.all') }}</option>
                                        @foreach ($faculties as $faculty)
                                            <option value="{{ $faculty->id }}">{{ $faculty->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="degreeInput"
                                        class="form-label">{{ __('general.degree_name') }}:</label>
                                    <select id="level" class="form-select" name="student_level[]" multiple>
                                        <option value="">{{ __('general.all') }}</option>
                                        @foreach ($levels as $level)
                                            <option value="{{ $level->id }}">{{ $level->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="genderInput" class="form-label">{{ __('info.gender') }}:</label>
                                    <select id="gender" class="form-select" name="gender[]" multiple>
                                        <option value="">{{ __('general.all') }}</option>
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender }}">{{ __('general.' . $gender) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="semesterInput" class="form-label">{{ __('info.semester') }}:</label>
                                    <select id="semester" class="form-select" name="study_term_id[]" multiple>
                                        <option value="">{{ __('general.all') }}</option>
                                        @foreach ($semesters as $semester)
                                            <option value="{{ $semester->id }}">{{ $semester->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" id="filterButton" class="btn btn-primary me-2">
                                    {{ __('info.execute') }}
                                </button>
                                <button type="button" id="resetButton" class="btn btn-secondary me-2">
                                    {{ __('info.reset') }}
                                </button>
                                <button type="button" id="downloadButton" class="btn btn-info">
                                    {{ __('info.download_json') }}
                                </button>
                                <button type="button" id="downloadExcelButton" class="btn btn-success">
                                    {{ __('info.download_excel') }}
                                </button>
                            </div>
                        </form>

                        <div class="json-output output-container mt-4">
                            <h3>{{ __('info.result') }}</h3>
                            <pre id="outputContainer"></pre>
                        </div>

                        <br>
                        <br>

                        <div class="col-lg-12 d-flex">
                            <div class="col-lg-8">
                                <main class="content">
                                    <h5 id="get-all-graduates">1. Retrieve All Students</h5>
                                    <div class="endpoint">
                                        BaseUrl:: <a>GET https://academicreport.seu.edu.sa/api/statistics</a>
                                        <button class="btn btn-primary" onclick="showData_student()"> GET All</button>
                                    </div>
                                    <h5 id="get-all-graduates">2. Retrieve Graduated Student by Faculties</h5>
                                    <div class="endpoint">
                                        Endpoint:: <a>GET /graduated/statistics?faculty_id[]=1&faculty_id[]=2</a>
                                        <button class="btn btn-primary" onclick="showData_student('faculty', 1)">GET
                                            By Faculties
                                        </button>

                                        <span class="hint-icon" data-toggle="tooltip"
                                            title="
                                                value='1', 'title' => 'Health Sciences',
                                                value='2', 'title' => 'Science &amp; Theoretical Studies',
                                                value='3', 'title' => 'Administrative &amp;Financial Sc.',
                                                value='4', 'title' => 'Common First Year',
                                                value='5', 'title' => 'Computing and Informatics'">
                                            ℹ️
                                        </span>

                                    </div>
                                    <h5 id="get-all-graduates">3. Retrieve Graduates by Year</h5>
                                    <div class="endpoint">
                                        Endpoint:: <a>GET /graduated/statistics?year_id[]=1&year_id[]=4</a>
                                        <button class="btn btn-primary" onclick="showData_student('year', 1)">GET
                                            By Year(s)
                                        </button>

                                        <span class="hint-icon" data-toggle="tooltip"
                                            title="
                                            value='': All 
                                            value='1': First Semester 2018-2019 
                                            value='2': Second Semester 2018-2019 
                                            value='3': First Semester 2019-2020 
                                            value='4': Second Semester 2019-2020 
                                            value='5': First Semester 2020-2021 
                                            value='6': Second Semester 2020-2021 
                                            value='7': First Semester 2021-2022 
                                            value='8': Second Semester 2021-2022 
                                            value='9': Semester 2022-2023 
                                            value='10': Semester 2023-2024">
                                            ℹ️
                                        </span>
                                    </div>
                                    <h5 id="get-all-graduates">4. Retrieve Graduates by Gender</h5>
                                    <div class="endpoint">
                                        Endpoint:: <a>GET /api/graduated/statistics?gender[]=male&?gender[]=female</a>
                                        <button class="btn btn-primary"
                                            onclick="showData_student('gender', 'male')">GET
                                            By Gender(s)
                                        </button>
                                    </div>
                                </main>
                            </div>
                            <div class="col-lg-4">
                                <main class="content">
                                    <div class="json-output output-container mt-4">
                                        <h3>{{ __('info.example') }}</h3>
                                        <pre id="ExampleOutputContainer"></pre>
                                    </div>
                                </main>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="tab-pane fade" id="graduate" role="tabpanel" aria-labelledby="graduate-tab">
                    <div class="main-container">
                        <form id="graduateFilterForm" method="get">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="graduateFacultyInput"
                                        class="form-label">{{ __('general.faculties') }}:</label>
                                    <select id="graduateFaculty" class="form-select" name="faculty_id[]" multiple>
                                        <option value="">{{ __('general.all') }}</option>
                                        @foreach ($faculties as $faculty)
                                            <option value="{{ $faculty->id }}">{{ $faculty->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="graduateGenderInput"
                                        class="form-label">{{ __('info.gender') }}:</label>
                                    <select id="graduateGender" class="form-select" name="gender[]" multiple>
                                        <option value="">{{ __('general.all') }}</option>
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender }}">{{ __('general.' . $gender) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="graduateSemesterInput"
                                        class="form-label">{{ __('general.nationality') }}:</label>
                                    <select id="graduateSemester" class="form-select" name="is_saudi[]" multiple>
                                        <option value="">{{ __('general.all') }}</option>
                                        <option value="1">{{ __('general.saudi') }}</option>
                                        <option value="0">{{ __('general.non-saudi') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="yearInput" class="form-label">{{ __('info.year') }}:</label>
                                    <select id="year" class="form-select" name="year_id[]" multiple>
                                        <option value="">{{ __('general.all') }}</option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year->id }}">{{ $year->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" id="graduateFilterButton" class="btn btn-primary me-2">
                                    {{ __('info.execute') }}
                                </button>
                                <button type="button" id="graduateResetButton" class="btn btn-secondary me-2">
                                    {{ __('info.reset') }}
                                </button>
                                <button type="button" id="graduateDownloadButton" class="btn btn-info">
                                    {{ __('info.download_json') }}
                                </button>
                                <button type="button" id="graduateDownloadExcelButton" class="btn btn-success">
                                    {{ __('info.download_excel') }}
                                </button>
                            </div>
                        </form>

                        <div class="json-output output-container mt-4">
                            <h3>{{ __('info.result') }}</h3>
                            <pre id="graduateOutputContainer"></pre>
                        </div>
                        <br>
                        <br>
                        <div class="col-lg-12 d-flex">
                            <div class="col-lg-8">
                                <main class="content">
                                    <h5 id="get-all-graduates">1. Retrieve All Graduates</h5>
                                    <div class="endpoint">
                                        BaseUrl:: <a>GET https://academicreport.seu.edu.sa/api</a>
                                        <button class="btn btn-primary" onclick="showData()"> GET All</button>
                                    </div>
                                    <h5 id="get-all-graduates">2. Retrieve Graduated Student by Faculties</h5>
                                    <div class="endpoint">
                                        Endpoint:: <a>GET /graduated/statistics?faculty_id[]=1&faculty_id[]=2</a>
                                        <button class="btn btn-primary" onclick="showData('faculty', 1)">GET
                                            By Faculties
                                        </button>

                                        <span class="hint-icon" data-toggle="tooltip"
                                            title="
                                                value='1', 'title' => 'Health Sciences',
                                                value='2', 'title' => 'Science &amp; Theoretical Studies',
                                                value='3', 'title' => 'Administrative &amp;Financial Sc.',
                                                value='4', 'title' => 'Common First Year',
                                                value='5', 'title' => 'Computing and Informatics'">
                                            ℹ️
                                        </span>

                                    </div>
                                    <h5 id="get-all-graduates">3. Retrieve Graduates by Year</h5>
                                    <div class="endpoint">
                                        Endpoint:: <a>GET /graduated/statistics?year_id[]=1&year_id[]=4</a>
                                        <button class="btn btn-primary" onclick="showData('year', 1)">GET
                                            By Year(s)
                                        </button>

                                        <span class="hint-icon" data-toggle="tooltip"
                                            title="
                                            value='': All 
                                            value='1': First Semester 2018-2019 
                                            value='2': Second Semester 2018-2019 
                                            value='3': First Semester 2019-2020 
                                            value='4': Second Semester 2019-2020 
                                            value='5': First Semester 2020-2021 
                                            value='6': Second Semester 2020-2021 
                                            value='7': First Semester 2021-2022 
                                            value='8': Second Semester 2021-2022 
                                            value='9': Semester 2022-2023 
                                            value='10': Semester 2023-2024">
                                            ℹ️
                                        </span>
                                    </div>
                                    <h5 id="get-all-graduates">4. Retrieve Graduates by Gender</h5>
                                    <div class="endpoint">
                                        Endpoint:: <a>GET /api/graduated/statistics?gender[]=male&?gender[]=female</a>
                                        <button class="btn btn-primary" onclick="showData('gender', 'male')">GET
                                            By Gender(s)
                                        </button>
                                    </div>
                                </main>
                            </div>
                            <div class="col-lg-4">
                                <main class="content">
                                    <div class="json-output output-container mt-4">
                                        <h3>{{ __('info.example') }}</h3>
                                        <pre id="ExampleGraduateOutputContainer"></pre>
                                    </div>
                                </main>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            {{ __('info.copy_info') }}
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="#" class="text-white me-2">{{ __('info.privacy_policy') }}</a>
                        <a href="#" class="text-white me-2">{{ __('info.terms_of_service') }}</a>
                        <a href="#" class="text-white">{{ __('info.contact_us') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        $(document).ready(function() {

            function highlightJson(json) {
                const jsonString = JSON.stringify(json, null, 2);
                return jsonString
                    .replace(/"([^"]+)":/g, '<span class="key">"$1":</span>') // Keys
                    .replace(/:\s*"([^"]*)"/g, ': <span class="string">"$1"</span>') // String values
                    .replace(/:\s*([0-9]+)/g, ': <span class="number">$1</span>') // Number values
                    .replace(/:\s*(true|false)/g, ': <span class="boolean">$1</span>') // Boolean values
                    .replace(/:\s*(null)/g, ': <span class="null">$1</span>'); // Null values
            }

            console.log('JavaScript is loaded');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let jsonData = null;

            // Initialize Select2 for all select elements
            $('select').select2({
                placeholder: "Select an option",
                allowClear: true
            });

            $('#filterForm').on('submit', function(event) {
                event.preventDefault();

                console.log('Form submit intercepted');
                var dynamicAction = '/api/statistics';
                $(this).attr('action', dynamicAction);
                console.log('Form action set to:', $(this).attr('action'));

                $('#outputContainer').text('Loading...');

                var serializedData = $(this).serializeArray();
                var requestData = {};

                // Convert serialized array to an object
                $.each(serializedData, function() {
                    if (this.value) {
                        if (this.name in requestData) {
                            if (!Array.isArray(requestData[this.name])) {
                                requestData[this.name] = [requestData[this.name]];
                            }
                            requestData[this.name].push(this.value);
                        } else {
                            requestData[this.name] = this.value;
                        }
                    }
                });

                console.log('Request data:', requestData);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'GET',
                    data: requestData,
                    success: function(response) {
                        console.log('Response received:', response);
                        let jsonData;
                        if (response.data) {
                            jsonData = {
                                total_count: response.meta.total_student_count,
                                results: response.data.map(item => ({
                                    id: item.id,
                                    gender: item.gender || 'N/A',
                                    level: item.level || 'N/A',
                                    count: item.count || '0',
                                    faculty_department: item
                                        .faculty_department || 'N/A',
                                    faculty: item.faculty || 'N/A',
                                    year: item.year || 'N/A',
                                    term: item.term || 'N/A'
                                }))
                            };

                            const highlightedJson = highlightJson(jsonData);
                            $('#outputContainer').html(highlightedJson);

                        } else {
                            $('#outputContainer').text('No data found.');
                            jsonData = null;
                        }
                    },
                    error: function(xhr) {
                        console.log('Error occurred:', xhr.responseText);
                        $('#outputContainer').text('An error occurred: ' + xhr.responseText);
                        jsonData = null;
                    }
                });
            });

            $('#downloadButton').on('click', function() {
                if (jsonData) {
                    let blob = new Blob([JSON.stringify(jsonData, null, 2)], {
                        type: 'application/json'
                    });
                    let url = URL.createObjectURL(blob);

                    let a = document.createElement('a');
                    a.href = url;
                    a.download = 'data.json';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);

                    URL.revokeObjectURL(url);
                } else {
                    alert('No data to download.');
                }
            });

            $('#downloadExcelButton').on('click', function() {
                if (jsonData) {
                    const worksheet = XLSX.utils.json_to_sheet(jsonData.results);
                    const workbook = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(workbook, worksheet, "Graduated Students");
                    XLSX.writeFile(workbook, 'data.xlsx');
                } else {
                    alert('No data to download.');
                }
            });

            $('#resetButton').on('click', function() {
                // Reset the form fields
                $('#filterForm')[0].reset();

                // Clear the output container
                $('#outputContainer').text('');

                // Clear the JSON data
                jsonData = null;

                // Reset Select2
                $('select').val(null).trigger('change');
            });

            $('#graduateFilterForm').on('submit', function(event) {
                event.preventDefault();

                console.log('Form submit intercepted');
                var dynamicAction = 'api/graduated/statistics';
                $(this).attr('action', dynamicAction);
                console.log('Form action set to:', $(this).attr('action'));

                $('#graduateOutputContainer').text('Loading...');

                var serializedData = $(this).serializeArray();
                var requestData = {};

                // Convert serialized array to an object
                $.each(serializedData, function() {
                    if (this.value) {
                        if (this.name in requestData) {
                            if (!Array.isArray(requestData[this.name])) {
                                requestData[this.name] = [requestData[this.name]];
                            }
                            requestData[this.name].push(this.value);
                        } else {
                            requestData[this.name] = this.value;
                        }
                    }
                });

                console.log('Request data:', requestData);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'GET',
                    data: requestData,
                    success: function(response) {
                        console.log('Response received:', response);
                        let jsonData;
                        if (response.data) {
                            jsonData = {
                                total_count: response.meta.total_student_count,
                                results: response.data.map(item => ({
                                    id: item.id,
                                    gender: item.gender || 'N/A',
                                    count: item.count || '0',
                                    faculty: item.faculty || 'N/A',
                                    year: item.year || 'N/A',
                                    is_saudi: item.is_saudi || 'N/A',
                                }))
                            };
                            const highlightedJson = highlightJson(jsonData);
                            $('#graduateOutputContainer').html(highlightedJson);
                        } else {
                            $('#graduateOutputContainer').text('No data found.');
                            jsonData = null;
                        }
                    },
                    error: function(xhr) {
                        console.log('Error occurred:', xhr.responseText);
                        $('#graduateOutputContainer').text('An error occurred: ' + xhr
                            .responseText);
                        jsonData = null;
                    }
                });
            });




            $('#graduateDownloadButton').on('click', function() {
                if (jsonData) {
                    let blob = new Blob([JSON.stringify(jsonData, null, 2)], {
                        type: 'application/json'
                    });
                    let url = URL.createObjectURL(blob);

                    let a = document.createElement('a');
                    a.href = url;
                    a.download = 'data.json';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);

                    URL.revokeObjectURL(url);
                } else {
                    alert('No data to download.');
                }
            });

            $('#graduateDownloadExcelButton').on('click', function() {
                if (jsonData) {
                    const worksheet = XLSX.utils.json_to_sheet(jsonData.results);
                    const workbook = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(workbook, worksheet, "Graduated Students");
                    XLSX.writeFile(workbook, 'data.xlsx');
                } else {
                    alert('No data to download.');
                }
            });

            $('#graduateResetButton').on('click', function() {
                // Reset the form fields
                $('#graduateFilterForm')[0].reset();

                // Clear the output container
                $('#graduateOutputContainer').text('');

                // Clear the JSON data
                jsonData = null;

                // Reset Select2
                $('select').val(null).trigger('change');
            });


        });


        $(document).ready(function() {
            console.log('JavaScript is loaded');

            // Function to initialize Select2
            function initializeSelect2() {
                console.log('Initializing Select2');
                $('select').each(function() {
                    console.log('Initializing Select2 for:', this.id);
                    $(this).select2({
                        placeholder: "Select an option",
                        allowClear: true,
                        width: '100%'
                    });
                });
            }

            initializeSelect2();

            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                console.log('Tab switched, re-initializing Select2');
                initializeSelect2();
            });

            $('select').each(function() {
                console.log('Options in ' + this.id + ':', $(this).find('option').length);
            });

        });
    </script>


    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip({
                html: true
            }); // Enable HTML in tooltips
        });

        function highlightJson(json) {
            return JSON.stringify(json, null, 2)
                .replace(/"([^"]+)":/g, '"<span class="highlight">$1</span>":') // Highlight keys
                .replace(/: "([^"]+)"/g, ': "<span class="highlight">$1</span>"'); // Highlight string values
        }

        function showData(type, value) {
            const outputContainer = document.getElementById('ExampleGraduateOutputContainer');
            outputContainer.textContent = "Loading..."; // Optional: show loading

            let url = 'https://academicreport.seu.edu.sa/api/graduated/statistics?';
            if (type === 'faculty') {
                url += `faculty_id[]=${value}`;
            } else if (type === 'year') {
                url += `year_id[]=${value}`;
            } else if (type === 'gender') {
                url += `gender[]=${value}`;
            }

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(response => {
                    const jsonData = {
                        total_count: response.meta.total_student_count,
                        results: response.data.map(item => ({
                            gender: item.gender || 'N/A',
                            count: item.count || '0',
                            faculty: item.faculty || 'N/A',
                            year: item.year || 'N/A',
                            is_saudi: item.is_saudi || 'N/A',
                        }))
                    };

                    const highlightedJson = graduate_hilight_json(jsonData);
                    outputContainer.innerHTML = highlightedJson; // Use innerHTML to render highlighted JSON
                })
                .catch(error => {
                    outputContainer.textContent = 'Error: ' + error.message;
                });
        }


        function showData_student(type, value) {
            const outputContainer = document.getElementById('ExampleOutputContainer');
            outputContainer.textContent = "Loading..."; // Optional: show loading

            let url = 'https://academicreport.seu.edu.sa/api/statistics?';
            if (type === 'faculty') {
                url += `faculty_id[]=${value}`;
            } else if (type === 'year') {
                url += `year_id[]=${value}`;
            } else if (type === 'gender') {
                url += `gender[]=${value}`;
            }

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(response => {
                    const jsonData = {
                        total_count: response.meta.total_student_count,
                        results: response.data.map(item => ({
                            id: item.id,
                            gender: item.gender || 'N/A',
                            level: item.level || 'N/A',
                            count: item.count || '0',
                            faculty_department: item
                                .faculty_department || 'N/A',
                            faculty: item.faculty || 'N/A',
                            year: item.year || 'N/A',
                            term: item.term || 'N/A'
                        }))
                    };


                    const highlightedJson = student_hilight_json(jsonData);
                    $('#ExampleOutputContainer').html(highlightedJson);

                })
                .catch(error => {
                    outputContainer.textContent = 'Error: ' + error.message;
                });
        }

        function student_hilight_json(json) {
            const jsonString = JSON.stringify(json, null, 2);
            return jsonString
                .replace(/"([^"]+)":/g, '<span class="key">"$1":</span>') // Keys
                .replace(/:\s*"([^"]*)"/g, ': <span class="string">"$1"</span>') // String values
                .replace(/:\s*([0-9]+)/g, ': <span class="number">$1</span>') // Number values
                .replace(/:\s*(true|false)/g, ': <span class="boolean">$1</span>') // Boolean values
                .replace(/:\s*(null)/g, ': <span class="null">$1</span>'); // Null values
        }

        function graduate_hilight_json(json) {
            const jsonString = JSON.stringify(json, null, 2);
            return jsonString
                .replace(/"([^"]+)":/g, '<span class="key">"$1":</span>') // Keys
                .replace(/:\s*"([^"]*)"/g, ': <span class="string">"$1"</span>') // String values
                .replace(/:\s*([0-9]+)/g, ': <span class="number">$1</span>') // Number values
                .replace(/:\s*(true|false)/g, ': <span class="boolean">$1</span>') // Boolean values
                .replace(/:\s*(null)/g, ': <span class="null">$1</span>'); // Null values
        }
    </script>


</body>

</html>
