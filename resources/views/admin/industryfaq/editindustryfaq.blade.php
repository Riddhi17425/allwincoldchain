@extends('admin.layouts.app')

@section('title', 'Edit Industry Faq')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Edit Industry Faq</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('industryfaq.update', $data->id) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}" />
            <div class="col-xl-12 col-lg-8">
                <div class="card mb-3 p-3">
                    <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">Industry Faq Information</h6>
                    </div>
                        <div class="col-sm-12">
                            <label for="industry_id" class="form-label">Please Select The Industry Name </label>
                            <select class="form-select" id="industry_id" name="industry_id" required>
                                <option value="" disabled selected>Select Category</option>
                                @foreach ($industrylist as $industry)
                              <div class="row g-3 align-items-center">
                                <option value="{{ $industry->id }}"
                                    {{ (isset($data) && $industry->id == $data->industry_id) ? 'selected' : '' }}>
                                    {{ $industry->industry_header }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="title_description" class="form-label">Title & Description</label>
                            <div class="title-description-container">
                                <div id="title_description_fields">
                                    @if(isset($data->title_description))
                                    @php
                                    $titledescriptions = json_decode($data->title_description, true);
                                    @endphp
                                    @foreach($titledescriptions as $index => $td)
                                    <div class="row g-3 title-description-row">
                                        <div class="col-md-4">
                                            <input type="text" name="title[]" class="form-control" placeholder="Title"
                                                value="{{ $td['title'] }}">
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <textarea name="description[]" class="form-control"
                                                placeholder="Description">{{ $td['description'] }}</textarea>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger remove-row">Remove</button>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-primary add-more">Add More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button>
    </form>
</div>
</div>
@endsection

@push('styles')
<!-- Summernote CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
<!-- Dropify CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropify/dist/css/dropify.min.css">
@endpush

@push('scripts')
<!-- Summernote JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<!-- Dropify JS -->
<script src="https://cdn.jsdelivr.net/npm/dropify/dist/js/dropify.min.js"></script>

<script>
$(document).ready(function() {
    // Initialize Dropify
    $('.dropify').dropify();

    // Initialize Summernote for existing fields
    $('#industryname').summernote({
        placeholder: 'Enter Industry Name here...',
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ]
    });

    function initializeSummernoteForDescriptions() {
        $('.summernote').each(function() {
            $(this).summernote({
                placeholder: 'Enter Description here...',
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'picture', 'hr']],
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']]
                ]
            });
        });
    }

    // Initialize Summernote for existing description fields
    initializeSummernoteForDescriptions();

    // Add More functionality
    $(document).on('click', '.add-more', function() {
        var html = `
        <div class="row g-3 title-description-row">
            <div class="col-md-4">
                <input type="text" name="title[]" class="form-control" placeholder="Title">
            </div>
            <div class="col-md-6">
                <textarea name="description[]" class="form-control" placeholder="Description"></textarea>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-row">Remove</button>
            </div>
        </div>`;
        $('#title_description_fields').append(html);
        // Reinitialize Summernote for newly added description fields
        initializeSummernoteForDescriptions();
    });

    // Remove row functionality
    $(document).on('click', '.remove-row', function() {
        $(this).closest('.title-description-row').remove();
    });
});
</script>
@endpush