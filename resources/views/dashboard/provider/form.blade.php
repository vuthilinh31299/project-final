@extends('dashboard.layout.index')
@section('content')
<div class="panel-body mt-5">
    <div class="form" >
        <form enctype="multipart/form-data" class="form-validate form-horizontal"  method="POST" action="{{route('dashboard.provider.postCreate')}}">
            {{ csrf_field() }}
            <div class="form-group">
               
                <label for="cname" class="control-label col-lg-2">Tên nhà cung cấp</label>
                <div class="col-lg-5 mb-2">
                  <input class="form-control"  name="title"  type="text" value="{{old('title') ? old('title') : ''}}"/>
                </div>
                @if( count($errors) && $errors->first('title') )
                    <span class="text-danger mt-2 ml-3 mb-2">{{$errors->first('title')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="cname" class="control-label col-lg-2">Chi phí</label>
                <div class="col-lg-5 mb-2">
                  <input class="form-control"  name="price"  type="text" value="{{old('price') ? old('price') : ''}}"/>
                </div>
                @if( count($errors) && $errors->first('price') )
                    <span class="text-danger mt-2 ml-3 mb-2">{{$errors->first('price')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="cname" class="control-label col-lg-2">Số điện thoại</label>
                <div class="col-lg-5 mb-2">
                  <input class="form-control"  name="phone"  type="text" value="{{old('phone') ? old('phone') : ''}}"/>
                </div>
            </div>
            <div class="form-group">
                <label for="cname" class="control-label col-lg-2">Địa chỉ</label>
                <div class="col-lg-5 mb-2">
                  <input class="form-control"  name="address"  type="text" value="{{old('address') ? old('address') : ''}}"/>
                </div>
            </div>
            <div class="form-group">
                <label for="cname" class="control-label col-lg-2">Thời gian mở cửa</label>
                <div class="col-lg-5 mb-2">
                  <input class="form-control"  name="time_start"  type="text" value="{{old('time_start') ? old('time_start') : ''}}"/>
                </div>
            </div>
            <div class="form-group">
                <label for="cname" class="control-label col-lg-2">Thời gian đóng cửa</label>
                <div class="col-lg-5 mb-2">
                  <input class="form-control"  name="time_end"  type="text" value="{{old('time_end') ? old('time_end') : ''}}"/>
                </div>
            </div>
            <div class="form-group">
                <label for="cname" class="control-label col-lg-2">Thời gian du lịch</label>
                <div class="col-lg-5 mb-2">
                  <input class="form-control"  name="time_trip"  type="text" value="{{old('time_trip') ? old('time_trip') : ''}}"/>
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-lg-12 mb-3">Category</div>
                <select class="form-control col-2 ml-3 mb-2" name="category_id">
                    <option value="">Choose a Category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if(old('category_id') && old('category_id') == $category->id) {{'selected'}} @endif>{{$category->title}}</option>
                    @endforeach
                </select>
                @if( count($errors) && $errors->first('category_id') )
                    <span class="text-danger mt-2 ml-3">{{$errors->first('category_id')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="cname" class="control-label col-lg-2">Thành phố</label>
                <div class="col-lg-5 mb-2">
                <select class="form-control col-2 ml-3 mb-2" name="city">
                    <option value="">Choose a Category</option>
                    <option value="DANANG">Đà Nẵng</option>
                    <option value="HOIAN">Hội An</option>
                    <option value="HUE">Huế</option>
                </select>
                </div>
            </div>
            <div class="form-group  ml-3">
                <label>Mô tả:</label>
                <textarea name="description" id="description">{!! old('description') ? old('description') : '' !!}</textarea>
            </div>
            <div class="form-group">
                <label  class="control-label col-lg-2">Ảnh trưng bày</label>
                <input class="form-control control-label col-lg-4 ml-3" name="image"  type="file"  />
            </div>
            <div class="form-group">
                <label  class="control-label col-lg-2">Ảnh đại diện</label>
                <input class="form-control control-label col-lg-4 ml-3" name="avatar"  type="file"  />
            </div>
            <div class="form-group ml-3 mb-4 mt-3">
                <h1 class="mb-4">Menu</h1>
                <input type="hidden" name="menuLength" id="menuLength" value="0">
                <div id="menuMeta">
                </div>
                <button class="btn btn-success mr-2" type="button" onclick=""><i class="fa fa-plus fa-lg"></i></button> Add Menu item
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-primary" type="submit">Save</button>
                    <button class="btn btn-default" type="reset">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script src="admin_asset/vendors/unisharp/laravel-ckeditor/ckeditor.js"></script>

    <script>
  
    </script>
@endsection