<?php
/**
 * 2017/5/9 17:36:25
 * 目录操作
 */
namespace tian;

class dir
{
    /**
     * 获取目录所有文件大小(递归)
     * @param $dir string
     * @return int
     */
    public static function size($dir)
    {
        $s = 0;
        foreach (glob($dir.'/*') as $v) {
            $s += is_file($v) ? filesize($v) : self::size($v);
        }
        return $s;
    }
    /**
     * 删除文件,如果是文件就删除，返回是否删除成功.
     * 是目录不删除返回true
     * @param $file string 文件路径
     * @return bool
     */
    public static function delFile($file)
    {
        if (is_file($file)) {
            return !!unlink($file);
        }
        return true;
    }
    /**
     * 递归删除目录
     * 是文件不删除返回true
     * @param $file string 文件路径
     * @return bool
     */
    public static function del($dir)
    {
        if ( ! is_dir($dir)) {
            return true;
        }
        foreach (glob($dir."/*") as $v) {
            is_dir($v) ? self::del($v) : unlink($v);
        }
        return !!rmdir($dir);
    }
    /**
     * 创建目录
     * 如果目录存在返回
     * 不存在创建，并返回是否创建成功
     * 不递归创建
     * @return bool
     */
    public static function create($dir, $auth = 0755)
    {
        if ( ! empty($dir)) {
            return !!is_dir($dir) or !!mkdir($dir, $auth, true);
        }
    }
    /**
     * 复制目录(递归)
     * @return bool
     */
    public static function copy($old, $new)
    {
        is_dir($new) or mkdir($new, 0755, true);
        foreach (glob($old.'/*') as $v) {
            $to = $new.'/'.basename($v);
            is_file($v) ? copy($v, $to) : self::copy($v, $to);
        }
        return true;
    }
    /**
     * 复制文件
     * 如果不是文件返回false
     * @param $file 源路径，不存在返回false
     * @param $to 目录路径，只创建dirname($to)
     * @return bool
     */
    public function copyFile($file, $to)
    {
        if ( ! is_file($file)) {
            return false;
        }
        //创建目录
        self::create(dirname($to));
        return copy($file, $to);
    }
    /**
     * 移动目录
     * @return bool
     */
    public static function move($old, $new)
    {
        if (self::copy($old, $new)) {
            return self::del($old);
        }
        return false;
    }
    /**
     * 移动文件
     *
     * @param string $file 文件
     * @param string $dir  目录
     *
     * @return bool
     */
    public static function moveFile($file, $dir)
    {
        is_dir($dir) or mkdir($dir, 0755, true);
        if (is_file($file) && is_dir($dir)) {
            copy($file, $dir.'/'.basename($file));
            return unlink($file);
        }
        return false;
    }
}