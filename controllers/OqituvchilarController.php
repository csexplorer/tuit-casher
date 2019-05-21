<?php

namespace app\controllers;

use Yii;
use app\models\Oqituvchilar;
use app\models\OqituvchilarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * OqituvchilarController implements the CRUD actions for Oqituvchilar model.
 */
class OqituvchilarController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
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
     * Lists all Oqituvchilar models.
     * @return mixed
     */
    public function actionIndex($kafedra_id = false, $daraja_id = false) {
        $searchModel = new OqituvchilarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $kafedra_id, $daraja_id);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Oqituvchilar model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $model2 = \app\models\OqituvchiUstamalari::find()->where(['oqt_id' => $id])->all();

//                echo "<pre>"; var_dump($model2); exit;

        foreach ($model2 as $oqt_ustama) {
            $ustamalar[] = \app\models\Ustamalar::find()->where(['id' => $oqt_ustama->ustama_id])->one();
        }

        $jami_ustama = [];
        foreach ($ustamalar as $ust) {
            $jami_ustama[] = $ust->ustama;
        }

//        echo "<pre>"; var_dump($ustamalar); exit;

        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'model2' => $model2,
                    'ustamalar' => $ustamalar,
                    'jami_ustama' => array_sum($jami_ustama)
        ]);
    }

    /**
     * Creates a new Oqituvchilar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {

        $model = new Oqituvchilar();
        $model2 = new \app\models\OqituvchiUstamalari();

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
//            echo "<pre>"; var_dump(!empty($model->file)); exit;
            if (!empty($model->file)) {
                $model->avatar = 'uploads/' . $model->file->baseName . '.' . $model->file->extension;
                $model->save();
                $model->upload();
            } else {
                $model->save();
            }
//            echo "<pre>"; var_dump($model); exit;

            $oqituvchiUstamalariInsertArray = [];
            foreach ($model->multi_ustamalar as $ust_id) {
                $oqituvchiUstamalariInsertArray[] = [
                    $model2->oqt_id = $model->id,
                    $model2->ustama_id = $ust_id,
                ];
            }
            if (count($oqituvchiUstamalariInsertArray) > 0) {
                $columnNameArray = ['oqt_id', 'ustama_id'];
                // below line insert all your record and return number of rows inserted
                $insertCount = Yii::$app->db->createCommand()
                        ->batchInsert(
                                \app\models\OqituvchiUstamalari::tableName(), $columnNameArray, $oqituvchiUstamalariInsertArray
                        )
                        ->execute();
            }



            return $this->redirect(['view',
                        'id' => $model->id,
            ]);
        }

//                echo "<pre>"; var_dump($model2->getErrors()); exit;

        return $this->render('create', [
                    'model' => $model
        ]);
    }

    /**
     * Updates an existing Oqituvchilar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model2 = \app\models\OqituvchiUstamalari::find()->where(['oqt_id' => $id])->all();
        $old_multi_ust = array_column($model2, 'ustama_id');
        $model->multi_ustamalar = $old_multi_ust;

        if ($model->load(Yii::$app->request->post())) {

            if ($old_multi_ust != $model->multi_ustamalar) {
                \app\models\OqituvchiUstamalari::deleteAll(['oqt_id' => $id]);
                $model2a = new \app\models\OqituvchiUstamalari();
                $oqituvchiUstamalariInsertArray = [];
                foreach ($model->multi_ustamalar as $ust_id) {
                    $oqituvchiUstamalariInsertArray[] = [
                        $model2a->oqt_id = $model->id,
                        $model2a->ustama_id = $ust_id,
                    ];
                }
                if (count($oqituvchiUstamalariInsertArray) > 0) {
                    $columnNameArray = ['oqt_id', 'ustama_id'];
                    // below line insert all your record and return number of rows inserted
                    $insertCount = Yii::$app->db->createCommand()
                            ->batchInsert(
                                    \app\models\OqituvchiUstamalari::tableName(), $columnNameArray, $oqituvchiUstamalariInsertArray
                            )
                            ->execute();
                }
            }

//            echo "<pre>"; var_dump($_POST['Oqituvchilar']['file']); exit;

            $model->file = UploadedFile::getInstance($model, 'file');

            if (!empty($model->file)) {
                if (!empty($model->avatar && file_exists(Yii::getAlias('@app/web/') . $model->avatar))) {
                    unlink(Yii::getAlias('@app/web/') . $model->avatar);
                }
                $model->avatar = 'uploads/' . $model->file->baseName . '.' . $model->file->extension;
                $model->save();
                $model->upload();
            } else {
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }


        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Oqituvchilar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {

        $model = $this->findModel($id);
        \app\models\OqituvchiUstamalari::deleteAll(['oqt_id' => $id]);
        if (!empty($model->avatar) && file_exists(Yii::getAlias('@app/web/') . $model->avatar)) {
            unlink(Yii::getAlias('@app/web/') . $model->avatar);
        }

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Oqituvchilar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Oqituvchilar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Oqituvchilar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
