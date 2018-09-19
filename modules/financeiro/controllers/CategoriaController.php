<?php

namespace app\modules\financeiro\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use app\modules\financeiro\models\Tipo;
use app\modules\financeiro\models\Categoria;
use app\modules\financeiro\models\CategoriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class CategoriaController extends Controller
{
    public $layout = 'financeiro';
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => 'true',
                        'actions' => ['index', 'create'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => 'true',
                        'actions' => ['index', 'create', 'view', 'update', 'delete', 'situacao'],
                        'roles' => ['@'],
                        'matchCallback' => function (){
                            return Yii::$app->user->identity->username === 'admin';
                        }
                    ]
                ]
            ],
        ];
    }
   
    public function actionIndex()
    {
        $query = Categoria::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionCreate()
    {
        $model = new Categoria();

        $tipo = Tipo::find()->select(['id', 'tipo'])->all();
        $itemTipo = ArrayHelper::map($tipo, 'id', 'tipo');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('form', [
            'model' => $model, 'itemTipo' => $itemTipo,
        ]);
    }
   
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('form', [
            'model' => $model,
        ]);
    }
   
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Categoria::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
