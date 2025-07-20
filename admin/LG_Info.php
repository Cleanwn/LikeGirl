<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>温馨提醒 - </strong> 当前版本为开源版，作者已不在维护。如需稳定使用请考虑新作品【LGNewUI】限时购买特惠--2024/06/09 <button type="button"
        id="myButton" class="btn btn-secondary btn-rounded" data-toggle='modal' data-target='#bs-example-modal-lg'>查看介绍</button>
</div>

<?php if ($login['user'] == $adminuser): ?>
    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Warning - </strong> 当前账号为默认账号 请尽快修改！
    </div>
<?php endif; ?>

<?php if ($login['pw'] == md5($adminpw)): ?>
    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Warning - </strong> 当前密码为默认密码 请尽快修改！
    </div>
<?php endif; ?>


<div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">欢迎使用LikeGirl情侣小站</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>经过一年的开发磨练 情侣小站迎来了延伸版本【LGNewUI】目前已经开发了许多实用增强功能 满足情侣记录所需要求 </p>
                <p>如您感兴趣请点击下方按钮【查看详情】进一步了解 如有打扰 请到【admin/index.php】删除注释提醒位置代码即可清除所有提示内容</p>
                <p>感谢您的使用 当前六一限定版本 原价<span class="badge badge-danger-lighten"><s>388.88</s></span>现在购买仅需<span class="badge badge-success-lighten">238.88/元</span> 凭学生证即可立减30元 功能详情可点击下方按钮了解</p>
                <div>
                    <h3>LG_NewUi 情侣小站2024 秋季限定</h3>
                    <ul>
                        <li>2.0.0 版本号 2023050108 发布于 2023-04-30</li>
                        <li>2.2.0 版本号 2023052018 发布于 2023-05-20</li>
                        <li>2.3.1 版本号 2023071013 发布于 2023-07-10</li>
                        <li>2.3.3 版本号 2023072320 发布于 2023-07-23</li>
                        <li>3.1x 版本号 2023092220 发布于 2023-09-22</li>
                        <li>新春限定 版本号 20240207 发布于 2024-02-06</li>
                        <li>五一限定 版本号 20240501 发布于 2024-04-29</li>
                        <li>六一限定 版本号 20240601 发布于 2024-06-01</li>
                        <li>2024 秋季限定 版本号 20241018 发布于 2024-10-18</li>
                    </ul>
                    <h4>最新版本更新详情</h4>
                    <ul>
                        <li>新增站内媒体对接云存储功能（Aws S3、COS、OSS、七牛云、又拍云）</li>
                        <li>新增后台资源存储策略管理页面（新增存储策略、预览、删除）</li>
                        <li>新增后台留言祝福管理员审核开关</li>
                        <li>新增后台留言祝福游客留言开关</li>
                        <li>新增后台留言前端展示数量截取开关</li>
                        <li>新增后台留言祝福支持编辑游客留言基本信息</li>
                        <li>新增后台文件上传时 支持跳过本次媒体压缩、跳过水印添加</li>
                        <li>新增前端顶部大图区域情侣头像支持设置头像框功能（预设 / 自定义）</li>
                        <li>新增前端留言祝福支持游客抽取预设随机祝福语句</li>
                        <li>新增前端祝福游客留言支持表情留言（抖音、QQ、酷安、泡泡、阿鲁）</li>
                        <li>新增公安部、萌 ICP 备案内容信息配置</li>
                        <li>新增后台自定义站内SEO关键词配置</li>
                        <li>新增支持点点滴滴自定义选择更新编辑文章时间</li>
                        <li>新增支持点点滴滴自定义音乐封面、音乐标题、音乐作者、音频URL地址</li>
                        <li>新增支持自定义 PC/移动端轮播大图高度</li>
                        <li>新增支持自定义恋爱日期标题内容（统计恋爱总天数卡片标题）</li>
                        <li>新增支持自定义顶部轮播情侣头像中间爱心图标URL</li>
                        <li>新增二级页面返回上一页按钮</li>
                        <li>新增支持切换移动端 Tab 栏模板（三套 新增一套）</li>
                        <li>新增后台恋爱相册上传视频支持封面自定义截取</li>
                        <li>新增支持管理员自定义 设置相册顶部封面大图高度</li>
                        <li>新增支持管理员自定义 子相册随机排序开关、图片最小高度设置</li>
                        <li>新增一套404引导页面 非法访问、IP封禁提示通用页</li>
                    </ul>
                    
                    <img src="https://blog.kikiw.cn/usr/uploads/2024/10/2968335545.png" alt="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary"><a target="_blank" style="color: #fff;"
                        href="https://blog.kikiw.cn/index.php/archives/65/">查看详情</a></button>
            </div>
        </div>
    </div>
</div>


<style>
    .modal-body img {
        width: 100%;
    }

    .modal-body ul li {
        line-height: 2rem
    }
</style>