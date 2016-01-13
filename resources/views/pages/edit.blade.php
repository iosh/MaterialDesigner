<!DOCTYPE html>
<html>
    <head>
        <title>{{ $title }}</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('bootstrap/css/sb-admin-2.css')}}">
        
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            }
            .container {
                margin:0 auto;
            }
            .content {
                padding:10px;
            }
            .title {
                font-size: 24px;
            }
            .panel-body::after, .panel-body::before, .row::after, .row::before {
                display: table;
                content: " ";
            }
            *::after, *::before {
                box-sizing: border-box;
            }
             .panel-body::after, .row::after {
                clear: both;
            }
            .form-group {
                margin-bottom: 15px;
            }
            label {
                display: inline-block;
                max-width: 100%;
                margin-bottom: 5px;
                font-weight: 700;
            }
            .form-control {
                display: block;
                width: 100%;
                height: 34px;
                padding: 6px 12px;
                font-size: 14px;
                line-height: 1.42857;
                color: #555;
                background-color: #FFF;
                background-image: none;
                border: 1px solid #CCC;
                border-radius: 4px;
                box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset;
                transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
            }
            .panel {
                width: 50%;
                margin-bottom: 20px;
                background-color: #FFF;
                border: 1px solid #DDD;
                border-radius: 4px;
                box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.05);
            }
            .panel-heading {
                color:#333;
                padding: 10px 15px;
                border-bottom: 1px solid transparent;
                border-top-left-radius: 3px;
                border-top-right-radius: 3px;
            }
            .panel-default {
                border-color: #DDD;
                box-sizing: border-box;
            }
            .panel-default > .panel-heading {
                color: #333;
                background-color: #F5F5F5;
                border-color: #DDD;
            }
            .panel-body {
                padding: 15px;
            }
            .col-lg-12, .col-lg-6 {
                float: left;
            }
            .col-lg-12, .col-lg-6  {
                position:relative;
                min-height:1px;
                padding-right: 15px;
                min-height: 1px;
                padding-right: 15px;
                padding-left: 15px;
            }
            .col-lg-12  {
                width: 100%;
            }
            .col-lg-6  {
                width: 100%;
            }
            textarea.form-control {
                height: auto;
            }
            .form-control {
                display: block;
                width: 100%;
                height: 34px;
                padding: 6px 12px;
                font-size: 14px;
                line-height: 1.42857;
                color: #555;
                background-color: #FFF;
                background-image: none;
                border: 1px solid #CCC;
                border-radius: 4px;
                box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset;
                transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
            }
            button, input, select, textarea {
                font-family: inherit;
                font-size: inherit;
                line-height: inherit;
            }
            * {
                box-sizing: border-box;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="row">
                {!! Form::open(array('url' => 'materials')) !!}
                        <div class="col-lg-12">
                            <div class="title">Designer</div>
                            <!-- panel material -->
                            <div class="panel panel-default">
                                <div class="panel-heading">Material</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                                <div class="form_group">
                                                    {!! Form::label('name', 'Name:') !!}
                                                    {!! Form::text('name') !!}
                                                </div>
                                                <div class="form_group">
                                                    {!! Form::label('description', 'Description:') !!}
                                                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('thumbnail', 'Thumbnail:') !!}
                                                    {!! Form::file('thumbnail') !!}
                                                </div>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Panel Material Options -->
                            <div class="panel panel-default">
                                <div class="panel-heading">Material Option</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                                <div class="form_group">
                                                    {!! Form::label('option_name', 'Name:') !!}
                                                    {!! Form::text('option_name') !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('thumbnail_image', 'Thumbnail Image:') !!}
                                                    {!! Form::file('thumbnail_image') !!}
                                                </div>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                            {!! Form::Submit('Submit', ['ckass' => 'btn btn-primary form-control') !!}
                        </div>
                    {!! Form::close() !!}{!! Form::close() !!}
                </div>
            </div>
        </div>
    </body>
</html>
