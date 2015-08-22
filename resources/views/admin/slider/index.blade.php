@extends('alayouts.admin')
@section('main')

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
            <th style="text-align:left;">Ảnh</th>
            <th style="text-align:left;">Tên</th>
            <th style="text-align:left;">Sản phẩm</th>
            <th>Hiển Thị</a></th>
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
          @foreach ($sliders as $slider)
            <tr>
              <td>{{$slider->id}}</td>
              <td style="text-align:left;"><img src="{{$slider->photo->img}}" width="200"></td>
              <td>{{$slider->name}}</td>
              <td><a target="_blank" href="{{URL::route('auto_show',array($slider->auto->id, AutoSale::make($slider->auto->url())))}}">{{$slider->auto->title()}}</td>
              <td>
                @if ($slider->approved == false)
                  <a href="javascript:void(0);"><img src="/assets/Play-icon.png" alt="Delete"></a>
                @else
                  <a href="javascript:void(0);"><img src="/assets/success-icon.png" alt="Delete"></a>
                @endif
              </td>
              <td>
                <a href="" title="Edit"><img src="/assets/pencil.png" alt="Edit"></a>
                <a href="{{URL::route('admin_delete_slider', array($slider->id))}}" title="Delete"><img src="/assets/cross.png" alt="Delete"></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop