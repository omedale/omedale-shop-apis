<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Helpers\ErrorHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Tax;
use App\Mail\OrderReceipt;
use Illuminate\Support\Facades\Mail;
use App\Models\Shipping;

class StripeController extends Controller
{
    public function charge(Request $request) {

        $get_input = $request->all();
        $rules = [
            'stripeToken' => 'required',
            'order_id' => 'required',
            'description' => 'required',
            'amount' => 'required'
        ];

        $messages = [
            'stripeToken.required' => 'stripeToken is required',
            'order_id.required' => 'Order ID is required',
            'amount.required' => 'Amount is required',
            'description.required' => 'Description is required',
        ];

        $validator = Validator:: make($get_input, $rules, $messages);
        if($validator->fails()) {
            return ErrorHelper::USR_02($validator->errors());
        }

        \Stripe\Stripe::setApiKey(env('STRIPE_KEY'));
        $charge = \Stripe\Charge::create ([
                "amount" => 100 * $request->amount,
                "currency" => $request->currency ? $request->currency : "usd",
                "source" => $request->stripeToken,
                "description" => "MyShop order payment"
        ]);

        $orderDetails = OrderDetail::where('order_id', $request->order_id)->get();
        $customer = Customer::find($request->jwt_customer_id);
        $order  = Order::find($request->order_id);
        $shipping_price = Shipping::find($order->shipping_id)->value('shipping_cost');
        $tax_percentage = Tax::find($order->tax_id)->value('tax_percentage');
        $tax_rate = ((float)$tax_percentage /100);
        $order_amounts = $orderDetails->map(function ($order) {
            return $order->unit_cost * $order->quantity;
        });
        $order_total_amount = collect($order_amounts)->sum();
        $tax_price = ($order_total_amount * $tax_rate);
        $amount = $order_total_amount + $tax_price + (float)$shipping_price;
    
        $data = [
            'orderDetails' => $orderDetails,
            'customer' => $customer,
            'shipping_price' => $shipping_price,
            'total_amount' => number_format($amount, 2, '.', ''),
            'tax_percentage' => $tax_percentage,
            'tax_price' => $tax_price
        ];

        Mail::to($customer->email)->send(new OrderReceipt($data));

        return response()->json($charge)
        ->setStatusCode(200);
    }
}
