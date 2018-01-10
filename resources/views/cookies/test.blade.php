<h2>リクエストの取得</h2>
<p>依存注入により、現在のHTTPリクエストインスタンスを取得するには、タイプヒントで<code>Illuminate\Http\Request</code>クラスをコントローラメソッドに指定します。現在のリクエストインスタンスが、<a href="container.html">サービスプロバイダ</a>により、自動的に注入されます。</p>

<input type="text" value="<?php echo isset($_COOKIE['test'])?$_COOKIE['test']:'';?>">