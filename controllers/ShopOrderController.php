<?php

namespace app\controllers;

use Yii;
use app\models\ShopOrder;
use app\models\Product;
use app\models\ProductsInOrder;
use app\models\ShopOrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseJson;

/**
 * ShopOrderController implements the CRUD actions for ShopOrder model.
 */
class ShopOrderController extends Controller
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
     * Lists all ShopOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ShopOrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ShopOrder model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $productsInOrderIndex = BaseJson::decode($model->product_id);
        $productsInOrder = Product::find()->select('name')->where(['id'=>$productsInOrderIndex])->asArray()->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'productsInOrder' => $productsInOrder,
        ]);
    }

    /**
     * Creates a new ShopOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ShopOrder();

        $allProducts = Product::find()->select('id, name')->asArray()->all();
        $allProducts = ArrayHelper::map( $allProducts, 'id' , 'name');

        if ($model->load(Yii::$app->request->post())) {
            $model->product_id = BaseJson::encode($model->product_id);
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'allProducts' => $allProducts,
        ]);
    }

    /**
     * Updates an existing ShopOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $allProducts = Product::find()->select('id, name')->asArray()->all();
        $allProducts = ArrayHelper::map( $allProducts, 'id' , 'name');

        if ($model->load(Yii::$app->request->post())) {
            $model->product_id = BaseJson::encode($model->product_id);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'allProducts' => $allProducts,
        ]);
    }

    /**
     * Deletes an existing ShopOrder model.
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
     * Finds the ShopOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ShopOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ShopOrder::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
