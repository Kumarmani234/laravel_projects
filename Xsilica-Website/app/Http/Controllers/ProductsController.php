<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Carts;
use Illuminate\Support\Facades\Auth;

use GuzzleHttp\Client;
use Illuminate\Contracts\Session\Session;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

use Illuminate\Pagination\Paginator;

use Illuminate\Support\Collection;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
     
    public function create()
    {
        
        return view('Admin.addproducts');

    }

    public function paginate($items, $perPage = 2, $page = null, $options = []   )
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
       // $x->setCurrentPage(1,'showproducts');
    //     $y = $x->linkCollection();
    //   // dd($y);
    //     return $x;
    }


    public function index()
    {

        try {

            //------>$Products = json_decode(Products::all()->paginate(3));

            //-------ORM Model approach---> $Products = Products::latest()->paginate(3);

            //------FROM API Call
            $client = new Client();
            $res = $client->request('GET', 'http://xsilica.api.com/api/Products', [
                'headers' => [
                    'Accept' => 'application/json',
                    'content-type' => 'application/json',
                    'Authorization' => 'bearer ' . session("token")
                ],
                // 'json' => $inputBody
                // [
                //   'email' => $request["email"],
                //   'password' => $request["password"]
                // ]
            ]);
          //  dd($res);
            $result = json_decode($res->getBody()->getContents());

            $Products = null;
            if ($result->status == "success") {
                $Products = $result->Products; //->latest()->paginate(3);
            } else {
                return redirect('/login');
            }

            $Products = $this->paginate($Products, 5, null, [
                'path' => Paginator::resolveCurrentPath(),
                'pageName' => 'page'
            ]);
            return view('Admin.showproducts', compact('Products')); 
            //->with('i',(request()->input('page',1)-1)*  );

        }
        catch (\GuzzleHttp\Exception\ClientException $e) {
            // This will catch all 400 level errors.
            $notification = array(
                'message' => 'Token Expired! please re-login again', 
                'alert-type' => 'success'
            );
            if($e->getResponse()->getStatusCode()== 401)
            {

                return redirect('/logout/1')->with($notification);
                //->with('success','Item created successfully!'); 
            }
            //return $e->getResponse()->getStatusCode();
        }
  
 }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            //'image' =>'required|string|max:255',
        ]);


        $Products = Products::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
        ]);

   
    if($request->file('image'))
    {
        $file=$request->file('image');
        $filename=date('Y-m-d-H').'_'.$file->getClientOriginalName();
        $file->move(public_path('product_images'),$filename);
        //note this syntax too works.......//data['images']=$filename;
        $Products->image=$filename;
    }
    $Products->save();
    return redirect()->route('SHOWPRODUCTS');

        
    }

    public function show($id)
    {
        $Products = Products::find($id);
        return response()->json([
            'status' => 'success',
            'Products' => $Products,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
           'image' =>'required|string|max:255',
        ]);

        $Products = Products::find($id);
        $Products->title = $request->title;
        $Products->description = $request->description;
        $Products->image = $request->image;
        $Products->save();
    
        return response()->json([
            'status' => 'success',
            'message' => 'Products updated successfully',
            'Products' => $Products,
        ]);
    }

    public function destroy($id)
    {
        $Products = Products::find($id);
        $Products->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Products deleted successfully',
            'Products' => $Products,
        ]);
    }

    public function addcart(Request $request ,$id){

        if(Auth::id()){
            $user = auth()->user();
            $Products = Products::find($id);
            $Carts = new Carts;

            $Carts->title = $Products->title;
            $Carts->description = $Products->description;
            $Carts->image = $Products->image;
            $Carts->quantity = $request->quantity;
            $Carts->save();

            return redirect()->back()->with('message','Cart added successfully');
            // return response()->json([
            //     'status' => 'success',
            //     'message' => 'Cart Added  successfully',
            //     'Products' => $Products,
            // ]);
        }
        else{
            return ('SHOWPRODUCTS');
        }
    }
     
    public function addedproducts()
    {
        $Carts = Carts::all();
        //dd($Carts);
        return view('Admin.showcart',compact('Carts'));
    }
    
}
