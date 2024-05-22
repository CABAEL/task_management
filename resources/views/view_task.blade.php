<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.header')
    <!-- Add CSS for the lightbox library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <style>
        /* Optional: Style for image previews */
        .image-preview {
            width: 100%;
            height: 200px; /* Adjust height as needed */
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>View Task</h2>
        <br/>
        <form>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" value="{{ $task->title }}" readonly>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" rows="4" readonly>{{ $task->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" value="{{ $task->status }}" readonly>
            </div>
            <div class="form-group">
                <label for="attachments">Attachments</label>
                <div id="attachmentPreviews" class="d-flex flex-wrap">
                    @if($attachments->count() > 0)
                        @foreach($attachments as $attachment)
                            <!-- Display image previews with lightbox -->
                            <a href="{{ asset('storage/' . $attachment->path) }}" data-lightbox="attachments">
                                <img src="{{ asset('storage/' . $attachment->path) }}" class="image-preview" alt="{{ $attachment->name }}">
                            </a>
                        @endforeach
                    @else
                        <p>No attachments found</p>
                    @endif
                </div>
            </div>
        </form>
        <br/>
        <a href="{{ url('/') }}"><h6><< Back</h6></a>
    </div>
    
    @include('template.footer')
    <!-- Include the lightbox library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
</body>
</html>
