<?php

namespace backend\controllers;

use common\models\AffiliateCompany;
use common\models\AffiliateCompanySearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
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
    public function actionIndex($type = AffiliateCompany::TYPE_UNITLINK)
    {
        $searchModel = new AffiliateCompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $type);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'type' => $type
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
    public function actionCreate($type = AffiliateCompany::TYPE_UNITLINK)
    {
        $model = new AffiliateCompany();
        $model->setScenario('create');
        if ($model->load(Yii::$app->request->post())) {

            $image = UploadedFile::getInstance($model, 'image');
            if ($image) {
                $model->type = $type;
                $file_name = Yii::$app->user->id . '.' . uniqid() . time() . '.' . $image->extension;
                $tmp = Yii::getAlias('@backend') . '/web/' . Yii::getAlias('@image_affiliate_company') . '/';
                if (!file_exists($tmp)) {
                    mkdir($tmp, 0777, true);
                }
                if ($image->saveAs($tmp . $file_name)) {
                    $model->image = $file_name;
                }
            }
            if ($model->save(false)) {
                \Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Thêm mới công ty liên kết thành công'));
                return $this->redirect(['index', 'type' => $type]);
            } else {
                \Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Thêm mới công ty liên kết không thành thành công'));
                return $this->render('create', ['model' => $model, 'type' => $type]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'type' => $type
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
        $type = $model->type;
        $old_image = $model->image;
        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'image');
            if ($image) {
                $file_name = Yii::$app->user->id . '.' . uniqid() . time() . '.' . $image->extension;
                $tmp = Yii::getAlias('@backend') . '/web/' . Yii::getAlias('@image_affiliate_company') . '/';
                if (!file_exists($tmp)) {
                    mkdir($tmp, 0777, true);
                }
                if ($image->saveAs($tmp . $file_name)) {
                    unlink($tmp.$old_image);
                    $model->image = $file_name;
                }
            }else{
                $model->image = $old_image;
            }
            if ($model->update(false)) {
                \Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Thêm mới công ty liên kết thành công'));
                return $this->redirect(['index', 'type' => $type]);
            } else {
                \Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Thêm mới công ty liên kết không thành thành công'));
                return $this->render('create', ['model' => $model, 'type' => $type]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'type' => $type
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
        if($model->update(false)){
            \Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Xóa công ty liên kết thành công'));
            return $this->redirect(['index']);
        }else{
            \Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Xóa công ty liên kết không thành thành công'));
            return $this->render('view', ['model' => $model]);
        }
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
