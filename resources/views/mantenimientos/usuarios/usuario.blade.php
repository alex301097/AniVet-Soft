<div class="text-center">
    <a href="#" class="avatar rounded-circle mr-3">
      @if (empty($imagen))
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-circle" style="width:50px; height:50px; top:50px; left:50px;" alt="User Avatar">
      @else
        <img src=" {{url('imgPerfiles/'.$imagen)}}" class="img-circle" style="width:50px; height:50px; top:50px; left:50px;" alt="User Avatar">
      @endif
    </a>
</div>
