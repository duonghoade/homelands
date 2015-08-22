@extends('alayouts.admin')
@section('main')
<?php $url = "URL::route('admin_new_banner')"?>
@include('alayouts.admin.head', array('title'=>"Sản phẩm", 'url' => $url))
<div class="content-box">
  <div class="content-box-header">
    <div class="clear"></div>
  </div>
  <div class="content-box-content">
    <div class="tab-content default-tab" id="tab1">
      <table width="100%">
        <thead>
          <tr>
            <th width="10px">STT</th>
            <th style="text-align:left;">Email</th>
            <th style="text-align:left;">Tên</th>
            <th style="text-align:left;">Điện thoại</th>
            <th>Xử lý</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <td colspan="9">
              <div class="pagination">
                <span class="disabled">« Trước </span> <span class="disabled"> Tiếp »</span> Page 1 of 1                                
              </div>
              <div class="clear"></div>
            </td>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td style="text-align:left;"><a href="{{URL::route('admin_edit_user', array($user->id))}}">{{$user->email}}</a></td>
              <td style="text-align:left;">{{$user->first_name." ".$user->last_name}}</td>
              <td style="text-align:left;">{{$user->phone}}</td>
              <td>
                <a href="" title="Edit"><img src="/assets/pencil.png" alt="Edit"></a>
                <a href="" title="Delete"><img src="/assets/cross.png" alt="Delete"></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop