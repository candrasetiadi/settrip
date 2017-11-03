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
                            <form class="form-horizontal" method="POST" action="{{ url('admin/destination') }}">
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
                                		<label class="form-control-label" for="category">Category</label>
	                                    <div class="controls">
	                                        <div class="input-group">
                                                <select class="form-control multiple-select" name="category[]" multiple="multiple">
                                                    @foreach($destinationCategories as $destinationCategory)
                                                        <option value="{{ $destinationCategory->id }}">{{ $destinationCategory->name }}</option>
                                                    @endforeach
                                                </select>

	                                        </div>
	                                    </div>
                                	</div>
                                	<div class="col-md-6">
                                        <label class="form-control-label" for="type">Type</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select class="form-control multiple-select" name="type[]" multiple="multiple">
                                                    @foreach($destinationTypes as $destinationType)
                                                        <option value="{{ $destinationType->id }}">{{ $destinationType->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>                                 
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="public_facility">Public Facility</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <!-- <input id="public_facility" class="form-control" type="text" name="public_facility"> -->
                                                <select class="form-control multiple-select" name="public_facility[]" multiple="multiple">
                                                    @foreach($destinationFacilities as $destinationFacility)
                                                        <option value="{{ $destinationFacility->id }}">{{ $destinationFacility->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="facility">Private Facility</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <!-- <input id="facility" class="form-control" type="text" name="facility"> -->
                                                <select class="form-control multiple-select" name="facility[]" multiple="multiple">
                                                    @foreach($destinationFacilities as $destinationFacility)
                                                        <option value="{{ $destinationFacility->id }}">{{ $destinationFacility->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>     
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="activity">Activity</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <!-- <input id="activity" class="form-control" type="text" name="activity"> -->
                                                <select class="form-control multiple-select" name="activity[]" multiple="multiple">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="equipment">Equipment</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <!-- <input id="equipment" class="form-control" type="text" name="equipment"> -->
                                                <select class="form-control multiple-select" name="equipment[]" multiple="multiple">
                                                    @foreach($destinationEquipments as $destinationEquipment)
                                                        <option value="{{ $destinationEquipment->id }}">{{ $destinationEquipment->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="minimum_time">Minimum Time (Hour)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="minimum_time" class="form-control" type="number" name="minimum_time">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="time_for_come">Time For Come (Month)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="time_for_come" class="form-control monthpickers" type="text" name="time_for_come">
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
                                                <input id="rating" class="form-control" type="text" name="rating" max="5">
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
                                <div class="form-group">
                                    <label class="form-control-label" for="remark">Remark</label>
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <!-- <span class="input-group-addon">$</span> -->
                                            <textarea id="remark" name="remark" rows="3" class="form-control" placeholder=""></textarea>
                                            <!-- <span class="input-group-addon">.00</span> -->
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h4>Ticket / Local</h4>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_local_agent_rate">Agent Rate (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_local_agent_rate" class="form-control" type="number" name="ticket_local_agent_rate">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_local_publish_rate">Publish Rate (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_local_publish_rate" class="form-control" type="number" name="ticket_local_publish_rate">
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_local_fee">Fee (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_local_fee" class="form-control" type="number" name="ticket_local_fee">
                                            </div>
                                        </div>
                                    </div>     
                                </div>
                                <hr>
                                <h4>Ticket / Foreign</h4>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_foreign_agent_rate">Agent Rate (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_foreign_agent_rate" class="form-control" type="number" name="ticket_foreign_agent_rate">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_foreign_publish_rate">Publish Rate (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_foreign_publish_rate" class="form-control" type="number" name="ticket_foreign_publish_rate">
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_foreign_fee">Fee (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_foreign_fee" class="form-control" type="number" name="ticket_foreign_fee">
                                            </div>
                                        </div>
                                    </div>     
                                </div>
                                <hr>
                                <h4>Ticket / Student</h4>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_student_agent_rate">Agent Rate (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_student_agent_rate" class="form-control" type="number" name="ticket_student_agent_rate">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_student_publish_rate">Publish Rate (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_student_publish_rate" class="form-control" type="number" name="ticket_student_publish_rate">
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_student_fee">Fee (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_student_fee" class="form-control" type="number" name="ticket_student_fee">
                                            </div>
                                        </div>
                                    </div>     
                                </div>
                                <hr>
                                <h4>Ticket / Car</h4>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_car_agent_rate">Agent Rate (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_car_agent_rate" class="form-control" type="number" name="ticket_car_agent_rate">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_car_publish_rate">Publish Rate (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_car_publish_rate" class="form-control" type="number" name="ticket_car_publish_rate">
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_car_fee">Fee (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_car_fee" class="form-control" type="number" name="ticket_car_fee">
                                            </div>
                                        </div>
                                    </div>     
                                </div>
                                <hr>
                                <h4>Ticket / Bike</h4>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_bike_agent_rate">Agent Rate (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_bike_agent_rate" class="form-control" type="number" name="ticket_bike_agent_rate">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_bike_publish_rate">Publish Rate (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_bike_publish_rate" class="form-control" type="number" name="ticket_bike_publish_rate">
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_bike_fee">Fee (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_bike_fee" class="form-control" type="number" name="ticket_bike_fee">
                                            </div>
                                        </div>
                                    </div>     
                                </div>
                                <hr>
                                <h4>Ticket / Bus</h4>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_bus_agent_rate">Agent Rate (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_bus_agent_rate" class="form-control" type="number" name="ticket_bus_agent_rate">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_bus_publish_rate">Publish Rate (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_bus_publish_rate" class="form-control" type="number" name="ticket_bus_publish_rate">
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_bus_fee">Fee (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_bus_fee" class="form-control" type="number" name="ticket_bus_fee">
                                            </div>
                                        </div>
                                    </div>     
                                </div>
                                <hr>
                                <h4>Ticket / Group</h4>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_group_agent_rate">Agent Rate (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_group_agent_rate" class="form-control" type="number" name="ticket_group_agent_rate">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_group_publish_rate">Publish Rate (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_group_publish_rate" class="form-control" type="number" name="ticket_group_publish_rate">
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_group_fee">Fee (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_group_fee" class="form-control" type="number" name="ticket_group_fee">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="ticket_group_capacity">Group Capacity (Max)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="ticket_group_capacity" class="form-control" type="number" name="ticket_group_capacity">
                                            </div>
                                        </div>
                                    </div>     
                                </div>
                                <hr>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <a href="{{ route('destination.index') }}"><button type="button" class="btn btn-default">Cancel</button></a>
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
