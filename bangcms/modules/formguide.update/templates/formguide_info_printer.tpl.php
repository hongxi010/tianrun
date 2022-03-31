<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo CSS_PATH?>job/print.css">
    <script>
        window.print()
    </script>
</head>
<body>
<div class="p-box ml">
    <div class="p-left fl">
		<div class="d-right">第________会议室</div>
        <div class="p-left-up">
            <dl>
                <dt><?php echo $data['name']?><div class="p-gray"></div></dt>
                <dd>
                    <li>
                        <span class="em"><?php echo $data['sex']?>，</span>
                        <span class="em"><?php if($data['marry']){echo $data['marry'].',';}
	                        if($data['child']){echo $data['child'].',';} ?>
                        </span>
                        <span class="em">
                        	<?php
                        	if($data['residence']){
	                        	echo $data['residence'].',';
	                        }
	                        ?>
                        </span>
                        <span class="em"><strong><?php if($data['ID']){echo $data['ID'].',';} ?></strong></span>
                    </li>
                    <li>
                    	<?php if($data['email']){?>
                        <span class="em">邮箱：<strong><?php echo $data['email'];?></strong>，</span>
	                    <?php }?>
	                    <?php if($data['mobile']){?>
                        <span class="em">电话：<strong><?php echo $data['mobile'];?></strong>，</span>
	                    <?php }?>
                        <?php if($data['qq']){?>
                        <span class="em"><strong>QQ</strong>/微信：<strong><?php echo $data['qq'];?></strong>，</span>
	                    <?php }?>
                    </li>
                    <li>
                        <span class="em"><?php echo $data['addrl'].$data['addr'];?>，</span><span class="em">到公司路程所<strong><?php echo $data['addrtime'];?></strong></span>
                    </li>
                </dd>
            </dl>
			 <?php if($data['company1']){?>
            <dl>
                <dt>工作经历<div class="p-gray"></div></dt>
               
                <dd>
                    <li><span class="em"><strong><?php echo $data['jobtimes1']?></strong>-<strong><?php echo $data['jobtimee1']?></strong>，</span><span class="em"><?php echo $data['company1']?>，</span>
					<span class="em"><?php echo $data['team1']?>，</span><span class="em"><?php echo $data['job1']?></span>
					</li>
                    <li><span class="em">公司<strong><?php echo $data['compsize1']?></strong>人，</span><span class="em">部门<strong><?php echo $data['teamsize1']?></strong>人</span>，<span class="em">税前<strong><?php echo $data['income1']?></strong>元/月</span></li>
                    <?php if($data['supname1']){?>
                    <li><span class="em">直属上级：<?php echo $data['supjob1'].'-'.$data['supname1'];?>，</span><span class="em">电话：<strong><?php echo $data['supmobile1'];?></strong></span></li>
                     <?php }?>
                    <li><span class="em">离职原因：<?php echo $data['leaving1'];?></span></li>
                </dd> 
            </dl>
			<?php }?>
            <dl>
                <dt>教育培训<div class="p-gray"></div></dt>
                <dd><span class="em"></span><strong></strong>
                    <li><span class="em"><strong><?php echo $data['studyst1']?></strong>-<strong><?php echo $data['studyet1']?></strong></span>，<span class="em"><?php echo $data['school1']?>，</span><span class="em"><?php echo $data['major1']?>专业，</span><span class="em"><?php echo $data['edu1']?>，<span class="em"><?php if($data['isget1']=='是'){echo '统招';}else{echo '非统招';}?></span></span></li>
                    
					<?php if(0){if($data['school2']){?>
                    <li><span class="em"><?php echo $data['school2']?>，</span><span class="em"><strong><?php echo $data['studyst2']?></strong>-<strong><?php echo $data['studyet2']?></strong>，</span><span class="em"><?php echo $data['major2']?>专业，</span><span class="em"><?php echo $data['edu2']?>，</span>
					<span class="em"><?php if($data['isget2']=='是'){echo '统招';}else{echo '非统招';}?></span></li>
                    <?php }
					}
					if($data['seclanguage']){?>
                    <li><span class="em">第二语种：<?php echo $data['seclanguage'];?>，</span><span class="em">掌握<?php echo $data['state'];?></span></li>
                    <?php 
					}
					if($data['certificate']){?>
                    <li><span class="em"> 和专业/工作相关的证书：<?php echo $data['certificate'];?></span></li>
                    <?php }?>
                </dd>
            </dl>
            <dl>
                <dt>职业信息<div class="p-gray"></div></dt>
                <dd>
                    <li><span class="em">获得职位信息的渠道：<?php echo $data['from'];?><?php if($data['fromother'])echo '，'.$data['fromother'];?></span></li>
                    <?php if($data['know']){?><li><span class="em">认识正邦现任职员：<?php echo $data['knowpeo'];?></span></li><?php }?>
                    <li><span class="em"><?php echo $data['jobstatus']?>，</span><span class="em">在京<?php echo $data['insurance'];?>社保，</span><span class="em"><?php echo $data['fund'];?>住房公积金
                    <?php if($data['fundmonth']){?>：每月缴纳<strong>￥<?php echo $data['fundmonth'];?></strong>
                    <?php }?>
                    </span></li>
                    <li><span class="em">期望薪金（税前/月）：试用期<strong>￥<?php echo $data['salary1'];?></strong>，转正<strong>￥<?php echo $data['salary2'];?></strong></span></li>
                    <li><span class="em">期望薪金结构：<?php echo $data['structure'];?></span></li>
                    <li><span class="em">考虑入职的因素：1<?php echo $data['factor1'];?>，2<?php echo $data['factor2'];?>，3<?php echo $data['factor3'];?></span></li>
                </dd>
                <?php if($data['understand']){?>
                <dd>
                    <li><span class="em">对正邦的理解:</span></li>
                    <li><span class="em"><?php echo $data['understand'];?></span></li>
                </dd>
                <?php }?>
            </dl>
            <?php if($data['fname1']||$data['fname2']||$data['fname3']){?>
            <dl><strong></strong>
                <dt>家庭成员<div class="p-gray"></div></dt>
                <dd>
                    <li><span class="em">父亲：</span>
                    	<?php if($data['fname1']){?>
                    		<span class="em"><?php echo $data['fname1'];?>，
                            <span class="em">工作单位：<?php echo $data['fjob1'];?>
                    	<?php 
                    	}else{
                    		echo '未填写';
                    	}
                    	?>
                    </li>

                    <li><span class="em">母亲：</span>
						<?php if($data['fname2']){?>
                    		<span class="em"><?php echo $data['fname2'];?>，<span class="em">工作单位：<?php echo $data['fjob2'];?>
                    	<?php 
                    	}else{
                    		echo '未填写';
                    	}
                    	?>
                    </li>
                   
                    <li><span class="em">配偶/对象：</span>
                    	<?php if($data['fname3']){?>
                    		<span class="em"><?php echo $data['fname3'];?>，</span><span class="em">工作单位：<?php echo $data['fjob3'];?></span>
                    	<?php 
                    	}else{
                    		echo '未填写';
                    	}
                    	?>
                    </li>
                </dd>
            </dl>
            
            <?php 
        	}
            if($data['web']||$data['books']||$data['lcomp']){?>
            <dl>
                <dt>生活发展<div class="p-gray"></div></dt>
                <?php if($data['web']){?>
                <p>经常游览的网站名称及网址：</p>
                <dd>
                    <li><span class="em"><?php echo $data['web'];?></span></li>
                </dd>
                <?php }
                if($data['books']){
                ?>
                <p>平时常阅览的书籍：</p>
                <dd>
                    <li><span class="em"><?php echo $data['books'];?></span></li>
                </dd>
                <?php }
                 if($data['lcomp']){
                ?>
                <p>您喜欢的行业内公司有哪些？请列举3家：</p>
                <dd>
                    <li><span class="em"><?php echo $data['lcomp'];?></span></li>
                </dd>
                <?php }?>
            </dl>
            <?php }?>
            <dl><strong></strong>
                <dt>自我阐述<div class="p-gray"></div></dt>
                <p>专业优势：</p>
                <dd>
                    <li><span class="em"><?php echo $data['advantages'];?></span></li>
                </dd>
                <p>专业不足：</p>
                <dd>
                    <li><span class="em"><?php echo $data['deficiency'];?></span></li>
                </dd>
                <p>服务客户行业：</p>
                <dd>
                    <li><span class="em"><?php echo $data['industry'];?></span></li>
                </dd>
                <p>主要服务客户：</p>
                <dd>
                    <li><span class="em"><?php echo $data['customer'];?></span></li>
                </dd>
            </dl>
        </div>

        <div class="p-down">
            <p class="p-down-up">我保证上述所填一切资料属实，并保证在以往的历史中无任何犯罪记录。</p>
            <p class="p-down-middle">
                我授权北京正邦品牌服务集团公司或委托第三方对我提供的个人及工作履历信息进行验证核实，
                包括但不限于通过向权威数据源提请验证以及就个人履历部分向有关单位进行核实。若上述所
                填资料有不实之处，公司有权随时与我解除劳动关系，但不承担任何经济、法律责任。公司有
                权要求我补偿由此引起的一切损失，包括为招聘我而花费的费用。
            </p>
            <p class="p-down-down"><span class="p-down-em-r fr">日期：</span><span class="p-down-em-l fr">签名：</span></p>
        </div>
		
		<div class="pd">
			<p class="line">用人部门审批</p>
            <p class="botp">囗&nbsp;&nbsp;供应商入库 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 囗&nbsp;&nbsp;入职</p>
			<p class="kong">&nbsp;</p>
			<p>入职职位：___________________</p>
			<p>试用期薪资：￥___________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  转正薪资薪资：￥___________________</p>
			<p class="kong">&nbsp;</p>
            <p class="p-down-down">
			<span>部门领导：___________________</span><br /><br /><br /><br />
			<span>日&nbsp;期：___________________</span>
			</p>
        </div>
    </div>
    <div class="p-right fl">
        <img src="<?php echo IMG_PATH?>job/brand.png" alt="">
        <h2>应聘人员登记表</h2>
        <p><?php echo date('Y年m月d日',$data['datetime']).','.$data['warea'];?></p>
        <p>面试时间：<?php echo $data['appointed'];?></p>
        <!--<p>到达时间：9:10</p>-->
        <p>应聘职位：<?php echo $data['job'];?></p>
        <p>应试职级：<?php echo $data['level'];?></p>
        <li class="py1">评语1:</li>
        <li>评语2:</li>
        <li style="margin:150px auto 400px 35px;padding-top:10px;">评语3:</li>
        <li>评语4:</li>
		
    </div>
</div>
</body>
</html>