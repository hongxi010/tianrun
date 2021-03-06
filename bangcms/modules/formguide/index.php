<?php
defined('IN_BANGCMS') or exit('No permission resources.');
define('CACHE_MODEL_PATH',BANGCMS_PATH.'caches'.DIRECTORY_SEPARATOR.'caches_model'.DIRECTORY_SEPARATOR.'caches_data'.DIRECTORY_SEPARATOR);
//@cmsyou
$session_storage = 'session_'.bc_base::load_config('system','session_storage');
bc_base::load_sys_class($session_storage);

class index {
	private $db, $m_db, $M;
    private $clientId = '74d98041c7a6bb32abae671b39de364c';
    private $secrect = '7f5M20e9joi49r90o4Ge';
	function __construct() {
		$this->db = bc_base::load_model('sitemodel_model');
		$this->m_db = bc_base::load_model('sitemodel_field_model');
		$this->M = new_html_special_chars(getcache('formguide', 'commons'));
		$this->siteid = intval($_GET[siteid]) ? intval($_GET[siteid]) : get_siteid();
		$this->M = $this->M[$this->siteid];
	}
    protected  function genSmsCode($len=6 ) {
        $rand = range('0', '9');
        shuffle($rand);
        return substr(join('', $rand), 0, $len);
    }

    function http_get($url,$aHeader){
        $oCurl = curl_init();
        if(stripos($url,"https://")!==FALSE){
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
        }
        curl_setopt($oCurl, CURLOPT_URL, $url);
        curl_setopt($oCurl, CURLOPT_HTTPHEADER, $aHeader);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
        $sContent = curl_exec($oCurl);
        $aStatus = curl_getinfo($oCurl);
        curl_close($oCurl);
        if(intval($aStatus["http_code"])==200){
            return $sContent;
        }else{
            print_r($aStatus);
            return false;
        }
    }

    function http_post3($url,$body){
        if (is_array ( $body )) {
            $body = http_build_query ( $body );
        }
        $ch = curl_init ();

        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $body );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
// 		curl_setopt ( $ch, CURLOPT_POST, ??true );
// 		curl_setopt ( $ch, CURLOPT_COOKIEJAR,   'postcookie' );
// 		curl_setopt ( $ch, CURLOPT_COOKIEFILE,  'postcookie' );
        curl_setopt ( $ch, CURLOPT_USERAGENT, "Easy's CURL post data style" );
        if(stripos($url,"https://")!==FALSE){
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
        }
        $data = curl_exec ( $ch );
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);exit;
//            EasyLog::log(curl_error($ch), 'curl-error');
        }
        curl_close ( $ch );
