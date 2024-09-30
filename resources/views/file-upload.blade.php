<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .file-upload-container {
            height: 200px;
            border: 2px dashed #ced4da;
            border-radius: 0.5rem;
            background-color: #ffffff;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s;
        }

        .file-upload-container:hover {
            background-color: #e9ecef;
        }

        .file-upload-container input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .file-upload-icon {
            font-size: 3rem;
            color: #ced4da;
        }

        .file-upload-message {
            margin-top: 1rem;
            color: #6c757d;
        }

        .file-name {
            margin-top: 0.5rem;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="py-5 h-screen d-flex align-items-center justify-content-center">
        <div class="card w-100" style="max-width: 600px;">
            <div class="card-body">
                <h2 class="card-title text-center text-secondary">Upload Documents</h2>
                <p class="text-center text-muted">Please provide a title and upload the required files below.</p>

                <form action="{{ route('index.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="font-weight-bold">Attachments</label>
                        <div class="file-upload-container">
                            <div class="text-center">
                                <i class="fa fa-cloud-upload file-upload-icon"></i>
                                <p class="file-upload-message">Drag & drop your files here</p>
                                <p class="file-upload-message">or click to browse files</p>
                                <div class="file-name" id="file-name"></div>
                            </div>
                            <input type="file" name="file" multiple id="file-input">
                        </div>
                        <small class="form-text text-muted">Accepted file types: PNG, JPG, PDF, DOCX.</small>

                        @if ($errors->has('file'))
                            <div class="alert alert-danger mt-2">
                                {{ $errors->first('file') }}
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Upload</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @elseif (session('error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: "{{ session('error') }}",
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <script>
        document.getElementById('file-input').addEventListener('change', function() {
            const fileNameElement = document.getElementById('file-name');
            const files = this.files;
            if (files.length > 0) {
                fileNameElement.textContent = Array.from(files).map(file => file.name).join(', ');
            } else {
                fileNameElement.textContent = '';
            }
        });
    </script>
</body>

</html>
