<?php

namespace App\Http\Controllers;
// use App\slide;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        // $slide = Slide::all();
        //return view('page.trangchu',['slide'=>$slide]);
        $new_product = Product::where('new',1)->paginate(4);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
        //điều kiện lặp đối với spKm có đơn giá km < hơn đơn giá gốc. SP k khuyến mãi có đơn giá km=0 <> khác không
        return view('page.trangchu',compact('new_product','sanpham_khuyenmai'));

    }
    public function getLoaiSp($type)
    {
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai = ProductType::all();
        $loap_sp = ProductType::where('id',$type)->first();;
        return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loap_sp'));
    }
    public function getChitiet(Request $req)
    {
        $sanpham = Product::where('id',$req->id)->first();
        $sp_tuongtu =Product::where('id_type',$sanpham->id_type)->paginate(6);
        $id_product = $req->id;
    	return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu'));
    }
    public function getLienHe()
    {
    	return view(('page.lienhe'));
    }
    public function getGioithieu()
    {
    	return view(('page.gioithieu'));
    }
}

