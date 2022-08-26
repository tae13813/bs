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
        <a href="{{ URL::to('product/edit') }}" class="btn btn-success pull-right">เพิ่มสินค้า
        </a>
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
    <th>ประเภท</th>
    <th>คงเหลือ</th>
    <th>ราคาต่อหน่วย</th>
    <th>การทํางาน</th>
    </tr>
    </thead>
    <tbody>
        @foreach($products as $p)
        <tr> 
   
        
        <td>{{ $p->image_url }}</td>
        <td>{{ $p->code }}</td>
        <td>{{ $p->name }}</td>
        <td>{{ $p->category->name }}</td>
        <td>{{ $p->stock_qty }}</td>
        <td>{{ $p->price }}</td>
        <td><img src="{{ $p->image_url }}" width="50px"></td>
        <td> 
        <a href="{{ URL::to('product/edit/'.$p->id) }}" class="btn btn-info"><i class="fa fa-edit"></i> แก้ไข</a>
        <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> ลบ</a>
        </td>
        {{-- <td>{{ number_format($p->stock_qty, 0) }}</td>
        <td>{{ number_format($p->price, 2) }}</td> --}}
        
        </tr> @endforeach
        </tbody>
        <tfoot>
            <tr>
            <th colspan="4">รวม</th>
            <th>{{ number_format($products->sum('stock_qty'), 0) }}</th>
            <th>{{ number_format($products->sum('price'), 2) }}</th>
            </tr>
           
            </tfoot>
</table>
{{ $products->links() }}
</div>


@endsection