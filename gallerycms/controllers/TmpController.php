<?php

namespace gallerycms\controllers;

use Yii;
use gallerycms\components\Controller as GallerycmsController;
use gallerycms\cmsad\models\Article;
use gallerycms\sinfo\models\Info;

class TmpController extends GallerycmsController
{
    public function actionTest()
    {   
        $action = Yii::$app->request->get('action');
        $this->$action();
    }   

    public function dispatch()
    {
        $sqlInsert = 'TRUNCATE `workplat_statistic`.`ws_dispatch_origin`;INSERT INTO `workplat_statistic`.`ws_dispatch_origin` (
                `merchant_id`, `service_id`, `created_month`, `created_week`, `created_weekday`, `created_day`)
                SELECT `merchant_id`, `service_id`, `created_month`, `created_week`, `created_weekday`, `created_day` FROM `workplat_subsite`.`wd_user_merchant` GROUP BY `merchant_id`, `service_id`, `created_month`, `created_week`, `created_weekday`, `created_day`;<br />';
        $sqlBase = "UPDATE `workplat_statistic`.`ws_dispatch_origin` AS `a`, 
            (SELECT `merchant_id`, `service_id`, `created_month`, `created_week`, `created_weekday`, `created_day`, COUNT(*) AS `count` FROM `workplat_subsite`.`wd_user_merchant` WHERE {{WHERE}} GROUP BY `merchant_id`, `service_id`, `created_month`, `created_week`, `created_weekday`, `created_day`) AS `b` 
            SET `a`.`{{UPFIELD}}` = `b`.`count` 
            WHERE `a`.`merchant_id` = `b`.`merchant_id` AND `a`.`service_id` = `b`.`service_id` AND `a`.`created_month` = `b`.`created_month` AND `a`.`created_week` = `b`.`created_week` AND `a`.`created_weekday` = `b`.`created_weekday` AND `a`.`created_day` = `b`.`created_day`;";

        $elems = [
            '' => 'dispatch_num',
            'back_reply' => 'back_reply_num',
            'back_confirm' => 'back_confirm_num',
        ];

        $outStr = $sqlInsert;
        foreach ($elems as $elem => $elemField) {
            $where = "`status` = '{$elem}'";
            $sql = str_replace(['{{WHERE}}', '{{UPFIELD}}'], [$where, $elemField], $sqlBase) . '<br />';
            $outStr .= $sql;
        }

