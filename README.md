# Array utilities
配列操作

## Install

### 通常
Packagist には登録してないので、DLなりコピペして好きなところに置く。

### どうしても composer で管理したい
利用するプロジェクトの `composer.json` に以下を追加する。
```composer.json
"repositories": {
    "array": {
        "type": "vcs",
        "url": "https://github.com/shimoning/array-utilities.git"
    }
},

"require": {
    "shimoning/array-utilities": ">=0.0.1"
},
```

その後以下でインストールする。

```bash
composer update shimoning/array-utilities
```

## Usage
### some
javascript にある Array.some() 的なやつ
```php
// チェックのための関数
$biggerThan3 = function($value, $index, $array) {
    return $value > 3;
});

$array1 = [1, 2, 3, 4];
ArrayUtilities::some($array1, $biggerThan3); // -> true

$array2 = [1, 2, 1, 2, 1, 0];
ArrayUtilities::some($array2, $biggerThan3); // -> false
```

### every
javascript にある Array.every() 的なやつ
```php
// チェックのための関数
$smallerThan5 = function($value, $index, $array) {
    return $value < 5;
});

$array3 = [1, 2, 3, 4];
ArrayUtilities::every($array3, $smallerThan5); // -> true

$array4 = [4, 5, 6, 3, 2];
ArrayUtilities::every($array4, $smallerThan5); // -> false
```
