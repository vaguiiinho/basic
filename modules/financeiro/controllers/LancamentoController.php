<?php

namespace app\modules\financeiro\controllers;

use Yii;
use app\modules\financeiro\models\Lancamento;
use app\modules\financeiro\models\Categoria;
use app\modules\financeiro\models\Tipo;
use yii\data\ActiveDataProvider;
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
        $query = Lancamento::find();


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
        $model = new Lancamento();


        // Aqui tá retornando todas as categorias, tipos, e situações
        // Selecionando o ID e a coluna que vai ser servir de texto

        $categoria = Categoria::find()->all();
        $tipo = Tipo::find()->select(['id', 'tipo'])->all();


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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('form', compact('model','itemCategoria', 'itemTipo'));
    }

    public function actionUpdate($id)
    {
        $model = new Lancamento();

        $categoria = Categoria::find()->all();
        $tipo = Tipo::find()->select(['id', 'tipo'])->all();
        $itemCategoria = ArrayHelper::map($categoria, 'id', 'categoria');
        $itemTipo = ArrayHelper::map($tipo, 'id', 'tipo');

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('form', compact('model','itemCategoria', 'itemTipo'));
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

    public function actionSituacao($id)
    {
        $situacao = $this->findModel($id);
        $situacao->situacao = (int)!$situacao->situacao;
        if($situacao->save()){
            return $this->redirect(['index']);
        }
    }

}
