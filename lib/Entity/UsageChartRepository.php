<?php
/**
 * Copyright (c) 2014 - Arno van Rossum <arno@van-rossum.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace OCA\ocUsageCharts\Entity;

use OCA\ocUsageCharts\Dto\FactoryStorageUsage;
use \OCP\IDb;
use \OCP\AppFramework\Db\Mapper;
use \stdClass as ChartDataConfig;

/**
 * @TODO, mapper stuff http://doc.owncloud.org/server/7.0/developer_manual/app/database.html
 * @author Arno van Rossum <arno@van-rossum.com>
 */
class UsageChartRepository extends Mapper
{
    public function __construct(IDb $db) {
        //parent::__construct($db, 'ocUsageCharts');
    }

    /**
     * @param ChartDataConfig $config
     * @return array
     */
    public function getUsage(ChartDataConfig $config)
    {
        switch($config->chartDataType)
        {
            default:
            case 'StorageUsageList':
                $data = FactoryStorageUsage::getUsageList($config->userName);        // @TODO nice parser...
                $new = array();
                foreach($data as $item)
                {
                    $new[] = $item->toJson();
                }
                $data = array($config->userName => $new);
            break;
            case 'StorageUsageFree':
                $storageInfo = \OC_Helper::getStorageInfo('/');

                $used = ceil($storageInfo['used'] / 1024 / 1024);
                //$total = \OC_Helper::humanFileSize($storageInfo['total']);
                $free = ceil($storageInfo['free'] / 1024 / 1024);
                $data = array(
                    'used' => $used,
                    'free' => $free
                );
            break;
        }

        return $data;
    }
}