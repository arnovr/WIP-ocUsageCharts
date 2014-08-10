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

namespace OCA\ocUsageCharts\ChartType;

/**
 * @author    Arno van Rossum <arno@van-rossum.com>
 */
interface ChartTypeInterface
{
    const CHART_PIE = 'pie';
    const CHART_GRAPH = 'graph';

    /**
     * Set the specific type of graph ( should match consts )
     *
     * @param string $graphType
     * @return void
     */
    //public function setGraphType($graphType);

    /**
     * Get the specific type of graph
     *
     * @return string
     */
    //public function getGraphType();

    /**
     * Load the frontend files needed, it should only call \OCP\Util::add* stuff
     *
     * @return void
     */
    public function loadFrontend();

    /**
     * Load up the chart with usage
     *
     * @param array $usage
     * @return void
     */
    public function loadChart(array $usage);


    /**
     * Return what template to use.
     *
     * @return string
     */
    public function getTemplateName();


    /**
     * Return a unique identifier for this class instance
     *
     * @return string
     */
    public function getId();

    /**
     * Return the usage used
     *
     * @return \stdClass
     */
    public function getConfig();

}