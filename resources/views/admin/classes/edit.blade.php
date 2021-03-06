@extends('layouts.app')

@section('content')
    {!! Form::model($teacher, ['method' => 'PUT', 'route' => ['admin.classes.update', $teacher->id]]) !!}


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('teacher_user_id', 'Teacher*', ['class' => 'control-label']) !!}
                    {!! Form::select('teacher_user_id', $teachers, old('teacher_user_id') ?: $teacher->id , ['class' => 'form-control select2', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('teacher_user_id'))
                        <p class="help-block">
                            {{ $errors->first('teacher_user_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('student_user_id', 'Students*', ['class' => 'control-label']) !!}
                    {!! Form::select('student_user_id[]', $students, old('student_user_id') ? old('student_user_id') : $teacher->students->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('student_user_id'))
                        <p class="help-block">
                            {{ $errors->first('student_user_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('course_id', 'Course*', ['class' => 'control-label']) !!}
                    {!! Form::select('course_id', $courses, old('course_id'), ['class' => 'form-control select2', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('course_id'))
                        <p class="help-block">
                            {{ $errors->first('course_id') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

