<html> 
    <body>
    <x-book-layout>
        <x-slot name='title'>
            BOOKSphere
        </x-slot>
        <div id='book-view-div'>
            <div class='list-book'>
                @foreach($data as $row)
                <div class='book'>
                    <a href="{{url('chitiet/'.$row->id)}}">
                        <img src="{{$row->link_anh_bia}}" width='200px' height='200px'><br>
                        <b>{{$row->tieu_de}}</b><br/>
                        <i>{{number_format($row->gia_ban,0,",",".")}}đ</i>
                    </a>
                <!--- Tạo nút Thêm vào giỏ hàng tại trang chủ --->
                <div class='btn-add-product'>
                    <button class='btn btn-success btn-sm mb-1 add-product' book_id="{{$row->id}}">
                        Thêm vào giỏ hàng
                    </button>
                </div> 
                </div>

                @endforeach
            </div>
        </div>

        <style>
            .list-book {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 20px;
                margin-bottom: 20px; /* Add margin to prevent overlap with footer */
            }

            .book {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                height: 100%;
            }

            .btn-add-product {
                margin-top: auto;
            }
        </style>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script>
            $(document).ready(function(){
                $(".add-product").click(function(){
                    id = $(this).attr("book_id");
                    num = 1;
                    $.ajax({
                        type:"POST",
                        dataType:"json",
                        url: "{{route('cartadd')}}",
                        data:{"_token": "{{ csrf_token() }}","id":id,"num":num},
                        beforeSend:function(){
                        },
                        success:function(data){
                            $("#cart-number-product").html(data);
                        },
                        error: function (xhr,status,error){
                        },
                        complete: function(xhr,status){
                        }
                    });
                });
            });
        </script>

        <script>
            $(".menu-the-loai").click(function(){
                event.preventDefault();  // Ngăn không cho trang bị reload
                the_loai = $(this).attr("the_loai");
                console.log("Thể loại được chọn: " + the_loai);  // Kiểm tra giá trị

                $.ajax({
                    type:"POST",
                    dataType:"html",
                    url: "{{route( 'bookview')}}",
                    data:{"_token": "{{ csrf_token() }}","the_loai":the_loai},
                    beforeSend:function(){
                        /*console.log("Đang tải dữ liệu...");
                        $("#book-view-div").html("Đang tải...");*/
                    },
                    success:function(data){
                        $("#book-view-div").html(data);
                    },
                    error: function (xhr,status,error){
                        /*console.error("Lỗi: " + error);
                        console.log(xhr.responseText);
                        $("#book-view-div").html("Đã xảy ra lỗi, vui lòng thử lại sau.");*/
                    },
                    complete: function(xhr,status){
                       // console.log("Yêu cầu đã hoàn tất");
                    }
                });
            });
        </script>
 
    </x-book-layout>
    </body>
</html>
