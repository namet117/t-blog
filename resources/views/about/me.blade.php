@extends('layouts.default')

@section('title', 'nameT的简介')
@section('content')
<div class="container">
    <div class="row about-me">
        <div class="col-md-3 col-md-offset-1 col-sm-12 side left">
            <div class="me">
                <div class="portrait center">
                    <img src="/images/avatar.jpg">
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
                    {{-- <li>
                        <label>英语水平</label>
                        <span>CET-4</span>
                    </li> --}}
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
                    <li><label>HTML/CSS</label><progress value="40" max="100"></progress></li>
                    <li><label>JavaScript</label><progress value="40" max="100"></progress></li>
                    <li><label>PHP</label><progress value="50" max="100"></progress></li>
                    <li><label>Redis</label><progress value="50" max="100"></progress></li>
                    <li><label>MySQL</label><progress value="40" max="100"></progress></li>
                    <li><label>Linux</label><progress value="30" max="100"></progress></li>
                    <li><label>Docker</label><progress value="30" max="100"></progress></li>
                </ul>
            </div>
        </div>
        <div class="col-md-offset-1 col-md-7 col-sm-12 side right">
            <div class="education">
                <h2><i class="glyphicon glyphicon-education" aria-hidden="true"></i> 教育经历</h2>
                <hr/>
                <ul>
                    <li>
                        <h3><span>天津科技大学{{--  - 应用化学（本科） --}}</span><time>2011.9-2015.6</time></h3>
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
                            <span>深圳市 * * * * * * －PHP开发工程师</span>
                            <time>2017.7-2018.4</time>
                        </h3>
                        <ul class="info-content">
                            <li>电商</li>
                        </ul>
                    </li>
                    <li>
                        <h3>
                            <span>深圳市 * * * 科技股份有限公司－PHP开发工程师</span>
                            <time>2015.10-2017.4</time>
                        </h3>
                        <ul class="info-content">
                            <li><mark>电商</mark></li>
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
                            <li>技术栈：Laravel+Redis+Bootstrap</li>
                            <li>
                                <i class="glyphicon glyphicon-send" aria-hidden="true"></i>
                                实现可将个人工作心得分享的平台
                                <br>
                                <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                                个人
                                <br>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="introduction">
                <h2><i class="glyphicon glyphicon-info-sign" aria-hidden="true"></i> 自我评价/期望</h2>
                <hr/>
                <p>每天码一码。</p>
            </div>
        </div>
    </div>
</div>
@stop
