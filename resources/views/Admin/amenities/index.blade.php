@extends('admin_layout/index')
@section('content')

<div class="card card-bordered card-preview">
    <div class="card-inner">
        <div class="preview-block">
            <span class="preview-title-lg overline-title">Add Amenities</span>
            <div class="row gy-4">
                <div class="col-sm-6">
                    <form action=""  id="form-data">
                        <div class="form-group">
                            <label class="form-label" for="amenitiesName">Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="amenitiesName" id="amenitiesName"
                                    placeholder="Amenities Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="amenitiesSlug">Slug</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="amenitiesSlug" id="amenitiesSlug"
                                    placeholder="Amenities Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-primary addAmenities">Add</button>
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
            <h4 class="nk-block-title">AMENITIES LIST</h4>
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
                    <th class="tb-tnx-action">
                        <span>Action</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1; ?>
                @foreach ($amenities as $amenitie )
                <tr class="tb-tnx-item">
                    <td class="tb-tnx-id">
                        <a href="#"><span>{{ $a++ ?? ''}}</span></a>
                    </td>
                    <td class="tb-tnx-info">
                        <div class="tb-tnx-desc">
                            <input type="text" data-id="{{ $amenitie->id ?? '' }}" class="titleName name{{ $amenitie->id ?? '' }}" value="{{ $amenitie->name ?? '' }}"  disabled style="border: none; background: transparent;" />
                        </div>
                       
                    </td>
                    <td class="tb-tnx-info">
                        <div class="tb-tnx-desc">
                            <input type="text" data-id="{{ $amenitie->id ?? '' }}" class="titleSlug slug{{ $amenitie->id ?? '' }}" value="{{ $amenitie->slug ?? '' }}"  disabled style="border: none; background: transparent;" />
                        </div>
                       
                    </td>
                    <td class="tb-tnx-action">
                        <div class="dropdown drop{{ $amenitie->id ?? '' }}">
                            <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em
                                    class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                <ul class="link-list-plain">
                                    <li><a href="#" class="edit-amenities" data-id="{{ $amenitie->id ?? '' }}">Edit</a></li>
                                    <li><a href="#" class="remove-amenities" data-id="{{ $amenitie->id ?? '' }}">Remove</a></li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <button class="updateAmenities btn btn-success d-none updateAmenitie{{ $amenitie->id ?? '' }}" data-id="{{ $amenitie->id ?? '' }}">Update</button>
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
        $('#amenitiesName').on('keyup',function(){
            let name = $(this).val().toLowerCase();
            let slug = name.replace(/ /g, "-");
           $('#amenitiesSlug').val(slug);
        });
        $("body").delegate(".titleName", "keyup", function(e) {
        // $('.titleName').on('keyup', function (){
            // console.log($(this).attr('data-id'));
            var id = $(this).attr('data-id');
            let name = $(this).val().toLowerCase();
            let slug = name.replace(/ /g, "-");
            $('.slug'+id).val(slug);
        })
    });
</script>
<script>
    $(document).ready(function() {
    $("body").delegate(".addAmenities", "click", function(e) {
        var amenitiesName = $('#amenitiesName').val();
        var amenitiesSlug = $('#amenitiesSlug').val();
        if (amenitiesName === '' || amenitiesSlug === '') {
            NioApp.Toast('Fields cannot be null', 'info', {position: 'top-right'});
            return false;
        }
        $.ajax({
            method: 'POST',
            url: '{{ url('admin-dashboard/amenities/amenities-add') }}',
            dataType: 'json',
            data: {
                    slug : amenitiesSlug,
                    name : amenitiesName,
                    _token: '{{csrf_token()}}'
                },
            success: function(response) {
                // console.log(response);
                $('#amenitiesName').val('');
                $('#amenitiesSlug').val('');
                NioApp.Toast(response, 'info', {position: 'top-right'});
                $("#table").load(location.href + " #table");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                var errors = jqXHR.responseJSON.errors;
                for (var fieldName in errors) {
                    if (errors.hasOwnProperty(fieldName)) {
                        var errorMessages = errors[fieldName];

                        errorMessages.forEach(function(errorMessage) {
                            console.log(errorMessage);
                            NioApp.Toast(errorMessage, 'error', {
                                position: 'top-right'
                            });
                        });
                    }
                }
            }
        });
    });
});
</script>
<script>
    $(document).ready(function() {
        $("body").delegate(".remove-amenities", "click", function (e) {
            e.preventDefault();
            var removeId = $(this).attr('data-id');
            $.ajax({
                method: 'POST',
                url: '{{ url('admin-dashboard/amenities/amenities-remove') }}',
                dataType: 'json',
                data: {
                        removeId : removeId,
                        _token: '{{csrf_token()}}'
                    },
                success: function(response) {
                    console.log(response);
                    // $('#amenitiesName').val('');
                    NioApp.Toast(response, 'info', {position: 'top-right'});
                    $("#table").load(location.href + " #table");
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("body").delegate(".edit-amenities", "click", function (e) {
            e.preventDefault();
            var editId = $(this).attr('data-id');
            $(".name"+editId).removeAttr('disabled').focus(); 
            $(".slug"+editId).removeAttr('disabled'); 
            $('.drop'+editId).addClass('d-none');
            $('.updateAmenitie'+editId).removeClass('d-none');
            // console.log(editId);
        });
        $("body").delegate(".updateAmenities", "click", function (e) {
            e.preventDefault();
            var editId = $(this).attr('data-id');
            var newName = $('.name'+editId).val();
            var slug = $('.slug'+editId).val();
            if (newName === '') {
                NioApp.Toast('Amenities name field cannot be null', 'info', {position: 'top-right'});
                return false;
            }
            $.ajax({
                method: 'POST',
                url: '{{ url('admin-dashboard/amenities/amenities-update') }}',
                dataType: 'json',
                data: {
                    editId : editId,
                    name : newName,
                    slug : slug,
                    _token: '{{csrf_token()}}'
                    },
                success: function(response) {
                    console.log(response);
                    // $('#amenitiesName').val('');
                    NioApp.Toast(response, 'info', {position: 'top-right'});
                    $("#table").load(location.href + " #table");
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    var errors = jqXHR.responseJSON.errors;

                    Object.entries(errors).forEach(([fieldName, errorMessages]) => {
                        errorMessages.forEach(errorMessage => {
                        console.log(errorMessage);
                        NioApp.Toast(errorMessage, 'error', { position: 'top-right' });
                        });
                    });
                    }

            });
        });
    });
</script>
@endsection