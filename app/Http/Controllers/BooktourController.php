<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class BooktourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $tours = Tour::all();
            return view('index',compact('tours'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([$request, 
        'nam' => 'required',
        'image'=> 'required',
        'typetour' => 'required',
        'schedul' => 'required',
        'depart' => 'required',
        'numpeople' => 'required',
        'price' => 'required',
        ],
    [
        'nam.required'=>'Bạn chưa nhập tên',
        'image.required' => 'Bạn chưa thêm hình ảnh!',
        'typetour.required'=>'Bạn chưa nhập type tour',
        'schedul.required'=>'Bạn chưa nhập schedule',
        'depart.required'=>'Bạn chưa nhập depart',
        'numpeople'=>'Bạn chưa nhập số người',
        'price'=>'Bạn chưa nhập số tiền',
    ]
    );
    $name='';
        
    if($request->hasfile('image'))
    {
        //Hàm kiểm tra dữ liệu
        $this->validate($request, 
            [
            //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
            ],          
            [
            //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
            ]
        );
        $file = $request->file('image');
        $name=time().'_'.$file->getClientOriginalName();
        $destinationPath=public_path('images/cars'); //project\public\images\cars, //public_path(): trả về đường dẫn tới thư mục public
        $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/images/cars
    }   
                    
       $nam = $request->input('nam');                  
       $typetour = $request->input('typetour');  
       $schedul = $request->input('schedul')   ;   
       $depart =$request->input('depart');
       $numpeople =$request->input('numpeople');
       $price =$request->input('price');

       $file = $request->file('image');                    
       $name_img = time() . '_' . $file->getClientOriginalName();                  
       $destinationPath = public_path('images');       //project\public\images\ //public_path(): trả về đường dẫn tới thư mục public           
       $file->move($destinationPath, $name_img);               //lưu hình ảnh vào thư mục public/images/cars   
                           
       $tour = new Tour();                   
       $tour->nam = $nam;      
       $tour->image = $name_img;             
       $tour->typetour = $typetour ;                   
       $tour->schedul= $schedul;
       $tour->depart= $depart;
       $tour->numpeople= $numpeople;
       $tour->price= $price;
       $tour->save();
                           
       return redirect('/tours')->with('success', 'Thêm thành công!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $tours = Tour::all();
        return view('show',compact('tours'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function edit(Tour $tour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tour $tour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {
        //
    }
}
