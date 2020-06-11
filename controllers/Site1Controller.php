<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UploadForm;
use app\models\Photogallery;
use app\models\Documents;
use app\models\Trainings;
use app\models\TrainingsCategory;
use app\models\Pages;
use app\models\Team;
use app\models\Answers;
use app\models\Reviews;
use app\models\VideoAboutCompany;
use app\models\Licences;
use app\models\Logo;
use yii\web\UploadedFile;
use app\models\Entry;
use app\modules\UserInfo;

use app\models\User;
use app\models\RegistrationForm;

use app\models\News;
use app\models\NewsCategory;

class Site1Controller extends Controller
{
  /**
   * {@inheritdoc}
   */
  public function behaviors()
  {
      return [
          'access' => [
              'class' => AccessControl::className(),
              'only' => ['logout'],
              'rules' => [
                  [
                      'actions' => ['logout'],
                      'allow' => true,
                      'roles' => ['@'],
                  ],
              ],
          ],
          'verbs' => [
              'class' => VerbFilter::className(),
              'actions' => [
                  'logout' => ['post'],
                  'form-callback' => ['post']
              ],
          ],
      ];
  }
  
  /**
   * {@inheritdoc}
   */
  public function actions()
  {
      return [
          'error' => [
              'class' => 'yii\web\ErrorAction',
          ],
          'captcha' => [
              'class' => 'yii\captcha\CaptchaAction',
              'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
          ],
      ];
  }

  public function beforeAction($action)
  {                    
      $this->layout = false;
      if ($action->id == 'photo-gallery' && $action->id == 'form-callback') {           
        $this->enableCsrfValidation = false;
      }      
      return parent::beforeAction($action);
  }

  public function actionIndex()
  {
    $services = Pages::find()->all();
    return $this->render('index',[
      'services' => $services
    ]);
  }

  public function actionAbout()
  {
    $services = Pages::find()->all();
    $video = VideoAboutCompany::find()->byLang()->andWhere(['is_active' => 1])->one();
    return $this->render('about',[
      'services' => $services,
      'video' => $video
    ]);
  }

  public function actionServices($page) 
  {
    $services = Pages::find()->all();
    $service = Pages::find()->andWhere(['url' => $page])->one();    
    if ($service) 
    {
      $service->images = json_decode($service->images);
      return $this->render('delivery', [
        'services' => $services,
        'service_one' => $service
      ]);
    }        
  }

  public function actionContacts()
  {
    $services = Pages::find()->all();
    $teams = Team::find()->all();
    return $this->render('contacts',[
      'services' => $services,
      'teams' => $teams
    ]);
  }
  
  public function actionLicense()
  {
    $services = Pages::find()->all();
    $licences = Licences::find()->andWhere(['is_active' => 1])->all();
    return $this->render('license',[
      'services' => $services,
      'licences' => $licences
    ]);
  }

  public function actionPartners()
  {
    $services = Pages::find()->all();
    $partners = Logo::find()->andWhere(['is_active' => 1])->all();
    return $this->render('partners',[
      'services' => $services,
      'partners' => $partners
    ]);
  }
  
  public function actionSchedulle($page = null)
  {
    $services = Pages::find()->all();
    date_default_timezone_set('Asia/Almaty');
    $date = date('Y-m-d') ;
    $time = date('H:i');
    if ($page == 'Workshops') {
      $trainings = Trainings::find()->andWhere(['category' => 2])->orderBy(['startDate' => SORT_DESC])->limit(3)->all();
    }
    else if ($page == 'Courses') {
      $trainings = Trainings::find()->andWhere(['category' => 3])->orderBy(['startDate' => SORT_DESC])->limit(3)->all();
    }
    else {
      $trainings = Trainings::find()->orderBy(['startDate' => SORT_DESC])->all();
    }    
    $entries = Entry::find()->select('training')->where(['user' => UserInfo::getId()])->column();
    $isGuest = Yii::$app->user->isGuest;
    return $this->render('schedulle',[
        'trainings' => $trainings,
        'entries' => $entries,
        'services' => $services,
        'isGuest' => $isGuest,
    ]);
  }

  public function actionEntry($id){
        
    $entry = Entry::find()->where(['user' => UserInfo::getId()])->andWhere(['training' => $id])->one();
    if ($entry) {
        Yii::$app->session->setFlash('success','Вы уже записаны на данное мероприятие');
    } else {
        $entry = new Entry();
        $entry->user = UserInfo::getId();
        $entry->training = $id;
        $entry->confirm = 0;
        $entry->visited = 0;
        $entry->save();
        Yii::$app->session->setFlash('success','Вы записались на участие в мероприятие. Наш менеджер свяжется с вами в ближайшее время');
    }
    
    
    return $this->redirect('schedulle');
  }

