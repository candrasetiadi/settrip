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
                            <form class="form-horizontal" method="POST" action="{{ url('admin/restaurantMenu') }}">
                                {{ csrf_field() }}
                                
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="id_resto">Nama Restaurant</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select id="id_resto" name="id_resto" class="form-control" placeholder="Please Select">
                                                    <option value="0">&nbsp;</option>
                                                    @foreach($restaurants as $restaurant)
                                                        <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="type">Type</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select id="type" name="type" class="form-control" placeholder="Please Select">
                                                    <option value="0">&nbsp;</option>
                                                    @foreach($types as $key => $value)
                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                        <label class="form-control-label" for="agent_rate">Agent Rate (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="agent_rate" class="form-control" type="number" name="agent_rate">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="publish_rate">Publish Rate (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="publish_rate" class="form-control" type="number" name="publish_rate">
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="form-control-label" for="fee">Fee (IDR)</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="fee" class="form-control" type="number" name="fee">
                                            </div>
                                        </div>
                                    </div>     
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="controls">
                                            <div class="input-group">
                                                <div class="checkbox">
                                                    <label for="is_recommended">
                                                        <input id="is_recommended" type="checkbox" name="is_recommended" value=""> Is Recommended
                                                    </label>
                                                </div>
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
                                    <a href="{{ route('restaurantMenu.index') }}"><button type="button" class="btn btn-default">Cancel</button></a>
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

    })
</script>
