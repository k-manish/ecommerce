<?php
/**
* File Name :MasterProduct.php
* File Path :App/
* Author :Manish Kumar
* Date of creation :14/09/2016
* Comments if any : 
*
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProdAddRequest;
use App\Http\Requests;
use FileMaker;
use App\MasterProduct;
use App\config\dbconfig;
use Session;

class Product extends Controller
{
    public function addProduct()
    {
        if(!(Session::has('user'))){
               return redirect('');
        }
        return view('pages.AddProductDetail');
    }
    public function uploadProduct(ProdAddRequest $request)
    {
        if ( !(Session::has('user')) ) {
               return redirect('');
        }
        
        $arr=array();
        $arr['name']=$request->input('name');
        $arr['price']=$request->input('price');
        $arr['qty']=$request->input('qty');
        
        $image=$request->file('filename');
        $imgname = time().$image->getClientOriginalName();
        
        $image->move(FILE_DEST_PATH, $imgname);
        $arr['image'] = $imgname;
        
        $c=new MasterProduct();
        $res=$c->insertData('product', $arr);
        if ($res){
            return redirect('ManageProduct');
        }
        return redirect('ManageProduct');
    }
    
    public function getAllProductDetail()
    {
        if ( !(Session::has('user')) ) {
               return redirect('');
        }
        $c=new MasterProduct();
        $results=$c->getAllData('product');
       $arr=array();
       foreach($results as $res)
       {
            $arr1=array();
            $arr1['name']=$res->getField('name');
            $arr1['price']=$res->getField('price');
            $arr1['path']='assets/images/' . $res->getField('image');
            $arr1['img'] = $res->getField('image');
            array_push($arr, $arr1);
       }
       return view('pages.ProductDetail')->with('result',$arr);
    }
    
    public function getThisProdDetail($id)
    {
        if ( !(Session::has('user')) ) {
               return redirect('');
        }
        $c = new MasterProduct();
        $records = $c->getAllRecords('product', 'image', $id);
        $arr=array();
        $arr['id'] = $records[0]->getField('id');
        $arr['name'] = $records[0]->getField('name');
        $arr['price'] = $records[0]->getField('price');
        $arr['qty'] = $records[0]->getField('qty');
        $arr['img'] = $records[0]->getField('image');
        $arr['path']='assets/images/' . $records[0]->getField('image');
        return view('pages.SpecificProdDetail')->with('result',$arr);
    }
    
    public function adminProduct()
    {
        return view('pages.ManageProduct');
    }
    
    public function adminProductDetail()
    {
        if ( Session::has('user') ) {
            $parentid=Session::get('userid');
        }
        
        $cur=$_REQUEST['current'];
        $rc=$_REQUEST['rowCount'];
        $sort=$_REQUEST['sort'];
        
        $sortarr = array();
        if ( array_key_exists('name',$sort) ) {
            $sortarr['name'] = $sort['name'];
        } elseif ( array_key_exists('qty',$sort) ) {
            $sortarr['qty'] = $sort['qty'];
        } else {
            $sortarr['price'] = $sort['price'];
        }
        $c=new MasterProduct();
        
        if ( $_REQUEST['searchPhrase'] != null) {
            $records=$c->getAllSearchedProductDetail($cur,$rc,$_REQUEST['searchPhrase'],$sortarr); 
        } else {
            $records=$c->getAllProductDetail($cur,$rc,$sortarr);
        }
        $totalrecord=array_shift($records);
        $jsonarr=array(
            "current"=>$cur,
            "rowCount"=>$rc,
            "rows"=>$records,
            "total"=>$totalrecord
        );
        echo json_encode($jsonarr); 
    }
    
    public function delProduct()
    {
        if ( Session::has('user') ) {
            $parentid=Session::get('userid');
        }
        $id=$_POST['id'];
        $c=new MasterProduct();
        $res=$c->delProduct($id); 
    }
    
    public function showProductDetail($id)
    {
        if ( Session::has('user') ) {
            $parentid=Session::get('userid');
        }
        $c = new MasterProduct();
        $arr = $c->showProductDetail($id);
        return view('pages.ShowProductDetail')->with('result', $arr);
    }
    
    public function editProduct($id)
    {
        if ( Session::has('user') ) {
            $parentid=Session::get('userid');
        }
        $c = new MasterProduct();
        $record = $c->editProduct($id);
        $arr = array();
        $arr['id'] = $id;
        $arr['name'] = $record->getField('name');
        $arr['qty'] = $record->getField('qty');
        $arr['price'] = $record->getField('price');
        return view('pages.EditProduct')->with('result',$arr);
    }
    
    public function updateProductInfo(Request $request)
    {
        if ( Session::has('user') ) {
            $parentid=Session::get('userid');
        }
        $id = $request->input('id');
        $name = $request->input('name');
        $qty = $request->input('qty');
        $price = $request->input('price');
        $c = new MasterProduct();
        $res = $c->updateProductInfo($id,$name,$qty,$price);
        if( $res ) {
            return view('pages.ManageProduct');
        }
    }
    
}
