@extends('layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="content-body"><!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header bg-light-blue bg-lighten-1">
                    <h4 class="card-title text-white">Update Role</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0 ">
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">


    <p class="card-text"><a href="{{url('/dashboard/roles')}}" class="btn btn-warning">
        <i class="icon-arrow-left3"></i> Go Back</a></p>
                        <hr>
  
          <!-- Update Modal -->

     <form role="form"   method="POST" action="{{ url('/dashboard/edit-role/'.$role->id) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
<div class="form-group">
        <label  for="form-username">Role Name</label>
        <input type="text" name="name" class=" form-control"  value="{{$role->name}}">
    </div>
    <div class="form-group">
        <label  for="form-username">Display Name</label>
        <input type="text" name="display_name"   value="{{$role->display_name}}" class=" form-control">
    </div>
     <div class="form-group">
        <label  for="form-username">Role Description</label>
    <input type="text" class="form-control" name="description" id="" value="{{$role->description}}">
    </div>
 
        <div class="form-group text-left" style="overflow: scroll; max-height: 650px; width:100%;">
            <h3>Permissions</h3>
            <input type="checkbox" id="toggle-all" class="checkbox">Check all
            <hr style="margin-top: -1px;">
            @foreach($permissions as $permission)
           <input type="checkbox" {{in_array($permission->id,$role_permissions)?"checked":""}}  class="checkbox" name="permission[]" value="{{$permission->id}}" > {{$permission->name}} <br>
            @endforeach
        </div>
      <div class="form-group">
        <button type="submit" class="btn btn-info" ><i class="icon-edit"></i> Update Role</button>     
      </div>
</form>
 
<!-- End Update Modal -->
    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<!--/ Zero configuration table -->
@stop

@section('scripts')
<script type="text/javascript">
//select all checkboxes
$("#toggle-all").change(function(){  //"select all" change 
    $(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
});

//".checkbox" change 
$('.checkbox').change(function(){ 
    //uncheck "select all", if one of the listed checkbox item is unchecked
    if(false == $(this).prop("checked")){ //if this item is unchecked
        $("#toggle-all").prop('checked', false); //change "select all" checked status to false
    }
    //check "select all" if all checkbox items are checked
    if ($('.checkbox:checked').length == $('.checkbox').length ){
        $("#toggle-all").prop('checked', true);
    }
});
</script>
@stop