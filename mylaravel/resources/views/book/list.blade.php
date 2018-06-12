<!DOCTYPE html>
<html>
    <head>
        <title>book</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

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
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <form action="/room" method="get">
                <div>
                    <input type="text" class="demo-input" value="{{$dateStart}}" name="dateStart" placeholder="请选择日期" id="dateStart">  ---
                    <input type="text" class="demo-input" value="{{$dateEnd}}" name="dateEnd" placeholder="请选择日期" id="dateEnd">
                </div>
                <div style="line-height:50px">
                    <input type="submit" class="sub" value="查找">
                    <input type="reset"  class="res" onClick="window.location.href='/room'" value="重置">
                </div>
            </form>
            <div class="content">
                <!--垂直方向上的单元格合并-->
                <p>实验室预约情况</p>
                @forelse ($info as $value)
                    <ul>
                        <li>{{$value->name}}</li>
                    </ul>
                @empty
                    no book this day
                @endforelse
                {{--<table align="center" border="1" cellpadding="2" cellspacing="0" width="700px" >
                    <tr>
                        <td>日期</td>
                        <td></td>
                        @for ($i=1; $i<=5;$i++)
                            <td>实验室{{$i}}</td>
                        @endfor
                    </tr>
                    @foreach ($data as $key => $value)
                        <tr>
                            <td rowspan="5">{{$key}}</td><!--第一个单元格垂直方向上合并，改变第一个单元格在垂直方向上的长度，变成原先的两倍，但是表格的高度和长度不变，所以要删除深圳所在的单元格（rowspan="2"意思是第一个单元格现在的长度等于原先两个单元格的长度）-->
                            @for($i=1; $i<=5; $i++)
                                @if ($i != 1)
                                    <tr>
                                @endif
                            <td>课时{{$i}}</td>
                                @for($j=1; $j<=5; $j++)
                                    @if (isset($value[$i][$j]))
                                        <td>{{$value[$i][$j]}}</td>
                                    @else
                                        <td></td>
                                    @endif
                                @endfor
                            </tr>
                        @endfor
                    @endforeach
                </table>--}}
            </div>
        </div>
    </body>
    <script src="{{URL::asset('js/laydate/laydate.js')}}"></script>
    <script>
        lay('#version').html('-v'+ laydate.v);

        //执行一个laydate实例
        laydate.render({
            elem: '#dateStart' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
            elem: '#dateEnd' //指定元素
        });
    </script>
</html>
