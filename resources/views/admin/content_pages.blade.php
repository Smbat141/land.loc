<div style="margin: 0px 50px 0px 50px">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Alias</th>
                <th>Text</th>
                <th>Data</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $key=>$page)
                <tr>
                    <th>{{ $page->id }}</th>
                    <th>{!! Html::link(route('pagesEdit',['page' => $page->id]),$page->name,['alt' => $page->name])!!} </th>
                    <th>{{ $page->alias }}</th>
                    <th>{{ $page->text }}</th>
                    <th>{{ $page->created_at }}</th>
                    <th>
                        {!! Form::open(['url' => route('pagesEdit',['page' => $page->id]),'class'=>'form-horizontal','method'=>'post'])!!}
                            {!! Form::hidden('action','deleted') !!}
                            {!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit'] )!!}
                        {!! Form::close() !!}
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!!Html::link(route('pagesAdd'),'Edit New Page') !!}
</div>