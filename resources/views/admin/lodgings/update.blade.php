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
                            <form class="form-horizontal" method="POST" action="{{ route('lodging.update', $lodging->id) }}">
                                {{method_field("PATCH")}}
                            	{{ csrf_field() }}
	                            
                                <div class="form-group row">
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="name">Title</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="name" class="form-control" type="text" name="name" value="{{ $lodging->name }}">
	                                           <!--  <span class="input-group-addon">.00</span> -->
	                                        </div>
	                                        <!-- <span class="help-block">Here's more help text</span> -->
	                                    </div>
                                	</div>
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="id_type">Type</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select id="id_type" name="id_type" class="form-control" placeholder="Please Select">
                                                    <option value="0">&nbsp;</option>
                                                    @foreach($types as $type)
                                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
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
                                            <textarea id="address" name="address" rows="3" class="form-control" placeholder="">{{ $lodging->address }}</textarea>
                                            <!-- <span class="input-group-addon">.00</span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="description">Description</label>
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <!-- <span class="input-group-addon">$</span> -->
                                            <textarea id="description" name="description" rows="3" class="form-control" placeholder="">{{ $lodging->description }}</textarea>
                                            <!-- <span class="input-group-addon">.00</span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="id_province">Provinsi</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <select id="id_province" name="id_province" class="form-control">
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
	                                            <select id="id_regencies" name="id_regencies" class="form-control">
				                                    <option value="0">&nbsp;</option>
				                                    @foreach($regencies as $regency)
                                                        <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                                                    @endforeach
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
	                                            <input id="phone_1" class="form-control" size="16" type="text" name="phone_1" value="{{ $lodging->phone_1 }}">
	                                        </div>
	                                    </div>
                                	</div>
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="phone_2">Phone 2</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="phone_2" class="form-control" size="16" type="text" name="phone_2" value="{{ $lodging->phone_2 }}">
	                                        </div>
	                                    </div>
                                	</div>                                    
                                </div>
                                
                                <div class="form-group row">
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="number_of_rooms">Number Of Rooms</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="number_of_rooms" class="form-control" type="number" name="number_of_rooms" value="{{ $lodging->number_of_rooms }}">
	                                        </div>
	                                    </div>
                                	</div>
                                	<div class="col-md-6">
                                        <label class="form-control-label" for="location_coordinate">Location Coordinate</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="location_coordinate" class="form-control" type="text" name="location_coordinate" value="{{ $lodging->location_coordinate }}">
                                            </div>
                                        </div>
                                    </div>                                 
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="room_facility">Room Facility</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select id="room_facility" name="room_facility[]" class="form-control multiple-select" multiple="multiple">
                                                    @foreach($facilities as $facility)
                                                        <option value="{{ $facility->id }}">{{ $facility->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="public_facility">Public Facility</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select id="public_facility" name="public_facility[]" class="form-control multiple-select" multiple="multiple">
                                                    @foreach($facilities as $facility)
                                                        <option value="{{ $facility->id }}">{{ $facility->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="controls">
                                            <div class="input-group">
                                                <div class="checkbox">
                                                    <label for="is_gathering">
                                                        <input id="is_gathering" type="checkbox" name="is_gathering" value="is_gathering"> Is Gathering
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="rating">Rating</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="rating" class="form-control" type="number" name="rating" max="5" value="{{ $lodging->rating }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <hr>
                                <label class="form-control-label" for="address"><h5>Detail</h5></label>
                                <div>
                                    <button type="button" class="btn btn-warning addDetail">+</button>
                                </div>

                                <fieldset class="form-group" style="background-color: #eceeef;">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                        <label class="form-control-label" for="room_type">Room Type</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select id="room_type" name="room_type" class="form-control">
                                                    <option value="0">&nbsp;</option>
                                                    <option value="hotel">Hotel</option>
                                                    <option value="motel">Motel</option>
                                                    <option value="guesthouse">Guest House</option>
                                                    <option value="apartment">Apartment</option>
                                                    <option value="bungalow">Bungalow</option>
                                                    <option value="mess">Mess</option>
                                                    <option value="homestay">Homestay</option>
                                                    <option value="hostel">Hostel</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                            <label class="form-control-label" for="price">Price</label>
                                            <div class="controls">
                                                <div class="input-group">
                                                    <input id="price" class="form-control" type="text" name="price[]">
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </fieldset>
                                <hr> -->
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <a href="{{ route('lodging.index') }}"><button type="button" class="btn btn-default">Cancel</button></a>
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
        
        $(document).on("click", ".addDetail", function(e) {
            e.preventDefault()
            $('fieldset').append(
               ' <div class="form-group row">' +
                    '<div class="col-md-6">' +
                        '<label class="form-control-label" for="room_type">Room Type</label>' +
                        '<div class="controls">' +
                            '<div class="input-group">' +
                                '<input id="room_type" class="form-control" type="text" name="room_type[]">' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="col-md-6">' +
                        '<label class="form-control-label" for="price">Price</label>' +
                        '<div class="controls">' +
                            '<div class="input-group">' +
                                '<input id="price" class="form-control" type="text" name="price[]">' +
                            '</div>' +
                        '</div>' +
                    '</div>' + 
                '</div>' 
            )
        })
        
    })
</script>
