@extends('admin.layouts.app')

@section('title', 'Edit Industry')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Edit Service</h3>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('service.update', $data->id) }}">

            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}" />
            <div class="col-xl-12 col-lg-8">
                <div class="card mb-3 p-3">
                    <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">Service Information</h6>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-6">
                            <label class="form-label">Service Header</label>
                            <input type="text" id="Service_header" name="service_header" value="{{$data->service_header}}" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Service Header Image</label>
                            <input type="file" name="service_header_image" value="{{$data->service_header_image}}" class="form-control">

                            <div class="image-container d-flex align-items-center mb-2">
                                <img src="{{ asset('public/Service images/' . $data->service_header_image) }}" width="100" class="me-2">
                            </div>

                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Service Url</label>
                            <input type="text" id="ser_url" name="ser_url" value="{{$data->ser_url}}" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Header Image Alt</label>
                            <input type="text" id="header_img_alt" name="header_img_alt" value="{{$data->header_img_alt}}" required class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Service Banner Image</label>
                            <input type="file" name="service_banner_image"  class="form-control">
                            <div class="image-container d-flex align-items-center mb-2">
                                <img src="{{ asset('public/Service images/' . $data->service_banner_image) }}" width="100" class="me-2">
                            </div>

                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Service Banner Alt</label>
                            <input type="text" id="service_banner_alt" name="service_banner_alt" value="{{$data->service_banner_alt}}" required class="form-control">
                        </div>

                        &nbsp;
                        &nbsp;
                        <!-- How Work/Tab data element -->

                        <div class="col-md-6">
                            <label class="form-label">Work Title</label>
                            <input type="text" id="work_title" name="work_title" value="{{$data->work_title}}" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Work Description</label>
                            <input type="text" id="work_desc" name="work_desc" value="{{$data->work_desc}}" required class="form-control">
                        </div>

                        <div class="how-works-container">
                            <div id="how_works_fields">
                                @if(isset($data->work_tab_data))
                                @php
                                $work_tab_datas = json_decode($data->work_tab_data, true);
                                @endphp
                                @foreach($work_tab_datas as $index => $td)
                                <div class="row g-3 how-works-row">
                                    <div class="col-md-6">
                                        <label class="form-label">Tab Label</label>
                                        <input type="text" name="work_tab_label[]" value="{{ $td['work_tab_label'] }}" required class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Tab Image Description</label>
                                        <textarea id="work_tab_desc" name="work_tab_desc[]" class="form-control">{{$td['work_tab_desc'] }}</textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Tab Image</label>
                                        <input type="file" name="work_tab_image[]" value="{{$td['work_tab_images']}}" class="form-control">
                                        @if($td['work_tab_images'])
                                        @foreach(explode(',', $td['work_tab_images']) as $img)
                                        <div class="image-container_tab d-flex align-items-center mb-2">
                                            <img src="{{ asset('public/Service images/' . $img) }}" width="100" class="me-2">
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Tab Icon</label>
                                        <input type="file" name="work_tab_icon[]" class="form-control">
                                        @if($td['work_tab_icons'])
                                        @foreach(explode(',', $td['work_tab_icons']) as $img)
                                        <div class="image-container_tab d-flex align-items-center mb-2">
                                            <img src="{{ asset('public/Service images/' . $img) }}" width="100" class="me-2">
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Tab Image Alt</label>
                                        <input type="text" name="work_tab_img_alt[]" required value="{{ $td['work_tab_img_alt'] }}" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Tab Icon Alt</label>
                                        <input type="text" name="work_tab_icon_alt[]" value="{{ $td['work_tab_icon_alt'] }}" required class="form-control">
                                    </div>

                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger remove-work-row">Remove</button>
                                    </div>
                                </div>

                                @endforeach
                                @endif
                            </div>
                            <div class="col-md-6 mt-4">
                                <button type="button" class="btn btn-primary add-work-more">Add More</button>
                            </div>
                        </div>
                        &nbsp;
                        &nbsp;
                        <!-- Middle Image, Title & Description data element -->
                       
                        <div class="col-md-12 mt-4">
                            <label for="title_description" class="form-label">Title & Description</label>
                            <div class="wall-title-description-container">
                                <div id="wall_title_description_fields">
                                    @if(isset($data->wall_title_description))
                                    @php
                                    $wall_title_descriptions = json_decode($data->wall_title_description, true);
                                    @endphp
                                    @foreach($wall_title_descriptions as $index => $wtd)
                                    <div class="row g-3 wall-title-description-row">
                                        <div class="col-md-5">
                                            <input type="text" name="wall_title[]" value="{{ $wtd['wall_title'] }}" class="form-control">
                                        </div>

                                        <div class="col-md-5">
                                            <textarea name="wall_description[]" class="form-control"
                                                placeholder="Description">{{$wtd['wall_description'] }}</textarea>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger remove-wall_1">Remove</button>
                                        </div>

                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary add-wall-more">Add More</button>
                                </div>
                            </div>
                        </div>

                        &nbsp;
                        &nbsp;
                        <!-- Last UL data element -->
                        <div class="col-md-12">
                            <label for="title_description" class="form-label">Image & Description</label>
                            <div class="title-description-container">
                                <div class="row g-3 title-description-row">
                                    <div class="col-md-5">
                                        <input type="file" name="key_image" value="{{$data->key_image}}" class="form-control">
                                        <div class="image-container d-flex align-items-center mb-2">
                                            <img src="{{ asset('public/Service images/' . $data->key_image) }}" width="100" class="me-2">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <textarea name="key_description" class="form-control summernote"
                                            placeholder="Description">{{$data['key_description'] }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Image Alt</label>
                            <input type="text" name="key_image_alt" value="{{ $data['key_image_alt'] }}" required class="form-control">
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
    <div class="row g-3 how-works-row mt-1">
    <div class="col-md-6">
        <label class="form-label">Tab Label</label>
        <input type="text" name="work_tab_label[]" required class="form-control">
    </div>

<div class="col-md-6">
        <label class="form-label">Tab Image Description</label>
        <textarea id="work_tab_desc" name="work_tab_desc[]" class="form-control"></textarea>
    </div
    
    <div class="col-md-6">
                <label class="form-label">Tab Icon</label>
                <input type="file" name="work_tab_icon[]" class="form-control">
            </div>
            
    <div class="col-md-6">
        <label class="form-label">Tab Image</label>
        <input type="file" name="work_tab_image[]" required class="form-control">
    </div>

    
    
                                        <div class="col-md-6">
                                        <label class="form-label">Tab Image Alt</label>
                                        <input type="text" name="work_tab_img_alt[]" required class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Tab Icon Alt</label>
                                        <input type="text" name="work_tab_icon_alt[]" required class="form-control">
                                    </div>


     <div class="col-md-2">
    <button type="button" class="btn btn-danger remove-work-row">Remove</button>
    </div>

    </div>`;
            $('#how_works_fields').append(html);
            initializeSummernoteForDescriptions();
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

        $(document).on('click', '.add-wall-more', function() {
            var html = `
    <div class="row g-3 wall-row mt-1">
     <div class="col-md-5">
        <input type="text" name="wall_title[]" class="form-control">
     </div>

    <div class="col-md-5">
        <textarea name="wall_description[]" class="form-control" placeholder="Description"></textarea>
    </div>

    <div class="col-md-2">
     <button type="button" class="btn btn-danger remove-wall">Remove</button>
    </div>

    </div>`;
            $('#wall_title_description_fields').append(html);
            initializeSummernoteForDescriptions();
        });


        $(document).on('click', '.remove-wall', function() {
            $(this).closest('.wall-row').remove();
        });

        $(document).on('click', '.remove-wall_1', function() {
            $(this).closest('.wall-title-description-row').remove();
        });

    });
</script>
@endpush