<div class="container">
        <form action="{{ route('pagesAdd') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group">
                <div class="col-xs-8">
                    <label for="name">Name</label>
                    <input type="text" value="{{old('name')}}" id="name" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-8">
                    <label for="name">Alias</label>
                    <input type="text" value="{{old('alias')}}" id="name" name="alias" class="form-control" placeholder="Alias">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-8">
                    <label for="text">Text</label>
                    <textarea class="form-control" id="text" rows="3"  name="text" placeholder="Text"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-8">
                    <label for="images">Image</label>
                    <input type="file" value="{{old('image')}}" id="images" name="images" class="form-control" value="Enter File">
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