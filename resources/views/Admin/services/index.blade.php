@extends('admin_layout/index')
@section('content')

<div class="card card-bordered card-preview">
    <div class="card-inner">
        <div class="preview-block">
            <span class="preview-title-lg overline-title">Add Services</span>
            <div class="row gy-4">
                <div class="col-sm-6">
                    <form action=""  id="form-data">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <label class="form-label" for="name">Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Service Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="slug">Slug</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="slug" id="slug"
                                    placeholder="Service Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="fav_icon">fav icon</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="fav_icon" id="fav_icon"
                                    placeholder="Fav icon">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-primary add" id="add"><span id="button_value">Add</span></button>
                            <button type="button" class="btn btn-primary  add-new d-none" id="add_new"><span >Add New</span></button>
                            
                        
                        </div>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="nk-block nk-block-lg my-4">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">SERVICES LIST</h4>
        </div>
    </div>
    <div class="card card-bordered card-preview">
        <table class="table table-tranx" id="table">
            <thead>
                <tr class="tb-tnx-head">
                    <th class="tb-tnx-id"><span class="">#</span></th>
                    <th class="tb-tnx-info">
                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                            <span>Amenities Name</span>
                        </span>
                    </th>
                    <th class="tb-tnx-info">
                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                            <span>Amenities Slug</span>
                        </span>
                    </th>
                    <th class="tb-tnx-info">
                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                            <span>fav icon</span>
                        </span>
                    </th>
                    <th class="tb-tnx-action">
                        <span>Action</span>
                    </th>
                </tr>
            </thead>
            <tbody>     <?php $a = 1; ?>
                @foreach($services as $service)
                <tr class="tb-tnx-item">
                    <td class="tb-tnx-id">
                        <a href="#"><span>{{ $a++ ?? ''}}</span></a>
                    </td>
                    <td class="tb-tnx-info">
                        <div class="tb-tnx-desc">
                            <input type="text" data-id="{{ $service->id }}" class="titleName name{{ $service->id ?? '' }}" value="{{ $service->name ?? ''}}"  disabled style="border: none; background: transparent;" />
                        </div>
                       
                    </td>
                    <td class="tb-tnx-info">
                        <div class="tb-tnx-desc">
                            <input type="text"  class="titleSlug slug{{ $service->id ?? '' }}" value="{{ $service->slug }}"  disabled style="border: none; background: transparent;" />
                        </div>
                       
                    </td>
                    <td class="tb-tnx-info">
                        <div class="tb-tnx-desc">
                           {{ $service->fav_icon ?? '' }} 
                        </div>
                       
                    </td>
                    <td class="tb-tnx-action">
                        <div class="dropdown drop>
                            <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em
                                    class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                <ul class="link-list-plain">
                                    <li><a href="#" data-id ="{{$service->id ?? ''  }}"data-name = "{{ $service->name ?? '' }}" data-slug ="{{ $service->slug ?? '' }}" fav-icon = "{{ $service->fav_icon ?? '' }}" class="edit-services" >Edit</a></li>
                                    <li><a href="#" data-id ="{{$service->id ?? ''  }}"  class="remove-services" >Remove</a></li>
                                </ul>
                            </div>
                        </div>
                        
                    </td>
                </tr> 
                @endforeach  
            </tbody>
        </table>
    </div><!-- .card-preview -->
</div>
<script>

$(document).ready(function(){
        $('#name').on('keyup',function(){
            let name = $(this).val().toLowerCase();
            let slug = name.replace(/ /g, "-");
           $('#slug').val(slug);
        });
    });
    
    $("body").delegate(".add", "click", function(e) {
        var name = $('#name').val();
        var slug = $('#slug').val();
        var id = $('#id').val();
        var fav = $('#fav_icon').val();
        // console.log(name);
        if (name === '' || slug === '') {
            NioApp.Toast('Fields cannot be null', 'info', {position: 'top-right'});
            return false;
        }
        $.ajax({
            method: 'POST',
            url: '{{ route('serviceadd') }}',
            dataType: 'json',
            data: {
                    name : name,
                    slug : slug,
                    id : id,
                    fav_icon : fav,
                    _token: '{{csrf_token()}}'
                },
            success: function(response) {
                    $('#id').val('');
                    $('#name').val('');
                    $('#slug').val('');
                    $('#fav_icon').val('');
                    $('.add-new').addClass('d-none');
                    $('#button_value').html('Add');
                NioApp.Toast(response, 'info', {position: 'top-right'});
                $("#table").load(location.href + " #table");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                var errors = jqXHR.responseJSON.errors;
                for (var fieldName in errors) {
                    if (errors.hasOwnProperty(fieldName)) {
                        var errorMessages = errors[fieldName];

                        errorMessages.forEach(function(errorMessage) {
                            // console.log(errorMessage);
                            NioApp.Toast(errorMessage, 'error', {
                                position: 'top-right'
                            });
                        });
                    }
                }
            }
        });
   
    });
    $(document).ready(function() {
    $("body").delegate(".edit-services", "click", function (e) {
            id = $(this).attr('data-id');
            name = $(this).attr('data-name');
            slug = $(this).attr('data-slug');
            icon = $(this).attr('fav-icon');

            $('#id').val(id);
            $('#name').val(name);
            $('#slug').val(slug);
            $('#fav_icon').val(icon);

          $('#button_value').html('update');
          $('#add_new').removeClass('d-none');
          window.scrollTo(0, 0);
            
        });
        $("body").delegate(".add-new", "click", function (e) {
            $('#id').val('');
            $('#name').val('');
            $('#slug').val('');
            $('#fav_icon').val('');
            $(this).addClass('d-none');
            $('#button_value').html('Add');
            
            
        });
        $("body").delegate(".remove-services", "click", function (e) {
            id = $(this).attr('data-id');
            $.ajax({
            method: 'POST',
            url: '{{ route('servicedelete') }}',
            dataType: 'json',
            data: {
                    id : id,
                    _token: '{{csrf_token()}}'
                },
                success: function(response) {
                    NioApp.Toast(response, 'info', {position: 'top-right'});
                    $("#table").load(location.href + " #table");
                }


        });
    });
});
</script>
@endsection