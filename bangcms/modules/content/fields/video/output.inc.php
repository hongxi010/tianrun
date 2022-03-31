	function video($field, $value) {
		extract(string2array($this->fields[$field]['setting']));
		$list_str = array();
		$file_list = string2array($value);
		if(is_array($file_list)) {
			foreach($file_list as $_k=>$_v) {	
				if($_v[fileurl]){
					$filename = $_v[filename] ? $_v[filename] : L('click_to_down');
					if($downloadlink) {
						$a_k = urlencode(sys_auth("i=$this->id&s=&m=1&f=$_v[fileurl]&d=$downloadtype&modelid=$this->modelid&catid=$this->catid", 'ENCODE', bc_base::load_config('system','auth_key')));
						$list_str[$_k]['filename'] = $filename;
						$list_str[$_k]['fileurl'] = APP_PATH.'index.php?m=content&c=down&a_k={$a_k}';
					} else {
						$list_str[$_k]['filename'] = $filename;
						$list_str[$_k]['fileurl'] = $_v['fileurl'];
					}
				}
			}
		}
		return $file_list;		
	}
