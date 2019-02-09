<div class="container">
    <form action="{{ route('pagesEdit',$data['id']) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
            <div class="col-xs-8">
                <input type="hidden" name="id" value="{{$data['id']}}">
                <label for="name">Name</label>
                <input type="text" value="{{$data['name']}}" id="name" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-8">
                <label for="name">Alias</label>
                <input type="text" value="{{$data['alias']}}" id="name" name="alias" class="form-control" placeholder="Alias">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-8">
                <label for="text">Text</label>
                <textarea class="form-control" id="text" rows="3"  name="text" placeholder="Text">{{$data['text']}}</textarea>
            </div>
        </div>
        <div class="form-control-file">
            <div class="col-xs-8">
                <label for="images">Image</label>
                <input type="hidden" name="images" value="{{$data['images']}}">
                <input type="file" value="{{$data['images']}}" id="images" name="images" class="form-control">
                {{$data['images']}}
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-8">
                <button type="submit" class="btn btn-primary mb-2">Save</button>
            </div>
        </div>

    </form>
    <script>
        CKEDITOR.replace('text')
    </script>
</div>