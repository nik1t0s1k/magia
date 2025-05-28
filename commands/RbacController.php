<?php

namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $guest = $auth->createRole('guest');
        $auth->add($guest);

        $user = $auth->createRole('user');
        $auth->add($user);

        $manager = $auth->createRole('manager');
        $auth->add($manager);

        $admin = $auth->createRole('admin');
        $auth->add($admin);

        $auth->addchild($user, $guest);
        $auth->addchild($manager, $user);
        $auth->addchild($admin, $manager);

        $viewAdminPanel = $auth->createPermission('viewAdminPanel');
        $auth->add($viewAdminPanel);

        $auth->addChild($admin, $viewAdminPanel);

        echo "RBAC инициализирован успешно!\n";
    }
}
