# 🔥 Replaces information from email template

## Install 
```shell
composer require httd1/mailreplace
```

## Usage

```php

<?php

include __DIR__.'/vendor/autoload.php';

use MailReplace\MailReplace;

$template = __DIR__.'/template.html';

$new_html = MailReplace::replaceFile ($template, [
    '{{user}}' => 'ET Bilu',
    '{{title}}' => 'Mail',
    '[[[date_time]]]' => date ('m/d/y')
]);

echo $new_html;

// $template = <<<TEXT
// <!DOCTYPE html>
// <html>
//     <head>
//         <body>
//             <h1 style="font-size: 14pt;">
//                 {{title}} - [[[date_time]]]
//             </h1>
//             <p>Hi {{user}}, this is a contact message, how are you?</p>
//         </body>
//     </head>
// </html>
// TEXT;

## save in new_template.html
// MailReplace::replaceToFile (__DIR__.'/new_template.html', $template, [
//     '{{user}}' => 'ET Bilu',
//     '{{title}}' => 'Mail',
//     '[[[date_time]]]' => date ('m/d/y')
// ]);

// $html = MailReplace::replace ($template, [
//     '{{user}}' => 'ET Bilu',
//     '{{title}}' => 'Mail',
//     '[[[date_time]]]' => date ('m/d/y')
// ]);

// echo $html;

/*
<!DOCTYPE html>
<html>
    <head>
        <body>
            <h1 style="font-size: 14pt;">
                Mail - 11/14/22
            </h1>
            <p>Hi ET Bilu, this is a contact message, how are you?</p>
        </body>
    </head>
</html>
*/

```