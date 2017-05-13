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
Filesystem::createDir('Home/View');
```

####删除目录
```
Filesystem::delDir('Home');
```

####复制目录
```
Filesystem::copyDir('a','b');
```

####新建文件
```
Filesystem::touch($file);
```

####删除文件
```
Filesystem::delFile($file);
```

####目录大小
```
Filesystem::size('Home');
```

####复制文件
```
Filesystem::copyFile('README.md', 'tests/README.md')
```