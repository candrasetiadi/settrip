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
                            <form class="form-horizontal" method="POST" action="{{ route('lodgingDetailRoom.update', $lodgingDetailRoom->id) }}">
                                {{method_field("PATCH")}}
                            	{{ csrf_field() }}
	                            
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="id_lodging">Lodging Room Type</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select id="id_lodging" name="id_lodging" class="form-control" placeholder="Please Select">
                                                    <option value="0">&nbsp;</option>
                                                    @foreach($lodgingRoomTypes as $lodgingRoomType)
                                                        <option value="{{ $lodgingRoomType->id }}">{{ $lodgingRoomType->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="id_lodging">Lodging</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select id="id_lodging" name="id_lodging" class="form-control" placeholder="Please Select">
                                                    <option value="0">&nbsp;</option>
                                                    @foreach($lodgings as $lodging)
                                                        <option value="{{ $lodging->id }}">{{ $lodging->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="name">Name</label>
                                    <div class="controls">
                                        <div class="input-group">
                                            <input id="name" class="form-control" type="text" name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="capacity">Capacity</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="capacity" class="form-control" type="number" name="capacity">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="price">Price</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="price" class="form-control" type="text" name="price">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="controls">
                                            <div class="input-group">
                                                <div class="checkbox">
                                                    <label for="is_include_breakfast">
                                                        <input id="is_include_breakfast" type="checkbox" name="is_include_breakfast" value="is_include_breakfast"> Include Breakfast
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                </div>    
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <a href="{{ route('lodgingDetailRoom
                                    .index') }}"><button type="button" class="btn btn-default">Cancel</button></a>
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
