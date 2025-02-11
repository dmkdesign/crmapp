<?php
namespace app\controllers;

// use app\models\customer\Customer;
// use app\models\customer\CustomerRecord;
// use app\models\customer\Phone;
// use app\models\customer\PhoneRecord;
 use app\models\customer\Customer;
use yii\data\ArrayDataProvider;
use yii\web\Controller;

class CustomersController extends Controller
{

    /**
     * {@inheritdoc}
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
     * Lists all Customer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Customer::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customer model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Customer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Customer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Customer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Customer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
//     public function actionIndex()
//     {
//         $records = $this->findRecordsByQuery();
//         return $this->render('index', compact('records'));
//     }

//     private function findRecordsByQuery()
//     {
//         $number = \Yii::$app->request->get('phone_number');
//         $records = $this->getRecordsByPhoneNumber($number);
//         $dataProvider = $this->wrapIntoDataProvider($records);
//         return $dataProvider;
//     }

//     private function getRecordsByPhoneNumber($number)
//     {
//         $phone_record = PhoneRecord::find()->andFilterWhere(['like','number',$number])->one();
//         if (!$phone_record) {
//             return [];
//         }

//         $customer_record = CustomerRecord::findOne($phone_record->customer_id);
//         if (!$customer_record) {
//             return [];
//         }
// 	else
// {
// 	return [$customer_record]; 
// }
//        // return [$this->makeCustomer($customer_record, $phone_record)];
//     }

//     private function makeCustomer(
//         CustomerRecord $customer_record,
//         PhoneRecord $phone_record
//     ) {
//         $name = $customer_record->name;
//         $birth_date = new \DateTime($customer_record->birth_date);

//         $customer = new Customer($name, $birth_date);
//         $customer->notes = $customer_record->notes;
//         $customer->phones[] = new Phone($phone_record->number);

//         return $customer;
//     }

//     private function wrapIntoDataProvider($data)
//     {
//         return new ArrayDataProvider(
//             [
//                 'allModels' => $data,
//                 'pagination' => false
//             ]
//         );
//     }

//     public function actionAdd()
//     {
//         $customer = new CustomerRecord();
//         $phone = new PhoneRecord();

//         if ($this->load($customer, $phone, $_POST)) {
//            	$customer->save();
// 		$phone->customer_id = $customer->id;
// 		$phone->save();
//             return $this->redirect('customers');
//         }

//         return $this->render('add', compact('customer', 'phone'));
//     }

//     private function load(CustomerRecord $customer, PhoneRecord $phone, array $post)
//     {
//         return $customer->load($post)
//         and $phone->load($post)
//         and $customer->validate()
//         and $phone->validate(['number']);
//     }

//     private function store(Customer $customer)
//     {
//         $customer_record = new CustomerRecord();
//         $customer_record->name = $customer->name;
//         $customer_record->birth_date = $customer->birth_date->format('Y-m-d');
//         $customer_record->notes = $customer->notes;

//         $customer_record->save();

//         foreach ($customer->phones as $phone) {
//             $phone_record = new PhoneRecord();
//             $phone_record->number = $phone->number;
//             $phone_record->customer_id = $customer_record->id;
//             $phone_record->save();
//         }
//     }

//     public function actionQuery()
//     {
//         return $this->render('query');
//     }
}