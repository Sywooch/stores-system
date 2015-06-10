<?php

namespace app\controllers;

use app\models\Coordinate;
use Yii;
use app\models\Store;
use app\models\search\StoreSearch;
use yii\base\Exception;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\MethodNotAllowedHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * StoreController implements the CRUD actions for Store model.
 */
class StoreController extends Controller
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
	 * Lists all Store models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new StoreSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionMap()
	{
		return $this->render('map');
	}

	public function actionGetAll()
	{
		if (Yii::$app->request->isAjax) {
			$stores = Store::find()->all();
			foreach ($stores as $store) {
				$response[] = [
					'lat' => $store->coordinate->lat,
					'lng' => $store->coordinate->lng,
					'name' => $store->name,
					'url' => Url::to(['view', 'id' => $store->id]),
				];
			}
			Yii::$app->response->format = Response::FORMAT_JSON;
			return isset($response) ? $response : [];
		}

		throw new MethodNotAllowedHttpException();
	}

	/**
	 * Displays a single Store model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		$store = $this->findModel($id);
		$coordinate = $store->coordinate;

		return $this->render('view', [
			'coordinate' => $coordinate,
			'store' => $store,
		]);
	}

	/**
	 * Creates a new Store model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$coordinate = new Coordinate();
		$store = new Store();

		if ($coordinate->load(Yii::$app->request->post()) &&
			$coordinate->validate() &&
			$store->load(Yii::$app->request->post()) &&
			$store->validate()
		) {
			$transaction = Yii::$app->db->beginTransaction();
			try {
				$coordinate->save(false);
				$store->coordinate_id = $coordinate->id;
				$store->save(false);
				$transaction->commit();
				return $this->redirect(['view', 'id' => $store->id]);
			} catch (Exception $e) {
				$transaction->rollBack();
			}
		}

		return $this->render('create', [
			'coordinate' => $coordinate,
			'store' => $store,
		]);
	}

	/**
	 * Updates an existing Store model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$store = $this->findModel($id);
		$coordinate = $store->coordinate;

		if ($coordinate->load(Yii::$app->request->post()) &&
			$coordinate->validate() &&
			$store->load(Yii::$app->request->post()) &&
			$store->validate()
		) {
			$transaction = Yii::$app->db->beginTransaction();
			try {
				$coordinate->save(false);
				$store->coordinate_id = $coordinate->id;
				$store->save(false);
				$transaction->commit();
				return $this->redirect(['view', 'id' => $store->id]);
			} catch (Exception $e) {
				$transaction->rollBack();
			}
		}

		return $this->render('update', [
			'coordinate' => $coordinate,
			'store' => $store,
		]);
	}

	/**
	 * Deletes an existing Store model.
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
	 * Finds the Store model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Store the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Store::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
