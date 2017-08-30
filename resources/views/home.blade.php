<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel + Vue.js</title>
    {!! Html::style('css/app.css') !!}
  </head>
  <body>
    <div id="app"></div>
    <script>
      window.Laravel = <?php echo json_encode([
          'csrfToken' => csrf_token(),
      ]); ?>
    </script>
    {!! Html::script('js/app.js') !!}
  </body>
</html>
