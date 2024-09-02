<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
      }

      @media (max-width: 767px) {
        header .row > div {
          margin-bottom: 1rem;
        }

        header .img-fluid {
          max-height: 40px;
        }
      }

      footer {
        background: #fff url(https://seu.edu.sa/images/footer-b.png) top center
          repeat-x;
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
    </style>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
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

        <form id="filterForm" method="GET">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="facultyInput" class="form-label">{{ __('general.faculties') }}:</label>
                    <select id="faculty" class="form-select" name="faculty_id[]" multiple>
                        <option value="">{{ __('general.all') }}</option>
                        @foreach($faculties as $faculty)
                            <option value="{{ $faculty->id }}">{{ $faculty->title }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="col-md-6">
                    <label for="degreeInput" class="form-label">{{ __('general.degree_name') }}:</label>
                    <select id="level" class="form-select"  name="student_level[]" multiple>
                    <option value="">{{ __('general.all') }}</option>
                    @foreach($levels as $level)
                        <option value="{{ $level->id }}">{{ $level->title }}</option>
                    @endforeach
                    </select>

                </div>
                <div class="col-md-6">
                    <label for="genderInput" class="form-label">Gender:</label>
                    <select id="gender" class="form-select" name="gender[]" multiple>
                        <option value="">{{ __('general.all') }}</option>
                        @foreach($genders as $gender)
                            <option value="{{$gender }}">{{ __('general.'.$gender) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="semesterInput" class="form-label">Semester:</label>
                    <select id="faculty" class="form-select" name="study_term_id[]" multiple>
                        <option value="">{{ __('general.all') }}</option>
                        @foreach($semesters as $semester)
                            <option value="{{ $semester->id }}">{{ $semester->title }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted"
                    >Choose multiple semesters</small>
                </div>
            </div>

            <div class="mt-4">
                <button
                    type="submit"
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
                <button type="button" id="downloadExcelButton" class="btn btn-success">
                    Download Excel
                </button>
            </div>
        </form>

        <div class="output-container mt-4">
          <h3>Result</h3>
          <pre id="outputContainer"></pre>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log('JavaScript is loaded');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let jsonData = null;

            $('#filterForm').on('submit', function(event) {
                event.preventDefault();

                console.log('Form submit intercepted');
                var dynamicAction = '/api/statistics_data';
                $(this).attr('action', dynamicAction);
                console.log('Form action set to:', $(this).attr('action'));

                $('#outputContainer').text('Loading...');

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        console.log('Response received:', response);
                        if (response.data) {
                            jsonData = {
                                total_count: response.data.length,
                                results: response.data.map(item => ({
                                    id: item.id,
                    gender: item.gender || 'N/A',
                    student_level: item.student_level || 'N/A',
                    count: item.count || '0',
                    faculty_department_id: item.faculty_department_id || 'N/A',
                    faculty_id: item.faculty_id || 'N/A',
                    study_year_id: item.study_year_id || 'N/A',
                    study_term_id: item.study_term_id || 'N/A'
                                }))
                            };
                            $('#outputContainer').text(JSON.stringify(jsonData, null, 2));
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

                    let blob = new Blob([JSON.stringify(jsonData, null, 2)], {type: 'application/json'});
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
            });
        });
    </script>
  </body>
</html>
