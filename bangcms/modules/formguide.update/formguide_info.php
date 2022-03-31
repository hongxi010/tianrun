<?php
defined('IN_BANGCMS') or exit('No permission resources.');
bc_base::load_app_class('admin','admin',0);

class formguide_info extends admin {
	
	private $db, $f_db, $tablename;
	public function __construct() {
		parent::__construct();
		$this->db = bc_base::load_model('sitemodel_field_model');
		$this->f_db = bc_base::load_model('sitemodel_model');
		$this->ff_db = bc_base::load_model('sitemodel_field_model');
		bc_base::load_sys_class('form');
		$_GET['formid'] = $_GET['formid'] ? $_GET['formid']:23;
		if (isset($_GET['formid']) && !empty($_GET['formid'])) {
			$formid = intval($_GET['formid']);
			$f_info = $this->f_db->get_one(array('modelid'=>$formid, 'siteid'=>$this->get_siteid()), 'tablename');
			$this->tablename = 'form_'.$f_info['tablename'];
			$this->db->change_table($this->tablename);
		}
	}
	
	/**
	 * 用户提交表单信息列表
	 */
	public function init() {
		
		if (!isset($_GET['formid']) || empty($_GET['formid'])) {
			showmessage(L('illegal_operation'), HTTP_REFERER);
		}
		$formid = intval($_GET['formid']);
		if (!$this->tablename) {
			$f_info = $this->f_db->get_one(array('modelid'=>$formid, 'siteid'=>$this->get_siteid()), 'tablename');
			$this->tablename = 'form_'.$f_info['tablename'];
			$this->db->change_table($this->tablename);
		}
		$page = max(intval($_GET['page']), 1);
		//$right_menu = array('?m=formguide&c=formguide_info&a=export_excel&formid='.$formid.'&pc_hash='.$_GET['pc_hash'],'导出Excel');
		if($formid == 23){
			$where =array();
			if($_GET['area']){
				$where[] = "warea = '".$_GET['area']."'";
			}
			if($_GET['ptype']){
				$where[] = "ptype = '".$_GET['ptype']."'";
			}
			if($_GET['level']){
				$where[] = "level = '".$_GET['level']."'";
			}
			if($_GET['jobname']){
				$where[] = "job like '%".$_GET['jobname']."%'";
			}
			if($_GET['name']){
				$where[] = "name like '%".$_GET['name']."%'";
			}
			if($_GET['sex']){
				$where[] = "sex = '".$_GET['sex']."'";
			}
			if($_GET['edu']){
				$where[] = "edu1 = '".$_GET['edu']."'";
			}
			if($_GET['start_time']){
				$start = strtotime($_GET['start_time']);
				$where[] = "datetime >= ".$start;
			}
			if($_GET['end_time']){
				$end = strtotime($_GET['end_time']);
				$where[] = "datetime <= ".$end;
			}
			$wheres = join(' and ',$where);
			
			$r = $this->db->get_one($wheres, "COUNT(dataid) sum");
			$total = $r['sum'];
			if($_GET['doexplode']=='导出'){
				
				if($total>0){
					$expdata = $this->db->select($wheres, '*', 10000000000, '`dataid` DESC');
					self::export_excel_23($expdata);
				}else{
					showmessage('对不起，没有查询到符合条件的数据');
				}
			}
			$this->f_db->update(array('items'=>$total), array('modelid'=>$formid));
			$pages = pages($total, $page, 20);
			$offset = ($page-1)*20;
			$datas = $this->db->select($wheres, '*', $offset.', 20', '`dataid` DESC');
			
			//地域
			$boxarea = self::getbox(366);
			//职位类型
			$boxjob = self::getbox(288);
			$boxlevel = self::getbox(370);
			$boxsex = self::getbox(269);
			$boxedu = self::getbox(277);
			include $this->admin_tpl('formguide_info_list_23');
		}else{
			$r = $this->db->get_one(array(), "COUNT(dataid) sum");
			$total = $r['sum'];
			$this->f_db->update(array('items'=>$total), array('modelid'=>$formid));
			$pages = pages($total, $page, 20);
			$offset = ($page-1)*20;
			$datas = $this->db->select(array(), '*', $offset.', 20', '`dataid` DESC');
			$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=formguide&c=formguide&a=add\', title:\''.L('formguide_add').'\', width:\'700\', height:\'500\', lock:true}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', L('formguide_add'));
			include $this->admin_tpl('formguide_info_list');
		}
		
	}
	
	/**
	 * 查看
	 */
	public function public_view() {
		if (!$this->tablename || !isset($_GET['did']) || empty($_GET['did'])) showmessage(L('illegal_operation'), HTTP_REFERER);
		$did = intval($_GET['did']);
		$formid = intval($_GET['formid']);
		$info = $this->db->get_one(array('dataid'=>$did));
		bc_base::load_sys_class('form', '', '');
		define('CACHE_MODEL_PATH',BANGCMS_PATH.'caches'.DIRECTORY_SEPARATOR.'caches_model'.DIRECTORY_SEPARATOR.'caches_data'.DIRECTORY_SEPARATOR);
		require CACHE_MODEL_PATH.'formguide_output.class.php';
		$formguide_output = new formguide_output($formid);
		$forminfos_data = $formguide_output->get($info);
		$fields = $formguide_output->fields;
		include $this->admin_tpl('formguide_info_view');
	}
	/**
	 * 打印
	 */
	public function printer() {
		if (!$this->tablename || !isset($_GET['did']) || empty($_GET['did'])) showmessage(L('illegal_operation'), HTTP_REFERER);
		$did = intval($_GET['did']);
		$formid = intval($_GET['formid']);
		//标记该数据为已打印
		if($data['isprint'] !=1 ){
			$this->db->update(array('isprint'=>1),array('dataid'=>$did));
		}
		$data = $this->db->get_one(array('dataid'=>$did));
		$data['addrl'] = str_replace('-请选择','',$data['addrl']);
		include $this->admin_tpl('formguide_info_printer');
	}
	/**
	 * 删除
	 */
	public function public_delete() {
		$formid = intval($_GET['formid']);
		if (isset($_GET['did']) && !empty($_GET['did'])) {
			$did = intval($_GET['did']);
			$this->db->delete(array('dataid'=>$did));
			$this->f_db->update(array('items'=>'-=1'), array('modelid'=>$formid));
			showmessage(L('operation_success'), HTTP_REFERER);
		} else if(is_array($_POST['did']) && !empty($_POST['did'])) {
			foreach ($_POST['did'] as $did) {
				$did = intval($did);
				$this->db->delete(array('dataid'=>$did));
				$this->f_db->update(array('items'=>'-=1'), array('modelid'=>$formid));
			}
			showmessage(L('operation_success'), HTTP_REFERER);
		} else {
			showmessage(L('illegal_operation'), HTTP_REFERER);
		}
	}
	
	/**
	 * box字段
	 */
	public function  getbox($fieldid){
		$this->db->change_table('model_field');
		$f = $this->db->get_one(array('fieldid'=>$fieldid));
		$setting = string2array($f['setting']);
		
		$box_value = explode("\n",$setting['options']);
		$box = array();
		foreach ($box_value as $v) {
			$value = explode("|",$v);
			$box[$value[0]] = trim($value[1]);	
		}
		return $box;
	}
	/**
	 * 查询导出excel
	 */
	public function  export_excel(){
		$formid = intval($_GET['formid']);
		$resultPHPExcel= bc_base::load_sys_class('PHPExcel');
		
		$field = $this->db->get_fields($this->tablename);
		$num = count($field);
		$arr = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$i = 0;
		$box = array();
		$is_box = array();
		foreach($field as $k=>$f){
			$this->db->change_table('model_field');
			$result = $this->db->get_one(array('modelid'=>$formid, 'siteid'=>$this->get_siteid(),'field'=>$k),'field,name,setting,formtype');
			$name = $name?$result['name']:$k;
			$resultPHPExcel->getActiveSheet()->setCellValue($arr[$i].'1', $name);
			//保存box类型选项值
			if(isset($result['formtype'])&&$result['formtype']=='box'){
				array_push($is_box,$result['field']);
				$setting = string2array($result['setting']);
				$box_value = explode("\n",$setting['options']);
				foreach ($box_value as $v) {
					$value = explode("|",$v);
					$box[$result['field']][trim($value[1])] = $value[0];
				}
			}
			$i++;
			if($i>=26){
				$column = $arr[($i/26)-1].$arr[$i%26];
				array_push($arr,$column);
			}
		}
		
		$this->db->change_table($this->tablename);
		$info = $this->db->select();
		$j=2;
		foreach($info as $data){
			$i=0;
			foreach($data as $f =>$v){
				if($f=='datetime'&&is_numeric($v)){
					$v = date('Y-m-d',$v); 
				}
				if(in_array($f,$is_box)){
					$v = $box[$f][$v];
				}
				$resultPHPExcel->getActiveSheet()->setCellValueExplicit($arr[$i].$j, $v); 
				$i++;
			}
			$j++;
		}
		//设置导出文件名 
		$excel_name = $this->f_db->get_one(array('modelid'=>$formid, 'siteid'=>$this->get_siteid()), 'name');
		$outputFileName = $excel_name['name'].'.xls'; 
		$xlsWriter = new PHPExcel_Writer_Excel5($resultPHPExcel); 
		//ob_start(); ob_flush(); 
		header("Content-Type: application/force-download"); 
		header("Content-Type: application/octet-stream"); 
		header("Content-Type: application/download"); 
		header('Content-Disposition:inline;filename="'.$outputFileName.'"'); 
		header("Content-Transfer-Encoding: binary"); 
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
		header("Pragma: no-cache"); 
		$xlsWriter->save( "php://output" );
	}
	/**
	 * 查询导出excel
	 */
	public function  export_excel_23($info){
		$resultPHPExcel= bc_base::load_sys_class('PHPExcel');
		$arr = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		
		$sub = array('人员编号','来源','姓名','曾用名','面试地区','职位类别','面试职位','面试职级','期望薪资','入职时间','手机号码','性别','婚否','生育状况','出生日期','年龄','民族','政治面貌','身份证号','社保卡号','户口性质','籍贯','户口所在地地址','档案所在地','在京住址（分公司住址）','在京固定电话','京外住址','京外固定电话','QQ或微信','电子邮箱','紧急联系人','紧急情况联系人与您的关系','联系人电话','最高学历毕业院校','所学专业','最高学历','最高学位','第二学历毕业院校','第二专业','第二学历','第二学位','外语语种','外语等级','培训经历','获得职业资格认证','获得过哪些奖项','原工作单位1','工作时间','职务','证明人及联系方式','原工作单位2','工作时间','职务','证明人/服务过的客户','文体特长','疾病史','长期服用药物','家庭成员','关系','年龄','现况','职务','联系方式','第二家庭成员','关系','年龄','现况','职务','联系方式','第三家庭成员','关系','年龄','现况','职务','联系方式','服务行业','服务客户');
		//
		$field = array('dataid','from','name',0,'warea','ptype','job','level','salary2',0,'mobile','sex','marry','child',0,0,0,0,'ID',0,0,0,'residence',0,'addrl',0,0,0,'qq','email',0,0,0,'school1','major1','edu1',0,'school2','major2','edu2',0,'seclanguage',0,0,'certificate',0,'company1',0,'job1','supname1','company2',0,'job2','supname2',0,0,0,'fname1','父亲','fage1',0,'fpost1','ftel1','fname2','母亲','fage2',0,'fpost2','ftel2','fname3','配偶或男女朋友','fage3',0,'fpost3','ftel3','industry','customer');
		//
		$i = 0;
		foreach($sub as $k=>$v){
			$resultPHPExcel->getActiveSheet()->setCellValue($arr[$i].'1', $v);
			$i++;
			if($i>=26){
				$column = $arr[($i/26)-1].$arr[$i%26];
				array_push($arr,$column);
			}
		}
		
		$j=2;
		
		foreach($info as $data){
			$i=0;
			//addrl supname1
			foreach($field as $v){
				if($v === 0){
					$resultPHPExcel->getActiveSheet()->setCellValueExplicit($arr[$i].$j, ' '); 
				}else{
					if($v=='addrl'){
						$data['addrl'] = str_replace('-请选择','',$data['addrl']);
						$data[$v] = $data['addrl'].'-'.$data['addr'];
					}elseif($v=='supname1'){
						$data[$v] = $data['supname1'].'-'.$data['supmobile1'];
					}elseif($v=='supname2'){
						$data[$v] = $data['supname2'].'-'.$data['supmobile2'];
					}elseif($v=='父亲'||$v=='母亲'||$v=="配偶或男女朋友"){
						$data[$v] = $v;
					}elseif($v=='from'){
						if($data['from'] == '网站'||$data['from']=='内部推荐'||$data['from']=='其他'){
							$data['from'] = $data['fromother'];
						}
					}	
					
					$resultPHPExcel->getActiveSheet()->setCellValueExplicit($arr[$i].$j, $data[$v]); 
				}
				
				$i++;
			}
			
			$j++;
		}
		
		//设置导出文件名 
		$outputFileName = '个人信息登记表.xls'; 
		$xlsWriter = new PHPExcel_Writer_Excel5($resultPHPExcel); 
		header("Content-Type: application/force-download"); 
		header("Content-Type: application/octet-stream"); 
		header("Content-Type: application/download"); 
		header('Content-Disposition:inline;filename="'.$outputFileName.'"'); 
		header("Content-Transfer-Encoding: binary"); 
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
		header("Pragma: no-cache"); 
		$xlsWriter->save( "php://output" );
	}
	
	public function  export_excel_23_2($info){
		
		$sub = array('人员编号','来源','姓名','曾用名','面试地区','职位类别','面试职位','面试职级','期望薪资','入职时间','手机号码','性别','婚否','生育状况','出生日期','年龄','民族','政治面貌','身份证号','社保卡号','户口性质','籍贯','户口所在地地址','档案所在地','在京住址（分公司住址）','在京固定电话','京外住址','京外固定电话','QQ或微信','电子邮箱','紧急联系人','紧急情况联系人与您的关系','联系人电话','最高学历毕业院校','所学专业','最高学历','最高学位','第二学历毕业院校','第二专业','第二学历','第二学位','外语语种','外语等级','培训经历','获得职业资格认证','获得过哪些奖项','原工作单位1','工作时间','职务','证明人及联系方式','原工作单位2','工作时间','职务','证明人/服务过的客户','文体特长','疾病史','长期服用药物','家庭成员','关系','年龄','现况','职务','联系方式','第二家庭成员','关系','年龄','现况','职务','联系方式','第三家庭成员','关系','年龄','现况','职务','联系方式','服务行业','服务客户');
		//
		$field = array('dataid','from','name',0,'warea','ptype','job','level','salary2',0,'mobile','sex','marry','child',0,0,0,0,'ID',0,0,0,'residence',0,'addrl',0,0,0,'qq','email',0,0,0,'school1','major1','edu1',0,'school2','major2','edu2',0,'seclanguage',0,0,'certificate',0,'company1',0,'job1','supname1','company2',0,'job2','supname2',0,0,0,'fname1','父亲','fage1',0,'fpost1','ftel1','fname2','母亲','fage2',0,'fpost2','ftel2','fname3','配偶或男女朋友','fage3',0,'fpost3','ftel3','industry','customer');
		//
		$subj = join(',',$sub);
		$detail = '';
		foreach($info as $data){
			//addrl supname1
			foreach($field as $v){
				if($v === 0){
					$data[$v] = ' ';
				}else{
					if($v=='addrl'){
						$data['addrl'] = trim($data['addrl'],'-请选择');
						$data[$v] = $data['addrl'].'-'.$data['addr'];
					}elseif($v=='supname1'){
						$data[$v] = $data['supname1'].'-'.$data['supmobile1'];
					}elseif($v=='supname2'){
						$data[$v] = $data['supname2'].'-'.$data['supmobile2'];
					}elseif($v=='父亲'||$v=='母亲'||$v=="配偶或男女朋友"){
						$data[$v] = $v;
					}elseif($v=='from'){
						if($data['from'] == '网站'||$data['from']=='内部推荐'||$data['from']=='其他'){
							$data['from'] = $data['fromother'];
						}
					}	
				}
				
				if(!$data[$v]){
					$data[$v] = ' ';
				}
				$detail .=$data[$v].',';
			}
			//var_dump($data['customer']);
			//echo '<hr />';
			$detail = trim($detail,',');
			$detail .=PHP_EOL;
		}
	//	exit;
	      
		$detail = str_replace('
','',$detail);
		$filename = '个人信息登记表.csv';	//导出文件名

		ob_end_clean();
		header('Content-Encoding: none');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.$filename);
		header('Pragma: no-cache');
		header('Expires: 0');
		echo  mb_convert_encoding($subj.PHP_EOL,"gb2312","utf-8");
		echo mb_convert_encoding($detail,"gb2312","utf-8");
		exit;
		
	}
}
?>