<x-book-layout :showCarousel="false" :showNavbar="false">
    <x-slot name='title'>
        Đặt hàng
    </x-slot>

    <div>
        <div style='color:#15c; font-weight:bold;font-size:20px;text-align:center'>DANH SÁCH SẢN PHẨM</div>
        
            <table class='book-table' style='margin:0 auto; width:100%; text-align:center'>
                <thead>
                    <th>STT</th>
                    <th>Tên sách</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Xóa</th>
                </thead>
                <tbody>
                    @php
                        $tongTien = 0;
                    @endphp
                    @foreach($data as $key=>$row)
                       <tr>
                            <td align='center'>{{$key+1}}</td>
                            <td align='left'>{{$row->tieu_de}}</td>
                            <td align='center'>{{$quantity[$row->id]}}</td>
                            <td align='center'>{{number_format($row->gia_ban,0,',','.')}}đ</td>
                            <td align='center'>
                                <form method='post' action = "{{route('cartdelete')}}" >
                                    <input type='hidden' value='{{$row->id}}' name='id'>
                                    <input type='submit' class='btn btn-sm btn-danger' value='Xóa'>
                                    {{ csrf_field() }}
                                </form>
                            </td>
                       </tr>
                       @php
                            $tongTien +=$quantity[$row->id]*$row->gia_ban;
                        @endphp
                    @endforeach
                    <tr>
                        <td colspan='3' align='center'><b>Tổng cộng</b></td>
                        <td><b>{{number_format($tongTien,0,',','.')}}đ</b></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
           
                <div style='font-weight:bold;width:70%;margin:0 auto;text-align:center;'>
                    @auth
                        @if(count($data)>0)
                        <form method='post' action = "{{route('ordercreate')}}" >
                            Hình thức thanh toán <br>
                            <div class='d-inline-flex'>
                                <select name='hinh_thuc_thanh_toan' class='form-control form-control-sm'>
                                    <option value='1'>Tiền mặt</option>
                                    <option value='2'>Chuyển khoản</option>
                                    <option value='3'>Thanh toán VNPay</option>
                                </select>
                            </div><br>
                            <input type='submit' class='btn btn-sm btn-primary mt-1' value='ĐẶT HÀNG'>
                            {{ csrf_field() }}
                        </form>
                        @else
                            <span style="color: red; text-transform: uppercase; font-size: 15px;">
                                Vui lòng chọn sản phẩm cần mua
                            </span>
                        @endif
                        @else
                            <span style="color: blue; text-transform: uppercase; font-size: 15px;">
                                Vui lòng đăng nhập trước khi đặt hàng
                            </span>
                    @endauth
                </div>
            
    </div>

</x-book-layout>

