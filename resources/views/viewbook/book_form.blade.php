<x-book-layout :showCarousel="false" :showNavbar="false">
<x-slot name='title'>
            Quản lý sách
</x-slot>
<div class="panel panel-default" style="width:50%; margin:0 auto;">
<div class="panel-body">
<form action="{{route('booksave',['action'=>$action])}}" method = "post" enctype="multipart/form-data">
    @if($action=="add")
    <div style='text-align:center;font-weight:bold;color:#000;'>THÊM THÔNG TIN SÁCH</div>
    @else
    <div style='text-align:center;font-weight:bold;color:#000;'>SỬA THÔNG TIN SÁCH</div>
    @endif

    <label>Tiêu đề</label>
    <input type='text' class='form-control form-control-sm' name='tieu_de' value="{{$sach->tieu_de??''}}">
    
    <label>Nhà xuất bản</label>
    <input type='text' class='form-control form-control-sm' name='nha_xuat_ban' value="{{$sach->nha_xuat_ban??''}}">
    
    <label>Nhà cung cấp</label>
    <input type='text' class='form-control form-control-sm' name='nha_cung_cap' value="{{$sach->nha_cung_cap??''}}">
    
    <label>Tác giả</label>
    <input type='text' class='form-control form-control-sm' name='tac_gia' value="{{$sach->tac_gia??''}}">
    
    <label>Hình thức bìa</label>
    <input type='text' class='form-control form-control-sm' name='hinh_thuc_bia' value="{{$sach->hinh_thuc_bia??''}}">
    
    <label>Giá bán</label>
    <input type='text' class='form-control form-control-sm' name='gia_ban' value="{{$sach->gia_ban??''}}">
    
    <label>Thể loại</label>
    <select name='id_the_loai' class='form-control form-control-sm'>
        @php
            $selected = isset($sach->the_loai)?$sach->the_loai:"";
            @endphp
            @foreach($the_loai as $row)
            <option value='{{$row->id}}' {{$selected==$row->id?'selected':''}}>
                {{$row->ten_the_loai}}
            </option>
        @endforeach
    </select>
    
    <label>Ảnh đại diện</label><br>
        @if($action=="edit")
            <img src="{{$sach->link_anh_bia}}" width="50px" class='mb-1'/>
            <input type ='hidden' value='{{$sach->id}}' name='id'>
        @endif
    <input type="file" name="file_anh_bia" accept="image/*" class="form-control-file">
    {{ csrf_field() }}
    <div style='text-align:center;'><input type='submit' class='btn btn-primary mt-1' value='Lưu'></div>
    @if ($errors->any())
    <div style='color:red; margin:0 auto'>
    <div >
    {{ __('Whoops! Something went wrong.') }}
    </div>
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif

</form>
</div>
</div>
</x-book-layout>
