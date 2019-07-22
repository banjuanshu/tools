<?php

/**
     * 获取指定日期对应星座
     *
     * @param integer $month 月份 1-12
     * @param integer $day 日期 1-31
     * @return boolean|string
     */
    function getConstellation($month, $day)
    {
        $day   = intval($day);
        $month = intval($month);
        if ($month < 1 || $month > 12 || $day < 1 || $day > 31) return false;
        $signs = array(
                array('20'=>'宝瓶座'),
                array('19'=>'双鱼座'),
                array('21'=>'白羊座'),
                array('20'=>'金牛座'),
                array('21'=>'双子座'),
                array('22'=>'巨蟹座'),
                array('23'=>'狮子座'),
                array('23'=>'处女座'),
                array('23'=>'天秤座'),
                array('24'=>'天蝎座'),
                array('22'=>'射手座'),
                array('22'=>'摩羯座')
        );
        list($start, $name) = each($signs[$month-1]);
        if ($day < $start)
            list($start, $name) = each($signs[($month-2 < 0) ? 11 : $month-2]);
        return $name;
    }



    echo getConstellation("1", 31);
