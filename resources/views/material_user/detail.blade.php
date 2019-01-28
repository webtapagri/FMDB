<div class="col-md-5">
    <div class="sp-wrap text-center">
        @foreach($data as $row)
            {{ $row->file_name }}
            <!-- <a href="{{ $row->file_image  }}"><img src="{{ $row->file_image  }}" alt="" class="img-responseive"></a> -->
       @endforeach
    </div>
</div>
<div clas="col-md-7"></div>