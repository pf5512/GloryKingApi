@extends('admin.layout.html')

@section('content')
    <section class="vbox">
        <section class="scrollable padder">
            <div class="m-b-md">
                <h3 class="m-b-none">添加专题</h3>
            </div>
            <form class="form-horizontal" data-validate="parsley" id="add-theme-form"
                  action="{{ action('Admin\ThemeController@postAddTheme') }}" method="POST">
                <section class="panel panel-default">
                    <header class="panel-heading">
                        <strong>添加专题</strong>
                    </header>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">标题</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="name" data-required="true"
                                       placeholder="请输入标题"
                                       data-error-message="请输入标题">
                            </div>
                        </div>
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">关联视频</label>
                            <div class="col-sm-8">
                                <div class="input-group search-element-group">
                                    <input type="text" class="form-control"
                                           placeholder="输入名称检索"
                                    >
                                    <span class="input-group-btn">
                                           <button class="btn btn-default " type="button">检索</button>
                                    </span>
                                    <div class="search-choice-items">
                                        {{--<ul>--}}
                                            {{--<li>标题1</li>--}}
                                            {{--<li>标题1</li>--}}
                                        {{--</ul>--}}
                                    </div>
                                </div>
                                <div class="relation-element">
                                    <div class="table-responsive">
                                        <table class="table table-striped b-t b-light">
                                            <thead>
                                            <tr>
                                                <th width="80">ID编号</th>
                                                <th>标题</th>
                                                <th width="120">操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">封面图</label>
                            <div class="col-sm-4 upload-file-container">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否启用</label>
                            <div class="col-sm-10">
                                <label class="switch">
                                    <input type="checkbox" name="disabled" checked >
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">排序值</label>
                            <div class="col-sm-4">
                                <input type="number" value="0" name="sort" min="0" max="1000" data-type="number"
                                       data-required="true" class="form-control" data-error-message="请输入排序值">
                            </div>
                        </div>
                        <div class="line line-dashed b-b line-lg pull-in"></div>
                        <div class="form-group text-right">
                            <div class="col-sm-4 ">
                                <button type="submit" class="btn btn-success btn-s-xs">确定</button>
                            </div>
                        </div>
                    </div>
                </section>
            </form>

        </section>
    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
@stop


@section('foot_script')

    <link rel="stylesheet" href="/js/chosen/chosen.css" type="text/css"/>
    <script src="/js/parsley/parsley.min.js"></script>
    <script src="/js/parsley/parsley.extend.js"></script>
    <script src="/js/chosen/chosen.jquery.min.js"></script>
    <script src="/js/admin/jquery.ajaxfileupload.js"></script>
    <script src="/js/admin/add-theme.js"></script>

    <script>

        var uploadUrl = "{{ action("Admin\CommonController@postUploadImage") }}";
        var searchUrl = "{{ action("Admin\ElementController@searchElement") }}"
        $(function () {
            //图片上传
            $.uploadImg($('.upload-file-container'), {
                'uploadUrl': "{{ action("Admin\CommonController@postUploadImage") }}",
                'uploadParams': {
                    _token: $('meta[name=csrf-token]').attr('value')
                }
            });
        });
    </script>
@stop