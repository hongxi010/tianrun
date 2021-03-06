	function posid($field, $value) {
		if(!empty($value) && is_array($value)) {
			if($_GET['a']=='add') {
				$position_data_db = bc_base::load_model('position_data_model');
				$textcontent = array();
				foreach($value as $r) {
					if($r!='-1') {
						if(empty($textcontent)) {
							foreach($this->fields AS $_key=>$_value) {
								if($_value['isposition']) {
									$textcontent[$_key] = $this->data[$_key];
								}
							}
							if(!empty($this->data['n_relation_field']) && !empty($this->data['n_pid']) ) {
								$textcontent['n_relation_field'] = $this->data['n_relation_field'];
								$textcontent['n_pid'] = $this->data['n_pid'];
							}
							$textcontent = array2string($textcontent);
						}
						$thumb = $this->data['thumb'] ? 1 : 0;
						$position_data_db->insert(array('id'=>$this->id,'catid'=>$this->data['catid'],'posid'=>$r,'thumb'=>$thumb,'module'=>'detail','modelid'=>$this->modelid,'data'=>$textcontent,'listorder'=>$this->id));
					}
				}
			} else {
				$posids = array();
				$catid = $this->data['catid'];
				$push_api = bc_base::load_app_class('push_api','admin');
				foreach($value as $r) {
					if($r!='-1') $posids[] = $r;
				}
				$textcontent = array();
				foreach($this->fields AS $_key=>$_value) {
					if($_value['isposition']) {
						$textcontent[$_key] = $this->data[$_key];
					}
				}
				if(!empty($this->data['n_relation_field']) && !empty($this->data['n_pid']) ) {
					$textcontent['n_relation_field'] = $this->data['n_relation_field'];
					$textcontent['n_pid'] = $this->data['n_pid'];
				}
				//颜色选择为隐藏域 在这里进行取值
				$textcontent['style'] = $_POST['style_color'] ? strip_tags($_POST['style_color']) : '';
				$textcontent['inputtime'] = strtotime($textcontent['inputtime']);
				if($_POST['style_font_weight']) $textcontent['style'] = $textcontent['style'].';'.strip_tags($_POST['style_font_weight']);
				$push_api->position_update($this->id, $this->modelid, $catid, $posids, $textcontent,0);
			}
		}
	}
