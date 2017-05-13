# 文件系统操作

文件系统组件用于对常用目录操作的实现

[TOC]
##开始使用

####安装组件
使用 composer 命令进行安装或下载源代码使用。

```
composer require aweitian/filesystem
```

####创建目录
```
filesystem::createDir('Home/View');
```

####删除目录
```
filesystem::delDir('Home');
```

####复制目录
```
filesystem::copyDir('a','b');
```

####删除文件
```
filesystem::delFile($file);
```

####目录大小
```
filesystem::size('Home');
```

####复制文件
```
filesystem::copyFile('README.md', 'tests/README.md')
```