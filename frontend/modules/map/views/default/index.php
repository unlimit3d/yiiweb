<?php
use frontend\modules\map\assets\MapAsset;
MapAsset::register($this);

//$this->registerCssFile('//api.mapbox.com/mapbox.js/v3.1.0/mapbox.css', ['async' => false, 'defer' => true]);
//$this->registerJsFile('//api.mapbox.com/mapbox.js/v3.1.0/mapbox.js', ['position' => $this::POS_HEAD]);

?>

<div id="map" style="height:450px;">
    
</div>

<?php
$js = <<<JS
L.mapbox.accessToken = 'pk.eyJ1IjoidW5saW1pdDNkIiwiYSI6ImNqMjRkYWI3aTAwMXgycWxlcG95N3RqcmwifQ.4wh1INlQIt_XiuZtzNb8XA';
var map = L.mapbox.map('map', 'mapbox.streets')
    .setView([19.901436, 99.828939], 20);
JS;
$this->registerJS($js);
?>