<?php

/**
 * functions.php
 *
 * Direk olarak çalıştırılmasını istemediğimiz betik dosyasıdır.
 * Bu dosya başka bir yerde dahil edilmediyse çalıştırılmasını engellemek istiyoruz.
 * Örneğin, `http://localhost/functions.php` adresiyle ziyaret etmek istediğimizde,
 * bir hata mesajı verip betiğin sonlanmasını istiyoruz.
 *
 * > Betiği herhangi bir yerde sonlandırmak için `exit`
 * > (https://www.php.net/manual/en/function.exit.php) veya `die` kullanabilirsiniz.
 *
 * Bu dosyada tanımlanan fonksiyonları diğer iki betik dosyasında kullanmanızı
 * istiyoruz. Ek olarak, `getRandomPostCount` isminde bir fonksiyon tanımlamanızı
 * bekliyoruz. Bununla ilgili detaylı bilgi diğer betiklerde yer alıyor.
 */
// $_server  başlıklar, yollar ve komut dosyası konumları hakkında bilgi tutan bir PHP süper global değişkenidir.
// REQUEST_URI ise geçerli sayfanın yani functions.php nin uri'sini dönderir.
$uri = $_SERVER['REQUEST_URI']; 

 // direk olarak functons.php çalıştırınca ekrana doğrudan erişim izni yok yazdırıcak. 
if ($uri  !== '/functions.php') {  

function getLatestPosts($count = 5) // değer girmediysek 5 değerini baz alır.yoksa girilen değer ile işlem yapar.
{
    $posts = [];
    $postTypes = ["urgent", "warning", "normal"];

    for($i=1; $i<=$count; $i++) {
        do {
            $id = rand(1, 1000);
        } while (array_key_exists($id, $posts));

        $type = $postTypes[rand(0, count($postTypes)-1)];

        $posts[$id] = [
            "title" => "Yazı " . $i,
            "type" => $type
        ];
    }

    return $posts;
}

function getPostDetails($id, $title)
{
    echo "<h1>".$title." (#".$id.")</h1>";
    echo <<<EOT
<p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a iaculis justo, ac molestie justo. Integer semper nibh non imperdiet blandit. Integer nec diam eget sapien viverra rutrum ut eu justo. Suspendisse efficitur pretium eleifend. Vivamus ex nibh, euismod eget massa ut, accumsan ullamcorper nisi. Phasellus tristique magna et nibh dictum rhoncus. Phasellus at metus quis mi egestas blandit. Vestibulum lacinia ut tortor nec consectetur. Nulla sed risus ut est imperdiet vulputate ac non quam. Aliquam viverra erat vitae diam commodo, et molestie metus ultricies. Praesent rutrum urna a nisi egestas aliquam sit amet eu eros.
</p>
EOT;
}
/* sayfadaki çıktıların daha iyi bir görüntü olması için oluşturuldu.
   sürekli tekrar edilmemesi için .
*/
function sout($v)
{
    echo "<pre>";
    var_dump($v);
    echo "</pre>";

}

// Aşağıya fonksiyonu tanımlayabilirsiniz.
//BU fonksiyonda min ve max olmak üzere iki tane parametremiz var ve random sayı üretiyor.
function getRandomPostCount ($min , $max) { 
  
    return rand($min,$max);
}
}else {
    exit("Doğrudan erişime izin verilmiyor.") ;
}

 