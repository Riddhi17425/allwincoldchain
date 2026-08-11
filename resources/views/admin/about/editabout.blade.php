@extends('admin.layouts.app')

@section('title', 'Update About')

@section('content')

<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">About us</h3>
            </div>
        </div>
    </div> <!-- Row end -->

    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('about.update',$data->id) }}">
        @csrf
        @method('PUT')
            <div class="col-xl-12 col-lg-8">
                <div class="card mb-3 p-3">
                    <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">About Information</h6>
                    </div>
                    <div class="row g-3 align-items-center">

                        <!-- Basic data element -->
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" id="title" name="title" required value="{{$data->title}}" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control"
                                placeholder="Description">{{ $data->description}}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Banner Image</label>
                            <input type="file" name="bg_image" class="form-control">
                            <div class="image-container d-flex align-items-center mb-2">
                                <img src="{{ asset('public/About-us images/' . $data->bg_image) }}" alt="{{ $data->bg_image}}" width="100" class="me-2">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">About Image</label>
                            <input type="file" name="about_image" class="form-control">
                            <div class="image-container d-flex align-items-center mb-2">
                                <img src="{{ asset('public/About-us images/' . $data->about_image) }}" alt="{{ $data->about_image}}" width="100" class="me-2">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Banner Image Alt</label>
                            <input type="text" id="banner_img_alt" name="banner_img_alt" required value="{{$data->banner_img_alt}}" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">About Image Alt</label>
                            <input type="text" id="about_img_alt" name="about_img_alt" required value="{{$data->about_img_alt}}" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Key Description</label>
                            <textarea name="key_description" class="form-control summernote"
                                placeholder="Description">{{ $data->key_description}}</textarea>
                        </div>



                        <!-- <div class="col-md-6">
                            <label class="form-label">Industry Url</label>
                            <input type="text" id="ind_url" name="ind_url" required class="form-control">
                        </div> -->

                        <!-- Wall data element -->
                        <div class="col-md-6">
                        </div>
                        <h6 class="mb-0">Wall Data</h6>

                        <div class="col-md-6">
                            <label class="form-label">Wall Title</label>
                            <input type="text" id="wall_title" name="wall_title" value="{{ $data->wall_title}}" required class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Wall Description</label>
                            <textarea name="wall_desc" class="form-control">{{ $data->wall_desc}}</textarea>
                        </div>

                     
                        <!-- Middle Image, Title & Description data element -->
                        <h6 class="mb-0 fw-bold">Mission Data</h6>

                        <div class="col-md-6">
                            <label class="form-label">Mission Title</label>
                            <input type="text" id="mission_title" name="mission_title" value="{{ $data->mission_title}}" required class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Mission Description</label>
                            <textarea name="mission_desc" class="form-control">{{ $data->mission_desc}}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Mission Image</label>
                            <input type="file" name="missson_image" class="form-control">
                            <div class="image-container d-flex align-items-center mb-2">
                                <img src="{{ asset('public/About-us images/' . $data->missson_image) }}" alt="{{ $data->missson_image}}" width="100" class="me-2">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Mission Image Alt</label>
                            <input type="text" id="mission_img_alt" name="mission_img_alt" value="{{ $data->mission_img_alt}}" required class="form-control">
                        </div>

                        <div class="col-md-6"></div>
                       
                        <h6 class="mb-0 fw-bold">Vision Data</h6>
                        
                        <div class="col-md-6">
                            <label class="form-label">Vision Title</label>
                            <input type="text" id="vision_title" name="vision_title" value="{{ $data->vision_title}}" required class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Vision Description</label>
                            <textarea name="vision_desc" class="form-control">{{ $data->vision_desc}}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Vision Image</label>
                            <input type="file" name="vision_image" class="form-control">
                            <div class="image-container d-flex align-items-center mb-2">
                                <img src="{{ asset('public/About-us images/' . $data->vision_image) }}" alt="{{ $data->bg_image}}" width="100" class="me-2">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Vision Image Alt</label>
                            <input type="text" id="vision_img_alt" name="vision_img_alt" value="{{ $data->vision_img_alt}}" required class="form-control">
                        </div>

                        <div class="col-md-6"></div>

                        <h6 class="mb-0 fw-bold">Goal Data</h6>

                        <div class="col-md-6">
                            <label class="form-label">Goal Title</label>
                            <input type="text" id="goal_title" name="goal_title" value="{{ $data->goal_title}}" required class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Goal Description</label>
                            <textarea name="goal_desc" class="form-control">{{ $data->goal_desc}}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Goal Image</label>
                            <input type="file" name="goal_image" class="form-control">
                            <div class="image-container d-flex align-items-center mb-2">
                                <img src="{{ asset('public/About-us images/' . $data->goal_image) }}" alt="{{ $data->goal_image}}" width="100" class="me-2">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Goal Image Alt</label>
                            <input type="text" id="goal_img_alt" name="goal_img_alt" value="{{ $data->goal_img_alt}}" required class="form-control">
                        </div>

                        <div class="col-md-6"></div>
                        <h6 class="mb-0 fw-bold">Who Are We
                        </h6>
                        
                        <!-- Last UL data element -->
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" id="who_title" name="who_title" value="{{ $data->who_title}}" required class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Description</label>
                            <textarea name="who_desc" class="form-control">{{ $data->who_desc}}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">First Image</label>
                            <input type="file" name="who_image_f" class="form-control">
                            <div class="image-container d-flex align-items-center mb-2">
                                <img src="{{ asset('public/About-us images/' . $data->who_image_f) }}" alt="{{ $data->who_image_f}}" width="100" class="me-2">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Second Image</label>
                            <input type="file" name="who_image_s" class="form-control">
                            <div class="image-container d-flex align-items-center mb-2">
                                <img src="{{ asset('public/About-us images/' . $data->who_image_s) }}" alt="{{ $data->who_image_s}}" width="100" class="me-2">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">First Image Alt</label>
                            <input type="text" id="first_img_alt" name="first_img_alt" value="{{ $data->first_img_alt}}" required class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Second Image Alt</label>
                            <input type="text" id="second_img_alt" name="second_img_alt" value="{{ $data->second_img_alt}}" required class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Points</label>
                            <textarea name="who_points" class="form-control summernote"
                                placeholder="Enter Points">{{ $data->who_points}}</textarea>
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
@endpush