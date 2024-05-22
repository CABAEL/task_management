<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .image-preview {
            width: 100%;
            height: 200px;
            border: 2px solid #ddd;
            display: none;
            margin-top: 10px;
            background-size: cover;
            background-position: center;
        }
        .image-preview-wrapper {
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Create Task</h2>
        <form id="taskForm" action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">Select status</option>
                    <option value="1">to-do</option>
                    <option value="2">in-progress</option>
                    <option value="3">done</option>
                </select>
            </div>
            <div class="form-group">
                <label for="images">Attachments (Images only, max 4MB each)</label>
                <input type="file" class="form-control-file" id="images" name="images[]" accept="image/*" multiple onchange="previewImages(event)">
                <div id="imagePreviews" class="d-flex flex-wrap"></div>
            </div>
            <button type="submit" name="action" value="publish" class="btn btn-sm btn-primary">Publish</button>
            <button type="submit" name="action" value="draft" class="btn btn-sm btn-secondary">Save as Draft</button>
           
        </form>
        <br/>
        <a href="/"><h6><< Back</button></h6></a>
    </div>

    <!-- Modal for viewing images -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="Image Preview" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImages(event) {
            const files = event.target.files;
            const previewsContainer = document.getElementById('imagePreviews');
            previewsContainer.innerHTML = '';

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const fileSize = file.size / 1024 / 1024; // in MB
                const fileType = file.type;

                if (fileSize > 4) {
                    alert("File size exceeds 4MB: " + file.name);
                    event.target.value = ""; // Clear the file input
                    previewsContainer.innerHTML = '';
                    return;
                } else if (!fileType.startsWith("image/")) {
                    alert("Only images are allowed: " + file.name);
                    event.target.value = ""; // Clear the file input
                    previewsContainer.innerHTML = '';
                    return;
                } else {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const previewWrapper = document.createElement('div');
                        previewWrapper.classList.add('image-preview-wrapper', 'col-md-3', 'p-2');

                        const preview = document.createElement('div');
                        preview.classList.add('image-preview');
                        preview.style.display = 'block';
                        preview.style.backgroundImage = `url(${e.target.result})`;
                        previewWrapper.appendChild(preview);

                        previewWrapper.addEventListener('click', function() {
                            const modalImage = document.getElementById('modalImage');
                            modalImage.src = e.target.result;
                            $('#imageModal').modal('show');
                        });

                        previewsContainer.appendChild(previewWrapper);
                    }
                    reader.readAsDataURL(file);
                }
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