//        EasyLog::log($data,'postByCurlRes');
        return $data;
    }
    function http_post2($url,$header,$body){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => $header,
        ));
        if(stripos($url,"https://")!==FALSE){
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($curl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
        }
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
    function http_post($url,$param,$aHeader,$post_file=false){
        $oCurl = curl_init();
        if(stripos($url,"https://")!==FALSE){
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
        }
        if (is_string($param) || $post_file) {
            $strPOST = $param;
        } else {
            $aPOST = array();
            foreach($param as $key=>$val){
                $aPOST[] = $key."=".urlencode($val);
            }
            $strPOST =  join("&", $aPOST);
        }
        curl_setopt($oCurl, CURLOPT_URL, $url);
        if ($aHeader){
            curl_setopt($oCurl, CURLOPT_HTTPHEADER, $aHeader);
        }
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($oCurl, CURLOPT_POST,true);
        curl_setopt($oCurl, CURLOPT_POSTFIELDS,$strPOST);
        $sContent = curl_exec($oCurl);
        $aStatus = curl_getinfo($oCurl);
        curl_close($oCurl);
        if(intval($aStatus["http_code"])==200){
            return $sContent;
        }else{
            print_r($aStatus);
            return false;
        }


    }
    /**
     * ?????????????????????
     * @param $mobile
     * @param $code
     * @return bool
     */
    public function varyCode($mobile,$code){
//        echo json_encode($_SESSION);exit;
        if (isset($_SESSION['expire_'.$mobile]) && $_SESSION['expire_'.$mobile]>time() && isset($_SESSION['sms_'.$code]) && $_SESSION['sms_'.$code] == $mobile){
//            $this->clearVcode($mobile,$code);
            return true;
        }
        return false;
    }

    /**
     * ???????????????
     * @param $mobile
     * @param $code
     * @return void
     */
    public function clearVcode($mobile,$code){
        unset($_SESSION['expire_'.$mobile]);
        unset($_SESSION['sms_'.$code]);
    }
    /**
     * ??????hmac_sha1????????????
     * @link ??????????????? http://www.educity.cn/develop/406138.html
     *
     * @param $str ??????
     * @param $key ??????
     *
     * @return ?????????
     */
    private function hmac_sha1($str, $key) {
        $signature = '';
        if (function_exists('hash_hmac')) {
            $signature = base64_encode(hash_hmac("sha1", $str, $key, true));
        } else {
            $blocksize = 64;
            $hashfunc = 'sha1';
            if (strlen($key) > $blocksize) {
                $key = pack('H*', $hashfunc($key));
            }
            $key = str_pad($key, $blocksize, chr(0x00));
            $ipad = str_repeat(chr(0x36), $blocksize);
            $opad = str_repeat(chr(0x5c), $blocksize);
            $hmac = pack(
                'H*', $hashfunc(
                    ($key ^ $opad) . pack(
                        'H*', $hashfunc(
                            ($key ^ $ipad) . $str
                        )
                    )
                )
            );
            $signature =base64_encode($hmac);
        }
        return $signature;
    }
    private function isMobile($mobile) {
        return preg_match ( "/^[0-9]{11}$/", $mobile );
    }
    private function isChinese($str, $charset = 'utf8') {
        if ('utf8' == $charset) {
            return preg_match ( "/^[\x{4e00}-\x{9fa5}a-z]+$/u", $str );
        } elseif ('gb2312' == $charset) {
            return preg_match ( "/^[" . chr ( 0xa1 ) . "-" . chr ( 0xff ) . "A-Za-z0-9_]+$/", $str );
        } else {
            return false;
        }
    }
    private function isAlpha($alpha) {
        return preg_match ( '/^[a-z]+$/i', $alpha );
    }
    private function getRealIp() {
        static $realip = NULL;
        if ($realip !== NULL) {
            return $realip;
        }
        if (isset ( $_SERVER )) {
            if (isset ( $_SERVER ['HTTP_X_FORWARDED_FOR'] )) {
                $arr = explode ( ',', $_SERVER ['HTTP_X_FORWARDED_FOR'] );

                // ???X-Forwarded-for???????????????unknown?????????Ip?????????
                foreach ( $arr as $ip ) {
                    $ip = trim ( $ip );
                    if ($ip != 'unknown') {
                        $realip = $ip;
                        break;
                    }
                }
            } elseif (isset ( $_SERVER ['HTTP_CLIENT_IP'] )) {
                $realip = $_SERVER ['HTTP_CLIENT_IP'];
            } else {
                if (isset ( $_SERVER ['REMOTE_ADDR'] )) {
                    $realip = $_SERVER ['REMOTE_ADDR'];
                } else {
                    $realip = '0.0.0.0';
                }
            }
        } else {
            if (getenv ( 'HTTP_X_FORWARDED_FOR' )) {
                $realip = getenv ( 'HTTP_X_FORWARDED_FOR' );
            } elseif (getenv ( 'HTTP_CLIENT_IP' )) {
                $realip = getenv ( 'HTTP_CLIENT_IP' );
            } else {
                $realip = getenv ( 'REMOTE_ADDR' );
            }
        }
        $onlineip = null;
        preg_match ( "/[\d\.]{7,15}/", $realip, $onlineip );
        $realip = ! empty ( $onlineip [0] ) ? $onlineip [0] : '0.0.0.0';
        return $realip;
    }
    private function getUrl(){
        $http = (isset ( $_SERVER ['HTTPS'] ) && $_SERVER ['HTTPS'] != 'off') ? 'https://' : 'http://';
        return $http . $_SERVER ['HTTP_HOST'] . $_SERVER ['REQUEST_URI'];
    }
    private function getDomain(){
        $http = (isset ( $_SERVER ['HTTPS'] ) && $_SERVER ['HTTPS'] != 'off') ? 'https://' : 'http://';
        return $http . $_SERVER ['HTTP_HOST'];// . $_SERVER ['REQUEST_PORT'];
    }
    private function getHttp(){
        $http = (isset ( $_SERVER ['HTTPS'] ) && $_SERVER ['HTTPS'] != 'off') ? 'https://' : 'http://';
        return $http;
    }
    /**
     * ?????????????????????
     * @return void
     */
    public function getVcode(){
        if (!isset($_POST) || !$_POST['mobile']){
            exit('??????????????????');
        }
//        exit($_SERVER["HTTP_REFERER"]);
//        exit($this->getRealIp());
        if (!isset($_SERVER["HTTP_REFERER"]) || !$_SERVER["HTTP_REFERER"]){
            exit('????????????');
        }
        if (!isset($_SESSION)){
            exit('????????????');
        }
//        exit(json_encode($_SESSION));
//        exit($_SERVER["HTTP_REFERER"]);
        $refer = $_SERVER["HTTP_REFERER"];
        $refer = explode($this->getHttp(),$refer);
        $refer[0] = explode('/',$refer[1]);
        if (!isset($refer[0][0])){
            exit('????????????');
        }
        $_refer = $this->getHttp().$refer[0][0];
//        exit($this->getDomain());
        if ($_refer!=$this->getDomain()){
            exit('????????????');
        }
//        $_SESSION['sms_token_sendtimes_'.$_SESSION['sms_token']] = isset($_SESSION['sms_token_sendtimes_'.$_SESSION['sms_token']]) ? $_SESSION['sms_token_sendtimes_'.$_SESSION['sms_token']] : 0;

        $mobile = isset($_POST['mobile']) ? trim($_POST['mobile']):'';
        if (!$mobile){
            exit(L('no_mobile'));
        }
        if (!$this->isMobile($_POST['mobile'])){
            exit('???????????????');
        }
        $limitSendTimesKey = 'sms_send_times_'.$mobile;
        $limitSendTimesCache = getcache($limitSendTimesKey,'limit');
        if ($limitSendTimesCache){
            if ($limitSendTimesCache + 60 > time()){
                exit('???????????????????????????????????????');
            }
        }else{
            setcache($limitSendTimesKey,time(),'limit');
        }
        setcache($limitSendTimesKey,time(),'limit');
        $mobilelimitkey = 'limit_mobiles_'.md5($mobile.date('Ymd'));
//        $_SESSION[$mobilelimitkey] = isset($_SESSION[$mobilelimitkey]) ? $_SESSION[$mobilelimitkey] + 1: 1;
        $mobilelimitkeyCache = getcache($mobilelimitkey,'limit');
        if ($mobilelimitkeyCache && $mobilelimitkeyCache >= 10){
            exit('???????????????????????????????????????10????????????');
        }else{
            $mobilelimitkeyCache = 1;
        }
        $mobilelimitkeyCache++;
        setcache($mobilelimitkey,$mobilelimitkeyCache,'limit');
//        if (!isset($_SESSION[$mobilelimitkey]) || $_SESSION[$mobilelimitkey]>=10){
////            exit('???????????????????????????????????????10????????????');
//        }
        $ip = $this->getRealIp();
        $iplimitkey = 'limit_ips_'.md5($ip.date('Ymd'));
        $_SESSION[$iplimitkey] = isset($_SESSION[$iplimitkey]) ? $_SESSION[$iplimitkey] + 1: 1;
        $iplimitkeyCache = getcache($iplimitkey,'limit');
        if ($iplimitkeyCache && $iplimitkeyCache >= 20){
            exit('?????????ip?????????????????????20????????????');
        }else{
            $iplimitkeyCache = 1;
        }
        $iplimitkeyCache++;
        setcache($iplimitkey,$iplimitkeyCache,'limit');
//        if (!isset($_SESSION[$mobilelimitkey]) || $_SESSION[$iplimitkey]>=20){
//            exit('?????????ip?????????????????????20????????????');
//        }

        /*
        $token = isset($_POST['token']) ? $_POST['token']:'';
        if (!$token){
            exit('??????????????????????????????????????????');
        }
        if ($token != $_SESSION['sms_token']){
            exit('??????????????????????????????????????????');
        }
        if ($_SESSION['sms_token_sendtimes_'.$_SESSION['sms_token']]>=5){
            unset($_SESSION['sms_token_sendtimes_'.$_SESSION['sms_token']]);
            unset($_SESSION['sms_token']);
            exit('??????????????????5??????????????????????????????');
        }
        //*/

//        $_SESSION['sms_token_sendtimes_'.$_SESSION['sms_token']] += 1;

        //????????????
        $code = $this->genSmsCode(6,6);
        $_SESSION['sms_'.$code] = $mobile;
        $_SESSION['expire_'.$mobile] = time() + 60;

        //???????????????????????????
        $Timestamp = date('Y-m-d').'T'.date('H:i:s').'Z';
        $url = 'https://api-bj.clink.cn/sms_send?AccessKeyId='.$this->clientId.'&Expires=60&Timestamp='.urlencode($Timestamp);
        $urlParam = str_replace('https://','POST',$url);
//        echo $urlParam;exit;
//        echo "\n";
        $Signature = urlencode(($this->hmac_sha1($urlParam,$this->secrect)));
        $url .= '&Signature='.$Signature;

//        echo $url;exit;
        $sendBody = [
            'cno'=>'1119',
            'tel'=>$mobile,
            'content'=>'??????????????????:'.$code.',10???????????????'
        ];
        $sendHeader = [
            'Content-Type: application/json'
        ];
//        echo json_encode($_SESSION);
//        echo json_encode($_SESSION[$mobile]);exit;
        $sendStatus=$this->http_post2($url,$sendHeader,json_encode($sendBody));
//        echo $sendStatus;exit;



        echo 'yes';
        exit;
    }
    public function testWorkflow(){
        return 0;
        $form = ['mobile'=>'13800138000','name'=>'test007','requiretype'=>'test009'];
        $res = $this->sendWorkFlow($form);
        echo $res;
    }
    protected function sendWorkFlow($form=[]){
        $Timestamp = date('Y-m-d').'T'.date('H:i:s').'Z';
        $url = 'https://api-bj.clink.cn/save_ticket?AccessKeyId='.$this->clientId.'&Expires=60&Timestamp='.urlencode($Timestamp);
        $urlParam = str_replace('https://','POST',$url);
//        echo $urlParam;exit;
//        echo "\n";
        $Signature = urlencode(($this->hmac_sha1($urlParam,$this->secrect)));
        $url .= '&Signature='.$Signature;

        $body['workflowId'] = 2585;
        $body['level'] = 3;
        $body['handlerType'] = 1;
        $body['handlerId'] = 244;
        $body['stateSelected'] = '?????????';
        $body['form'] = [
            'id'=>20908,
            'name'=>'??????????????????',
            'fields'=>[
                [
                    "id"=>191885,
                    "name"=>"????????????",
                    "type"=>1,
                    "required"=>0,
                    "value"=>$form['tel']
                ],
                [
                    "id"=>6976,
                    "name"=>"????????????",
                    "type"=>1,
                    "required"=>1,
                    "value"=>$form['name']
                ],
                [
                    "id"=>191886,
                    "name"=>"???????????????",
                    "type"=>1,
                    "required"=>1,
                    "value"=>$form['company']
                ],
                [
                    "id"=>191887,
                    "name"=>"????????????",
                    "type"=>10,
                    "required"=>1,
                    "value"=>$form['requiretype']
                ]
            ]
        ];
//        echo $url;
//        echo "\n";
//        echo json_encode($body);
//        echo $url;exit;
        $sendStatus=$this->http_post2($url,'content-type: multipart/form-data',['model'=>json_encode($body)]);
//        echo ($sendStatus);
//        exit;
        return $sendStatus;

    }

    /**
     * ??????????????????
     * @return void
     */
    public function getWorkFlowList(){
        $Timestamp = date('Y-m-d').'T'.date('H:i:s').'Z';
        $url = 'https://api-bj.clink.cn/list_ticket?AccessKeyId='.$this->clientId.'&Expires=60&Timestamp='.urlencode($Timestamp);
        $urlParam = str_replace('https://','POST',$url);
//        echo $urlParam;exit;
//        echo "\n";
        $Signature = urlencode(($this->hmac_sha1($urlParam,$this->secrect)));
        $url .= '&Signature='.$Signature;
        echo $url;exit;
    }
	/**
	 * ??????????????????
	 */
	public function index() {
		$siteid = $this->siteid;
		$SEO = seo($this->siteid, '', L('formguide_list'));
		$page = max(intval($_GET['page']), 1);
		$r = $this->db->get_one(array('siteid'=>$this->siteid, 'type'=>3, 'disabled'=>0), 'COUNT(`modelid`) AS sum');
		$total = $r['sum'];
		$pages = pages($total, $page, 20);
		$offset = ($page-1)*20;
		$datas = $this->db->select(array('siteid'=>$this->siteid, 'type'=>3, 'disabled'=>0), 'modelid, name, addtime', $offset.',20', '`modelid` DESC');
		include template('formguide', 'index');
	}
	
	/**
	 * ????????????
	 */
	public function show() {
        $sms_token = $_SESSION["sms_token"] = md5("imoowi".time().rand(9,20));
		if (!isset($_GET['formid']) || empty($_GET['formid'])) {
			$_GET['action'] ? exit : showmessage(L('form_no_exist'), HTTP_REFERER);
		}
		if(isset($_GET['catid'])){
			if($_GET['catid']=='266'){
				$url = WEB_PATH."index.php?m=content&c=index&a=lists&catid=266";
			}else if(isset($_GET['p'])&&isset($_POST['info']['productid'])){
				$url = WEB_PATH."index.php?m=content&c=index&a=show&catid=254&id=".$_POST['info']['productid']."&p=".$_GET['p'];
			}
		}
		$siteid = $_GET['siteid'] ? intval($_GET['siteid']) : 1;
		$formid = intval($_GET['formid']);
		$r = $this->db->get_one(array('modelid'=>$formid, 'siteid'=>$siteid, 'disabled'=>0), 'tablename, setting');
		if (!$r) {
			$_GET['action'] ? exit : showmessage(L('form_no_exist'), HTTP_REFERER);
		}
		$setting = string2array($r['setting']);
		if ($setting['enabletime']) {
			if ($setting['starttime']>SYS_TIME || ($setting['endtime']+3600*24)<SYS_TIME) {
				$_GET['action'] ? exit : showmessage(L('form_expired'), APP_PATH.'index.php?m=formguide&c=index&a=index');
			}
		}
		$userid = param::get_cookie('_userid');
		if ($setting['allowunreg']==0 && !$userid && $_GET['action']!='js') showmessage(L('please_login_in'), APP_PATH.'index.php?m=member&c=index&a=login&forward='.urlencode(HTTP_REFERER));
		if (isset($_POST['dosubmit'])) {

            if (isset($_POST['info']['requiretype']) && $formid==36){
                $_POST['info']['requiretype'] = isset($_POST['info']['requiretype']) ?  implode(',',$_POST['info']['requiretype']) : '';
                if (isset($_POST['orther_requiretype'])){
                    $_POST['info']['requiretype'] .= $_POST['info']['requiretype'] ? $_POST['info']['requiretype'].','.$_POST['orther_requiretype'] : $_POST['orther_requiretype'];
                }
            }
			$tablename = 'form_'.$r['tablename'];
			$this->m_db->change_table($tablename);
			//??????????????? @cmsyou
			if(!empty($_SESSION['sqsy_token']) && $formid==27) {
				$code = isset($_POST['code']) && trim($_POST['code']) ? trim($_POST['code']) : showmessage(L('input_code'), HTTP_REFERER);
				if ($_SESSION['code'] != strtolower($code)) {
					showmessage(L('code_error'), HTTP_REFERER);
				}
			}

            if(!empty($_SESSION['sqsy_token']) && ($formid==36)) {
                $code = isset($_POST['sqsy_token']) && trim($_POST['sqsy_token']) ? trim($_POST['sqsy_token']) : showmessage(L('input_code'), HTTP_REFERER);
                if ($_SESSION['sqsy_token'] != strtolower($code)) {
//                    showmessage(L('code_error'), HTTP_REFERER);
                }

            }
//            echo json_encode(['post'=>$_POST,'formid'=>$formid]);exit;


			$data = array();
			require CACHE_MODEL_PATH.'formguide_input.class.php';
			$formguide_input = new formguide_input($formid);
			$data = new_addslashes($_POST['info']);
			$data = new_html_special_chars($data);
			$data = $formguide_input->get($data);
            if ($formid==36 || $formid==35){
                if (isset($data['name']) && $data['name']){
                    if (!$this->isChinese($data['name'])){
                        exit('??????????????????????????????????????????????????????????????????');
                    }
                }
            }
			$data['userid'] = $userid;
			$data['username'] = param::get_cookie('_username');
			$data['datetime'] = SYS_TIME;
			$data['ip'] = ip();
			$key = md5($data['username'].$data['tel'].$data['ip'].$_GET['formid']);
			$cache = getcache($key,'apply');
			if ($cache){
                if ($formid!=36 && $formid!=35){
                    showmessage(L('apply_twice'));
                }
            }

            if ($formid==35 || $formid==36){

                //???????????????
                if (!$this->varyCode(trim($_POST['info']['tel']),trim($_POST['sms_code']))){
                    if ($formid==36 || $formid==35){
                        exit(L('sms_code_error'));
                    }
                }

            }
			$dataid = $this->m_db->insert($data, true);
			if ($dataid) {
                setcache($key,1,'apply');
				if ($setting['sendmail']) {
					bc_base::load_sys_func('mail');
					$mails = explode(',', $setting['mails']);
					if (is_array($mails)) {
						foreach ($mails as $m) {
							sendmail($m, L('tips'), $this->M['mailmessage']);
						}
					}
				}
				$this->db->update(array('items'=>'+=1'), array('modelid'=>$formid, 'siteid'=>$siteid));
			}
			$url = '/';
			if(isset($url)){
                if ($formid==36){
                    //??????????????????
                    //????????????
//                    $workflow='{"workflowId":2585,"level":3,"handlerType":1,"handlerId":244,"stateSelected":"?????????","form":{"id":20908,"name:":"??????????????????","fields":[{"id":191885,"name":"????????????","type":1,"required":0,"value":"18131873993"},{"id":6976,"name":"????????????","type":1,"required":1,"value":"??????"},{"id":191886,"name":"???????????????","type":1,"required":1,"value":"??????"},{"id":191887,"name":"????????????","type":10,"required":1,"value":"????????????,???????????????"}]}}';
                    $this->sendWorkFlow($_POST['info']);
                    $this->clearVcode(trim($_POST['info']['tel']), trim($_POST['sms_code']));
//                echo 'yes';exit;
                    exit('yes');
                }
                if ($formid==35){
                    exit('yes');
                }
//                exit('thanks');
				showmessage(L('thanks'), $url);
			}else{
				showmessage(L('thanks'));
			}

		    
		} else {
			if ($setting['allowunreg']==0 && !$userid && $_GET['action']=='js') {
				$no_allowed = 1;
			}
			bc_base::load_sys_class('form', '', '');
			$f_info = $this->db->get_one(array('modelid'=>$formid, 'siteid'=>$this->siteid));
			extract($f_info);
			$tablename = 'form_'.$r['tablename'];
			$this->m_db->change_table($tablename);
			$ip = ip();
			$where = array();
			if ($userid) $where = array('userid'=>$userid);
			else $where = array('ip'=>$ip);
			$re = $this->m_db->get_one($where, 'datetime');
			$setting = string2array($setting);
			if (($setting['allowmultisubmit']==0 && $re['datetime']) || ((SYS_TIME-$re['datetime'])<$this->M['interval']*60)) {
				$_GET['action'] ? exit : showmessage(L('had_participate'), APP_PATH.'index.php?m=formguide&c=index&a=index');
			}
			
			require CACHE_MODEL_PATH.'formguide_form.class.php';
			$formguide_form = new formguide_form($formid, $no_allowed);
			$forminfos_data = $formguide_form->get();
			$SEO = seo($this->siteid, L('formguide'), $name);
			if (isset($_GET['action']) && $_GET['action']=='js') {
				if(!function_exists('ob_gzhandler')) ob_clean();
				ob_start();
			}
			$template = ($_GET['action']=='js') ? $js_template : $show_template;
			include template('formguide', $template, $default_style);
			if (isset($_GET['action']) && $_GET['action']=='js') {
				$data=ob_get_contents();
				ob_clean();
				exit(format_js($data));
			}
		}
	}
}
?>