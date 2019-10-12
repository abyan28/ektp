@extends('admin.layout')

@section('styles')
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@stop

@section('scripts')
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block'],

            [{ 'header': 1 }, { 'header': 2 }],               // custom button values
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent

            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            [{ 'color': [] }],          // dropdown with defaults from theme
            [{ 'font': [] }],
            [{ 'align': [] }],

            ['image', 'clean']                                         // remove formatting button
        ];
        var quill = new Quill('#editor', {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'Content of the post',
            theme: 'snow'  // or 'bubble'
        });

        var form = document.querySelector('form');
        form.onsubmit = function() {
            // Populate hidden form on submit
            var description = document.querySelector('input[name=description]');
            description.value = quill.root.innerHTML;
            return true;
        };

        function getSubCategory(that){
            var value 		= $(that).val();
            console.log(value);
            if(value==""){
                var html 	= '<option value="" >Please select the sub category</option>';
                $("#subCategory").html(html);
                $("#subCategory").prop('disabled',true);
                return;
            }

            $.ajax({
                url:'{{ route('admin.sub_category.show', 0) }}',
                method: 	"GET",
                data:  		{'id':value}
            })

            .done(function(data){
                console.log(data);
                if(data.success==true){

                    var html 	= '<option value="" >Please select the sub category</option>';

                    $.each(data.data , function(key, result) {
                        html +='<option value="'+result.id+'">'+result.name+'</option>';
                    });

                    $("#subCategory").html(html);
                    $("#subCategory").prop('disabled',false);
                    return;
                }
            })
            .fail(function(e) {
                alert("something wrong");
                console.log(e);
            })
        }
    </script>
@stop

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.index') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Blog</li>
    <li class="breadcrumb-menu d-md-down-none">
        <div class="btn-group" role="group" aria-label="Button group">
            <a class="btn" href="{{ route('admin.article.create') }}">
                <i class="icon-plus"></i>  Add Post</a>
        </div>
    </li>
@stop

@section('content')
    <!-- /.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-edit"></i>Form Post</div>
                <div class="card-body">
                    @if (Session::has('status'))
                        <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
                    @endif
                    @if ($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form class="form-horizontal" action="{{ route('admin.article.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-form-label" for="title">Title</label>
                            <div class="controls">
                                <input class="form-control" id="title" size="16" type="text" name="title" placeholder="Title of the post" value="{{ old('title') }}" required>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-form-label" for="author">Author</label>
                            <div class="controls">
                                <input class="form-control" id="author" type="text" name="author" placeholder="Name of the author" value="{{ old('author') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="category">Category</label>
                            <div class="controls">
                                <select onchange="getSubCategory(this)" class="form-control" id="category" name="category_article_id" required>
                                    <option>Please select the category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="subCategory">Sub Category</label>
                            <div class="controls">
                                <select class="form-control" id="subCategory" name="sub_category_id" required disabled>
                                    <option>Please select the category</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="editor">Description</label>
                            <div class="controls">
                                <div id="editor"></div>
                                <input type="hidden" name="description">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="img-container">Image</label>
                            <div class="controls">
                                <img class="img-fluid" id="img-container" alt="Image History" width="100" height="100" src="{{ asset('static/admin/img/default.png') }}" />
                                <input type="file" onchange="document.getElementById('img-container').src = window.URL.createObjectURL(this.files[0])" name="image" required>
                            </div>
                            <span class="help-block">Maximum allowed size is 2MB</span>
                        </div>
                        <div class="form-actions">
                            <button class="btn btn-primary" type="submit">Save changes</button>
                            <a href="{{ route('admin.article.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- /.row-->
@stop