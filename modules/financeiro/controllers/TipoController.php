<?php

namespace app\modules\financeiro\controllers;

use app\modules\financeiro\models\Lancamento;
use Yii;
use app\modules\financeiro\models\Tipo;
use app\modules\financeiro\models\TipoSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class TipoController extends Controller
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
                        },
                        'denyCallback' => function ($rule, $action) {
                            throw new \Exception('Voc� n�o est� autorizado a acessar esta p�gina');
                        }
                    ]
                ]
            ],
        ];
    }

    public function actionIndex()
    {
        $query = Tipo::find();

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
        $model = new Tipo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('form', [
            'model' => $model,
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
        if (($model = Tipo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
