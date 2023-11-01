<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;
use App\Models\order;
use App\Models\User;
use App\Models\transaction;

use Carbon\Carbon;
use Alert;

class HomeController extends Controller
{

    public function index(){

        $mb = menu::with('categories')->where('category_menu', 1)->orderBy('created_at', 'DESC')->limit('6')->get();
        $m = menu::with('categories')->where('category_menu', 2)->orderBy('created_at', 'DESC')->limit('6')->get();
        $mr = menu::with('categories')->where('category_menu', 3)->orderBy('created_at', 'DESC')->limit('6')->get();

        return view('home',compact('mb','m','mr'));
    }


    public function detailmenu($id){

        $menu = menu::findorfail($id);
        return view('menudetail',compact('menu'));
    }

    public function getMenu(Request $request){
        $rand1 = rand(10,1000);
        $rand2 = rand(100,10000);

        $date = Carbon::now();

        $kdOrder = 'SOR-' . $rand1 . $rand2;
        $request->validate([
            'quantity' => 'numeric',
            'catatan' => 'string|nullable'
        ]);

        $createOrder = order::create([
            'code_order' => $kdOrder,
            'kd_menu' => $request->kd_menu,
            'user' => $request->user_id,
            'order_date' => $date,
            'quantity' => $request->quantity,
            'desctipted' => $request->catatan
        ]);

        // Alert::success('SuccessAlert','Berhasil Menambahkan Menu Ke Keranjang')
        // ->autoClose(2000);
        return redirect()->back();

    }

    public function keranjang(){

        $user = Auth()->user()->user_id;
        $orderMenu = order::where('user',$user)->orderBy('created_at', 'DESC')->get();
        $countOrder = order::where('user',$user)->count();

        return view('keranjang', compact('orderMenu', 'countOrder'));
    }

    public function hapusMenuOrder($id){
        $idorder = order::findorfail($id);

        $idorder->delete();

        return redirect()->back();
    }

    public function checkout(){
        $user = Auth()->user()->user_id;

        $userid = User::find($user);


        $orderMenu = order::where('user',$user)->orderBy('created_at', 'DESC')->get();
        $countOrder = order::where('user',$user)->count();

        $transIDrand = 'TRA'. '00' . rand(100,1000) . rand(1000,10000);

        return view('checkout', compact('orderMenu','countOrder','userid','transIDrand'));
    }

    public function updateData(Request $request){

        $user = Auth()->user()->user_id;
        $update = User::find($user);

        $number_phone = $request->input('number_phone');
        $address = $request->input('address');

        $update->update([
            'number_phone' => $number_phone,
            'address' => $address
        ]);

        return redirect()->back();
    }

    public function transaksi(Request $request){

        $user = Auth()->user()->user_id;
        $userid = User::find($user);

        $transid = $request->input('transid');
        $ikurir = $request->input('ikurir');
        // $harga = $request->input('harga');
        $cdiskon = $request->input('cDiskon');
        $hkurir = $request->input('hKurir');
        $status_transaction = $request->input('status_transaction');
        $payment = $request->input('payment');
        $orders = $request->input('orderid');

        $kdmenu = [];
        $price = [];
        $quantity = [];
        $namemenu = [];
        $itemDetails = [];

        foreach ($orders as $key => $order) {
                $orderTbl = order::with('menu')->where('code_order',$order)->first();

                if ($orderTbl) {
                $kdmenu[] = $orderTbl->menu->kd_menu;
                $price[] = $orderTbl->menu->price_menu;
                $quantity[] = $orderTbl->quantity;
                $namemenu[] = $orderTbl->menu->name_menu;

                // create tbl transaksi
                $transaction = new Transaction();
                    $transaction->transaction_id = $transid;
                    $transaction->order_id = $orderTbl->code_order;
                    $transaction->courier = $ikurir;
                    $transaction->payment_name = $payment;
                    $transaction->transaction_status = $status_transaction;

                    $transaction->save();

                $itemDetails[] = [
                    'id' => $orderTbl->menu->kd_menu,
                    'price' => $orderTbl->menu->price_menu,
                    'quantity' => $orderTbl->quantity,
                    'name' => $orderTbl->menu->name_menu,
                    'courier' => $hkurir,
                ];
               
            }
        }
      
        $itemDetails[] = [
            'id' => 1,
            'name' => 'Kurir',
            'quantity' => 1,
            'price' => $hkurir,
        ];
        
        if($cdiskon != 0){
            $itemDetails[] = [
                'id' => 1,
                'name' => 'Diskon',
                'quantity' => 1,
                'price' => -$cdiskon,
            ];
        }

         // Set your Merchant Server Key
         \Midtrans\Config::$serverKey = config('midtrans.server_key');
         // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
         \Midtrans\Config::$isProduction = false;
         // Set sanitization on (default)
         \Midtrans\Config::$isSanitized = true;
         // Set 3DS transaction for credit card to true
         \Midtrans\Config::$is3ds = true;

         $params = array(
             'transaction_details' => array(
                 'order_id' => $transid ,
                 'gross_amount' => 0,
             ),
             'item_details' => $itemDetails,
             'customer_details' => array(
                 'first_name' => $userid->name,
                 'email' => $userid->email,
                 'phone' => $userid->number_phone,
                 'address' => $userid->address,
             ),

         );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return response()->json(['snapToken' => $snapToken]);

    }

    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture'){
                $order = transactions::find($request->order_id);
                $order->update(['transaction_status'] == 'B');
            }
        }
    }

}
