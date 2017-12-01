<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Sales;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $created_at = date('m/d/Y');

        $monday = strtotime('last monday', strtotime('tomorrow'));
        $sunday = strtotime('+6 days', $monday);

        $currntweek = date('m/d/Y', $monday); 
        $endweek = date('m/d/Y', $sunday);
        
        $first_date = date('m/d/Y',strtotime('first day of this month'));
        $last_date = date('m/d/Y',strtotime('last day of this month'));

      $start_date = date("m/d/Y",strtotime('first day of January'));
      $end_date = date("m/d/Y",strtotime('last day of December'));

        $daily = Sales::find()
                ->select('commission_amt')
                ->where(['status' => 'completed','finalize_date' => $created_at])
                ->count();


        $week = Sales::find()
                ->select('commission_amt')
                ->where(['between','finalize_date', $currntweek,$endweek])
                ->andwhere(['status' => 'completed'])
                ->count();        

        $month = Sales::find()
                ->where(['between','finalize_date', $first_date,$last_date])
                ->andwhere(['status' => 'completed'])
                ->count();   

          $year = Sales::find()
                ->where(['between','finalize_date', $start_date,$end_date])
                ->andwhere(['status' => 'completed'])
                ->count(); 

        $sales = Sales::find()
                ->select('revenue')
                ->where(['between','finalize_date', $currntweek,$endweek])
                ->andwhere(['status' => 'completed'])
                ->count();                  

        return $this->render('index',[
             'daily' => $daily,
            'week' => $week,
            'month' => $month,
            'year' => $year,
            'sales' => $sales,
            ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(Yii::$app->urlManagerBackend->baseUrl.(''));
    }
}
