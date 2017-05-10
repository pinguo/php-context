<?php
/**
 * @desc: 处理请求的上下文接口
 * @author: xudianyang <xudianyang@camera360.com>
 * @date: 2017/5/10
 * @copyright All rights reserved.
 */

namespace PG\Context;

use PG\Log\PGLog;

abstract class AbstractContext implements \ArrayAccess
{
    /**
     * @var
     */
    public $useCount;

    /**
     * @var
     */
    public $genTime;

    /**
     * @var string
     */
    public $logId;

    /**
     * @var PGLog
     */
    public $PGLog;

    public function __sleep()
    {
        return ['logId'];
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        $this->{$offset} = $value;
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->{$offset});
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->{$offset});
    }

    /**
     * @param mixed $offset
     * @return null
     */
    public function offsetGet($offset)
    {
        return isset($this->{$offset}) ? $this->{$offset} : null;
    }

    public abstract function destroy();
}