<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;

class CheckoutController extends Controller
{
    public function checkout(Request $request,$slug) {
        
        $plan = Plan::where('slug', $slug)->first();

        if ($plan) {
            $data = [
                'email' => $request->user()->email,
                'plan_id' => $plan->id,
                'payment_gateway' => 'stripe',
                'amount' => $plan->price, // amount from plan will go here
                'currency' => 'usd', // currency from setting or plan will go here
                'user_id' => auth()->user()->id, // auth user will go here
                'status' => 0,
                'response' => "Payment started !",
            ];
            $transactionnew = new Transaction();
            $transactionnew = $transactionnew->create($data);
            try {
                \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $session = Session::create(
                    [
                        'line_items' => [[
                            'price' => $plan->stripe_plan,
                            'quantity' => 1
                        ]],
                        'mode' => 'subscription',
                        'success_url' => route('checkout.success', $transactionnew->id) . '?session_id={CHECKOUT_SESSION_ID}',
                        'cancel_url' => route('plans')
                    ]
                );
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', $th->getMessage());
            }

            return redirect($session->url);
        }else{
           return redirect()->back();
        }
    }

    public function success($id)
    {
        $transaction = Transaction::find($id);
        $transaction->status = 1;
        $transaction->transaction_id = request()->get('session_id');
        $transaction->response = 'Payment Successfully done !';
        $transaction->expiry_date = now()->addMonth();
        $transaction->save();

        // $plan = Plan::find($transaction->plan_id);
        // $loginuser = Auth::user();
        
        // $user = User::find($loginuser->id);
        // $user->no_of_words = $user->no_of_words + $plan->no_of_words;
        // $user->template_limit = $plan->template_limit;
        // $user->pdf_downloads = $plan->pdf_downloads;
        // $user->premium_template = $plan->premium_template;
        // $user->build_score = $plan->build_score;
        // $user->save();
        return view('success')->with('success', 'Thank you! you have successfully subscribe to plan.');
    }

    public function cancel()
    {
        return redirect()->back();
    }

    public function download(Request $request,$session_id)
    {
        

        try {
            $stripe = new \Stripe\StripeClient(
                env('STRIPE_SECRET')
            );
            $user = User::find(auth()->user()->id);

            $sobject =  $stripe->checkout->sessions->retrieve(
                $session_id,
                []
            );
            $inv = $stripe->invoices->retrieve($sobject->invoice, []);
           
              $pdfUrl= $inv->invoice_pdf;  
              return redirect()->to($pdfUrl);
          
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
