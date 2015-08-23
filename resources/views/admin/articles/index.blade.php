@extends('alayouts.admin')
@section('main')
<?php $url = URL::route('admin_new_sale')?>
@include('alayouts.admin.head', array('title'=>"Danh sách tin đăng", 'url' => $url))
<style>
  .inlai {
    display: inline;
  }
</style>
<script>
  $(function () {
    
    $("[id^=approved_]").click(function () {
      var url = $("#approved_path").val();
      var current = $(this)
      var id = $(this).attr('id');
      var attr = id.split("_")[1];
      var auto_sale_id = $("#auto_sale_id_"+attr).val();
      $.ajax({
        url: url,
        type: 'GET',
        data: {id: auto_sale_id},
        cache: false,
        success:function(data){
          $("#approved_"+attr).hide("fsfs");
          console.log(data);
          if (data == false) {
            $("#red_"+attr).show();
          }
          if (data == true) {
            $("#green_"+attr).show();
          }
          
          
        }
      });
    });
  });
</script>
{{$carbon}}
<div class="content-box">
  <div class="content-box-header">
    <div class="clear"></div>
  </div>
  <div class="content-box-content">
    <div class="tab-content default-tab" id="tab1">
      <table width="100%">
        <thead>
          <tr>
            <th width="2%">STT</th>
            <th width="12%" style="text-align:center;">Ảnh</th>
            <th width="20%" style="text-align:center;">Tên sản phẩm</th>
            <th width="15%" style="text-align:center;">Thuộc thành viên</th>
            <th width="11%">Ngày bắt đầu</th>
            <th width="11%">Ngày kết thúc</th>
            <th width="12%">Xử lý</th>
            <th width="12%">Duyệt tin</th>
            <th width="12%">Update</th>
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
          <?php $i = 1?>
          <input type="hidden" value="{{URL::route('auto_sale_approved')}}" id="approved_path">
          @foreach ($sales as $sale)
            <tr>
              <td>{{$sale->id}}</td>
              <td style="text-align:center;"><img src="{{$sale->auto->photos->first()->img}}" width="100"></td>
              <td><a href="{{URL::route('admin_edit_sale', array($sale->id))}}">{{$sale->auto->title()}}</a>  </td>
              <td>{{$sale->user->email}}</td>
              <td>{{$sale->start_date}}</td>
              <td>{{$sale->end_date}}</td>
              <td>
                <a href="{{URL::route('admin_edit_sale', array($sale->id))}}" title="Edit"><img src="/assets/pencil.png" alt="Edit"></a>
                <a href="{{URL::route('admin_delete_sale', array($sale->id))}}" title="Delete"><img src="/assets/cross.png" alt="Delete"></a>
              </td>
              <td>
                <input type="hidden" value="{{$sale->id}}" id="auto_sale_id_{{$i}}">
                <div id="approved_{{$i}}">
                  @if ($sale->approved == false)
                    <a href="javascript:void(0);"><img src="/assets/Play-icon.png" alt="Delete"></a>
                  @else
                    <a href="javascript:void(0);"><img src="/assets/success-icon.png" alt="Delete"></a>
                  @endif
                </div>
                <div style="display:none" id="red_{{$i}}"><img src="/assets/Play-icon.png"></div>
                <div style="display:none" id="green_{{$i}}"><img src="/assets/success-icon.png"></div>
              </td>
              <td>
                <a href="{{URL::route('update_sale', array($sale->id))}}">Update({{$sale->update_count}})</a>
              </td>
            </tr>
            <?php $i++?>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop