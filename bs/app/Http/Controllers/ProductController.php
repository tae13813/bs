<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use config, Validator;

class ProductController extends Controller 
{
    var $rp = 2;
    public function index() 
    {
        $products = Product::paginate($this->rp);
        return view('product/index', compact('products'));
    }

    public function search(Request $request) {
        $query = $request->q;
        if($query) {
        $products = Product::where('code', 'like', '%'.$query.'%')
        ->orWhere('name', 'like', '%'.$query.'%')
        ->paginate($this->rp);
        }  
        else {
        $products = Product::paginate($this->rp);
        }
        return view('product/index', compact('products'));
        }
    public function edit($id = null) {
        $product = Product::find($id);
        $categories = Category::pluck('name', 'id')->prepend('เลือกรายการ', '');
        if($id){
            $product = Product::where('id', $id)->first(); return view('product/edit')
            ->with('product', $product)
            ->with('categories', $categories);
        }else {
            // add view
            return view('product/add')
            ->with('categories', $categories);
            }
        }

        
        public function update(Request $request) {
            $rules = array(
            'code' => 'required', 'name' => 'required',
            'category_id' => 'required|numeric', 'price' => 'numeric',
            'stock_qty' => 'numeric',
            );
            
            $messages = array(
            'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน', 'numeric' => 'กรุณากรอกข้อมูล
            :attribute ให้เป็นตัวเลข',
            );
            
            $id = $request->id;
            $temp = array(
            'name' => $request->name, //ทดลองฟิลด์เดียวก่อน
            );
            //ตรงนี้เป็นการนําค่าจากฟอร์ม มาใส่ตัวแปร array temp เพราะ class Validator ต้องการ array
            // $validator = Validator::make($temp, $rules, $messages);
            // if ($validator->fails()) {
            // return redirect('product/edit/'.$id)
            // ->withErrors($validator)
            // ->withInput();
            // } 
            $product = Product::find($id);
            $product->code = $request->code;
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->price = $request->price;
            $product->stock_qty = $request->stock_qty;
            $product->save();
            if($request->hasFile('image'))
            {
                $f = $request->file('image');
                $upload_to = 'upload\images'; // save to dir
    
                $relative_path = $upload_to . '/' . $f->getClientOriginalName(); // upload/images/file1.jpg
                $absolute_path = public_path() . '/' . $upload_to; //!important .../bikeshop/public/upload/image/file1.jpg
                
                // move and upload file
                $f->move($absolute_path, $f->getClientOriginalName());
                $product->image_url = $relative_path;
                $product->save();
                }
          
            
            return redirect('product')
            ->with('ok', true)
            ->with('msg', 'บันทึกขอมูลเรียบร้อยแลว้');

            }
            public function insert(Request $request) {
                // validation ไว้เขียนทีหลัง ความสําคัญน้อยกว่า วิธีเอาค่าจากฟอร์ม มาบันทึกครับ
          
                $product = new Product();
                $product->code = $request->code;
                $product->name = $request->name;
                $product->category_id =$request->category_id;
                $product->price =$request->price;
                $product->stock_qty =$request->stock_qty;
                //$product->save(); < ถ้าไม่ชัวร์ อย่าเพิ่งพิมพ์ save
                if($request->hasFile('image'))
                {
                    $f = $request->file('image');
                    $upload_to = 'upload\images'; // save to dir
        
                    $relative_path = $upload_to . '/' . $f->getClientOriginalName(); // upload/images/file1.jpg
                    $absolute_path = public_path() . '/' . $upload_to; //!important .../bikeshop/public/upload/image/file1.jpg
                    
                    // move and upload file
                    $f->move($absolute_path, $f->getClientOriginalName());
                    $product->image_url = $relative_path;
                    $product->save();
                    }
              
                
                return redirect('product')
                ->with('ok', true)
                ->with('msg', 'บันทึกขอมูลเรียบร้อยแลว้');
                }  
 }

