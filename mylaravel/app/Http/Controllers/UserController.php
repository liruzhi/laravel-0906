<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use QL\QueryList;


class UserController extends Controller
{
    
    
    //
    public function exception_test() {
        try {
            // experimental stuff to check whether something works
            throw new \Exception('ddd');
        } catch(\Throwable $e) {
            return false;
        } finally {
            return true;
        };
    }
    
    public function test($a,$b=1,$c,$d,$e = 'e')
    {
        return $a.$b.$c.$d.$e;
    }
    
    public function test1(...$num)
    {
        foreach($num as $n){
            dd(aa);
        }
    }
    
    public function getCount()
    {
        static $count = 0;
        return $count++;
    }
    
    public function objectToArray($object) {
        //先编码成json字符串，再解码成数组
        return json_decode(json_encode($object), true);
    }

    public function returnRedisData($base)
    {
        $name = 'xiaohong';
        $age = 18;
        $info = [
            'name'=>'xiaohong',
            'age'=>18
        ];
        foreach ($info as $key=>$value) {
            $base.= ','.$key.','.$value;
        }
        return $base;
    }
    public function show()
    {
        echo ("\\");die;
        Redis::hmset($this->returnRedisData('user:info:2'));
        dd(Redis::hgetall('user:info:2'));
        $data = $this->returnRedisData('user:info:2');
        dd($data);
        foreach($data as $key=>$value) {
//            Redis::hset('user:info:2',$key, $value);

        }
        dd(Redis::hgetall('user:info:2'));
        dd($this->returnRedisData());
        Redis::hmset($this->returnRedisData());
        dd(Redis::hgetall('data'));
        /* $a = 3;
        $b = 5;
        if ($a = 5 || $b = 7) {
            ++$a;
            $b++;
        }
        $a++;
        echo $a.' '.$b;die;
        
        
        $a = [1,4,6,3,2];
        $b = array_search(max($a),$a);
        dd($b);
        
        
        
        
        $a = [1,2,3,4];
        dd(isset($a[3]));
        $b = array_shift($a);
        dd($a);
        dd($b);
        $a = array(
            null=>1,
            false=>2,
            true=>3,
            1=>4,
            //"1"=>5,
        );
        dd($a);
        $a = 0.2+0.7;
        $b = 0.9;
        dd($a == $b);
        $count = 5;
        ++$count;
        $this->getCount();
        dd($this->getCount());
       
        $a = 3;
        $b = 5;
        if ($a = 5 || $b = 7) {
            ++$a;
            $b++;
        }
        var_dump($a);
        $a++;
        echo $a.' '.$b;die;
        
        $a = 1;
        $b = 2;
        $a == 1 || $b = 3;//$a == 1 && $b = 3;
        dd($b);
        $data[] = 'A';
        $data[] = 'B';
        $data[] = 'C';
        $data[] = 'D';
        
        $result = $this->test(...$data);
        dd($result);
        
        $foo = 'hello';
        $bar = 'world';
        echo $foo, PHP_EOL;
        echo $bar, PHP_EOL;
        dd(isset($foo[4]));
        dd(strlen($foo));
        
        echo $foo[1];die;
        echo $foo, $bar;die;
        echo exif_imagetype("999.gif");die;
        if ($uid = false) {
            dd(111);
        } else {
            dd($uid);
        }
        
        
        $string = 'aaabaab';
        $pattern1 = '/a.{1,10}?b/';
        preg_match_all($pattern1, $string, $matchs1);
        dd($matchs1);die;
        
        
        
        $string = '1234567';
        $pattern = '/(?<=\d)(?=(\d{2})+$)/';
        $replacement = ',';
        echo preg_replace($pattern, $replacement, $string);
        die;
        echo "\\\\\\\$";die;
        $str = 'a';
        $str[100] = 'e';
        var_dump($str);
        echo PHP_EOL;
        die;
        
        echo "this is a pen,\nthis is a pen.";
        echo 'this is a pen,\nthis is a pen.';
        
        echo "\101\102";
        echo "\x41\x42";
        
        echo "\\";
        echo '\\';
        die;
        $a = 012;
        echo $a/4;die;
        
        $a = ['B'=>[1,4,2],'A'=>[],'H','C'];
        $c = [2,5,8,1,4,3];
        $b = sort($a);
        dd($a);
        //dd(empty(0));
        if (null == 0) {
            dd('null == 0');
        }
        $a = 1;
        dd($a['dd']);
        $second = strtotime(date("Y-m-d 00:00:00",strtotime("+2 days")))-time();
        
        //$second = strtotime("+2 days") - time();
        echo $second/(24*60*60);die;
        
        $where['code'] = 'code';
        //dd(isset($where['code']));
        dd(empty($where['code']));
        dd($this->exception_test());
        //throw new \Exception('aaa');
        set_exception_handler(function (\Exception $e){
            dd($e->getCode());
        });
        
        throw new \Exception('ddd');
        
        echo "<b>Exception:</b> " , $exception->getMessage();die;
        try{
            //trigger_error("Number cannot be larger than 10");
            throw new \ErrorException();
            echo 999;
            //echo $this->exception_test(9);
            //throw new \Exception('this is throw',1009);
        } catch (\Exception $e) {
            if ($e->getSeverity() === E_ERROR) {
                echo("E_ERROR triggered.\n");
            } else if ($e->getSeverity() === E_WARNING) {
                echo("E_WARNING triggered.\n");
            } 
        }
        die;
        $exception = new \Exception('测试异常', 1001);
        $code = $exception->getCode();
        $message = $exception->getMessage();
        echo $code.$message;die;
        $test_yield = $this->makeRange(100);
        //dd($test_yield);
        foreach ($test_yield as $value) {
            echo $value."<br>";
        }
        die;
        //秒杀活动
        Redis::watch('sales');
        $sale = Redis::get('sales');
        $store = 2;
        if ($sales >= $store) {
            exit('活动结束');
        }
        Redis::multi();
        Redis::incr('sales');
        //$redis->set('sales');
        $redis::exec();
        if ($res) {
            //swool守护进程
            //更新库存  
        }
        
        
        
        //phpinfo();die;laravel使用redis与PHP有没有redis拓展无关,但要启动本地的redis服务才可以使用
       
        
        //dd(111);
        $a = Redis::watch('sale');
        //Redis::set('sale',999);
        $b = Redis::get('sale');
        //Redis::del('sale');
        var_dump($b);die;
        //正则表达式
        //$pattern = "/\d+.\d+/";
        $pattern = "/\d+/";
        $str = "已付订金 1000 元99";
        $str1 = "指导价 ：25.999 元";
        preg_match_all($pattern,$str,$matches);
        echo "<pre>";
        var_dump($matches);die; */
        
        //爬取车行168
        $cookie_file = tempnam("./",'cookie');
        //http://www.chehang168.com/index.php?c=login&m=Login
        //$url = 'http://www.chehang168.com/index.php?c=login&m=Login';
        $url = 'http://www.niuniuqiche.com/login';
        //$post_fields= 'name=15376737534&pwd=123456abc';//需要提交的数据
        $post_fields = 'authenticity_token=wFVst+TbNAMlCIXoxCgOGhI95rbPdPpkkJDGd5g8Gyu3EyCusvfy8zxEZK/gTmtf0KdogDQ1+3Gexn2OY+wvjA==&user[mobile]=15501205520&user[password]=15501205520&user[remember_me]=0';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);//提交数据
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);//将cookie信息放入到文件中
        curl_exec($ch);
        curl_close($ch); 
        
        
        /* $page = 'http://www.chehang168.com/index.php?c=index&m=index';
        //采集规则
        $rules = array(
            //品牌值
            'brand' => ['#pbid','']
        );
        //列表选择器
        $rang = '#pbid';
        //采集
        $data = QueryList::Query($page,$rules)->data;
        var_dump($data);die; */
        
        //$ch = curl_init('http://www.chehang168.com/index.php?c=index&m=index');
        $ch = curl_init('http://www.niuniuqiche.com/');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
        $content = curl_exec($ch);
        curl_close($ch);
        echo $content;die;
        //#pbid
        //<select name="pbid" id="pbid" onchange="showpserise();" class="list">
        /* $pattern = '/<select[^>]+/';
        preg_match_all($pattern,$content,$matches);
        print_r($matches);die;  */
        
        
         //爬虫
        //POST数据，获取COOKIE,cookie文件放在网站的temp目录下
        /* $login_url = 'http://www.chehang168.com/index.php?c=login&m=index';
        //$login_url = 'http://www.oneapm.com/lp/bifiddler?utm_source=BaiduPaid&utm_medium=cpc&utm_term=Fiddler&utm_content=bi&utm_campaign=BaiduPromotion&from=avvauhckmoobdcqeri';
        $cookie_file = tempnam('./temp','cookie');
        $post_fields = array();
        //U=581776_69fc560d18c78ffc38ca8774ebb244d9; SERVERID=5453c49dad5b9c491daed5aecccecb9e|1515383027|1515382985
        $post_fields['name'] = '15376737534';
        $post_fields['pwd'] = '123456abc';
        $ch = curl_init($login_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
        $contents1 = curl_exec($ch);
        curl_close($ch);
        //登陆以后爬取主页
        $send_url = 'http://www.chehang168.com/index.php?c=index&m=index';
        
        $ch = curl_init($send_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
        $contents = curl_exec($ch);
        curl_close($ch); 
        echo $contents;die;   */
        
        
        
        
        /* //待采集的目标页面，PHPHub教程区
        $page = 'https://laravel-china.org/categories/6';
        //采集规则
        $rules = array(
        //文章标题
        'title' => ['.media-heading a','text'],
        'link' => ['.media-heading a','href'],
        //文章作者名
        'author' => ['.img-thumbnail','alt']
        );
        //列表选择器
        $rang = '.topic-list>li';
        //采集
        $data = QueryList::Query($page,$rules,$rang)->data;
        //查看采集结果
        print_r($data);echo 111;die;


        //phpinfo();die;laravel使用redis与PHP有没有redis拓展无关
        Redis::sAdd('classOne','xiaohong');
        Redis::sAdd('classOne','xiaohua');
        Redis::sAdd('classOne','xiaoqiang');
        Redis::sAdd('classOne','xiaoli');
        Redis::sAdd('classOne','xiaosong');
        
        Redis::sAdd('classTwo','xiaoli');
        Redis::sAdd('classTwo','xiaosong');
        Redis::sAdd('classTwo','xiaohei');
        Redis::sAdd('classTwo','xiaobai');
        Redis::sAdd('classTwo','xiaolan');
        
        $user = Redis::sInter('classOne','classTwo');
        
        
        dd($user); */
    	//phpinfo();die;
        //return "iloveyou";//laravel中对return做了封装，可以输出
        
    } 
    
    /**
     * morden php test yield
     * @param unknown $length
     * @return Generator
     */
    public function makeRange($length) {
        for ($i = 0; $i<$length; $i++) {
            yield $i;
        }
    }
    //方法中的变量时按照顺序传递的，可以不全传递，可以使用其他名字，以顺序定位
    public function edit($use)
    {
    	return "this is edit ------ ".$use;
    }
    //数据库的操作
    public function db()
    {
        $student = DB::select('select * from student');
        dd($student[4]->time);
       /* var_dump('<pre>',$student);
        echo $student[0]->name;*/
       /* $bool = DB::table('student')->insert([
             ['name'=>'aaa','age'=>20,'time'=>time()],
             ['name'=>'bbb','age'=>26,'time'=>time()]
            ]
        );
        dd($bool);*/
    }
    public static function testStatic($type = 1){
        return 9999;
    }
}


