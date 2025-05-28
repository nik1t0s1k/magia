<?php

namespace app\controllers;

use app\models\Categories;
use Yii;
use yii\web\Controller;
use app\models\Product;
use yii\web\UploadedFile;

class ProductController extends Controller
{
    public function actionCreate()
    {
        $model = new Product();

        if ($model->Load(Yii::$app->request->post()) && $model->validate()) {
            $product = new Product();
            $product->name = $model->name;
            $product->description = $model->description;
            $product->price = $model->price;
            $product->category_id = $model->category_id;

            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->image) {
                $imageName = uniqid() . '.' . $model->image->extension;
                $model->image->saveAs('@webroot/uploads/' . $imageName);
                $product->image = 'uploads/' . $imageName;
            }

            if ($product->save()) {
                Yii::$app->session->setFlash('success', 'Товар успешно добавлен!');
                return $this->redirect(['index']);
            }
            Yii::$app->session->setFlash('error', 'Ошибка при добавлении товара!');
        }
            $categories = Categories::find()->all();

        return $this->render('create', [
            'model' => $model,
            'categories' => $categories,
        ]);
    }
}