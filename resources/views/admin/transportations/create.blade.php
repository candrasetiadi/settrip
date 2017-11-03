@extends('layouts.default-login')

@section('content')
<main class="main">
	
    @include('layouts.breadcrumb')

    <div class="container-fluid">
    	<div class="animated fadeIn">
    		<div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-edit"></i>Add New {{ $title }}
                        </div>
                        <div class="card-block">
                            <form class="form-horizontal" method="POST" action="{{ url('admin/transportation') }}">
                            	{{ csrf_field() }}
	                            
                                <div class="form-group row">
                                	<div class="col-md-6">
	                                	<label class="form-control-label" for="name">Name</label>
	                                    <div class="controls">
                                            <div class="input-group">
                                                <input id="name" class="form-control" type="text" name="name">
                                            </div>
                                        </div>
	                                </div>	                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="id_transportation_type">Type</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select id="id_transportation_type" name="id_transportation_type" class="form-control" placeholder="Please Select">
                                                    <option value="0">&nbsp;</option>
                                                    @foreach($types as $type)
                                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="necessary">Necessary</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select id="necessary" name="necessary" class="form-control" placeholder="Please Select">
                                                    <option value="dropin">Drop-in</option>
                                                    <option value="pickup">Pick-up</option>
                                                    <option value="halfday">Half Day</option>
                                                    <option value="fullday">Full Day</option>
                                                </select>
                                            </div>
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
                                        <label class="form-control-label" for="brand">Brand</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="brand" class="form-control" type="text" name="brand">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="seat_capacity">Seat Capacity</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="seat_capacity" class="form-control" type="number" name="seat_capacity">
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="door_amount">Door Amount</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="door_amount" class="form-control" type="text" name="door_amount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="bag_capacity">Bag Capacity</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="bag_capacity" class="form-control" type="number" name="bag_capacity">
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="form-group row">
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="price">Price</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="price" class="form-control" type="text" name="price">
	                                        </div>
	                                    </div>
                                	</div>
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="capacity">Capacity</label>
	                                    <div class="controls">
	                                        <div class="input-group">
	                                            <input id="capacity" class="form-control" size="3" type="number" name="capacity">
	                                        </div>
	                                    </div>
                                	</div>                                    
                                </div>
                                
                                <div class="form-group row">
                                	<div class="col-md-6">
                                		<label class="form-control-label" for="facility">Facilities</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <!-- <input id="facility" class="form-control" type="text" name="facility"> -->
                                                <select class="form-control multiple-select" name="facility[]" multiple="multiple">
                                                    @foreach($facilities as $facility)
                                                        <option value="{{ $facility->id }}">{{ $facility->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                	</div>
                                	<div class="col-md-6">
                                        <label class="form-control-label" for="production_year">Production Year</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="production_year" class="form-control yearpickers" type="text" name="production_year">
                                            </div>
                                        </div>
                                    </div>                                 
                                </div>                                
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <a href="{{ route('transportation.index') }}"><button type="button" class="btn btn-default">Cancel</button></a>
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
        
        
    } );
</script>
