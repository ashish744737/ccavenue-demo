<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Appnings\Payment\Facades\Payment;  // use this to include payment class

class CheckoutController extends Controller
{
    public function checkout(Request $request){
        $tnxno= mt_rand(1, 100);
        //below code is for payment success


        // $name= $request->name." ".$request->lastname;
        // $insert->name = $name;
        // $insert->email = $request->email;
        // $insert->mobile = $request->mobile;
        // $insert->zip_code = $request->zip_code;
        // $insert->city = $request->city;
        // $insert->country = $request->country;
        // $insert->state = $request->state;
        // $insert->address = $request->address;
        // $insert->type_of_address = 'Type of address';
        // $insert->product_name = $request->product_name;
        // $insert->payment_status = '0';
        // $insert->tnx_id = $tnxno;
        // $insert->order_id = $last_id_ord;
        // $insert->user_id = '1';
        // $insert->status_id = '1';
        // $insert->qty = $request->quantity_change;
        // $insert->tax = '1';
        // $insert->product_id = $request->product_id;
        // $insert->actual_price = $request->actual_price;
        // $insert->total = $request->sub_total_change;
        // $insert->disc_amount = $request->disc_amount;
        // $insert->pay_method = 'Ccavenue';
        // $insert->save();

        // date_default_timezone_set('Asia/Calcutta'); 
        // $current_date = date("d F, Y"); // time in India
        //   $data = [
        //           'name' => $request->name.' '.$request->lastname,
        //           'email' => trim($request->email),
        //           'phone' => $request->mobile,
        //           'zipcode' => $request->zip_code,
        //           'state' => $request->state,
        //           'address' => $request->address,
        //           'product_name' => $request->product_name,
        //           'order_id' => $last_id_ord,
        //           'tnx_id' => $tnxno,
        //           'qty' => $request->quantity_change,
        //           'actual_price' => $request->actual_price,
        //           'sub_total_change' => $request->sub_total_change,
        //           'disc_amount' => $request->disc_amount,
        //           'order_date' => $current_date
        //       ];
        //     Session::put('data', ['name'=> $name,'email' => $request->email,'phone' => $request->mobile,'zipcode' => $request->zip_code,'state' => $request->state, 'country' => $request->country, 'city' => $request->city,'address' => $request->address,'product_name' => $request->product_name,'order_id' => $last_id_ord,'tnx_id' => $tnxno,'qty' => $request->quantity_change,'actual_price' => $request->actual_price,'sub_total_change' => $request->sub_total_change,'disc_amount' => $request->disc_amount,'order_date' => $current_date]);
        //     Session::put(['session_tnxno' => $tnxno]);

            $parameters = [
                'tid' => $tnxno,  
                
                //'redirect_url' => url('payment/success'),  thease links are not mandetory and only used to get response redirection from ccavenue
                //'cancel_url' => url('payment/cancel'),
                'order_id' => 123,
                'purpose' => 'Testing',
                'amount' => $request->amount,
        
                'billing_name' => "ashish",
                'billing_address' => "navi mumbai",
                'billing_country'=> "India",
                'billing_state'=> "Maharashtra",
                'billing_city'=> "Navi mumbai",
                'billing_zip'=> "600614",
                'billing_tel'=> "9545486747",
                'billing_email'=> "ashish.pasekar@gmail.com",
        
                'delivery_name'=> "ashish",
                'delivery_address' => "navi mumbai", 
                'delivery_country'=> "India",
                'delivery_state'=> "Maharashtra",
                'delivery_city'=>  "Navi mumbai",
                'delivery_zip'=> "600614",
                'delivery_tel'=> "9545486747",
                'allow_repeated_payments' => false,
            ];
        
                $order = Payment::gateway('CCAvenue')->prepare($parameters);
                return Payment::process($order);
    }
    public function response(Request $request)
    {

                //below code is for payment success in ccavenue

                //$emails_to = ['ashish.pasekar@gmail.com,test@test.com'];
                            
                // $data = Session::get('data');
                
                // Mail::send('ordermail', $data, function($message) use ($data, $emails_to){
                //     $message->from('ashish.pasekar@gmail.com', 'CCAVENUE TEST');
                //     $message->to($emails_to, $data['name'])->subject('New Order- from ccavenue');
                // });
                
                // $emails_to_customer = Session::get('data')['email'];
                
                // Mail::send('ordermail', $data, function($message) use ($data, $emails_to_customer){
                //     $message->from('ashish.pasekar@gmail.com', 'CCAVENUE TEST');
                //     $message->to($emails_to_customer, $data['name'])->subject('New Order- from ccavenue');
                // });
                
                // $get_tid = Session::get('session_tnxno');
            
                // $query = DB::table('orders')->where('tnx_id','=',$get_tid)->first();
            
                // if ($query)
                // {
                //     $update  =  DB::table('orders')->where('tnx_id', $query->tnx_id)->update(['status_id' => 2]);
                //     return view('front.success');
                //     Session::forget('session_tnxno');
                //     //Session::forget('name','email','phone','zipcode','state','address','product_name','order_id','tnx_id','qty','actual_price','sub_total_change','disc_amount','order_date');
                //     Session::forget('data'); 
                // }
    }
    public function paymentcancel_page(){
          
        //below code is for payment cancel in ccavenue

        //$emails_to = ['ashish.pasekar@gmail.com,test@test.com'];
        
        // $data = Session::get('data');
        
        // Mail::send('ordermailfailed', $data, function($message) use ($data, $emails_to){
        //     $message->from('ashish.pasekar@gmail.com', 'CCAVENUE TEST');
        //     $message->to($emails_to, $data['name'])->subject('Failed Order- from ccavenue');
        // });
        
        
        // $emails_to_customer = Session::get('data')['email'];
    
        // Mail::send('ordermailfailed', $data, function($message) use ($data, $emails_to_customer){
        //     $message->from('ashish.pasekar@gmail.com', 'CCAVENUE TEST');
        //     $message->to($emails_to_customer, $data['name'])->subject('Failed Order- from ccavenue');
        // });
        
        // Session::forget('data');          
        // return view('front.cancel');
    } 

}
