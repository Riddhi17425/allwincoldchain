@extends('admin.layouts.app')

@section('title', 'Edit product')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Edit Product</h3>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('product.update', $data->id) }}">

            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}" />
            <div class="col-xl-12 col-lg-8">
                <div id="table_body">

                    <!-- Product Information -->
                    <div class="card mb-3 p-3">
                        <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold">Product Information</h6>
                        </div>

                        <div class="row g-3 align-items-center">
                            <!-- Product Name -->
                            <div class="col-md-6">
                                <label class="form-label">Product Name</label>
                                <input type="text" id="product_header" name="product_header" value="{{ $data->product_header }}" required class="form-control">
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label">Product Title</label>
                                <input type="text" id="title" name="title" value="{{ $data->title }}"  class="form-control">
                            </div>
                            
                            <!-- Product Header Image -->
                            <div class="col-md-6">
                                <label class="form-label">Product Header Image</label>
                                <input type="file" name="product_header_image" class="form-control">
                                <div class="image-container_tab d-flex align-items-center mb-2">
                                    <img src="{{ asset('public/Product images/' . $data->product_header_image) }}" width="100" class="me-2">
                                </div>
                            </div>
                            <!-- Product Url -->
                            <div class="col-md-6">
                                <label class="form-label">Product Url</label>
                                <input type="text" id="prod_url" name="prod_url" value="{{ $data->prod_url }}" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Product Icon</label>
                                <input type="file" name="product_icon" class="form-control">
                                <div class="image-container_tab d-flex align-items-center mb-2">
                                    <img src="{{ asset('public/Product images/' . $data->product_icon) }}" width="100" class="me-2">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Product Description</label>
                                <textarea name="product_desc" class="form-control">{{ $data->product_desc }}</textarea>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label">Meta Title</label>
                                <input type="text" id="meta_title" name="meta_title" value="{{ $data->meta_title }}"  class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control">{{ $data->meta_description }}</textarea>
                            </div>

                        </div>
                    </div>

                    <div class="card mb-3 p-3" id="how_works_fields">

                        <!-- Initial Table Details Block -->
                        @php
                        $table_data = json_decode($data->table_details, true);
                        @endphp
                        @foreach($table_data as $index => $td)
                        <div class="how-works-container">
                            <div id="how_works_fields">
                                <div class="row g-3 how-works-row">
                                    <div class="col-md-6">
                                        <label class="form-label">Table Label</label>
                                        <input type="text" name="table_label[]" value="{{ $td['label'] }}" required class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Table Description</label>
                                        <textarea id="table_desc" name="table_desc[]" class="form-control summernote">{{ $td['desc'] }}</textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Table Image</label>
                                        <input type="file" name="table_image[]" class="form-control">
                                        @if($td['image'])
                                        @foreach(explode(',', $td['image']) as $img)
                                        <div class="image-container_tab d-flex align-items-center mb-2">
                                            <img src="{{ asset('public/Product images/' . $img) }}" width="100" class="me-2">
                                        </div>

                                    </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Table Image Alt</label>
                                            <input type="text" id="prod_img_alt[]" name="prod_img_alt[]" value="{{ $td['alt'] }}" required class="form-control">
                                        </div>
                                        <div class="col-md-2 mt-3">
                                            <button type="button" class="btn btn-danger remove-work-row">Remove </button>
                                        </div>
                                        @endforeach
                                        @endif



                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-md-6 mt-3">
                            <button type="button" class="btn btn-primary add-work-more">Add More</button>
                        </div>
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 mt-4 text-uppercase">Save</button>
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

        function initializeSummernoteForDescriptions() {
            $('.summernote').each(function() {
                console.log('click add-more');
                $(this).summernote({
                    placeholder: 'Enter Description here...',
                    height: 200,
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
        initializeSummernoteForDescriptions();
    });
    $(document).on('click', '.add-work-more', function() {
        var html = `
            <div class="row g-3 how-works-row mt-1">
                                    <div class="col-md-6">
                                        <label class="form-label">Table Label</label>
                                        <input type="text" name="table_label[]" required class="form-control">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Table Description</label>
                                        <textarea id="table_desc" name="table_desc[]" class="form-control summernote"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Table Image</label>
                                        <input type="file" name="table_image[]" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                            <label class="form-label">Table Image Alt</label>
                                            <input type="text" id="prod_img_alt[]" name="prod_img_alt[]" required class="form-control">
                                        </div>
             <div class="col-md-2">
            <button type="button" class="btn btn-danger remove-work-row">Remove</button>
            </div>

            </div>`;
        $('#how_works_fields').append(html);
        

    });
    $(document).on('click', '.remove-work-row', function() {
        var row = $(this).closest('.how-works-row');
        var index = row.data('index');

        // Check if the index is defined and fallback to avoid 'undefined' in array keys
        if (typeof index === 'undefined') {
            index = '';
        }

        row.find('.image-container_tab').each(function() {
            var imgName = $(this).find('img').attr('src').split('/').pop();
            var deleteInput = `<input type="hidden" name="delete_img[]" value="${imgName}">`;
            $('#how_works_fields').append(deleteInput);
        });

        row.remove();
    });
</script>
@endpush