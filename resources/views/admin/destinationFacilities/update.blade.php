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
                            <form class="form-horizontal" method="POST" action="{{ route('destinationFacility.update', $destinationFacility->id) }}">
                                {{method_field("PATCH")}}
                            	{{ csrf_field() }}
	                            
                                <div class="form-group">
                            		<label class="form-control-label" for="name">Name</label>
                                    <div class="controls">
                                        <div class="input-group">
                                            <input id="name" class="form-control" type="text" name="name" value="{{ $destinationFacility->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="type">Type</label>
                                    <div class="controls">
                                        <div class="input-group">
                                            <select id="type" name="type" class="form-control" placeholder="Please Select">
                                                <option value="public">Public</option>
                                                <option value="private">Private</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <button type="button" class="btn btn-default">Cancel</button>
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