<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use QL\QueryList;


class RoomController extends Controller
{
    public function index(Request $request)
    {
        $dateStart = $request->input('dateStart');
        $data['dateStart'] = $dateStart;
        $dateEnd = $request->input('dateEnd');
        $data['dateEnd'] = $dateEnd;
        //laravel版本过低无法使用when，只能用以下判断（高版本laravel可以使用when简化程序）
        if ($dateStart && $dateEnd) {
            $info = DB::table('book')
                ->leftJoin('teacher', 'book.teacher_id', '=', 'teacher.id')
                ->where('book.book_date','>=',$dateStart)
                ->where('book.book_date','<=',$dateEnd)
                ->get();
        } elseif ($dateStart && !$dateEnd) {
            $info = DB::table('book')
                ->leftJoin('teacher', 'book.teacher_id', '=', 'teacher.id')
                ->where('book.book_date','>=',$dateStart)
                ->get();
        } elseif (!$dateStart && $dateEnd) {
            $info = DB::table('book')
                ->leftJoin('teacher', 'book.teacher_id', '=', 'teacher.id')
                ->where('book.book_date','<=',$dateEnd)
                ->get();
        } else {
            $info = DB::table('book')
                ->leftJoin('teacher', 'book.teacher_id', '=', 'teacher.id')
                ->get();
        }

        /*$info = $this->objToArray($info);
        $book = [];
        foreach ($info as $value) {
            $book[$value['book_date']][$value['class']][$value['lib']] = $value['name'];
        }*/
//        $data['data'] = $book;
        $data['info'] = [];
        return view('book.list', $data);
    }

    /**
     * 将对象转化为数组
     * @param $data
     * @return mixed
     */
    private function objToArray($data)
    {
        return json_decode(json_encode($data),true);
    }
}


