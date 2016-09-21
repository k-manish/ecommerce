<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\QtyCheck;
use App\Http\Requests;
use App\MasterProduct;
use Session;

class Order extends Controller
{
   public function placeOrder(QtyCheck $request)
   {
      if ( Session::has('user') ) {
            $parentid=Session::get('userid');
        }
         $image = $request->input('img');
         $qty = $request->input('qty');
         $info = new MasterProduct();
         $result = $info->getAllRecords('product', 'image', $image);
         if ( $result ) {
             $arr['id'] = $result[0]->getField('id');
             $arr['name'] = $result[0]->getField('name');
             $arr['qty'] = $result[0]->getField('qty');
             $arr['price'] = $result[0]->getField('price');
             $arr['image'] = $result[0]->getField('mobile');
             if ( $qty <= $arr['qty'] ) {
                $arr['oqty'] = $qty;
                $arr['total'] = $arr['price'] * $qty;
                echo $qty;
                return view('pages.OrderPlace')->with('result',$arr);
             }
             return Redirect::back()->withErrors('that much quantity not avilable');
         }
   }
   
   public function getUserOrderDetail()
   {
      if ( Session::has('user') ) {
            $parentid=Session::get('userid');
        }
      $obj = new MasterProduct();
      $records = $obj->getUserOrderDetail('USER',Session::get('userid'));
      if ( $records ) {
         //echo json_encode($records);
         return view('pages.OrderDetail')->with('results', $records);
      }
   }
}
