@extends('layouts.app')

@section('css')
@stop

@section('content')
    <div style="width: 100%;height:auto;display: inline-block;border: 1px solid white;position: relative;margin-top:10px;">
        <div style="width: 100%;">
                <div style="width: 100%;border-bottom:none;background:#FFF;">

                    <div style="width: 100%;height: 50px;font-size:15px;color: #000;line-height: 50px;padding-left: 20px;">
                        <div style="color:#FFF;background: red;width: 22px;height: 22px;border-radius:11px;line-height:22px;font-size:13px; text-align: center;"
                             class="glyphicon glyphicon-map-marker"></div>
                        @if($first->type==1)
                            [单选题]
                        @else
                            [多选题]
                        @endif
                    </div>
                </div>
                <div style="width: 100%;height:auto;display: inline-block;background:#FFF;">
                    <div style="width: 100%;height: 90%;padding:20px 20px 0px 60px;">
                        <!--试题区域-->
                        <ul class="list-unstyled question" >
                            <li class="question_title"><strong>{{$first->title}}</strong> </li>
                            @foreach(json_decode($first->item) as $k=>$v)
                            <li class="question_info" onclick="clickTrim('{{$k}}')">
                                <input name="item" type="radio" id="{{$k}}" value="{{$k}}">&nbsp;&nbsp;{{$v}}
                            </li>
                            @endforeach
                          </ul>
                        <!--考题的操作区域-->
                        <div class="operation" style="margin-top: 20px;">
                            <div class="text-right" style="margin-right: 20px;">
                                <div class="form-group" style="color: #FFF;">
                                    <button class="btn btn-success" id="submitQuestions">提交试卷</button>
                                    <button class="btn btn-info" id="nextQuestion">下一题</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        function clickTrim(id){
            if($("#"+id).is(':checked')) {
                if(!$("#"+id).is(':radio')){
                    $("#"+id).prop("checked",false);
                }
            }else{

                $("#"+id).prop("checked","checked");
            }
        }
    </script>
@stop