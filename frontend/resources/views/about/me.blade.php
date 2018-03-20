@extends('layouts.default')

@section('title', 'nameT的简介')
@section('content')
<div class="container">
    <div class="row about-me">
        <div class="col-md-3 col-md-offset-1 col-sm-12 side left">
            <div class="me">
                <div class="portrait center">
                    <img src="http://file.namet.xyz/images/avatar.jpg?x-oss-process=style/avatar-round">
                </div>

                <h2 class="name center">nameT</h2>
                <h5 class="job center">PHP开发工程师 / 深圳</h5>
            </div>
            <div class="profile">
                <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 基本信息</h2>
                <hr/>
                <ul>
                    <li>
                        <label>个人信息</label>
                        <span>nameT / 男 / 24岁</span>
                    </li>
                    <li>
                        <label>英语水平</label>
                        <span>CET-4</span>
                    </li>
                </ul>
            </div>
            <div class="contact">
                <h2><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i> 联系方式</h2>
                <hr/>
                <ul>
                    <li><label>邮箱</label><a href="mailto:namet117@163.com" target="_blank">namet117@163.com</a></li>
                    <li><label>个人主页</label><a href="https://namet.xyz/" target="_blank">namet.xyz</a></li>
                    <li><label>Github</label><a href="https://github.com/namet117" target="_blank">github.com/namet117</a></li>
                </ul>
            </div>
            <div class="progress-list">
                <h2><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i> 技能点</h2>
                <hr/>
                <ul>
                    <li><label>HTML/CSS</label><progress value="60" max="100"></progress></li>
                    <li><label>JavaScript</label><progress value="70" max="100"></progress></li>
                    <li><label>PHP</label><progress value="85" max="100"></progress></li>
                    <li><label>Redis</label><progress value="90" max="100"></progress></li>
                    <li><label>MySQL</label><progress value="60" max="100"></progress></li>
                    <li><label>MonogDB</label><progress value="40" max="100"></progress></li>
                    <li><label>Linux</label><progress value="30" max="100"></progress></li>
                    <li><label>Docker</label><progress value="30" max="100"></progress></li>
                </ul>
            </div>
        </div>
        <div class="col-md-7 col-md-offset-1 col-sm-12 side right">
            <div class="education">
                <h2><i class="glyphicon glyphicon-education" aria-hidden="true"></i> 教育经历</h2>
                <hr/>
                <ul>
                    <li>
                        <h3><span>天津科技大学 - 应用化学（本科）</span><time>2011.9-2015.7</time></h3>
                        <p></p>
                    </li>
                </ul>
            </div>
            <div class="work">
                <h2><i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i> 工作经历</h2>
                <hr/>
                <ul>
                    <li>
                        <h3>
                            <span>深圳市 * * * 科技投资有限公司－PHP开发工程师</span>
                            <time>2017.7-至今</time>
                        </h3>
                        <ul class="info-content">
                            <li>开发积分系统。</li>
                            {{--<li>主要参与公司产品「XXXX」的前端开发工作，实现接入微博、微信、QQ等<mark>第三方账号登录</mark>等功能。项目采用技术栈WordPress+NAMP。</li>--}}
                            {{--<li>活动页面的开发（七夕活动、抽奖活动以及承接外包页面）。</li>--}}
                            {{--<li>论坛<mark>图片增量备份</mark>（CentOS+vsftpd+crontab）<a href="#" target="_blank"><i class="fa fa-link" aria-hidden="true"></i>博客文章</a>。</li>--}}
                        </ul>
                    </li>
                    <li>
                        <h3>
                            <span>深圳市 * * * 科技股份有限公司－PHP开发工程师</span>
                            <time>2015.10-2017.4</time>
                        </h3>
                        <ul class="info-content">
                            <li>深度参与开发 <mark>商城</mark>。</li>
                            {{--<li>参与开发和维护 <mark>海豚供应链API系统</mark></li>--}}
                            {{--<li>参与开发和维护 <mark>海豚供应链ERP系统</mark></li>--}}
                            {{--<li>主要参与公司产品「XXXX」的前端开发工作，实现接入微博、微信、QQ等<mark>第三方账号登录</mark>等功能。项目采用技术栈WordPress+NAMP。</li>--}}
                            {{--<li>活动页面的开发（七夕活动、抽奖活动以及承接外包页面）。</li>--}}
                            {{--<li>论坛<mark>图片增量备份</mark>（CentOS+vsftpd+crontab）<a href="#" target="_blank"><i class="fa fa-link" aria-hidden="true"></i>博客文章</a>。</li>--}}
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="project">
                <h2><i class="glyphicon glyphicon-console" aria-hidden="true"></i> 个人项目</h2>
                <hr/>
                <ul>
                    <li>
                        <h3>
                            <span>个人博客项目</span>
                            <span class="link"><a href="https://namet.xyz" target="_blank">namet.xyz</a></span>
                            <time>2017.12-2018.1</time>
                        </h3>
                        <ul class="info-content">
                            <li>技术栈：Laravel+Redis+Vue2+iView+Bootstrap</li>
                            <li>
                                <i class="glyphicon glyphicon-send" aria-hidden="true"></i>
                                实现可将个人工作心得分享的平台
                                <br>
                                <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                                个人
                                <br>
                                {{--<i class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></i>--}}
                                {{--[贡献]完成从<mark></mark>--}}
                                {{--<br>--}}
                                {{--<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>--}}
                                {{--[效果]作品最终取得第三届共享杯国家级竞赛“一等奖” （2/2000）</li>--}}
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="introduction">
                <h2><i class="glyphicon glyphicon-info-sign" aria-hidden="true"></i> 自我评价/期望</h2>
                <hr/>
                <p>永远都不要停滞不前。</p>
            </div>
        </div>
    </div>
</div>
@stop
