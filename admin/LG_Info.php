<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>温馨提醒 - </strong> 当前版本为二次分发开源版，原作者已不再维护。 <button type="button"
        id="myButton" class="btn btn-secondary btn-rounded" data-toggle='modal' data-target='#bs-example-modal-lg'>查看介绍</button>
</div>

<div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">欢迎使用LikeGirl情侣小站</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>
                  本项目来自Ki的开源情侣小站, 属于二次分发内容。
                </p>
                <p>
                  感谢您的使用 当前LikeGirl最新开源地址: 
                  <a class="latestVersion" href="https://github.com/Cleanwn/LikeGirl">LikeGirl</a>
                </p>
                <p class="warning">
                  虽然我知道，大部分人都是来了直接下载源码，然后潇洒的离开。 虽然我知道现实就是如此的残酷，但我还是要以我萤虫之力对各位到来的同仁发出一声诚挚的嘶吼：Star，Star，Star。 在搭建这个美丽的网站同时，何不Star，为这个项目点赞呢！
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>


<style>
    .modal-content{
        border-radius: 1rem;
        font-family: 'Noto Serif SC', serif;
    }

    .modal-body img.versionImage {
        width: 100%;
        border-radius: 1rem;
    }

    .modal-body ul li {
        line-height: 2rem;
    }
    
    .modal-body{
        max-height: 70vh;
        overflow: auto;
    }
    
    .modal-body .warning{
        color: #ff6c2f;
        font-weight: bold;
    }
    
    .latestVersion{
        background: #0fbcff;
        color: #fff;
        padding: .2rem .6rem;
        border-radius: 1rem;
    }
</style>