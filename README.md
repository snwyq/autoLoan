## 安装:

进入项目根目录

1.  下载压缩包解压到你机器的www任何目录。  

2.  将/database/databasebak.sql 备份到您的mysql数据库。 【会自动创建数据库，您不用先创建】

3.  dos界面进入  wwww目录 ， 执行命令 `composer install` 

4.  将根目录下的.env.true 另存为 .env        [本文件只有后缀没有名，不用奇怪] 
 

按道理应该是可以运行了。 

如果您的数据库密码不是root, 那到.env里面把数据库密码改一下就OK了。 
 
 
   

    后台访问地址: `http://localhost:8080/web/admin/` 管理员 帐号 `hehe` 密码 `111111`

## 目录结构

```
api             api
backend         后台
common          核心
console         命令
database        数据库（迁移 填充）
frontend        前台
plugins         插件
runtime         运行时（日志 缓存等）
tests           测试
vendor          扩展
web             web统一入口（web服务器可只开放该目录,保证安全）
wechat          微信
.env            基本配置文件
helpers         基本工具函数（已自动加载）
```

## 现有功能:

* rbac权限管理

* 系统配置,管理员操作日志等

* 文章,单页,评论,弹幕等

* 数据库备份还原

* 国际化 主题 皮肤

* 可拆卸插件

* todo

 

 

