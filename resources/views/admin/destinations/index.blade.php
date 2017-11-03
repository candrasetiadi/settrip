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
                                    <a href="{{ url('admin/destination/create') }}"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button></a>

                                    <table class="stripe hover mdl-data-table" id="settable" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="15%">Name</th>
                                                <th width="30%">Address</th>
                                                <th width="15%">Email</th>
                                                <th width="10%">Phone</th>
                                                <th width="10%">Open Hour</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr></tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($destinations as $destination)
                                                <tr>
                                                    <td>{{ $destination->name }}</td>
                                                    <td>{{ $destination->address }}</td>
                                                    <td>{{ $destination->email }}</td>
                                                    <td>{{ $destination->phone_1 }}</td>
                                                    <td>{{ $destination->open_hour }} - {{ $destination->close_hour }}</td>
                                                    <td>
                                                        <a href="" title="Detail"><span class="badge badge-success"><i class="fa fa-tasks"></i></span></a>
                                                        <a href="{{ route('destination.edit', $destination->id) }}" title="Edit"><span class="badge badge-warning"><i class="fa fa-edit"></i></span></a>
                                                        <a href="{{ route('destination.delete', $destination->id) }}" title="Delete"><span class="badge badge-danger"><i class="fa fa-times"></i></span></a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- <nav>
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#">Prev</a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">4</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav> -->
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