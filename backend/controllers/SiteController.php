<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

use common\models\TransaksiInfrastruktur;
use common\models\TransaksiPelayanan;
use common\models\TransaksiGangguanKeamanan;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
        // return [
        //   'access'=>[
        //     'class'=>AccessControl::className(),
        //     'rules'=>[
        //       [
        //         'actions'=>[
        //           'index',
        //           'create',
        //           'update',
        //           'delete',
        //           'view'
        //         ],
        //         'allow'=>true,
        //         'matchCallback'=>function(){
        //           return(
        //             Yii::$app->user->identity->role=='Admin'
        //           );
        //         }
        //       ],
        //     ],
        //   ],
        //   'verbs' => [
        //         'class' => VerbFilter::className(),
        //         'actions' => [
        //             'delete' => ['post'],
        //         ],
        //   ],
        // ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
      $data = [
         'Transaksi Infrastruktur' => (int) TransaksiInfrastruktur::find()->count(),
         'Transaksi Pelayanan' => (int) TransaksiPelayanan::find()->count(),
         'Transaksi Gangguan Keamanan' => (int) TransaksiGangguanKeamanan::find()->count(),
      ];

      // echo "<pre>";print_r(array_values($data));exit;
      $series = [['name' => 'Aspirasi Masyarakat', 'data' => array_values($data)]];

       return $this->render('index', [
         'categories' => array_keys($data),
         'series'  => $series,
       ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
