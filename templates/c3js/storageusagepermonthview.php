<?php
$url = \OCP\Util::linkToRoute('ocusagecharts.chart_api.preflighted_cors', array('id' => $_['chart']->getConfig()->getId(), 'requesttoken' => $_['requesttoken']));
echo '
<div style="height: 50px;"></div>
<h1>';
p($l->t($_['chart']->getConfig()->getChartType()));
echo '</h1>
<div class="chart" id="chart" data-url="' . $url . '" data-type="bar" data-format="%Y-%m" data-label="TODO"><div class="icon-loading" style="height: 60px;"></div></div>';
