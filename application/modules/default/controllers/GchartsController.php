<?php

class GchartsController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function indexAction() {


        $piChart = new gchart\gPieChart();

        $piChart->addDataSet(array(112, 315, 66, 40));
        $piChart->setLabels = array("first", "second", "third", "fourth");
        $piChart->setLegend(array("first", "second", "third", "fourth"));
        $piChart->setColors = array("ff3344", "11ff11", "22aacc", "3333aa");
        echo $piChart->getImgCode();
    }

}
