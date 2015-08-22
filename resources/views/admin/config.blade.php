@extends('alayouts.admin')
@section('main')
<form action="{{URL::route('update_config')}}" enctype="multipart/form-data" name="image" method="post" accept-charset="utf-8">
  @include('alayouts.admin.header_create', array('title' => "Cấu hình website"))
  <div class="content-box">
    <div class="content-box-header">
      <h3>Cấu hình website</h3>
      <div class="clear"></div>
    </div>
    <div class="content-box-content">
      <div class="tab-content default-tab" id="tab1">
        <table class="input">
          <tr>
            <td width="120" class="label">Ảnh logo:</td>
            <td><img src="{{$info->logo}}"></td>
          </tr>
          <tr>
            <td width="120" class="label">Thay đổi:</td>
            <td><input name="logo" class="text-input medium-input" type="file"/></td>
          </tr>
          <tr>
            <td width="120" class="label">Hotline:</td>
            <td><input class="text-input medium-input" name="hotline" value="{{$info->hotline}}"></td>
          </tr>
          <tr>
            <td width="120" class="label">Email:</td>
            <td><input class="text-input medium-input" name="email" value="{{$info->email}}"></td>
          </tr>
          <tr>
            <td width="120" class="label">Giới thiệu:</td>
            <td><textarea name="gioithieu">{{$info->gioithieu}}</textarea></td>
          </tr>
        </table>
        <div class="clear"></div>
      </div>
      <div class="tab-content" id="tab2">
        <div class="clear"></div>
      </div>
    </div>
  </div>
</form>
@stop