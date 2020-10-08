<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\TransactionSuccess;
use App\Models\Order;
use App\Models\Product;
use App\Models\Spa;
use App\Models\Transaction;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends FrontendController
{
    public function addProduct(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) return redirect('/');
        Cart::add([
            'id' => $id,
            'name' => $product->pro_name,
            'qty' => 1,
            'price' => $product->pro_price,
            'options' => [
                'avatar' => $product->pro_avatar
            ],
        ]);
        Session::flash('toastr', [
            'type'          => 'success',
            'message'       => 'Add cart successfully'
        ]);
        return redirect()->back();


    }

    public function getListShoppingCart()
    {
        $shopping = Cart::content();
        return view('frontend.pages.shopping.index', compact('shopping'));
    }

    public function deleteProductItem($key)
    {
        Cart::remove($key);
        return redirect()->back();

//        try {
//            Cart::find($key)->delete();
//            return response()->json([
//                'code' => 200,
//                'message' => 'success'
//            ], 200);
//
//        } catch (\Exception $exception) {
//            Log::errors('message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
//            return response()->json([
//                'code' => 500,
//                'message' => 'fail'
//            ],500);
//        }
    }


    public function updateShoppingCart(Request $request, $id)
    {
        if ($request->ajax()) {

            //1:Lấy tham số
            $qty = $request->qty ?? 1;
            $idProduct = $request->idProduct;
            $product = Product::find($idProduct);

            //2:Kiểm tra tồn tại sản phẩm
            if (!$product) return response(['messages' => 'Không tồn tại sản phẩm cần update']);

            //3:Kiểm tra số lượng sản phẩm trong kho
            if ($product->pro_number < $qty) {
                return response(['messages' => 'Số lượng sản phẩm trong kho không đủ']);
            }
            Cart::update($id, $qty);
            return response(['messages' => 'Cập nhật thành công']);
        }
        return
        Session::flash('toastr', [
            'type'          => 'success',
            'message'       => 'Update cart successfully'
        ]);
    }

    public function getFormPay()
    {
        $products = Cart::content();
        $spa = $this->getSpa();

        return view('frontend.components.pay', compact('products', 'spa'));
    }

    public function getSpa()
    {
        return Spa::all();
    }

    public function saveInfoShoppingCart(Request $request)
    {
        $data = $request->except("_token");
        if (Auth::user()->id) {
            $data['tr_user_id'] = Auth::user()->id;
        }
        $data['tr_total'] = str_replace(',' , '' , Cart::subtotal(0));
        $data['created_at'] = Carbon::now();
        $transactionID = Transaction::insertGetId($data);
        if($transactionID) {
            $shopping = Cart::content();
            Mail::to($request->tr_email)->send(new TransactionSuccess($shopping));
            foreach($shopping as $key => $item) {
                Order::insert([
                    'or_transaction_id' => $transactionID,
                    'or_product_id' => $item->id,
                    'or_quantity' => $item->qty,
                    'or_price' => $item->price,
                ]);
                DB::table('hv_product')
                    ->where('id', $item->id)
                    ->increment("pro_pay");
            }
        }
        Session::flash('toastr', [
            'type'          => 'success',
            'message'       => 'Your order has been saved'
        ]);
        Cart::destroy();
        return redirect()->to('/');

//        $totalMoney = str_replace(',', '', Cart::total(0, 3));
//        $transactionId = Transaction::insertGetId([
//            'tr_user_id' => get_data_user('web'),
//            'tr_spa_id' => $request->spaId,
//            'tr_total' => (int)$totalMoney,
//            'tr_note' => $request->note,
//            'tr_address' => $request->address,
//            'tr_phone' => $request->phone,
//            'tr_email' => $request->email,
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now()
//
//        ]);
//        if ($transactionId) {
//            $products = Cart::content();
//            Mail::to($request->email)->send(new TransactionSuccess($products));
//            foreach ($products as $product) {
//                Order::insert([
//                    'or_transaction_id' => $transactionId,
//                    'or_product_id' => $product->id,
//                    'or_quantity' => $product->qty,
//                    'or_price' => $product->price,
//                ]);
//                DB::table('hv_product')
//                    ->where('id', $product->id)
//                    ->increment("pro_pay");
//            }
//        }
//        Cart::destroy();
//        return redirect()->back();
    }
}
