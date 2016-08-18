<?php

namespace app\Controllers;

use Yii;
use app\models\PersonalDetail;
use app\models\PersonalDetailtSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PersonalDetailController implements the CRUD actions for PersonalDetail model.
 */
class PersonalDetailController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all PersonalDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonalDetailtSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PersonalDetail model.
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
     * Creates a new PersonalDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $models = new PersonalDetail();



        if ($models->load(Yii::$app->request->post())) {
          // $models->file = UploadedFile::getInstance($models, 'p_pic');
           // $models->file->saveAs('uploads/' . $models->p_id.$models->file->baseName . '.' . $models->file->extension);
            $models->save();
                return $this->redirect(['view', 'id' => $models->p_id]);

        } else {
            return $this->render('create', [ 'model' => $models, ]);
        }
    }

    /**
     * Updates an existing PersonalDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


       // $Dias =implode(", ", $model->p_Skill);
       // $model->p_Skill =$Dias;
        if ( $model->load(Yii::$app->request->post())  ) {
        //   $Dias =implode(", ", $model->p_Skill);
          // $model->p_Skill =$Dias;


          // $model->file = UploadedFile::getInstance($model, 'p_pic');
         //   $model->p_pic='7bg-sale.png';
          // $model->file->saveAs('uploads/' .$model->file->baseName . '.' . $model->file->extension);
            $model->save();
            return $this->redirect(['view', 'id' => $model->p_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PersonalDetail model.
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
     * Finds the PersonalDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PersonalDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PersonalDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
