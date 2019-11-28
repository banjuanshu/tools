<?php
/**
 * 获取实现某接口的类
 *
 */

function getImplementingClasses($interfaceName) {
    return array_filter(
     get_declared_classes(),
     function($className) use ($interfaceName) {
      return in_array($interfaceName, class_implements($className));
     }
    );
}
