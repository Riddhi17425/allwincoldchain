@extends('admin.layouts.app')

@section('title', 'Update About')

@section('content')

<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Home Page</h3>
            </div>
        </div>
    </div> <!-- Row end -->
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('home.update',$data->id) }}">
            @csrf
            @method('PUT')
            <div class="col-xl-12 col-lg-8">
                <div class="card mb-3 p-3">
                    <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">Home Banner Information</h6>
                    </div>
                    <div class="how-works-container">
                        <div id="banner_fields">
                            @if(isset($data->banner_data))
                            @php
                            $banner_datas = json_decode($data->banner_data, true);
                            @endphp
                            @foreach($banner_datas as $index => $wtd)
                            <div class="row g-3 how-works-row mt-3">
                                <div class="col-md-6">
                                    <label class="form-label">Banner Label</label>
                                    <input type="text" name="banner_label[]" value="{{ $wtd['banner_label'] }}" required class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Banner Image</label>
                                    <input type="file" name="banner_image[]" value="{{$wtd['banner_img']}}" class="form-control">
                                    <div class="image-container d-flex align-items-center mb-2">
                                        <img src="{{ asset('public/home-page-images/' . $wtd['banner_img']) }}" alt="{{$wtd['banner_img']}}" width="100" class="me-2">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Banner Description</label>
                                    <textarea id="banner_desc" name="banner_desc[]" class="form-control">{{$wtd['banner_desc'] }}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Banner Image Alt</label>
                                    <input type="text" name="banner_alt[]" value="{{ $wtd['banner_alt'] }}" required class="form-control">
                                </div>

                                 <div class="col-md-2">
                                    <button type="button" class="btn btn-danger remove-how-work">Remove</button>
                                </div> -->
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6 mt-4">
                        <button type="button" class="btn btn-primary add-work-more">Add More</button>
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

<!-- Cropper CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">

<!--plugin css file -->
<link rel="stylesheet" href="{!! asset('public/admin_public/dist/assets/plugin/multi-select/css/multi-select.css') !!}">
<link rel="stylesheet"
    href="{!! asset('public/admin_public/dist/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.css') !!}">
<link rel="stylesheet" href="{!! asset('public/admin_public/dist/assets/plugin/dropify/dist/css/dropify.min.css') !!}">
<link rel="stylesheet"
    href="{!! asset('public/admin_public/dist/assets/plugin/datatables/responsive.dataTables.min.css') !!}">
<link rel="stylesheet"
    href="{!! asset('public/admin_public/dist/assets/plugin/datatables/dataTables.bootstrap5.min.css') !!}">
@endpush

@push('scripts')
<!-- Summernote JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<!-- Cropper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="{!! asset('public/admin_public/dist/assets/plugin/multi-select/js/jquery.multi-select.js') !!}"></script>
<script src="{!! asset('public/admin_public/dist/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.js') !!}">
</script>
<script src="{!! asset('public/admin_public/dist/assets/bundles/dropify.bundle.js') !!}"></script>
<script src="{!! asset('public/admin_public/dist/assets/bundles/dataTables.bundle.js') !!}"></script>

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
</script>
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
        $(document).on('click', '.add-work-more', function() {
            var html = `
            <div class="row g-3 how-works-row mt-3">
            <div class="col-md-6">
                <label class="form-label">Banner Label</label>
                <input type="text" name="banner_label[]" required class="form-control">
            </div>

            <div class="col-md-6">
                <label class="form-label">Banner Image</label>
                <input type="file" name="banner_image[]" class="form-control">
            </div>

            <div class="col-md-6">
                <label class="form-label">Banner Description</label>
                <textarea id="banner_desc" name="banner_desc[]" class="form-control"></textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label">Banner Image Alt</label>
                <input type="text" name="banner_alt[]" required class="form-control">
            </div>

             <div class="col-md-2">
            <button type="button" class="btn btn-danger remove-how-work">Remove</button>
            </div>

            </div>`;
            $('#banner_fields').append(html);
            initializeSummernoteForDescriptions();
        });
        $(document).on('click', '.remove-how-work', function() {
            $(this).closest('.how-works-row').remove();
        });

    });
</script>
@endpush