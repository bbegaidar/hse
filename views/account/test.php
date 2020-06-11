<?php 
    include 'header.php';
    
    use yii\grid\GridView;
    
    use app\widgets\Alert;
    use app\models\Trainings;
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\helpers\ArrayHelper;
    use app\models\TestAnswer;
    
$this->title = Yii::$app->name.' - '.Yii::t('static','My tests');
$this->params['breadcrumbs'][] = Yii::t('static','My tests');
?>
<style>
    body {
        padding-top: 0;
    }

    .item-wrap {
        margin-top: 5em;
    }

</style>

            <?php // echo $this->render('_header.php',['pageName'=> Yii::t('static','My tests')]) ?>
<main class="main d-flex">
<?php echo $this->render('_side_menu.php') ?>
<div class="main-content d-flex">
<div class="item-wrap d-flex">
                    
                        <?= Alert::widget() ?>

                        

                            <div class="main-left d-flex">
                                <a href="<?= Url::toRoute(['account/tests']) ?>"><div class="icon"></div><?= Yii::t('static', 'Back') ?></a>
                                <p><?= Yii::t('static', 'Training') ?></p>
                                <h4><?= $training != null ? $training : $video_cat ?></h4>
                              </div>
                            <div class="main-right d-flex">
                <div class="test-wrap d-flex">
                            <div class="test d-flex" id="currentTest">
                                <?php 
                                $num = 0;
                                foreach ($questions as $question) {
                                    ++$num;
                                    echo '<div class="question">';
                                    echo '<p>№'.$num.' '.$question->question.'</p>';
                                    $answers = TestAnswer::find()->select(['id','answer'])->where(['question' => $question->id])->all();
                                    echo Html::radioList('answers['.$num.']', [], ArrayHelper::map($answers, 'id', 'answer'),['item' => function ($index, $label, $name, $checked, $value) {
                                        return '<label>' . Html::radio($name, $checked, ['value' => $value,'data-value'=>$label]) .'<span class="ob">' . $label . '</span></label>';
                                    }, 'class'=>'answer']);
                                    echo '</div>';
                                }?>
                                <?= Html::button('Закончить тест', ['id' => 'endBtn', 'disabled' =>'disabled', 'onclick'=>'endTest(event,'.$userTest->id.')']) ?>
                            </div>

</div>
</div>
</div>
</div>
</main>
      

<?php 

$questionCount = count($questions);
$url = Url::toRoute(['account/tests']);

$script = <<< JS

let mediaRecorder
let blob 
let chunks = []
let constraints = { audio: false, video: { width: 320, height: 240, frameRate: 5 } }
let answers = []
let testId = null

$('[type="radio"]').on('click', function(){
    let questionCount = $questionCount
    let radios = document.querySelectorAll('[type="radio"]:checked').length
    if (radios == questionCount) endBtn.removeAttribute('disabled')
})

window.endTest = function(event, id){
    let radios = document.querySelectorAll('[type="radio"]:checked')
    testId = id
    document.querySelectorAll('[type="radio"]').forEach(item => item.setAttribute('disabled','disabled'))
    endBtn.setAttribute('disabled','disabled')
    radios.forEach(item => {
        answers.push(item.value)
    })
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
            window.location.replace('$url') // redir
        })
    }

    mediaRecorder.ondataavailable = function(e) {
        chunks.push(e.data);
    }
    
    mediaRecorder.start()
}

function hasNoCamera (err) {
    currentTest.innerHTML = 'Вебкамера не доступна. Для того чтобы пройти тест разрешите сайту использовать вашу вебкамеру. Ссылка с инструкциями.'
}

function uploadVideo(blob, cb){
    let file = new File([blob], 'record.mp4', {type: 'video/mp4'})
    let fd = new FormData
    fd.append('video', file)
    fd.append('answers', JSON.stringify(answers))
    fd.append('id', testId)
       
    $.ajax({
        method: 'POST',
        url: '$url',
        data: fd,
        processData: false,
        contentType: false 
    })
    .done(cb)
}


useCamera()

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>






