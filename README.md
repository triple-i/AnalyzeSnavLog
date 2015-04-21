# AnalyzeSnavLog ![ver0.1](https://img.shields.io/badge/version-0.1-green.svg)
Snavアクセスログを生成するための集計ツールです。

## Description

Snavから書き出したログを解析して必要なデータとして集計します。

## Requirement

PHP 5.4+

## Usage

#### ブックアクセス数 Top20 を集計

```
$ bin/asl book_access_top20 /path/to/log.csv > dest.csv
```

#### ブックカテゴリ別にアクセス数を集計

```
$ bin/asl book_category_access /path/to/log.csv > dest.csv
```

#### 合計アクセス数を集計

```
$ bin/asl total_access /path/to/log.csv > dest.csv
```

#### 合計利用者数を集計

```
$ bin/asl user_access /path/to/log.csv > dest.csv
```

#### ユーザアクセス数 Top20 を集計

```
$ bin/asl user_access_top20 /path/to/log.csv > dest.csv
```

#### 日別のアクセス数を集計

```
$ bin/asl user_date_access /path/to/log.csv > dest.csv
```

## Install

install composer libraries.

```
$ composer install
```

## License

[MIT](https://github.com/triple-i/AnalyzeSnavLog/blob/master/LICENSE)

## Author

[triple-i](https://github.com/triple-i)
