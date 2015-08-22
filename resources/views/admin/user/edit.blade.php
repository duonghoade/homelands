@extends('alayouts.admin')
@section('main')
<form action="{{URL::route('admin_update_user')}}" enctype="multipart/form-data" name="image" method="post" accept-charset="utf-8">
  @include('alayouts.admin.header_create', array('title' => "Thông tin thành viên"))
  <div class="content-box">
    <div class="content-box-header">
      <h3>Thông tin thành viên</h3>
      <div class="clear"></div>
    </div>
    <div class="content-box-content">
      <div class="tab-content default-tab" id="tab1">
        <table class="input">
          <input type="hidden" name="user_id" value="{{$user->id}}">
          <tr>
            <td width="120" class="label">Tên:</td>
            <td>{{$user->first_name}} <input type="text" class="text-input medium-input" name="last_name" value="{{$user->last_name}}"></td>
          </tr>
          <tr>
            <td width="120" class="label">Email:</td>
            <td><input type="text" class="text-input medium-input" name="email" value="{{$user->email}}"></td>
          </tr>
          <tr>
            <td width="120" class="label">Điện thoại:</td>
            <td><input type="text" class="text-input medium-input" name="phone" value="{{$user->phone}}"></td>
          </tr>
          <tr>
            <td width="120" class="label">Địa chỉ:</td>
            <td><textarea rows="10" name="address">{{$user->address}}</textarea></td>
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