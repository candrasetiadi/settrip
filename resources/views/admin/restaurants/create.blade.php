@extends('layouts.default-login')

@section('content')
<main class="main">
	
    @include('layouts/breadcrumb')

    <div class="container-fluid">
    	<div class="animated fadeIn">
    		<div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-edit"></i>Add New {{ $title }}
                        </div>
                        <div class="card-block">
                            <form class="form-horizontal" method="POST" action="{{ url('admin/restaurant') }}">
                            	{{ csrf_field() }}
	                            
                                <div class="form-group row">
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="name">Title</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="name" class="form-control" type="text" name="name">
	                                           <!--  <span class="input-group-addon">.00</span> -->
	                                        </div>
	                                        <!-- <span class="help-block">Here's more help text</span> -->
	                                    </div>
                                	</div>
                                	<div class="col-md-6">
	                                	<label class="form-control-label" for="email">Email</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="email" class="form-control" type="email" name="email">
	                                        </div>
	                                    </div>
	                                </div>	                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="id_resto_category">Category</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select id="id_resto_category" name="id_resto_category" class="form-control" placeholder="Please Select">
                                                    <option value="0">&nbsp;</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="address">Address</label>
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <!-- <span class="input-group-addon">$</span> -->
                                            <textarea id="address" name="address" rows="3" class="form-control" placeholder=""></textarea>
                                            <!-- <span class="input-group-addon">.00</span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="description">Description</label>
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <!-- <span class="input-group-addon">$</span> -->
                                            <textarea id="description" name="description" rows="3" class="form-control" placeholder=""></textarea>
                                            <!-- <span class="input-group-addon">.00</span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="id_province">Provinsi</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <select id="id_province" name="id_province" class="form-control" placeholder="Please Select">
				                                    <option value="0">&nbsp;</option>
                                                    @foreach($provinces as $province)
				                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                    @endforeach
				                                </select>
	                                        </div>
	                                    </div>
                                	</div>
	                                <div class="col-md-6">
	                                	<label class="form-control-label" for="id_regencies">Regencies</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <select id="id_regencies" name="id_regencies" class="form-control" placeholder="Please Select">
				                                    <option value="0">&nbsp;</option>
				                                    <!-- @foreach($regencies as $regency)
                                                        <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                                                    @endforeach -->
				                                </select>
	                                        </div>
	                                    </div>
	                                </div>
                                </div>
                                <div class="form-group row">
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="phone_1">Phone 1</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="phone_1" class="form-control" size="16" type="text" name="phone_1">
	                                        </div>
	                                    </div>
                                	</div>
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="phone_2">Phone 2</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="phone_2" class="form-control" size="16" type="text" name="phone_2">
	                                        </div>
	                                    </div>
                                	</div>                          
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="open_hour">Open Hour</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="open_hour" class="form-control timepickers" type="text" name="open_hour">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="close_hour">Close Hour</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="close_hour" class="form-control timepickers" type="text" name="close_hour">
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="rating">Rating</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="rating" class="form-control" type="text" name="rating">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="location_coordinate">Location Coordinate</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="location_coordinate" class="form-control" type="text" name="location_coordinate">
                                            </div>
                                        </div>
                                    </div>   
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="maximum_person">Maximum Person</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="maximum_person" class="form-control" type="number" name="maximum_person">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="tags">Tags</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select class="form-control multiple-select" name="tags[]" multiple="multiple">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label class="form-control-label" for="images">Images</label>
                                    <div class="controls">
                                        <div class="input-group">
                                            <input id="images" class="form-control" type="file" name="images">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <a href="{{ route('restaurant.index') }}"><button type="button" class="btn btn-default">Cancel</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--/.col-->
            </div>
    	</div>
    </div>
</main>

@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    
<script type="text/javascript">
    $(document).ready(function() {

        $(document).on('change', '#id_province', function(e){
            e.preventDefault()

            var _this = $(this).val()

            $.ajax({
                url: "{{URL::to('admin/regencies')}}/"+ _this,
                type: 'GET',
                data: {
                    _method: 'GET',
                    id_regencies : _this,
                    _token:     '{{ csrf_token() }}'
                },
                success: function(response){

                    $("#id_regencies").empty().trigger('change')

                    $.each(response, function(idx, val){

                        $("#id_regencies").append('<option value=' + val.id + '>' + val.name + '</option>')
                        $("#id_regencies").select2()
                    })
                }
            })
        })
    })
</script>
