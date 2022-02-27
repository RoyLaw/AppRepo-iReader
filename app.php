<?php
require_once __DIR__ . '/vendor/autoload.php';

use Spatie\SimpleExcel\SimpleExcelReader;
use Illuminate\Support\LazyCollection;

$app_counter = SimpleExcelReader::create("app.xlsx")->getRows()->count();

function array_columns($input, $column_keys=null, $index_key=null){
    $result = array();

    $keys =isset($column_keys)? explode(',', $column_keys) : array();

    if($input){
        foreach($input as $k=>$v){

            // 指定返回列
            if($keys){
                $tmp = array();
                foreach($keys as $key){
                    $tmp[$key] = $v[$key];
                }
            }else{
                $tmp = $v;
            }

            // 指定索引列
            if(isset($index_key)){
                $result[$v[$index_key]] = $tmp;
            }else{
                $result[] = $tmp;
            }

        }
    }

    return $result;
}

if(isset($_GET["ca"])){

if($_GET['ca'] == 'appList'){
    
$apps = SimpleExcelReader::create("app.xlsx")->getRows();

$reps = array(
	'code'=>0,
	'msg'=>'',
	'body'=>array(
		'list'=>array_columns($apps,'id,name,icon,appVersion,appSize,appName,appDesc'),
		'page'=>array(
			'currentPage'=>1,
			'pageSize'=>7,
			'totalPage'=>1,
			'totalRecord'=>$app_counter
	        )
	    )
	);
	
}elseif ($_GET['ca'] == 'appInfo') {
    
$app = SimpleExcelReader::create("app.xlsx")->getRows()
  ->filter(function(array $rowProperties) {
       return $rowProperties['appName'] == $_GET['appName'];
    });

$reps = array_columns($app,'id,name,icon,appVersion,appSize,categoryId,appName,appUrl,appDesc,explain');

}else {

$reps = array('record'=>'not found');

}
}else{
    $reps = array('record'=>'something wrong');
}

header("Content-type:application/json");
echo json_encode($reps);