<?php
// Just a test file to try out export
declare(strict_types=1);

$projectRootDir = __DIR__;
require $projectRootDir . '/vendor/autoload.php';
\Phel\Phel::run($projectRootDir, 'amphp-demo\exports');

###################################################
# Remember to run phel export command to generate
# the PHP classes from the exported phel functions:
#
# $ vendor/bin/phel export
# $ php example/using-exported-phel-function.php
###################################################

$result = (new \PhelGenerated\AmphpDemo\Exports())->demoExportFunction(100);

echo 'Result = ' . $result . PHP_EOL;
