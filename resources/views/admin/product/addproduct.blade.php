@extends('admin.layouts.app')

@section('title', 'Product Add')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Product Add</h3>
            </div>
        </div>
    </div> <!-- Row end -->

    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('product.store') }}">
            @csrf
            <div class="col-xl-12 col-lg-8">
                <div id="table_body">

                    <div class="card mb-3 p-3">
                        <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold">Product Information</h6>
                        </div>

                        <div class="row g-3 align-items-center">

                            <!-- Basic data element -->
                            <div class="col-md-6">
                                <label class="form-label">Product Name</label>
                                <input type="text" id="product_header" name="product_header" required class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Product Title</label>
                                <input type="text" id="title" name="title"  class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Product Header Image</label>
                                <input type="file" name="product_header_image" required class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Product Url</label>
                                <input type="text" id="prod_url" name="prod_url" required class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Product Header Alt</label>
                                <input type="text" id="prod_header_alt" name="prod_header_alt" required class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Product Icon</label>
                                <input type="file" name="product_icon" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Product Description</label>
                                <textarea name="product_desc" class="form-control"></textarea>
                            </div>
                            
                             <div class="col-md-6">
                                <label class="form-label">Meta Title</label>
                                <input type="text" id="meta_title" name="meta_title"  class="form-control">
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Product Icon Alt</label>
                                <input type="text" id="prod_icon_alt" name="prod_icon_alt" required class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="card mb-3 p-3">

                        <!-- Initial Table Details Block -->
                        <div class="how-works-container">
                            <div id="how_works_fields">
                                <div class="row g-3 how-works-row">
                                    <div class="col-md-6">
                                        <label class="form-label">Table Label</label>
                                        <input type="text" name="Table_label[]" required class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Table Description</label>
                                        <textarea id="Table_desc" name="Table_desc[]" class="form-control"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Table Image</label>
                                        <input type="file" name="Table_image[]" required class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Table Image Alt</label>
                                        <input type="text" id="prod_img_alt[]" name="prod_img_alt[]" required class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary add-work-more">Add More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase mt-4">Save</button>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">

<link rel="stylesheet" href="{{ asset('public/admin_public/dist/assets/plugin/multi-select/css/multi-select.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_public/dist/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_public/dist/assets/plugin/dropify/dist/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_public/dist/assets/plugin/datatables/responsive.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_public/dist/assets/plugin/datatables/dataTables.bootstrap5.min.css') }}">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="{{ asset('public/admin_public/dist/assets/plugin/multi-select/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('public/admin_public/dist/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('public/admin_public/dist/assets/bundles/dropify.bundle.js') }}"></script>
<script src="{{ asset('public/admin_public/dist/assets/bundles/dataTables.bundle.js') }}"></script>

<script>
    $(document).on('click', '.add-work-more', function() {
        var html = `
            <div class="row g-3 how-works-row mt-1">
                                    <div class="col-md-6">
                                        <label class="form-label">Table Label</label>
                                        <input type="text" name="Table_label[]" required class="form-control">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Table Description</label>
                                        <textarea id="Table_desc" name="Table_desc[]" class="form-control"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Table Image</label>
                                        <input type="file" name="Table_image[]" required class="form-control">
                                    </div>

                                     <div class="col-md-6">
                                        <label class="form-label">Table Image Alt</label>
                                        <input type="text" id="prod_img_alt[]" name="prod_img_alt[]" required class="form-control">
                                    </div>
             <div class="col-md-2">
            <button type="button" class="btn btn-danger remove-how-work">Remove</button>
            </div>

            </div>`;
        $('#how_works_fields').append(html);
        initializeSummernoteForDescriptions();
    });
    $(document).on('click', '.remove-how-work', function() {
        $(this).closest('.how-works-row').remove();
    });
</script>
@endpush