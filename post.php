<?php
require_once 'posts.php';
require_once 'functions.php';
$my_array = getlatestResult();
sout($my_array);

foreach ($my_array as $key => $value) {  
    if(!isset($key))  $key = 1;
    if(!isset($value['title'])) $value['title'] = "my title";
    if(!isset($value['type'])) $value['type'] = "my type pink";

    if ($value['type'] == 'urgent') $color = "red";
    else if ($value['type'] == 'warning') $color = "yellow";
    else $color = "white";

    /// $color = (($value['type'] == "urgent"  ? "red" : $value['type'] == "warning" ) ? "yellow" : "white");
    // ilgili içerik gösterilmeden önce bir div oluşturulmalı ve* bu div $type değerine göre arkaplan rengi almalıdır.

    echo "<div style='background-color:" . $color . ";'> ";
    getPostDetails($key, $value['title']);
    echo "</div>";  
}

/**
 * post.php
 *
 * Bu betik direk olarak erişilebilir. functions.php'de yaptığınız gibi bir
 * kontrol eklemenize gerek yok.
 *
 * > Dikkat: Bu dosya hem direk çalıştırılabilir hem de `posts.php` dosyasında
 * > 1+ kez içe aktarılmış olabilir.
 *
 * Bu betik dosyası içerisinde functions.php'de yer alan fonksiyonları da kullanarak
 * aşağıdaki işlemleri gerçekleştirmenizi bekliyoruz.
 *
 * - $id değişkeni yoksa "1" değeri ile tanımlanmalı, daha önceden bu değişken
 * tanımlanmışsa değeri değiştirilmemeli. (Kontrol etmek için `isset`
 * (https://www.php.net/manual/en/function.isset.php) kullanılabilir.)
 * - $id için yapılan işlemin aynısı $title ve $type için de yapılmalı. (İstediğiniz
 * değerleri verebilirsiniz)
 * - Bir sonraki adımda ilgili içerik gösterilmeden önce bir div oluşturulmalı ve
 * bu div $type değerine göre arkaplan rengi almalıdır. (urgent=kırmızı,
 * warning=sarı, normal=arkaplan yok)
 * - `getPostDetails` fonksiyonu tetiklenerek ilgili içeriğin çıktısı gösterilmeli.
 */

