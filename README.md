

# AppRepo-iReader

搭建私人掌阅电子阅读器应用程序商店

<br />

<p align="center">
  
<!-- PROJECT SHIELDS -->

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
</p>

<!-- PROJECT LOGO -->
<p align="center">  
  <a href="https://github.com/RoyLaw/AppRepo-iReader">
    <img src="logo.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">一个简单的掌阅应用程序商店</h3>
  <p align="center">
    解决掌阅电子阅读器无法安装第三方应用的问题！
    <br />

  </p>

</p>

<br />
<br />
 
## 目录

- [实现原理](#实现原理)
- [使用指南](#使用指南)
  - [运行环境](#运行环境)
  - [使用步骤](#使用步骤)
- [文件目录说明](#文件目录说明)
- [使用到的框架](#使用到的框架)
- [版本控制](#版本控制)
- [版权说明](#版权说明)
- [鸣谢](#鸣谢)

### 实现原理

劫持电子阅读器访问掌阅应用商店的请求（建议将电子阅读器的 DNS 服务指向一个可以自定义解析条目的服务器），将请求转至自建商店服务，替换官方商店中的项目，以实现在电子阅读器上安装第三方安卓应用的目的。

本自制商店程序可以通过 Excel 表格较为方便地管理私人商店中的应用项目。

[解决方案来源](https://hksanduo.github.io/2021/11/09/2021-11-09-ireader-smart-xs-pro-crack)

### 使用指南


###### 运行环境

1. Web 服务 (Nginx/Apache/etc.)
2. PHP 5.3.2+ 以上版本
3. Dnsmasq (或其它 DNS 服务器)
4. [Android Asset Packaging Tool](https://thismj.cn/2019/03/06/aapt-ming-ling-xing-shi-yong-shi-jian/)
5. Zip

###### 使用步骤

1. 搭建 Web 服务
2. 创建域名为 ebook.zhangyue.com 的网站，该网站需支持 PHP 运行环境，该网站无需 SSL 支持
3. 将本项目中的程序上传至网站 zybook3/app/ 目录中（需新建）
4. 修改网站中 app.xlsx 电子表格文件，每行填入一个第三方应用的相关信息
5. 在一个可以修改解析记录的 DNS 服务器（可自建）中添加解析记录，将 ebook.zhangyue.com 指向本项目自建 Web 服务器的 IP 地址
6. 修改电子阅读器的网络设置，使电子阅读器使用已修改解析记录的 DNS 服务器。建议在无线路由器上实现 DNS 自定义解析，这样阅读器加入该无线网即可访问自定义网站，否则可在加入无线网时使用 显示高级选项 \ IP 设置（静态）\ 域名 1 填入自定义 DNS服务器

**获得第三方应用相关信息和封装成阅读器可接受格式的方法请参阅 [解决方案来源](https://hksanduo.github.io/2021/11/09/2021-11-09-ireader-smart-xs-pro-crack)**

### 文件目录说明

```
/zybook3/app/
            │  .gitattributes
            │  .htaccess
            │  .user.ini
            │  404.html
            │  app.php           ->主程序
            │  app.xlsx          ->自定义应用程序电子表格
            │  composer.json
            │  composer.lock
            │  index.html
            │  logo.png
            │  README.md
            │  
            └─vendor             ->支持库


```


### 使用到的框架

- [simple-excel](https://github.com/spatie/simple-excel)
- [Laravel's Collections](https://github.com/tighten/collect)


### 版本控制

该项目使用Git进行版本管理。您可以在repository参看当前可用版本。


### 版权说明

该项目签署了MIT 授权许可，详情请参阅 [LICENSE.txt](https://github.com/RoyLaw/AppRepo-iReader/blob/main/LICENSE)

### 鸣谢


- [Sanduo's Blog](https://hksanduo.github.io/)


<!-- links -->
[your-project-path]:shaojintian/Best_README_template
[contributors-shield]: https://img.shields.io/github/contributors/RoyLaw/AppRepo-iReader.svg?style=flat-square
[contributors-url]: https://github.com/RoyLaw/AppRepo-iReader/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/RoyLaw/AppRepo-iReader.svg?style=flat-square
[forks-url]: https://github.com/RoyLaw/AppRepo-iReader/network/members
[stars-shield]: https://img.shields.io/github/stars/RoyLaw/AppRepo-iReader.svg?style=flat-square
[stars-url]: https://github.com/RoyLaw/AppRepo-iReader/stargazers
[issues-shield]: https://img.shields.io/github/issues/RoyLaw/AppRepo-iReader.svg?style=flat-square
[issues-url]: https://img.shields.io/github/issues/RoyLaw/AppRepo-iReader.svg
[license-shield]: https://img.shields.io/github/license/RoyLaw/AppRepo-iReader.svg?style=flat-square
[license-url]: https://github.com/RoyLaw/AppRepo-iReader/blob/master/LICENSE.txt



