# Human readable numbers and time
Human readable numbers and time package

## Installation

You can install this package via composer using this command:

``` bash
 composer require vistag/human-readable
```

## Usage

### Numbers
``` php
use Vistag\HumanReadable\ReadableNumber;


$number = new ReadableNumber(550);

$number->raw();
// 550
$number->short();
// 550
$number->long();
// 550


$number = new ReadableNumber(1515);

$number->short();
// 1.5k
$number->long();
// 1.51k


$number = new ReadableNumber(155550);

$number->short();
// 155k
$number->long();
// 155.55k


$number = new ReadableNumber(5999900);

$number->short();
// 5.9M
$number->long();
// 5.99M
```

See tests for more examples.

### Seconds
``` php
use Vistag\HumanReadable\ReadableSeconds;


$seconds = new ReadableSeconds(990);

$seconds->raw();
// 990
$seconds->short();
// 990s
$seconds->long();
// 16m 30s


$seconds = new ReadableSeconds(1010);

$seconds->short();
// 16m
$seconds->long();
// 16m 50s


$seconds = new ReadableSeconds(155550);

$seconds->short();
// 151m
$seconds->long();
// 2h 31m


$seconds = new ReadableSeconds(5999900);

$seconds->short();
// 27h
$seconds->long();
// 27.6h
```

See tests for more examples.

## Support

If you believe you have found an issue, please report it using the [GitHub issue tracker](https://github.com/VistagGit/human-readable/issues), or better yet, fork the repository and submit a pull request.

If you're using this package, I'd love to hear your thoughts. Thanks!


## License

The MIT License (MIT). [Vistag.com](https://vistag.com)