        echo $outStr;
    }

    public function service()
    {
        $sqlInsert = 'TRUNCATE `workplat_statistic`.`ws_service_origin`;';
        $sqlInsert .= 'INSERT INTO `workplat_statistic`.`ws_service_origin` (
                `merchant_id`, `service_id`, `created_month`, `created_day`, `created_week`, `created_weekday`)
                SELECT `merchant_id`, `service_id`, FROM_UNIXTIME(`created_at`, "%Y%m"), FROM_UNIXTIME(`created_at`, "%Y%m%d"), FROM_UNIXTIME(`created_at`, "%w"), FROM_UNIXTIME(`created_at`, "%u") FROM `workplat_subsite`.`wd_user` WHERE `service_id` IN ( GROUP BY `merchant_id`, `service_id`, FROM_UNIXTIME(`created_at`, "%Y%m%d");<br />';
        $sqlBase = "UPDATE `workplat_statistic`.`ws_service_origin` AS `a`, 
            (SELECT `merchant_id`, `service_id`, FROM_UNIXTIME(`created_at`, '%Y%m%d') AS `created_day`, COUNT(*) AS `count` FROM `workplat_subsite`.`wd_user` WHERE {{WHERE}} GROUP BY `merchant_id`, `service_id`, FROM_UNIXTIME(`created_at`, '%Y%m%d')) AS `b` 
            SET `a`.`{{UPFIELD}}` = `b`.`count` 
            WHERE `a`.`merchant_id` = `b`.`merchant_id` AND `a`.`service_id` = `b`.`service_id` AND `a`.`created_day` = `b`.`created_day`;";

        $elems = [
            'all' => 'visit_num_success',
            '' => 'new_num',
            'follow' => 'follow_num',
            'follow-plan' => 'followplan_num',
            'valid' => 'valid_num',
            'valid-part' => 'valid_part_num',
            'valid-out' => 'validout_num',
            'bad' => 'bad_num',
        ];

        $badElems = [
            '' => 'badnew_num',
            'no_call' => 'badnocall_num',
            'noneed' => 'badnoneed_num',
            'booked' => 'badbooked_num',
            'no_test' => 'badtest_num',
        ];

        $outStr = $sqlInsert;
        foreach ($elems as $elem => $elemField) {
            $where = $elem == 'all' ? "`service_num` = 0" : "`service_num` = 0 AND `status` = '{$elem}'";
            $sql = str_replace(['{{WHERE}}', '{{UPFIELD}}'], [$where, $elemField], $sqlBase) . '<br />';
            $outStr .= $sql;
            $where = $elem == 'all' ? "`service_num` > 0" : "`service_num` > 0 AND `status` = '{$elem}'";
            $elemFieldOld = 'old_' . $elemField;
            $sql = str_replace(['{{WHERE}}', '{{UPFIELD}}'], [$where, $elemFieldOld], $sqlBase) . '<br />';
            $outStr .= $sql;
        }

        foreach ($badElems as $elem => $elemField) {
            $where = "`service_num` = 0 AND `status` = 'bad' AND `invalid_status` = '{$elem}'";
            $sql = str_replace(['{{WHERE}}', '{{UPFIELD}}'], [$where, $elemField], $sqlBase) . '<br />';
            $outStr .= $sql;
            $where = "`service_num` > 0 AND `status` = 'bad' AND `invalid_status` = '{$elem}'";
            $elemFieldOld = 'old_' . $elemField;
            $sql = str_replace(['{{WHERE}}', '{{UPFIELD}}'], [$where, $elemFieldOld], $sqlBase) . '<br />';
            $outStr .= $sql;
        }

        echo $outStr;
    }

    protected function updateCmsad()
    {   
        $model = new Article();
        $catdirs = $model->db->createCommand('SELECT `category_id` FROM wc_article GROUP BY category_id')->queryAll();
		//echo date('Y-m-d H:i:s', $time) . '<br />';
		$sql = '';
		for ($j = 0; $j < 30; $j++) {
		$timeBase = time() - 86400 * $j;
		for ($i = 0; $i < 100; $i++) {
			$time = $timeBase - rand(10000, 36000);
			//echo date('Y-m-d H:i:s', $time) . '<br />';
        $sql .= "UPDATE `wc_article` SET `status` = 1, `created_at` = {$time}, `updated_at` = {$time} WHERE `status` = 0 LIMIT 1; \n";
		}
		}
        /*foreach ($catdirs as $catdir) {
            $sql .= "UPDATE `wc_article` SET `status` = 1 WHERE `category_id` = {$catdir['category_id']} AND `status` = 0 LIMIT 10; \n";
	    }*/
        echo $sql; 
        //print_r($catdirs);
    }   

    protected function updateInfo()
    {   
        $model = new Info();
		//$model->autoPublish();
		//exit();
        $siteInfos = require(Yii::getAlias('@gallerycms') . '/config/sinfo/site-infos.php');
        $siteCodes = array_keys($siteInfos);
        $model = new Info();
		$sortInfos = $model->sortInfos;
        $sql = ''; 
		//$timeBase = time();
		for ($i = 0; $i < 8; $i++) {
		$timeBase = time() - 86400 * $i;
		foreach ($siteCodes as $siteCode) {
			foreach ($sortInfos as $sort => $name) {
                if ($sort != 'sqq') { continue;}
			    //if ($sort != 'smobile') { continue;}
			    //if ($sort != 'svisitor') { continue;}
			    //if ($sort != 'market') { continue;}
			$time = $timeBase - rand(10000, 18000) + 3600 * 3;
			echo date('Y-m-d H:i:s', $time); echo '<br />';
                $sql .= "UPDATE `wc_article` SET `status` = 1, `created_at` = {$time}, `updated_at` = {$time} WHERE `sort` = '{$sort}' AND `site_code`= '{$siteCode}' AND `status` = 0 LIMIT 1; \n";
			}
		}
		}
		echo $sql;exit();

        //$infos = $model->find()->select('id, sort, site_code')->limit(20)->all();
        $infos = $model->find()->select('id, sort, site_code')->all();
        $i = 0;
        foreach ($infos as $info) {
            $j = $i % 8;
            $siteCode = $siteCodes[$j];
            echo $j. $siteCode . '<br />';
            $info->site_code = $siteCode;
            //$info->update(false);
            $i++;

        }   
        print_r($infos);
        echo count($infos);
    }   
}
