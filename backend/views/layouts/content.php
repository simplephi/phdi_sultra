<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

?>
<div class="content-wrapper" style="margin-top: 45px;">
    <div class="container-fluid">
        <section class="content-header">
            <?php
                if (isset($this->blocks['content-header'])) {
                    echo "<h1>".$this->blocks['content-header']."</h1>";
                } else {
                    echo "<h1>";
                        if ($this->title !== null) {
                            echo Html::encode($this->title);
                        } else {
                            echo Inflector::camel2words(
                                Inflector::id2camel($this->context->module->id)
                            );
                            echo ($this->context->module->id !== Yii::$app->id) ? '<small>Module</small>' : '';
                        }
                    echo "</h1>";
                }
                echo Breadcrumbs::widget(
                        ['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs']:[],]
                    )
            ?>
        </section>
        <section class="content">
            <?php
                echo Alert::widget();
                echo $content;
            ?>
        </section>
    </div>
</div>

<footer class="main-footer">

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
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; <?php echo '2015'===date('Y')?'2015':'2015 - '.date('Y'); ?> <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
</footer>
