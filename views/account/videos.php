<?php 
    include 'header.php';
    use yii\grid\GridView;
    use app\widgets\Alert;
    use yii\widgets\Pjax;
    use app\models\Trainings;
    use yii\helpers\Html;
    use yii\helpers\Url;
    
$this->title = Yii::$app->name.' - '.Yii::t('static','My tests');
$this->params['breadcrumbs'][] = Yii::t('static','My tests');
?>
<link rel="stylesheet" text ="style/css" href="/css1/font.css">
<link rel="stylesheet" text ="style/css" href="/css1/owl.carousel.css">
<style>
    /* body {
        padding-top: 0;
    }
    .item-wrap {
        margin-top: 3em;
    }

    td {
        font-family: unset;
        font-size: unset;
    }

    .item-wrap {
        margin-top: 5em;
    } */
    .video_study{
        padding-top: 6em;
        width: 100%;
        height:100vh;
    }
    .choosen_video{
        margin: auto;
        width: 80%;
        height: 15em;
        display: flex;
        /* padding-bottom:2em; */
    }
    .choosen_video__left{
        width: 25em;
        justify-content:left;
    }
    .video-title{
        color:#345b8b;
        font-family:"PantonSemiBold";
        font-size:1.3em;
    }
    .about_video{
        font-family: "PantonLight";
        font-size: 1em;
        color: gray;
        padding-top: 0.5em;
        height: 10em;
        overflow-y: scroll;
    }
    .choosen_video__right{
        width:24em;
        position:relative;
        top:0;
        left:0;
    }
    .video_block__video_study{
        position: absolute;
        top: 0;
        left: 2em;
        background-image:url("/img1/about/img-on-video.jpeg");
        background-repeat:no-repeat;
        background-size:cover;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        width: 100%;
        height: 12.6em;
        z-index: 4;
    }
    .video_block__video_study img{
        width: 5em;
        cursor: pointer;
        -webkit-animation: live-video-btn-online 2s infinite;
        animation:live-video-btn-online 2s infinite;
        -webkit-animation-duration: 3s;
        animation-duration: 3s;
    }
    @keyframes live-video-btn-online{
        0%{
            width:5em;
        }
        100%{
            width:3em;
        }
    }
    .video_study__video{
        position: absolute;
        top: 0;
        left: 2em;
        width: 93%;
        height: 12.6em;
    }
    .video-slider{
        width: 80%;
        margin: auto;
        /* padding-top:4em; */
    }
    .video-slider__title{
        color:#345b8b;
        font-family:"PantonSemiBold";
        font-size:1.3em;
    }
    .videosSlider{
        width: 100%;
        display: flex;
        justify-content: space-between;
        flex-wrap:wrap;
        padding-top: 1em;
    }
    .slide-video{
        width: 16.1em;
        background: white;
        text-align: center;
        padding: 1em 0 4em 0;
        border-radius: 3em 0;
    }
    .video_lessons_slider{
        width: 14em;
        height: 9em;
        outline:none;        
        display:flex;
        margin: auto;
        position: relative;
    }
    .video_lessons_slider .play {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 4em !important;
        cursor: pointer;
    }
    .video_lessons_slider .background {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .slide-video p{
        font-family: "PantonLight";
        font-size: 1em;
        color: gray;
    }
    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .NotActiveVideo {
        filter:grayscale(6);
    }

    .container_Video {
        display: block;
        padding-bottom: 4em;
    }

</style>

<?php $actionUrl = Url::toRoute(['account/videos']); ?>
<main class="main d-flex">
<?php echo $this->render('_side_menu.php') ?>
    <section class="video_study">
    <?php if ($video_cat): $sliderCount = 0; ?>        
            <div class="container_Video" id="videoCurrent">
                <div class="choosen_video flex">
                    <div class="choosen_video__left">
                        <div class="video-title"><?=$video_cat[0]->name?></div>
                        <div class="about_video"><?=$video_cat[0]->description?></div> 
                    </div>
                    <div class="choosen_video__right">                       
                        <div id='video_study__video' class="video_study__video"></div>
                        <div id="video_url" data-url="<?=isset($video_cat[0]->videos[0]) ? $video_cat[0]->videos[0]->url : ''?>" data-id="<?=isset($video_cat[0]->videos[0]) ? $video_cat[0]->videos[0]->id : ''?>" ></div>                        
                    </div>
                </div>
                
            <?php $count = 0; foreach ($video_cat as $video_item): ?>            
                <div class="video-slider">
                    <div class="video-slider__title"><?=$video_item->name?></div>
                    <div id = "video_slider_block<?=$sliderCount?>" class="owl-carousel videosSlider">                    
                        <?php foreach ($video_item->videos as $video): ?>                             
                            <div class="slide-video item">
                                <div data-id = "<?=$video->id?>" data-url="<?=$video->url?>" data-name="<?=$video_item->name?>" data-body="<?=$video_item->description?>" class = "video_lessons_slider <?= $count == 0 ? '' : ' NotActiveVideo' ?>">
                                    <img class="background" src="/img1/about/img-on-video.jpeg" alt="">
                                    <img class="play" data-id="<?=$sliderCount?>" src="/img1/about/btn-on-video.png" alt="">
                                </div>
                                <p><?=$video->name?></p>
                            </div>                            
                        <?php $count++; endforeach; ?>
                    </div>
                </div>                        
            <?php $sliderCount++; endforeach; ?>
            </div>
    <?php endif; ?>    
    <div id="currentUrl" data-id="<?=$actionUrl?>"></div>
    </section>
</main>


<script src = "/js1/jquery.js"></script>
<script src = "/js1/owl.js"></script>

<script>

    let mediaRecorder
    let blob 
    let chunks = []
    let constraints = { audio: false, video: { width: 320, height: 240, frameRate: 5 } }
    let answers = []
    let videoId = null
    let current_url = document.getElementById('currentUrl').getAttribute('data-id');

    window.endTest = function(event, id){
        videoId = id
        mediaRecorder.stop()
    }


    async function useCamera(){
        try {
            const mediaStream = await navigator.mediaDevices.getUserMedia(constraints)
            hasCamera(mediaStream)
        } catch(err) {
            hasNoCamera(err)
        }
    }

    function hasCamera(mediaStream) {
        
        mediaRecorder = new MediaRecorder(mediaStream)
        
        mediaRecorder.onstop = function(e) {
            blob = new Blob(chunks, { 'type' : 'video/mp4' });
            uploadVideo(blob, function () {
                window.location.replace(current_url) // redir
            })
        }

        mediaRecorder.ondataavailable = function(e) {
            chunks.push(e.data);
        }
        
        mediaRecorder.start()
    }

    function hasNoCamera (err) {
        videoCurrent.innerHTML = 'Вебкамера не доступна. Для того чтобы пройти тест разрешите сайту использовать вашу вебкамеру. Ссылка с инструкциями.'
        videoCurrent.style.color = 'black';
    }

    function uploadVideo(blob, cb){
        let file = new File([blob], 'record.mp4', {type: 'video/mp4'})
        let fd = new FormData
        fd.append('video', file)
        fd.append('id', videoId)
        
        $.ajax({
            method: 'POST',
            url: current_url,
            data: fd,
            processData: false,
            contentType: false 
        })
        .done(cb)
    }


    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    var player;
    var url = $('#video_url').data('url');
    var currentId = $('#video_url').data('id');
    function onYouTubeIframeAPIReady() {                
        player = new YT.Player('video_study__video', {
            videoId: url,
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
    }

    function onPlayerStateChange(event) {                
        var state = player.getPlayerState();
        if (state == 1) {
            useCamera()
            // StartVideo($('.video-click-online'))                        
        }
        if (state == 0) {
            endTest(event, currentId)
        }
    }

    function StartVideo(button) {
        var vid = $('.choosen_video__right').find('iframe');        
        // var symbol = $(vid)[0].src.indexOf("?") > -1 ? "&" : "?";    
        // $(vid)[0].src += symbol + "autoplay=1";
        if ($(vid)[0].requestFullScreen) {
            $(vid)[0].requestFullScreen()
        }
        else if ($(vid)[0].mozRequestFullScreen) {
            $(vid)[0].mozRequestFullScreen()
        }
        else if ($(vid)[0].webkitRequestFullScreen) {
            $(vid)[0].webkitRequestFullScreen()
        }                  
    }

    $('body').on('click','.play', function(e) {    
        var id = $(this).parents('.video_lessons_slider').data('id');    
        var src = $(this).parents('.video_lessons_slider').data('url');
        var name = $(this).parents('.video_lessons_slider').data('name');
        var body = $(this).parents('.video_lessons_slider').data('body');
        $('.video-title').text(name)
        $('.about_video').text(body)
        var all_frame = $('.video_lessons_slider');
        $(all_frame).addClass('NotActiveVideo');
        $(this).parents('.video_lessons_slider').removeClass('NotActiveVideo')
        currentId = id;
        player.loadVideoById(src, 0, "large")
    })

</script>