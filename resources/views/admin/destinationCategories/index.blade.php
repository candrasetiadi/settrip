@extends('layouts.default-login')

@section('content')
    <main class="main">

            @include('layouts.breadcrumb')

            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> {{$title}}
                                </div>
                                <div class="card-block">
                                    <a href="{{ url('admin/destinationCategory/create') }}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button></a>

                                    <table class="stripe hover mdl-data-table" id="settable" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="10%">No</th>
                                                <th width="80%">Name</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr></tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($destinationCategories as $idx => $destinationCategory)
                                                <tr>
                                                    <td>{{ $idx + 1 }}</td>
                                                    <td>{{ $destinationCategory->name }}</td>
                                                    <td>
                                                        <a href="" title="Detail"><span class="badge badge-success"><i class="fa fa-tasks"></i></span></a>
                                                        <a href="{{ route('destinationCategory.edit', $destinationCategory->id) }}" title="Edit"><span class="badge badge-warning"><i class="fa fa-edit"></i></span></a>
                                                        <a href="{{ route('destinationCategory.delete', $destinationCategory->id) }}" title="Delete"><span class="badge badge-danger"><i class="fa fa-times"></i></span></a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
        $('#settable').DataTable({
            columnDefs: [
                {
                    targets: [ 0, 1, 2 ],
                    className: 'mdl-data-table__cell--non-numeric'
                }
            ]
        });
    } );
</script>