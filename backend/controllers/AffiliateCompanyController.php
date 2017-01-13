<?php

namespace backend\controllers;

use Yii;
use common\models\AffiliateCompany;
use common\models\AffiliateCompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AffiliateCompanyController implements the CRUD actions for AffiliateCompany model.
 */
class AffiliateCompanyController extends Controller
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
     * Lists all AffiliateCompany models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AffiliateCompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AffiliateCompany model.
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
     * Creates a new AffiliateCompany model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AffiliateCompany();

        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'image');
            if ($image) {
                $file_name = Yii::$app->user->id . '.' . uniqid() . time() . '.' . $image->extension;
                $tmp       = Yii::getAlias('@backend') . '/web/' . Yii::getAlias('@image_affiliate_company') . '/';
                if (!file_exists($tmp)) {
                    mkdir($tmp, 0777, true);
                }
                if ($image->saveAs($tmp . $file_name)) {
                    $model->image = $file_name;
                }
            }
            if($model->save(false)){
                \Yii::$app->getSession()->setFlash('success',Yii::t('app', 'Thêm mới công ty liên kết thành công'));
                return $this->redirect(['index']);
            }else{
                \Yii::$app->getSession()->setFlash('error',Yii::t('app', 'Thêm mới công ty liên kết không thành thành công'));
                return $this->render('create',['model'=>$model]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AffiliateCompany model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'image');
            if ($image) {
                $file_name = Yii::$app->user->id . '.' . uniqid() . time() . '.' . $image->extension;
                $tmp       = Yii::getAlias('@backend') . '/web/' . Yii::getAlias('@image_affiliate_company') . '/';
                if (!file_exists($tmp)) {
                    mkdir($tmp, 0777, true);
                }
                if ($image->saveAs($tmp . $file_name)) {
                    $model->image = $file_name;
                }
            }
            if($model->update(false)){
                \Yii::$app->getSession()->setFlash('success',Yii::t('app', 'Thêm mới công ty liên kết thành công'));
                return $this->redirect(['index']);
            }else{
                \Yii::$app->getSession()->setFlash('error',Yii::t('app', 'Thêm mới công ty liên kết không thành thành công'));
                return $this->render('create',['model'=>$model]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AffiliateCompany model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $model = $this->findModel($id);
        $model->status = AffiliateCompany::STATUS_DELETED;
        $model->update(false);
        \Yii::$app->getSession()->setFlash('success',Yii::t('app', 'Xóa công ty liên kết thành công'));
        return $this->redirect(['index']);
    }

    /**
     * Finds the AffiliateCompany model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AffiliateCompany the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AffiliateCompany::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
