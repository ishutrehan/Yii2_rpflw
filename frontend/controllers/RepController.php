<?php

namespace frontend\controllers;

use Yii;
use common\models\Sales;
use common\models\SalesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;
use yii\web\UploadedFile;
/**
 * RepController implements the CRUD actions for Sales model.
 */
class RepController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Sales models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new SalesSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

       
        $model = Sales::find()
                ->select('*')
                ->where(['user_id' => Yii::$app->user->identity->id])
                ->all();  
        return $this->render('index', [
              'model' => $model,  
        ]);
    }

    /**
     * Displays a single Sales model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Sales model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sales();

        $model->payment_status = 'Unpaid';
        $model->user_id = Yii::$app->user->identity->id;
        $model->invoice = '';
        $model->revenue = 0;
       
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Sales model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Sales model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sales model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sales the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sales::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionInvoice($id) 
    {
        $model = $this->findModel($id);

        $old_date = date($model->order_date);
        $new_date = date('F d, Y ', strtotime($old_date));
      
        $mpdf = new \Mpdf\Mpdf();
        $content = '<table style=float:right;margin-bottom:50px;text-align:right align=right><tr><td><span style=font-size:50px>INVOICE</span><tr><td> <tr><td>Date: '.$new_date.'<tr><td>INVOICE #'.$model->id.'<tr><td> <tr><td>'.$model->firstname.' '.$model->lastname.'</table><table style=width:100% align=center><thead><tr><td colspan=8><table style=width:100% align=center><thead><tr><td style=width:100px>Sales person<td style=width:100px>Job<td style=width:100px> <td style=width:100px> <td style=width:100px><td style=width:100px>Payment<td style=width:100px>Due Date</thead></table></thead><tr><td colspan=8><table style=width:100% style=border-collapse:collapse align=center border=1 cellpadding=0 cellspacing=0><tr><td style=width:100px>'.$model->firstname.' '.$model->lastname.'<td style=width:100px> <td style=width:100px> <td style=width:100px> <td style=width:100px> <td style=width:100px>Due on recipt<td style=width:100px> </table></table><br><table style=width:100% align=center><thead><tr><td colspan=6><table style=width:100% align=center><thead><tr><td style=width:130px>Qty<td style=width:130px>Finalize Date<td style=width:130px>Description<td style=width:130px>Job Number<td style=width:130px>Unit Price<td style=width:130px>Line Total</thead></table><tbody><tr><td><table style=width:100% style=border-collapse:collapse align=center border=1 cellpadding=0 cellspacing=0><tr><td style=width:130px>1<td style=width:130px>'.$model->finalize_date.'<td style=width:130px>'.$model->note.'<td style=width:130px><b>'.$model->jobnumber.'</b><td style=width:130px>$150.50<td style=width:130px>$150.50<tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td colspan=4> <td> <td> <tr><td style=text-align:right colspan=5>Subtotal<td>150.50<tr><td style=text-align:right colspan=5>Sales Tax<td><tr><td style=text-align:right colspan=5>Total<td>150.50</table></table>';
        $mpdf->WriteHtml($content);
        $mpdf->Output();
        exit();        
   
    }


    public function actionSettings() 
    {
        
        $user = User::findOne(Yii::$app->user->id);
        return $this->render('settings', [
            'user' => $user
        ]); 
    }


   public function actionUpdateuser(){

    $user = User::findOne(Yii::$app->user->id);
    $pass = $user['password_hash'];
    $oldimage = $user['image'];
    
    if(isset($_POST) && !empty($_POST)){

          $file_name = $oldimage;
          if(isset($_FILES['file']) && !empty($_FILES['file']['name'])){

              $errors= array();
              $file_name = $_FILES['file']['name'];
              $file_tmp =$_FILES['file']['tmp_name'];
              $file_type=$_FILES['file']['type'];
             
              $tmp = explode('.', $file_name);
              $file_extension = end($tmp);

              
              move_uploaded_file($file_tmp,"uploads/".$file_name);
           }



        $password = $_POST['password'];

        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->address = $_POST['address'];
        $user->city = $_POST['city'];
        $user->state = $_POST['state'];
        $user->zip_code = $_POST['zip'];
        $msg = 0;

        if(isset($_POST['password']) && !empty($_POST['password']) && !empty($_POST['newpassword']) && ($_POST['newpassword']) == ($_POST['confirmpassword'])) {

            if(Yii::$app->security->validatePassword($password, $pass)){
                $pass = Yii::$app->security->generatePasswordHash($_POST['newpassword']);
            }else{
                $msg = 1;
            }
        }

        $check = (isset($_POST['check']) && !empty($_POST['check'])) ? $_POST['check'] : 'no';

        $user->password_hash = $pass;
        $user->notification = $check;
        $user->image = $file_name;
        $user->save();
        if($msg){
            Yii::$app->session->setFlash('error', 'Incorrect password.');
        }
        else{
            Yii::$app->session->setFlash('Success',"Your information has been updated");
        }
        
        return $this->redirect(['/rep/settings']);
        }else{
           return $this->render('settings', [
                'user' => $user
            ]);
        }
    }


    public function actionTeam(){
        
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
                ->where(['status' => 'completed','finalize_date' => $created_at])
                ->count();

        $week = Sales::find()
                ->select('commission_amt')
                ->where(['between','finalize_date', $currntweek,$endweek])
                ->andwhere(['status' => 'completed'])
                ->count();        

        $month = Sales::find()
                ->select('commission_amt')
                ->where(['between','finalize_date', $first_date,$last_date])
                ->andwhere(['status' => 'completed'])
                ->count();   

          $year = Sales::find()
                ->select('commission_amt')
                ->where(['between','finalize_date', $start_date,$end_date])
                ->andwhere(['status' => 'completed'])
                ->count(); 

        $sales = Sales::find()
                ->select('*')
                ->where(['between','finalize_date', $currntweek,$endweek])
                ->andwhere(['status' => 'completed'])
                ->count();                  

         return $this->render('team',[
            'daily' => $daily,
            'week' => $week,
            'month' => $month,
            'year' => $year,
            'sales' => $sales,
            ]);
    } 


    public function actionSearch(){
            
     $search = Sales::find()
        ->where('jobnumber LIKE :query') 
        ->addParams([':query'=>'%'.$_GET['searchbar'].'%'])
        ->all();

         //    echo"<pre>";
         // print_r($search);
         //   die;                    

        return $this->render('search',[
            'search' => $search,
            ]);
    }

}
