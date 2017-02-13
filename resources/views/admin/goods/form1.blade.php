{{-- 这里提交的路径一定不要写错了 --}}

<style>
    .tab_title {
        width: auto;
    }
    .tab_h {
        display: inline-block;
    }
    
</style>
<form class="form-inline" method="POST" action="{{ isset($model) ? url('admin/goods/'.$model->id) : url('admin/goods')}}" >
    
    @if(isset($model))
    <input type="hidden" name="_method" value="PATCH">
    @endif
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td class="tab_title"><label class="tab_h text-center">商品名称</label></td>
                <td><input class="form-control" type="text"/></td>
                <td class="tab_title"><label class="text-center">价格</label></td>
                <td><input class="form-control" type="text"/></td>
                
                <td class="tab_title"><label class="text-center">库存</label></td>
                <td><input class="form-control" type="text"/></td>
            </tr>
            
            <tr>
                <td class="tab_title"><label class="text-center">商品名称</label></td>
                <td><input class="form-control" type="text"/></td>
                <td class="tab_title"><label class="text-center">价格</label></td>
                <td><input class="form-control" type="text"/></td>
                
                <td class="tab_title"><label class="text-center">库存</label></td>
                <td><input class="form-control" type="text"/></td>
            </tr>
            <tr>
                <td class="tab_title"><label class="text-center">商品名称</label></td>
                <td><input class="form-control" type="text"/></td>
                <td class="tab_title"><label class="text-center">价格</label></td>
                <td><input class="form-control" type="text"/></td>
                
                <td class="tab_title"><label class="text-center">库存</label></td>
                <td><input class="form-control" type="text"/></td>
            </tr>
            <tr>
                <td class="tab_title"><label class="text-center">商品名称</label></td>
                <td><input class="form-control" type="text"/></td>
                <td class="tab_title"><label class="text-center">价格</label></td>
                <td><input class="form-control" type="text"/></td>
                
                <td class="tab_title"><label class="text-center">库存</label></td>
                <td><input class="form-control" type="text"/></td>
            </tr>
            
        </tbody>
    </table>
    
</form>

@section('script')
@parent

@stop


