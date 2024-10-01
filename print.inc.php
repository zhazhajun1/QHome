
<?php
  require_once 'datasets/config.inc.php'; 
  include 'dj.html';
?>
<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=5">
    <title><?php echo TITLE; ?></title>
    <meta name="description" content="<?php echo GRJS; ?>>
    <meta name="keywords" content="<?php echo GRJS; ?>">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery.fancybox@2.1.5/source/jquery.fancybox.css">
    <script type="text/javascript">
        if (!!window.ActiveXObject || "ActiveXObject" in window) { //is IE?
            alert('朋友，上古浏览器不支持呢~');
        }
    </script>
</head>

<body>
    <div id="body-wrap">
        <nav class="not_index_bg" id="nav" style="background-image:url(https://api.ixiaowai.cn/api/api.php)">
            <div id="page_site-info">
                <div id="site-title">
                    <span class="blogtitle"></span>
                    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
                    <script>
                        var typed = new Typed(".blogtitle", {
                            strings: ['欢迎来到 <?php echo NAME; ?> 的主页', 'Hello World!'],
                            startDelay: 300,
                            typeSpeed: 100,
                            startDelay: 300,
                            typeSpeed: 100,
                            loop: true,
                            backSpeed: 50,
                            showCursor: true
                        });
                    </script>
                </div>
            </div>
        </nav>
        <main id="content-outer">
            <div class="layout_page" id="content-inner">
                <div class="aside_content" id="aside_content">
                    <div class="card-widget card-info">
                        <div class="card-content">
                            <div class="card-info-avatar is-center">
                                <img class="avatar-img"
                                    src="<php echo AVATAR; ?>"
                                    alt="avatar">
                                <div class="author-info__name"><?php echo NAME; ?></div>
                                <div class="author-info__description"><?php echo GRJS; ?></div>
                            </div>
                            <div class="card-info-social-icons is-center">
                                <a class="social-icon" href="<?php echo GITHUB; ?>" target="_blank">
                                    <i class="fa fa-github"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-widget card-announcement">
                        <div class="card-content">
                            <div class="item-headline">
                                <i class="fa fa-bullhorn" aria-hidden="true"></i>
                                <span>一言</span>
                            </div>
                            <div id="hitokoto"></div>
                        </div>
                    </div>
                    <div class="card-widget card-announcement">
                        <div class="card-content">
                            <div class="item-headline">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <span>今日诗词</span>
                            </div>
                            <div id="jinrishici-sentence"></div>
                        </div>
                    </div>
                    
                </div>
                <article id="page">
                    <div class="article-container">
                        <h2>技能</h2>
                        <div class="skillbox">
                            <div class="skillbar">
                                <div class="skillbar-title"
                                    style="background: linear-gradient(to right, #FF0066 0%, #FF00CC 100%); width: 75%">
                                    <span>Java</span>
                                </div>
                                <div class="skill-bar-percent">75%</div>
                            </div>
                            <div class="skillbar">
                                <div class="skillbar-title"
                                    style="background: linear-gradient(to right, #9900FF 0%, #CC66FF 100%); width: 40%">
                                    <span>前端</span>
                                </div>
                                <div class="skill-bar-percent">40%</div>
                            </div>
                            <div class="skillbar">
                                <div class="skillbar-title"
                                    style="background: linear-gradient(to right, #2196F3 0%, #42A5F5 100%); width: 60%">
                                    <span>Spring</span>
                                </div>
                                <div class="skill-bar-percent">60%</div>
                            </div>
                            <div class="skillbar">
                                <div class="skillbar-title"
                                    style="background: linear-gradient(to right, #00BCD4 0%, #80DEEA 100%); width: 70%">
                                    <span>SpringMVC</span>
                                </div>
                                <div class="skill-bar-percent">70%</div>
                            </div>
                            <div class="skillbar">
                                <div class="skillbar-title"
                                    style="background: linear-gradient(to right, #00BCD4 0%, #f54009 100%); width: 80%">
                                    <span>SpringBoot</span>
                                </div>
                                <div class="skill-bar-percent">80%</div>
                            </div>
                            <div class="skillbar">
                                <div class="skillbar-title"
                                    style="background: linear-gradient(to right, #4CAF50 0%, #81C784 100%); width: 60%">
                                    <span>Mybatis</span>
                                </div>
                                <div class="skill-bar-percent">60%</div>
                            </div>
                            
                        </div>

                        <hr>

                        <hr>
                        <h2>友链</h2>
                        <div class="tool">
                            <a href="<?php echo URL1; ?>" target="_blank" rel="noopener noreferrer"><?php echo BT1; ?>、</a>
                            <a href="<?php echo URL2; ?>" target="_blank" rel="noopener noreferrer"><?php echo BT2; ?>、</a>
                            <a href="<?php echo URL3; ?>" target="_blank" rel="noopener noreferrer"><?php echo BT3; ?></a>
                        </div>
                    </div>
                </article>
            </div>
        </main>
        <hr>
        <footer id="footer">
            <div id="footer-wrap">
                <div class="copyright">&copy;2024 - 2099 BY <?php echo BQ; ?> </div>
                <footer style="text-align: center;"><a href="https://beian.miit.gov.cn" rel="external nofollow" target="_blank" style="color: black; text-decoration: none;"><img src="https://www.at8.fun/icp.png" alt="网站ICP备案" style="width: 16px;height: 16px;vertical-align: sub;margin-right: 5px;" /> <?php echo ICP; ?></a></footer>
            
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.fancybox@2.1.5/source/jquery.fancybox.js"></script>
    <script async src="//busuanzi.ibruce.info/busuanzi/2.3/busuanzi.pure.mini.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/instant.page@3.0.0/instantpage.js" type="module"></script>
    <script src="https://cdn.jsdelivr.net/npm/lazysizes@5.2.0/lazysizes.min.js" async></script>
    <!-- aplayer、meting -->
    <!-- require APlayer -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.css">
    <script src="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.js"></script>
    <!-- require MetingJS -->
    <script src="https://cdn.jsdelivr.net/npm/meting@2/dist/Meting.min.js"></script>

    <!-- nplayer -->
    <script src="https://unpkg.com/nplayer@latest/dist/index.min.js"></script>

    <!--   一言、今日诗词   -->
    <script src="https://v1.hitokoto.cn/?encode=js&select=%23hitokoto" defer></script>
    <script src="https://sdk.jinrishici.com/v2/browser/jinrishici.js" charset="utf-8"></script>

    <!-- 看板娘 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/gh/stevenjoezhang/live2d-widget@latest/autoload.js"></script>
    -->


    <!--鼠标点击效果-->
    <script src="https://cdn.jsdelivr.net/gh/TRHX/CDN-for-itrhx.com@3.0.8/js/maodian.js"></script>

    <script type="text/javascript">
        console.clear();
        console.log("%c 有朋自远方来, 不亦说乎.", "background:#24272A; color:#ffffff", "");
        console.log("%c Github %c", "background:#24272A; color:#ffffff", "", "https://github.com");
        console.log("%c 版本号: %c", "background:#24272A; color:#ffffff", "", "1.0.0");


          (function ($) {
            $.fn.snow = function (options) {
                var $flake = $('<div id="snowbox" />').css({ 'position': 'absolute', 'z-index': '9999', 'top': '-50px' }).html('&#10052;'),
                    documentHeight = $(document).height(),
                    documentWidth = $(document).width(),
                    defaults = {
                        minSize: 10,
                        maxSize: 20,
                        newOn: 1000,
                        flakeColor: "#AFDAEF" /* 此处可以定义雪花颜色，若要白色可以改为#FFFFFF */
                    },
                    options = $.extend({}, defaults, options);
                var interval = setInterval(function () {
                    var startPositionLeft = Math.random() * documentWidth - 100,
                        startOpacity = 0.5 + Math.random(),
                        sizeFlake = options.minSize + Math.random() * options.maxSize,
                        endPositionTop = documentHeight - 200,
                        endPositionLeft = startPositionLeft - 500 + Math.random() * 500,
                        durationFall = documentHeight * 10 + Math.random() * 5000;
                    $flake.clone().appendTo('body').css({
                        left: startPositionLeft,
                        opacity: startOpacity,
                        'font-size': sizeFlake,
                        color: options.flakeColor
                    }).animate({
                        top: endPositionTop,
                        left: endPositionLeft,
                        opacity: 0.2
                    }, durationFall, 'linear', function () {
                        $(this).remove()
                    });
                }, options.newOn);
            };
        })(jQuery);
        $(function () {
            $.fn.snow({
                minSize: 0, /* 定义雪花最小尺寸 */
                maxSize: 0,/* 定义雪花最大尺寸 */
                newOn: 9999999999999  /* 定义密集程度，数字越小越密集 */
            });
        }); 

        // 浏览器搞笑标题
        var OriginTitle = document.title;
        var titleTime;
        document.addEventListener('visibilitychange', function () {
            if (document.hidden) {
                // $('[rel="icon"]').attr('href', "/funny.ico");
                document.title = '╭(°A°`)╮ 页面崩溃啦 ~';
                clearTimeout(titleTime);
            }
            else {
                $('[rel="icon"]').attr('href', "/favicon.ico");
                document.title = '(ฅ>ω<*ฅ) 噫又好啦 ~' + OriginTitle;
                titleTime = setTimeout(function () {
                    document.title = OriginTitle;
                }, 2000);
            }
        });
    </script>
    <script type="text/javascript" id="myhk" src="https://myhkw.cn/api/player/1722687461180" key="1722687461180" m="1"></script>
</body>

</html>