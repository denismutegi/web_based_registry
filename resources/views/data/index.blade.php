@extends('layouts.app')
@section('title', config('app.name'))
@section('content')
<div class="pt-3 pb-5">
    <div class="container-fluid">
        <input type="text" class="form-control form-control-lg" name="keyword" id="search" placeholder="Search by firstname, lastname, Id no or by unique Id(ID)" autocomplete="off">
        <div class="search mb-3" id="results"></div>
        
        <div class="card">
            <div class="card-header fw-bold">@yield('title')</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fullname</th>
                                <th>Age</th>
                                <th>Id No</th>
                                <th>Gender</th>
                                <th>Place of birth</th>
                                <th>Address</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $rdata)
                            <tr>
                                <td>{{ $rdata->uuid }}</td>
                                <td>{{ $rdata->firstname .' '. $rdata->lastname }}</td>
                                <td>{{ $rdata->age.'yrs' }}</td>
                                <td>{{ $rdata->idno }}</td>
                                <td>{{ $rdata->gender }}</td>
                                <td>{{ $rdata->place_of_birth }}</td>
                                <td>{{ $rdata->address }}</td>
                                <td>{{ $rdata->created_at->diffForHumans() }}</td>
                                <td>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="{{ route('data.edit', $rdata->id) }}" class="btn btn-xs btn-primary">Edit</a> 
                                        </li>
                                        <li class="list-inline-item">
                                            <form action="{{ route('data.destroy', $rdata->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Sure to proceed?');">Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9">
                                    <div class="alert alert-warning">No records found</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
               </div> 
            </div>
        </div>

        {{ $data->links() }}
    </div>
</div>
<script>
    $(function() {        
        $('#search').keyup(function(){
            var vl = $(this).val();

			$.ajax({
		        type: 'get',
		        url: ('<?php echo route('search');?>'),
		        data: {
		        	ky:vl
		        },
		        cache:false,
		        success: function (data) {
		        	$('#results').html(data);
		        },
		        error: function (data) {
		        }
		    });
        })
    });
</script>
</script>
@endsection