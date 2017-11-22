<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use common\models\User;
use common\models\Sales;
use frontend\models\SignupForm;

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
                    'delete' => ['GET'],
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
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        

    }
    
    /**
     * Lists all Sales models.
     * @return mixed
     */
    public function actionSales()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = Sales::find()
                  ->all();
        return $this->render('sales', [
          'model' => $model
        ]);
    }
    
    /**
     * Lists all Sales models.
     * @return mixed
     */
    public function actionFinancials()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        return $this->render('financials');
    }

    public function actionFinancialsData()
    {
        $connection = \Yii::$app->db;
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = $connection->createCommand('SELECT DATE_FORMAT(`finalize_date`, "%b") AS Month, SUM(`revenue`) as revenue FROM sales WHERE `status` = "completed" GROUP BY DATE_FORMAT(`finalize_date`, "%b")');
        $revenue = $model->queryAll();

        $model = $connection->createCommand('SELECT DATE_FORMAT(`finalize_date`, "%b") AS Month, SUM(`commission_amt`) as commission FROM sales WHERE `status` = "completed" GROUP BY DATE_FORMAT(`finalize_date`, "%b")');
        $commissions = $model->queryAll();
        $resp = array(
            'revenue' => $revenue,   
            'commissions' => $commissions   
        );
        return $resp;

    }

    /**
     * Lists all Sales models.
     * @return mixed
     */
    public function actionTeam()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = User::find()
                  ->where(["role"=> 2 ])
                  ->all();

        $user = new User();          
        return $this->render('team', [
          'model' => $model,
          'user' => $user
        ]);
    }

    /**
     * Lists all Sales models.
     * @return mixed
     */
    public function actionSettings()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $user = User::findOne(Yii::$app->user->id);
        return $this->render('settings', [
            'user' => $user
        ]); 
       
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

        if(Yii::$app->request->post('update')) {
          $model->payment_status = Yii::$app->request->post('Sales')['payment_status'];
          $model->finalize_date = Yii::$app->request->post('Sales')['finalize_date'];
          $model->revenue = Yii::$app->request->post('Sales')['revenue'];
          $model->status = Yii::$app->request->post('Sales')['status'];
          if( Yii::$app->request->post('Sales')['status'] == "completed") {
            $model->completed_date = date("Y-m-d");
          }
          if ($model->save()) {
            Yii::$app->session->setFlash('Success',"Sale information has been updated");
            return $this->redirect(['sales']);
          }
        }else{
            return $this->render('update', [
                'model' => $model,
            ]);
        }
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


    /**
     * Deletes an existing Sales model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */

    public function actionDelete($id)
    {
        User::findOne($id)->delete();
        Yii::$app->session->setFlash('Success',"User has been deleted.");
        return $this->redirect(['team']);
    }


    public function actionInvoice($id) 
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = $this->findModel($id);

        $old_date = date($model->order_date);
        $new_date = date('F d, Y ', strtotime($old_date));
      
        $mpdf = new \Mpdf\Mpdf();
        $content = '<table style=float:right;margin-bottom:50px;text-align:right align=right><tr><td><span style=font-size:50px>INVOICE</span><tr><td> <tr><td>Date: '.$new_date.'<tr><td>INVOICE #'.$model->id.'<tr><td> <tr><td>'.$model->firstname.' '.$model->lastname.'</table><table style=width:100% align=center><thead><tr><td colspan=8><table style=width:100% align=center><thead><tr><td style=width:100px>Sales person<td style=width:100px>Job<td style=width:100px> <td style=width:100px> <td style=width:100px><td style=width:100px>Payment<td style=width:100px>Due Date</thead></table></thead><tr><td colspan=8><table style=width:100% style=border-collapse:collapse align=center border=1 cellpadding=0 cellspacing=0><tr><td style=width:100px>'.$model->firstname.' '.$model->lastname.'<td style=width:100px> <td style=width:100px> <td style=width:100px> <td style=width:100px> <td style=width:100px>Due on recipt<td style=width:100px> </table></table><br><table style=width:100% align=center><thead><tr><td colspan=6><table style=width:100% align=center><thead><tr><td style=width:130px>Qty<td style=width:130px>Finalize Date<td style=width:130px>Description<td style=width:130px>Job Number<td style=width:130px>Unit Price<td style=width:130px>Line Total</thead></table><tbody><tr><td><table style=width:100% style=border-collapse:collapse align=center border=1 cellpadding=0 cellspacing=0><tr><td style=width:130px>1<td style=width:130px>'.$model->finalize_date.'<td style=width:130px>'.$model->note.'<td style=width:130px><b>'.$model->jobnumber.'</b><td style=width:130px>$150.50<td style=width:130px>$150.50<tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <td style=width:130px> <tr><td colspan=4> <td> <td> <tr><td style=text-align:right colspan=5>Subtotal<td>150.50<tr><td style=text-align:right colspan=5>Sales Tax<td><tr><td style=text-align:right colspan=5>Total<td>150.50</table></table>';
        $mpdf->WriteHtml($content);
        $mpdf->Output();
        exit();        
   
    }

    public function actionSignup() 
    {

        $model = new SignupForm();

        Yii::$app->response->format = Response::FORMAT_JSON;

        $password = rand(100000, 10000000);
        $password_gen = Yii::$app->security->generatePasswordHash($password);
        $model->username = Yii::$app->request->post('User')['email'];
        $model->email = Yii::$app->request->post('User')['email'];
        $model->password = $password_gen;
        if ($model->validate()) {
            $email = Yii::$app->request->post('User')['email'];
            $firstname = Yii::$app->request->post('User')['first_name'];
            $lastname = Yii::$app->request->post('User')['last_name'];

            $user = new User();
            $user->username = $email;
            $user->first_name = $firstname;
            $user->last_name = $lastname;
            $user->email = $email;
            $user->status = 10;
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->password_hash = $password_gen;
            $user->role = 2;
            $user->save();

            $$html = "<p>Url: <a href='http://itsmiths.co.in/repflow/frontend/web/index.php'>Login</a></p>";
            $$html .= "<p>Email: ".$email."</p>";
            $$html .= "<p>Password: ".$password."</p>";
            $$html .= "";

            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom(["admin@repflow.com" => "Admin"])
                ->setSubject("Invited")
                ->setTextBody($html)
                ->send();

            return $user;           
        } else {
            $errors = $model->errors;
            $errors['errors'] = 'true';
            return $errors;
        }

    }


    public function actionUpdateuser()
    {
        $user = User::findOne(Yii::$app->user->id);
        $msg = 0;
        if(isset($_POST['save']))
        {   
            $file_name = $user->image;
            $pass = $user->password_hash;
            $user->attributes = $_POST;
    
            if(isset($_FILES['file']) && !empty($_FILES['file']['name']))
            {
                $errors= array();
                $file_name = date('U').'_'.$_FILES['file']['name'];
                $file_tmp = $_FILES['file']['tmp_name'];
                $file_type = $_FILES['file']['type'];                 
                $tmp = explode('.', $file_name);
                $file_extension = end($tmp);                  
                move_uploaded_file($file_tmp,"uploads/".$file_name);
            }

            if(!empty($_POST['password']) && !empty($_POST['newpassword']) ) {

                if($_POST['newpassword'] == $_POST['confirmpassword'])
                {
                    if(Yii::$app->security->validatePassword($_POST['password'], $pass))
                    {
                        $pass = Yii::$app->security->generatePasswordHash($_POST['newpassword']);
                    }
                    else
                    {
                        $msg = 1;
                    }
                } else {
                    $msg = 2;
                }

            }
         
            $user->password_hash = $pass;
            $user->image = $file_name;
            $check = (isset($_POST['check']) && !empty($_POST['check'])) ? $_POST['check'] : 'no';
            $user->notification = $check;
            if($msg == 1) {
                Yii::$app->session->setFlash('error', 'Incorrect password.');
            }
            elseif ($msg == 2) {
                Yii::$app->session->setFlash('error', 'Password and Confirm password not match.');
            }
            else{
                Yii::$app->session->setFlash('Success',"Your information has been updated");
            }

            $user->save();
            return $this->redirect(['/rep/settings']);

        }
    }


   public function actionSearch(){
   
    if(Yii::$app->user->isGuest) {
        return $this->goHome();
        }         
     $search = Sales::find()
        ->where('jobnumber LIKE :query') 
        ->addParams([':query'=>'%'.$_GET['keyword'].'%'])
        ->all();                  

        return $this->render('search',[
            'search' => $search,
            ]);
    }

}
