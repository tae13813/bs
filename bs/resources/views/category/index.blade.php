@extends("layouts.master")
@section('title') BikeShop | รายการสินค้า @stop
@section('content')


<div class="container">
    <h1>รายการสินค้า </h1>
        <div class="panel panel-default">
        <div class="panel-heading">
        <div class="panel-title"><strong>รายการ</strong></div>
        </div>
        <div class="panel-body">
        <!-- search form -->
        <form action="{{ URL::to('product/search') }}" method="post" class="form-inline">
        {{ csrf_field() }}
        <input type="text" name="q" class="form-control" placeholder="ค้นหารายการสินค้า">
        <button type="submit" class="btn btn-primary">ค้นหา</button>
        </form> 
        </div> 
        <table class="table table-bordered bs-table">
        </table>
        <div class="panel-footer">
        </div>
        </div>
    <table class="table table-bordered">
    <thead>
    <tr>
    <th>รูปสินค้า </th>
    <th>รหัส</th>
    <th>ชื่อสินค้า </th>
    </tr>
    </thead>
    <tbody>
        @foreach($category as $p)
        <tr> 
        <td>{{ $p->id }}</td>
        <td>{{ $p->name }}</td>
       
        <td> 
        <a href="#" class="btn btn-info"><i class="fa fa-edit"></i> แก้ไข</a>
        <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> ลบ</a>
        </td>
        {{-- <td>{{ number_format($p->stock_qty, 0) }}</td>
        <td>{{ number_format($p->price, 2) }}</td> --}}
        
        </tr> @endforeach
        </tbody>
        <tfoot>

            </tfoot>
</table>
{{-- {{ $products->links() }} --}}
</div>


@endsection