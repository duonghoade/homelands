@extends('alayouts.admin')
@section('main')
<form action="{{URL::route('admin_create_slider')}}" enctype="multipart/form-data" name="image" id="HangAddForm" method="post" accept-charset="utf-8">
  @include('alayouts.admin.header_create', array('title' => "Thêm slide"))
  <div class="content-box">
    <div class="content-box-header">
      <h3>Thêm mới sản phẩm</h3>
      <div class="clear"></div>
    </div>
    <div class="content-box-content">
      <div class="tab-content default-tab" id="tab1">
        <table class="input">
          <tr>
            <td width="120" class="label">Tên slider:</td>
            <td><input name="name" class="text-input medium-input" type="text"/></td>
          </tr>
          <tr>
            <td width="120" class="label">Ảnh:</td>
            <td><input name="img" class="text-input medium-input" type="file"/></td>
          </tr>
          <tr>
            <td width="120" class="label">Liên kết đến tin đăng:</td>
            <td>
              <select name="auto_id">
                @foreach ($products as $product)
                  <option value="{{$product->id}}">{{$product->auto->title()}}</option>
                @endforeach
              </select>
            </td>
          </tr>
          <tr>
            <td width="120" class="label">Kích hoạt:</td>
            <td>
              <select name="approved">
                <option value="true">Có</option>
                <option value="false">Không</option>
              </select>
            </td>
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