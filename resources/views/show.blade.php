@extends('layouts.app')
@section('content')
        <form class="form-inline" action="/items/{{$borrower->id}}" method="POST">
        {{ csrf_field() }}
         @method('PUT')
            <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Borrower's Name: <strong>{{$borrower->name}}</strong>
                                <strong class="pull-right">
                                    <a href="{{ URL::previous() }}"><i class="ti ti-angle-double-left">
                                    </i>Go back</a>
                                </strong>
                                </h4>

                                <br>
                                <p class="category">Please click this button if you desire to return items
                                   <button class="btn btn-success btn-sm" type="submit">
                                    <i class="ti ti-check"></i>
                                    </button> 
                               </p>
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Serial #</th>
                                        <th>Item borrowed</th>
                                        <th>Quantity</th>
                                        <th>Borrowed Date</th>
                                        <th>Status</th>
                                        <th>Released By</th>
                                    </thead>
                                    @forelse($datas as $data)
                                    <tbody>
                                        <tr>
                                            <td>{{$data->serial_number}}</td>
                                            <td>{{$data->item}}</td>
                                            <td>{{$data->qty}}</td>
                                            <td>{{$data->date_borrowed}}</td>
                                            <td>{{$data->status}}</td>
                                            <td>{{$data->released_by}}</td>
                                        </tr>
                        <input type="hidden" name="status[]" value="{{$data->status}}">
                                    @empty
                                        <tr>
                                            <td colspan="7">
                                                <p>NO DATA</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforelse
                                </table>
                                <div class="content table-responsive table-full-width">
                                    <div class="container-fluid">
                                        <table class="table table-bordered">
                                        <tr>
                                            <td>Purpose</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <textarea rows="5" cols="40" class="form-control border-input" name="purpose" placeholder="Here can be your description" required>{{$borrower->purpose}}</textarea>
                                            </td>
                                        </tr>
                                    </table>
                                    </div>
                                    
                                    
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </form>    
@endsection