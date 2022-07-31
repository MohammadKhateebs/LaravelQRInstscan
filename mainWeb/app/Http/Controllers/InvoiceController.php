<?php

namespace App\Http\Controllers;

use App\Models\bill;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function addshow()
    {
        return view('user.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'bill_no'          => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'buyer_no'         => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'seller_no'        => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'date_published'       => 'required',
            'tax_amount' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:3',
        ]);
        bill::create([
            'bill_no' => $request->bill_no,
            'buyer_no' => $request->buyer_no,
            'seller_no' => $request->seller_no,
            'date_published' => $request->date_published,
            'tax_amount' => $request->tax_amount,
        ]);

        return response()->json(['success' => 'تم اضافة الفاتورة بنجاح']);
    }
    public function show()
    {
        return view('user.index');
    }
    public function buy()
    {
        return view('user.buy');
    }
    public function search(Request $request)
    {


        $request->validate([
            'search' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',

        ]);



        $output = "";
        $product = bill::where('bill_no', '=', $request->search)->first();
        if ($product != null) {

            $output .= ' <div class="col">
    <div class="col" style="font-size: 13px; ">
        <div>رقم الفاتورة :
            <span id="bill_no">' . $product->bill_no . '</span>
        </div>

        <div>رقم البائع :
            <span id="buyer_no">' . $product->buyer_no . '</span>
        </div>
        <div>رقم المشتري :
            <span id="seller_no">' . $product->seller_no . '</span>
        </div>
        <div>التاريخ :
            <span id="date_published">' . $product->date_published . '</span>
        </div>
        <div>قيمة الضريبه :
            <span id="tax_amount">' . $product->tax_amount . '</span>
        </div>
    </div>
</div>
<div class="col-sm-6 dir-ltr">
    <div class=" text-start">bill no :
        <span class="" id="bill_no1">' . $product->bill_no . '</span>
    </div>
    <div class=" text-start">buyer
        no : <span class="" id="buyer_no1">' . $product->buyer_no . '</span>
    </div>
    <div class=" text-start">
        seller no :
        <span class="" id="seller_no1">' . $product->seller_no . '</span>
    </div>
    <div class=" text-start">
        date :
        <span class="" id="date_published1">' . $product->date_published . '</span>
    </div>
    <div class=" text-start">vat
        amount :
        <span class="" id="tax_amount1">' . $product->tax_amount . '</span>
    </div>
</div>
   ';
        }
        else{
            $output.='

                    <div class="alert alert-danger">لايوجد نتائج لهذا الاستعلام ! </div>
            ';
        }


        return response()->json($output);
    }
}
