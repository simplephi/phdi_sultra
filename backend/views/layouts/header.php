<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use mdm\admin\components\Helper;
$this->registerJs('$(\'.profile\').initial();');
?>
<header class="main-header">
	<nav class="navbar navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<?php
					echo Html::a('<b>'.Yii::$app->name.'</b>',Yii::$app->homeUrl,['class' => 'navbar-brand']);
				?>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<i class="fa fa-bars"></i>
				</button>
			</div>
			<!--div class="collapse navbar-collapse pull-left" id="navbar-collapse"-->
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<?php
					$itemsLeft = [
						['label' => '<i class="fa fa-home"></i> Beranda', 'url' => ['/site/index'],],
						[
                                                    'label' => 'Master Data Pokok',
                                                    'icon' => 'credit-card',
                                                    'url' => '#',
                                                    'items' => [

                                                                ['label' => 'Data Pendidikan', 'url' => ['/pendidikan/index']],
                                                                ['label' => 'Data Pekerjaan', 'url' => ['/pekerjaan/index']],
                                                                ['label' => 'Data Kat. Family', 'url' => ['/family-kat/index']],
                                                                ],
                                                    ],

                                             [
                                                'label' => 'Master Data Wilayah',
                                                'icon' => 'credit-card',
                                                'url' => '#',
                                                'items' => [
                                                            ['label' => 'Provinsi', 'icon' => 'check-circle', 'url' => ['/provinsi'],],
                                                            ['label' => 'Kabupaten', 'icon' => 'check-circle', 'url' => ['/kabupaten'],],
                                                            ['label' => 'Kecamatan', 'icon' => 'check-circle', 'url' => ['/kecamatan'],],
                                                            ['label' => 'Kelurahan/Desa', 'icon' => 'check-circle', 'url' => ['/kelurahan-desa'],],

                                                            ],
                                               ],

                                            [
                                                'label' => 'Kelola Keanggotaan',
                                                'icon' => 'credit-card',
                                                'url' => '#',
                                                'items' => [
                                                            ['label' => 'Anggota', 'url' => ['/anggota/index']],
                                                            ['label' => 'Family', 'url' => ['/family/index']],
                                                            ['label' => 'Alamat', 'url' => ['/anggota-has-kelurahan-desa/index']],
                                                            ],
                                               ],

						[
						'label' => 'Kelola Pembayaran',
						 'url' => ['#'],
						 'items' => [
												 ['label' => 'Rekap Wilayah', 'url' => ['/rekap-wilayah/index']],
												 ['label' => 'Rekap Anggota', 'url' => ['/rekap-anggota/index']],
												 ['label' => 'Rekapitulasi', 'url' => ['/bayar/index']],
										],
					],




                                            ];
					echo Nav::widget([
						'options' => ['class' => 'navbar-nav'],
						'encodeLabels' => false,
						'items' => Helper::filter($itemsLeft),
					]);

					$itemsRightUser = [
						'<li class="dropdown user user-menu active">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img data-name="'.Yii::$app->user->identity->username.'" class="user-image profile" alt="'.Yii::$app->user->identity->username.'">
								<span class="hidden-xs">
									'.Yii::$app->user->identity->username.'
								</span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-header">
									<img data-name="'.Yii::$app->user->identity->username.'" class="img-circle profile" alt="'.Yii::$app->user->identity->username.'">
									<p>
										'.Yii::$app->user->identity->username.'
										<small></small>
									</p>
								</li>
								<li class="user-footer">
									<div class="pull-left">'
										.Html::a('Profil',['/profil'],['class' => 'btn btn-default btn-flat']).
									'</div>
									<div class="pull-right">'
										.Html::a(
											'Sign out',
											['/site/logout'],
											['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
										).
									'</div>
								</li>
							</ul>
						</li>'
					];

					$itemsRightSetting = [
						[
							'label' => '<i class="fa fa-cogs"></i>',
							'items' => [
								//['label' => '<i class="fa fa-circle-o"></i> Manajemen User', 'url' => ['/user/index'],],
								['label' => '<i class="fa fa-circle-o"></i> Advance Manajemen User', 'url' => ['/admin/assignment']],
							],
						],
					];


					echo Nav::widget([
						'options' => ['class' => 'navbar-nav navbar-right'],
						'encodeLabels' => false,
						//'items' => Helper::filter($itemsRight)
						'items' => Helper::filter($itemsRightSetting)
					]);

					echo Nav::widget([
						'options' => ['class' => 'navbar-nav navbar-right'],
						'encodeLabels' => false,
						//'items' => Helper::filter($itemsRight)
						'items' => $itemsRightUser
					]);
					/*echo Nav::widget([
					    'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id)
					]);*/
				?>
			</div>
		</div>
	</nav>

  <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>

</header>
