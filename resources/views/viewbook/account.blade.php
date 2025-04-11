<x-book-layout :showCarousel="false" :showNavbar="false">
<x-slot name='title'>
            Tài khoản
        </x-slot>
    @if ($errors->any())
        <div style='color:red;width:30%; margin:0 auto'>
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
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form method = 'post' action="{{route('saveinfo')}}"  enctype="multipart/form-data"
            style='width:30%; margin:0 auto'>
        
        <style>
            .profile-image {
                border-radius: 50%;
            }
        </style>
        <div style="text-align: center;">
            <img src="{{asset('storage/profile/'.$user->photo) }}" width="50px" class='mb-1 profile-image'/> <br>
        </div>
        <label>Tên</label>
        <input type='text' class='form-control form-control-sm' name='name' value="{{$user->name}}">
        <label>Email</label>
        <input type='text' class='form-control form-control-sm' name='email' value="{{$user->email}}">
        <label>Số điện thoại</label>
        <input type='text' class='form-control form-control-sm' name='phone' value="{{$user->phone}}">
        <input type ='hidden' value='{{$user->id}}' name='id'>
        <label>Ảnh đại diện</label><br>
<input type="file" name="photo" id="photo" accept="image/*" class="form-control-file">
        {{ csrf_field() }}
        <div style='text-align:center;'><input type='submit' class='btn btn-primary mt-1' value='Lưu'></div>
    </form>
</x-book-layout>