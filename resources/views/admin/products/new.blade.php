@extends('layouts.admin')
@section('main')
<form action="" enctype="multipart/form-data" name="image" id="HangAddForm" method="post" accept-charset="utf-8">
  @include('layouts.admin.header_create', array('title' => "Thêm danh mục sản phẩm"))
  <div class="content-box">
    <div class="content-box-header">
      <h3>Thêm mới sản phẩm</h3>
      <div class="clear"></div>
    </div>
    <div class="content-box-content">
      <div class="tab-content default-tab" id="tab1">
        <table class="input">
          <tr>
            <td width="120" class="label">Tên danh mục:</td>
            <td><input name="name" class="text-input medium-input" type="text"/></td>
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