## Token-Gen

PHP library for simple and secure generation of random tokens.

### Requirements

* PHP `^8.1`

### Installation

`composer require khalilleo/token-gen`

### Usage

```php

use Khalilleo\TokenGen\Token;

$token = (new Token())->getRandomToken();

```

### Example

```php

<?php

require 'vendor/autoload.php';

use Khalilleo\TokenGen\Token;

$token = new Token();

var_dump($token->getRandomToken(16)); // Returns something like 'rQEswWjT3cKtB6uL'

var_dump($token->getRandomTokenOnlyLowers(7)); // Returns something like 'pcstkew'

var_dump($token->getRandomTokenOnlyUppers(20)); // Returns something like 'QVYRPUZGTOESJXLWICMA'

var_dump($token->getRandomApiToken()); // Returns something like '3SaNHvMndKCOBgIRPUw7XkAmTWypGri4'

var_dump($token->getRandomDigits(8)); // Returns something like '65347092'

var_dump($token->getOtp()); // Returns something like '213582'

var_dump($token->getRandomPassword()); // Returns something like 'YBo@RUV6' (Default: 8)

var_dump((new Token())->getRandomToken()); // Returns something like 'lBwF7hTu1sqNfUIXD2zdW6Pvnyrx5b0Y' (Default: 32)

```

### Copyright

This project is licensed under the MIT License.
