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
    </div>

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

                        <div class="how-works-container">
                            <div id="how_works_fields">
                                <div class="row g-3 how-works-row">
                                    <div class="col-md-6">
                                        <label class="form-label">Table Label</label>
                                        <input type="text" name="Table_label[]" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Table Description</label>
                                        <textarea name="Table_desc[]" class="form-control summernote"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Table Image <small class="text-muted">(optional - leave blank for content-only section)</small></label>
                                        <input type="file" name="Table_image[]" class="form-control js-img-input" accept="image/*">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Table Image Alt</label>
                                        <input type="text" id="prod_img_alt[]" name="prod_img_alt[]" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">CTA Title</label>
                                        <input type="text" name="cta_title[]" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">CTA Banner Image <small class="text-muted">(optional)</small></label>
                                        <input type="file" name="cta_image[]" class="form-control js-img-input" accept="image/*">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">CTA Banner Image Alt</label>
                                        <input type="text" name="cta_image_alt[]" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">CTA Description</label>
                                        <textarea name="cta_description[]" class="form-control summernote"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">CTA Button Text</label>
                                        <input type="text" name="cta_btn_text[]" class="form-control" placeholder="Enquire Now / Request a Quote">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">CTA Button URL
                                            <small class="text-muted">(use <b>#contactPanel</b> to open the enquiry popup, or a page URL. Empty = no button)</small>
                                        </label>
                                        <input type="text" name="cta_btn_url[]" class="form-control" placeholder="#contactPanel or /contact-us or https://...">
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">Table (HTML) <small class="text-muted">(optional - paste the table HTML in code view)</small></label>
                                        <textarea name="table_html[]" class="form-control summernote"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary add-work-more">Add More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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

<style>
    .img-box { position: relative; display: inline-block; margin-top: 8px; }
    .img-box img { max-height: 100px; width: auto; border: 1px solid #ddd; border-radius: 6px; padding: 2px; background: #fff; }
    .img-remove-btn { position: absolute; top: -9px; right: -9px; width: 22px; height: 22px; border: 0; border-radius: 50%;
        background: #ff4d5e; color: #fff; font-size: 16px; line-height: 20px; padding: 0; cursor: pointer; box-shadow: 0 1px 4px rgba(0,0,0,.3); }
    .img-remove-btn:hover { background: #d62839; }
</style>
<script>
    $(document).ready(function() {
        initializeSummernoteForDescriptions();
    });

    function initializeSummernoteForDescriptions() {
        $('.summernote').each(function() {
            if (!$(this).next('.note-editor').length) {
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
            }
        });
    }

    $(document).on('click', '.add-work-more', function() {
        var html = `
            <div class="row g-3 how-works-row mt-1">
                                    <div class="col-md-6">
                                        <label class="form-label">Table Label</label>
                                        <input type="text" name="Table_label[]" class="form-control">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Table Description</label>
                                        <textarea name="Table_desc[]" class="form-control summernote"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Table Image <small class="text-muted">(optional)</small></label>
                                        <input type="file" name="Table_image[]" class="form-control js-img-input" accept="image/*">
                                    </div>

                                     <div class="col-md-6">
                                        <label class="form-label">Table Image Alt</label>
                                        <input type="text" id="prod_img_alt[]" name="prod_img_alt[]" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">CTA Title</label>
                                        <input type="text" name="cta_title[]" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">CTA Banner Image <small class="text-muted">(optional)</small></label>
                                        <input type="file" name="cta_image[]" class="form-control js-img-input" accept="image/*">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">CTA Banner Image Alt</label>
                                        <input type="text" name="cta_image_alt[]" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">CTA Description</label>
                                        <textarea name="cta_description[]" class="form-control summernote"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">CTA Button Text</label>
                                        <input type="text" name="cta_btn_text[]" class="form-control" placeholder="Enquire Now / Request a Quote">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">CTA Button URL
                                            <small class="text-muted">(use <b>#contactPanel</b> to open the enquiry popup, or a page URL. Empty = no button)</small>
                                        </label>
                                        <input type="text" name="cta_btn_url[]" class="form-control" placeholder="#contactPanel or /contact-us or https://...">
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">Table (HTML) <small class="text-muted">(optional - paste the table HTML in code view)</small></label>
                                        <textarea name="table_html[]" class="form-control summernote"></textarea>
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

    $(document).on('change', '.js-img-input', function () {
        var $in = $(this);
        $in.siblings('.js-new-preview').remove();
        if (this.files && this.files[0]) {
            var $box = $('<div class="img-box js-new-preview"><img alt=""><button type="button" class="img-remove-btn js-clear-new" title="Remove">&times;</button></div>');
            $box.find('img').attr('src', URL.createObjectURL(this.files[0]));
            $in.after($box);
        }
    });
    $(document).on('click', '.js-clear-new', function () {
        var $box = $(this).closest('.js-new-preview');
        $box.siblings('.js-img-input').val('');
        $box.remove();
    });
</script>
@endpush
