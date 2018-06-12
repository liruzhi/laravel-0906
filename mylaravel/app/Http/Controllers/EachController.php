<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class EachController extends Controller
{
    public $name;
    public $id;

    function __construct() {    // 给id成员赋一个uniqid
        $this->id = 44444;
    }

    function __sleep() {       //此处不串行化id成员
        return(array('name'));
    }

    function __wakeup() {
        $this->id = 5555555;
    }

    public function index(Request $request)
    {

        echo __NAMESPACE__;die;
        $info = array(
            0 => array(
                'indent' => 1,
                'name' => 'Inbox',
                'color' => '#dddddd',
                'is_deleted' => 0,
                'collapsed' => 0,
                'inbox_project' => true,
                'archived_date' => null,
                'item_order' => 0,
                'is_archived' => 0,
                'archived_timestamp' => 0,
                'user_id' => 3840103,
                'id' => 138837507,
                'children' => array(),
                'parent' => 'root',
            ),
            1 => array(
                'indent' => 1,
                'name' => 'Personal',
                'color' => '#fc603c',
                'is_deleted' => 0,
                'collapsed' => 0,
                'archived_date' => null,
                'item_order' => 1,
                'is_archived' => 0,
                'archived_timestamp' => 0,
                'user_id' => 3840103,
                'id' => 138837508,
                'children' => array(),
                'parent' => 'root',
            ),
            2 => array(
                'indent' => 1,
                'name' => 'Work',
                'color' => '#a8c9e5',
                'is_deleted' => 0,
                'collapsed' => 0,
                'archived_date' => null,
                'item_order' => 2,
                'is_archived' => 0,
                'archived_timestamp' => 0,
                'user_id' => 3840103,
                'id' => 138837509,
                'children' => array(
                    0 => array(
                        'indent' => 2,
                        'name' => 'Work indent 1-1',
                        'color' => '#a8c9e5',
                        'is_deleted' => 0,
                        'collapsed' => 0,
                        'archived_date' => null,
                        'item_order' => 3,
                        'is_archived' => 0,
                        'archived_timestamp' => 0,
                        'user_id' => 3840103,
                        'id' => 139576614,
                        'children' => array(
                            0 => array(
                                'indent' => 3,
                                'name' => 'Work indent 1-2',
                                'color' => '#dddddd',
                                'is_deleted' => 0,
                                'collapsed' => 0,
                                'archived_date' => null,
                                'item_order' => 4,
                                'is_archived' => 0,
                                'archived_timestamp' => 0,
                                'user_id' => 3840103,
                                'id' => 139576626,
                                'children' => array(),
                                'parent' => 139576614,
                            ),
                            1 => array(
                                'indent' => 3,
                                'name' => 'Work indent 1-2 2nd',
                                'color' => '#dddddd',
                                'is_deleted' => 0,
                                'collapsed' => 0,
                                'archived_date' => null,
                                'item_order' => 5,
                                'is_archived' => 0,
                                'archived_timestamp' => 0,
                                'user_id' => 3840103,
                                'id' => 139576629,
                                'children' => array(),
                                'parent' => 139576614,
                            ),
                        ),
                        'parent' => 138837509,
                    ),
                    1 => array(
                        'indent' => 2,
                        'name' => 'Work indent 2-1',
                        'color' => '#a8c9e5',
                        'is_deleted' => 0,
                        'collapsed' => 0,
                        'archived_date' => null,
                        'item_order' => 6,
                        'is_archived' => 0,
                        'archived_timestamp' => 0,
                        'user_id' => 3840103,
                        'id' => 139576622,
                        'children' => array(
                            0 => array(
                                'indent' => 3,
                                'name' => 'Work indent 2-2',
                                'color' => '#dddddd',
                                'is_deleted' => 0,
                                'collapsed' => 0,
                                'archived_date' => null,
                                'item_order' => 7,
                                'is_archived' => 0,
                                'archived_timestamp' => 0,
                                'user_id' => 3840103,
                                'id' => 139576636,
                                'children' => array(),
                                'parent' => 139576622,
                            ),
                        ),
                        'parent' => 138837509,
                    ),
                    2 => array(
                        'indent' => 2,
                        'name' => 'Work indent 3-1',
                        'color' => '#dddddd',
                        'is_deleted' => 0,
                        'collapsed' => 0,
                        'archived_date' => null,
                        'item_order' => 8,
                        'is_archived' => 0,
                        'archived_timestamp' => 0,
                        'user_id' => 3840103,
                        'id' => 139576646,
                        'children' => array(),
                        'parent' => 138837509,
                    ),
                ),
                'parent' => 'root',
            ),
            3 => array(
                'indent' => 1,
                'name' => 'Errands',
                'color' => '#74e8d4',
                'is_deleted' => 0,
                'collapsed' => 0,
                'archived_date' => null,
                'item_order' => 9,
                'is_archived' => 0,
                'archived_timestamp' => 0,
                'user_id' => 3840103,
                'id' => 138837510,
                'children' => array(),
                'parent' => 'root',
            ),
            4 => array(
                'indent' => 1,
                'name' => 'Shopping',
                'color' => '#dddddd',
                'is_deleted' => 0,
                'collapsed' => 0,
                'archived_date' => null,
                'item_order' => 10,
                'is_archived' => 0,
                'archived_timestamp' => 0,
                'user_id' => 3840103,
                'id' => 138837511,
                'children' => array(),
                'parent' => 'root',
            ),
            5 => array(
                'indent' => 1,
                'name' => 'Movies to watch',
                'color' => '#e3a8e5',
                'is_deleted' => 0,
                'collapsed' => 0,
                'archived_date' => null,
                'item_order' => 11,
                'is_archived' => 0,
                'archived_timestamp' => 0,
                'user_id' => 3840103,
                'id' => 138837512,
                'children' => array(),
                'parent' => 'root',
            ),
        );
        $data['projects'] = $info;
        return view('each.list', $data);
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

    public function testSleep()
    {
        $u = new EachController();
        $u->name = "Leo";
        $s = serialize($u); //serialize串行化对象u，此处不串行化id属性，id值被抛弃
        $u2 = unserialize($s); //unserialize反串行化，id值被重新赋值

//对象u和u2有不同的id赋值
        echo "<pre>";
        var_dump($u);
        var_dump($s);
        var_dump($u2);
    }
}


