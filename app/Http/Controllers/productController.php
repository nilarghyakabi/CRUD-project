<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use App\Models\product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;
use Yajra\DataTables\DataTables;

class productController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = product::active();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return carbon::parse($row->created_at)->format('d-m-Y');
                })
                ->editColumn('image', function ($row) {
                    //return "<img src='".asset($row->image)."' width='100' height='100'>";
                    return "<img src='" . Storage::url($row->image->file) . "' width='100' height='100'>";
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('product-view', $row->id) . '" class="edit btn btn-primary btn-sm">View</a> &nbsp;';
                    $btn .= '<a href="' . route('product-edit', $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a> &nbsp;';
                    $btn .= '<a href="' . route('product-delete', $row->id) . '" class="edit btn btn-primary btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
//        $products = product::active()->paginate(10);
//        dd($products);
        return view('product.list');
    }

    public function form(Request $request)
    {
        return view('product.form');
    }

    /**
     * @throws Throwable
     */
    public function save(ProductRequest $request)
    {
        try {
            $product = product::create(
                [
                    'name' => $request->name,
                    'cost_price' => $request->cost,
                    'selling_price' => $request->sale,
                    'unit' => $request->unit ?? 'piece',
                    'status' => $request->status,
                ]
            );

            if ($file=$request->file('image')) {
                $image = Storage::disk('public')->put('product',$file);
                $product->image()->create(['id'=>Str::Uuid(),'file'=>$image]);
            }
        } catch (throwable $th) {
            throw $th;
        }
        //dd($request->all());
        return redirect()->route('product-list');
    }


    public function view($id)
    {
        $p_edit=Product::find($id);
        return view('product.edit')
            ->with('p_edit',$p_edit)
            ->with('is_view',1);
    }

    public function edit($id)
    {
        $p_edit = product::find($id);
//        dd( $p_edit);
        return view('product.edit')->with('p_edit', $p_edit);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->update(['deleted_at' => now()]);
        return redirect()->route('product-list');

    }
    public function update(ProductRequest $request,$id){
        $product=product::find($id);
//        dd( $product);
        $product->update([
            'name' => $request->name,
            'cost_price' => $request->cost,
            'selling_price' => $request->sale,
            'unit' => $request->unit??'piece',
            'status' => $request->status,
        ]);
        if($file=$request->file('image')) {
            $image = Storage::disk('public')->put('product',$file);
            if(!empty($product->image->file)){
                Storage::disk('public')->delete($product->image->file);
            }
            $product->image()->updateOrCreate(['parentable_id' => $product->id, 'parentable_type' => $product::class], ['id' => Str::uuid(), 'file' => $image]);
        }
        return redirect()->route('product-list');
    }
}

