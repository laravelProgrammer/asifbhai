@if(session('msg'))
<div class="alert alert-primary alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{session('msg')}}
</div>
 @endif