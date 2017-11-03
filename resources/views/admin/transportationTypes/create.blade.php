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
                            <form class="form-horizontal" method="POST" action="{{ url('admin/transportationTypes') }}">
                            	{{ csrf_field() }}
	                            
                                <div class="form-group">
                            		<label class="form-control-label" for="name">Name</label>
                                    <div class="controls">
                                        <div class="input-group">
                                            <input id="name" class="form-control" type="text" name="name">
                                           <!--  <span class="input-group-addon">.00</span> -->
                                        </div>
                                        <!-- <span class="help-block">Here's more help text</span> -->
                                    </div>                                    
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <a href="{{ route('transportationTypes.index') }}"><button type="button" class="btn btn-default">Cancel</button></a>
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
