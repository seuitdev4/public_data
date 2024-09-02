<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>SEUAPI - Graduated Students Explorer</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <link
        href="https://fonts.googleapis.com/css?family=Almarai"
        rel="stylesheet"
    />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"
        rel="stylesheet"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
</head>
<body>
<header>
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-3 text-md-start text-center mb-2 mb-md-0">
                <img
                    src="https://seu.edu.sa/media/1124/2030.png"
                    alt="2030 Logo"
                    class="img-fluid"
                    style="max-height: 50px"
                />
            </div>
            <div class="col-md-6 text-center">
                <a href="https://www.seu.edu.sa" target="_blank">
                    <img
                        src="https://seu.edu.sa/media/6634/logo-2.png"
                        alt="SEU Logo"
                        class="img-fluid"
                        style="max-height: 80px"
                    />
                </a>
            </div>
            <div class="col-md-3 d-flex justify-content-end">
                <img
                    src="https://seu.edu.sa/media/5404/pattern.png"
                    alt="Pattern"
                    class="img-fluid"
                    style="max-height: 50px"
                />
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="main-container">
        <h1 class="mb-4">Explore the API for Graduated Students</h1>
        <p class="mb-4">
            This API supports the
            <span class="text-danger">HTTP GET method</span>. Most API endpoints
            return JSON. Endpoints are arranged hierarchically to illustrate the
            relationships between items.
        </p>

        <form id="filterForm">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="facultyInput" class="form-label">{{ __('general.faculties') }}:</label>
                    <select id="faculty" class="form-select">
                        <option value="">{{ __('general.all') }}</option>
                        @foreach($faculties as $faculty)
                            <option value="{{ $faculty->id }}">{{ $faculty->title }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="col-md-6">
                    <label for="degreeInput" class="form-label">{{ __('general.degree_name') }}:</label>
                    <select id="level" class="form-select">
                    <option value="">{{ __('general.all') }}</option>
                    @foreach($levels as $level)
                        <option value="{{ $level->id }}">{{ $level->title }}</option>
                    @endforeach
                    </select>

                </div>
                <div class="col-md-6">
                    <label for="genderInput" class="form-label">Gender:</label>
                    <select id="gender" class="form-select">
                        <option value="">{{ __('general.all') }}</option>
                        @foreach($genders as $gender)
                            <option value="{{$gender }}">{{ __('general.'.$gender) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="semesterInput" class="form-label">Semester:</label>
                    <select id="faculty" class="form-select">
                        <option value="">{{ __('general.all') }}</option>
                        @foreach($faculties as $faculty)
                            <option value="{{ $faculty->id }}">{{ $faculty->title }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted"
                    >Choose multiple semesters</small>
                </div>
            </div>

            <div class="mt-4">
                <button
                    type="button"
                    id="filterButton"
                    class="btn btn-primary me-2">
                    Execute
                </button>
                <button
                    type="button"
                    id="resetButton"
                    class="btn btn-secondary me-2"
                >
                    Reset
                </button>
                <button type="button" id="downloadButton" class="btn btn-info">
                    Download JSON
                </button>
            </div>
        </form>

        <div class="output-container mt-4">
            <h3>Result</h3>
            <pre id="outputContainer"></pre>
        </div>

        <div class="example-value mt-4">
            <h3>Example Value</h3>
            <pre>
{
  "total_count": 4000,
  "results": [
    {
      "Degree": "bachelor",
      "NumberOfStudents": 2,
      "Gender": "male",
      "Semester": "1441",
      "Faculty": {
        "Engineering "
      }
    },
    {
      "Degree": "master",
      "NumberOfStudents": 7,
      "Gender": "female",
      "Semester": "1445",
      "Faculty": {
        "Law"
      }
    }
  ]
}</pre
            >
        </div>

        <div class="catalog-table mt-4">
            <h3>API Catalog</h3>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Parameters</th>
                    <th>Terms</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td rowspan="11">Faculty</td>
                    <td>Faculty name1</td>
                </tr>
                <tr>
                    <td>Faculty name2</td>
                </tr>
                <tr>
                    <td>Faculty name3</td>
                </tr>
                <tr>
                    <td>Faculty name4</td>
                </tr>
                <tr>
                    <td>Faculty name5</td>
                </tr>
                <tr>
                    <td>Faculty name6</td>
                </tr>
                <tr>
                    <td>Faculty name7</td>
                </tr>
                <tr>
                    <td>Faculty name8</td>
                </tr>
                <tr>
                    <td>Faculty name9</td>
                </tr>
                <tr>
                    <td>Faculty name10</td>
                </tr>
                <tr>
                    <td>Faculty name11</td>
                </tr>
                <tr>
                    <td rowspan="2">Gender</td>
                    <td>male</td>
                </tr>
                <tr>
                    <td>female</td>
                </tr>
                <tr>
                    <td rowspan="3">Degree</td>
                    <td>master</td>
                </tr>
                <tr>
                    <td>phd</td>
                </tr>
                <tr>
                    <td>bachelor</td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>1445</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<footer>
    <div class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>
                        Copyright 2024, All rights reserved to Saudi Electronic
                        University.
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="text-white me-2">Privacy Policy</a>
                    <a href="#" class="text-white me-2">Terms of Service</a>
                    <a href="#" class="text-white">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    let filteredData = [];

    function filterData() {
        const faculty = document.getElementById("facultyInput").value;
        const degree = document.getElementById("degreeInput").value;
        const gender = document.getElementById("genderInput").value;
        const semester = document.getElementById("semesterInput").value;
        const studentNumber =
            document.getElementById("studentNumberInput").value;
        const studentNumberOperator = document.getElementById(
            "studentNumberOperator"
        ).value;
        const groupField = document.getElementById("groupField").value;
        const sortOrder = document.getElementById("sortOrder").value;
        const limit = document.getElementById("limitInput").value;

        const data = [
            {
                degree_name: "bachelor's",
                number_of_students: 82,
                gender: "male",
                Semester: "semester1441",
                faculty_name: "Law",
                N0: 1.0,
            },
            {
                degree_name: "master",
                number_of_students: 5,
                gender: "male",
                Semester: "semester1444",
                faculty_name: "Engineering",
                N0: 2.0,
            },
        ];

        filteredData = data.filter((item) => {
            const facultyMatches =
                faculty === "" ||
                faculty
                    .split(" ")
                    .some((term) =>
                        item.faculty_name.toLowerCase().includes(term.toLowerCase())
                    );
            const degreeMatches =
                degree === "" ||
                degree
                    .split(" ")
                    .some((term) =>
                        item.degree_name.toLowerCase().includes(term.toLowerCase())
                    );
            const genderMatches =
                gender === "" ||
                gender
                    .split(" ")
                    .some((term) =>
                        item.gender.toLowerCase().includes(term.toLowerCase())
                    );
            const semesterMatches =
                semester === "" ||
                semester
                    .split(" ")
                    .some((term) =>
                        item.Semester.toLowerCase().includes(term.toLowerCase())
                    );
            const studentNumberMatches =
                studentNumber === "" ||
                eval(
                    item.number_of_students + studentNumberOperator + studentNumber
                );
            return (
                facultyMatches &&
                degreeMatches &&
                genderMatches &&
                semesterMatches &&
                studentNumberMatches
            );
        });

        if (groupField !== "") {
            const groupedData = {};
            filteredData.forEach((item) => {
                const key = item[groupField];
                if (!groupedData[key]) {
                    groupedData[key] = [];
                }
                groupedData[key].push(item);
            });
            filteredData = groupedData;
        }

        if (sortOrder !== "") {
            filteredData = Object.entries(filteredData).sort((a, b) => {
                if (sortOrder === "asc") {
                    return a[1].length - b[1].length;
                } else {
                    return b[1].length - a[1].length;
                }
            });
        }

        if (limit !== "" && !isNaN(limit) && Number(limit) > 0) {
            if (Array.isArray(filteredData)) {
                filteredData = filteredData.slice(0, Number(limit));
            } else {
                const limitedData = {};
                Object.entries(filteredData)
                    .slice(0, Number(limit))
                    .forEach((entry) => {
                        limitedData[entry[0]] = entry[1];
                    });
                filteredData = limitedData;
            }
        }

        displayFilteredData();
    }

    function displayFilteredData() {
        const outputContainer = document.getElementById("outputContainer");
        const faculty = document.getElementById("facultyInput").value;
        const degree = document.getElementById("degreeInput").value;
        const gender = document.getElementById("genderInput").value;
        const semester = document.getElementById("semesterInput").value;
        const studentNumber =
            document.getElementById("studentNumberInput").value;

        if (
            faculty === "" &&
            degree === "" &&
            gender === "" &&
            semester === "" &&
            studentNumber === ""
        ) {
            outputContainer.innerHTML = "<pre>[]</pre>";
        } else {
            outputContainer.innerHTML =
                "<pre>" + JSON.stringify(filteredData, null, 2) + "</pre>";
        }
    }

    function resetFilters() {
        document.getElementById("filterForm").reset();
        filteredData = [];
        displayFilteredData();
    }

    function downloadData() {
        const jsonData = JSON.stringify(filteredData, null, 2);
        const blob = new Blob([jsonData], {type: "application/json"});
        const url = URL.createObjectURL(blob);
        const a = document.createElement("a");
        a.href = url;
        a.download = "SEUAPI.json";
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    }

    document
        .getElementById("filterButton")
        .addEventListener("click", filterData);
    document
        .getElementById("resetButton")
        .addEventListener("click", resetFilters);
    document
        .getElementById("downloadButton")
        .addEventListener("click", downloadData);

    function getFacaulties() {

    }
</script>
</body>
</html>