  public function actionScheduleAll($page) {
    \Yii::$app->response->format = Response::FORMAT_JSON;
    date_default_timezone_set('Asia/Almaty');
    $date = date('Y-m-d') ;
    $time = date('H:i');
    if (Yii::$app->request->isAjax) { 
        if ($page == 'Workshops') {
          $trainings = Trainings::find()->andWhere(['category' => 2])->orderBy(['startDate' => SORT_DESC])->limit(3)->all();
        }
        else if ($page == 'Courses') {
          $trainings = Trainings::find()->andWhere(['category' => 3])->orderBy(['startDate' => SORT_DESC])->limit(3)->all();
        }
        else {
          $trainings = Trainings::find()->orderBy(['startDate' => SORT_DESC])->all();
        }
        $entries = Entry::find()->select('training')->where(['user' => UserInfo::getId()])->column();
        return [$trainings, $entries];           
    }
    else {
        return 'error';
    }
  }

  public function actionPhoto_gallery($page = null)
  {
    $services = Pages::find()->all();
    $year = [];
    $month = [];

    $unique_year = [];
    $unique_month = [];
    if ($page == 'Workshops') {
      $photogallery = Photogallery::find()->andWhere(['category_id' => 1])->andWhere(['active' => 1])->andWhere(['>','year', 2012])->orderBy(['date' => SORT_DESC])->limit(3)->all();
      $photo = Photogallery::find()->andWhere(['category_id' => 1])->andWhere(['active' => 1])->andWhere(['>','year', 2012])->orderBy(['date' => SORT_DESC])->all();
    }
    else if ($page == 'Courses') {
      $photogallery = Photogallery::find()->andWhere(['category_id' => 2])->andWhere(['active' => 1])->andWhere(['>','year', 2012])->orderBy(['date' => SORT_DESC])->limit(3)->all();      
      $photo = Photogallery::find()->andWhere(['category_id' => 2])->andWhere(['active' => 1])->andWhere(['>','year', 2012])->orderBy(['date' => SORT_DESC])->all();
    }
    else {
      $photogallery = Photogallery::find()->andWhere(['active' => 1])->andWhere(['>','year', 2012])->orderBy(['date' => SORT_DESC])->limit(3)->all();
      $photo = Photogallery::find()->andWhere(['active' => 1])->andWhere(['>','year', 2012])->orderBy(['date' => SORT_DESC])->all();
    }
    foreach ($photo as $gallery) {
      $y = date("Y", $gallery->date);
      $m = date("m", $gallery->date);
      if (!in_array($y, $unique_year)) {
        $item = [$y, 1];
        array_push($unique_year, $y);
        array_push($year, $item);
      }
      else {
        $key = array_search($y, $unique_year);
        $year[$key][1]++;
      }
      if (!in_array($m, $unique_month)) {
        $item = [$m, 1];
        array_push($unique_month, $m);
        array_push($month, $item);
      }
      else {
        $key = array_search($y, $unique_month);
        $month[$key][1]++;
      }
    }
            
    return $this->render('photogallery',[
      'services' => $services,
      'photogallery' => $photogallery,
      'year' => $year,
      'month' => $month,
    ]);
  }

  public function actionPhotoGallery($page) {
    \Yii::$app->response->format = Response::FORMAT_JSON;
    
    if (Yii::$app->request->isAjax) { 
        if ($page == 'Workshops') {
          $photogallery = Photogallery::find()->andWhere(['category_id' => 1])->andWhere(['active' => 1])->orderBy(['date' => SORT_DESC])->all();
        }
        else if ($page == 'Courses') {
          $photogallery = Photogallery::find()->andWhere(['category_id' => 2])->andWhere(['active' => 1])->orderBy(['date' => SORT_DESC])->all();      
        }
        else {
          return 'error';
        }
        return $photogallery;           
    }
    else {
        return 'error';
    }
  }

  public function actionFormCallback()
  {
    \Yii::$app->response->format = Response::FORMAT_JSON;
    $request = Yii::$app->request;

    if($request->isAjax){      
      $name = $request->post('sender-name');
      $phone = $request->post('sender-phone');
      $subject = 'Без темы';            
      $message = '<p>Пожалуйста перезвоните мне</p>';
      $message .= '<p>Меня зовут: '.$name.'</p>';
      $message .= '<p>Мой номер телефона: '.$phone.'</p>';
            // mail@osvald.kz
      $success = Yii::$app->mailer->compose()
          ->setTo('rahatsadykov784@gmail.com')
              ->setFrom('mail@osvald.kz')
              ->setSubject($subject)
              ->setHtmlBody($message)
              ->send();
      return $success;
    } else {
      return "error";
    }
  }
             		        
}
