<?php

namespace app\modules\financeiro\controllers;

use Yii;
use app\modules\financeiro\models\Lancamento;
use app\modules\financeiro\models\Categoria;
use app\modules\financeiro\models\Tipo;
use app\modules\financeiro\models\Situacao;
use app\modules\financeiro\models\LancamentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;


class LancamentoController extends Controller
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
        ];
    }
    
    public function actionIndex()
    {
        $searchModel = new LancamentoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Lancamento();


        // Aqui tá retornando todas as categorias, tipos, e situações
        // Selecionando o ID e a coluna que vai ser servir de texto

        $categoria = Categoria::find()->all();
        $tipo = Tipo::find()->select(['id', 'tipo'])->all();
        $situacao = Situacao::find()->select(['id', 'situacao'])->all();

        //$categoriasOpts = Categoria::find()->select(['id', 'categoria'])->all();
        //$tiposOpts = Tipo::find()->select(['id', 'tipo'])->all();
        //$situacaoOpts = Situacao::find()->select(['id', 'situacao'])->all();
           
        // Aqui ele mapeia o array retornado e transforma nisso aqui
        // [
        //
        //      VALOR DO ID => VALOR DA COLUNA CATEGORIA
        //
        //
        //
        //]
        // Isso aqui é importante no dropdown, o valor do ID vai ser o value do dropdown (que é o que vai ser capturado no post)
        // e o valor da coluna categoria vai ser o texto representativo
        //$categoriasOpts = ArrayHelper::map($categoriasOpts, 'id', 'categoria');
        //$tempCategoriaOpts = $categoriasOpts;
        //$categoriasOpts = [];
        //foreach ($tempCategoriaOpts as $categoria) {
        //    $categoriasOpts[$categoria->id] = $categoria->categoria;
        //}
        //$tiposOpts = ArrayHelper::map($tiposOpts, 'id', 'tipo');
        //$situacaoOpts = ArrayHelper::map($situacaoOpts, 'id', 'situacao');
        $itemCategoria = ArrayHelper::map($categoria, 'id', 'categoria');
        $itemTipo = ArrayHelper::map($tipo, 'id', 'tipo');
        $itemSituacao = ArrayHelper::map($situacao, 'id', 'situacao');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('form', compact('model','itemCategoria', 'itemTipo', 'itemSituacao'));
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
        if (($model = Lancamento::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
