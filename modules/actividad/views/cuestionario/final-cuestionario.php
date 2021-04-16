<?php
use yii\bootstrap\Html;

/* @var $this yii\web\View */
$this->title = 'Final de cuestionario';
$this->params['breadcrumbs'][] = ['label' => 'Cuestionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

El Fin!
<pre>
<?php
print_r($respuestaManager);

?>
</pre>