@extends('products.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 crud (active,deactive,cretae,edit,update,delete,show) - BY Faruk</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employee.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th>Action/Deactive</th>
            <th>Action</th>
        </tr>
        @foreach ($employs as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>
            @if($product->status == 1)
            <a  href="{{ route('Deactive',$product->id) }}"
                class="btn btn-success" title="Product Active Now">Active </a>
            @else

            <a href="{{ route('Active',$product->id) }}"
                class="btn btn-danger" title="Product Active Now">Deactive </a>
            @endif 
            
            </td>
            <td>
                    <a class="btn btn-info" href="{{route('employee.show',$product->id)}}">Show</a>
                    <a class="btn btn-primary" href="{{route('employee.edit',$product->id)}}">Edit</a>
                    <a class="btn btn-danger" href="{{route('employee.delete',$product->id)}}">Delete</a>
                    <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
            </td>
        </tr>
        @endforeach
    </table>
      
@endsection

       